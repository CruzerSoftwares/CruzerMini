<?php

namespace App\Controllers;
use App\Models;
use App\Models\Pages as Pages;

class PagesController extends AppController {

    public function index($alias=''){
        if(!$alias) $alias = 'home';
        global $db;
        $query = $db->from('tbl_pages')->where('alias = ?', $alias);
        $data = $query->fetch();

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('pages.view', [
            'data'      => $data,
            'pageTitle' => $data['title']
        ]);
    }


    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }
        global $db;
        $query = $db->from('tbl_pages')->where('alias = ?', $alias);
        
        $data = $query->fetch();

        if( $data == '' || $data== null ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('pages.view', [
            'data'      => $data,
            'pageTitle' => $data['title']
        ]);
    }


    public function contact(){
        return $this->_view('pages.view', [
            'data'      => ['title' => 'CruzerMini', 'description' => '<p>For help and support you can contact us <a href="mailto:support@cruzersoftwares.com">support@cruzersoftwares.com</a>.</p>'],
            'pageTitle' => 'CruzerMini Home'
        ]);
    }

}