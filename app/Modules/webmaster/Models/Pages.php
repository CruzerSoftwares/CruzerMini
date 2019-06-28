<?php
namespace App\Modules\Webmaster\Models;

class Pages extends App {

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