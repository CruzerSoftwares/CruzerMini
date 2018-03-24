<?php 

class PagesController extends ModuleController{

    public function index(){
        $this->set( 'pages', $this->model()->index() );
        $this->set( 'pageTitle', 'Pages' );
        $this->_view();
    }

    public function add(){
        if( isset($_POST) && isset($_POST['submit']) && $_POST['submit']='add'){
            _checkCSRF();
            if( $this->model()->save() ){
                _setFlash('success','Page has been added successfully!',true);
                _redirect(ADMIN_URL.'pages');
            } else{
                _setFlash('warning','Page could not be added!',true);
            }
        } else{
            $this->set( 'pageTitle', 'Add Page' );
            $this->_view();
        }
    }


    public function update($id=''){
        if( (int)$id <=0 ){
            $this->handleError('danger','Invalid Request');
        }

        $data = $this->model()->getItem( $id );

        if( isset($_POST) && isset($_POST['submit']) && $_POST['submit']='update'){
            _checkCSRF();
            if( $this->model()->update() ){
                _setFlash('success','Page has been updated successfully!',true);
                _redirect(ADMIN_URL.'pages');
            } else{
                 _setFlash('warning','Page could not be updated!',true);
                 $this->set( 'item', $_POST );
                 $this->set( 'pageTitle', 'Update Page' );
                 $this->_view();
            }
        } else{
            $this->set( 'item', $data );
            $this->set( 'banners', $this->model()->getItemAttachments($id,'pages/banners') );
            $this->set( 'images', $this->model()->getItemAttachments($id,'pages/images') );
            $this->set( 'pageTitle', 'Update Page' );
            $this->_view();
        }
    }

    public function view($id=''){
        if( (int)$id <=0 ){
            $this->handleError('danger','Invalid Request');
        }
        
        $data = $this->model()->getItem( $id );
        $this->set( 'item', $data );
        $this->set( 'banners', $this->model()->getItemAttachments($id,'pages/banners') );
        $this->set( 'images', $this->model()->getItemAttachments($id,'pages/images') );
        $this->set( 'pageTitle', 'Page Details' );
        $this->_view();
    }

    public function delete(){
        if( isset($_POST) && isset($_POST['remove']) && $_POST['remove']='yes'){
            _checkCSRF();
            if( $this->model()->delete() ){
                _setFlash('success','Page has been deleted successfully!',true);
                _redirect(ADMIN_URL.'pages');
            } else{
                 _setFlash('warning','Page could not be deleted!',true);
                 _redirect(ADMIN_URL.'pages');
            }
        } else{
            _redirect(ADMIN_URL.'pages');
        }
    }


    
}