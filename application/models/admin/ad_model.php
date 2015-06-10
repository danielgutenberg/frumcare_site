<?php 
class ad_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getAd($id){
		$sql = "SELECT tbl_user.id, tbl_user.name,tbl_userprofile.created_on,tbl_userprofile.updated_on, tbl_userprofile.account_category,tbl_userprofile.organization_care,tbl_userprofile.care_type,tbl_user.ad_type,tbl_userprofile.profile_status,tbl_userprofile.id FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_userprofile.id =$id";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res)
			return $res;
		else 
			return false;
	}


	public function getAllDetails($id){
		//$sql = "select * from tbl_userprofile where id = $id";
		$sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.id = $id";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res)
			return $res;
		else
			return false;
	}

	public function delete($id){
		$this->db->delete('tbl_userprofile',array('id'=>$id));
	}

	public function updatedetails($id){

		$data = array(
			'ad_type' 			=> $this->input->post('ad_type',TRUE), 
			'account_category' 	=> $this->input->post('account_category',TRUE), 
			'care_type'			=> $this->input->post('care_type',TRUE),
			'updated_on'		=> $this->input->post('updated_on',TRUE),
                        
			'status'			=> $this->input->post('status',TRUE),
		);
                
                $data_new=array(
                    'updated_time'=>strtotime('now')
                );
		$this->db->where('id',$id);
		$this->db->update('tbl_user',$data);
                
	}


	public function edit_advertisement($data,$id){
		$this->db->where('id',$id);
		$this->db->update('tbl_userprofile',$data);
	}

	public function getAdDetails(){
		$sql = "select *, tbl_userprofile.id as userProfileId, tbl_userprofile.account_category as accountCategory from tbl_userprofile left outer join tbl_user on tbl_user.id = tbl_userprofile.user_id order by tbl_userprofile.id desc";	 
		$query = $this->db->query($sql);
		$res = $query->result_array();
                
		if($res)
			return $res;
		else
			return false;
	}
}
?>