<?php 
	class Senior_caregiver extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->library('breadcrumbs');
			$this->ipaddress = $_SERVER['REMOTE_ADDR'];
			$this->load->model('seniorcaregiver_model','seniorcaregiver');
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
            $care_type = 5;//blank for careseekers and caregiver
            $title = "Senior Caregiver";        
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
                $location =  $locationdetails[0]['city']?$locationdetails[0]['city']:'your city';                                                                       
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

		 public function searchbylocation(){
	        if($_GET){
	            $latitude   = ($this->input->get('latitude',true));
	            $longitude  = ($this->input->get('longitude',true));
	            $location   = $this->input->get('location',true);
	            $per_page = 15;
	            $page = $this->uri->segment(3)?$this->uri->segment(3):1;
	            $offset =    ($page - 1) * $per_page;
	            $url = site_url().'senior_caregiver/index/';

	            $users   = $this->seniorcaregiver->searchbylocation($latitude,$longitude);
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

	     public function search(){
        if($this->input->is_ajax_request()){
            $page = $this->input->get('pagenum',true);
	    $offset = 0;
	    if ($page > 1) {
	        $offset = ($page - 1) * 15;
	    }
		$limit = 15;
            $latitude = $this->input->get('lat',true);
            $longitude = $this->input->get('lng',true);
            $location = $this->input->get('location',true);
		$limit = 15;
		if (!$latitude || !$longitude || !$location) {
 if(check_user()){
                    $locationdetails = $this->common_model->getMyLocation(check_user());
                    if($locationdetails){
                        $latitude = ($locationdetails[0]['lat']);
                        $longitude = ($locationdetails[0]['lng']);
                        $location =  isset($locationdetails[0]['city'])?$locationdetails[0]['city']:'your city';
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
		}
            $data['neighbour']              = $this->input->get('neighbour',true);
            $data['caregiverage_from']      = $this->input->get('caregiverage_from',true);
            $data['caregiverage_to']        = $this->input->get('caregiverage_to',true);  
            $data['gender']                 = $this->input->get('gender',true);
            $data['languages']              = $this->input->get('language',true);
            $data['observance']             = $this->input->get('observance',true);
            $data['min_exp']				= $this->input->get('min_exp',true);
            $data['availability']			= $this->input->get('availability',true);
            $data['care_type']              = $this->input->get('care_type',true);
            $data['carelocation']			= $this->input->get('carelocation',true);
            $data['trainings']				= $this->input->get('trainings',true);
            $data['able_to_work']			= $this->input->get('able_to_work',true);
            $data['driver_license']			= $this->input->get('driver_license',true);
            $data['vehicle']				= $this->input->get('vehicle',true);
            $data['available']				= $this->input->get('available',true);
            $data['start_date']             = $this->input->get('start_date',true);
            $data['smoker']	  			    = $this->input->get('smoker',true); 
            $data['able_to_work']           = $this->input->get('able_to_work',true);
            
            $result = $this->seniorcaregiver->search($data,$latitude,$longitude);
               if(!$result)
                $total = 0;
            else
                $total = count($result); 
            
            $pages = ceil($total/$limit);        
            $pagination	= '';
            if($pages > 1){	
            	$pagination .= '<a href="#" class="paginate_click in-active" id="previous">previous</a>';
            	for($i = 1; $i<=$pages; $i++)
            	{
            		
            		if($i==$page){
                        $pagination .= ' <a href="#" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
                    }else{
                        $pagination .= ' <a href="#" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';   
                    }
                    
            	}
            	$pagination .= '<a href="#" class="paginate_click in-active" id="next">next</a></div>';
            }
            $locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
    		$result = array_slice($result, $offset , $limit);
            $userlogs           = $this->user_model->getUserLog();
            $merge['userdatas'] = $this->load->view('frontend/common_profile_list', array('userdatas'=>$result,'userlogs'=>$userlogs,'location'=>$locationdetails), true); 
            $merge['num']       =  ceil($total/$limit); 
            $merge['total']     = $total;
            $merge['pagination']       	= $pagination;
            $merge['location'] = $location;
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
            $total_rows = $this->seniorcaregiver->countSeniorcaregiver($lat,$lon);
            $number_pages = ceil($total_rows/$per_page);
            echo $number_pages;
        }
    }

    function pages(){
         $this->breadcrumbs->push('Senior Caregiver', site_url().'#');
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

        $userdata = $this->seniorcaregiver->getAllData($latitude,$longitude,$offset,$per_page);

        $data = array(
            'main_content' => 'frontend/senior_caregiver/index',
            'title'        => 'Senior Caregiver',
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
            $distance = $this->input->post('distance', true) == 'unlimited' ? 99999 : $this->input->post('distance', true);
            

            $data = array(
                'user_id'           => $user_id,
                'neighbor'          => $this->input->post('neighbour',true),
                'caregiverage_from' => $this->input->post('caregiverage_from',true),
                'caregiverage_to'   => $this->input->post('caregiverage_to',true),
                'gender'            => $this->input->post('gender',true),
                'language'          => $this->input->post('language',true),
                'observance'        => $this->input->post('observance',true),
                'year_experience'   => $this->input->post('min_exp',true),
                'availability'      => $this->input->post('availability',true),
                'care_type'         => 5,
                'looking_to_work'   => $this->input->post('carelocation',true),
                'training'          => $this->input->post('trainings',true),
                'willing_to_work'   => $this->input->post('willing_to_work',true),
                'driver_license'    => $this->input->post('driver_license',true), 
                'vehicle'           => $this->input->post('vehicle',true),
                'availability'      => $this->input->post('available',true),
                'start_date'        => $this->input->post('start_date',true),
                'lat'                   => $this->input->post('lat', true),
                'long'                  => $this->input->post('lng', true),
                'location'              => $this->input->post('location', true),
                'distance'              => $distance
            
            );

            $q = $this->db->insert('tbl_searchhistory',$data);
            if($q)
                echo "searched saved";
        }


	}
