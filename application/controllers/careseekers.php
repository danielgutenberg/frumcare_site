<?php
	if(!defined("BASEPATH"))exit('No direct script access allowed');
	class Careseekers extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->library('breadcrumbs');
			$this->load->model('common_model');
			$this->load->model('user_model');
			$this->load->model('caretype_model');
			$this->load->model('review_model');
			$this->load->model('refrence_model');
            $this->load->model('common_care_model');
			$this->ipaddress = $_SERVER['REMOTE_ADDR'];
		}

		public function details(){
	        $slug 			= urldecode($this->uri->segment(3));
	        $care_type 		= $this->uri->segment(4);
	        $details        = $this->user_model->getUserDetailsBySlug($slug,$care_type);
	        $type = Caretype_model::getCareTypeById($details['care_type']);

	        $this->breadcrumbs->push($type[0]['service_name'], '#');
	        $this->breadcrumbs->push($details['name'], '#');
	        $this->breadcrumbs->unshift('Home', base_url());

	        $data['main_content']   = 'frontend/caregivers/details';
	        $data['recordData']     = $details;
	        $data['title']          = 'Jobs Details';
	        $data['caretypes']      = $this->caretype_model->getAllCareType();
	        $data['availablility']  = $this->user_model->getCurrentUserTimeTable($details['id']);
	        $data['number_reviews'] = $this->review_model->countReviewById($details['id']);
	        $data['userlog']        = $this->user_model->getUserLogById($details['user_id']);
	        $data['reviewdatas']    = $this->review_model->getAllReviews($details['id']);
	        $data['similar_types']  = $this->user_model->getSimilarPersons($details['care_type'],$details['id']);
	        $data['care_type']      = $this->caretype_model->getAllCareType();
	        $data['refrences']      = $this->refrence_model->getLatestRefrences($details['id']);
	        $data['care_id']       = $details['id']; //condition for blocking own review and rating
	        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
}
