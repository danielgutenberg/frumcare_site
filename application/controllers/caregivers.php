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
        $this->ipaddress = $_SERVER['REMOTE_ADDR'];
    }

    public function details($slug,$care_type){
        $slug = urldecode($this->uri->segment(3));
        $care_type = $this->uri->segment(4);
        if (!($care_type > 0) || $care_type > 35) {
            show_404();
        }
        $details      = $this->user_model->getUserDetailsBySlug($slug,$care_type);
        
        if (empty($details)) {
            show_404();
        }
        $this->breadcrumbs->push($type[0]['service_name'], '#');
        $this->breadcrumbs->push($details['name'], '#');
        $this->breadcrumbs->unshift('Home', base_url());
        $data['main_content']   = 'frontend/caregivers/details';
        $data['recordData']     = $details;
        $data['title']          = 'Caregivers Details';
        $data['number_reviews'] = $this->review_model->countReviewById($details['id']);
        $data['userlog']        = $this->user_model->getUserLogById($details['user_id']);
        $data['similar_types']  = $this->user_model->getSimilarPersons($details['care_type'],$details['id']);
        $data['care_id']        = $details['id']; 
        
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }

    public function favorite(){
        if($this->input->is_ajax_request()){
            $data = array(
                'user_id'       => $this->input->post('user_id',true),
                'profile_id'    => $this->input->post('profile_id',true),
            );
            
            $res = $this->db->get_where('tbl_favorites',$data);
            $q = $res->num_rows();
            if ($q > 0) {
                echo 'Profile favorites successfully';exit;
            } else {
                $this->db->insert('tbl_favorites',$data);
                echo 'Profile favorites successfully';exit;
            }
        }
    }


}
   

