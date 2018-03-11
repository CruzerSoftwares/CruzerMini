<?php 

namespace App\Controllers;

class UsersController extends AppController{
    public $pageTitle = 'User Management';
    
    public function index(){
        $this->set( 'users', $this->model()->index() );
        $this->_view();
    }
    
    public function add() {
        $this->set( 'users', $this->model()->index() );
        $this->_view();
    }
}