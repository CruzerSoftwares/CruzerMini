<?php

namespace App\Modules\Webmaster\Controllers;
use App\Modules\Webmaster\Models;
use App\Modules\Webmaster\Models\Posts as Posts;

class PostsController extends AppController {
    
    private $model;

    public function __construct(){
        _checkAuth(true);
        parent::__construct();
    }

    public function index(){
        $data = Posts::get()->asArray();

        return $this->_view('posts.index', [
            'data'      => $data,
            'pageTitle' => 'Posts'
        ]);
    }


    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }

        $data = Posts::find($alias)->asArray();

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('posts.view', [
            'data'      => $data,
            'pageTitle' => $data['title']
        ]);
    }

    public function edit($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }

        if( null !== _postData('submit') && ( _postData('submit') =='update' || _postData('submit')=='updateContinue') ){
            _checkCSRF();
            $post = new Posts();
            $alias               = _postData('alias');
            if( $alias == '' ){
                $alias = _slug(_postData('title'));
            } else{
                $alias = _slug($alias);
            }

            $post->title       = _postData('title');
            $post->alias       = $alias;
            $post->tags        = _postData('tags');
            $post->description = _postData('description');
            $post->image       = _postData('image');
            $post->status      = _postData('status');
            $post->id      = _postData('id');
            $save = new \Dolphin\Mapper\Save();
            var_dump($post);
            $save->save($post);

            if( $post::update() ){
                _setFlash('success','Post has been updated successfully!');

                if(_postData('submit')=='updateContinue'){
                    _redirect( _config('APP_URL').MODULE_ALIAS.'/posts/edit/'._postData('id'));
                } else{
                   _redirect( _config('APP_URL').MODULE_ALIAS.'/posts'); 
                }
            } else{
                _setFlash('error','Post cannot be added!');
                $data = Posts::find($alias)->asArray();

                if( $data == '' || $data== null ){
                    $this->handleError('danger','Invalid Request');
                }

                return $this->_view('posts.edit', [
                    'data'      => $data,
                    'pageTitle' => $data['title']
                ]);
            }
        }

        $data = Posts::find($alias)->asArray();

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }

        return $this->_view('posts.edit', [
            'data'      => $data,
            'pageTitle' => $data['title']
        ]);
    }

    public function add(){
        if( null !== _postData('submit') && ( _postData('submit')=='add' || _postData('submit')=='addContinue') ){
            _checkCSRF();

            if( Posts::add() ){
                _setFlash('success','Post has been added successfully!');

                if(_postData('submit')=='addContinue'){
                    _redirect( _config('APP_URL').MODULE_ALIAS.'/posts/add');
                } else{
                   _redirect( _config('APP_URL').MODULE_ALIAS.'/posts'); 
                }
            } else{
                _setFlash('error','Post cannot be added!');
                return $this->_view('posts.add', [
                    'pageTitle' => 'Add Post'
                ]);
            }
        }

        return $this->_view('posts.add', [
            'pageTitle' => 'Add Post'
        ]);
    }

    public function delete($id=''){
        if( null !== _postData('submit') && _postData('submit')=='delete' ){
            _checkCSRF();

            if( Posts::delete( $id )){
                _setFlash('success','Post has been deleted successfully!');
            } else{
                _setFlash('success','Post cannot be deleted!');
            }

            _redirect('back');
        }
    }

}