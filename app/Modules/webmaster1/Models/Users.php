<?php 

class Users extends App{
    
    public function index(){
        return $this->fetch('all');
    }
    
}