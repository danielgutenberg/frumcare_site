<?php 
	class Notification_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function getAllNotification(){
			$sql 		= "select * from tbl_notifications";
			$query 		= $this->db->query($sql);
			$res 		= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}

		public function getById($id){
			$sql  = "select * from tbl_notifications where id = $id";
			$query 		= $this->db->query($sql);
			$res 		= $query->row_array();
			if($res)
				return $res;
			else
				return false;
		}

		public function add(){
			$data = array(
				'notification_title' 		=> $this->input->post('notification_title',true),
				'notification_desc'			=> $this->input->post('notification_description',true),
				'notification_type'			=> $this->input->post('notification_type',true),
				'status'					=> $this->input->post('status',true)
			);

			$this->db->insert('tbl_notifications',$data);
		}

		public function edit($id){
			$data = array(
				'notification_title' 		=> $this->input->post('notification_title',true),
				'notification_desc'			=> $this->input->post('notification_description',true),
				'notification_type'			=> $this->input->post('notification_type',true),
				'status'					=> $this->input->post('status',true)
			);

			$id = $this->input->post('id');
			$this->db->where('id',$id);
			$this->db->update('tbl_notifications',$data);
		}

		public function delete($id){
			$this->db->delete('tbl_notifications',array('id'=>$id));
		}

		function getEmail($email){
		    $this->db->select('email');
		    $this->db->like('email', $email);
		    $query = $this->db->get('tbl_user');
		    if($query->num_rows > 0){
		      foreach ($query->result_array() as $row){
		        $new_row['label']=htmlentities(stripslashes($row['email']));
		        $new_row['value']=htmlentities(stripslashes($row['email']));
		        $row_set[] = $new_row; //build an array
		      }
		      echo json_encode($row_set); //format the array into json data
		    }
	  	}

	  	function getContentById($id){
	  		$sql 		= "select * from tbl_notifications where id = $id";
	  		$query		= $this->db->query($sql);
	  		$res 		= $query->row_array();
	  		if($res){
	  			return $res;
	  		}else{
	  			return false;
	  		}
	  	}

	  	function getAllNotificationReceivers($group){
	  		$sql  	= "select email address from tbl_user where account_category = $group";
	  		$query 	= $this->db->query($sql);
	  		$res 	= $query->result_array();
	  		if($res){
	  			return $res;
	  		}else{
	  			return false;
	  		}
	  	}

	  	function getActiveEmailTemplate(){
	  		$sql 	= "select * from tbl_email_templates where isActive = 1";
	  		$query 	= $this->db->query($sql);
	  		$res 	= $query->result_array();
	  		if($res){
	  			return $res;
	  		}else{
	  			return false;
	  		}
	  	}
	}
?>
