<?php

/**
 * Basic functions for Cruzer Framework
 * @author RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @since v 1.0.0 <date: 8th Jan 2018>
 */

define('DATEFORMAT', 'd M, Y');
define('DATETIMEFORMAT', 'd M, Y h:i A');

if (!function_exists('_date')) {
    function _date($datetime, $time = true, $format = null)
    {
        if ($datetime == null || $datetime=='' || $datetime=='0000-00-00' || $datetime=='0000-00-00 00:00:00') {
            return;
        }
        if ($time === true) {
            if ($format == null) {
                return date(DATETIMEFORMAT, strtotime($datetime));
            } else {
                return date($format, strtotime($datetime));
            }
        } else {
            if ($format == null) {
                return date(DATEFORMAT, strtotime($datetime));
            } else {
                return date($format, strtotime($datetime));
            }
        }
    }
}

if (!function_exists('__date')) {
    function __date($datetime, $time = true, $format = null)
    {
        echo _date($datetime, $time, $format);
    }
}

if (!function_exists('_toDBDate')) {
    function _toDBDate($datetime, $options = array())
    {
        if ($datetime==null || $datetime=='0000-00-00' || $datetime=='0000-00-00 00:00:00') {
            return;
        }

        $dates = explode(' ', $datetime);
        $datePart = $dates[0];
        $parts = explode('/', $datePart);

        if (isset($options['format']) && $options['format']=='US') {
            return $parts[2].'-'.$parts[0].'-'.$parts[1];
        }
        return $parts[2].'-'.$parts[1].'-'.$parts[0];
    }
}

if (!function_exists('_config')) {
    function _config($key, $default = '')
    {
        global $_config;
        if (isset($_config) && isset($_config[$key])) {
            return $_config[$key];
        }
        return $default;
    }
}

if (!function_exists('humanTiming')) {
    function humanTiming($time, $reseverse = false)
    {
        if ($reseverse === true) {
            $time = strtotime($time) - time();
        } else {
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
            if ($time < $unit) {
                continue;
            }
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
}

if (!function_exists('_status')) {
    function _status($status, $formated = true, $statusFor = 'default')
    {
        if ($formated === false && $statusFor == 'default') {
            switch ($status) {
                case '1':
                    $statusFormated = 'Active';
                    break;
                case '0':
                    $statusFormated = 'Inactive';
                    break;
                case '2':
                    $statusFormated = 'Blocked';
                    break;
                default:
                    $statusFormated = 'Pending';
                    break;
            }
        } else {
            switch ($status) {
                case '1':
                    $statusFormated = '<span class="label label-success">Active</span>';
                    break;
                case '0':
                    $statusFormated = '<span class="label label-warning">Inactive</span>';
                    break;
                case '2':
                    $statusFormated = '<span class="label label-danger">Blocked</span>';
                    break;
                default:
                    $statusFormated = '<span class="label label-warning">Pending</span>';
                    break;
            }
        }

        return $statusFormated;
    }
}

if (!function_exists('__status')) {
    function __status($status, $formated = true, $statusFor = 'default')
    {
        echo _status($status, $formated, $statusFor);
    }
}

if (!function_exists('_matchUrl')) {
    function _matchUrl($urlToMatch = '', $requestUrl = '')
    {
        if (preg_match('/^'.str_replace('/', '\/', $urlToMatch).'/', $requestUrl)) {
            return true;
        }

        return false;
    }
}

if (!function_exists('_pr')) {
    function _pr($arr = array(), $exit = false)
    {
        echo "<pre>";
        print_r($arr);
        echo "<pre>";
        if ($exit) {
            exit();
        }
    }
}

if (!function_exists('__br')) {
    function __br($repeat = 1)
    {
        if ($repeat>0) {
            for ($i=0; $i < $repeat; $i++) {
                echo "<br/>";
            }
        }
    }
}

if (!function_exists('_')) {
    function _($string = null, $print = false)
    {
        if (func_num_args()==2) {
            if ($print) {
                echo htmlspecialchars($string);
            } else {
                 return htmlspecialchars($string);
            }
        } else {
            return htmlspecialchars($string);
        }
    }
}

if (!function_exists('__')) {
    function __($string = null, $escape = true)
    {
        if ($escape === true) {
            echo htmlspecialchars($string);
        } else {
            echo $string;
        }
    }
}

if (!function_exists('_form')) {
    function _form($action = '', $options = array(), $csrf = true)
    {
        $form = '<form accept-charset="utf-8" action="'.$action.'"';

        if (isset($options) && isset($options['method'])) {
            $form.= ' method="'.$options['method'].'" ';
        } else {
            $form.= ' method="POST" ';
        }

        if (isset($options) && isset($options['upload'])) {
            $form.= ' enctype="multipart/form-data" ';
            unset($options['upload']);
        }

        if (isset($options) && count($options)) {
            foreach ($options as $key => $value) {
                $form.= $key.'="'.$value.'" ';
            }
        }
        $form.= '>';

        if ($csrf === true) {
            $form.= _CSRF(true);
        }

        return $form;
    }
}

if (!function_exists('__form')) {
    function __form($action = '', $options = array(), $csrf = true)
    {
        echo _form($action, $options, $csrf);
    }
}

if (!function_exists('_CSRF')) {
    function _CSRF($full_field = false)
    {
        $token = session_id();
        $token = sha1($token._config('SECURITY_SALT'));

        if ($full_field === true) {
            return '<input type="hidden" name="_csrf" id="_csrf" value="'.$token.'" style="display:none;"/>';
        }
        return $token;
    }
}

if (!function_exists('_checkCSRF')) {
    function _checkCSRF($csrf = '', $terminate = true, $terminate_msg = 'Invalid Token')
    {
        if ($csrf == '') {
            $csrf = isset($_POST['_csrf']) ? $_POST['_csrf'] : (isset($_GET['_csrf']) ? $_GET['_csrf'] : '' );
        }

        if ($csrf !== _CSRF() && $terminate === true) {
            __($terminate_msg);
            exit;
        }

        return $csrf === _CSRF();
    }
}

if (!function_exists('_a')) {
    function _a($title, $link, $options = array(), $escape = false)
    {
        if ($escape === false) {
            $anchor = '<a href="'.$link.'" ';

            if (isset($options) && count($options)) {
                foreach ($options as $key => $value) {
                    $anchor.= $key.'="'.$value.'" ';
                }
            }
            $anchor.= '>'.$title.'</a>';
        } else {
            $anchor = '<a href="'._($link).'" ';

            if (isset($options) && count($options)) {
                foreach ($options as $key => $value) {
                    $anchor.= _($key).'="'._($value).'" ';
                }
            }
            $anchor.= '>'._($title).'</a>';
        }

        return $anchor;
    }
}

if (!function_exists('__a')) {
    function __a($title, $link, $options = array(), $escape = false)
    {
        echo _a($title, $link, $options, $escape);
    }
}

if (!function_exists('_css')) {
    function _css($links, $defer = false, $version = false)
    {
        $css = '';
        if (is_array($links) && count($links)) {
            foreach ($links as $key => $value) {
                if ($version) {
                    $value = $value.'?v='.$version;
                }
                $css.= '<link rel="stylesheet" href="'.str_replace(['http://','https://'], '//', $value).'" ';
                if (!is_int($key)) {
                    $css.= 'id="'.$key.'" ';
                }
                if ($defer===true) {
                    $css.= ' defer ';
                }
                $css.='>'."\r\n";
            }
        } elseif ($links!='') {
            if ($version) {
                $links = $links.'?v='.$version;
            }
            $css.= '<link rel="stylesheet" href="'.str_replace(['http://','https://'], '//', $links).'" ';
            if ($defer===true) {
                $css.= ' defer ';
            }
            $css.='>'."\r\n";
        }
        return $css;
    }
}

if (!function_exists('__css')) {
    function __css($links, $defer = false, $version = false)
    {
        echo _css($links, $defer, $version);
    }
}

if (!function_exists('_url')) {
    function _url($url, $absolute = true)
    {
        if ($absolute === true) {
            return $url;
        }

        return APP_URL.$url;
    }
}

if (!function_exists('__url')) {
    function __url($url, $absolute = true)
    {
        echo _url($url, $absolute);
    }
}

if (!function_exists('_js')) {
    function _js($links, $defer = false, $version = false)
    {
        $js = '';
        if (is_array($links) && count($links)) {
            foreach ($links as $key => $value) {
                if ($version) {
                    $value = $value.'?v='.$version;
                }
                $js.= '<script src="'.str_replace(['http://','https://'], '//', $value).'" ';
                if (!is_int($key)) {
                    $js.= 'id="'.$key.'" ';
                }
                if ($defer===true) {
                    $js.= ' defer ';
                }
                $js.='></script>'."\r\n";
            }
        } elseif ($links!='') {
            if ($version) {
                $links = $links.'?v='.$version;
            }
            $js.= '<script src="'.str_replace(['http://','https://'], '//', $links).'" ';
            if ($defer===true) {
                $js.= ' defer ';
            }
            $js.='></script>'."\r\n";
        }
        return $js;
    }
}

if (!function_exists('__js')) {
    function __js($links, $defer = false, $version = false)
    {
        echo _js($links, $defer, $version);
    }
}

if (!function_exists('_auth')) {
    function _auth($backend = true)
    {
        $for     = ($backend === true ? 'backend' : 'frontend');

        if (isset($_SESSION[$for]) &&
            isset($_SESSION[$for]['auth']) &&
            isset($_SESSION[$for]['auth']['id']) &&
            $_SESSION[$for]['auth']['id']>0) {
            return true;
        }

        return false;
    }
}

if (!function_exists('_checkAuth')) {
    function _checkAuth($backend = true, $redirectIfLogin = false)
    {
        if (_auth($backend) === false) {
            if ($backend === true) {
                if ($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] != str_replace(
                    array('http://','https://'),
                    '',
                    _config('APP_URL')._config('ADMIN_LOGOUT_REDIRECT')
                )) {
                    _redirect(_config('APP_URL')._config('ADMIN_LOGOUT_REDIRECT'));
                }
            } else {
                _redirect(_config('APP_URL')._config('LOGOUT_REDIRECT'));
            }
        }

        if (_auth($backend) === true) {
            if ($redirectIfLogin === true && $backend === true) {
                _redirect(_config('APP_URL')._config('ADMIN_LOGIN_REDIRECT'));
            } elseif ($redirectIfLogin === true && $backend === false) {
                _redirect(_config('APP_URL')._config('LOGIN_REDIRECT'));
            }
        }
    }
}

if (!function_exists('_role')) {
    function _role($backend = true)
    {
        $for     = ($backend === true ? 'backend' : 'frontend');

        if (isset($_SESSION[$for]) &&
            isset($_SESSION[$for]['auth']) &&
            isset($_SESSION[$for]['auth']['groups'])) {
            return $_SESSION[$for]['auth']['groups'];
        }

        return false;
    }
}

if (!function_exists('_setAuthSession')) {
    function _setAuthSession($rows, $backend = true)
    {
        $for = ($backend === true ? 'backend' : 'frontend');
        $filtered = array_filter($rows, function ($key) {
            return !in_array($key, ['password']);
        }, ARRAY_FILTER_USE_KEY);

        $_SESSION[$for]['auth'] = $filtered;
    }
}

if (!function_exists('_destroyAuthSession')) {
    function _destroyAuthSession($backend = true)
    {
        $for = ($backend === true ? 'backend' : 'frontend');
        $_SESSION[$for]['auth'] = null;
    }
}

if (!function_exists('_getAuthSession')) {
    function _getAuthSession($key = 'id', $backend = true)
    {
        $for = ($backend === true ? 'backend' : 'frontend');
        if (isset($_SESSION[$for]) &&
            isset($_SESSION[$for]['auth']) &&
            isset($_SESSION[$for]['auth']['id']) &&
            $_SESSION[$for]['auth']['id']>0) {
            if ($key == 'role') {
                return $_SESSION[$for]['auth']['groups'] == 1 ? 'Administrator' : 'Operator';
            }

            if (isset($_SESSION[$for]['auth'][$key])) {
                return $_SESSION[$for]['auth'][$key];
            }
        }
    }
}

if (!function_exists('__getAuthSession')) {
    function __getAuthSession($key = 'id', $backend = true)
    {
        __(_getAuthSession($key, $backend));
    }
}

if (!function_exists('_flashSession')) {
    function _flashSession($backend = true)
    {
        $for     = ($backend === true ? 'backend' : 'frontend');
        $session = array();
        $str     = '';
        
        if (isset($_SESSION[$for]) &&  isset($_SESSION[$for]['flash'])) {
            $session = $_SESSION[$for]['flash'];
        }

        if (count($session)) {
            $str     = '<br/><br/>';
            foreach ($session as $key => $value) {
                if ($backend===true) {
                    $key2 = 'warning';
                    if ($key=='danger') {
                        $key2 = 'error';
                    } elseif ($key=='error') {
                        $key2 = 'error';
                    } elseif ($key=='success') {
                        $key2 = 'check_circle';
                    } elseif ($key=='warning') {
                        $key2 = 'warning';
                    } elseif ($key=='info') {
                        $key2 = 'priority_high';
                    }

                    $str.= '<div class="card green lighten-1 flashContainer">
                            <div class="row">
                              <div class="col m10">
                                <div class="card-content white-text">
                                  <h5><i class="material-icons small-icons">'.$key2.'</i> '.ucfirst($key).'</h5>
                                  <p>'.$value.'</p>
                              </div>
                            </div>
                            <div class="col m2">
                              <a href="javascript:;" class="right white-text" target="_self">
                                <i class="material-icons small-icons flashClose">close</i>
                              </a>
                            </div>
                          </div>
                         </div>';
                } else {
                    $str.= '<div class="alert alert-'.$key.' alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                            <strong>'.ucfirst($key).'</strong> '.$value.'
                          </div>';
                }
            }
        }

        $_SESSION[$for]['flash'] = null;
        return $str;
    }
}

if (!function_exists('__flashSession')) {
    function __flashSession($backend = true)
    {
        echo _flashSession($backend);
    }
}

if (!function_exists('_setFlash')) {
    function _setFlash($msg_type, $msg, $backend = true)
    {
        $for = ($backend === true ? 'backend' : 'frontend');
        $_SESSION[$for]['flash'][$msg_type] = $msg;
    }
}

if (!function_exists('_redirect')) {
    function _redirect($url, $code = 200)
    {
        if ($url=='back') {
            $url = $_SERVER['HTTP_REFERER'];
        }
        header("Location: ".$url);
        exit();
    }
}

if (!function_exists('_upload')) {
    function _upload($tmp_name, $attachment)
    {
        move_uploaded_file($tmp_name, UPLOAD_DIR."$attachment");
    }
}

if (!function_exists('_slug')) {
    function _slug($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }
}

if (!function_exists('_numberToCurrency')) {
    function _numberToCurrency($num)
    {
        if (setlocale(LC_MONETARY, 'en_IN')) {
            return money_format('%.0n', $num);
        }
        
        $explrestunits = "" ;
        if (strlen($num)>3) {
            $lastthree = substr($num, strlen($num)-3, strlen($num));
             // extracts the last three digits
            $restunits = substr($num, 0, strlen($num)-3);
            // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits;

            $expunit = str_split($restunits, 2);
            $sizeof  = sizeof($expunit);
            for ($i=0; $i<$sizeof; $i++) {
                // creates each of the 2's group and adds a comma to the end
                if ($i==0) {
                    // if is first value , convert into integer
                    $explrestunits .= (int)$expunit[$i].",";
                } else {
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

if (!function_exists('getQueryStrings')) {
    function getQueryStrings($url = '')
    {
        $data = array();
        $query = ltrim(strstr($url, '?'), '?');
        $arr = explode('&', $query);
        if (is_array($arr) && count($arr)) {
            foreach ($arr as $value) {
                $split = explode('=', $value);
                if (isset($split[0])) {
                    $data[$split[0]] = isset($split[1]) ? $split[1] : null;
                }
            }
        }
        return $data;
    }
}

if (!function_exists('_requestData')) {
    function _requestData($var, $default = null, $method = 'post', $format = null)
    {
        switch (strtolower($method)) {
            case 'get': //$from = $_GET;
            //for godaddy which creates problem in $_GET
                $from = getQueryStrings($_SERVER['REQUEST_URI']);
                break;
            case 'post':
                $from = $_POST;
                break;
            case 'request':
            case 'any':
                $from = $_REQUEST;
                break;
        }

        if ($format == null) {
            if (!isset($from[$var])) {
                return $default;
            }

            if ($default == null) {
                if ($from[$var]== '') {
                    return $default;
                }
                
                return $from[$var];
            } else {
                if ($from[$var]== '') {
                    return $default;
                }

                return $from[$var];
            }
            
        }
        
        switch (strtolower($format)) {
            case 'upper':
                $retVal = isset($from[$var]) ? strtoupper($from[$var]) : $default;
            break;
            case 'lower':
                $retVal = isset($from[$var]) ? strtolower($from[$var]) : $default;
            break;
            case 'int':
                $retVal = isset($from[$var]) ? (int)$from[$var] : $default;
            break;
            case 'float':
                $retVal = isset($from[$var]) ? (float)$from[$var] : $default;
            break;
        }
        return $retVal;
    }
}

if (!function_exists('_getData')) {
    function _getData($var, $default = null, $format = null)
    {
        return _requestData($var, $default, 'get', $format);
    }
}

if (!function_exists('_postData')) {
    function _postData($var, $default = null, $format = null)
    {
        return _requestData($var, $default, 'post', $format);
    }
}

function _encodeString($string)
{
    $result       = $string;
    $arrayLetters = array('C', 'R', 'U', 'Z', 'M', 'I', 'N', 'I');
    $limit        = count($arrayLetters) - 1;
    $num          = mt_rand(0, $limit);

    for ($i = 1; $i <= $num; $i++) {
        $result = base64_encode($result);
    }
    $result = $result . '::' . $arrayLetters[$num];
    $result = base64_encode($result);
    return str_replace('=', '~~', $result);
}

function _decodeString($string)
{
    $string = str_replace('~~', '=', $string);
    $result = base64_decode($string);
    list($result, $letra) = explode('::', $result);
    $arrayLetters = array('C', 'R', 'U', 'Z', 'M', 'I', 'N', 'I');
    $totalCount = count($arrayLetters);

    for ($i = 0; $i <$totalCount; $i++) {
        if ($arrayLetters[$i] == $letra) {
            for ($j = 1; $j <= $i; $j++) {
                $result = base64_decode($result);
            }
            break;
        }
    }
    return $result;
}
