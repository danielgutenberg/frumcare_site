<?php 
class Payment_model extends CI_Model{
	public function getPaymentByUserId($id){
		$sql = "select * from tbl_payments where user_id=$id and status=1";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res; 
		else return $res;
	}

	public function getPayDetailsByUserId($id){
		$sql = "select * from tbl_payments where user_id=$id";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res; 
		else return $res;
	}	
}