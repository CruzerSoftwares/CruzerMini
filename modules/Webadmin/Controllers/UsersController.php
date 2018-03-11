<?php 

class UsersController extends ModuleController{
    
    public function index(){
        $this->set( 'users', $this->model()->index() );
        $this->layout = 'default';
        $this->pageTitle = 'User Management List';
        $this->_view();
    }
    

}