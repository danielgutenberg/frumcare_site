<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!check_user() && !$this->session->userdata('fb_id') && !$this->session->userdata('twitter_id')) {
            $redirect = base64_encode(uri_string());
            redirect('login?url='.$redirect);
        }
        $this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('refrence_model');
        $this->load->library('breadcrumbs');
        $this->load->library('fileupload_lib');
        $this->load->model('payment_model');
        $this->load->model('caretype_model');
        $this->load->model('review_model');
        $this->load->model('common_care_model');
        $this->load->model('email_template_model');
    }

    function index(){
        redirect('user/dashboard','refresh');
    }

    function dashboard()
    {
        $id = $this->session->userdata['current_user'];
        $this->breadcrumbs->push('Dashboard', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
        if (! $id) {
            $this->session->set_flashdata('info', 'Invalid username or password');
            redirect('login');
        }
        $data['main_content']       = 'frontend/user/dashboard';
        $data['verificationdata']   = $this->user_model->getVerificationData($id);
        $data['title']              = 'Dashboard';
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    function edit($id_hash = ''){

        $this->breadcrumbs->push('Edit Profile', site_url().'#');
        $this->breadcrumbs->unshift('Profile', base_url().'user/profile');

        if($_POST) {
            $data = $_POST;
            $uri = $this->common_model->create_slug(trim($data['name']));

            $edit = array(
                'email'             => $data['email'],
                'email_hash'        => sha1($data['email']),
                'organization_name' => $data['name'],
                'name'              => $data['name'],
                'uri'               => $uri
            );

            $q = $this->common_model->update('tbl_user', $edit, array('SHA1(id)' => $id_hash));
            if($q) {
                $this->session->set_flashdata('info', 'Your account updated successfully.');
                redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('info', 'Your account could not be changed. Please try again.');
                redirect('user/edit/'.$id_hash);
            }
        } else {
            $data['title'] = 'Edit Account';
            $data['main_content'] = 'frontend/user/edit';
            $data['user_data'] = $this->common_model->get_where('tbl_user', array('SHA1(id)' => $id_hash));
            $this->load->view(FRONTEND_TEMPLATE, $data);
        }
    }



    function edit_availability_time($id_hash = ''){
        $current_user_id = $this->session->userdata['current_user'];
        $data = array();

        $data['time_table'] = $this->user_model->getCurrentUserTimeTable($current_user_id);
        

        if(isset($_POST['upate_timetable'])){
            $postdata = array(
                'user_id'           => $this->input->post('user_id',TRUE),
                'early_morning_sun' => $this->input->post('early_morning_sun',TRUE),
                'early_morning_mon'=> $this->input->post('early_morning_mon',TRUE),
                'early_morning_tue'=> $this->input->post('early_morning_tue',TRUE),
                'early_morning_wed'=> $this->input->post('early_morning_wed',TRUE),
                'early_morning_thur'=> $this->input->post('early_morning_thur',TRUE),
                'early_morning_fri'=> $this->input->post('early_morning_fri',TRUE),
                'early_morning_sat'=> $this->input->post('early_morning_sat',TRUE), 
                'late_morning_sun'=> $this->input->post('late_morning_sun',TRUE),
                'late_morning_mon'=> $this->input->post('late_morning_mon',TRUE),
                'late_morning_tue'=> $this->input->post('late_morning_tue',TRUE),
                'late_morning_wed'=> $this->input->post('late_morning_wed',TRUE),
                'late_morning_thur'=> $this->input->post('late_morning_thur',TRUE),
                'late_morning_fri'=> $this->input->post('late_morning_fri',TRUE),
                'late_morning_sat'=> $this->input->post('late_morning_sat',TRUE),
                'early_afternoon_sun'=> $this->input->post('early_afternoon_sun',TRUE),
                'early_afternoon_mon'=> $this->input->post('early_afternoon_mon',TRUE),
                'early_afternoon_tue'=> $this->input->post('early_afternoon_tue',TRUE),
                'early_afternoon_wed'=> $this->input->post('early_afternoon_wed',TRUE),
                'early_afternoon_thur'=> $this->input->post('early_afternoon_thur',TRUE),
                'early_afternoon_fri'=> $this->input->post('early_afternoon_fri',TRUE),
                'early_afternoon_sat'=> $this->input->post('early_afternoon_sat',TRUE),
                'late_afternoon_sun'=> $this->input->post('late_afternoon_sun',TRUE),
                'late_afternoon_mon'=> $this->input->post('late_afternoon_mon',TRUE),
                'late_afternoon_tue'=> $this->input->post('late_afternoon_tue',TRUE),
                'late_afternoon_wed'=> $this->input->post('late_afternoon_wed',TRUE),
                'late_afternoon_thur'=> $this->input->post('late_afternoon_thur',TRUE),
                'late_afternoon_fri'=> $this->input->post('late_afternoon_fri',TRUE),
                'late_afternoon_sat'=> $this->input->post('late_afternoon_sat',TRUE),
                'early_evening_sun'=> $this->input->post('early_evening_sun',TRUE),
                'early_evening_mon'=> $this->input->post('early_evening_mon',TRUE),
                'early_evening_tue'=> $this->input->post('early_evening_tue',TRUE),
                'early_evening_wed'=> $this->input->post('early_evening_wed',TRUE),
                'early_evening_thur'=> $this->input->post('early_evening_thur',TRUE),
                'early_evening_fri'=> $this->input->post('early_evening_fri',TRUE),
                'early_evening_sat'=> $this->input->post('early_evening_sat',TRUE),
                'late_evening_sun'=> $this->input->post('late_evening_sun',TRUE),
                'late_evening_mon'=> $this->input->post('late_evening_mon',TRUE),
                'late_evening_tue'=> $this->input->post('late_evening_tue',TRUE),
                'late_evening_wed'=> $this->input->post('late_evening_wed',TRUE),
                'late_evening_thur'=> $this->input->post('late_evening_thur',TRUE),
                'late_evening_fri'=> $this->input->post('late_evening_fri',TRUE),
                'late_evening_sat'=> $this->input->post('late_evening_sat',TRUE),
                'overnight_sun'=> $this->input->post('overnight_sun',TRUE),
                'overnight_mon'=> $this->input->post('overnight_mon',TRUE),
                'overnight_tue'=> $this->input->post('overnight_tue',TRUE),
                'overnight_wed'=> $this->input->post('overnight_wed',TRUE),
                'overnight_thur'=> $this->input->post('overnight_thur',TRUE),
                'overnight_fri'=> $this->input->post('overnight_fri',TRUE),
                'overnight_sat'=> $this->input->post('overnight_sat',TRUE)
            );
            if($data['time_table']){  
                $user_id = $postdata['user_id'];
                $this->db->where('user_id',$user_id);
                $this->db->update('tbl_user_availability', $postdata);
                $this->session->set_flashdata('success', 'Time table upadate successfully');
                redirect($this->uri->uri_string());
            }else{
                $this->db->insert('tbl_user_availability', $postdata);
                $this->session->set_flashdata('success', 'Time table upadate successfully');
                redirect($this->uri->uri_string());
            }
        }

            $data['title'] = 'Edit Availability Time';
            $data['main_content'] = 'frontend/user/available_time';
           
            $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    public function verfiyemail(){
            $email_address = $_POST['email_address'];
            $data = array(
                'email' => $email_address,
                );
            $config = array(
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );

        $this->load->library('email',$config);
        $this->email->from('noreply@frumcare.com', 'FRUMACARE');
        $this->email->to($email_address);
        $this->email->subject('Please Verify your email address');
        $this->email->message($this->load->view('emails/verifyemail',$data,TRUE));
        $this->email->send();

        //echo $this->email->print_debugger();
    }

    public function verifyemailaddress($email=null){
        $email = segment(2);
        if($email!=''){
            $edit = array(
                'email_status' => 1
            );
            $this->common_model->update('tbl_user', $edit, array('SHA1(email)' => $email));
        }
        $data['main_content'] = 'frontend/user/success';
        $data['title']        = 'Success';  
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }

    public function addrefrences($id_hash = ''){
        if(isset($_POST['save_ref'])){
                $this->refrence_model->add();
                $this->session->set_flashdata('msg', 'Refrences added successfully');
                redirect('user/dashboard');

        }
        $data['main_content']  = 'frontend/user/addrefrences';
        $data['title']         = 'Add Refrences';
        $this->load->view(FRONTEND_TEMPLATE,$data);

    }

    public function sendsms(){
        // username,password,api_id for smsgateway
        $params = array(
            'username' => 'michaelfrumcare', 
            'password' => 'eMVcNaDZgGdAcK', 
            'api' => '3494230'
        ); 

        if($this->input->is_ajax_request()){
            $uid = $_POST['user_id'];
            $stat =  $this->user_model->checkPhoneVerficationStatus($uid);
            if($stat !=  '1'){
                     $this->load->library('clickatell',$params);
                        if($this->clickatell->login() == 0){
                                die('failed');
                        }
                if($uid){
                    $phone_number = $this->user_model->getPhoneNumber($uid);
                    $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                                         .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                                         .'0123456789!@#$%^&*()'); // and any other characters
                        shuffle($seed); // probably optional since array_is randomized; this may be redundant
                        $rand = '';
                        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

                        $data = array(
                            'user_id'           => $uid,
                            'verfication_code'  => $rand
                        );

                        $this->db->insert('tbl_verificationcodes',$data);

                        $message = "Your phone number verfication code is ".$rand.".";
                        $res = $this->clickatell->send($phone_number[0]['contact_number'],$message);

                   echo $res;exit;
                }
            }else{
                 echo 2;exit;
            }
        }
    }

    public function smsverification($id_hash=''){

        $this->breadcrumbs->push('Phone Verification', '/category');
        $this->breadcrumbs->unshift('My Background Checks', base_url().'user/backgroundverification');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        if(isset($_POST['verify'])){
            $verficationcode = $_POST['verfication_code'];
            $user_id         = $_POST['user_id'];
            $stat =  $this->user_model->checkPhoneVerficationStatus($user_id);
            if($stat != '1'){
                 $q = $this->user_model->check_verficationcode($verficationcode,$user_id);
                    if($q == '1'){
                       $this->db->where('id',$user_id);
                       $this->db->update('tbl_user',array('contact_number_status' => 1));
                       $this->session->set_flashdata('success', 'Phone number verified successfully.');
                       redirect('user/dashboard','refresh');
                    }else{
                        $this->session->set_flashdata('error', 'Phone number cannot be verified.');
                    }
            }else{
                $this->session->set_flashdata('error', 'Phone number is alerday verified.');
                redirect('user/dashboard','refresh');
            }
                   
        }

        $data  = array(
            'main_content' => 'frontend/user/smsverification',
            'title'        => 'Phone number verification',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
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

     function getLongitudeAndLatitude($address){
      $prepAddr = str_replace(' ','+',$address);
      $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
      $output= json_decode($geocode);
      if($output){
        return $output;
      }else{
        return false;
      }
        
    }

    public function upload($id_hash = ''){

        $this->breadcrumbs->push('upload photo', '/category');
        $this->breadcrumbs->unshift('my account', base_url().'user/dashboard');

        if(isset($_POST['save_image'])){
            $id    = $this->input->post('user_id',TRUE);
            $updatedata = array(
                    'profile_picture'           => $this->input->post('profile_picture',TRUE),
                    'profile_picture_status'    => $this->input->post('profile_picture_status',TRUE),
            );

            $this->db->where('id',$id);
            $this->db->update('tbl_user',$updatedata);
            $this->session->set_flashdata('success', 'Profile Image Updated Successfully.');
            //redirect('user/upload/'.$id_hash,'refresh');
        }

         $data = array(
             'main_content' => 'frontend/user/upload_photo',
             'title'        => 'Upload Photo',
        );

         $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    function upload_image(){
        $this->load->library('imageupload_lib');
        $this->imageupload_lib->upload('profile-picture', 100, 300);
    }

    public function autoupdateprofilepic(){
        if($this->input->is_ajax_request()){
            $id    = $this->input->post('user_id',TRUE);

            $updatedata = array(
                    'profile_picture'           => $this->input->post('img',TRUE),
                    'profile_picture_status'    => $this->input->post('status',TRUE),
            );

            $this->db->where('id',$id);
            $this->db->update('tbl_user',$updatedata);
        }
    }


     public function delete_account($id_hash = ''){
        $id = check_user();

        $this->db->where('id',$id);
        $this->db->update('tbl_user',array('status'=>2));

       // $this->session->set_flashdata('success', 'Your account has been deleted.');
        redirect('user/dashboard/','refresh');
    }

      public function addtestimonials($id_hash = ''){
        if(isset($_POST['add'])){
            $this->user_model->addtestimonials();
            $this->session->set_flashdata('success', 'Testimonial added successfully');
            redirect('user/dashboard','refresh');
        }

        $data = array(
            'title'         => 'Add Testimonial',
            'main_content'  => 'frontend/user/addtestimonial'
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }

      public function uploadtestimonialimage(){
       $this->load->library('imageupload_lib');
       $this->imageupload_lib->upload('testimonial', 100, 300);
      }
      
      public function submit_ticket()
      {
        if(isset($_POST['ticket_title'])){
			
			$ticket_data = array(
				'subject'      => $_POST['ticket_title'],
				'description'  => $_POST['ticket_description'],
				'file'  	   => $_POST['file'],
				'email'		   => $_POST['contact_email'], 
				'phone'		   => $_POST['contact_number'],
				'date' 		   => time(),
				'user_id'	   => $this->session->userdata['current_user'],
                'status'       => 0
			);

			$this->db->insert('tbl_tickets', $ticket_data);
            
            /*---Email Notification---*/
			$email_address = "info@frumcare.com";
            $data = array(
                'email' => $email_address,
                );
            $config = array(
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );
            
        $base_url = base_url(); 
        $this->load->library('email',$config);
        $this->email->from($_POST['contact_email']);
        $this->email->to($email_address);
        $this->email->subject('You have new ticket request');
        $this->email->message(
                'Dear admin, < br/> You have new ticket <a href='."$base_url.user/ticket_view".'>Click Here</a>'
                );
        $this->email->send();
		}
      }//CODE BY CHAND   
      
      public function uploadfile(){
        $this->fileupload_lib->upload('files');
    }//CODE BY CHAND

    public function uploadpdf(){
        $this->fileupload_lib->upload('files');
    }//CODE BY CHAND
      
      
    public function notifications(){
        $res = $this->user_model->get_ticket();
        $data['details'] = $res;

        $this->breadcrumbs->push('My Notification', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
        
        $this->load->library('pagination');
        $config['base_url'] = base_url()."user/notifications";
        $config['total_rows'] = $this->user_model->record_count();
        $config['per_page'] = 5;
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $page = $this->uri->segment(3,0);
        $this->pagination->initialize($config);

        $data['record'] = $this->user_model->ticket_data_view($config['per_page'],$page);
        $data['links'] = $this->pagination->create_links();
        $data['main_content'] = ('frontend/user/ticket_view');
        $data['title']              = "My Notifications";
        if($this->input->is_ajax_request())
        {
            $this->load->view("frontend/user/ticket_view",$data);
        }
        else{
            $this->load->view(FRONTEND_TEMPLATE,$data);
        }

      }//CODE BY CHAND
      
      
      public function ticket_detail_view($id){

        $this->breadcrumbs->push('View', site_url().'#');
        $this->breadcrumbs->unshift('My Notification', base_url().'user/notifications');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $id                         = array('id'=>$id);
        $data['details']            = $this->user_model->get_ticket_detail($id);
        $data['main_content']       = "frontend/user/ticket_detail_view";

        $this->load->view(FRONTEND_TEMPLATE,$data);
    }//CODE BY CHAND

     
     //changes by kiran
      public function writereview($id_hash = ''){
        
        $this->breadcrumbs->push('Write a Review', site_url().'#');
        $this->breadcrumbs->unshift('My Reviews', base_url().'user/reviews');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $data = array(
            'title'         => 'Add Review',
            'main_content'  => 'frontend/user/writereview'
        );
        
        $this->load->view(FRONTEND_TEMPLATE,$data);
      }
      public function go_to_profile(){
        $uri = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        redirect('caregivers/details/'.$uri.'/'.$type);
      }
      public function search_for_careseeker(){
        if(isset($_GET['search_text'])){
            $search_text = $_GET['search_text'];
            if(!empty($search_text)){
                $data['caregiver'] = $this->user_model->search_careseeker($search_text);
                $this->load->view('frontend/user/search_careseeker',$data);
            }
        }
    }
    
      public function reviews(){
        $this->breadcrumbs->push('My Reviews', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
        $data = array(
            'title'         => 'View Review',
            'main_content'  => 'frontend/user/myreview'
        );
        $this->load->library('pagination');
        $config['base_url'] = base_url()."user/reviews/";
        $config['total_rows'] = $this->user_model->review_record_count();
        $config['per_page'] = 2; 
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $page = $this->uri->segment(3,0);
        $this->pagination->initialize($config); 
        $acc_details = $this->session->userdata('account_category');
        if($acc_details == 1){
            $field = "user_profile_id";
        }

        if($acc_details == 2){
            $field = "user_id";
        }

        if($acc_details == 3){
            $field = "user_id";
        }
        $data['account_category'] = $acc_details;
        $data['myreview']   = $this->user_model->get_my_review($config['per_page'],$page,$field);
        $data['links']      = $this->pagination->create_links();
        $data['care']       = $this->user_model->care();

        $this->load->view(FRONTEND_TEMPLATE,$data);

      }
      
      public function profile(){

        $this->breadcrumbs->push('My Profile', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
        $user_id = array('id'=>$this->session->userdata('current_user'));
 
        //by kiran
        $data['userDetails'] = $this->user_model->getUserDetails($user_id['id']);
        $profile= $this->user_model->getNewUserProfile($user_id['id']);
        if ($data['userDetails']['hasAd'] == 0 && $profile['account_category'] != 2 && $profile['care_type'] < 25) {
         $user_data = getBrowser();
                $log = array(
                    'user_id' => $user_id['id'],
                    'login_time' => time(),
                    'login_browser' => $user_data['name'].' '.$user_data['version'],
                    'login_os' => $user_data['platform'],
                    'login_ip' => $_SERVER['REMOTE_ADDR']
                );
                $log_id = $this->common_model->insert('tbl_user_logs', $log, true);
                $log_id = sha1($log_id);
         
         
         if($profile['care_type'] > 24)
                    $link = "ad/job/organizations/".$profile['care_type'];
                else
                    $type = $profile['account_category'] == 3 ? 'organization' : 'individual';
                    if($profile['account_category'] == 1){
                        $category = 'caregiver';
                    }
                    if($profile['account_category'] == 2){
                        $category = 'careseeker';
                    }

                    if($profile['account_category']  == 3){
                        $category = 'organization';
                    }
                    $link = 'ad/add_step2/'.$category.'/'.$type.'/'.$log_id.'/'.$profile['care_type'];
                redirect($link);
        }
         
         
         
        $data['account_category'] = $this->user_model->get_account_category();
        $data['all_profile'] =$this->user_model->get_all_profile();
        $data['main_content'] = ('frontend/user/profile');

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }


      public function addprofile(){
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
            'main_content' => 'frontend/user/addprofile'
        );
        $this->load->view(FRONTEND_TEMPLATE,$data);
      }

       public function new_profile(){
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
                
                //individual caregivers
                if($account_category == 1){
                    if($submit_id == 1){
                        $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/babysitter_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }
                    }
                    else if($submit_id == 2){
                        $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/nanny_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        } 
                    }
                    else if($submit_id == 3){
                        $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/nursery_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }
                    }
                    else if($submit_id == 4){
                        $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/tutor_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }
                    }
                    else if($submit_id == 5){
                        $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/senior_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }     
                    }
                    else if($submit_id == 6){
                        $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/specialneeds_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }
                    }
                    else if($submit_id == 7){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/therapist_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }                        
                    }
                    else if($submit_id == 8){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                             $this->load->view('frontend/care/giver/cleaning_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }                       
                    }
                    else if($submit_id == 9){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                             $this->load->view('frontend/care/giver/errand_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }                       
                    }                    
                    else
                        echo "You can not add job";
                }
                
                //Job poster
                 if($account_category == 2){
                     if($submit_id == 17){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                           $this->load->view('frontend/care/seeker/babysitter_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 18){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/nanny_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 19){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/tutor_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 20){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/senior_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 21){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/errand_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 22){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/specailneedcareseeker_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 23){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/therapist_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 24){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/cleaning_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }                    
                    else{
                        echo "You are not allowed to become Caregiver";
                    }
                }
                
                //Organizations
                if($account_category == 3){
                    if($submit_id == 10){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/daycarecenter_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }
                    }
                    else if($submit_id == 11){
                        
                     //   $this->load->view('frontend/care/giver/nanny_form',$data);
                        echo "This page doesnt exist";
                    }
                    else if($submit_id == 12){
                      //  $this->load->view('frontend/care/giver/nanny_form');
                        echo "This page doesnt exist";
                    }
                    else if($submit_id == 13){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/seniorcareagency_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }                        
                    }
                    else if($submit_id == 14){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/specialneedscenter_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }                    
                    }
                    else if($submit_id == 15){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/cleaningcompany_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }                        
                    }
                    else if($submit_id == 16){
                          $profile_check = $this->user_model->existing_profile_check($account_category,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/giver/seniorcarecenter_form',$data);
                        }
                        else{
                            echo "Your profile already has this care type";
                        }                        
                    }
                    else if($submit_id == 25){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }
                        
                    }
                    else if($submit_id == 26){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 27){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else if($submit_id == 28){
                          $profile_check = $this->user_model->existing_profile_check($account_category ,$submit_id);
                        if($profile_check){
                            $this->load->view('frontend/care/seeker/cleaningcompany_form',$data);
                        }
                        else{
                            echo "You have already posted this job";
                        }                        
                    }
                    else{
                        echo "Some error occured, We will fix it soon";
                    }
                }
        }/*else{
            echo "This page doesent exist";
        }*/
    }
    public function addprofileconfirm(){
            $p = $_POST;            
            $profile_check = $this->user_model->existing_profile_check($p['account_category'],$p['care_type']);
            if($profile_check){
                $language = false;
                $looking_to_work = '';
                $willing_to_work = '';
                $training = '';
                $availability = '';
                $subjects = '';
                $conditions = '';
                $age_group = '';
                $optional_number ='';
                if(isset($p['conditions_of_patient'])) {
                    $conditions = $p['conditions_of_patient'];
                }
                if(isset($p['subjects'])) {
                    $subjects = join(',', $p['subjects']);
                }
                if(isset($p['language'])) {
                    $language = join(',', $p['language']);
                }
                if(isset($p['looking_to_work'])) {
                    $looking_to_work = join(',', $p['looking_to_work']);
                }
                if(isset($p['willing_to_work'])) {
                    $willing_to_work = join(',', $p['willing_to_work']);
                }
                if(isset($p['training'])) {
                    $training = join(',', $p['training']);
                }
                if(isset($p['availability'])) {
                    $availability = join(',', $p['availability']);
                }
                if(!empty($p['age_group'])){
                    $age_group = join(',', $p['age_group']);
                }
                if(isset($p['optional_number'])){
                    $optional_number = join(',',$p['optional_number']);
                }
                if(isset($p['rate_type'])){
                    $rate_type = join(',',$p['rate_type']);
                }
                if(isset($p['extra_field'])){
                    $extra_field = join(',',$p['extra_field']);
                } 

                if(isset($p['facility_pic'])){
                    $facility_pic = $p['facility_pic'];
                }else{
                    $facility_pic = '';
                }                

                $insert = array(
                    'longitude' => isset($p['lng']) ? $p['lng'] : '',
                    'latitude' => isset($p['lat']) ? $p['lat'] : '',
                    'user_id' =>$this->session->userdata('current_user'),
                    'account_category' =>$this->session->userdata('account_category'),
                    'care_type' =>$p['care_type'],
                    'organization_care' => isset($p['organization_care'])?$p['organization_care'] : 0,
                    'subjects' => $subjects,
                    'language' => $language,
                    'conditions_of_patient' => $conditions,
                    'job_position' => isset($p['job_position'])? $p['job_position'] : '',
                    'organization_type' => isset($p['organization_type'])? $p['organization_type'] : '',
                    'organiztion_name' => isset($p['organization_name']) ? $p['organization_name'] : '',
                    'start_date' => isset($p['start_date']) ? $p['start_date'] :'0000-00-00',
                    'looking_to_work' => $looking_to_work,
                    'willing_to_work' => $willing_to_work,
                    'type_of_therapy' => isset($p['type_of_therapy']) ? $p['type_of_therapy'] : '',
                    'licence_information' => isset($p['licence_information']) ? $p['licence_information'] : '',
                    'accept_insurance' => isset($p['accept_insurance']) ? $p['accept_insurance'] : 2,
                    'established' => isset($p['established']) ? $p['established'] : '',
                    'certification' => isset($p['certification']) ? $p['certification'] : '',
                    'number_of_children' => isset($p['number_of_children']) ? $p['number_of_children'] : '',
                    'number_of_staff' => isset($p['number_of_staff']) ? $p['number_of_staff'] : '',
                    'age_group' => $age_group,
                    'experience' => isset($p['experience']) ? $p['experience'] : '',
                    'training' => $training,
                    'hourly_rate' => isset($p['rate_type']) && $p['rate_type'] == 0 ? $p['rate'] : '',
                    'monthly_rate' => isset($p['rate_type']) && $p['rate_type'] == 1? $p['rate']:'',
                    'availability' => $availability,
                    'profile_description' => isset($p['profile_description']) ? $p['profile_description'] : '',
                    'religious_observance' => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                    'agree_bg_check' => isset($p['bg_check'])? $p['bg_check'] : '',
                    'number_of_rooms' => isset($p['number_of_rooms']) ? $p['number_of_rooms'] : '',
                    'driver_license' => isset($p['driver_license']) ? 1 : 0,
                    'vehicle' => isset($p['vehicle']) ? 1 : 0,
                    'pick_up_child' => isset($p['pick_up_child']) ? 1 : 0,
                    'cook' => isset($p['cook']) ? 1 : 0,
                    'basic_housework' => isset($p['basic_housework']) ? 1 : 0,
                    'sick_child_care' => isset($p['sick_child_care']) ? 1 : 0,
                    'homework_help' => isset($p['homework_help']) ? 1 : 0,   
                    'on_short_notice' => isset($p['on_short_notice']) ? 1 : 0,
                    'clean' => isset($p['clean']) ? 1 : 0,
                    'wash' => isset($p['wash']) ? 1 : 0,
                    'iron' => isset($p['iron']) ? 1 : 0,
                    'fold' => isset($p['fold']) ? 1 : 0,
                    'bath_children' => isset($p['bath_children']) ? 1 : 0,
                    'bed_children' => isset($p['bed_children']) ? 1 : 0,
                    'references' => isset($p['references']) ? $p['references'] : 2,
                    'photo_of_child' => isset($p['photo_of_child']) ? $p['photo_of_child'] : 0,
                    'job_description' => isset($p['job_description']) ? $p['job_description'] : 0,
                    'profile_status'  => 0,
                    'optional_number' => isset($optional_number)?$optional_number:'',
                    'caregiverage_from'  => isset($p['caregiverage_from'])?$p['caregiverage_from']:0,
                    'caregiverage_to'  => isset($p['caregiverage_from'])?$p['caregiverage_to']:0,
                    'smoker' => isset($p['smoker'])?$p['smoker']:2,
                    'gender_of_caregiver' => isset($p['gender_of_caregiver'])?$p['gender_of_caregiver']:1,
                    'gender_of_careseeker' => isset($p['gender_of_careseeker']) ? $p['gender_of_careseeker'] : '',
                    'contact_name'  => isset($p['name']) ? $p['name'] : '',
                    'personal_hygiene' => isset($p['personal_hygiene'])?$p['personal_hygiene']:'',
                    'reference_file' => isset($p['file'])?$p['file']:'',
                    // added on 28 dec 2014 by santosh
                    'created_time' => strtotime('now'),
                    'licence_information' => isset($p['licence_information'])?$p['licence_information']:'',
                    'sunday_from'   => isset($p['sunday_from'])?$p['sunday_from']:'',
                    'sunday_to'     => isset($p['sunday_to'])?$p['sunday_to']:'',
                    'mid_days_from' => isset($p['mid_days_from'])?$p['mid_days_from']:'',
                    'mid_days_to'   => isset($p['mid_days_to'])?$p['mid_days_to']:'',
                    'friday_from'   => isset($p['friday_from'])?$p['friday_from']:'',
                    'friday_to'     => isset($p['friday_to'])?$p['friday_to']:'',
                    'vacation_days' => isset($p['vacation_days'])?$p['vacation_days']:'',
                    'pdf'           => isset($p['pdf'])?$p['pdf']:'',
                    'extended_hrs'  => isset($p['extended_hrs_available'])?$p['extended_hrs_available']:'',
                    'flexible_hours'=> isset($p['flexible_hours'])?$p['flexible_hours']:'',
                    'rate' => isset($p['rate']) && isset($p['rate']) ?$p['rate']:'',
                    'rate_type' => isset($rate_type) ? $rate_type:'',
                    'payment_option'    => isset($p['payment_option'])?$p['payment_option']:'',
                    'days_from' => isset($p['days_from'])?$p['days_from']:'',
                    'days_to' => isset($p['days_to'])?$p['days_to']:'',
                    'hours_from'  => isset($p['hours_from'])?$p['hours_from']:'',
                    'hours_to'=> isset($p['hours_to'])?$p['hours_to']:'',
                    'facility_pic' => $facility_pic,
                    'sub_care'              => isset($p['sub_care']) ? $p['sub_care'] : '',
                    'extra_field'       => isset($extra_field) ? $extra_field : ''
                );
    
                $q = $this->user_model->insert_new_profile($insert);
                if($q){
                    $emails = $this->common_model->getAdAdminEmails();                    
                    $receiveremail = '';                    
                    foreach($emails as $e1){
                        $receiveremail .= $e1['email1'].',';                        
                    }
                    $receiveremail = substr_replace($receiveremail ,"",-1);  //removes comma from last
                    
                    $details      = $this->user_model->getUserDetailsById(check_user(),$p['care_type']);
                    $details['profile_id'] = $q;
                    $type = Caretype_model::getCareTypeById($details['care_type']);
                    
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
                    $data['care_id'] = $details['id'];
                    
                    $msg = $this->load->view('frontend/email/profileapproval', $data, true);
        
                    $param = array(
                        'subject'     => 'A new profile has been added in Frumcare.com, approval required',
                        'from'        => SITE_EMAIL,
                        'from_name'   => SITE_NAME,
                        'replyto'     => SITE_EMAIL,
                        'replytoname' => SITE_NAME,
                        'sendto'      => $receiveremail,
                        'message'     => $msg
                    );
                    sendemail($param); 
                    
                    $user_id = check_user();
                    $user = get_user($user_id);
                    $sendto = $user['email'];
                    
                    $a = get_account_details();
                    $id = $a->care_type;
                    $details = $this->user_model->getUserDetailsById($user_id,$id);
                    
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
                    if(isset($p['contact_number']) && !empty($p['contact_number'])){
                        $update_user['contact_number'] = $p['contact_number'];
                    }
                     if(isset($p['gender']) && !empty($p['gender'])){
                        $update_user['gender'] = $p['gender'];
                    }
                     if(isset($p['age']) && !empty($p['age'])){
                        $update_user['age'] = $p['age'];
                    }
                     if(isset($p['location']) && !empty($p['location'])){
                        $update_user['location'] = $p['location'];
                    }
                    if(isset($p['lat']) && !empty($p['lat'])){
                        $update_user['lat'] = $p['lat'];
                    }
                    if(isset($p['lng']) && !empty($p['lng'])){
                        $update_user['lng'] = $p['lng'];
                    }
                     if(isset($p['name']) && !empty($p['name'])){
                        $update_user['name'] = $p['name'];
                    }
                     if(isset($p['neighbour']) && !empty($p['neighbour'])){
                        $update_user['neighbour'] = $p['neighbour'];
                    }
                    if(isset($p['city']) && !empty($p['city'])){
                        $update_user['city'] = $p['city'];
                    }
                    if(isset($p['state']) && !empty($p['state'])){
                        $update_user['state'] = $p['state'];
                    }
                    if(isset($p['country']) && !empty($p['country'])){
                        $update_user['country'] = $p['country'];
                    }
                    if(isset($p['zip']) && !empty($p['zip'])){
                        $update_user['zip'] = $p['zip'];
                    }
                    if(isset($p['religious_observance']) && !empty($p['religious_observance'])){
                        $update_user['caregiver_religious_observance'] = $p['religious_observance'];
                    }
                   
                    if(isset($update_user)){
                        $this->common_model->update('tbl_user',$update_user,array('id' => $this->session->userdata('current_user')));
                    }
                    $profile = $this->job_or_profile();
                    $this->session->set_flashdata('info', "New $profile successfully added. Your $profile will be placed on the site after being approved by our team.");
                    redirect('user/profile');
                }
                else{
                    $profile = $this->job_or_profile();
                    $this->session->set_flashdata('info', "Error: New $profile can not be added at this moment");
                    redirect('user/profile');    
                }
            }
            else{
                $profile = $this->job_or_profile();
                $this->session->set_flashdata('info',"Error: You can not add same $profile again!!");
                redirect('user/profile');
            }
      }
      
       public function getEmailMessage($id, $care_type)
       {
            $details      = $this->user_model->getUserDetailsById($id,$care_type);
            $type = Caretype_model::getCareTypeById($details['care_type']);
            
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
            $data['care_id'] = $details['id']; 
            return $this->load->view(FRONTEND_TEMPLATE,$data);
       }
      
      public function edit_profile(){

        $this->breadcrumbs->push('Edit', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $uid = $this->uri->segment(3);
        $care_type = $this->uri->segment(4);
        $care_id = array('care_id'=>$care_type);
        $res = $this->user_model->current_user($care_id);
        $usr = $this->user_model->get_user_info();
        $id = $this->session->userdata('current_user');
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
            $data['main_content'] = ('frontend/care/giver/edit_daycarecenter_form');
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
            $data['main_content'] = ('frontend/care/seeker/edit_therapist_form');
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

      public function upgradestatus(){   

          $this->breadcrumbs->push('Upgrade Status', site_url().'#');
          $this->breadcrumbs->unshift('My Profile', base_url().'user/profile');
          $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $current_user = $this->session->userdata('current_user');

        if(isset($_POST['save'])){
         $uid           = $this->input->post('user_id',true);
         $package_id    = $this->input->post('package',true);

         $this->db->where('id',$uid);
         $this->db->update('tbl_user',array('package_id' =>$package_id));

         $this->session->set_flashdata('info', 'Package Upgraded Successfully.');
         redirect('user/upgradestatus','refresh');
        }

        $data = array(
            'title'         => 'Upgrade Status',
            'main_content'  => 'frontend/user/upgradestatus',
            'packagedata'   => $this->user_model->getPackages(),
            'userpackage'   => $this->user_model->getUserPackage($current_user)    
         );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }//CODE BY CHAND
      
      public function update_job_details(){
        $care_type = array('care_id'=>$this->uri->segment(3));
        $hasAd = $this->user_model->getUserDetails(check_user())['hasAd'];
        $this->user_model->update_job_details($care_type);
        $email = 3;
            $p = $_POST;
            if (isset($p['profile_description']) || isset($p['file']) || isset($p['pdf']) || isset($p['facility_pic'])) {
                $email = 1;
            }
        
        
        if ($email == 1) {
            $emails = $this->common_model->getAdAdminEmails();
            $receiveremail = '';                    
            foreach($emails as $e1){
                $receiveremail .= $e1['email1'].',';                        
            }
            $receiveremail = substr_replace($receiveremail ,"",-1);  //removes comma from last
            
            $details      = $this->user_model->getUserDetailsById(check_user(),$care_type['care_id']);
            $details['profile_id'] = $q;
            $type = Caretype_model::getCareTypeById($details['care_type']);
            
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
            $data['care_id'] = $details['id'];
            
            $msg = $this->load->view('frontend/email/profileapproval', $data, true);

            $param = array(
                'subject'     => 'A profile has been edited, approval required',
                'from'        => SITE_EMAIL,
                'from_name'   => SITE_NAME,
                'replyto'     => SITE_EMAIL,
                'replytoname' => SITE_NAME,
                'sendto'      => $receiveremail,
                'message'     => $msg
            );
            sendemail($param);
        }
        $q = true;
        $profile = $this->job_or_profile();
        if($q){
            if ($email == 1) {
                $this->session->set_flashdata('info', "$profile Updated successfully. Your ad will be returned to the site shortly after being approved by our team.");
            } else {
                if ($hasAd == 0) {
                    $this->session->set_flashdata('info', "$profile Updated successfully. Your ad will be placed on the site after being approved by our team.");
                } else {
                    $this->session->set_flashdata('info', "$profile Updated successfully");
                }
            }
            redirect('user/profile');
        }
        else{
            $this->session->set_flashdata('info', "Error: $profile could not be updated at this moment");
            redirect('user/profile');    
        }
        
        
      }//CODE BY CHAND
        
        public function deletePhoto($id)
        {
            redirect('user/profile');
        }
       
      public function searches(){
        sleep(3);
        $this->breadcrumbs->push('My Searches', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $current_user = $this->session->userdata['current_user'];

        $data = array(
            'title'         => 'Search History',
            'main_content'  => 'frontend/user/viewhistory',
            'record'        => $this->user_model->getHistory($current_user)
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }

      public function createalert($id)
      {
            $p = $_GET;
            if (isset($p['distance'])) {
                if($p['distance'] == 'unlimited') {
                    $distance = 10000;
                } else {
                    $distance = $p['distance'];
                }
            } else {
                $distance = 0;
            }
            
            $insert = array(
                'long' => isset($p['long']) ? $p['long'] : '',
                'lat' => isset($p['lat']) ? $p['lat'] : '',
                'distance' => $distance,
                'createAlert' => 1,
                'location' => isset($p['location']) ? $p['location'] : ''
                
            );
            $this->breadcrumbs->push('My Searches', site_url().'#');
            $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
            $this->db->where('id',$id);
            $this->db->update('tbl_searchhistory', $insert);
            $this->session->set_flashdata('info', 'Alert Created Successfully');
            redirect('user/searches', true);
      }
      
      public function removealert($id)
      {
            $this->breadcrumbs->push('My Searches', site_url().'#');
            $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
            $this->db->where('id',$id);
            $this->db->update('tbl_searchhistory', array('createAlert' => 0));
            $this->session->set_flashdata('info', 'Alert Cancelled Successfully');
            redirect('user/searches', 'refresh');
      }
      
      public function createsearchalert(){

        $this->breadcrumbs->push('Create Search Alert', site_url().'#');
        $this->breadcrumbs->unshift('My Search Alerts', base_url().'user/searches');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $userid = $this->session->userdata['current_user'];

        if(isset($_POST['create_alert'])){
           if(isset($_POST['available_time']))
             $available_time = join(',', $_POST['available_time']);
             if(isset($_POST['experienced_with']))
                 $experienced_with = join(',', $_POST['experienced_with']);

                 
                 $alertdata = array(
                    'available_time'        => $available_time,
                    'experienced_with'      => $experienced_with,
                    'years_of_experience'   => $this->input->post('years_of_experience',true),
                    'number_of_children'    => $this->input->post('number_of_children',true),
                    'user_id'               => $userid,
                    'education'             => $this->input->post('education_level',true)
                );

                $alert_id =  $this->input->post('alert_id',true);

                if($alert_id == ''){
                    $this->db->insert('tbl_searchalerts',$alertdata);
                    $this->session->set_flashdata('info', 'Alert Created Successfully');
                    redirect('user/searches',true);
                    
                }else{
                    $this->db->where('id',$alert_id);
                    $this->db->update('tbl_searchalerts',$alertdata);
                    $this->session->set_flashdata('info', 'Alert Updated Successfully');
                    redirect('user/searches',true);
                }
                
        }
        $data = array(
            'title'         => 'Create Search Alert',
            'main_content'  => 'frontend/user/createsearchalert'
            // 'searchalert'   => $this->user_model->getSearchAlertByUserId($userid)
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }

      public function viewhistory(){

        $this->breadcrumbs->push('History', site_url().'#');
        $this->breadcrumbs->unshift('My searches', base_url().'user/searches');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $current_user = $this->session->userdata['current_user'];

        $data = array(
            'title'         => 'View History',
            'main_content'  => 'frontend/user/viewhistory',
            'record'        => $this->user_model->getHistory($current_user)
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }

      public function currentsearch(){

        $this->breadcrumbs->push('Current Searches', site_url().'#');
        $this->breadcrumbs->unshift('My searches', base_url().'user/searches');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $current_user = $this->session->userdata['current_user'];

        $data = array(
            'title'         => 'Current Search',
            'main_content'  => 'frontend/user/current_search',
            'record'        => $this->user_model->getCurrentSearches($current_user)
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }

      public function searchalerts(){
        $current_user   = $this->session->userdata['current_user'];

        $this->breadcrumbs->push('Alert', site_url().'#');
        $this->breadcrumbs->unshift('My Search Alerts', base_url().'user/searches');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $data = array(
                'title'         => 'Search Alerts',
                'main_content'  => 'frontend/user/alerts',
                'record'        => $this->user_model->getAlertData($current_user),
                'searches'      => $this->user_model->getSearches(),
           ); 
        $this->load->view(FRONTEND_TEMPLATE, $data);
      }

      public function deleteticket($id = ''){
        $this->db->delete('tbl_tickets',array('id'=>$id));
        redirect('user/notifications');
        $this->session->flashdata('info','Ticket deleted successfully');
      }

      public function favorites(){

        $this->breadcrumbs->push('My Favorites', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $data = array(
            'main_content' => 'frontend/user/favorites',
            'title'        => 'Favorites',
            'record'       => $this->user_model->getMyFavorites(check_user())
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);

      }

      public function hide_profile(){
        $user_id    = $this->uri->segment(3);
        $care_type  = $this->uri->segment(4);

        $this->db->where(array('user_id' =>$user_id,'care_type'=>$care_type));
        $this->db->update('tbl_userprofile',array('profile_status'=> 1));
        redirect('user/profile','refresh');
        $this->session->set_flashdata('info', 'Profile hidden successfully');
      }

      public function unfavorite($id = ''){

        $this->db->delete('tbl_favorites',array('id'=>$id));
        $this->session->flashdata('info','Profile unfavorite successfully.');
        redirect('user/favorites','refresh');
        

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

      public function upgradepackage(){

        $this->breadcrumbs->push('Upgrade Status', site_url().'#');
        $this->breadcrumbs->unshift('My Profile', base_url().'user/profile');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $user_id      = $this->uri->segment(3);
        $care_type    = $this->uri->segment(4);

        if(isset($_POST['save'])){
            $data = array(
                'user_id'       => $user_id,
                 'care_type'    => $care_type,
                 'package_id'   => $this->input->post('package',true)
            );
            $this->user_model->updateProfilePackage($data);
            $this->session->set_flashdata('info', 'Package Updated Successfully.');
            redirect('user/profile','refresh');
        }
        
        $data = array(
                'title'         => 'Upgrade Status',
                'packagedata'   => $this->user_model->getPackages(),
                'userpackage'   => $this->user_model->getProfilePackage($user_id,$care_type),
                'main_content'  => 'frontend/user/upgradestatus',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }
      
      public function pay(){

        $this->breadcrumbs->unshift('Pay', base_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

       

        $res = $this->user_model->getpackage_dtl();
        $this->session->set_userdata('package_name',$res[0]['package_name']);
        $this->session->set_userdata('package_amount',$res[0]['package_price']);
        $this->session->set_userdata('user_id',$user_id);
        $this->session->set_userdata('profile_id',$care_type);
        
        $data['main_content'] = 'frontend/user/pay';
        $this->load->view(FRONTEND_TEMPLATE,$data);

      }
      
      public function pay_result(){        
        $status = $_GET['st'];
        $this->load->helper('cookie');        
        $data = @unserialize($this->input->cookie('payment_process', TRUE));                                                
        if($status == 'Completed'){
            $data = @unserialize($this->input->cookie('payment_process', TRUE));            
            $template = $this->email_template_model->getEmailTemplateBySlug('upgrade-package');                        
            $new_data = array(
				'package_name' 	=> $data['package_name'],
				'user_name'	 	=> $data['user_name'],
				'created_date'	=> $data['created_date'],
				'package_amount'=> $data['package_amount'],
				'user_id'		=> $data['user_id'],
				'profile_id'	=> $data['profile_id'],
				'invoice_number' => $data['invoice_number'],              
			);            
            $q = $this->db->insert('tbl_payments',$new_data);
            if($q){
                $this->db->where(array('user_id'=>$data['user_id'],'care_type'=>$data['profile_id']));
                $this->db->update('tbl_userprofile',array('package_id'=>$data['packageid']));
                
                $message        = str_replace('{username}',$data['user_name'],$template['content']);
                $finalmessage = str_replace('{package_name}', $data['packagedetails'][0]['package_name'], $message);                                
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
                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");          
                $this->email->from('info@frumcare.com', 'FRUMCARE');                
                $this->email->to($data['userdetails']['email']);                        
                $this->email->subject($template['subject']);                
                $this->email->message($finalmessage);           
                $this->email->send();                
            }            
            $this->session->set_flashdata('Payment successfully completed');
        }
        else{
            $this->session->set_flashdata('Oops! error occured during payment');    
        }
        delete_cookie('payment_process');
        delete_cookie('payment_other_details');        
        redirect('user/paymenthistory');
      }

      public function delete_main_profile(){
        $photo = $this->uri->segment(3);
        $id=$this->session->userdata('current_user');
        $this->user_model->delete_all_profile($id,$photo);
        $this->session->set_flashdata('info','Your main Profile has been successfully deleted');
        $log_id = $this->session->userdata('log_id');
        $this->common_model->update('tbl_user_logs', array('logout_time' => time()), array('SHA1(id)' => $log_id));
        
        $this->session->unset_userdata('current_user');
        $this->session->unset_userdata('care');
        $this->session->unset_userdata('log_id');
        $this->facebook->destroySession();
        redirect('/');
      }

      public function details($id_hash = ''){
        $this->breadcrumbs->push('Edit Personal Details', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/account');

        
        $data['title']          = 'Edit Personal Details';
        $data['main_content']   = 'frontend/user/account';
        $data['user_data']      = $this->user_model->getPersonalDetails($id_hash);
        //print_rr($data);
        
        $this->load->view(FRONTEND_TEMPLATE, $data);
      }

      public function membership(){
        $id  = check_user();
        $this->breadcrumbs->push('Membership', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        
        $data['title']          = 'My membership';
        $data['main_content']   = 'frontend/user/membership';
        $data['membership']     = $this->user_model->getMembership($id);
        $data['packages']        = $this->user_model->getPackages();
        $this->load->view(FRONTEND_TEMPLATE, $data);
      }

      public function getFeature(){
        if($this->input->is_ajax_request()){
            $pid = $this->input->post('pid',true);
            $features = $this->user_model->getFeaturesByPackageId($pid);
            echo json_encode($features);exit;
        }
      }

      public function paymenthistory(){
        $id = check_user();
        $this->breadcrumbs->push('Payment History', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $data = array(
            'title'        => 'Payment History',
            'main_content' => 'frontend/user/paymenthistory',
            'record'   => $this->payment_model->getPayDetailsByUserId($id),
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);
      }

      public function account($id_hash = '' ){
            if(isset($_POST['save'])){
                 if(isset($_POST['language'])){
                    $lang = join(',',$_POST['language']);
                 }
                 
                 if(isset($_POST['contact_number'])){
                    $number = '+1-'.$_POST['contact_number'];
                 }
                 
                        
                    $insert1 = array(
                        'marital_status' => isset($_POST['marital_status'])?$_POST['marital_status']:'',
                        'location' => isset($_POST['address_location'])?$_POST['address_location']:'',
                        'zip'      => isset($_POST['zip'])?$_POST['zip']:'',
                        'age'      =>  isset($_POST['age'])?$_POST['age']:'',
                        'gender'   => isset($_POST['gender'])?$_POST['gender']:'',
                        'city'      => isset($_POST['city'])?$_POST['city']:'',
                        'state'      =>  isset($_POST['state'])?$_POST['state']:'',
                        'country'   => isset($_POST['country'])?$_POST['country']:'',
                        'contact_number' => isset($number)?$number:'',
                        'caregiver_language'      => isset($lang)?$lang:'',
                        'caregiver_religious_observance'  => isset($_POST['religious_observance'])?$_POST['religious_observance']:'',
                        'familartojewish' => isset($_POST['familartojewish'])?$_POST['familartojewish']:'',
                        'neighbour' => isset($_POST['neighborhood'])?$_POST['neighborhood']:'',
                        'profile_picture' => isset($_POST['profile_picture'])?$_POST['profile_picture']:'',
                        'profile_picture_owner'=> isset($_POST['profile_picture_owner'])?$_POST['profile_picture_owner']:'',
                        'name_of_owner' => isset($_POST['name_of_owner'])?$_POST['name_of_owner']:'',
                        'educational_institution'     => isset($_POST['educational_instution'])?$_POST['educational_instution']:'',
                        'education_level' => isset($_POST['education'])?$_POST['education']:''
                    );

                    $insert2 = array(
                        'marital_status' => isset($_POST['marital_status'])?$_POST['marital_status']:'',                        
                        'smoker'        => isset($_POST['smoker'])?$_POST['smoker']:2,
                        'religious_observance'  => isset($_POST['religious_observance'])?$_POST['religious_observance']:'',
                        'sub_care' => isset($_POST['sub_care'])?$_POST['sub_care']:'',
                     );
                     
                      $response =  $this->common_model->getLongitudeAndLatitude($_POST['address_location']);
                        if($response){
                            $lat        = $response->results[0]->geometry->location->lat;
                            $long       = $response->results[0]->geometry->location->lng;
                            $country    = $response->results[0]->address_components[1]->long_name;
                        }else{
                            $lat   = 0;
                            $long   = 0;
                        }
               
                       $geodata = array(
                            'lat' => $lat,
                            'lng' => $long,
                            'country' => $country,
                        );
                
  
                        $id = check_user();
                       
                        $this->db->where('id',$id);
                        $q = $this->db->update('tbl_user',$insert1);
                        if($q){
                            $this->db->where('user_id', $id);
                            $this->db->update('tbl_userprofile',$insert2);
                            
                            $this->db->where('id', $id);
                            $this->db->update('tbl_user',$geodata);
                            
                            $this->session->set_flashdata('info', 'Personal detail updated successfully.');
                            redirect('user/dashboard','refresh');

                        }

                        redirect('user/details/'.$id_hash);                        

            }
      }
      
      public function job_or_profile(){
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
      public function delete_ref_file(){
        if(isset($_POST['file_name'])){
            $file = $_POST['file_name'];
            @unlink("./uploads/files/".$file);
        }
      }

      public function backgroundverification(){
        $this->breadcrumbs->push('My Backgroundcheck', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $id = check_user();

        $data = array(
            'main_content'      => 'frontend/user/backgroundcheck',
            'title'             => 'My Background Check', 
            'verificationdata'  => $this->user_model->getVerificationData($id),
         );

        $this->load->view(FRONTEND_TEMPLATE,$data);

      }
      public function get_this_care(){
        $x = $this->input->post('f1',true);
        $y = $this->input->post('f2',true);
        $type = $x==1?"Choose a Care Type":"Choose a Job Type";
        $data = $this->caretype_model->getCare($x,$y);        
        echo "<select id='all_cares'><option>".$type."</option>";
        foreach($data as $row){
            echo "<option value='".$row['id']."'>".$row['service_name']."</option>";
        }
        echo "</select>";
      }
}