<?php 
    if(!defined('BASEPATH'))exit('No direct script access allowed');

    class Common_care_controller extends CI_Controller{
    	public function __construct(){
    		parent:: __construct();
            $this->load->model('common_care_model');
            $this->load->model('common_model');
            $this->ipaddress = $_SERVER['REMOTE_ADDR'];
            $this->load->model('user_model');
            $this->load->model('review_model');
            $this->load->model('caretype_model');
    	}

	public function index(){
	}

    public function sort(){
        $option =  $this->input->post('option',true);
        $per_page = $this->input->post('per_page',true);
        $location = $this->input->post('location',true);
        $care_type = $this->input->post('care_type',true);
        $miles = isset($_POST['miles'])?$_POST['miles']:1;
        $account_category = $this->input->post('account_category',true);        
        if(isset($_POST['lat']) && isset($_POST['lng'])){
            $latitude = $this->input->post('lat',true);
            $longitude = $this->input->post('lng',true);                      
        }
        else{
            if(check_user()){
                $locationdetails = $this->common_model->getMyLocation(check_user());
                if($locationdetails){
                    $latitude = ($locationdetails[0]['lat']);
                    $longitude = ($locationdetails[0]['lng']);
                    $location =  $locationdetails[0]['location']?$locationdetails[0]['location']:'your location';
                }
                }
                else{
                    $ipdata = $this->common_model->getIPData($this->ipaddress);
                    if(is_array($ipdata)){
                        $latitude  = $ipdata['lat'];
                        $longitude = $ipdata['lon'];
                        $location = isset($ipdata['city'])?$ipdata['city']:'your city';
                    }
              }
        }
        $users =  $this->common_care_model->sort($per_page,$latitude,$longitude,$option,$account_category,$care_type,$miles);                
        
        $total_rows = count($users);
        $page = ceil($total_rows/$per_page);        
        $pagination	= '';
        if($page > 1){            	            	
            	for($i = 1; $i<=$page; $i++)
            	{
            		if($i==1){
                        $pagination .= ' <a href="#" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
                    }else{
                        $pagination .= ' <a href="#" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';   
                    }        
            	}                          	
        }  
        $locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
        $userlogs                = $this->user_model->getUserLog();
        $merge['userdatas']      = $this->load->view('frontend/common_profile_list', array('userdatas'=>array_slice($users, 0 ,15),'userlogs'=>$userlogs,'location'=>$locationdetails), true);
        $merge['total_rows']     = $total_rows;
        $merge['num']            = ceil($total_rows/$per_page); 
        $merge['pagination']     = $pagination;
        echo json_encode($merge);
        exit; 
    }

    function fetch_pages(){
        $option =  $this->input->post('option',true);
        $item_per_page = $this->input->post('per_page',true);
        $total_rows = $this->input->post('total_page',true);
        $location = $this->input->post('location',true);
        $miles = isset($_POST['miles'])?$_POST['miles']:1;
        $care_type = $this->input->post('care_type',true);
        $account_category = $this->input->post('account_category',true);
        if(isset($_POST['lat']) && isset($_POST['lng'])){
            $latitude = $this->input->post('lat',true);
            $longitude = $this->input->post('lng',true);                      
        }
        else{
            if(check_user()){
                $locationdetails = $this->common_model->getMyLocation(check_user());
                if($locationdetails){
                    $latitude = ($locationdetails[0]['lat']);
                    $longitude = ($locationdetails[0]['lng']);
                }
                }
                else{
                    $ipdata = $this->common_model->getIPData($this->ipaddress);
                    if(is_array($ipdata)){
                        $latitude = ($ipdata['lat']);
                        $longitude = ($ipdata['lon']);
                        $location = $ipdata['city'];
                    }
              }
        }         
        //sanitize post value
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        
        //validate page number is really numaric
        if(!is_numeric($page_number)){die('Invalid page number!');}
        
        //get current starting point of records
        $position = ($page_number * $item_per_page);
        $users =  $this->common_care_model->paginate($position,$item_per_page,$latitude,$longitude,$option,$account_category,$care_type,$miles);                      
        $page = ceil($total_rows/$item_per_page);
        $pagination	= '';
        if($page > 1){        	            	
        	for($i = 1; $i<=$page; $i++)
        	{
        		if($i==($page_number+1)){
                    $pagination .= ' <a href="#" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
                }else{
                    $pagination .= ' <a href="#" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';   
                }        
        	}                          	
        }
            
        $userlogs                = $this->user_model->getUserLog();
        $merge['userdatas']      = $this->load->view('frontend/common_profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true);             
        $merge['pagination']     = $pagination;
        $merge['total_rows']     = $total_rows;
        $merge['num']            = ceil($total_rows/$item_per_page);
        echo json_encode($merge);
        exit;        
	}    
 }
        
