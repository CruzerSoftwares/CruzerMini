<?php

namespace App\Modules\Webmaster\Controllers;
use App\Modules\Webmaster\Models;
use App\Modules\Webmaster\Models\Pages as Pages;

class PagesController extends AppController {

    private $model;

    public function __construct(){
        _checkAuth(true);
        parent::__construct();
    }

    public function dashboard(){
        return $this->_view('pages.dashboard', [
            'pageTitle' => 'Dashboard'
        ]);
    }

    public function index(){
        $data = Pages::all();

        return $this->_view('pages.index', [
            'data'   => $data,
            'pageTitle' => 'Pages'
        ]);
    }


    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }

        $data = Pages::find($alias);

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }

        return $this->_view('pages.view', [
            'result'      => $data,
            'pageTitle' => $data->title
        ]);
    }

    public function edit($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }

        if( null !== _postData('submit') && ( _postData('submit') =='update' || _postData('submit')=='updateContinue') ){
            _checkCSRF();

            $alias               = _postData('alias');

        		if( $alias == '' ){
                $alias = _slug(_postData('title'));
            } else{
                $alias = _slug($alias);
            }

        		$values = [
        			'title'            => _postData('title'),
        			'alias'            => $alias,
        			'description'      => _postData('description'),
        			'image'            => _postData('image'),
        			'status'           => _postData('status'),
        			'meta_description' => _postData('meta_description'),
        			'meta_keywords'    => _postData('meta_keywords'),
        			'layout'           => _postData('layout'),
        		];

        		$updated = Pages::where('id', _postData('id'))->update($values);

            if( $updated ){
                _setFlash('success','Page has been updated successfully!');

                if(_postData('submit')=='updateContinue'){
                    _redirect( _config('APP_URL').MODULE_ALIAS.'/pages/edit/'._postData('id'));
                } else{
                   _redirect( _config('APP_URL').MODULE_ALIAS.'/pages');
                }
            } else{
                _setFlash('error','Page cannot be added!');
                $data = Pages::where('alias',$alias);

                if( $data == '' || $data== null ){
                    $this->handleError('danger','Invalid Request');
                }

                return $this->_view('pages.edit', [
                    'data'      => $data,
                    'pageTitle' => $data['title']
                ]);
            }
        }

        $data = Pages::find($alias);

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }

        return $this->_view('pages.edit', [
            'result'      => $data,
            'pageTitle' => $data->title
        ]);
    }

    public function add(){
        if( null !== _postData('submit') && ( _postData('submit')=='add' || _postData('submit')=='addContinue') ){
            _checkCSRF();

            if( Pages::add() ){
                _setFlash('success','Page has been added successfully!');

                if(_postData('submit')=='addContinue'){
                    _redirect( _config('APP_URL').MODULE_ALIAS.'/pages/add');
                } else{
                   _redirect( _config('APP_URL').MODULE_ALIAS.'/pages');
                }
            } else{
                _setFlash('error','Page cannot be added!');
                return $this->_view('pages.add', [
                    'pageTitle' => 'Add Page'
                ]);
            }
        }

        return $this->_view('pages.add', [
            'pageTitle' => 'Add Page'
        ]);
    }

    public function delete($id=''){
        if( null !== _postData('submit') && _postData('submit')=='delete' ){
            _checkCSRF();

            if( Pages::delete( $id )){
                _setFlash('success','Page has been deleted successfully!');
            } else{
                _setFlash('success','Page cannot be deleted!');
            }

            _redirect('back');
        }
    }

}
