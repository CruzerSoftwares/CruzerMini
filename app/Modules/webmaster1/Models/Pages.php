<?php 

class Pages extends App{
    
    public $table;

    public function __construct()
    {
    	$this->table = 'pages';
    }
    
    public function index(){
        return $this->fetch('all');
    }

    public function getItemAttachments($id,$upload_for='')
    {
        include_once 'uploadHelper.php';
        $obj = new uploadHelper();
        return $obj->getItemAttachments($id,$upload_for);
    }

    public function save(){
        $title               = $_POST['title'];
        $description         = $_POST['description'];
        $alias               = $_POST['alias'];

        if( $alias == '' ){
            $alias = _slug($title);
        } else{
            $alias = _slug($alias);
        }

        $meta_title          = $_POST['meta_title'];
        $meta_description    = $_POST['meta_description'];
        $meta_description    = $_POST['meta_description'];
        $meta_keywords       = $_POST['meta_keywords'];
        $robots              = $_POST['robots'];
        $status              = $_POST['status'];
    	$created_at          = date('Y-m-d H:i:s');
    	$created_by          = _getAuthSession();;

        $params  = array('title' => $title,'description' => $description, 'alias' => $alias, 'meta_title' => $meta_title, 'meta_description' => $meta_description, 'meta_description' => $meta_description, 'meta_keywords' => $meta_keywords, 'robots' => $robots,'status' => $status, 'created_at' => $created_at, 'created_by' => $created_by);
		$columns = implode(', ', array_keys($params));
        $values  = ":".implode(', :', array_keys($params));

        try{
	        $stmt = db::con()->prepare("INSERT INTO ".db::q(db::p().$this->table)." ( $columns ) VALUES ($values)");

	        foreach($params as $param => &$value) {
	            $stmt->bindParam($param, $value);
	        }

	        $res = $stmt->execute();
            $insert_id = db::con()->lastInsertId();

            //upload attachments
            include_once 'uploadHelper.php';
            $obj = new uploadHelper();
            $obj->saveAttachments( $insert_id, $_FILES['image'], 'pages/images' );
            $obj->saveAttachments( $insert_id, $_FILES['banner'], 'pages/banners' );
            return $res;
	    } catch(Exception $e){
	    	_pr($e,1);
	    }
    }

	public function update(){
    	$id                  = $_POST['id'];
        $title               = $_POST['title'];
        $description         = $_POST['description'];
        $alias               = $_POST['alias'];

        if( $alias == '' ){
            $alias = _slug($title);
        } else{
            $alias = _slug($alias);
        }
        
        $meta_title          = $_POST['meta_title'];
        $meta_description    = $_POST['meta_description'];
        $meta_description    = $_POST['meta_description'];
        $meta_keywords       = $_POST['meta_keywords'];
        $robots              = $_POST['robots'];
        $status              = $_POST['status'];
    	$updated_at          = date('Y-m-d H:i:s');
    	$updated_by          = _getAuthSession();;

        try{
	        $stmt = db::con()->prepare("UPDATE ".db::q(db::p().$this->table)." SET title=:title, description=:description, alias=:alias, meta_title=:meta_title, meta_description=:meta_description, meta_keywords=:meta_keywords, robots=:robots, status=:status, updated_at=:updated_at, updated_by=:updated_by WHERE id=:id");
            $stmt->execute(array(':id' => $id, ':title' => $title,':description' => $description,':alias' => $alias,':meta_title' => $meta_title,':meta_description' => $meta_description,':meta_keywords' => $meta_keywords,':robots' => $robots, ':status' => $status, ':updated_at' => $updated_at, ':updated_by' => $updated_by));
            $res = $stmt->execute();
            //upload attachments
            include_once 'uploadHelper.php';
            $obj = new uploadHelper();
            $obj->saveAttachments( $id, $_FILES['image'], 'pages/images' );
            $obj->saveAttachments( $id, $_FILES['banner'], 'pages/banners' );
            return $res;
	    } catch(Exception $e){
	    	_pr($e,1);
	    }
    }

    public function getItem( $id, $options = array() ){
    	 try{
	        $stmt = db::con()->prepare("SELECT * FROM ".db::q(db::p().$this->table)." WHERE id=:id AND deleted=0");
	        $stmt->execute(array(':id' => $id));
	        return $stmt->fetch(PDO::FETCH_ASSOC);
         } catch(Exception $e){
	    	_pr($e,1);
	    }
    }

    public function delete(){
    	 try{
    	 	$id = $_POST['id'];
	        $stmt = db::con()->prepare("DELETE FROM ".db::q(db::p().$this->table)." WHERE id=:id");
			return $stmt->execute(array(':id' => $id));
         } catch(Exception $e){
	    	_pr($e,1);
	    }
    }
    
}