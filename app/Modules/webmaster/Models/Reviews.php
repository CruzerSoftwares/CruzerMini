<?php
namespace App\Modules\Webmaster\Models;

class Reviews extends App {

	protected $table = 'tbl_testimonials';

	public function actionAll(){
	    $query = $this->db->from($this->table);
        return $query->fetchAll();
	}

	public function actionGet($id){
	    $query = $this->db->from($this->table)->where('id', $id);
        return $query->fetch();
	}

	public function actionUpdate(){
		$values = [
			'name'        => _postData('name'),
			'title'       => _postData('title'),
			'description' => _postData('description'),
			'image'       => _postData('image'),
			'status'      => _postData('status'),
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
			'name'        => _postData('name'),
			'title'       => _postData('title'),
			'description' => _postData('description'),
			'image'       => _postData('image'),
			'status'      => _postData('status'),
		];

	    $query = $this->db->insertInto($this->table)->values($values);
	    return $query->execute();
	}

	public function actionDelete($id){
	    $query = $this->db->deleteFrom($this->table)->where('id', $id);
	    return $query->execute();
	}

}