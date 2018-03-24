<?php

namespace App\Modules\Webmaster\Controllers;
use App\Modules\Webmaster\Models;
use App\Modules\Webmaster\Models\Pages as Pages;

class PagesController extends AppController {

    public function index($alias=''){
        if(!$alias) $alias = 'home';

        return $this->_view('pages.home', [
            'data'      => [
                'title'       => 'CruzerMini - PHP 7 CMS built on top of Cruzer Framework',
                'description' => '<div class="jumbotron">
                        <div class="container">
                          <h1 class="display-5">CruzerMini</h1>
                          <p>Powerfull PHP 7 CMS built on top of Cruzer Framework. Best suited for smaller and simple projects.</p>
                          <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
                        </div>
                      </div><h2>Features</h2>
                    <ul>
                    <li>MVC Style Design</li>
                    <li>Small in Size, yet powerfull enough and loads faster</li>
                    <li>Built in Authentication</li>
                    <li>Built in CSRF Protection</li>
                    <li>Built in Backend Panel</li>
                    <li>Markdown Editor Integrated</li>
                    <li>No Stupid Configurations</li>
                    <li>Bootstrap 4 Responsive Theme</li>
                    <li>No need to use Database if you don\'t need it.</li>
                    <li>Supports multiple Database support if you need e.g. Flat Files, SQLite, MySQL, SQL Server, Oracle, Postgress, MongoDB and many more coming soon.</li>
                    </ul>'
                ],
            'pageTitle' => 'CruzerMini - PHP 7 CMS built on top of Cruzer Framework'
        ]);
    }


    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }

        $data = Pages::where('alias', $alias)->get()->first();

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