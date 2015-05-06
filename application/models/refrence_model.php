<?php 
	class Refrence_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function add(){
			$data = array(
					'reference_person' 				=> $this->input->post('ref_name',true),
					'relationship'					=> $this->input->post('ref_relationship',true),
					'reference_text'				=> $this->input->post('ref_desc',true),
					'user_id'						=> $this->input->post('user_id',true),
					'referencepersoncontact_phone'	=> $this->input->post('contact_number',true),
					'referencepersoncontact_email'  => $this->input->post('contact_email',true),
				);
			$this->db->insert('tbl_user_references',$data);
		}

		public function getLatestRefrences($id){
			$sql 	= "select * from tbl_user_references where user_id=$id order by id desc limit 3";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;

		}
	}
?>