<?php
namespace App\Modules\Webmaster\Models;

class Banners extends App {

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
			'title'        => _postData('title'),
			'description'  => _postData('description'),
			'image'        => _postData('image'),
			'status'       => _postData('status'),
			'button_text'  => _postData('button_text'),
			'button_url'   => _postData('button_url'),
			'button_color' => _postData('button_color'),
		];

	    $query = $this->db->update($this->table)->set($values)->where('id', _postData('id'));
	    return $query->execute();
	}

	public function actionAdd(){
		$values = [
			'title'        => _postData('title'),
			'description'  => _postData('description'),
			'image'        => _postData('image'),
			'status'       => _postData('status'),
			'button_text'  => _postData('button_text'),
			'button_url'   => _postData('button_url'),
			'button_color' => _postData('button_color'),
		];

	    $query = $this->db->insertInto($this->table)->values($values);
	    return $query->execute();
	}

	public function actionDelete($id){
	    $query = $this->db->deleteFrom($this->table)->where('id', $id);
	    return $query->execute();
	}

}