<?php 

class AuthController extends ModuleController{
    public $layout = 'login';
    
    public function index(){
        $this->auth = false;

        if( isset($_POST) && isset($_POST['submit']) && $_POST['submit']='login'){
            _checkCSRF();
            if( $this->model('Auth')->authenticate() !== false ){
                _redirect(ADMIN_LOGIN_REDIRECT);
            } else{
            	_redirect(ADMIN_LOGOUT_REDIRECT);
            }
        } else{
        	if( _auth( true ) === true){
        		_redirect(ADMIN_LOGIN_REDIRECT);
        	}
            $this->set( 'pageTitle', 'Login' );
        	$this->_view('login');
        }
    }

	public function logout(){
        $this->auth = false;
        _destroyAuthSession( true );
        _redirect(ADMIN_LOGOUT_REDIRECT);
    }

	public function forgot_password(){
        $this->auth = false;
        $this->set( 'pageTitle', 'Forgot Password' );
        $this->_view('forgot-password');
    }

}