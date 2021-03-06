<?php 
class Review_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}


	public function countReviewById($profile_id=''){
		$sql = "select count(profile_id) as number_reviews, sum(review_rating) as total_review from tbl_reviews where profile_id='$profile_id' and approved = 1";		
        $query = $this->db->query($sql);
		$res = $query->row_array();        
		if($res) return $res;
		else return false;
	}

	public function getAllReviews($profile_id=''){
		$sql = "select * from tbl_reviews where profile_id='$profile_id' and approved = 1 order by id, created_date desc";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res;
		else return false;	
	}


	public function getAllReviewsByUserId($profile_id=''){
		$sql = "select * from tbl_reviews where sha1(profile_id) = '$profile_id' and approved = 1 order by id, created_date desc";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res) return $res;
		else return false;	
	}
	
	public function approve_review($id)
	{
		$where = [
        	'id' => $id
        ];
        $this->db->where($where);
        
        $update = array(
            'approved' => 1
        );
        return $this->db->update('tbl_reviews',$update);
	}

	public function add_review($post)
	{
		$this->db->where('id',$post['current_user']);
		$user = $this->db->get('tbl_user')->result_array();
		$name = explode(' ', trim($user[0]['name']))[0];
		
		
		$data = array(
			'user_id' 			=> $post['current_user'],
			'profile_id' 		=> $post['profile'],
			'name'				=> $name,
            'user_profile_id'   => $post['new_id'],
			'description'		=> $post['review_description'],
			'created_date'		=> $post['date_time'],
			'review_rating' 	=> $post['score'],
			'account_category'	=> 2,//$_POST['acc_category'],
			'care_type'			=> $post['care_type'],  
            'approved'          => 0
		);
        //checking previous review
        $this->db->where('user_id',$data['user_id']);
        $this->db->where('profile_id',$data['profile_id']);
        $this->db->where('user_profile_id',$data['user_profile_id']);
        $query = $this->db->get('tbl_reviews');        
        if($query->num_rows() == 0){
            $this->db->insert('tbl_reviews',$data);
            $data = [
            	'id' => $this->db->insert_id(),
            	'msg' => "Review has been successfully saved"
            ];
        }else{
            $update = array(
                        'name'				=> $name,
                        'description'		=> $post['review_description'],
                        'created_date'      => $post['date_time'],
                        'review_rating' 	=> $post['score'],  
                        'approved'          => 0
                    );
            
            $where = [
            	'user_id' => $data['user_id'],
            	'profile_id' => $data['profile_id'], 
            	'user_profile_id' => $data['user_profile_id']
            ];
            $this->db->where($where);
            $this->db->update('tbl_reviews',$update);
            
            $this->db->where($where);
			$id = $this->db->get('tbl_reviews')->row()->id;
            $data = [
            	'id' => $id,
            	'msg' => "Review has been successfully saved"
            ];
        }
        return $data;
	}
}
?>
