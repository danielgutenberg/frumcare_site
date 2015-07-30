<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Caregivers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('breadcrumbs');
        $this->load->model('user_model');
        $this->load->model('review_model');
        $this->load->model('common_model');
        $this->load->model('caretype_model');
        $this->load->model('refrence_model');
        $this->load->model('common_care_model');
        $this->load->model('babysitter_model');
        $this->ipaddress = $_SERVER['REMOTE_ADDR'];
    }

    public function index(){            
            $item_per_page = 15;
            $option = "distance";
            $account_category = 1;
            $care_type = '';//blank for careseekers and caregiver
            $title = "Caregivers";
            $distance = "unlimited";                     
            $this->breadcrumbs->push($title, site_url().'#');
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
            $locationdetails = ['lat' => $latitude, 'lng' => $longitude, 'place' => $location];
            $userdata       = $this->common_care_model->sort($item_per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance);
            $get_total_rows = count($userdata);                                                         
            $data = array(
              				'main_content' 	    => 'frontend/common_caregiver',                            
              				'title'			    => $title,
                            'pages'             => ceil($get_total_rows/$item_per_page),
                            'countries'         => $this->common_model->getCountries(),
                            'userlogs'		    => $this->user_model->getUserLog(),
                            'userdatas'		    => array_slice($userdata, 0, 15),
                            'account_category'  => $account_category,
                            'care_type'         => $care_type,
                            'total_rows'        => $get_total_rows,
                            'location'          => $locationdetails              				              				              				                            
              			);                      
            $this->load->view(FRONTEND_TEMPLATE, $data);
    }
    public function organization(){
        $item_per_page = 15;
            $option = "distance";
            $account_category = 3;
            $care_type = '';//blank for careseekers and caregiver
            $title = "Caregiving Organization";
            $distance = "unlimited";                     
            $this->breadcrumbs->push($title, site_url().'#');
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

         $ipdata     = $this->common_model->getIPData($this->ipaddress);
         $cat = $this->uri->segment(2)?$this->uri->segment(2):'';
         $this->breadcrumbs->push('Caregivers', site_url().'#');
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
        }else{
            if(is_array($ipdata)){
                $latitude = ($ipdata['lat']);
                $longitude = ($ipdata['lon']);
            }    
        }

        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
        $offset =    ($page - 1) * $per_page;
        if($offset > 1)
            $per_page = $page * $per_page;

        $userdata   = $this->user_model->getAllDetails($acc_cat,$offset,$per_page,$latitude,$longitude);    
        
        $data['main_content']  = 'frontend/caregivers/index';
        $data['userdatas']     = $userdata;
        $data['userlogs']      = $this->user_model->getUserLog();
        $data['countries']     = $this->common_model->getCountries();
        $data['ipdata']        = $ipdata;
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    public function details($slug,$care_type){
        $slug = urldecode($this->uri->segment(3));
        $care_type = $this->uri->segment(4);
        $details      = $this->user_model->getUserDetailsBySlug($slug,$care_type);
        $type = Caretype_model::getCareTypeById($details['care_type']);

        $this->breadcrumbs->push($type[0]['service_name'], '#');
        $this->breadcrumbs->push($details['name'], '#');
        $this->breadcrumbs->unshift('Home', base_url());
        
        $data['main_content']   = 'frontend/caregivers/details';
        $data['recordData']     = $details;
        $data['title']          = 'Caregivers Details';
        $data['caretypes']      = $this->caretype_model->getAllCareType();
        $data['availablility']  = $this->user_model->getCurrentUserTimeTable($details['id']);
        $data['number_reviews'] = $this->review_model->countReviewById($details['id']);
        $data['userlog']        = $this->user_model->getUserLogById($details['user_id']);
        $data['reviewdatas']    = $this->review_model->getAllReviews($details['id']);
        $data['similar_types']  = $this->user_model->getSimilarPersons($details['care_type'],$details['id']);
        $data['care_type']      = $this->caretype_model->getAllCareType();
        $data['refrences']      = $this->refrence_model->getLatestRefrences($details['id']);
        $data['care_id'] = $details['id']; //condition for blocking own review and rating
       // if($this->session->userdata('search_data')){
         //   $this->db->insert('tbl_searchhistory',$this->session->userdata('search_data'));
            //$this->session->unset_userdata('search_data');
        //}
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }

    public function contact($slug = null){
        $slug = $this->uri->segment(4);
        
        $data['main_content']  = 'frontend/caregivers/contact';
        $data['title']         = 'Contact';

        $this->load->view(FRONTEND_TEMPLATE,$data);
    }

    function category($cat = null){
        $cat_id = $this->uri->segment(2);
        $this->load->library('pagination');
        
        $config['base_url'] = site_url().'caregivers/'.$cat_id.'';
        $config['total_rows'] = 100;
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
        $config['num_links'] = 1;
        $config['full_tag_open'] = '<div class="navigations">';
        $config['full_tag_close'] = '</div>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<span class="in-active">';
        $config['prev_tag_close'] = '</span>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<span class="in-active">';
        $config['next_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></span>';
        $config['num_tag_open'] = '<span class="in-active">';
        $config['num_tag_close'] = '</span>';
        $config['first_tag_open'] = '<span class="in-active">';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="in-active">';
        $config['last_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
        $data =  array(
            'main_content' => 'frontend/caregivers/category',
            'title'        => 'Catgory ',
            'userdatas'    => $this->user_model->getAllByCategoryId($cat_id),
            'countries'    => $this->common_model->getCountries(),
            'userlogs'     => $this->user_model->getUserLog(),
            'links'        => $this->pagination->create_links()
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);
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
                               $users              = $this->user_model->sort($limit, $order); 
                           }else{
                                 $users            = $this->user_model->orderByDistance($limit);
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

    function getPages(){
        $ipdata     = $this->common_model->getIPData($this->ipaddress);
        if(is_array($ipdata)){
            $lat = $ipdata['lat'];
            $lon = $ipdata['lon'];
        }
        if($this->input->is_ajax_request()){
            $per_page = $this->input->get('per_page');
            $total_rows = $this->user_model->countUserTable($lat,$lon);
            $number_pages = ceil($total_rows/$per_page);
            echo $number_pages;
        }
    }

    function search(){
        if($this->input->is_ajax_request()){
            $postdata   = $this->input->post();
            $limit      = 15;
            $ipdata     = $this->common_model->getIPData($this->ipaddress);
            $response   = $this->common_model->getLongitudeAndLatitude($ipdata['city']);
            $latitude   = $response->results[0]->geometry->location->lat;
            $longitude  = $response->results[0]->geometry->location->lng;

            $users                = $this->user_model->leftsiderbarsearch($postdata,$latitude,$longitude);
            $userlogs             = $this->user_model->getUserLog();
            $merge['userdatas']   = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
            $total_rows           = $this->user_model->countUserTable();
            $merge['num']         =  ceil($total_rows/$limit); 
            echo json_encode($merge);
            exit;

        }
    }

    function searchRecord(){
        if($this->input->is_ajax_request()){
            $limit = 15;
            $postdata             = $this->input->post();
            
            if(isset($this->session->userdata['current_user'])){
                $this->saveasHistory($postdata);    
            }
            

            $users                = $this->user_model->searchRecord($postdata);
            $userlogs             = $this->user_model->getUserLog();
            $merge['userdatas']   = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
            $total_rows           = count($users); //$this->user_model->countUserTable();
            $merge['num']         =  ceil($total_rows/$limit); 
            $merge['total']       = $total_rows;  
            echo json_encode($merge);
            exit;
        }
    }

    function saveasHistory($postdata){
            //$postdata             = $this->input->post();
            if(isset($postdata['time']))
                $time = join(',', $postdata['time']);
            if(isset($postdata['background_check']))
                $background_check = $postdata['background_check'];
            if(isset($postdata['year_experience']))
                $year_experience = $postdata['year_experience'];
            if(isset($postdata['no_children']))
                $no_children = $postdata['no_children'];
            if(isset($postdata['experience']))
                $experience = $postdata['experience'];
            if(isset($postdata['education']))
                $education = $postdata['education'];
            $category = $postdata['category'];

            $user_id        = $this->session->userdata['current_user'];
            
            // $keywords = join(',',array($time,$background_check,$year_experience,$no_children,$experience,$education));
            


             $searcheddata = array(
                'time'              => $time,
                'year_experience'   => $year_experience,
                'user_id'           => $user_id,
                'searcheddate'      => date('Y-m-d'),
                'no_children'       => $no_children,
                'experience'        => $experience,
                'education'         => $education,
                'background_check' => $background_check
             );

             $this->db->insert('tbl_searchhistory',$searcheddata);

    }

    public function favorite(){
        if($this->input->is_ajax_request()){
            $data = array(
                'user_id'       => $this->input->post('user_id',true),
                'profile_id'    => $this->input->post('profile_id',true),
            );
            
            $res = $this->db->get_where('tbl_favorites',$data);
            $q = $res->num_rows();
            if($q>0){
                //$this->db->update('tbl_favorites',$data);
                echo 'Profile favorites successfully';exit;
            }else{
                $this->db->insert('tbl_favorites',$data);
                echo 'Profile favorites successfully';exit;
            }

            
        }
    }
    
    public function sort_cate(){

        if($this->input->is_ajax_request()){
            $limit          = $this->input->get('limit',true);
            $care_type      = $this->input->get('care_type',true);
             
        }
               
               $ipdata     = $this->common_model->getIPData($this->ipaddress);
               $response   = $this->common_model->getLongitudeAndLatitude($ipdata['city']);
               $sess_data = array(
                             'search_limit' => $limit,
                             'search_order' => $care_type
                         );
               $this->session->set_userdata($sess_data);
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

               $users                   = $this->user_model->sort($limit, $care_type,$latitude,$longitude);
               $userlogs                = $this->user_model->getUserLog();
               $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs), true);
               $total_rows              = $this->user_model->countUserTable($latitude,$longitude);
               $merge['num']            =  ceil($total_rows/$limit); 
               echo json_encode($merge);
               exit;
    }
    
    public function searchbylocation(){
        if($_GET){
            $latitude   = ($this->input->get('latitude',true));
            $longitude  = ($this->input->get('longitude',true));
            $acc_cat    = $this->input->get('account_category',true);
            $location   = $this->input->get('location',true);
            $per_page = 15;
            $page = $this->uri->segment(3)?$this->uri->segment(3):1;
            $offset =    ($page - 1) * $per_page;
            $url = site_url().'caregivers/index/';

            $users   = $this->user_model->getAllDetails($acc_cat,$offset,$per_page,$latitude,$longitude);
            if($users != false){
                $total_rows = count($users);
            }else{
                $total_rows = 0;
            }

            $userlogs                = $this->user_model->getUserLog();
            $merge['userdatas']      = $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$users,'userlogs'=>$userlogs,'location'=>$location), true);
            $merge['total_rows']     =  $total_rows;
            $merge['num']           =  ceil($total_rows/$per_page); 
            echo json_encode($merge);
            exit; 

        }
    }


}
   

