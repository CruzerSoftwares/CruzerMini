<?php 

namespace App\Modules\Webmaster\Controllers;
use App\Modules\Webmaster\Models;
use App\Modules\Webmaster\Models\Users as Users;

class UsersController extends AppController{
    
    public function login(){
        _checkAuth(true, true);
        $this->layout = 'login';

        if(isset($_POST['actiontask'])){
            $data = Users::getByEmail(_postData('email'));
        
            if ($data !=null && password_verify(_postData('password'), $data['password'])) {
                _setAuthSession($data);
                _checkAuth(true, true);
            } else {
                _setFlash('error', 'Invalid Email/Password!');
                return $this->_view('users.login', [
                    'data'      => ['title' => 'Login', 'description' => ''],
                    'pageTitle' => 'Login'
                ]);
            }
        }
        
        return $this->_view('users.login', [
            'data'      => ['title' => 'Login', 'description' => ''],
            'pageTitle' => 'Login'
        ]);
    } 

    public function logout(){
        _destroyAuthSession(true);
        _checkAuth(true, true);
        
        return $this->_view('users.login', [
            'data'      => ['title' => 'Login', 'description' => ''],
            'pageTitle' => 'Login'
        ]);
    }
    
}