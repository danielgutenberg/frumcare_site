<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Instutions extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('common_model');
		$this->load->model('user_model','instutions');
		$this->load->library('breadcrumbs');
		$this->load->model('review_model');
		$this->load->model('caretype_model');
		$this->ipaddress = $_SERVER['REMOTE_ADDR'];
	}

	public function index(){

		$this->breadcrumbs->push('Instutions', site_url().'/instutions');
        $this->breadcrumbs->unshift('Home', base_url());

		$limit = 15;
        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
        $offset =    ($page - 1) * $limit;
        $ipdata     = $this->common_model->getIPData($this->ipaddress);

		$data = array(
			'main_content' => 'frontend/instutions/index', 
			'countries'	   => $this->common_model->getCountries(),
			'userdatas'	   => $this->instutions->getAllOraganisations($limit,$offset),
			'userlogs'     => $this->instutions->getUserLog(),
			'title' 	   => 'Instutions',
			'ipdata'	   => $ipdata	 	
		);

		$this->load->view(FRONTEND_TEMPLATE, $data);
	}


	public function getPageNumbers(){
		if($this->input->is_ajax_request()){
			$num_org 	= $this->instutions->countAllOrganization();
			$per_page 	= $this->input->get('per_page');
			$nums 		= ceil($num_org/$per_page);
			echo $nums;
		}
		
	}


	public function sort(){
		if($this->input->is_ajax_request()){
			$limit = $this->input->get('limit');
			$order = $this->input->get('order');

			$sess_data = array(
                'search_limit' => $limit,
                'search_order' => $order
            );

            $this->session->set_userdata($sess_data);

	           if($limit){
	               $users                   = $this->instutions->sortOrganization($limit, $order);
	               $userlogs                = $this->instutions->getUserLog();
	               $merge['userdatas']      = $this->load->view('frontend/instutions/list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
	               $total_rows              = $this->instutions->countUserTable();
	               $merge['num']            =  ceil($total_rows/$limit); 
	               echo json_encode($merge);
	               exit;
	               
	           }
		}
	}

	public function pages(){
		$this->breadcrumbs->push('Instutions', site_url().'/instutions');
        $this->breadcrumbs->unshift('Home', base_url());

		if(isset($this->session->userdata['search_limit'])){
            $per_page = $this->session->userdata['search_limit'];
        }else{
            $per_page = 15;
        }

        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
        $offset =    ($page - 1) * $per_page;
        $ipdata     = $this->common_model->getIPData($this->ipaddress);

        $data['main_content']  =  'frontend/instutions/index';
        $data['userdatas']     =  $this->instutions->getAllOraganisations($per_page,$offset);
        $data['userlogs']      =  $this->instutions->getUserLog();
        $data['countries']     =  $this->common_model->getCountries();
        $data['title']		   =  'Instutions';
        $data['ipdata']		   =   $ipdata;	
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

   public function details($slug){
        $slug = urldecode($this->uri->segment(3));
        $details      = $this->instutions->getUserDetailsBySlug($slug);
        
        $this->breadcrumbs->push('Category ', site_url().'category');
        $this->breadcrumbs->push($details['first_name'], '/category');
        $this->breadcrumbs->unshift('Home', base_url());
        
        $data['main_content']   = 'frontend/caregivers/details';
        $data['recordData']     = $details;
        $data['title']          = 'Instutions Details';
        $data['caretypes']      = $this->caretype_model->getAllCareType();
        $data['availablility']  = $this->instutions->getCurrentUserTimeTable($details['id']);
        $data['number_reviews'] = $this->review_model->countReviewById($details['id']);
        $data['userlog']        = $this->instutions->getUserLogById($details['id']);
        $data['reviewdatas']    = $this->review_model->getAllReviews($details['id']);
        $data['similar_types']  = $this->instutions->getSimilarPersons($details['care_type'],$details['id']);
        $data['care_type']      = $this->caretype_model->getAllCareType();
        $data['refrences']      = $this->refrence_model->getLatestRefrences($details['id']);
        
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }

}
?>