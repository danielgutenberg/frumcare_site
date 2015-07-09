<?php 
	class Adminrole_model extends CI_Model{
		public function __construct(){
			parent:: __construct();
		}

		public function getAllData(){
			$sql 	= "select * from tbl_adminrole";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res){
				return $res;
			}else{
				return false;
			}
		}

		public function getById($id){
			$sql 	= "select * from tbl_adminrole where id = $id";
			$query  = $this->db->query($sql);
			$res 	= $query->row_array();
			if($res)
				return $res;
			else 
				return false;
		}

		public function add(){
				if(isset($_POST['access'])){
					$access = join(',',$_POST['access']);
				}
		
			$data = array(
				'role_name' => $this->input->post('name',true),
				'access'	=> isset($access)?$access:'',
				'status'	=> $this->input->post('status',true),
			);

		$this->db->insert('tbl_adminrole',$data);

		}
		
		public function edit($id){
				if(isset($_POST['access'])){
					$access = join(',',$_POST['access']);
				}

			$data = array(
				'role_name' => $this->input->post('name',true),
				'access'	=> isset($access)?$access:'',
				'status'	=> $this->input->post('status',true),
			);
				$id = $this->input->post('id',true);
				$this->db->where('id', $id);
				$this->db->update('tbl_adminrole',$data);

		}

		public function delete($id){
			$this->db->delete('tbl_adminrole',array('id'=>$id));
		}
	}
?>
