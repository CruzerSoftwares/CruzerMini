<?php 

namespace App\Controllers;
use App\Models;
use App\Models\Users as Users;

class UsersController extends AppController{
    
    public function login(){
        return $this->_view('users.login', [
            'data'      => ['title' => 'Login', 'description' => ''],
            'pageTitle' => 'Login'
        ]);
    }
    
}