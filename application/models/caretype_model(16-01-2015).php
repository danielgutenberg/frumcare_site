<?php 
class Caretype_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}

	public function getAllCareType(){
		$sql  = "select * from tbl_care";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res; 
		else return false;
	}

	public function getCareTypeById($care_id){
		$sql = "select service_name from tbl_care where id = $care_id";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res;
		else return false;
	}

}