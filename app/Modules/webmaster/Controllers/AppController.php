<?php

namespace App\Modules\Webmaster\Controllers;

class AppController {

	protected $container = array();
    public $theme  = 'admin';
    public $layout = 'default';

    public function __construct(){

    }

    public function handleError( $errorType, $msg ) {
        ob_start();
        if( ERROR_LEVEL == 'development' ){
            $bodyContent = $msg;
        }
        $loadTheme  = empty($this->theme) ? 'default' : $this->theme;
        include ( THEME_PATH.'/'.$loadTheme.'/404.php');
        $themeNlayOut = ob_get_clean();
        echo $themeNlayOut;
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        exit;
    }


    public function _view(  $view, array $variables = array() ){
    	foreach( $variables as $key => $val ){
		    $$key = $val;
		}

		$view = str_replace('.', DS, $view);

		ob_start();
		include ( APP_DIR.DS._config('MODULE_DIR_NAME').DS.MODULE_NAME.DS.VIEW_DIR.DS.$view.'.php');
		$bodyContent = ob_get_clean();
		$loadTheme  = empty($this->theme) ? 'default' : $this->theme;
		$loadLayOut = empty($this->layout) ? 'default' : $this->layout;
		//now load template and themes
		ob_start();
		include ( THEME_PATH.'/'.$loadTheme.'/'.$loadLayOut.'.php');
		$themeNlayOut = ob_get_clean();
		echo $themeNlayOut;
    }


}