<?php 

class Attachments extends App{
    
    public $table;

    public function __construct()
    {
    	$this->table = 'uploads';
    }
    

    public function remove(){
         try{
            $id = $_POST['id'];
            $stmt = db::con()->prepare("DELETE FROM ".db::q(db::p().$this->table)." WHERE id=:id");
            return $stmt->execute(array(':id' => $id));
         } catch(Exception $e){
            _pr($e,1);
        }
    }

    public function remove_image(){
         try{
            $id = $_POST['id'];
            $stmt = db::con()->prepare("UPDATE ".db::q(db::p().$_POST['ref'])." SET image=null WHERE id=:id");
            return $stmt->execute(array(':id' => $id));
         } catch(Exception $e){
            _pr($e,1);
        }
    }

    public function remove_banner(){
    	 try{
    	 	$id = $_POST['id'];
	        $stmt = db::con()->prepare("UPDATE ".db::q(db::p().$_POST['ref'])." SET banner=null WHERE id=:id");
			return $stmt->execute(array(':id' => $id));
         } catch(Exception $e){
	    	_pr($e,1);
	    }
    }
    
}