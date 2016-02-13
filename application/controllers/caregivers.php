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
        $details      = $this->user_model->getUserDetailsBySlug($slug,$care_type);
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


}
   

