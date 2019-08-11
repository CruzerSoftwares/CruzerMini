<?php 

namespace App\Modules\Webmaster\Controllers;
use App\Modules\Webmaster\Models\Users;

class UsersController extends AppController{
    
    public function login(){// echo password_hash("cruzermini", PASSWORD_DEFAULT);
        _checkAuth(true, true);
        $this->layout = 'login';

        if(isset($_POST['actiontask'])){
            $data = Users::where('status=1')->where('email = :email', _postData('email'))->first();
            if ($data !=null && isset($data->password) && password_verify(_postData('password'), $data->password)) {
                _setAuthSession(json_decode(json_encode($data), true));
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
