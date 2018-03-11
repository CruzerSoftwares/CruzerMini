<?php 

class Auth extends App{
    
    public $table;

    public function __construct()
    {
    	$this->table = 'users';
    }
    
    public function authenticate(){
        try{
            $stmt = db::con()->prepare("SELECT id, name, surname, email, password, groups FROM ".db::q(db::p().$this->table)." WHERE status=1 AND groups IN(1,2) AND email=:email");
            $stmt->execute(array( ':email' => $_POST['email']));
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if( password_verify( $_POST['password'], $rows['password'] ) ){
            	_setAuthSession($rows, true);
            } else{
            	_setFlash('warning','Invalid Email/Password!',true);
            	return false;
            }
         } catch(Exception $e){
            _pr($e,1);
        }
    }

}