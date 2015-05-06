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
        public function index(){
            $item_per_page = 15;
            $option = "distance";
            $account_category = 2;
            $care_type = '';//blank for careseekers and caregiver
            $title = "Jobs";
            $distance = 1;                     
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
                            'location'          => $location              				              				              				                            
              			);                      
            $this->load->view(FRONTEND_TEMPLATE, $data);          
		}
   function pages(){

         $ipdata = $this->common_model->getIPData($this->ipaddress);
         $cat = $this->uri->segment(2)?$this->uri->segment(2):'';
         $this->breadcrumbs->push('Jobs', site_url().'#');
         $this->breadcrumbs->unshift('Home', base_url());

        if(isset($this->session->userdata['search_limit'])){
            $per_page = $this->session->userdata['search_limit'];
        }else{
            $per_page = 15;
        }
         
            if($cat == 'organization'){
                $acc_cat = 3;
                $care_type = 2;
            }else{
                $acc_cat = 1;
                $care_type = 1;
            }

            if(check_user()){
                $locationdetails = $this->common_model->getMyLocation(check_user());
                if(is_array($locationdetails)){
                    $latitude = ($locationdetails[0]['lat']);
                    $longitude = ($locationdetails[0]['lng']);
                }
            }
            else{
                if(is_array($ipdata)){
                    $latitude = ($ipdata['lat']);
                    $longitude = ($ipdata['lon']);
                }    
            }



        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
        $offset =    ($page - 1) * $per_page;

            
        $userdata   = $this->user_model->getAllCareSeekerDetails($acc_cat,$offset,$per_page,$latitude,$longitude);
        $data['main_content']  = 'frontend/caregivers/index';
        $data['userdatas']     = $userdata;
        $data['userlogs']      = $this->user_model->getUserLog();
        $data['countries']     = $this->common_model->getCountries();
        $data['ipdata']        = $ipdata;
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }




		public function details($slug,$care_type){
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

    function getPages(){
       $ipdata     = $this->common_model->getIPData($this->ipaddress);
        if(is_array($ipdata)){
            $lat = $ipdata['lat'];
            $lon = $ipdata['lon'];
        }

        if($this->input->is_ajax_request()){
            $per_page = $this->input->get('per_page');
            $total_rows = $this->user_model->countCareSeeker($lat,$lon);
            $number_pages = ceil($total_rows/$per_page);
            echo $number_pages;
        }
    }

    function sort(){
        if($this->input->is_ajax_request()){
               $limit = $this->input->get('limit');
               $order = $this->input->get('order');

               $ipdata     = $this->common_model->getIPData($this->ipaddress);
               $response   = $this->common_model->getLongitudeAndLatitude($ipdata['city']);
               $latitude   = $response->results[0]->geometry->location->lat;
               $longitude  = $response->results[0]->geometry->location->lng;

               $sess_data = array(
                            'search_limit' => $limit,
                            'search_order' => $order
                        );
                $this->session->set_userdata($sess_data);

                   if($limit){
                            if($order != 'distance'){
                               $users              = $this->user_model->careseekersort($limit, $order,($latitude),($longitude)); 
                           }else{
                                 $users            = $this->user_model->careseekerorderByDistance($limit,$latitude,$longitude);
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
    
    public function sort_cate(){
      if($this->input->is_ajax_request()){
        $limit      = $this->input->get('limit',true);
        $care_type  = $this->input->get('care_type',true);
      }
      if(check_user()){
          $locationdetails = $this->common_model->getMyLocation(check_user());
          if($locationdetails){
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

       $sess_data = array(
          'search_limit' => $limit,
          'search_order' => $care_type
        );
       $this->session->set_userdata($sess_data);

       $users                   = $this->user_model->sortcareseeker($limit, $care_type,$latitude,$longitude);
       if($users != false)
          $total_rows = count($users);
        else 
          $total_rows = 0;

       $userlogs                = $this->user_model->getUserLog();
       $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
       $merge['total_rows']     = $total_rows;
       $merge['num']            = ceil($total_rows/$limit); 
       echo json_encode($merge);
       exit;
    }

    public function searchbylocation(){
        if($_GET){
            $latitude   = $this->input->get('latitude',true);
            $longitude  = $this->input->get('longitude',true);
            $acc_cat    = $this->input->get('account_category',true);
            $location   = $this->input->get('location',true);
            $per_page = 15;
            $page = $this->uri->segment(3)?$this->uri->segment(3):1;
            $offset =    ($page - 1) * $per_page;
            $url = site_url().'careseekers/index/';

            $users   = $this->user_model->getAllCareSeekerDetails($acc_cat,$offset,$per_page,$latitude,$longitude);
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
}


?>