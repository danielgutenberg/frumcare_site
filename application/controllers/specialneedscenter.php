<?php 
	class Specialneedscenter extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->library('breadcrumbs');
			$this->ipaddress = $_SERVER['REMOTE_ADDR'];
			$this->load->model('specialneedscenter_model','specialneedscenter');
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
            $care_type = 14;//blank for careseekers and caregiver
            $title = "Special needs center";        
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

		 public function searchbylocation(){
	        if($_GET){
	            $latitude   = ($this->input->get('latitude',true));
	            $longitude  = ($this->input->get('longitude',true));
	            $location   = $this->input->get('location',true);
	            $per_page = 15;
	            $page = $this->uri->segment(3)?$this->uri->segment(3):1;
	            $offset =    ($page - 1) * $per_page;
	            $url = site_url().'specialneedscenter/index/';

	            $users   = $this->specialneedscenter->searchbylocation($latitude,$longitude);

	            
	            $userlogs                = $this->user_model->getUserLog();
	            $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true);
	            // $total_rows              =  count($users);
	            // $merge['num']            =  ceil($total_rows/$per_page); 
	            echo $merge['userdatas'];
	            exit; 

	        }
	    }

	     public function search(){
        if($this->input->is_ajax_request()){
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
            $data['neighbour']              = $this->input->get('neighbour',true);
            $data['languages']              = $this->input->get('language',true);
            $data['willing_to_work']		= $this->input->get('willing_to_work',true);
            $data['care_type']              = $this->input->get('care_type',true);
            $data['extra_field']            = $this->input->get('extra_field',true);
            
            $result = $this->specialneedscenter->search($data,$latitude,$longitude);
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

    public function savesearch(){
        if(check_user()!= false)
                $user_id = check_user();
        else
            $user_id = 0;

        if($this->input->is_ajax_request()){
            $data = array(
                'user_id'           => $user_id,
                'neighbor'          => $this->input->post('neighbour',true),
                'language'          => $this->input->post('language',true),
                'willing_to_work'   => $this->input->post('willing_to_work',true),
                'care_type'         => $this->input->post('care_type',true),
            );

            $q = $this->db->insert('tbl_searchhistory',$data);
            if($q)
                echo 'search saved';exit();
        }
    }
}
