<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	var $tableName, $tableId;

	//funtion untuk memanggil semua fungsi yang dipakai
	function __construct(){
		parent::__construct();
		$this->tableName 	= "user";
		$this->tableId		= "id_user";
	}


	function create($data){

		if($data){
			$query = $this->db->insert($this->tableName, $data); 
			//terlebih dahulu atur autoload untuk menggunakan libraries database
			return $query;
		}
	}

	function get($id="", $field=""){

		if($id){
			if(!$field){
				$field = $this->tableId;
			}

			if(is_array($id)){
				$this->db->where_in($field,$id);

			} else {
				$this->db->where($field,$id);
			}
		}

		$query = $this->db->get($this->tableName);
		return $query->result_array();
	}

	function update($data,$id){
		if($data){
			$this->db->where($this->$tableId, $id);
			$query = $this->db->update($this->tableName, $data);
		}
	}

}