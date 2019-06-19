<?php

namespace App\Controllers;
use App\Models\Posts;

class PostsController extends AppController {

    public function index(){
        
        return $this->_view('posts.index', [
            'data'      => Posts::where('status=1')->getAsArray(),
            'pageTitle' => 'Blog Posts'
        ]);
    }

    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }
        
        $data = Posts::select('id, title, description')->where('status=1')->where("alias= '".$alias."'")->first();

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('posts.view', [
            'data'      => $data,
            'pageTitle' => $data->title
        ]);
    }
    
}