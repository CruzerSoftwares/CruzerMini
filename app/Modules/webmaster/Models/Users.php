<?php
namespace App\Modules\Webmaster\Models;

class Users extends App {

	public function actionGetByEmail($email){
		// echo password_hash("Indi@2O1!budd$", PASSWORD_DEFAULT);
	    $query = $this->db->from($this->table)->where('status',1)->where('email', $email);
        return $query->fetch();
	}

	public function actionUpdate(){
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

	    $query = $this->db->update($this->table)->set($values)->where('id', _postData('id'));
	    return $query->execute();
	}

	public function actionAdd(){
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

	    $query = $this->db->insertInto($this->table)->values($values);
	    return $query->execute();
	}

	public function actionDelete($id){
	    $query = $this->db->deleteFrom($this->table)->where('id', $id);
	    return $query->execute();
	}

}