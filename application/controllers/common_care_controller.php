<?php 
    if(!defined('BASEPATH'))exit('No direct script access allowed');

    class Common_care_controller extends CI_Controller{
        
    	public function __construct(){
    		parent:: __construct();
            $this->load->library('breadcrumbs');
            $this->load->model('common_care_model');
            $this->load->model('common_model');
            $this->ipaddress = $_SERVER['REMOTE_ADDR'];
            $this->load->model('user_model');
            $this->load->model('review_model');
            $this->load->model('caretype_model');
    	}
    	
    	public function index() {
    	    $this->load_ads('caregivers', 'Caregivers');
    	}
    	
    	public function babysitter() {
    	    $this->load_ads(1, 'Babysitter');
    	}
    	
    	public function nanny() {
    	    $this->load_ads(2, 'Nanny / Au-pair');
    	}
    	
    	public function nursery() {
    	    $this->load_ads(3, 'Nursery / Playgroup / Drop off / Gan');
    	}
    	
    	public function tutor() {
    	    $this->load_ads(4, 'Tutor / Private lessons');
    	}
    	
    	public function senior_caregiver() {
    	    $this->load_ads(5, 'Senior Caregiver');
    	}
    	
    	public function special_needs_caregiver() {
    	    $this->load_ads(6, 'Special Needs Caregiver');
    	}
    	
    	public function daycarecenter() {
    	    $this->load_ads(10, 'Day Care Center / Day Camp / Afternoon Activities');
    	}
    	
    	public function seniorcareagency() {
    	    $this->load_ads(13, 'Senior Care Agency', 3);
    	}
    	
    	public function specialneedscenter() {
    	    $this->load_ads(14, 'Special needs center', 3);
    	}
    	
    	public function seniorcarecenter() {
    	    $this->load_ads(16, 'Assisted living / Senior Care Center / Nursing Home', 3);
    	}
    	
    	
    	public function load_ads($care, $title, $account_category = 1) {
    	    $item_per_page = 15;
            $option = "distance";
            $account_category = 1;
            $distance = "unlimited";                     
            $this->breadcrumbs->push($title, site_url().'#');
            $this->breadcrumbs->unshift('Home', base_url());
                                            
            $loc = $_GET;
            if (isset($loc['location']) && isset($loc['lat']) && isset($loc['lng'])) {
                $location = $loc['location'];
                $latitude = $loc['lat'];
                $longitude = $loc['lng'];
            } else {                               
                $results = $this->common_model->get_location();
                $latitude = $results['latitude'];
                $longitude = $results['longitude'];
                $location = $results['location'];
            }
            $locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
            $data = [
                'care_type' => $care,
                'distance'  => $distance,
                'sort_by'   => $option,
                'per_page'  => $item_per_page
            ];
            $userdata = $this->common_care_model->filter($data,$latitude,$longitude);
            
            $get_total_rows = count($userdata);
            $data = array(
      			'main_content' 	    => 'frontend/common_caregiver',                            
      			'title'			    => $title,
                'pages'             => ceil($get_total_rows/$item_per_page),
                'countries'         => $this->common_model->getCountries(),
                'userlogs'		    => $this->user_model->getUserLog(),
                'userdatas'		    => array_slice($userdata, 0, 15),
                'account_category'  => $account_category,
                'care_type'         => $care,
                'total_rows'        => $get_total_rows,
                'location'          => $locationdetails              				              				              				                            
      		);
      		$this->load->view(FRONTEND_TEMPLATE, $data);
    	}
    
        
        public function search()
        {
            $page = $this->input->get('pagenum',true);
            $limit = $this->input->get('per_page',true); 
    	    $offset = 0;
    	    if ($page > 1) {
    	        $offset = ($page - 1) * 15;
    	    }
            $latitude = $this->input->get('lat',true);
            $longitude = $this->input->get('lng',true);
            $location = $this->input->get('location',true);
            if (!$latitude || !$longitude || !$location) {
                $results = $this->common_model->get_location();
                $latitude = $results['latitude'];
                $longitude = $results['longitude'];
                $location = $results['location'];
    		}
    		$data = $this->input->get(NULL, true);
    		$result = $this->common_care_model->filter($data,$latitude,$longitude);
            if(!$result) {
                $total = 0;
            } else {
                $total = count($result);
            }
            $pagination = $this->get_pagination($total, $limit, $page);
                
            $locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
    		$result = array_slice($result, $offset , $limit);
            $userlogs            = $this->user_model->getUserLog();
            $merge['userdatas']  = $this->load->view('frontend/common_profile_list', array('userdatas'=>$result,'userlogs'=>$userlogs,'location'=>$locationdetails), true); 
            $merge['num']        = ceil($total/$limit); 
            $merge['total']      = $total;
            $merge['pagination'] = $pagination;
            $merge['location']   = $location;
            echo json_encode($merge);
            exit;
        }
        
        function get_pagination($total, $limit, $page)
        {
            $first = 1;
            $pages = ceil($total/$limit);        
            $pagination	= '';
            if ($page > 3 and $pages > 5) {
                $first = $page - 2;
            }
            
            if($pages > 1){	
                if ($page > 1) {
            	    $pagination .= '<a href="#" class="paginate_click in-active" id="previous">previous</a>';
                }
            	for($i = $first; $i<=$pages && $i <= $first + 4; $i++)
            	{
            		
            		if($i==$page){
                        $pagination .= ' <a href="#" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
                    }else{
                        $pagination .= ' <a href="#" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';   
                    }
                    
            	}
            	if ($page < $pages) {
                    $pagination .= '<a href="#" class="paginate_click in-active" id="next">next</a></div>';
            	}
            }
            
            return $pagination;
        }
        
        public function savesearch(){
        
            if(check_user() != false){
                $user_id    = check_user();
            }else{
                $user_id    = 0; 
            }
    
            if($this->input->is_ajax_request()){
                $distance = $this->input->post('distance', true) == 'unlimited' ? 99999 : $this->input->post('distance', true);
                $data = array(
                    'user_id'               => $user_id, 
                    'gender'                => $this->input->post('gender',true),
                    'smoker'                => $this->input->post('smoker',true),
                    'language'              => $this->input->post('lang',true),
                    'observance'            => $this->input->post('observance',true),
                    'number_of_children'    => $this->input->post('number_of_children',true),
                    'morenum'               => $this->input->post('morenum',true),
                    'age_group'             => $this->input->post('age_group',true),
                    'looking_to_work'       => $this->input->post('year_experience',true),
                    'driver_license'        => $this->input->post('driver_license',true),
                    'vehicle'               => $this->input->post('vehicle',true),
                    'pick_up_child'         => $this->input->post('pick_up_child',true),
                    'cook'                  => $this->input->post('cook',true),
                    'basic_housework'       => $this->input->post('basic_housework',true),
                    'homework_help'         => $this->input->post('homework_help',true),
                    'on_short_notice'       => $this->input->post('on_short_notice',true),
                    'caregiverage_from'     => $this->input->post('caregiverage_from',true),
                    'caregiverage_to'       => $this->input->post('caregiverage_to',true),
                    'start_date'            => $this->input->post('start_date',true),
                    'care_type'             => $this->input->post('care_type',true) > 0 ? $this->input->post('care_type',true) : 0,
                    'lat'                   => $this->input->post('lat', true),
                    'long'                  => $this->input->post('lng', true),
                    'location'              => $this->input->post('location', true),
                    'distance'              => $distance
                );
    
                $q = $this->db->insert('tbl_searchhistory',$data);
                if($q)
                    echo 'save successfully.';exit();
            }
        }
 }
        
