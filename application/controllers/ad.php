<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
class Ad extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('imageupload_lib');
        $this->load->model('common_model');
        $this->load->library('breadcrumbs');
        $this->load->library('fileupload_lib');
        $this->load->model('payment_model');
        $this->load->model('user_model');
        $this->load->model('caretype_model');
        $this->load->model('common_model');
        $this->load->model('review_model');
        $this->load->model('common_care_model');
        $this->load->model('email_template_model');
        $this->load->model('refrence_model');
        $this->load->model('profile_model');
        $this->load->helper('url');
        
        $this->careNames = [
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
        
        $this->correspondingTypes = [
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
            "11" => 20,
            "13" => 26,
            "14" => 27,
            "15" => 24,
            "16" => 20,
            "17" => 1,
            "18" => 2,
            "19" => 4,
            "20" => 5,
            "21" => 9,
            "22" => 6,
            "23" => 10,
            "24" => 8,
            "25" => 1,
            "26" => 5,
            "27" => 6,
            "28" => 8,
            "29" => 7
        ];
        
    }

    function add_step2(){
        $location = $this->user_model->getLocation(check_user());
        
        if ($this->uri->segment(3) == 'caregiver' && $this->uri->segment(4) == 'individual')
            $view = 'frontend/care/giver/individual';

        if ($this->uri->segment(3) == 'caregiver' && $this->uri->segment(4) == 'organization')
            $view = 'frontend/care/giver/organization';

        if ($this->uri->segment(3) == 'organization')
            $view = 'frontend/care/giver/organization';

        if ($this->uri->segment(3) == 'careseeker')
            $view = $this->careseeker();

        $data = array(
            'main_content' => $view,
            'title'        => 'Ad Placement Step 2',
            'location'     => $location
         );

        $this->load->view(FRONTEND_TEMPLATE, $data);
    }
    
    public function careseeker(){
        if (check_user()){
            $a = get_account_details();
            $id = $a->care_type;
            if ($id == 11)
                return $data['main_content'] = 'frontend/care/giver/daycarecenter_form';
            if ($id == 13)
                return $data['main_content'] = 'frontend/care/giver/seniorcareagency_form';
            if ($id == 14)
                return $data['main_content'] = 'frontend/care/giver/specialneedscenter_form';
            if ($id == 15)
                return $data['main_content'] = 'frontend/care/giver/cleaningcompany_form';
            if ($id == 16)
                return $data['main_content'] = 'frontend/care/giver/seniorcarecenter_form';
            if ($id == 17)
                return $data['main_content'] = 'frontend/care/seeker/babysitter_form';
            if ($id == 18)
                return $data['main_content'] = 'frontend/care/seeker/nanny_form';
            if ($id == 19)
                return $data['main_content'] = 'frontend/care/seeker/tutor_form';
            if ($id == 20)
                return $data['main_content'] = 'frontend/care/seeker/senior_form';
            if ($id == 21)
                return $data['main_content'] = 'frontend/care/seeker/errand_form';
            if ($id == 22)
                return $data['main_content'] = 'frontend/care/seeker/specailneedcareseeker_form';
            if ($id == 23)
                return $data['main_content'] = 'frontend/care/seeker/baby_nurse_form';
            if ($id == 24)
                return $data['main_content'] = 'frontend/care/seeker/cleaning_form';
            if ($id == 25)
                return $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
            if ($id == 26)
                return $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
             if ($id == 27)
                return $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
            if ($id == 28)
                return $data['main_content'] = 'frontend/care/seeker/cleaningcompany_form';
        }
    }

    public function registeruserdetails(){
        if ($_POST) {
            $_POST['hasAd'] = 1;
            if (isset($_POST['profile_picture'])) {
                $_POST['profile_picture_status'] = 1;
            }
            if (check_user()) {
                $q = $this->user_model->edit_user($_POST, check_user());
                $q = $this->profile_model->edit_profile_by_user_id($_POST, check_user());
            }

            if ($p['account_category'] == 1)
                $category = "caregiver";
            else
                $category = "careseeker";

            if ($p['account_type'] == 1)
                $type = "individual";
            else
                $type = "organization";

            if ($q) {
                $this->approveAds();
                
                redirect('ad/add_step3/'.$category.'/'.$type.'/'.$this->session->userdata('log_id').'/job-details/'.$this->session->userdata('log_id'));
            }
        }
    }
    
    function add_careseeker_step2(){
        if ($_POST) {
            $p = $_POST;
            $p['hasAd'] = 1;

            if (isset($p['photo_of_child'])){
                $p['photo_status'] = 1;
                $p['profile_picture'] = $p['photo_of_child'];
            }

            if (check_user()) {
                $q = $this->user_model->edit_user($_POST, check_user());
                $q = $this->profile_model->edit_profile_by_user_id($_POST, check_user());
            }
            if ($q){
                $this->notifyUser();
                $this->approveAds();
                $link = anchor('caregivers/all', 'here');
                $message = 'Ad posted successfully. Your ad will be placed on the site after being approved by our team. <br> <span style="margin-left:159px">Click ' . $link . ' to search caregivers in your area<span>';
                $this->session->set_flashdata('success', $message);
                redirect('user/dashboard');
            }
            else{
                $this->session->set_flashdata('fail', 'Error: Ad could not be posted at this moment');
                redirect('user/dashboard');
            }
        }
    }
    
    function add_step3(){
        if (check_user()) {
            $a = get_account_details();
            $id = $a->care_type;
            
            if ($id == 1){
                $data['main_content'] = 'frontend/care/giver/babysitter_form';
            }
            if ($id == 2){
                $data['main_content'] = 'frontend/care/giver/nanny_form';
            }
            if ($id == 3){
                $data['main_content'] = 'frontend/care/giver/nursery_form';
            }
            if ($id == 4){
                $data['main_content'] = 'frontend/care/giver/tutor_form';
            }
            if ($id == 5){
                $data['main_content'] = 'frontend/care/giver/senior_form';
            }
            if ($id == 6){
                $data['main_content'] = 'frontend/care/giver/specialneeds_form';
            }
            if ($id == 7){
                $data['main_content'] = 'frontend/care/giver/therapist_form';
            }
            if ($id == 8){
                $data['main_content'] = 'frontend/care/giver/cleaning_form';
            }
            if ($id == 9){
                $data['main_content'] = 'frontend/care/giver/errand_form';
            }
            if ($id == 10){
                $data['main_content'] = 'frontend/care/giver/baby_nurse_form';
            }
            if ($id == 11){
                $data['main_content'] = 'frontend/care/giver/daycarecenter_form';
            }
            if ($id == 13){
                $data['main_content'] = 'frontend/care/giver/seniorcareagency_form';
            }
            if ($id == 14){
                $data['main_content'] = 'frontend/care/giver/specialneedscenter_form';
            }
            if ($id == 15){
                $data['main_content'] = 'frontend/care/giver/cleaningcompany_form';
            }
            if ($id == 16){
                $data['main_content'] = 'frontend/care/giver/seniorcarecenter_form';
            }
            $data['title']  = 'Ad Placement Step 3';
    
            $this->load->view(FRONTEND_TEMPLATE,$data);
        }
    }

    function savejobdetails()
    {
        if ($_POST) {
            $p = $_POST;
            $p['hasAd']  =1;
            if (check_user()) {
                $q = $this->user_model->edit_user($p, check_user());
                $q = $this->profile_model->edit_profile_by_user_id($p, check_user());
            }
            if ($q) {
                $link = anchor('jobs/all', 'here');
                $message = 'Ad posted successfully. Your ad will be placed on the site after being approved by our team. <br><span style="margin-left:159px"> Click ' . $link . ' to search for jobs in your area<span>';
                $this->session->set_flashdata('info', $message);

                $this->notifyUser();

                redirect('user/dashboard');
            }
            else {
                $this->session->set_flashdata('info', 'Error: Ad could not be posted at this moment');
                redirect('user/dashboard');
            }
        }
    }

    public function notifyUser()
    {
        $user_id = check_user();
        $user = get_user($user_id);
        $sendto = $user['email'];

        $a = get_account_details();
        $id = $a->care_type;
        $details = $this->user_model->getUserDetailsById($user_id,$id);

        $msg = $this->load->view('emails/adPlaced', array('name' => $details['name']), true);
        $param = array(
            'subject'     => 'Ad Placed Successfully',
            'from'        => SITE_EMAIL,
            'from_name'   => SITE_NAME,
            'replyto'     => SITE_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => $sendto,
            'message'     => $msg
        );
        sendemail($param);
    }
    
    public function approveAd()
    {
        $args = func_get_args();
        $user_id = $args[0];
        $id = $args[1];
        $hash_args = array_slice($args, 2);
        $hash = implode($hash_args, '/');
        
        $hashData = json_decode(encrypt_decrypt('decrypt', $hash));
        
        if ( !isset($hashData->user_id) || !isset($hashData->care_type) || !($user_id == $hashData->user_id) || !($id == $hashData->care_type) ) {
            $this->session->set_flashdata('fail', 'An Error occured, please sign in to the admin to approve the ad');
            redirect('admin/login');
        }
        $this->db->where(array('user_id' => $user_id, 'care_type' => $id));
        $this->db->update('tbl_userprofile', array('profile_status'=>1));

        $user = get_user($user_id);
        $sendto = $user['email'];
        $details = $this->user_model->getUserDetailsById($user_id,$id);
        $msg = $this->load->view('emails/adApproved', array('name' => $details['name']), true);
        $param = array(
            'subject'     => 'Ad Approved',
            'from'        => SITE_EMAIL,
            'from_name'   => SITE_NAME,
            'replyto'     => SITE_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => $sendto,
            'message'     => $msg
        );
        
        sendemail($param);

        $this->sendSearchAlert($details, $id);

        redirect('ad/success','refresh');

    }

    public function sendSearchAlert($details, $type)
    {
        $alerts = $this->user_model->getSearchAlerts($details['lat'], $details['lng'], $type);
        foreach ($alerts as $alert) {
            if ($alert['distance'] < $alert['dist']) {
                continue;
            }
            
            $id = $alert['user_id'];
            $user = $this->user_model->getUserName($id);
            $email = $user['email'];
            
            $name = explode(' ', $user['name'])[0];
            $ac = $details['account_category'];
            $ad = $details['care_type'] > 16 ? 'jobs' : 'caregivers'; 
            $location = ['lat' => $details['lat'], 'lng' => $details['lng'], 'place' => $user['city']];

            $data['recordData']     = $details;
            $data['location'] = $location;
            $data['ad'] = $ad;
            $data['name'] = $name;
            $data['care_name'] = $this->careNames[$details['care_type']];

            $msg = $this->load->view('frontend/email/searchAlert', $data, true);

            $param = array(
                'subject'     => 'A new profile has been added in FrumCare.com that matches your search',
                'from'        => SITE_EMAIL,
                'from_name'   => SITE_NAME,
                'replyto'     => SITE_EMAIL,
                'replytoname' => SITE_NAME,
                'sendto'      => $email,
                'message'     => $msg
            );
            
            sendemail($param);
        }
    }
    
    function upload_pp($a = 'update'){
        $data = $this->imageupload_lib->upload('profile-picture', 100, 300);
        if ($a == 'update') {
            $this->common_model->update('tbl_user', ['profile_picture' => $data['files']], array('id' => check_user()));
        }
        echo json_encode($data);
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

   public function success()
   {
        $this->breadcrumbs->push('Success', '/help');
        $this->breadcrumbs->unshift('Home', base_url());

        $data = array(
            'main_content' => 'frontend/care/success',
            'title'        => 'Success',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);

    }
    
    public function addprofile()
    {
        $account_category     = $this->session->userdata('account_category');
        $organization_care = $this->session->userdata('organization_care');
        $account_details = get_account_details();

        if($account_category == '1'){
            @$title = "Add New Profile";
        }

        if($account_category == '2'){
            @$title = "Add New Job";
        }

        if($account_category == '3'){
            @$title = $organization_care=='1'?"Add New Profile":"Add New Job";
        }

        $this->breadcrumbs->push(@$title, site_url().'#');
        $this->breadcrumbs->unshift('My Profile', base_url().'user/profile');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $data = array(
            'title' => @$title,
            'main_content' => 'frontend/user/dashboard/my_profiles/create'
        );
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
    
    public function new_profile()
    {
        if($this->input->post('id',true)){
            $ac_type = "fd";                
            $submit_id = $this->input->post('id',true);
            
            $account_category = $this->session->userdata('account_category');
            $organization_category = $this->session->userdata('organization_care');                
            $data['record'] = array(
                'submit_id' => $submit_id,
                'ac_type' => $ac_type,
                'account_type' => $account_category,
                'organization_care' => $organization_category,
            );
            if($submit_id == 1)
                $view = 'frontend/care/giver/babysitter_form';
            if($submit_id == 2)
                $view = 'frontend/care/giver/nanny_form';
            if($submit_id == 3)
                $view = 'frontend/care/giver/nursery_form';
            if($submit_id == 4)
                $view = 'frontend/care/giver/tutor_form';
            if($submit_id == 5)
                $view = 'frontend/care/giver/senior_form';
            if($submit_id == 6)
                $view = 'frontend/care/giver/specialneeds_form';
            if($submit_id == 7)
                $view = 'frontend/care/giver/therapist_form';
            if($submit_id == 8)
                $view = 'frontend/care/giver/cleaning_form';
            if($submit_id == 9)
                $view = 'frontend/care/giver/errand_form';
            if($submit_id == 10)
                $view = 'frontend/care/giver/baby_nurse_form';
            if($submit_id == 17)
                $view = 'frontend/care/seeker/babysitter_form';
            if($submit_id == 18)
                $view = 'frontend/care/seeker/nanny_form';
            if($submit_id == 19)
                $view = 'frontend/care/seeker/tutor_form';
            if($submit_id == 20)
                $view = 'frontend/care/seeker/senior_form';
            if($submit_id == 21)
                $view = 'frontend/care/seeker/errand_form';
            if($submit_id == 22)
                $view = 'frontend/care/seeker/specailneedcareseeker_form';
            if($submit_id == 23)
                $view = 'frontend/care/seeker/baby_nurse_form';
            if($submit_id == 24)
                $view = 'frontend/care/seeker/cleaning_form';
            if($submit_id == 11)
                $view = 'frontend/care/giver/daycarecenter_form';
            if($submit_id == 13)
                $view = 'frontend/care/giver/seniorcareagency_form';
            if($submit_id == 14)
                $view = 'frontend/care/giver/specialneedscenter_form';
            if($submit_id == 15)
                $view = 'frontend/care/giver/cleaningcompany_form';
            if($submit_id == 16)
                $view = 'frontend/care/giver/seniorcarecenter_form';
            if($submit_id == 25)
                $view = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
            if($submit_id == 26)
                $view = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
            if($submit_id == 27)
                $view = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
            if($submit_id == 28)
                $view = 'frontend/care/seeker/cleaningcompany_form';
            
            if($this->user_model->existing_profile_check($account_category ,$submit_id)) {
                $this->load->view($view,$data);
            } else {
                echo "You already have this profile type";
            }
        }
    }
    
    public function addprofileconfirm()
    {
        $p = $_POST; 
        $account_category = $this->session->userdata('account_category');
        $profile_check = $this->user_model->existing_profile_check($account_category, $p['care_type']);
        if($profile_check) {              
            $user_id = check_user();
            $p['user_id'] = $user_id;
            $p['account_category'] = $account_category;
            
            $q = $this->profile_model->save_profile($p);
            $q = $this->user_model->edit_user($p, $user_id);
            
            if($q) {
                $emails = $this->common_model->getAdminEmails();
                
                $details = $this->user_model->getUserDetailsById($user_id, $p['care_type']);
                $details['profile_id'] = $q;
                $data['recordData']     = $details;
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
                
                $sendto = get_user($user_id)['email'];
                
                $msg = $this->load->view('emails/adApproved', array('name' => $details['name']), true);
                $param = array(
                    'subject'     => 'Ad Placed Successfully',
                    'from'        => SITE_EMAIL,
                    'from_name'   => SITE_NAME,
                    'replyto'     => SITE_EMAIL,
                    'replytoname' => SITE_NAME,
                    'sendto'      => $sendto,
                    'message'     => $msg
                );
                sendemail($param);
                
                $profile = $this->job_or_profile();
                if ($profile == 'job') {
                    $link = anchor('jobs/all', 'here');
                } else {
                    $link = anchor('caregivers/all', 'here');
                }
                $message = 'Ad posted successfully. Your ad will be placed on the site after being approved by our team. <br> <span style="margin-left:159px">Click ' . $link . ' to search caregivers in your area<span>';
                $this->session->set_flashdata('success', $message);
                redirect('user/profile');   
            } else {
                $profile = $this->job_or_profile();
                $this->session->set_flashdata('info', "Error: New $profile can not be added at this moment");
                redirect('user/profile');    
            }
        } else {
            $profile = $this->job_or_profile();
            $this->session->set_flashdata('info',"Error: You can not add same $profile again!!");
            redirect('user/profile');
        }
    }
    
    public function edit_profile()
    {
        $this->breadcrumbs->push('Edit', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $uid = $this->uri->segment(3);
        $care_type = $this->uri->segment(4);
        $care_id = array('care_id'=>$care_type);
        $id = $this->session->userdata('current_user');
        $res = $this->user_model->current_user($care_id);
        $usr = get_user($id);
        $data['detail'] = $res;
        $data['usr']=$usr;
        if($care_type == 1 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_babysitter_form');
        }elseif($care_type == 2 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_nany_form');
        }elseif($care_type == 3 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_nursery_form');
        }elseif($care_type == 4 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_tutor_form');
        }elseif($care_type == 5 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_senior_form');
        }elseif($care_type == 6 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_specialneeds_form');
        }elseif($care_type == 7 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_therapist_form');
        }elseif($care_type == 8 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_cleaning_form');
        }elseif($care_type == 9 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_errand_form');
        }elseif($care_type == 10 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_baby_nurse_form');
        }elseif($care_type == 11 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_daycarecenter_form');
        }elseif($care_type == 12 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_daycarecenter_form');
        }elseif($care_type == 13 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_seniorcareagency_form');
        }elseif($care_type == 14 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_specialneedscenter_form');
        }elseif($care_type == 15 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_cleaningcompany_form');
        }elseif($care_type == 16 && $id == $uid){
            $data['main_content'] = ('frontend/care/giver/edit_seniorcarecenter_form');
        }elseif($care_type == 17 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_babysitter_form');
        }elseif($care_type == 18 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_nanny_form');
        }elseif($care_type == 19 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_tutor_form');
        }elseif($care_type == 20 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_senior_form');
        }elseif($care_type ==21 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_errand_form');
        }elseif($care_type == 22 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_specailneedcareseeker_form');
        }elseif($care_type == 23 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_baby_nurse_form');
        }elseif($care_type == 24 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_cleaning_form');
        }elseif($care_type == 25 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_childcare_seniorcare_specialneeds_facilities_form');
        }elseif($care_type == 26 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_childcare_seniorcare_specialneeds_facilities_form');
        }elseif($care_type == 27 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_childcare_seniorcare_specialneeds_facilities_form');
        }elseif($care_type == 28 && $id == $uid){
            $data['main_content'] = ('frontend/care/seeker/edit_cleaningcompany_form');
        }else{
            $data['main_content'] = ('frontend/care/noprofile');
            $data['title']        = 'Edit Profile';
        }
        
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
    
    public function update_job_details()
    {
        $care_type = $this->uri->segment(3);
        $email = 0;
        if($_POST) {
            $p = $_POST;
            $id = $this->session->userdata('current_user');

            $this->db->where(array('user_id'=>$id,'care_type'=>$care_type));
            $res = $this->db->get('tbl_userprofile');
            $oldProfile = $res->result_array()[0];
            $profileStatus = $oldProfile['profile_status'];
            if ($p['profile_description'] != $oldProfile['profile_description'] || $p['file'] != $oldProfile['file'] || $p['pdf'] != $oldProfile['pdf'] || $p['facility_pic'] != $oldProfile['facility_pic'] || $p['photo_of_child'] != $oldProfile['photo_of_child']) {
                $profileStatus = 0;
                $email = 1;
            }
            
            $p['profile_status'] = $profileStatus;
            $p['hasAd'] = 1;

            if(check_user()) {
                $q = $this->profile_model->edit_profile_by_user_id($p, check_user());
            }
        
            if ($email == 1) {
                $emails = $this->common_model->getAdminEmails();
                
                $details      = $this->user_model->getUserDetailsById(check_user(),$care_type);
                $details['profile_id'] = $q;
                
                $data['recordData']     = $details;
                
                $hashInfo = ['user_id' => check_user(), 'care_type' => $care_type];
                $data['hash'] = encrypt_decrypt('encrypt', json_encode($hashInfo));
                
                $msg = $this->load->view('frontend/email/profileapproval', $data, true);
    
                $param = array(
                    'subject'     => 'A profile has been edited, approval required',
                    'from'        => SITE_EMAIL,
                    'from_name'   => SITE_NAME,
                    'replyto'     => SITE_EMAIL,
                    'replytoname' => SITE_NAME,
                    'sendto'      => $emails,
                    'message'     => $msg
                );
                sendemail($param);
            }
            $profile = $this->job_or_profile();
            if($q){
                if ($email == 1) {
                    $this->session->set_flashdata('info', "$profile Updated successfully. Your ad will be returned to the site shortly after being approved by our team.");
                } else {
                    $this->session->set_flashdata('info', "$profile Updated successfully");
                }
                redirect('user/profile');
            }
            else{
                $this->session->set_flashdata('info', "Error: $profile could not be updated at this moment");
                redirect('user/profile');    
            }
        }
    }
      
    public function job_or_profile()
    {
        $ac = $this->session->userdata('account_category');
        $oc = $this->session->userdata('organization_care'); 
        if($ac == 1){ 
            $profile1='Profile';
        }
        if($ac ==2){ 
            $profile1='Job';
        }
        if($ac=3){
            if($oc ==1){
                $profile1='Profile';
            }
            if($oc==2){
                $profile1='Job';
            }
        }
        return $profile1;
    }
    
    public function delete_profile(){
        $user_id    = $this->uri->segment(3);
        $care_type  = $this->uri->segment(4);
        $res = $this->user_model->delete_this_profile($user_id,$care_type);
        $this->session->set_flashdata('info', 'Profile has been archived');
        redirect('user/profile');
    }
      
    public function unarchive_profile(){
        $user_id    = $this->uri->segment(3);
        $care_type  = $this->uri->segment(4);
        $res = $this->user_model->unarchive_this_profile($user_id,$care_type);
        $this->session->set_flashdata('info', 'Profile has been unarchived');
        redirect('user/profile');
    }
}