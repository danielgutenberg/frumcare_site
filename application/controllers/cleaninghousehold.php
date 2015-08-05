<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Cleaninghousehold extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->library('breadcrumbs');
		$this->ipaddress = $_SERVER['REMOTE_ADDR'];
		$this->load->model('cleaninghousehold_model','cleaninghousehold');
		$this->load->model('review_model');
		$this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('caretype_model');
        $this->load->model('common_care_model');
	}

	public function index(){
        $item_per_page = 15;
        $option = "distance";
        $account_category = 3;
        $care_type = 15;//blank for careseekers and caregiver
        $title = "Cleaning / household help company";        
        $distance = "unlimited";                     
        $this->breadcrumbs->push($title, site_url().'#');
        $this->breadcrumbs->unshift('Home', base_url());
                                        
        $loc = $_GET;
        if (isset($loc['location']) && isset($loc['lat']) && isset($loc['lng'])) {
            $location = $loc['location'];
            $latitude = $loc['lat'];
            $longitude = $loc['lng'];
        } else {                               
        if(check_user()){
            $locationdetails = $this->common_model->getMyLocation(check_user());
            if(is_array($locationdetails)){
                $latitude = ($locationdetails[0]['lat']);
                $longitude = ($locationdetails[0]['lng']);
                $location =  $locationdetails[0]['location']?$locationdetails[0]['location']:'your city';                                                                       
            }
        }
        else{
            $ipdata = $this->common_model->getIPData($this->ipaddress);
            if(is_array($ipdata)){
                $latitude = $ipdata['lat'];
                $longitude = $ipdata['lon'];
                $location = isset($ipdata['city'])?$ipdata['city']:'your city';
            }             
        }
        }
        $userdata       = $this->common_care_model->sort($item_per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance);
        $get_total_rows = $this->common_care_model->getCount($latitude,$longitude,$account_category,$care_type,$distance);                                                         
        $location = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
        $data = array(
          				'main_content' 	    => 'frontend/common_caregiver',                            
          				'title'			    => $title,
                        'pages'             => ceil($get_total_rows/$item_per_page),
                        'countries'         => $this->common_model->getCountries(),
                        'userlogs'		    => $this->user_model->getUserLog(),
                        'userdatas'		    => $userdata,
                        'account_category'  => $account_category,
                        'care_type'         => $care_type,
                        'total_rows'        => $get_total_rows,
                        'location'          => $location,                                     				              				              				                            
          			);                      
        $this->load->view(FRONTEND_TEMPLATE, $data);
	}
	public function search(){
		$limit = 15;
		if(check_user()){
                    $locationdetails = $this->common_model->getMyLocation(check_user());
                    if($locationdetails){
                        $latitude = ($locationdetails[0]['lat']);
                        $longitude = ($locationdetails[0]['lng']);
                        $location =  isset($locationdetails[0]['location'])?$locationdetails[0]['location']:'your city';
                    }
                    if (!$latitude) {
                        $ipdata = $this->common_model->getIPData($this->ipaddress);
                        if(is_array($ipdata)){
                            $latitude = ($ipdata['lat']);
                            $longitude = ($ipdata['lon']);
                            $location = isset($ipdata['city'])?$ipdata['city']:'your city';
                        }
                    }
            
                }
                else{
                    $ipdata = $this->common_model->getIPData($this->ipaddress);
                        if(is_array($ipdata)){
                            $latitude = ($ipdata['lat']);
                            $longitude = ($ipdata['lon']);
                            $location = isset($ipdata['city'])?$ipdata['city']:'your city';
                        }
                }
			$postdata['neighbor'] 			= $this->input->get('neighbour',true);
			$postdata['looking_to_work'] 	= $this->input->get('looking_to_work',true);
			$postdata['willing_to_work'] 	= $this->input->get('willing_to_work',true);
			$res = $this->cleaninghousehold->search($postdata,$latitude,$longitude);
			if(is_array($res))
				$total = count($res);
			else
				$total = 0;
			$location = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
			$userlogs             	= $this->user_model->getUserLog();
            $merge['userdatas'] = $this->load->view('frontend/common_profile_list', array('userdatas'=>$res,'userlogs'=>$userlogs,'location'=>$location), true);
            $total_rows           	= $total;
            $merge['num']         	= ceil($total_rows/@$limit); 
            $merge['total']       	= $total_rows;
            $merge['pagination']       	= '';  
            echo json_encode($merge);
            exit();	
	}
   public function searchbylocation(){
        if($_GET){
            $latitude   = ($this->input->get('latitude',true));
            $longitude  = ($this->input->get('longitude',true));
            $location   = $this->input->get('location',true);
            $per_page = 15;
            $page = $this->uri->segment(3)?$this->uri->segment(3):1;
            $offset =    ($page - 1) * $per_page;
            $url = site_url().'cleaninghousehold/index/';

            $users   = $this->cleaninghousehold->searchbylocation($latitude,$longitude);

            
            $userlogs                = $this->user_model->getUserLog();
            $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true); 
            echo $merge['userdatas'];
            exit; 

        }
    }
}			
