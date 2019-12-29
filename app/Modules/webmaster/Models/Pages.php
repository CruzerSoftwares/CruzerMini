<?php
namespace App\Modules\Webmaster\Models;

class Pages extends App {

	public function actionDelete($id){
	    $query = $this->db->deleteFrom($this->table)->where('id', $id);
	    return $query->execute();
	}

}
