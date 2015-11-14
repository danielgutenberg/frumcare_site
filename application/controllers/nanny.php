<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Nanny extends CI_Controller{
	    
	    public function __construct(){
		parent:: __construct();
		$this->load->library('breadcrumbs');
		$this->ipaddress = $_SERVER['REMOTE_ADDR'];
		$this->load->model('nanny_model','nanny');
		$this->load->model('review_model');
		$this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('caretype_model');
        $this->load->model('common_care_model');
	}

	
	public function autosearch(){
		 $limit = 15;

		if($this->input->is_ajax_request()){
			$neighbourhood 			= $this->input->post('neighbour',true);
			$res 					= $this->nanny->searchByNeighborhood($neighbourhood);
			if(is_array($res))
				$total = count($res);
			else
				$total = 0;

            $userlogs             	= $this->user_model->getUserLog();
            $merge['userdatas']   	= $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$res,'userlogs'=>$userlogs), true);
            $total_rows           	= $total;
            $merge['num']         	= ceil($total_rows/$limit); 
            $merge['total']       	= $total_rows;
            $merge['alldata']  		= $total;
            echo json_encode($merge);
            exit;
		}
	}

	public function searchbylocation(){
        if($_GET){
            $latitude   = ($this->input->get('latitude',true));
            $longitude  = ($this->input->get('longitude',true));
            $location   = $this->input->get('location',true);
            $per_page = 15;
            $page = $this->uri->segment(3)?$this->uri->segment(3):1;
            $offset =    ($page - 1) * $per_page;
            $url = site_url().'nanny/index/';

            $users   = $this->nanny->searchbylocation($latitude,$longitude,$per_page,$offset);
            if($users != false)
                $total_rows = count($users);
            else
                $total_rows = 0;
            
            $userlogs                   = $this->user_model->getUserLog();
            $merge['userdatas']         = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true);
            $merge['total_rows']        =  $total_rows;
            $merge['num']               =  ceil($total_rows/$per_page); 
            echo json_encode($merge);
            exit; 

        }
    }

     function getPages(){
        $ipdata     = $this->common_model->getIPData($this->ipaddress);
        if(is_array($ipdata)){
            $lat = $ipdata['lat'];
            $lon = $ipdata['lon'];
        }
        if($this->input->is_ajax_request()){
            $per_page = $this->input->get('per_page');
            $total_rows = $this->nanny->countNanny($lat,$lon);
            $number_pages = ceil($total_rows/$per_page);
            echo $number_pages;
        }
    }

    function pages(){
        $this->breadcrumbs->push('Nanny / Au-Pair', site_url().'#');
        $this->breadcrumbs->unshift('Home', base_url());

         if(isset($this->session->userdata['search_limit'])){
            $per_page = $this->session->userdata['search_limit'];
         }else{
                $per_page = 15;
         }

          if(check_user()){
            $locationdetails = $this->common_model->getMyLocation(check_user());
            if(is_array($locationdetails)){
                $latitude = ($locationdetails[0]['lat']);
                $longitude = ($locationdetails[0]['lng']);
            }
        }else{
            $ipdata = $this->common_model->getIPData($this->ipaddress);
            if(is_array($ipdata)){
                $latitude = ($ipdata['lat']);
                $longitude = ($ipdata['lon']);
            }    
        }
        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
        $offset =    ($page - 1) * $per_page;
        
        if($offset > 1)
        $per_page = $page * $per_page;

        $userdata   = $this->nanny->getAllNanny($latitude,$longitude,$per_page,$offset);

        $data = array(
            'main_content' => 'frontend/nanny/index',
            'title'        => 'Nanny / Au-Pair',
            'ipdata'       =>   $this->common_model->getIPData($this->ipaddress),
            'userdatas'    => $userdata,
            'userlogs'     => $this->user_model->getUserLog()
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    public function savesearch(){

        if($this->input->is_ajax_request()){
            if(check_user()!= false)
                $user_id = check_user();
            else
                $user_id = 0;
            $distance = $this->input->post('distance', true) == 'unlimited' ? 99999 : $this->input->post('distance', true);
            
            
            $data = array(
                    'neighbor'              => $this->input->post('neighbour',true),
                    'gender'                => $this->input->post('gender',true),
                    'language'              => $this->input->post('lang',true),
                    'observance'            => $this->input->post('observance',true),
                    'number_of_children'    => $this->input->post('number_of_children',true),
                    'morenum'               => $this->input->post('morenum',true),
                    'age_group'             => $this->input->post('age_group',true),
                    'looking_to_work'       => $this->input->post('looking_to_work',true),
                    'year_experience'       => $this->input->post('year_experience',true),
                    'driver_license'        => $this->input->post('driver_license',true),
                    'vehicle'               => $this->input->post('vehicle',true),
                    'pick_up_child'         => $this->input->post('driver_license',true),
                    'cook'                  => $this->input->post('cook',true),
                    'basic_housework'       => $this->input->post('basic_housework',true),
                    'homework_help'         => $this->input->post('homework_help',true),
                    'on_short_notice'       => $this->input->post('on_short_notice',true),
                    'caregiverage_from'     => $this->input->post('caregiverage_from',true),
                    'caregiverage_to'       => $this->input->post('caregiverage_to',true),
                    'start_date'            => $this->input->post('start_date',true),
                    'care_type'             => 2,
                    'user_id'               => $user_id,
                    'lat'                   => $this->input->post('lat', true),
                'long'                  => $this->input->post('lng', true),
                'location'              => $this->input->post('location', true),
                'distance'              => $distance
            );

            $q = $this->db->insert('tbl_searchhistory',$data);
            if($q)
                echo 'save successfully';exit();
        }
    }

}
