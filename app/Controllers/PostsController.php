<?php

namespace App\Controllers;
use App\Models\Posts;

class PostsController extends AppController {

    public function index(){
        
        return $this->_view('posts.index', [
            'data'      => Posts::all(),
            'pageTitle' => 'Blog Posts'
        ]);
    }

    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }
        
        $data = Posts::get($alias);
        
        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('posts.view', [
            'data'      => $data,
            'pageTitle' => $data['title']
        ]);
    }
    
}