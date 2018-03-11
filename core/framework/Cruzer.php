<?php

/**
 * Basic functions for Cruzer Framework
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since v 1.0.0 <date: 8th Jan 2018>
 */

if( !function_exists('_config')){
  function _config ($key, $default = '' ) {
    global $_config;
    if( isset($_config) && isset($_config[$key])){
      return $_config[$key];
    }
    return $default;
  }
}

if( !function_exists('humanTiming')){
  function humanTiming ($time, $reseverse = false ) {
      if( $reseverse === true ){
        $time = strtotime($time) - time();
      } else{
        $time = time() - strtotime($time);
      }

      $time = ($time<1)? 1 : $time;
      $tokens = array (
          31536000 => 'year',
          2592000 => 'month',
          604800 => 'week',
          86400 => 'day',
          3600 => 'hour',
          60 => 'minute',
          1 => 'second'
      );

      foreach ($tokens as $unit => $text) {
          if ($time < $unit) continue;
          $numberOfUnits = floor($time / $unit);
          return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
      }
  }
}

if( !function_exists('_status')){
    function _status( $status, $formated = true, $statusFor='default' ){
        if( $formated === false && $statusFor == 'default' ){
           switch ($status) {
               case '1': $st = 'Active'; break;
               case '0': $st = 'Inactive'; break;
               case '2': $st = 'Blocked'; break;
               default: $st = 'Pending'; break;
           }
        } elseif( $formated === false && $statusFor == 'shipments' ){
           switch ($status) {
               case '1': $st = 'Approved'; break;
               case '2': $st = 'Available'; break;
               case '3': $st = 'Cancelled'; break;
               case '4': $st = 'Customs'; break;
               case '5': $st = 'Delivered'; break;
               case '6': $st = 'Delivered-Pending Payment'; break;
               case '7': $st = 'Dispenser'; break;
               case '8': $st = 'Distribution'; break;
               case '9': $st = 'Earring Collection'; break;
               case '10': $st = 'Effective'; break;
               case '11': $st = 'In Transit'; break;
               case '12': $st = 'In warehouse'; break;
               case '13': $st = 'Invoiced'; break;
               case '14': $st = 'On route'; break;
               case '15': $st = 'Packaged'; break;
               case '16': $st = 'Received Office'; break;
               default: $st = 'Pending'; break;
           }
        } elseif( $formated === true && $statusFor == 'shipments' ){
           switch ($status) {
               case '1': $st = '<span class="label label-success">Approved</span>'; break;
               case '2': $st = '<span class="label label-warning">Available</span>'; break;
               case '3': $st = '<span class="label label-danger">Cancelled</span>'; break;
               case '4': $st = '<span class="label label-info">Customs</span>'; break;
               case '5': $st = '<span class="label label-success">Delivered</span>'; break;
               case '6': $st = '<span class="label label-info">Delivered-Pending Payment</span>'; break;
               case '7': $st = '<span class="label label-info">Dispenser</span>'; break;
               case '8': $st = '<span class="label label-info">Distribution</span>'; break;
               case '9': $st = '<span class="label label-info">Earring Collection</span>'; break;
               case '10': $st = '<span class="label label-info">Effective</span>'; break;
               case '11': $st = '<span class="label label-warning">In Transit</span>'; break;
               case '12': $st = '<span class="label label-warning">In warehouse</span>'; break;
               case '13': $st = '<span class="label label-success">Invoiced</span>'; break;
               case '14': $st = '<span class="label label-info">On route</span>'; break;
               case '15': $st = '<span class="label label-success">Packaged</span>'; break;
               case '16': $st = '<span class="label label-success">Received Office</span>'; break;
               default: $st = '<span class="label label-warning">Pending</span>'; break;
           }
       } elseif( $formated === false && $statusFor == 'notifications' ){
           switch ($status) {
               case '0': $st = 'Unread'; break;
               case '1': $st = 'Viewed'; break;
               default: $st = 'Pending'; break;
           }
        } elseif( $formated === true && $statusFor == 'notifications' ){
           switch ($status) {
               case '0': $st = '<span class="label label-warning">Unread</span>'; break;
               case '1': $st = '<span class="label label-success">Viewed</span>'; break;
               default: $st = '<span class="label label-warning">Pending</span>'; break;
           }
       } else{
           switch ($status) {
               case '1': $st = '<span class="label label-success">Active</span>'; break;
               case '0': $st = '<span class="label label-warning">Inactive</span>'; break;
               case '2': $st = '<span class="label label-danger">Blocked</span>'; break;
               default: $st = '<span class="label label-warning">Pending</span>'; break;
           }
       }

       return $st;
    }
}

if( !function_exists('__status')){
    function __status( $status, $formated = true, $statusFor='default' ){
       echo _status($status, $formated, $statusFor);
    }
}


if( !function_exists('_matchUrl')){
    function _matchUrl( $urlToMatch='', $requestUrl ){
        if( preg_match('/^'.str_replace('/','\/',$urlToMatch).'/', $requestUrl)){
            return true;
        }

        return false;
    }
}

if( !function_exists('_pr')){
    function _pr( $arr=array(), $exit=false){
        echo "<pre>";
        print_r($arr);
        echo "<pre>";
        if($exit){
            exit();
        }
    }
}

if( !function_exists('__br')){
    function __br( $repeat = 1 ){
        if($repeat>0){
            for ($i=0; $i < $repeat; $i++) {
                echo "<br/>";
            }
        }
    }
}

if( !function_exists('_')){
    function _( $string = null, $print = false ){
        if(func_num_args()==2){
            if( $print ){
                echo htmlspecialchars($string);
            } else{
                 return htmlspecialchars($string);
            }
        } else{
            return htmlspecialchars($string);
        }
    }
}

if( !function_exists('__')){
    function __( $string = null, $escape = true){
        if($escape === true){
            echo htmlspecialchars($string);
        } else{
            echo $string;
        }
   }
}

if( !function_exists('_form')){
    function _form( $action='', $options = array(), $csrf = true ){
        $form = '<form action="'.$action.'"';

        if( isset($options) && isset($options['method']) ){
            $form.= ' method="'.$options['method'].'" ';
        } else{
            $form.= ' method="POST" ';
        }

        if( isset($options) && isset($options['upload']) ){
            $form.= ' enctype="multipart/form-data" ';
            unset($options['upload']);
        }

        if( isset($options) && count($options) ){
            foreach ($options as $key => $value) {
                $form.= $key.'="'.$value.'"';
            }
        }
        $form.= '>';

        if($csrf === true){
            $form.= _CSRF(true);
        }

        return $form;
   }
}


if( !function_exists('__form')){
    function __form( $action='', $options = array(), $csrf = true ){
        echo _form( $action, $options, $csrf );
   }
}


if( !function_exists('_CSRF')){
    function _CSRF( $full_field = false ){
        $token = session_id();
        $token = sha1($token.SALT);

        if( $full_field === true ){
            return '<input type="hidden" name="_csrf" id="_csrf" value="'.$token.'" style="display:none;"/>';
        }
        return $token;
   }
}

if( !function_exists('_checkCSRF')){
    function _checkCSRF( $csrf='', $terminate = true, $terminate_msg = 'Invalid Token' ){
        if( $csrf == '' ){
            $csrf = isset($_POST['_csrf']) ? $_POST['_csrf'] : (isset($_GET['_csrf']) ? $_GET['_csrf'] : '' );
        }

        if( $csrf !== _CSRF() && $terminate === true ){
            __($terminate_msg);exit;
        }

        return $csrf === _CSRF();
   }
}

if( !function_exists('_a')){
    function _a( $title, $link, $options = array(), $escape = false ){
        if( $escape === false ){
            $anchor = '<a href="'.$link.'"';

            if( isset($options) && count($options) ){
                foreach ($options as $key => $value) {
                    $anchor.= $key.'="'.$value.'"';
                }
            }
            $anchor.= '>'.$title.'</a>';
        } else{
            $anchor = '<a href="'._($link).'"';

            if( isset($options) && count($options) ){
                foreach ($options as $key => $value) {
                    $anchor.= _($key).'="'._($value).'"';
                }
            }
            $anchor.= '>'._($title).'</a>';
        }

        return $anchor;
   }
}

if( !function_exists('__a')){
    function __a( $title, $link, $options = array(), $escape = false ){
        echo _a($title, $link, $options , $escape );
   }
}

if( !function_exists('_css')){
    function _css( $links, $defer = false, $version = false ){
        $css = '';
        if( is_array($links) && count($links) ){
            foreach ($links as $key => $value) {
                if($version) $value = $value.'?v='.$version;
                $css.= '<link rel="stylesheet" href="'.$value.'" ';
                if(!is_int($key)) $css.= 'id="'.$key.'"';
                if($defer===true) $css.= ' defer ';
                $css.='>'."\r\n";
            }
        }elseif( $links!=''){
          if($version) $links = $links.'?v='.$version;
          $css.= '<link rel="stylesheet" href="'.$links.'" ';
          if($defer===true) $css.= ' defer ';
          $css.='>'."\r\n";
        }
        return $css;
   }
}

if( !function_exists('__css')){
    function __css( $links, $defer = false, $version = false ){
        echo _css( $links, $defer, $version  );
   }
}

if( !function_exists('_url')){
    function _url( $url, $absolute = true, array $options = array() ){
        if( $absolute === true && APP_UNDER_DIR === false){
          return $url;
        }

        return WEB_PATH.DS.$url;
   }
}

if( !function_exists('__url')){
    function __url( $url, $absolute = true ){
        echo _url( $url, $absolute  );
   }
}

if( !function_exists('_js')){
    function _js( $links, $defer = false, $version = false ){
        $js = '';
        if( is_array($links) && count($links) ){
            foreach ($links as $key => $value) {
                if($version) $value = $value.'?v='.$version;
                $js.= '<script src="'.$value.'" ';
                if(!is_int($key)) $css.= 'id="'.$key.'"';
                if($defer===true) $css.= ' defer ';
                $js.='></script>'."\r\n";
            }
        }elseif( $links!=''){
          if($version) $links = $links.'?v='.$version;
          $js.= '<script src="'.$links.'" ';
          if($defer===true) $css.= ' defer ';
          $js.='></script>'."\r\n";
        }
        return $js;
   }
}

if( !function_exists('__js')){
    function __js( $links, $defer = false, $version = false ){
        echo _js( $links  );
   }
}


if( !function_exists('_auth')){
    function _auth( $backend = true ){
        $for     = ($backend === true ? 'backend' : 'frontend');
        $session = array();

        if( isset($_SESSION[$for]) && isset($_SESSION[$for]['auth']) && isset($_SESSION[$for]['auth']['id']) && $_SESSION[$for]['auth']['id']>0 ){
            return true;
        }

        return false;
    }
}


if( !function_exists('_role')){
    function _role( $backend = true ){
        $for     = ($backend === true ? 'backend' : 'frontend');
        $session = array();

        if( isset($_SESSION[$for]) && isset($_SESSION[$for]['auth']) && isset($_SESSION[$for]['auth']['groups']) ){
            return $_SESSION[$for]['auth']['groups'];
        }

        return false;
    }
}


if( !function_exists('_setAuthSession')){
    function _setAuthSession( $rows, $backend = true ){
        $for = ($backend === true ? 'backend' : 'frontend');
        $filtered = array_filter($rows,function($key) use($rows) {
            return !in_array($key, ['password']);
        }, ARRAY_FILTER_USE_KEY);

        $_SESSION[$for]['auth'] = $filtered;
    }
}

if( !function_exists('_destroyAuthSession')){
    function _destroyAuthSession( $backend = true ){
        $for = ($backend === true ? 'backend' : 'frontend');
        $_SESSION[$for]['auth'] = null;
    }
}

if( !function_exists('_getAuthSession')){
    function _getAuthSession( $key = 'id', $backend = true ){
        $for = ($backend === true ? 'backend' : 'frontend');
        if( isset($_SESSION[$for]) && isset($_SESSION[$for]['auth']) && isset($_SESSION[$for]['auth']['id']) && $_SESSION[$for]['auth']['id']>0 ){
            if( $key == 'role') {
                return $_SESSION[$for]['auth']['groups'] == 1 ? 'Administrator' : 'Operator';
            }

            if( isset($_SESSION[$for]['auth'][$key]) ) {
                return $_SESSION[$for]['auth'][$key];
            }
        }
    }
}

if( !function_exists('__getAuthSession')){
    function __getAuthSession( $key = 'id', $backend = true ){
        __(_getAuthSession($key, $backend));
    }
}

if( !function_exists('_flashSession')){
    function _flashSession( $backend = true ){
        $for     = ($backend === true ? 'backend' : 'frontend');
        $session = array();

        if( isset($_SESSION[$for]) &&  isset($_SESSION[$for]['flash']) ){
            $session = $_SESSION[$for]['flash'];
        }
        $str     = '<br/><br/>';

        if( count($session) ){
            foreach ($session as $key => $value) {
                if( $key=='danger') $key2 = 'ban';
                elseif( $key=='success') $key2 = 'check';
                else $key2 = $key;

                $str.= '<div class="alert alert-'.strtolower($key).' alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-'.strtolower($key2).'"></i> '.ucfirst($key).'!</h4>
                            '.$value.'
                        </div>';
            }
        }
        $_SESSION[$for]['flash'] = null;
        return $str;
    }
}

if( !function_exists('__flashSession')){
    function __flashSession( $backend = true ){
        echo _flashSession($backend);
    }
}

if( !function_exists('_setFlash')){
    function _setFlash( $msg_type, $msg, $backend = true ){
        $for = ($backend === true ? 'backend' : 'frontend');
        $_SESSION[$for]['flash'][$msg_type] = $msg;
    }
}

if( !function_exists('_redirect')){
    function _redirect( $url, $code = 200 ){
        if($url=='back'){
            $url = $_SERVER['HTTP_REFERER'];
        }
        header("Location: ".$url);
        exit();
    }
}

if( !function_exists('_upload')){
    function _upload( $tmp_name, $attachment, $folder = '' ){
        move_uploaded_file($tmp_name, UPLOAD_DIR."$dir/$attachment");
    }
}

if( !function_exists('_slug')){
    function _slug( $string ){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }
}

if( !function_exists('_numberToCurrency')){
  function _numberToCurrency($num) {
    if(setlocale(LC_MONETARY, 'en_IN'))
      return money_format('%.0n', $num);
    else {
      $explrestunits = "" ;
      if(strlen($num)>3){
          $lastthree = substr($num, strlen($num)-3, strlen($num));
          $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
          $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
          $expunit = str_split($restunits, 2);
          for($i=0; $i<sizeof($expunit); $i++){
              // creates each of the 2's group and adds a comma to the end
              if($i==0)
              {
                  $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
              }else{
                  $explrestunits .= $expunit[$i].",";
              }
          }
          $thecash = $explrestunits.$lastthree;
      } else {
          $thecash = $num;
      }
      return '₹ ' . $thecash;
    }
}
}


if( !function_exists('getQueryStrings')){
 function getQueryStrings($url='')
    {
        $query = ltrim(strstr($url,'?'),'?');
        $arr = explode('&',$query);
        if( is_array($arr) && count($arr)){
          foreach ($arr as $value) {
            $split = explode('=',$value);
            if(isset($split[0])){
              $data[$split[0]] = isset($split[1]) ? $split[1] : null;
            }
          }
        }
        return $data;
    }
}

if( !function_exists('_requestData')){
    function _requestData($var, $default = null, $method = 'post', $format = null) {
        switch( strtolower( $method)) {
            case 'get' : //$from = $_GET;
            //for godaddy which creates problem in $_GET
            $from = getQueryStrings($_SERVER['REQUEST_URI']);
            break;
            case 'post' : $from = $_POST; break;
            case 'request' :
            case 'any' : $from = $_REQUEST; break;
        }

        if( $format == null ){
          if( isset($from[$var]) ){
            if( $default == null ) {
              if( $from[$var]== '' ) {
                return $default;
              } else {
                return $from[$var];
              }
            } else{
              if( $from[$var]== '' ) {
                return $default;
              } else {
                return $from[$var];
              }
            }
          } else{
            return $default;
          }
        }
        switch( strtolower($format)){
            case 'upper' : return isset($from[$var]) ? strtoupper($from[$var]) : $default; break;
            case 'lower' : return isset($from[$var]) ? strtolower($from[$var]) : $default; break;
            case 'int' : return isset($from[$var]) ? (int)$from[$var] : $default; break;
            case 'float' : return isset($from[$var]) ? (float)$from[$var] : $default; break;
        }
    }
}

if( !function_exists('_getData')){
    function _getData($var, $default = null, $format = null) {
        return _requestData($var, $default, 'get', $format );
    }
}

if( !function_exists('_postData')){
    function _postData($var, $default = null, $format = null) {
        return _requestData($var, $default , 'post', $format );
    }
}

if( !function_exists('_mail')){
    function _mail(array $options = array()) {
      if( isset($options['to']) && count($options['to'])){
        require_once ROOT_DIR.'/vendor/swiftmailer/swiftmailer/lib/swift_required.php';

        // Create the Transport
        $transport = Swift_SmtpTransport::newInstance('localhost', 25);
        // $transport = Swift_SmtpTransport::newInstance()
        //       ->setHost('smtp.gmail.com')
        //       ->setPort(587)
        //       ->setEncryption('tls')
        //       ->setUsername('rnk022@gmail.com')
        //       ->setPassword('whatisyourpassword');

        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);

        // Create a message
        $message = Swift_Message::newInstance($options['subject']);
        $message->setFrom([MALE_FROM => MALE_FROM_TITLE]);

        if(isset($options['to']) && count($options['to'])){
          $message->setTo($options['to']);
        }

        if(isset($options['bcc']) && count($options['bcc'])){
          $message->setBcc($options['bcc']);
        }

        if(isset($options['cc']) && count($options['cc'])){
          if( in_array( MALE_RECEIVE_CC, $options['cc'] )){
            $ccs = explode(',', MALE_RECEIVE_CC);
            foreach ( $ccs as $emailCC) {
              $message->addCc( trim($emailCC));
            }
          } else{
            $message->setCc($options['cc']);
          }
        }

        $message->setBody($options['message'],'text/html');
        $numSent = $mailer->send($message);

        if (!$numSent) {
          //TODO: email failed. log via logger
        }
      }
    }
}

function _encodeString($string) {
    $result       = $string;
    $arrayLetters = array('R', 'N', 'K', 'U', 'S', 'H', 'W', 'A');
    $limit        = count($arrayLetters) - 1;
    $num          = mt_rand(0, $limit);

    for ($i = 1; $i <= $num; $i++) {
        $result = base64_encode($result);
    }
    $result = $result . '::' . $arrayLetters[$num];
    $result = base64_encode($result);
    return str_replace('=','~~',$result);
}

function _decodeString($string) {
    $string = str_replace('~~','=',$string);
    $result = base64_decode($string);
    list($result, $letra) = explode('::', $result);
    $arrayLetters = array('R', 'N', 'K', 'U', 'S', 'H', 'W', 'A');

    for ($i = 0; $i < count($arrayLetters); $i++) {
        if ($arrayLetters[$i] == $letra) {
            for ($j = 1; $j <= $i; $j++) {
                $result = base64_decode($result);
            }
            break;
        }
    }
    return $result;
}
