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
        $data['main_content']       = 'frontend/user/dashboard/main';
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
            $data['main_content'] = 'frontend/user/dashboard/my_account/edit';
            $data['user_data'] = $this->common_model->get_where('tbl_user', array('SHA1(id)' => $id_hash));
            $this->load->view(FRONTEND_TEMPLATE, $data);
        }
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

    public function delete_account($id_hash = '')
    {
        $id = check_user();

        $this->db->where('id',$id);
        $this->db->update('tbl_user',array('status'=>2));

       // $this->session->set_flashdata('success', 'Your account has been deleted.');
        redirect('user/dashboard/','refresh');
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
      
    public function uploadfile()
    {
        $this->fileupload_lib->upload('files');
    }//CODE BY CHAND

    public function uploadpdf()
    {
        $this->fileupload_lib->upload('files');
    }//CODE BY CHAND
      
      
    public function notifications()
    {
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
        $data['main_content'] = ('frontend/user/dashboard/my_notifications/base');
        $data['title']              = "My Notifications";
        if($this->input->is_ajax_request())
        {
            $this->load->view("frontend/user/dashboard/my_notifications/base",$data);
        }
        else{
            $this->load->view(FRONTEND_TEMPLATE,$data);
        }

    }//CODE BY CHAND
      
      
    public function ticket_detail_view($id)
    {
        $this->breadcrumbs->push('View', site_url().'#');
        $this->breadcrumbs->unshift('My Notification', base_url().'user/notifications');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $id                         = array('id'=>$id);
        $data['details']            = $this->user_model->get_ticket_detail($id);
        $data['main_content']       = "frontend/user/dashboard/my_notifications/ticket_detail_view";

        $this->load->view(FRONTEND_TEMPLATE,$data);
    }//CODE BY CHAND

    public function go_to_profile()
    {
        $uri = $this->uri->segment(3);
        $type = $this->uri->segment(4);
        redirect('caregivers/details/'.$uri.'/'.$type);
    }

    public function reviews()
    {
        $this->breadcrumbs->push('My Reviews', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
        $data = array(
            'title'         => 'View Review',
            'main_content'  => 'frontend/user/dashboard/my_reviews/base'
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
      
    public function profile()
    {
        $this->breadcrumbs->push('My Profile', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
        $user_id = array('id'=>$this->session->userdata('current_user'));
 
        //by kiran
        $data['userDetails'] = $this->user_model->getUserDetails($user_id['id']);
        $data['account_category'] = $this->user_model->get_account_category();
        $data['all_profile'] =$this->user_model->get_all_profile();
        $data['main_content'] = ('frontend/user/dashboard/my_profiles/base');

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
            'main_content'  => 'frontend/user/dashboard/my_payments/upgrade',
            'packagedata'   => $this->user_model->getPackages(),
            'userpackage'   => $this->user_model->getUserPackage($current_user)    
         );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }//CODE BY CHAND
      

        
    public function remove_profile_pic($id)
    {
        $this->db->where(array('id' => check_user()));
        $this->db->update('tbl_user', array('profile_picture' => ''));
    }
       
      public function searches()
      {
        $this->breadcrumbs->push('My Searches', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $current_user = $this->session->userdata['current_user'];

        $data = array(
            'title'         => 'Search History',
            'main_content'  => 'frontend/user/dashboard/my_search_alerts/base',
            'record'        => $this->user_model->getHistory($current_user)
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }
      
        public function add_alert()
        {
            $data = $this->getAlertParameters();
            $q = $this->db->insert('tbl_searchhistory',$data);
        }
        
        public function edit_search($id)
        {
            $user_id = check_user();
            $data = $this->getAlertParameters();
            $this->db->where(array('user_id' => $user_id, 'id' => $id));
            $this->db->update('tbl_searchhistory', $data);
        }
      
        private function getAlertParameters()
        {
            $user_id = check_user();
            $distance = $this->input->post('distance', true) == 'unlimited' ? 99999 : $this->input->post('distance', true);
            $profile = $this->common_model->get_where('tbl_userprofile', array('user_id' => $user_id));
            return array(
                'user_id'               => $user_id, 
                'gender_of_caregiver'   => $this->input->post('gender',true),
                'gender'                => $this->input->post('gender_of_careseeker',true),
                'start_date'            => $this->input->post('start_date',true),
                'smoker'                => $this->input->post('smoker',true),
                'language'              => $this->input->post('language',true),
                'min_exp'               => $this->input->post('min_exp',true),
                'number_of_children'    => $this->input->post('number_of_children',true),
                'observance'            => $this->input->post('observance',true),
                'training'              => $this->input->post('trainings',true),
                'morenum'               => $this->input->post('morenum',true),
                'age_group'             => $this->input->post('age_group',true),
                'looking_to_work'       => $this->input->post('looking_to_work',true),
                'willing_to_work'       => $this->input->post('willing_to_work',true),
                'availability'          => $this->input->post('availability',true),
                'driver_license'        => $this->input->post('driver_license',true),
                'vehicle'               => $this->input->post('vehicle',true),
                'pick_up_child'         => $this->input->post('pick_up_child',true),
                'sick_child_care'       => $this->input->post('sick_child_care',true),
                'cook'                  => $this->input->post('cook',true),
                'basic_housework'       => $this->input->post('basic_housework',true),
                'homework_help'         => $this->input->post('homework_help',true),
                'on_short_notice'       => $this->input->post('on_short_notice',true),
                'caregiverage_from'     => $this->input->post('caregiverage_from',true),
                'caregiverage_to'       => $this->input->post('caregiverage_to',true),
                'start_date'            => $this->input->post('start_date',true),
                'care_type'             => $this->input->post('care_type',true) > 0 ? $this->input->post('care_type',true) : 0,
                'lat'                   => $this->input->post('lat', true),
                'long'                  => $this->input->post('long', true),
                'location'              => $this->input->post('location', true),
                'distance'              => $distance,
                'createAlert'           => 1,
                'rate'                  => $this->input->post('rate', true),
                'subjects'              => $this->input->post('subject', true)
            ); 
        }
      
      public function add_new_alert($care_type = null)
        {
            $this->breadcrumbs->push('Create New', site_url().'#');
            $this->breadcrumbs->unshift('My Searches', site_url().'user/searches');
            $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
    
            $current_user = $this->session->userdata['current_user'];
            $record['care_type'] = $care_type;
    
            $data = array(
                'title'         => 'Search History',
                'main_content'  => 'frontend/user/dashboard/my_search_alerts/create',
                'user'          =>  $current_user,
                'record'        =>  $record
            );
    
            $this->load->view(FRONTEND_TEMPLATE,$data);
        }
      
        public function edit_alert($id, $caretype)
        {
            $this->breadcrumbs->push('My Searches', site_url().'#');
            $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
    
            $current_user = $this->session->userdata['current_user'];
            $record = $this->user_model->getAlert($current_user, $id)[0];
            $data = array(
                'title'         => 'Search History',
                'main_content'  => 'frontend/user/dashboard/my_search_alerts/edit',
                'record'        =>  $record
            );
    
            $this->load->view(FRONTEND_TEMPLATE,$data);
        }
      
    public function removealert($id)
    {
        $this->breadcrumbs->push('My Searches', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');
        $this->db->where('id',$id);
        $this->db->delete('tbl_searchhistory');
        $this->session->set_flashdata('info', 'Alert Cancelled Successfully');
        redirect('user/searches', 'refresh');
    }

    public function deleteticket($id = '')
    {
        $this->db->delete('tbl_tickets',array('id'=>$id));
        redirect('user/notifications');
        $this->session->flashdata('info','Ticket deleted successfully');
    }

    public function favorites()
    {
        $this->breadcrumbs->push('My Favorites', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $data = array(
            'main_content' => 'frontend/user/dashboard/my_favorites/base',
            'title'        => 'Favorites',
            'all_profile'       => $this->user_model->getMyFavorites(check_user())
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    public function unfavorite($id = '')
    {
        $this->db->delete('tbl_favorites',array('id'=>$id));
        $this->session->flashdata('info','Profile unfavorite successfully.');
        redirect('user/favorites','refresh');
    }


    public function upgradepackage()
    {
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
                'main_content'  => 'frontend/user/dashboard/my_payments/upgrade',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
      }
      
    public function pay()
    {
        $this->breadcrumbs->unshift('Pay', base_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $res = $this->user_model->getpackage_dtl();
        $this->session->set_userdata('package_name',$res[0]['package_name']);
        $this->session->set_userdata('package_amount',$res[0]['package_price']);
        $this->session->set_userdata('user_id',$user_id);
        $this->session->set_userdata('profile_id',$care_type);
        
        $data['main_content'] = 'frontend/user/dashboard/my_payments/pay';
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


    public function details($id_hash = ''){
        $this->breadcrumbs->push('Edit Personal Details', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/account');

        
        $data['title']          = 'Edit Personal Details';
        $data['main_content']   = 'frontend/user/dashboard/my_profiles/personal_details';
        $data['user_data']      = $this->user_model->getPersonalDetails($id_hash);
        // print_rr($data);
        
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

    public function membership()
    {
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
            'main_content' => 'frontend/user/dashboard/my_payments/history',
            'record'   => $this->payment_model->getPayDetailsByUserId($id),
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);
      }

    public function account($id_hash = '' )
    {  
        $id = check_user();
        $q = $this->user_model->edit_user($_POST, check_user());
        if($q){
            $this->db->where(array('id' => $id));
            $res = $this->db->get('tbl_user');
            $oldProfile = $res->result_array()[0];
            if ($insert1['profile_picture'] != '' && $oldProfile['profile_picture'] != $insert1['profile_picture']) {
                $this->db->where('id',$id);
                $this->db->update('tbl_user', array('profile_picture_status' => 0));
                $this->notifyNewImage($insert1['profile_photo']);
                $this->session->set_flashdata('info', 'Personal details updated successfully. Your new photo will show on the site as soon as it is approved by an admin');
            } else {
                $this->session->set_flashdata('info', 'Personal details updated successfully.');
            }
            redirect('user/profile','refresh');
        }
        redirect('user/details/'.$id_hash);                        
    }

    public function delete_ref_file(){
        if(isset($_POST['file_name'])){
            $file = $_POST['file_name'];
            @unlink("./uploads/files/".$file);
        }
    }

    public function backgroundverification()
    {
        $this->breadcrumbs->push('My Backgroundcheck', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $id = check_user();

        $data = array(
            'main_content'      => 'frontend/user/dashboard/my_background_check/base',
            'title'             => 'My Background Check', 
            'verificationdata'  => $this->user_model->getVerificationData($id),
         );

        $this->load->view(FRONTEND_TEMPLATE,$data);

    }
    
    public function get_this_care()
    {
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
      
    public function notifyNewImage()
    {
        $user_id = check_user();
        $user = get_user($user_id);

        $a = get_account_details();
        $id = $a->care_type;

        $msg = $this->load->view('frontend/email/newImage', array('details' => $user), true);
        
        $param = array(
            'subject'     => 'Profile Picture Updated',
            'from'        => SITE_EMAIL,
            'from_name'   => SITE_NAME,
            'replyto'     => SITE_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => SITE_EMAIL,
            'message'     => $msg
        );

        sendemail($param);
    }
    
    function approveImage($id, $hash)
    {
        $this->db->where(array('id' => $id, 'email_hash' => $hash));
        $res = $this->db->get('tbl_user');
        if ( count( $res->result_array() ) == 1) {
            $this->db->where('id', $id);
            $this->db->update('tbl_user', array('profile_picture_status' => 1));   
        }
        
        redirect('user/photo_approved','refresh');
    }
    
    function photo_approved()
    {
        $this->breadcrumbs->push('Success', '/help');
        $this->breadcrumbs->unshift('Home', base_url());

        $data = array(
            'main_content' => 'frontend/care/photo_approved_success',
            'title'        => 'Success',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
}