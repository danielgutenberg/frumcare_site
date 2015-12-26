<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('common_model');
        //facebook and twitter setting
 
        $this->load->library('twitteroauth');
        //facebook and twitter setting
    }

    function index()
    {
        if($_POST) {
            $user_data  = getBrowser();
            $data       = $_POST;
            $q          = $this->user_model->validate_user($data);

            if($q) {
                $q = $q[0];
                $log = array(
                    'user_id' => $q['id'],
                    'login_time' => time(), 
                    'login_browser' => $user_data['name'].' '.$user_data['version'],
                    'login_os' => $user_data['platform'],
                    'login_ip' => $_SERVER['REMOTE_ADDR'],
                    'logout_time' => time(),
                );

                $log_id = $this->common_model->insert('tbl_user_logs', $log, true);
                $log_id = sha1($log_id);

                $ac_cat = $this->user_model->get_my_account_category($q['id']);
                
                $sess = array(
                    'current_user' => $q['id'],
                    'log_id' => $log_id,
                    'account_category' => $ac_cat[0]['account_category'],
                    'organization_care' => $ac_cat[0]['organization_care']
                );

                $this->session->sess_expiration = '14400';
                $this->session->set_userdata($sess);
                if(isset($_GET['url'])){
                    $redirect = base64_decode($_GET['url']);
                    redirect($redirect);
                }
                else
                    redirect('user/dashboard');
            } else {
                $this->load->helper('cookie');
                $count = $this->input->cookie('invalid_count');
                if(empty($count)){
                    $count = 0;
                }                
                $count++;                
                if($count == 4){                    
                    $this->session->set_flashdata('info', 'Too many attempts! This may redirect you to homepage. Please enter valid username and password');
                    $this->input->set_cookie('invalid_count',$count,time()+3600);
                }
                elseif($count == 5){
                    delete_cookie('invalid_count');
                    $this->session->set_flashdata('info', 'Invalid username or password');
                    redirect('welcome');
                }else{
                    $this->session->set_flashdata('info', 'Invalid username or password');
                    $this->input->set_cookie('invalid_count',$count,time()+3600);    
                }
                if(isset($_GET['url'])){
                    $redirect = $_GET['url'];
                    redirect('login?url='.$redirect);
                }
                else                                
                    redirect('login');
            }
        } else {
            if (1) {
                try {
                    $config = array(
                        'appId' => FACEBOOK_APPID,
                        'secret' => FACEBOOK_APPSECRET,
                        'allowSignedRequest' => false
                    );
                    $this->load->library("facebook", $config);
                           
                    $this->facebook->getUser();
                    $user_profile = $this->facebook->api('/me');
                    print_rr($user_profile);
                    $logoutUrl = $this->facebook->getLogoutUrl(array('next' => FB_LOGOUT));
                    $sess = array(
                        'fb_logout' => $logoutUrl,
                        'fb_id' => $user_profile['id'],
                        'fb_name' => $user_profile['name'],
                        'fb_email' => $user_profile['email']
                    );
                    $this->session->set_userdata($sess);
                    redirect('user/dashboard');
                } catch (FacebookApiException $e) {
                    print_rr($e);
                    $userFB = null;
                }
            }
            else{
                $loginUrl = $this->facebook->getLoginUrl(array('scope' => 'email'));
                $user_profile = null;
            }
            $data =  array(
                'userFB' => $user_profile,
                'loginUrl' => $loginUrl
            );
            $data['main_content'] = 'frontend/login/login_form';
            $data['title'] = 'Login';
            $this->load->view(FRONTEND_TEMPLATE, $data);
        }
    }

    function twitter()
    {
        $twitteroauth = $this->twitteroauth->create(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET);

        // Requesting authentication tokens, the parameter is the URL we will be redirected to
        $temp = site_url('login/get_twitter_data');
        $request_token = $twitteroauth->getRequestToken($temp);

        if($request_token) {
            // Setting oauth values
            $_SESSION['oauth_token'] = $request_token['oauth_token'];
            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

            switch ($twitteroauth->http_code)
            {
                case 200:
                    $url = $twitteroauth->getAuthorizeURL($_SESSION['oauth_token']);
                    // echo $url;die;
                    //redirect to Twitter .
                    header('Location: ' . $url);
                    break;
                default:
                    $this->session->set_flashdata('msg', 'Sorry, we couldn\'t log you in with your twitter account.');
                    redirect('login');
            }
        } else {
            $this->session->set_flashdata('msg', 'Sorry, we couldn\'t log you in with your twitter account.');
            redirect('login');
        }
    }

    function get_twitter_data()
    {
        if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
            $twitteroauth = $this->twitteroauth->create(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
            $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
            $_SESSION['access_token'] = $access_token;
            $user_info = $twitteroauth->get('account/verify_credentials', ['include_email' => true]);
            print_rr($user_info);
            if (isset($user_info->error)) {
                $this->session->set_flashdata('info', 'Sorry, we couldn\'t log you in with your twitter account.');
                redirect('login');
            } else {
                $sess = array(
                    'twitter_id' => $user_info->id,
                    'twitter_name' => $user_info->name
                );
                $this->session->set_userdata($sess);
                redirect('user/dashboard');
            }
        } else {
            $this->session->set_flashdata('info', 'Sorry, we couldn\'t log you in with your twitter account.');
            redirect('login');
        }

    }

    function logout()
    {
        $log_id = $this->session->userdata('log_id');
        $this->common_model->update('tbl_user_logs', array('logout_time' => time()), array('SHA1(id)' => $log_id));
        $this->session->unset_userdata('current_user');
        $this->session->unset_userdata('care');
        $this->session->unset_userdata('log_id');
        $this->session->unset_userdata('account_category');
        $this->facebook->destroySession();
        redirect('/');
    }

    function forgot_password()
    {
        if($_POST) {
            $email = $_POST['email'];
            $msg = $this->load->view('frontend/email/forget_password', array('hash' => sha1($email)), true);
            //echo $msg;die;
            $params = array(
                'from' => SITE_EMAIL,
                'from_name' => SITE_NAME,
                'replyto' => SITE_REPLY_TO_EMAIL,
                'replytoname' => SITE_NAME,
                'sendto' => $email,
                'subject' => 'Password retrieve request',
                'message' => $msg
            );
            sendemail($params);
            echo '1';exit;
        } else {
            $data['main_content'] = 'frontend/login/forgot_pass_form';
            $data['title'] = 'Forgot Password';
            $this->load->view(FRONTEND_TEMPLATE, $data);
        }
    }

    function confirm($hash = '')
    {
        $q = $this->common_model->confirm_email('tbl_user', $hash);
        if($q) {
            $q = $q[0];
            $id = $q['id'];
            $this->common_model->update('tbl_user', array('email_status' => 1), array('id' => $id));
            $this->session->set_flashdata('msg', 'Congratulations, your email has been successfully verified.');
            $sess = array(
                'current_user' => $id
            );
            $this->session->set_userdata($sess);
            redirect('user/dashboard');
        } else {
            $this->session->set_flashdata('msg', 'Your email could not be verified. Please <a href="'.base_url('contact-us').'">click here</a> for further assistance.');
            redirect('/');
        }
    }

    function get_password($hash = ''){ 
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Change Password', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $id = check_user();
        if($_POST) {
                $update = array(
                    'original_password' => $this->input->post('npass',true),
                    'password'          => sha1($this->input->post('npass',true)),
                );

        $this->db->where('id',$id);
        $this->db->update('tbl_user',$update);
        $this->session->set_flashdata('info', 'Password updated successfully');
        redirect('user/dashboard','refresh');
        } else {
            $q = $this->common_model->get_where('tbl_user', array('SHA1(email)' => $hash));
            if($q != '') {
                $data['main_content'] = 'frontend/signup/change_password';
                $data['title'] = 'Change Password';
                $data['hash'] = $hash;
                $this->load->view(FRONTEND_TEMPLATE, $data);
            } else {
                $this->session->set_flashdata('msg', 'Account not found. Sorry');
                redirect('login');
            }
        }
    }

     function check_email(){
        check_email($_POST['email']);
    }

    function changepassword($hash=''){
        if(isset($_POST['changepassword'])){

            $postdata = array(
                'password'              => encrypt_decrypt('encrypt', $this->input->post('npass',true)),
                'original_password'    => $this->input->post('npass',true),
            );

            $hash = $this->input->post('email',true);
            $this->db->where('email_hash',$hash);
            $this->db->update('tbl_user',$postdata);

            $this->session->set_flashdata('info', 'Your password has been changed.Please use new password for login');
            redirect('login','refresh');
        }

        $data = array(
            'title'         => 'Change Password',
            'main_content'  => 'frontend/login/changepassword',
            'email'         => $hash
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
}
