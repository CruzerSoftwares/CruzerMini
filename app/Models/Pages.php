<?php
namespace App\Models;

class Pages extends App {

	protected $table = 'tbl_pages';

	public function actionGet($alias){
	    $query = $this->db->from($this->table)->where('status', 1)->where('alias', $alias);
        return $query->fetch();
	}
}