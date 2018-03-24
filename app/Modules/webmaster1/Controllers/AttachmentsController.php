<?php 

class AttachmentsController extends ModuleController{

    public function remove(){
        if( isset($_POST) && isset($_POST['remove']) && $_POST['remove']='yes'){
            _checkCSRF();
            if( $this->model()->remove() ){
                _setFlash('success','Attachment has been deleted successfully!',true);
                _redirect('back');
            } else{
                 _setFlash('warning','Attachment could not be deleted!',true);
                 _redirect('back');
            }
        } else{
            _redirect('back');
        }
    }

    public function remove_image(){
        if( isset($_POST) && isset($_POST['remove']) && $_POST['remove']='yes'){
            _checkCSRF();
            if( $this->model()->remove_image() ){
                _setFlash('success','Image has been deleted successfully!',true);
                _redirect('back');
            } else{
                 _setFlash('warning','Image could not be deleted!',true);
                 _redirect('back');
            }
        } else{
            _redirect('back');
        }
    }

    public function remove_banner(){
        if( isset($_POST) && isset($_POST['remove']) && $_POST['remove']='yes'){
            _checkCSRF();
            if( $this->model()->remove_image() ){
                _setFlash('success','Banner has been deleted successfully!',true);
                _redirect('back');
            } else{
                 _setFlash('warning','Banner could not be deleted!',true);
                 _redirect('back');
            }
        } else{
            _redirect('back');
        }
    }

    
}