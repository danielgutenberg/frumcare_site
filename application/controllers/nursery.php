<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nursery extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->library('breadcrumbs');
		$this->ipaddress = $_SERVER['REMOTE_ADDR'];
		$this->load->model('nursery_model','nursery');
		$this->load->model('review_model');
		$this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('caretype_model');
        $this->load->model('common_care_model');
    }

    public function index(){
        $item_per_page = 15;
        $option = "distance";
        $account_category = 1;
        $care_type = 3;//blank for careseekers and caregiver
        $title = "Nursery/ Playgroup/ Drop off/ Gan";        
        $distance = "unlimited";                     
        $this->breadcrumbs->push($title, site_url().'#');
        $this->breadcrumbs->unshift('Home', base_url());
                                        
        if(check_user()){
                    $locationdetails = $this->common_model->getMyLocation(check_user());
                    if($locationdetails){
                        $latitude = ($locationdetails[0]['lat']);
                        $longitude = ($locationdetails[0]['lng']);
                        $location =  isset($locationdetails[0]['location'])?$locationdetails[0]['location']:'your city';
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
        $userdata       = $this->common_care_model->sort($item_per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance);
        $get_total_rows = $this->common_care_model->getCount($latitude,$longitude,$account_category,$care_type,$distance);                                                         
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
        if($this->input->is_ajax_request()){
        if(check_user()){
                    $locationdetails = $this->common_model->getMyLocation(check_user());
                    if($locationdetails){
                        $latitude = ($locationdetails[0]['lat']);
                        $longitude = ($locationdetails[0]['lng']);
                        $location =  isset($locationdetails[0]['location'])?$locationdetails[0]['location']:'your city';
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
            $limit = 15;

            $data['neighbour']              = $this->input->get('neighbour',true);
            $data['caregiverage_from']      = $this->input->get('caregiverage_from',true);
            $data['caregiverage_to']        = $this->input->get('caregiverage_to',true);  
            $data['gender']                 = $this->input->get('gender',true);
            $data['languages']              = $this->input->get('languages',true);
            $data['observance']             = $this->input->get('observance',true);
            $data['age_group']              = $this->input->get('age_group',true);
            $data['care_type']              = $this->input->get('care_type',true);
            $data['looking_to_work']        = $this->input->get('willing',true);
            $data['smoker']	  			    = $this->input->get('smoker',true);
            
            $result = $this->nursery->search($data,$latitude,$longitude);
               if(!$result)
                $total_rows = 0;
            else
                $total_rows = count($result); 
            
            $userlogs           = $this->user_model->getUserLog();
            $merge['userdatas'] = $this->load->view('frontend/common_profile_list', array('userdatas'=>$result,'userlogs'=>$userlogs,'location'=>$location), true); 
            $merge['num']       =  ceil($total_rows/$limit); 
            $merge['total']     = $total_rows;
            $merge['pagination']       	= '';
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
            $url = site_url().'nursery/index/';

            $users   = $this->nursery->searchbylocation($per_page,$offset,$latitude,$longitude);
            if($users != false)
                $total_rows = count($users);
            else
                $total_rows = 0;
            
            $userlogs                = $this->user_model->getUserLog();
            $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true);
            $merge['total_rows']     =  $total_rows;
            $merge['num']            =  ceil($total_rows/$per_page); 
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
            $total_rows = $this->nursery->countNursery($lat,$lon);
            $number_pages = ceil($total_rows/$per_page);
            echo $number_pages;
        }
    }

    function pages(){
         $this->breadcrumbs->push('Nursery', site_url().'#');
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

        $userdata   = $this->nursery->getAllData($per_page,$offset,$latitude,$longitude);

        $data = array(
            'main_content' => 'frontend/nursery/index',
            'title'        => 'Nusery',
            'ipdata'       =>   $this->common_model->getIPData($this->ipaddress),
            'userdatas'    => $userdata,
            'userlogs'     => $this->user_model->getUserLog()
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    public function savesearch(){
        if(check_user() != false)
            $user_id = check_user();
        else
            $user_id = 0;

        if($this->input->is_ajax_request()){
            $data = array(
                'user_id'           => $user_id,
                'neighbor'          => $this->input->post('neighbour',true),
                'caregiverage_from' => $this->input->post('caregiverage_from',true),
                'caregiverage_to'   => $this->input->post('caregiverage_to',true),
                'language'          => $this->input->post('languages',true),
                'observance'        => $this->input->post('observance',true),
                'age_group'         => $this->input->post('age_group',true),
                'gender'            => $this->input->post('gender',true),
                'care_type'         => $this->input->post('care_type',true),
                'willing_to_work'   => $this->input->post('willing',true)
            );

           $q =  $this->db->insert('tbl_searchhistory',$data);
           if($q)
                echo 'search saved';
        }
    }
}