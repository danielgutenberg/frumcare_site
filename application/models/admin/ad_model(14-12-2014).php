<?php 
class ad_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getAd($id){
		$sql = "select id,first_name,last_name,account_category,care_type,ad_type,status,created_on,updated_on from tbl_user where id = $id";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res)
			return $res;
		else 
			return false;
	}


	public function getAllDetails($id){
		$sql = "select * from tbl_user where id = $id";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res)
			return $res;
		else
			return false;
	}

	public function delete($id){
		$this->db->delete('tbl_user',array('id'=>$id));
	}

	public function updatedetails($id){

		$data = array(
			'ad_type' 			=> $this->input->post('ad_type',TRUE), 
			'account_category' 	=> $this->input->post('account_category',TRUE), 
			'care_type'			=> $this->input->post('care_type',TRUE),
			'updated_on'		=> $this->input->post('updated_on',TRUE),
			'status'			=> $this->input->post('status',TRUE),
		);

		$this->db->where('id',$id);
		$this->db->update('tbl_user',$data);
	}


	public function edit_advertisement($data,$id){
		
		$this->db->where('id',$id);
		$this->db->update('tbl_user',$data);

	}
	
		public function getAdDetails(){
		$sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res)
			return $res;
		else
			return false;
	}
}
?>
