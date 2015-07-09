<?php 
class Review_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}


	public function countReviewById($profile_id){
		$sql = "select count(profile_id) as number_reviews, sum(review_rating) as total_review from tbl_reviews where profile_id=$profile_id";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		if($res) return $res;
		else return false;
	}

	public function getAllReviews($profile_id){
		$sql = "select * from tbl_reviews where profile_id=$profile_id order by id, created_date desc limit 3";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res;
		else return false;	
	}

	public function getAllReviewsByUserId($profile_id){
		$sql = "select * from tbl_reviews where sha1(profile_id) = '$profile_id' order by id, created_date desc";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res;
		else return false;	
	}


	public function add_review($post){

		$data = array(
			'user_id' 	 	=> $_POST['current_user'],
			'profile_id'  		=> $_POST['profile'],
			'title'			=> $_POST['title'],
			'description'		=> $_POST['review_description'],
			'created_date'		=> $_POST['date_time'],
			'review_rating' 	=> round($_POST['score']),
			'account_category'	=> $_POST['acc_category'],
			'care_type'	 	=> $_POST['care_type']
		);

		$this->db->insert('tbl_reviews',$data);
	}
}
?>
