<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Careseeker_tutor extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->library('breadcrumbs');
	    $this->ipaddress = $_SERVER['REMOTE_ADDR'];
		$this->load->model('careseeker_tutor_model','tutor');
		$this->load->model('review_model');
		$this->load->model('user_model');
        $this->load->model('caretype_model');
        $this->load->model('common_model');
        $this->load->model('common_care_model');
	}

	public function index(){
        $item_per_page = 15;
        $option = "distance";
        $account_category = 2;
        $care_type = 19;//blank for careseekers and caregiver
        $title = "Tutor / private lessons jobs";        
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
    public function sort_cate(){
        $limit = $this->input->get('limit');
               $order = $this->input->get('order');
                
                
                $care_id = $_GET['order'];
                $care = $_GET['care'];
                $care_type = $_GET['care_type'];
               $ipdata     = $this->common_model->getIPData($this->ipaddress);
               $response   = $this->common_model->getLongitudeAndLatitude($ipdata['city']);
               //$latitude   = $response->results[0]->geometry->location->lat;
               //$longitude  = $response->results[0]->geometry->location->lng;
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
               $sess_data = array(
                            'search_limit' => $limit,
                            'search_order' => $order
                        );
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
    function getPages(){
        if($this->input->is_ajax_request()){
            $per_page = $this->input->get('per_page');
            $total_rows = $this->tutor->count_tutor();
            $number_pages = ceil($total_rows/$per_page);
            echo $number_pages;
        }
    }
    function pages(){
        $this->breadcrumbs->push('Tutor', site_url().'#');
        $this->breadcrumbs->unshift('Home', base_url());

        if(isset($this->session->userdata['search_limit'])){
            $per_page = $this->session->userdata['search_limit'];
        }else{
            $per_page = 15;
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

        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
        $offset =    ($page - 1) * $per_page;

        $ipdata     = $this->common_model->getIPData($this->ipaddress);
        $userdata   = $this->tutor->getAlltutor($latitude,$longitude,$per_page,$offset);
        
        $data['main_content']  = 'frontend/careseeker_tutor/index';
        $data['userdatas']     = $userdata;
        $data['userlogs']      = $this->user_model->getUserLog();
        $data['countries']     = $this->common_model->getCountries();
        $data['ipdata']        = $ipdata;
        $data['care_type']     = $this->caretype_model->getCare(2,1);
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }
    	public function search(){
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
    	}
			$postdata['neighbor'] 			= $this->input->get('neighbour',true);
			$postdata['subject']            = $this->input->get('subject',true);
			$postdata['morenum']			= $this->input->get('morenum',true);
			$postdata['gender']			    = $this->input->get('gender',true);
            $postdata['gender_of_caregiver']= $this->input->get('gender_of_caregiver',true);
			$postdata['looking_to_work']	= $this->input->get('looking_to_work',true);
			$postdata['availability']		= $this->input->get('availability',true);
            $postdata['start_date']         = $this->input->get('start_date',true);
			$postdata['rate']               = $this->input->get('rate',true);
            $postdata['rate_type']          = $this->input->get('rate_type',true);
            
            $result = $this->tutor->search($postdata,$latitude,$longitude);
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
				
			$locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
			$userlogs             	= $this->user_model->getUserLog();
            $merge['userdatas']   	= $this->load->view('frontend/common_profile_list', array('userdatas'=>$result,'userlogs'=>$userlogs,'location'=>$locationdetails), true);
            $merge['num']       =  ceil($total/$limit); 
            $merge['total']     = $total;
            $merge['pagination']       	= $pagination;
            $merge['location'] = $location;
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
                    $url = site_url().'careseeker_tutor/index/';
                    
                    $users   = $this->tutor->searchbylocation($latitude,$longitude);
                    if($users != false)
                        $total_rows = count($users);
                    else
                        $total_rows = 0;
                    
                    $userlogs                = $this->user_model->getUserLog();
                    $merge['userdatas']      = $this->load->view('frontend/careseekers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true);
                    $merge['total_rows']     = $total_rows;   
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
                        'user_id'               => $user_id,
                        'rate'                  => $this->input->post('rate',true),
                        'rate_type'             => $this->input->post('rate_type',true),
                        'neighbor'              => $this->input->post('neighbour',true),
                        'morenum'               => $this->input->post('morenum',true),
                        'looking_to_work'       => $this->input->post('looking_to_work',true),
                        'subjects'              => $this->input->post('subject',true),
                        'gender'                => $this->input->post('gender',true),
                        'gender_of_caregiver'   => $this->input->post('gender_of_caregiver',true),
                        'availability'          => $this->input->post('availability',true),
                        'start_date'            => $this->input->post('start_date',true),
                        'care_type'             => $this->input->post('care_type',true),
                    );

                    $q = $this->db->insert('tbl_searchhistory',$data);
                    if($q)
                        echo 'save search';exit();
                }
            }
 }
