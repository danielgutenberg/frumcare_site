<?php 
	class User_model extends CI_Model{
		public function __construct(){
			parent:: __construct();
		}

		public function updateImageStatus($id,$task){
			if($task == 'activate')
				$status = '1';
			else
				$status = '0';

			$this->db->where('id',$id);
			$this->db->update('tbl_user',array('profile_picture_status'=>$status));
		}

		public function getLogDataById($id){
			$sql 	= "select * from tbl_user_logs where id = $id";
			$query 	= $this->db->query($sql);
			$res 	= $query->row_array();
			if($res)
				return $res;
			else 
				return false;
		}


		public function getAllUsers(){
			$sql = "select id,name from tbl_user order by id desc";
			$query = $this->db->query($sql);
			$res = $query->result_array();
				if($res)
					return $res;
				else
					return false;
		}

		public function getByUserId($id){
			//$sql 	= "select * from tbl_user where id = $id";
			$sql  = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.id = $id";
			$query 	= $this->db->query($sql);
			$res 	= $query->row_array();
				if($res)
					return $res;
				else
					return false;
		}
        
        function updateStatus($id,$task){
            if($task == 'activate')
				$status = '1';
			else
				$status = '0';

			$this->db->where('id',$id);
			$this->db->update('tbl_user',array('status'=>$status));
          
            
        }
        
         function reset_password(){
            
            $update = array(
                'password'              => encrypt_decrypt('encrypt', $this->input->post('password', true)),
                'original_password'     => $this->input->post('password', true),
            );
            
            $id     = $this->input->post('id', true);
            $this->db->where('id', $id);
            $this->db->update('tbl_user', $update);
        }
        
        function getEmailAddressById($id){
            $sql    = "select email from tbl_user where id = $id";
            $query  = $this->db->query($sql);
            $res    = $query->row_array();
            if($res)
                return $res;
            else
                return false;   
        }
        
	}