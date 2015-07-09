<?php 
class Package_model extends CI_Model{
	public function getAllPackages(){
		$sql 	= "select * from tbl_packages where isActive = 1 order by id desc";
		$query 	= $this->db->query($sql);
		$res 	= $query->result_array();
		if($res) return $res;
		else return false;
	}

	public function getPackageName($p_id){	   
		$sql 	= "select * from tbl_packages where id=$p_id";
		$query 	= $this->db->query($sql);
		$res 	= $query->result_array();        
		if($res) return $res;
		else return false;	
	}
}
