<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Jobs extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			 $this->load->library('breadcrumbs');
			$this->load->model('user_model');
			$this->load->model('common_model');
		}


		public function index(){

			$this->breadcrumbs->push('Category', '/category');
        	$this->breadcrumbs->unshift('Home', base_url());

			$data['main_content']  = 'frontend/jobs/index';
			$data['title']         =  'Jobs';
			$data['jobs']   	   = $this->user_model->getJobs();
			$data['caretypes']	   = $this->common_model->getCareType();
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}

		public function details($slug){
			$slug = segment(3);
			$careType = segment(4);
			$data['main_content']  = 'frontend/jobs/details';
			$data['title']         = 'Job Title';
			$data['jobdetail']	   =  $this->user_model->getJobBySlug($slug, $careType);
			print_r($data['jobdetail']);
			$data['caretypes']	   =  $this->common_model->getCareType();
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
	}

	

?>
