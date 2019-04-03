<?php 

namespace App\Controllers;

class UsersController extends AppController{
    
    public function login(){
        return $this->_view('users.login', [
            'data'      => ['title' => 'Login', 'description' => ''],
            'pageTitle' => 'Login'
        ]);
    }
    
}