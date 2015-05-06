<?php 	error_reporting(0);
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
			$this->ipaddress = $_SERVER['REMOTE_ADDR'];
		}

		public function index(){
			
				$ipdata     = $this->common_model->getIPData($this->ipaddress);
		        $per_page = 15;
		        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
		        $offset =    ($page - 1) * $per_page;
		        $url = site_url().'careseekers/index/';
		        
		        // if($ipdata['city']){
		        //    $response   = $this->common_model->getLongitudeAndLatitude($ipdata['city']);
		        //    $latitude   = floor($response->results[0]->geometry->location->lat);
		        //    $longitude  = floor($response->results[0]->geometry->location->lng);
		           //$userdata   = $this->user_model->getAllCareSeekerDetails($offset,$per_page,$latitude,$longitude);    
		           	$userdata   = $this->user_model->getAllCareSeekerDetails($offset,$per_page);    
		        // }else{
		        //      $userdata =  $this->user_model->getAllCareSeekerDetailsByCountry($offset,$per_page,$ipdata['country']);
		        // }

			$this->breadcrumbs->push('Careseekers', site_url().'#');
        	$this->breadcrumbs->unshift('Home', base_url());

			$data = array(
				'main_content' 	=> 'frontend/careseekers/index',
				'title'			=> 'Careseekers',
				'ipdata'		=> $ipdata,
				'countries'     => $this->common_model->getCountries(),
				'userlogs'		=> $this->user_model->getUserLog(),
				'userdatas'		=> $userdata
			);

			$this->load->view(FRONTEND_TEMPLATE, $data);
		}


		public function details($slug,$care_type){
	        $slug = urldecode($this->uri->segment(3));
	        $care_type 		= $this->uri->segment(4);
	        $details      = $this->user_model->getUserDetailsBySlug($slug,$care_type);

	        $type = Caretype_model::getCareTypeById($details['care_type']);

	        $this->breadcrumbs->push($type[0]['service_name'], '#');
	        $this->breadcrumbs->push($details['first_name'], '#');
	        $this->breadcrumbs->unshift('Home', base_url());
	        
	        $data['main_content']   = 'frontend/caregivers/details';
	        $data['recordData']     = $details;
	        $data['title']          = 'Careseekers Details';
	        $data['caretypes']      = $this->caretype_model->getAllCareType();
	        $data['availablility']  = $this->user_model->getCurrentUserTimeTable($details['id']);
	        $data['number_reviews'] = $this->review_model->countReviewById($details['id']);
	        $data['userlog']        = $this->user_model->getUserLogById($details['user_id']);
	        $data['reviewdatas']    = $this->review_model->getAllReviews($details['id']);
	        $data['similar_types']  = $this->user_model->getSimilarPersons($details['care_type'],$details['id']);
	        $data['care_type']      = $this->caretype_model->getAllCareType();
	        $data['refrences']      = $this->refrence_model->getLatestRefrences($details['id']);
	        $data['care_id'] = $details['id']; //condition for blocking own review and rating

	        $this->load->view(FRONTEND_TEMPLATE,$data);
    }

    function getPages(){
        if($this->input->is_ajax_request()){
            $per_page = $this->input->get('per_page');
            $total_rows = $this->user_model->countCareSeeker();
            $number_pages = ceil($total_rows/$per_page);
            echo $number_pages;
        }
    }

    function sort(){
        if($this->input->is_ajax_request()){
               $limit = $this->input->get('limit');
               $order = $this->input->get('order');

               $ipdata     = $this->common_model->getIPData($this->ipaddress);
               $response   = $this->common_model->getLongitudeAndLatitude($ipdata->city);
               $latitude   = $response->results[0]->geometry->location->lat;
               $longitude  = $response->results[0]->geometry->location->lng;

               $sess_data = array(
                            'search_limit' => $limit,
                            'search_order' => $order
                        );
                $this->session->set_userdata($sess_data);

                   if($limit){
                            if($order != 'distance'){
                               $users              = $this->user_model->careseekersort($limit, $order); 
                           }else{
                                 $users            = $this->user_model->careseekerorderByDistance($limit);
                           }
                           $userlogs                = $this->user_model->getUserLog();
                           $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
                           $total_rows              = $this->user_model->countUserTable();
                           $merge['num']            =  ceil($total_rows/$limit); 
                           echo json_encode($merge);
                           exit;
                       
                   }
        }

    }

}


?>