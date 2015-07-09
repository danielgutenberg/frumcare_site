<?php
class Testimonial_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}

	public function getAllTestimonails(){
		$sql   = "select testimonial_by,image,testimonial_description from tbl_testimonials where is_active = 1";
		$query = $this->db->query($sql);
		$res   = $query->result();
		if($res) return $res; 
		else $query->free();

	}

	public function getTestiomialsForHome(){
		$sql = "select testimonial_description,testimonial_by from tbl_testimonials where is_active = 1 order by id desc limit 2";
		$query = $this->db->query($sql);
		$res   = $query->result();
		if($res) return $res; 
		else $query->free();		
	}
}
?>
