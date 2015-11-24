<?php 
class subscriptions_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getSubscriptions(){
		$sql = "SELECT * from tbl_newlettersubscription order by id desc";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res)
			return $res;
		else 
			return false;
	}
}
?>
