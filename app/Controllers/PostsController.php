<?php

namespace App\Controllers;
use App\Models\Posts;

class PostsController extends AppController {

    public function index(){
        
        return $this->_view('posts.index', [
            'results'      => Posts::where('status=1')->get(),
            'pageTitle' => 'Blog Posts'
        ]);
    }

    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }
        
        $data = Posts::select('id', 'title', 'image', 'description')->where('status=1')->where("alias= '".$alias."'")->first();

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('posts.view', [
            'result'      => $data,
            'pageTitle' => $data->title
        ]);
    }
    
}