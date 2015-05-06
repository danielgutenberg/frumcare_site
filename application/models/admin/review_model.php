<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_model extends CI_Model {

	public function __construct(){
		parent:: __construct();
	}


	public function getAllReviews(){
		$sql = "select * from tbl_reviews";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res){
			return $res;
		}else{
			return false;
			$query->free_result();
		}

	}

	public function getAllReviewsById($id){
		$sql = "select * from tbl_reviews where id = $id";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		if($res){
			return $res;
		}else{
			return false;
			$query->free_result();
		}
	}

	public function update($data){
		$id = $this->input->post('id',TRUE);
		$this->db->where('id',$id);
		$this->db->update('tbl_reviews',$data);
	}

}

/* End of file review_model.php */
/* Location: ./application/models/admin/review_model.php */