<?php 

class uploadHelper {

	public $useUploadTable = true;

	public function getItemAttachments( $id, $upload_for='' ,$options = array() ){
    	 try{
	        $stmt = db::con()->prepare("SELECT id, title, upload, created_at, created_by FROM ".db::q(db::p().'uploads')." WHERE ref_id=:id AND upload_for=:upload_for AND deleted=0");
	        $stmt->execute(array(':id' => $id, ':upload_for' => $upload_for));
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch(Exception $e){
	    	_pr($e,1);
	    }
    }

    public function saveAttachments( $ref_id, $files=array(), $saveToFolder='', $options = array() )
    {
    	if( is_array($files) && count($files) ){
	    	foreach ($files['name'] as $key => $file) {
	    		if( $files['name'][$key] =='' ) continue;
	    		
	            $tmp_name   = $files['tmp_name'][$key];
	            $name       = $this->saveFileName( $files['name'][$key] );
	            $img_title  = $files['name'][$key];
	            
	            $this->moveAttachment( $tmp_name, $name, $saveToFolder, $options );

	            if( $name !='' ){
	            	$created_at          = date('Y-m-d H:i:s');
    				$created_by          = _getAuthSession();;
		            $params  = array('ref_id' => $ref_id, 'upload' => $name, 'title' => $img_title, 'upload_for' => $saveToFolder, 'created_at' => $created_at, 'created_by' => $created_by);
		            $columns = implode(', ', array_keys($params));
		            $values  = ":".implode(', :', array_keys($params));

		            $stmt = db::con()->prepare("INSERT INTO ".db::q(db::p().'uploads')." ( $columns ) VALUES ($values)");

		            foreach($params as $param => &$value) {
		                $stmt->bindParam($param, $value);
		            }

		            $stmt->execute();
		        }
	        }
	    }
    }

  public function uploadAttachment( $file, $saveToFolder='', $options = array() )
  {
		if( $file['name'] =='' ) return;
		
        $tmp_name   = $file['tmp_name'];
        $name       = $this->saveFileName( $file['name'] );
        $img_title  = $file['name'];
        
        $this->moveAttachment( $tmp_name, $name, $saveToFolder, $options );
        
        return $name;
    }

  public function moveAttachment( $tmp_name, $name, $saveToFolder='', $options = array() )
  {
  		require_once ROOT_DIR.'/vendor/Zebra/Zebra_Image.php';
		
        if( move_uploaded_file($tmp_name, UPLOAD_DIR."$saveToFolder/$name")){
        } else{
        	echo "Cannot upload file " .UPLOAD_DIR.$saveToFolder."/".$name;exit;
        }

        $image = new Zebra_Image();
        $image->auto_handle_exif_orientation = false;
        $image->source_path = UPLOAD_DIR."$saveToFolder/$name";
        $image->target_path = UPLOAD_DIR."$saveToFolder/$name";

        if( isset($options) && isset($options['quality']) ){
	        $image->jpeg_quality = $options['quality'];
	    }

        $image->preserve_aspect_ratio = true;
		$image->enlarge_smaller_images = true;
		$image->preserve_time = true;
		$image->handle_exif_orientation_tag = true;
		$image->sharpen_images = true;

		$width = $height = 0;
		if( isset($options) && isset($options['height']) ){
			$height = $options['height'];
		}

		if( isset($options) && isset($options['width']) ){
			$width = $options['width'];
		}

		$image->resize($width, $height, ZEBRA_IMAGE_NOT_BOXED);
    }

    private function saveFileName($filename, $beautify=true) {
	    // sanitize filename
	    $filename = preg_replace(
	        '~
	        [<>:"/\\|?*]|            # file system reserved https://en.wikipedia.org/wiki/Filename#Reserved_characters_and_words
	        [\x00-\x1F]|             # control characters http://msdn.microsoft.com/en-us/library/windows/desktop/aa365247%28v=vs.85%29.aspx
	        [\x7F\xA0\xAD]|          # non-printing characters DEL, NO-BREAK SPACE, SOFT HYPHEN
	        [#\[\]@!$&\'()+,;=]|     # URI reserved https://tools.ietf.org/html/rfc3986#section-2.2
	        [{}^\~`]                 # URL unsafe characters https://www.ietf.org/rfc/rfc1738.txt
	        ~x',
	        '-', $filename);
	    // avoids ".", ".." or ".hiddenFiles"
	    $filename = ltrim($filename, '.-');
	    $filename = md5(microtime()).'_'.$filename;
	    $filename = $this->beautifyFilename($filename);
	    // maximise filename length to 255 bytes http://serverfault.com/a/9548/44086
	    $ext = pathinfo($filename, PATHINFO_EXTENSION);
	    $filename = mb_strcut(pathinfo($filename, PATHINFO_FILENAME), 0, 255 - ($ext ? strlen($ext) + 1 : 0), mb_detect_encoding($filename)) . ($ext ? '.' . $ext : '');
	    return $filename;
	}

	private function beautifyFilename($filename) {
	    // reduce consecutive characters
	    $filename = preg_replace(array(
	        '/ +/',
	        '/_+/',
	        '/-+/'
	    ), '-', $filename);
	    $filename = preg_replace(array(
	        '/-*\.-*/',
	        '/\.{2,}/'
	    ), '.', $filename);
	    // lowercase for windows/unix interoperability http://support.microsoft.com/kb/100625
	    $filename = mb_strtolower($filename, mb_detect_encoding($filename));
	    $filename = trim($filename, '.-');
	    return $filename;
	}

 
 }