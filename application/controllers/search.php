<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Search extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('search_model');
			$this->load->model('common_model');
			$this->load->model('user_model');
			$this->load->model('caretype_model');
            $this->load->model('Review_model');
			$this->load->library('breadcrumbs');
			$this->ipaddress = $_SERVER["REMOTE_ADDR"];

		}

		public function index(){
			$name 		= $this->input->get('search_for',true);
			$category 	= $this->input->get('category',true);

			$this->breadcrumbs->push('Search', base_url().'#');
	        $this->breadcrumbs->unshift('Home', base_url());
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
			$data = array(
				'main_content' => 'frontend/search/index',
				'title'		   => 'Search Results',
				'recordData'   => $this->search_model->search($name,$category,$latitude,$longitude),
				'userlogs' 	   => $this->user_model->getUserLog(),	
				//'ipdata'     => $this->common_model->getIPData($this->ipaddress),
                'category'     => isset($category)?$category:'',
                'search_for'   => $name,  
				'countries'    => $this->common_model->getCountries(),
                'location'          => $location,
			);	

			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
        public function left_search(){
            if(isset($_GET) && !empty($_GET['neighbour'])){
                if(check_user()){
                    $locationdetails = $this->common_model->getMyLocation(check_user());
                    if($locationdetails){
                        $latitude = floor($locationdetails[0]['lat']);
                        $longitude = floor($locationdetails[0]['lng']);
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
                    $latitude = floor($ipdata['lat']);
                    $longitude = floor($ipdata['lon']);
                }
            }
			$postdata['neighbor'] 			= $this->input->get('neighbour',true);
			$postdata['gender']   			= $this->input->get('gender',true);
			$postdata['smoker']	  			= $this->input->get('smoker',true);
			$postdata['language'] 			= $this->input->get('lang',true);
			$postdata['observance'] 		= $this->input->get('observance',true);
			$postdata['number_of_children'] = $this->input->get('number_of_children',true);
			$postdata['morenum']			= $this->input->get('morenum',true);
			$postdata['age_group']			= $this->input->get('age_group',true);
			$postdata['looking_to_work']	= $this->input->get('looking_to_work',true);
			$postdata['year_experience']	= $this->input->get('year_experience',true);
			$postdata['training']			= $this->input->get('training',true);
			$postdata['availability']		= $this->input->get('availability',true);
			$postdata['driver_license']		= $this->input->get('driver_license',true);
			$postdata['vehicle']			= $this->input->get('vehicle',true);
			$postdata['pick_up_child']		= $this->input->get('pick_up_child',true);
			$postdata['cook']				= $this->input->get('cook',true);
			$postdata['basic_housework']    = $this->input->get('basic_housework',true);
            $postdata['homework_help']		= $this->input->get('homework_help',true);
			$postdata['sick_child_care']	= $this->input->get('sick_child_care',true);
			$postdata['on_short_notice']	= $this->input->get('on_short_notice',true);
            $postdata['caregiverage_from']  = $this->input->get('caregiverage_from',true);
            $postdata['caregiverage_to']    = $this->input->get('caregiverage_to',true);
            $postdata['start_date']         = $this->input->get('start_date',true);
            $postdata['care_type']          = $this->input->get('care_type',true);
            $postdata['category']           = $this->input->get('category',true);
            $postdata['search_for']         = $this->input->get('search_for',true);
			$res = $this->search_model->left_search($postdata,$latitude,$longitude);

			if(is_array($res))
				$total = count($res);
			else
				$total = 0;
			$userlogs             	= $this->user_model->getUserLog();
            $merge['userdatas']   	= $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$res,'userlogs'=>$userlogs), true);
            $total_rows           	= $total;
           // $merge['num']         	= ceil($total_rows/@$limit); 
//            $merge['total']       	= $total_rows;  
            echo json_encode($merge);
            exit();
		}
        else
            echo "blank neighborhood";
	   }	
	}
