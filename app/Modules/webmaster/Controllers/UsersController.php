<?php 

namespace App\Modules\Webmaster\Controllers;
use App\Modules\Webmaster\Models;
use App\Modules\Webmaster\Models\Users as Users;

class UsersController extends AppController{
    
    public function login(){
        return $this->_view('users.login', [
            'data'      => ['title' => 'Login', 'description' => ''],
            'pageTitle' => 'CruzerMini Login'
        ]);
    }
    
}