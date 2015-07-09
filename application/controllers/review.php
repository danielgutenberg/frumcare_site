<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Review extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('review_model');
	}

	public function index(){
		$postdata = $this->input->post();
		if($postdata){
			$msg = $this->review_model->add_review($postdata);
            echo $msg;
		}else{
		  echo "Some error occured";
		}

	}

	public function allreviews($id = NULL){
		$id = $this->uri->segment(3);
		$data['main_content'] =  'frontend/review/index';
		$data['recordData']   =  $this->review_model->getAllReviewsByUserId($id);
		$data['title']        =  'All Reviews';

		$this->load->view(FRONTEND_TEMPLATE,$data);
	}
}
