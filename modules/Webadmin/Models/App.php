<?php 

class App extends BaseModel{
    
    public function index(){
        return $this->fetch('all');
    }

}