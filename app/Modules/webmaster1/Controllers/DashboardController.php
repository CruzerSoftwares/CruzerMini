<?php 

class DashboardController extends ModuleController{
    public $auth_level = [1,2];

    public function index(){
        // $this->auth_level = [1,2];
        $this->set( 'pageTitle', 'Dashboard' );
        
        $this->_view('dashboard');
    }

    
}