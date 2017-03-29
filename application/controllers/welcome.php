<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{        
		$this->load->model('testimonial_model');
		$this->load->model('common_model');
        $this->load->model('blog_model');
        
        $data['main_content'] 	= 'frontend/pages/home';
        $data['title'] 			= 'Home';
        $data['testimonial'] 	= $this->testimonial_model->getTestiomialsForHome();
        $this->load->view(FRONTEND_TEMPLATE, $data);
	}
	
	public function invite($slug,$care_type)
    {
        $this->session->set_flashdata('review', true);
        return redirect('/');
    }
	
	function sync()
	{
    //     $this->load->model('user_model');
    //     $corr = [
    //         5 => 20,
    //         6 => 22,
    //         20 => 5,
    //         22 => 6
    //     ];
	   // $sql = "select * from tbl_searchhistory where care_type in (5,6,20,22)";
    //     $query = $this->db->query($sql);
    //     $alerts = $query->result_array();
    //     foreach ($alerts as $a) {
    //         $profile = $this->user_model->getUserDetailsById($a['user_id'], $corr[$a['care_type']]);
    //         if (!empty($profile) && count($profile) > 1) {
    //             $this->db->where(array('id' => $a['id']));
    //             $this->db->update('tbl_searchhistory', ['gender_of_caregiver' => $profile['gender_of_caregiver']]);
    //         }
    //     }
    //     print_rr($res);
	    print_rr('function not available');
	    set_time_limit(0);
	    $this->load->model('admin/subscriptions_model');
	    $users = $this->subscriptions_model->getSubscriptions();
	    $this->load->library('activeCampaign');
	    $contacts = [];
	    foreach ($users as $user) {
	        $name = explode(' ', $user['name']);
	        $contact = array(
        		"email"      => $user['email'],
        		"first_name" => array_shift($name),
        		"last_name"  => implode(' ', $name),
        		"p[6]"       => 6,
        		"status[6]"  => 1,
        		"tags"       => '[CT] Newsletter'
         	);
         	$this->activecampaign->api("contact/sync", $contact);
	    }
	}

    function add_care_type()
    {
        $this->load->model('common_model');
        if($_POST) {
            $i = $_POST;
            $this->common_model->insert('tbl_care', $i);
            redirect('welcome/add_care_type');
        } else {
            $this->load->view('admin/care_type_view');
        }
    }
    
    function subscribe(){        
        $res = $this->common_model->subscribe();
        
        if($res){
            $sub_name = $_GET['sub_name'];
            $sub_email = $_GET['sub_email'];
            $this->load->library('activeCampaign');
            $name = explode(' ', $sub_name);
            $contact = array(
        		"email"      => $sub_email,
        		"first_name" => array_shift($name),
        		"last_name"  => implode(' ', $name),
        		"p[6]"       => 6,
        		"status[6]"  => 1,
        		"tags"       => '[CT] Newsletter'
         	);
         	$this->activecampaign->api("contact/sync", $contact);
            echo "1";
        }else{
            echo "0";
        }
    }
    
    function delete()
    {
        $this->load->model('user_model');
        $this->load->library('activeCampaign');
        $tags = [];
        $serviceTags = [];
        $ac = $this->activecampaign;
        $userId = check_user();
        $user = get_user($userId);
        $userProfiles = $this->user_model->get_all_profile($userId);
        if (count($userProfiles) > 0) {
            foreach ($userProfiles as $userProfile) {
                if ($userProfile->profile_status == 1) {
                    $tags[] = 'Profile Approved';
                }
                if ($userProfile->care_type < 11) {
                    $tags[] = $ac->tags[1];
                } else if ($userProfile->care_type < 17) {
                    $tags[] = $ac->tags[2];
                } else if ($userProfile->care_type < 25) {
                    $tags[] = $ac->tags[3];
                } else {
                    $tags[] = $ac->tags[4];
                }
                $serviceTags[] = $userProfile->service_name;
            }
            
         	if ($user['profile_picture_status'] == 1 && $user['profile_picture'] != '') {
         	    $tags[] = 'Photo Approved';
         	}
            $name = explode(' ', $user['name']);
            $contact = array(
        		"email"      => $user['email'],
        		"tags"       => array_merge($tags, $serviceTags),
         	);
            $ac->api("contact/tag_remove", $contact);
            
            $contact = array(
        		"email"      => $user['email'],
        		"tags"       => 'Account Deleted',
        		urlencode('field[%ACCOUNT_DELETED%,0]') => date('m/d/Y')
         	);
         	$ac->api("contact/sync", $contact);
         	
         	$this->user_model->deleteAccount($userId);
         	
        }
        echo $user['email'];
    }

    function success(){

        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('success', '');
        $this->breadcrumbs->unshift('Home', base_url());


        $data = array(
                'main_content' => 'frontend/success',
                'title'        => 'Success',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);

    }
    
    
    function smstest(){
        if($_POST){
            
            $params = array(
            'username' => 'michaelfrumcare', 
            'password' => 'eMVcNaDZgGdAcK', 
            'api' => '3494230'
            );  
            
            
            $msg=$this->input->post('msg');
            $number=$this->input->post('code');
            $res = $this->clickatell->send($number,$msg);
            if($res){
                $this->session->set_flashdata('success','message sent successfully');
            }else{
                $this->session->set_flashdata('error','error sending sms');
            }
            
            redirect('welcome/smstest');
        }else{
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('test sms','');
        $data=array(
            'main_content'=>'frontend/smstest',
            'title'=>'SMS TEST',
        );
        $this->load->view(FRONTEND_TEMPLATE,$data);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
