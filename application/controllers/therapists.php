<?php  
if(! defined('BASEPATH'))exit('No direct script access allowed');

class Therapists extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('user_model','therapist');
		$this->load->model('common_model');
		$this->load->library('breadcrumbs');
		$this->load->model('caretype_model');
		$this->load->model('review_model');
        $this->ipaddress = $_SERVER['REMOTE_ADDR'];
        $this->load->model('caretype_model');
        $this->load->model('user_model');        
        $this->load->model('common_care_model');
	}

	// listing pages
	function index(){
        $item_per_page = 15;
        $option = "distance";
        $account_category = 1;
        $care_type = 7;//blank for careseekers and caregiver
        $title = "Therapist";        
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
	// details pages
	function details(){
		$slug         = $this->uri->segment(3);
        $care_type     = $this->uri->segment(4);
		$details      = $this->therapist->getUserDetailsBySlug($slug,$care_type);

        
        $this->breadcrumbs->push('Therapist ', site_url().'therapist');
        $this->breadcrumbs->push($details['name'], '/category');
        $this->breadcrumbs->unshift('Home', base_url());

        $data['main_content']   = 'frontend/therapist/details';
        $data['recordData']     = $details;
        $data['title']          = 'Caregivers Details';
        $data['caretypes']      = $this->caretype_model->getAllCareType();
        $data['availablility']  = $this->therapist->getCurrentUserTimeTable($details['id']);
        $data['number_reviews'] = $this->review_model->countReviewById($details['id']);
        $data['userlog']        = $this->therapist->getUserLogById($details['user_id']);
        $data['reviewdatas']    = $this->review_model->getAllReviews($details['id']);
        $data['similar_types']  = $this->therapist->getSimilarPersons($details['care_type'],$details['id']);
        $data['care_type']      = $this->caretype_model->getAllCareType();

        $this->load->view(FRONTEND_TEMPLATE,$data);
	}

	// get pages on lsiting pages loads
	public function getPages(){
      $ipdata     = $this->common_model->getIPData($this->ipaddress);
        if(is_array($ipdata)){
            $lat = $ipdata['lat'];
            $lon = $ipdata['lon'];
        }

		if($this->input->is_ajax_request()){
			$limit       = $this->input->get('per_page');
			$total_rows  = $this->therapist->countTherapists($lat,$lon);
			$num         = ceil($total_rows/$limit);
			echo $num;exit();
		}
	}

	// sorting on the landing page
	public function sort(){
		if($this->input->is_ajax_request()){
			$limit = $this->input->get('limit');
			$order = $this->input->get('order');

			$sessiondata = array(
				'search_order' 	=> $order,
				'search_limit'	=>	$limit,
			);
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
                        }
                }
			$this->session->set_userdata($sessiondata);

			if($limit){
               /*$users                   = $this->therapist->therapistsort($limit, $order);
               $userlogs                = $this->therapist->getUserLog();
               $merge['userdatas']      = $this->load->view('frontend/therapist/list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
               $total_rows              = $this->therapist->countTherapists($latitude,$longitude);
               $merge['num']            =  ceil($total_rows/$limit); 
               echo json_encode($merge);
               exit; */
               $users                   = $this->user_model->orderByCare(7);
               $userlogs                = $this->user_model->getUserLog();
               $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
               $total_rows              = $this->user_model->countUserTable($latitude,$longitude);
               $merge['num']            =  ceil($total_rows/$limit); 
               echo json_encode($merge);
               exit;                      
			}
		}
	}
    //by kiran    
    public function sort_cate(){
        $limit = $this->input->get('limit');
               $order = $this->input->get('order');
               $care_id = $_GET['order'];
               $care_type = $_GET['care_type'];
               $care = $_GET['care'];
               $ipdata     = $this->common_model->getIPData($this->ipaddress);
               $response   = $this->common_model->getLongitudeAndLatitude($ipdata['city']);
               $sess_data = array(
                            'search_limit' => $limit,
                            'search_order' => $order
                        );
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
                        }
                }        
                $this->session->set_userdata($sess_data);
                   if($limit){
                            if($care == 'care'){
                               $users            = $this->user_model->orderByCare($care_id);
                           }else{
                            $users              = $this->user_model->sort($limit, $order);
                           }
                           $userlogs                = $this->user_model->getUserLog();
                           $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
                           $total_rows              = $this->user_model->countUserTable($latitude,$longitude);
                           $merge['num']            =  ceil($total_rows/$limit); 
                           echo json_encode($merge);
                           exit;
                       
                   }
    }    

	// pagination 
	function pages(){
    $this->breadcrumbs->push('Therapist', site_url().'/therapist');
    $this->breadcrumbs->unshift('Home', base_url());


    $ipdata     = $this->common_model->getIPData($this->ipaddress);
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

        $data['main_content']  = 'frontend/therapist/index';
        $data['userdatas']     =  $this->therapist->getAllTherapist($latitude,$longitude,$offset,$per_page);
        $data['userlogs']      = $this->therapist->getUserLog();
        $data['countries']     = $this->common_model->getCountries();
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }


    public function search(){
        $limit = 15; 
        if($this->input->is_ajax_request()){
        $ipdata     = $this->common_model->getIPData($this->ipaddress);
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
            $data['neighbour']          = $this->input->get('neighbour',true);
            $data['caregiverage_from']  = $this->input->get('caregiverage_from',true);
            $data['caregiverage_to']    = $this->input->get('caregiverage_to',true);
            $data['gender']             = $this->input->get('gender',true);
            $data['lang']               = $this->input->get('languages',true);
            $data['observance']         = $this->input->get('observance',true);
            $data['insurance']          = $this->input->get('accept_insurance',true);
            $data['care_type']          = $this->input->get('care_type',true);
            $data['smoker']	  			    = $this->input->get('smoker',true);

            $result = $this->therapist->therapistsearch($data,$latitude,$longitude);
            
            if(!$result)
                $total_rows = 0;
            else
                $total_rows = count($result); 
            
            $userlogs           = $this->therapist->getUserLog();
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
              $url = site_url().'therapists/index/';
              $users                   = $this->therapist->searchbylocation($latitude,$longitude); 
                if($users != false)
                    $total_rows = count($users);
                else
                    $total_rows = 0;

              $userlogs                = $this->therapist->getUserLog();
              $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true);
              $merge['total_rows']     = $total_rows;
              $merge['num']            = ceil($total_rows/$per_page);

              echo json_encode($merge);
              exit; 

          }
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
              'language'          => $this->input->post('language',true),
              'observance'        => $this->input->post('observance',true),
              'accept_insurance'  => $this->input->post('accept_insurance',true),
              'gender'            => $this->input->post('gender',true),
              'care_type'         => $this->input->post('care_type',true)
          );
        $q = $this->db->insert('tbl_searchhistory',$data);
        if($q)
          echo 'search saved';exit();
      }

   }
}
?>