<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('common_model');
        
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



    function save_user($id = ''){
       if($_POST) {
            $data = $_POST;
            $uri = $this->common_model->create_slug(trim($data['name']));
            $exp = explode('_', $data['care_type']);
            $care_type = $exp[0]; 
            $account_type = $exp[1]; 
            $orgName = $_POST['account_category']  == 3 ? trim($data['name']) : '';
            $insert = array(
                'email'                 => $data['email'],
                'email_hash'            => sha1($data['email']),
                'password'              => encrypt_decrypt('encrypt', $data['password']),
                'original_password'     => $data['password'],
                'name'                  => trim($data['name']),
                'uri'                   => $uri,
                'status'                => 1,
                'organization_name'     => $orgName
            );

                    if($_POST['account_category'] == 1){
                        $category = 'caregiver';
                    }
                    if($_POST['account_category'] == 2){
                        $category = 'careseeker';
                    }

                    if($_POST['account_category']  == 3){
                        $category = 'organization';
                    }

                   if($account_type == 1){
                        $type = 'individual';
                   }else{
                        $type = 'organization';
                        $insert['organization_name'] = trim($data['name']);
                   }

                   $redirectData = array(
                        'account_cat'   => $category,
                        'account_type'  => $type,
                        'care_type'     => $care_type                        
                   );


                   $this->session->set_flashdata('params', $redirectData);

                    $this->db->insert('tbl_user', $insert);
                    $q = $this->db->insert_id();

                    $userprofile_data = array(
                      'care_type'             => $care_type,
                      'account_category'      => $_POST['account_category'],
                      'created_on'            => date('Y-m-d'),
                        'created_time'          =>strtotime('now'),
                      'user_id'               => $q,
                      'organization_care'     => isset($data['organization_care'])?$data['organization_care'] :0,
                      'profile_status'        => 1
                    );
                    
                    $cg_or_ck = array(
                            'user_id' =>$q,
                            'account_category' => $_POST['account_category'],
                            'organization_care' => isset($_POST['organization_care'])?$_POST['organization_care']:0
                    );
                    $this->db->insert('tbl_account_category',$cg_or_ck);
                    $this->session->set_userdata('account_category',$_POST['account_category']);// for getting account category quickly
                    $this->session->set_userdata('organization_care',isset($_POST['organization_care'])?$_POST['organization_care']:0);
                    $this->db->insert('tbl_userprofile',$userprofile_data);
                    $email = $data['email'];
                    $fname = $data['name'];

                    // send email confirmation to user
                    $this->send_confirmation($email,$fname);

                    // send confirmation email 
                    // $useradminemails = $this->common_model->getUserAdmiEmails();
                    // if(is_array($useradminemails)){
                    //     foreach($useradminemails as $useradminemail):   
                    //         $useradmin[] =  $useradminemail['email1'];
                    //     endforeach;    
                    // }

                    // $subject = "User Registered, action required";
                    // $message = $this->load->view('frontend/email/useradminapprovalemail',array('name'=>$fname,'email'=>$email,'hash'=>sha1($q),'account_type'=>$_POST['account_category'],'id'=>$q),true);
                    // $this->common_model->sendemail($useradmin,$subject,$message);


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
        $current_user = $this->session->userdata['email'];
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

                $this->sendemail($userdetail);

                $this->session->set_flashdata('success', 'Your email has been verified. Please login form here');
                redirect('login','refresh');
            }else{
                redirect('login','refresh');
                  $this->session->set_flashdata('success', 'Your email has already been verified. Please login form here');
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
         $config = Array(
                          //'protocol' => 'smtp',
                          //'smtp_host' => 'ssl://smtp.googlemail.com',
                          //'smtp_port' => 465,
                          //'smtp_user' => 'frumcare2015@gmail.com', //change it to yours
                          //'smtp_pass' => 'frumcare.com', // change it to yours
                          'mailtype' => 'html',
                          'charset' => 'iso-8859-1',
                          'wordwrap' => TRUE
                        );
         /*$config = array(
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );*/

       $this->load->library('email',$config);
       $this->email->set_newline("\r\n");
        $this->email->from('info@frumcare.com', 'Frumcare');
        $this->email->to($userdetail['email']);
      
        $this->email->subject('Email verified successfully');
        $this->email->message($this->load->view('emails/emailverified',$userdetail,TRUE));
        $this->email->send();
    }

}