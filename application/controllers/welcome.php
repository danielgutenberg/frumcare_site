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
	
	function sync()
	{
	    print_rr('function removed');
	    set_time_limit(0);
	    $this->load->model('user_model');
        $this->load->library('activeCampaign');
	    $users = $this->user_model->getAllUsers();
	    $ac = $this->activecampaign;
	    foreach ($users as $user) {
	        if ($user->id > 390 && strpos( $user->name , 'test' ) == false && strpos( $user->email , 'test' ) == false ) {
    	        $tags = [];
    	        $serviceTags = [];
    	        $userProfiles = $this->user_model->get_all_profile($user->id);
    	        if (count($userProfiles) > 0) {
        	        foreach ($userProfiles as $userProfile) {
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
        	        
        	        if ($this->user_model->getNewsletterSubscription($user->email)) {
        	            $serviceTags[] = '[CT] Newsletter';
        	        }
        	        
        	        $name = explode(' ', $user->name);
        	        $contact = array(
                		"email"      => $user->email,
                		"first_name" => array_shift($name),
                		"last_name"  => implode(' ', $name),
                		"p[6]"       => 6,
                		"status[6]"  => 1,
                		"tags"       => implode(',', array_merge($tags, $serviceTags)),     
                		"phone"     => $user->contact_number,
                		"field[%LOCATION%]" => $user->location,
                		"field[%COUNTRY%]" => $user->country
                 	);
        	        $account = $ac->api("contact/sync", $contact);
    	        }
	        }
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
            echo "1";
        }else{
            echo "0";
        }
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
