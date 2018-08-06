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
    	    $this->load_ads('caregivers', 'Caregivers', 'caregivers');
    	}
    	
    	public function careseekers() {
    	    $this->load_ads('jobs', 'Jobs', 'jobs', 2);
    	}
    	
    	public function babysitter() {
    	    $this->load_ads(1, 'Babysitters', 'caregivers');
    	}
    	
    	public function nanny() {
    	    $this->load_ads(2, 'Nanny / Au-pairs', 'caregivers');
    	}
    	
    	public function nursery() {
    	    $this->load_ads(3, 'Nursery / Playgroup / Drop off / Gans', 'caregivers');
    	}
    	
    	public function tutor() {
    	    $this->load_ads(4, 'Tutor / Private lessons', 'caregivers');
    	}
    	
    	public function senior_caregiver() {
    	    $this->load_ads(5, 'Senior Caregivers / Companions', 'caregivers');
    	}
    	
    	public function special_needs_caregiver() {
    	    $this->load_ads(6, 'Special Needs Caregivers / Companions', 'caregivers');
    	}
    	
    	public function therapist() {
    	    $this->load_ads(7, 'Therapists', 'therapists');
    	}
    	
    	public function cleaning() {
    	    $this->load_ads(8, 'Cleaning / Household Helpers', 'caregivers');
    	}
    	
    	public function errand_runner() {
    	    $this->load_ads(9, 'Errand Runner / Odd Jobs / Personal Assistant / Drivers', 'caregivers');
    	}
    	
    	public function babynurse() {
    	    $this->load_ads(10, 'Pediatric / Baby Nurse', 'caregivers');
    	}
    	
    	public function daycarecenter() {
    	    $this->load_ads(11, 'Day Care Center / Day Camp / Afternoon Activities', 'caregivers');
    	}
    	
    	public function seniorcareagency() {
    	    $this->load_ads(13, 'Senior Care Agencies', 'caregivers', 3);
    	}
    	
    	public function specialneedscenter() {
    	    $this->load_ads(14, 'Special Needs Centers', 'caregivers', 3);
    	}
    	
    	public function cleaninghousehold() {
    	    $this->load_ads(15, 'Cleaning / Household Help Companies', 'caregivers', 3);
    	}
    	
    	public function seniorcarecenter() {
    	    $this->load_ads(16, 'Assisted living / Senior Care Center / Nursing Homes', 'caregivers', 3);
    	}
    	
    	public function careseeker_babysitter()
    	{
    	    $this->load_ads(17, 'Babysitter Jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_nanny()
    	{
    	    $this->load_ads(18, 'Nanny Jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_tutor()
    	{
    	    $this->load_ads(19, 'Tutor / Private Lessons Jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_seniorcaregiver()
    	{
    	    $this->load_ads(20, 'Senior Caregiver / Companion Jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_errandrunner()
    	{
    	    $this->load_ads(21, 'Errand Runner / Odd Jobs / Personal Assistant / Driver jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_specialneedscaregiver()
    	{
    	    $this->load_ads(22, 'Special Needs Caregiver / Companion Jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_babynurse()
    	{
    	    $this->load_ads(23, 'Pediatric / Baby Nurse Jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_cleaninghousehold()
    	{
    	    $this->load_ads(24, 'Cleaning / Household Help Jobs', 'jobs', 2);
    	}
    	
    	public function careseeker_childcarefacility()
    	{
    	    $this->load_ads(25, 'Workers / Staff for Childcare Facility Jobs', 'jobs', 3);
    	}
    	
    	public function careseeker_seniorcarefacility()
    	{
    	    $this->load_ads(26, 'Workers / Staff for Senior Care Facility Jobs', 'jobs', 3);
    	}
    	
    	public function careseeker_specialneedsfacility()
    	{
    	    $this->load_ads(27, 'Workers / Staff for Special Needs Facility Jobs', 'jobs', 3);
    	}
    	
    	public function careseeker_cleaningcompany()
    	{
    	    $this->load_ads(28, 'Workers for Cleaning Company Jobs', 'jobs', 3);
    	}
    	
    	public function organizations($care = null)
    	{
    	    $title = 'Care Institutions';
            $care_type = 'organizations'; 
    	    if( $care == 'day-care-center-day-camp-afternoon-activities' ) {
                $title = "Day Care Centers";
                $care_type = 11;
            }
            elseif( $care == 'nursery-playgroup-drop-off-gan') {
                $title = "Nursery / Playgroups";
                $care_type = 3;
            }
            
            elseif( $care == 'senior-care-agency') {
                $title = "Senior Care Agencies";
                $care_type = 13;
            }
            
            elseif( $care == 'special-needs-center') {
                $title = "Special Needs Centers";
                $care_type = 14;
            }
            
            elseif( $care == 'cleaning-household-help-company') {
                $title = "Cleaning Companies";
                $care_type = 15;
            }
            
            $this->load_ads($care_type, $title, 'organizations', 3, true);
    	}
    	
    	public function organizationWorkers($care = null)
    	{
    	    $title = 'Workers / Staff';
            $care_type = 'organizations'; 
            if( $care == 'workers-staff-for-childcare-facility' ) {
                $title = "Workers / Staff for Childcare Facilities";
                $care_type = 1;
            }
            elseif( $care == 'workers-staff-for-senior-care-facility') {
                $title = "Workers / Staff for Senior Care Facilities";
                $care_type = 5;
            }
            
            elseif( $care == 'workers-staff-for-special-needs-facility') {
                $title = "Workers / Staff for Special Needs Facilities";
                $care_type = 6;
            }
            
            elseif( $care == 'workers-for-cleaning-company') {
                $title = "Workers for Cleaning Companies";
                $care_type = 8;
            }

            $this->load_ads($care_type, $title, 'organizations', 2, true);
    	}
    	
    	public function load_ads($care, $title, $seotitle, $account_category = 1, $organization = false) {
    	    $item_per_page = 15;
            $option = "distance";
            $distance = 50;                     
            $this->breadcrumbs->push($title, site_url().'#');
            $this->breadcrumbs->unshift('Home', base_url());
                                            
            $query = $_GET;
            if (isset($query['location']) && isset($query['lat']) && isset($query['lng'])) {
                $location = $query['location'];
                $latitude = $query['lat'];
                $longitude = $query['lng'];
            } else {                               
                $results = $this->common_model->get_location();
                $latitude = $results['latitude'];
                $longitude = $results['longitude'];
                $location = $results['location'];
            }
            
            if (isset($query['distance'])) {
                $distance = $query['distance'];
            } else {
                $distance = 50;
            }
            $locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
            
            $data = array(
      			'main_content' 	    => 'frontend/search/common_caregiver',                            
      			'title'			    => $title,
      			'seotitle'          => $seotitle,
                'pages'             => ceil($get_total_rows/$item_per_page),
                'account_category'  => $account_category,
                'care_type'         => $care,
                'location'          => $locationdetails,
                'careId'            => explode(',', $query['ids']),
                'distance'          => $distance
      		);
      		$this->load->view(FRONTEND_TEMPLATE, $data);
    	}
    
        public function featured()
        {
            $result = $this->common_care_model->featured();
            echo json_encode($result);
        }
        
        public function search()
        {
            $page = $this->input->get('pagenum',true);
            $limit = $this->input->get('per_page',true);
            if (!((int) $limit > 0)) {
                $limit = 15;
            }
    	    $offset = 0;
    	    if ($page > 1) {
    	        $offset = ($page - 1) * $limit;
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
    		if ($this->input->get('care_type') > 30 || $this->input->get('care_type') == 'organizations') {
    		    if ($this->input->get('care_type') > 30) { 
    		        $data['care_type'] = $this->input->get('care_type') - 30;
    		    } else {
    		        $data['care_type'] = '11,13,16,14,15';
    		    }
    		    $totalresult = $this->common_care_model->get_count($data,$latitude,$longitude, false);
    		    $result = $this->common_care_model->filter($data,$latitude,$longitude, false, $limit, $offset);
    		} else if ($this->input->get('care_type') == 'organization-workers') {
    		    $totalresult = $this->common_care_model->get_count($data,$latitude,$longitude, true);
    		    $result = $this->common_care_model->filter($data,$latitude,$longitude, true, $limit, $offset);
    		} else {
    		    $totalresult = $this->common_care_model->get_count($data,$latitude,$longitude, false);
    		    $result = $this->common_care_model->filter($data,$latitude,$longitude, false, $limit, $offset);
    		}
    		$total = (int) $totalresult['count(*)'];
            $pagination = $this->get_pagination($total, $limit, $page);
                
            $locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
            
            $merge['userdatas']  = $this->load->view('frontend/search/common_profile_list', array('userdatas'=>$result,'location'=>$locationdetails, 'reviewModel' => $this->load->model('review_model')), true); 
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
            	    $pagination .= '<a href="#" class="paginate_click" id="previous"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Previous Page</a>';
                } else {
                    $pagination .= '<a href="#" class="paginate_click inactive" id="inactive"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Previous Page</a>';
                }
                $pagination .= '&nbsp;&nbsp;|&nbsp;&nbsp;';
                for($i = $first; $i<=$pages && $i <= $first + 4; $i++)
               {
                       
                       if($i==$page){
                        $pagination .= ' <a href="#" style="display:none" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
                    }else{
                        $pagination .= ' <a href="#" style="display:none" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';   
                }
                    
               }
            	if ($page < $pages) {
                    $pagination .= '<a href="#" class="paginate_click" id="next">Next Page&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>';
            	} else {
            	    $pagination .= '<a href="#" class="paginate_click inactive" id="inactive">Next Page&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>';
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
                    'distance'              => $distance,
                    'createAlert'           => 1
                );
    
                $q = $this->db->insert('tbl_searchhistory',$data);
                if($q)
                    echo 'save successfully.';exit();
            }
        }
 }
        
