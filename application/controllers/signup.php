<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('common_care_model');
        
    }

    function index(){   

        if(check_user() && segment(2) != 'get_care_type') {
            redirect('user/dashboard');
        }
        
        $data['at'] = isset($_GET['ac']) ? $_GET['ac']:'';
        $data['main_content'] = 'frontend/signup/signup_form';
        $data['title'] = 'Register';
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    function resend_verification()
    {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $update = array(
            'email' => $email,
            'name' => $name,
            'organization_name' => $name,
            'email_hash' => sha1($email),
        );
        $this->db->where('id', check_user());
        $this->db->update('tbl_user', array('email' => $email, 'name' => $name, 'organization_name' => $name));
        
        $this->send_confirmation($email,$name);
        redirect('signup-successful');
    }

    function save_user($id = '')
    {
        if($_POST) {
            $data = $_POST;
            $res = $this->user_model->getSocialLoginUser($data['email']);
            if ($res) {
                $this->session->set_flashdata('info', 'An account already exists with this email address.');
                redirect('signup');
            }
            $uri = $this->common_model->create_slug(trim($data['name']));
            $exp = explode('_', $data['care_type']);
            $care_type = $exp[0]; 
            $account_type = $exp[1];
            
            if (!($care_type > 0) || !($care_type < 35) || $data['location'] == '' || $data['lat'] == '' || $data['lng'] == '') {
                $this->session->set_flashdata('msg', 'Please enter a care type.');
                redirect('signup');
            }
            
            $orgName = $data['account_category']  == 3 ? trim($data['name']) : '';
            
            $insert_data = array(
                'email_hash'            => sha1($data['email']),
                'password'              => encrypt_decrypt('encrypt', $data['password']),
                'name'                  => trim($data['name']),
                'uri'                   => $uri,
                'status'                => 1,
                'organization_name'     => $orgName,
                'original_password'     => $data['password']
            );
            
            $insert = array_merge($data, $insert_data);

            if($data['account_category'] == 1){
                $category = 'caregiver';
            }
            if($data['account_category'] == 2){
                $category = 'careseeker';
            }

            if($data['account_category']  == 3){
                $category = 'organization';
            }

            if($account_type == 1) {
                $type = 'individual';
            } else {
                $type = 'organization';
                $insert['organization_name'] = trim($data['name']);
            }

            $redirectData = array(
                'account_cat'   => $category,
                'account_type'  => $type,
                'care_type'     => $care_type                        
            );
            
            $this->session->set_flashdata('params', $redirectData);
            
            $q = $this->user_model->save_user($insert);

            $userprofile_data = array(
                'care_type'         => $care_type,
                'account_category'  => $data['account_category'],
                'created_on'        => date('Y-m-d'),
                'created_time'      => strtotime('now'),
                'user_id'           => $q,
                'organization_care' => isset($data['organization_care'])?$data['organization_care'] :0,
                'profile_status'    => 0
            );

            
            $cg_or_ck = array(
                'user_id' =>$q,
                'account_category' => $data['account_category'],
                'organization_care' => isset($data['organization_care']) ? $data['organization_care'] : 0
            );
            $this->db->insert('tbl_account_category', $cg_or_ck);
            $this->session->set_userdata('account_category', $data['account_category']);// for getting account category quickly
            $this->session->set_userdata('organization_care',isset($data['organization_care']) ? $data['organization_care'] : 0);
            $this->db->insert('tbl_userprofile', $userprofile_data);
            $email = $data['email'];
            $fname = $data['name'];
            
            $this->approveAds();

            // send email confirmation to user
            $this->send_confirmation($email,$fname);

            $user_data = getBrowser();
            $log = array(
                'user_id' => $q,
                'login_time' => time(),
                'login_browser' => $user_data['name'].' '.$user_data['version'],
                'login_os' => $user_data['platform'],
                'login_ip' => $_SERVER['REMOTE_ADDR']
            );
            $log_id = $this->common_model->insert('tbl_user_logs', $log, true);
            $log_id = sha1($log_id);
            $sess = array(
                'current_user' => $q,
                'log_id' => $log_id
            );
            $this->session->sess_expiration = '14400';
            $this->session->set_userdata($sess);
            
        
            $this->sendRelevantAds($data['lat'], $data['lng'], $data['city']);
            $this->setUpInitialAlert($data['city'], $data['lat'], $data['lng']);

            if($q) {
                redirect('signup-successful');
            } else {
                $this->session->set_flashdata('msg', 'Your account could not be created. Please try again.');
                redirect('signup');
            }
        }
    }

    function send_confirmation($to, $name){
        $msg = $this->load->view('frontend/email/confirm_email', array('name' => $name, 'hash' => sha1($to)), true);
        $params = array(
            'from' => SITE_EMAIL,
            'from_name' => SITE_NAME,
            'replyto' => SITE_REPLY_TO_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto' => $to,
            'subject' => 'Confirm Your Email',
            'message' => $msg
        );
        sendemail($params);
    }

    function success()
    {
        $current_user = $this->common_model->get_where('tbl_user', array('id' => check_user()));
        if($this->session->flashdata('params')){
            $redirectData = $this->session->flashdata('params');
        }else{
            $redirectData = '';
        }
        $data['user']         = $current_user;
        $data['main_content'] = 'frontend/signup/verify_email';
        $data['redirectData'] =  $redirectData;
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    function get_care_type()
    {
        $type = $_POST['type'];
        $flag = 0;
        $q = $this->common_model->get_where('tbl_care', array('service_type' => $type), 'service_by ASC');
        $resp = '<option value="">Select Care Type</option>';
        if($q) {
            $resp .= '<optgroup label="Individual">';
            foreach($q as $r) {
                $resp .= '<option value="'.$r['id'].'">'.$r['service_name'].'</option>';
                if($r['service_by'] == 2 && $flag != 1) {
                    $resp .='</optgroup><optgroup label="Organization">';
                    $flag = 1;
                }
            }
            echo '</optgroup>';
        }
        echo $resp;
    }

    function check_email(){
        check_email($_POST['email']);
    }

    function confirm($email_hash = ''){
        $email_hash = $this->uri->segment(3);

        $ustatus = $this->user_model->checkUserStatus($email_hash);
        if(!empty($ustatus)){
            if($ustatus['status'] == 0){
                $this->db->where('email_hash',$email_hash);
                $this->db->update('tbl_user',array('status'=>1,'email_status'=>1));

                $userdetail =  array(
                    'name'      => $ustatus['name'],
                    'email'     => $ustatus['email'],
                    'password'  => $ustatus['original_password']
                );
		$q = check_user();
                $this->sendemail($userdetail);
                $user_data = getBrowser();
                $log = array(
                    'user_id' => $q,
                    'login_time' => time(),
                    'login_browser' => $user_data['name'].' '.$user_data['version'],
                    'login_os' => $user_data['platform'],
                    'login_ip' => $_SERVER['REMOTE_ADDR']
                );
                $log_id = $this->common_model->insert('tbl_user_logs', $log, true);
                $log_id = sha1($log_id);
                $sess = array(
                    'current_user' => $q,
                    'log_id' => $log_id
                );
                $this->session->sess_expiration = '14400';
                $this->session->set_userdata($sess);

                $this->session->set_flashdata('success', 'Your email has been verified.');
                redirect('user/dashboard','refresh');
            }else{
                $this->session->set_flashdata('success', 'Your email has already been verified.');
                redirect('user/dashboard','refresh');
                  
            }
        }

    }

    function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }


    function setsession(){
        if($this->input->is_ajax_request()){
            $acc_type = $this->input->post('account_type',true);
            $this->session->set_userdata(array('account_type' => $acc_type));
            echo 'done';exit();
        }
    }

    function userconfirm($idhash=''){
        $idhash = $this->uri->segment(4);

        $data = array(
            'status' => 1
        );

        $this->db->where('sha1(id)',$idhash);
        $this->db->update('tbl_user',$data);

        redirect('welcome/success','refresh');
    }

    function sendemail($userdetail){
        $msg = $this->load->view('emails/emailverified',$userdetail,TRUE);
        
        $param = array(
            'subject'     => 'Email verified successfully',
            'from'        => SITE_EMAIL,
            'from_name'   => SITE_NAME,
            'replyto'     => SITE_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => $userdetail['email'],
            'message'     => $msg
        );
        
        sendemail($param);
    }
    
    function setUpInitialAlert($location, $lat, $lng)
    {
        $correspondingTypes = [
            "1" => 17,
            "2" => 18,
            "3" => 17,
            "4" => 19,
            "5" => 20,
            "6" => 22,
            "7" => 29,
            "8" => 24,
            "9" => 21,
            "10" => 23,
            "11" => 25,
            "13" => 26,
            "14" => 27,
            "15" => 28,
            "16" => 26,
            "17" => 1,
            "18" => 2,
            "19" => 4,
            "20" => 5,
            "21" => 9,
            "22" => 6,
            "23" => 10,
            "24" => 8,
            "25" => 1,
            "26" => 16,
            "27" => 14,
            "28" => 15,
            "29" => 7
        ];
        
        $user_id = check_user();
        $profile = $this->common_model->get_where('tbl_userprofile', array('user_id' => $user_id));
        $data = array(
            'user_id'               => $user_id, 
            'care_type'             => $correspondingTypes[$profile[0]['care_type']],
            'lat'                   => $lat,
            'long'                  => $lng,
            'location'              => $location,
            'distance'              => 30,
            'createAlert'           => 1
        );
        $q = $this->db->insert('tbl_searchhistory',$data);
    }
    
    function sendRelevantAds($lat = 43, $lng = 79, $city = 'Toronto')
    {
         $correspondingTypes = [
            "1" => 17,
            "2" => 18,
            "3" => 17,
            "4" => 19,
            "5" => 20,
            "6" => 22,
            "7" => 29,
            "8" => 24,
            "9" => 21,
            "10" => 23,
            "11" => 25,
            "13" => 26,
            "14" => 27,
            "15" => 28,
            "16" => 26,
            "17" => 1,
            "18" => 2,
            "19" => 4,
            "20" => 5,
            "21" => 9,
            "22" => 6,
            "23" => 10,
            "24" => 8,
            "25" => 1,
            "26" => 16,
            "27" => 14,
            "28" => 15,
            "29" => 7
        ];
        
        $careNames = [
            "1" => 'babysitter',
            "2" => 'nanny-au-pair',
            "3" => 'babysitter',
            "4" => 'tutor-private-lessons',
            "5" => 'senior-caregiver',
            "6" => 'special-needs-caregiver',
            "7" => 'therapists',
            "8" => 'cleaning-household-help',
            "9" => 'errand-runner-odd-jobs-personal-assistant-driver',
            "10" => 'pediatric-baby-nurse',
            "11" => 'day-care-center-day-camp-afternoon-activities',
            "13" => 'senior-caregiver',
            "14" => 'special-needs-caregiver',
            "15" => 'cleaning-household-help',
            "16" => 'senior-caregiver',
            "17" => 'babysitter',
            "18" => 'nanny-au-pair',
            "19" => 'tutor-private-lessons',
            "20" => 'senior-caregiver',
            "21" => 'errand-runner-odd-jobs-personal-assistant-driver',
            "22" => 'special-needs-caregiver',
            "23" => 'pediatric-baby-nurse',
            "24" => 'cleaning-household-help',
            "25" => 'babysitter',
            "26" => 'senior-caregiver',
            "27" => 'special-needs-caregiver',
            "28" => 'cleaning-household-help',
            "29" => 'therapists'
        ];
        $profile = $this->common_model->get_where('tbl_userprofile', array('user_id' => check_user()));
        $user = $this->common_model->get_where('tbl_user', array('id' => check_user()));
        $name = explode(' ', $user[0]['name'])[0];
        $ac = $profile[0]['account_category'];
        $ct = $correspondingTypes[$profile[0]['care_type']];
        $ad = $profile[0]['care_type'] > 16 ? 'caregivers' : 'jobs'; 
        $location = ['lat' => $lat, 'lng' => $lng, 'place' => $city];
        $userdata       = $this->common_care_model->sort(10 ,$lat,$lng,'distance', $ac , $ct, 30);
        $get_total_rows = count($userdata);  
        if ($get_total_rows > 0) {
            $data = array(
                'userdatas'		    => array_slice($userdata, 0, 4),
                'care_type'         => $ct,
                'location'          => $location,
                'ad'                => $ad,
                'name'              => $name,
                'care_name'         => $careNames[$profile[0]['care_type']]
            );                      
            
            $msg = $this->load->view('frontend/email/ads_to_new_user', $data, true);
    
            $param = array(
                'subject'     => 'Thank you for joining FrumCare.com, here are a few ' . $ad . ' in your area',
                'from'        => SITE_EMAIL,
                'from_name'   => SITE_NAME,
                'replyto'     => SITE_EMAIL,
                'replytoname' => SITE_NAME,
                'sendto'      => $user[0]['email'],
                'message'     => $msg
            );
            sendemail($param);
        }
    }
    
    public function approveAds()
    {
        $user_id = check_user();
        $a = get_account_details();
        $id = $a->care_type;
        $hashInfo = ['user_id' => $user_id, 'care_type' => $id];
        /********************* get user profile of the current user ******************/

        $emails = $this->common_model->getAdminEmails();
        $details      = $this->user_model->getUserDetailsById($user_id,$id);
        $details['profile_id'] = $q;
        $data['recordData'] = $details;
        $data['hash'] = encrypt_decrypt('encrypt', json_encode($hashInfo));
        $msg = $this->load->view('frontend/email/profileapproval', $data, true);

        $param = array(
            'subject'     => 'A new profile has been added in Frumcare.com, approval required',
            'from'        => SITE_EMAIL,
            'from_name'   => SITE_NAME,
            'replyto'     => SITE_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => $emails,
            'message'     => $msg
        );
        sendemail($param);
    }

}