<?php
namespace App\Models;

class Posts extends App {
	protected $table = 'tbl_posts';

	public function actionGet($alias){
	    $query = $this->db->from($this->table)->where('status', 1)->where('alias', $alias);
            return $query->fetch();
	}
	
	public function actionAll(){
	    $query = $this->db->from($this->table);
       	    return $query->fetchAll();
	}
	
}