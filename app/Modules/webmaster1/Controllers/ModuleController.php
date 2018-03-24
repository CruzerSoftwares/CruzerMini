<?php 

class ModuleController extends BaseController{
    public $theme  = 'ganga';
    public $layout = 'default';

    public $auth = true;
    public $auth_level = 1;
    
    public function __construct()
    {
    	// $this->set( 'notifications', $this->getNotifications() );
    }

    
    public function getNotifications(){
        // return $this->model('Notifications')->getUnread();
    }


}