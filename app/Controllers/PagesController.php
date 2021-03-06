<?php

namespace App\Controllers;
use App\Models\Pages;

class PagesController extends AppController {

    public function index(){
      // _pr(Pages::select('description')->where("alias", 'home')->first());die;
        return $this->_view('pages.home', [
            'data'      => Pages::select('description')->where("alias", 'home')->first(),
            'pageTitle' => APP_TITLE
        ]);
    }

    public function view($alias=''){
        if( $alias == '' ){
            $this->handleError('danger','Invalid Request');
        }

        $data = Pages::where("alias", $alias)->first();

        if( !isset($data->id) ){
            $this->handleError('danger','Invalid Request');
        }
        return $this->_view('pages.view', [
            'data'      => $data,
            'pageTitle' => $data->title
        ]);
    }


    public function contact(){
        return $this->_view('pages.contact', [
            'data' =>  Pages::where("alias", 'contact-us')->first(),
            'pageTitle' => 'Contact Us'
        ]);
    }

    public function contactForm(){
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: "._postData('email') . "\r\n" .
                    "CC: info@gmail.com";
        $message = "A contact message from "._postData('name');
        $message.= "<br/><br/><b>Message:</b> <br/><br/>"._postData('message');
        $subject = _postData('subject');
        if($subject=='') $subject = 'Contact Email';

        mail('rn.kushwaha022@gmail.com', $subject, $message, $headers);

        _setFlash('success','Your message has been sent successfully!', false);

        return $this->_view('pages.contact', [
            'data' =>  Pages::where("alias", 'contact-us')->first(),
            'pageTitle' => 'Contact Us'
        ]);
    }

}
