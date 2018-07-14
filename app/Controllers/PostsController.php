<?php

namespace App\Controllers;
use App\Models;
use App\Models\Posts as Posts;

class PostsController extends AppController {

    public function index(){
        $this->layout = 'posts';
        global $db;
        $query = $db->from('tbl_posts')->where('status = 1');
        
        $data = $query->fetchAll();
       
        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('posts.index', [
            'data'      => $data,
            'pageTitle' => 'Blog Posts'
        ]);
    }


    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }
        global $db;
        $query = $db->from('tbl_posts')->where('alias = ?', $alias);
        
        $data = $query->fetch();

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('posts.view', [
            'data'      => $data,
            'pageTitle' => $data['title']
        ]);
    }

}