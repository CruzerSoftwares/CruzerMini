<?php
namespace App\Modules\Webmaster\Models;

class Posts extends App {

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
			'tags'             => _postData('tags'),
			'description'      => _postData('description'),
			'image'            => _postData('image'),
			'status'           => _postData('status'),
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
			'tags'             => _postData('tags'),
			'description'      => _postData('description'),
			'image'            => _postData('image'),
			'status'           => _postData('status'),
		];

	    $query = $this->db->insertInto($this->table)->values($values);
	    return $query->execute();
	}

	public function actionDelete($id){
	    $query = $this->db->deleteFrom($this->table)->where('id', $id);
	    return $query->execute();
	}

}