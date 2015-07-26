<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
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
        $this->load->model('review_model');
        $this->load->model('common_care_model');
        $this->load->model('email_template_model');
        $this->load->model('refrence_model');
    }

    function index(){
        $this->breadcrumbs->push('Ad Placement', '/help');
        $this->breadcrumbs->unshift('Home', base_url());

        $data = array(
            'main_content' => 'frontend/care/giver/caregiver_form',
            'title'        => 'Ad Placement',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);
    }


    // first step 
    function registeruser(){
            $exp                = $this->input->post('care_type',TRUE);  
            $temp               = explode('_',$exp);
            $care_type          = $temp[0];
            $account_type       = $temp[1];
            $password           = sha1($this->input->post('password',TRUE));
            $original_password  = $this->input->post('password',TRUE);
            $fname              = $this->input->post('name',TRUE);
            $email              = $this->input->post('email',TRUE);
            
            $uri = $this->seoUrl($fname);
            
            
            $data = array(
                    'uri'                   => $uri,
                    'password'              => sha1($password),
                    'original_password'     => $original_password,
                    'name'                  => $fname,
                    'email'                 => $email,
                    'email_hash'            => sha1($email),
                    'created_on'            => strtotime('now'),
                  
            );
            // save to database
            $this->db->insert('tbl_user', $data);
            $q = $this->db->insert_id();
            $new_data = array(
                            'user_id'           => $q,
                            'account_category'  => $_POST['account_category'],
                            'care_type'         => $care_type,
                            'created_time'      => strtotime('now'),
                            'organization_care' => isset($_POST['organization_care'])?$_POST['organization_care'] :0,
                            'profile_status'    => 0,    
                        );

            //print_r($new_data);exit;
            $this->db->insert('tbl_userprofile',$new_data);

                $cg_or_ck = array(
                    'user_id' =>$q,
                    'account_category' => $_POST['account_category'],
                    'organization_care' => isset($_POST['organization_care'])?$_POST['organization_care']:0
                );
                    $this->db->insert('tbl_account_category',$cg_or_ck);
                    $this->session->set_userdata('account_category',$_POST['account_category']);
                    $this->session->set_userdata('organization_care',$cg_or_ck['organization_care']);

                // send email confirmation from here
                $this->send_confirmation($email,$fname);
                  // send confirmation email 
                        $useradminemails = $this->common_model->getUserAdmiEmails();
                        if(is_array($useradminemails)){
                            foreach($useradminemails as $useradminemail):   
                                $useradmin[] =  $useradminemail['email1'];
                            endforeach;    
                        }
                        $subject = "User Registered, action required";
                        $message = $this->load->view('frontend/email/useradminapprovalemail',array('name'=>$fname,'email'=>$email,'hash'=>sha1($q),'account_type'=>$_POST['account_category'],'id'=>$q),true);
                        $this->common_model->sendemail($useradmin,$subject,$message);


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

                // send to next step 
                    if($this->session->userdata('account_category') == 1){
                        $category = 'caregiver';
                    }else{
                        $category = 'careseeker';
                    }

                   if($account_type == 1){
                        $type = 'individual';
                   }else{
                        $type = 'organization';
                   }
                redirect('ad/add_step2/'.$category.'/'.$type.'/'.$this->session->userdata('log_id'),'refresh');

    }

    function upload_pp($a){
        if ($a) {
            $file = $this->imageupload_lib->upload('profile-picture', 100, 300, true);
            $q = $this->common_model->update('tbl_user', ['profile_picture' => $file], array('id' => $a));
        }
        $this->imageupload_lib->upload('profile-picture', 100, 300);
    }

    function send_confirmation($to, $name)
    {
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

    function add_step2(){
        if($this->uri->segment(3) == 'caregiver' && $this->uri->segment(4) == 'individual')
            $view = 'frontend/care/giver/individual';

        if($this->uri->segment(3) == 'caregiver' && $this->uri->segment(4) == 'organization')
            $view = 'frontend/care/giver/organization';


        if($this->uri->segment(3) == 'organization')
            $view = 'frontend/care/giver/organization';            



        if($this->uri->segment(3) == 'careseeker' && $this->uri->segment(4) == 'individual')
          $view = $this->careseeker();
        if($this->uri->segment(3) == 'careseeker' && $this->uri->segment(4) == 'organization')
            $view = $this->careseeker();

        $data = array(
            'main_content' => $view,
            'title'       => 'Ad Placement Step 2',
         );

        $this->load->view(FRONTEND_TEMPLATE, $data);
    }


    public function registeruserdetails(){               
        if($_POST) {
             $p = $_POST;
             $language = '';
             if(isset($p['language'])) {
                 $language = join(',', $p['language']);
             }
             
             $contact_number = isset($p['contact_number'])? $p['contact_number'] : '';
             $numberwithcountrycode = '+1-'.$contact_number;

            
             $insert = array(
                 'marital_status'           => isset($p['marital_status'])? $p['marital_status'] : '',                
                 'smoker'                   => isset($p['smoker']) ? $p['smoker'] : 2,
                 'religious_observance'     => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                 'shul_membership'          => isset($p['shul_membership']) ? $p['shul_membership'] : '',
                 'subjects'                 => isset($p['major_subject'])?$p['major_subject']:'',
                 'language'                 => $language
                 
             );

             $insert_new = array(
                'age'                   => isset($p['age'])? $p['age'] : '',
                'caregiver_religious_observance'     => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                'caregiver_language' => $language,
                'gender'                => isset($p['gender'])? $p['gender'] : '',
                'contact_number'        => $numberwithcountrycode, 
                'profile_picture'       => isset($p['profile_picture']) ? $p['profile_picture'] : '',
                'city'                  => isset($p['city']) ? $p['city'] : '',                
                'zip'                   => isset($p['zip'])?$p['zip']:'',
                'location'              => isset($p['location'])?$p['location']:'',
                'lat'                   => isset($p['lat'])?$p['lat']:'',
                'lng'                   => isset($p['lng'])?$p['lng']:'',
                'neighbour'             => isset($p['neighbour'])?$p['neighbour']:'',
                'name_of_owner'         => isset($p['name_of_owner'])?$p['name_of_owner']:'',
                'profile_picture_owner' => isset($p['profile_picture_owner'])?$p['profile_picture_owner']:'',
                'smoke'                 => isset($p['smoker']) ? $p['smoker'] : 2,
                'hasAd'                 => 1,   
                'familartojewish'      => isset($p['familartojewish']) ? $p['familartojewish'] : 0,
                'education_level'          => isset($p['education_level']) ? $p['education_level'] : '',
                'educational_institution'  => isset($p['educational_institution']) ? $p['educational_institution'] : '',
             );
            /*
                 $response =  $this->getLongitudeAndLatitude($p['location']);
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
             }*/
              
             if(check_user()) {
               //$q = $this->common_model->update('tbl_user', $geodata, array('id' => check_user()));
               $q = $this->common_model->update('tbl_user', $insert_new, array('id' => check_user()));
               $q =  $this->common_model->update('tbl_userprofile', $insert, array('user_id' => check_user()));
             } 


             if($p['account_category'] == 1)
                    $category = "caregiver";
                else 
                    $category = "careseeker";

            if($p['account_type'] == 1)
                   $type = "individual";
                else
                    $type = "organization";

                if($q){
                    redirect('ad/add_step3/'.$category.'/'.$type.'/'.$this->session->userdata('log_id').'/job-details/'.$this->session->userdata('log_id'));
                }              
        }
    }

    // caregiver save job details
    function add_step3(){
       if(check_user()){
        $a = get_account_details();
        //print_rr($a);
        $id = $a->care_type;
        // babysitter
        if($id == 1){
            $data['main_content'] = 'frontend/care/giver/babysitter_form';
        }
        if($id == 2){
            $data['main_content'] = 'frontend/care/giver/nanny_form';
        }
        if($id == 3){
            $data['main_content'] = 'frontend/care/giver/nursery_form';
        }
        if($id == 4){
            $data['main_content'] = 'frontend/care/giver/tutor_form';
        }
        if($id == 5){
            $data['main_content'] = 'frontend/care/giver/senior_form';
        }
        if($id == 6){
            $data['main_content'] = 'frontend/care/giver/specialneeds_form';
        }
        if($id == 7){
            $data['main_content'] = 'frontend/care/giver/therapist_form';
        }
        if($id == 8){
            $data['main_content'] = 'frontend/care/giver/cleaning_form';
        }
        if($id == 9){
            $data['main_content'] = 'frontend/care/giver/errand_form';
        }
        if($id == 10){
            $data['main_content'] = 'frontend/care/giver/daycarecenter_form';
        }
        // if($id == 11){
        //     $data['main_content'] = 'frontend/care/giver/daycarecenter_form';
        // }
        // if($id == 12){
        //     $data['main_content'] = 'frontend/care/giver/daycarecenter_form';
        // }
        if($id == 13){
            $data['main_content'] = 'frontend/care/giver/seniorcareagency_form';
        }
        if($id == 14){
            $data['main_content'] = 'frontend/care/giver/specialneedscenter_form';
        }
        if($id == 15){
            $data['main_content'] = 'frontend/care/giver/cleaningcompany_form';
        }
        if($id == 16){
            $data['main_content'] = 'frontend/care/giver/seniorcarecenter_form';  
        }
        if($id == 17)
            $data['main_content'] = 'frontend/care/seeker/babysitter_form';
        if($id == 18)
             $data['main_content'] = 'frontend/care/seeker/nanny_form';
        if($id == 19)
             $data['main_content'] = 'frontend/care/seeker/tutor_form';
        if($id == 20)
             $data['main_content'] = 'frontend/care/seeker/senior_form';
        if($id == 21)
             $data['main_content'] = 'frontend/care/seeker/errand_form';
        if($id == 22)
            $data['main_content'] = 'frontend/care/seeker/specailneedcareseeker';
        if($id == 23)
             $data['main_content'] = 'frontend/care/seeker/therapist_form';
        if($id == 24)
             $data['main_content'] = 'frontend/care/seeker/cleaning_form';
        if($id == 25)
             $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
        if($id == 26)
             $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
         if($id == 27)
             $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
        if($id == 28)
             $data['main_content'] = 'frontend/care/seeker/cleaningcompany_form';
        $data['title']  = 'Ad Placement Step 3';

        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
}


    function savejobdetails(){
        if($_POST) {
            $p = $_POST;
            $language = false;
            $looking_to_work = '';
            $willing_to_work = '';
            $training = '';
            $availability = '';
            $subjects = '';
            $age_group = '';
            if(isset($p['subjects'])) {
                $subjects = join(',', $p['subjects']);
            }
            if(isset($p['language[]'])) {
                $language = join(',', $p['language[]']);
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
            if(isset($p['age_group'])){
                $age_group = join(',',$p['age_group']);
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
                'subjects'              => $subjects,
                'language'              => $language,
                'looking_to_work'       => $looking_to_work,
                'willing_to_work'       => $willing_to_work,
                'type_of_therapy'       => isset($p['type_of_therapy']) ? $p['type_of_therapy'] : '',
                'licence_information'   => isset($p['licence_information']) ? $p['licence_information'] : '',
                'accept_insurance'      => isset($p['accept_insurance']) ? $p['accept_insurance'] : 2,
                'established'           => isset($p['established']) ? $p['established'] : '',
                'certification'         => isset($p['certification']) ? $p['certification'] : '',
                'number_of_children'    => isset($p['number_of_children']) ? $p['number_of_children'] : '',
                'number_of_staff'       => isset($p['number_of_staff']) ? $p['number_of_staff'] : '',
                'sub_care'              => isset($p['sub_care']) ? $p['sub_care'] : '',
                'age_group'             => $age_group,
                'experience' => isset($p['experience']) ? $p['experience'] : '',
                'training' => $training,
                'hourly_rate' => isset($p['hourly_rate']) ? $p['hourly_rate'] : '',
                'availability' => $availability,
                'profile_description' => isset($p['profile_description']) ? $p['profile_description'] : '',
                'religious_observance' => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                'agree_bg_check' => isset($p['bg_check'])? $p['bg_check'] : '',
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
                'references' => isset($p['references']) ? $p['references'] : 0,
                'photo_of_child' => isset($p['photo_of_child']) ? $p['photo_of_child'] : 0,
                'start_date'     => isset($p['start_date'])?$p['start_date']:'',
                'optional_number'=> isset($optional_number)?$optional_number:'',
                'monthly_rate'    => isset($p['monthly_rate'])?$p['monthly_rate']:'',
                'reference_file'  => isset($p['file'])?$p['file']:'',
                'rate_type'       => isset($rate_type)?$rate_type:'',
                'extra_field'       => isset($extra_field) ? $extra_field : '',
                'sub_care'                 => isset($p['sub_care']) ? $p['sub_care'] : '',
                // added on 28 dec 2014 by santosh
                'created_time'  => strtotime('now'),
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
                'extra_field'       => isset($extra_field) ? $extra_field : '',
                'subjects' => $subjects,
                'language' => $language,
                'looking_to_work' => $looking_to_work,
                'organiztion_name' => isset($p['organization_name'])? $p['organization_name'] : '',
                'organization_type' => isset($p['organization_type'])? $p['organization_type'] : '',
                'job_position' => isset($p['job_position'])? $p['job_position'] : '',
                'willing_to_work' => isset($willing_to_work)? $willing_to_work : '',
                'type_of_therapy' => isset($p['type_of_therapy']) ? $p['type_of_therapy'] : '',
                'licence_information' => isset($p['licence_information']) ? $p['licence_information'] : '',
                'accept_insurance' => isset($p['accept_insurance']) ? $p['accept_insurance'] : 2,
                'established' => isset($p['established']) ? $p['established'] : '',
                'certification' => isset($p['certification']) ? $p['certification'] : '',
                'number_of_children' => isset($p['number_of_children']) ? $p['number_of_children'] : '',
                'number_of_staff' => isset($p['number_of_staff']) ? $p['number_of_staff'] : '',
                'number_of_rooms' => isset($p['number_of_rooms']) ? $p['number_of_rooms'] : '',
                'age_group' => $age_group,
                'experience' => isset($p['experience']) ? $p['experience'] : '',
                'training' => $training,
                'hourly_rate' => isset($p['hourly_rate']) ? $p['hourly_rate'] : '',
                'rate' => isset($p['rate']) ? $p['rate'] : '',
                'monthly_rate' => isset($p['monthly_rate']) ? $p['monthly_rate'] : '',
                'availability' => $availability,
                'religious_observance' => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                'profile_description' => isset($p['profile_description']) ? $p['profile_description'] : '',
                'references' => isset($p['references']) ? $p['references'] : 2,
                'references_details' => isset($p['references_details']) ? $p['references_details'] : '',
                'agree_bg_check' => isset($p['agree_bg_check'])? $p['agree_bg_check'] : '',
                'sunday_from' => isset($p['sunday_from']) ? $p['sunday_from'] : '',
                'sunday_to' => isset($p['sunday_to']) ? $p['sunday_to'] : '',
                'mid_days_from' => isset($p['mid_days_from']) ? $p['mid_days_from'] : '',
                'mid_days_to' => isset($p['mid_days_to']) ? $p['mid_days_to'] : '',
                'friday_from' => isset($p['friday_from']) ? $p['friday_from'] : '',
                'friday_to' => isset($p['friday_to']) ? $p['friday_to'] : '',
                'personal_hygiene' => isset($p['personal_hygiene']) ? $p['personal_hygiene'] : '',
                'caregiverage_from' => isset($p['caregiverage_from']) ? $p['caregiverage_from'] : '',
                'caregiverage_to' => isset($p['caregiverage_to']) ? $p['caregiverage_to'] : '',
                'smoker' => isset($p['smoker']) ? $p['smoker'] : 2,
                'gender_of_caregiver' => isset($p['gender_of_caregiver']) ? $p['gender_of_caregiver'] : '',
                'gender_of_careseeker' => isset($p['gender_of_careseeker']) ? $p['gender_of_careseeker'] : '',
                'driver_license' => isset($p['driver_license']) ? 1 : 0,
                'vehicle' => isset($p['vehicle']) ? 1 : 0,
                'pick_up_child' => isset($p['pick_up_child']) ? 1 : 0,
                'sub_care'              => isset($p['sub_care']) ? $p['sub_care'] : '',
                'cook' => isset($p['cook']) ? 1 : 0,
                'basic_housework' => isset($p['basic_housework']) ? 1 : 0,
                'sick_child_care' => isset($p['sick_child_care']) ? 1 : 0,
                'homework_help' => isset($p['homework_help']) ? 1 : 0,   
                'on_short_notice' => isset($p['on_short_notice']) ? 1 : 0,
                'wash' => isset($p['wash']) ? 1 : 0,
                'iron' => isset($p['iron']) ? 1 : 0,
                'fold' => isset($p['fold']) ? 1 : 0,
                'bath_children' => isset($p['bath_children']) ? 1 : 0,
                'bed_children' => isset($p['bed_children']) ? 1 : 0,
                'optional_number'   => isset($optional_number)?$optional_number:'',
                'rate_type'   => isset($rate_type)?$rate_type:'',
                'contact_name'  => isset($p['name']) ? $p['name'] : ''

            );
            
            $insert_new = array(
            'hasAd'                 => 1,
            );
            if(check_user()) {
                $q = $this->common_model->update('tbl_user', $insert_new, array('id' => check_user()));
               $q = $this->common_model->update('tbl_userprofile', $insert, array('user_id' => check_user()));
            }
            if($q){
                $facility_picture  = isset($p['facility_pic']) ? $p['facility_pic'] : '';
                $this->common_model->update('tbl_userprofile', array('facility_pic'=>$facility_picture), array('id'=>check_user()));
                $this->session->set_flashdata('info', 'Ad posted successfully. Your ad will be placed on the site after being approved by our team.');
                //user notification
                $this->notifyUser();

                //email sent to admin for approval
                $this->approveAds();
                redirect('user/dashboard');
            }
            else{
                $this->session->set_flashdata('info', 'Error: Ad could not be posted at this moment');
                redirect('user/dashboard');    
            }
        }
    }

    public function notifyUser(){
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
            'replyto'     => SITE_REPLY_TO_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => $sendto,
            'message'     => $msg
        );
        sendemail($param);
    }

    public function approveAd($id)
    {
        $user_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);
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
            'replyto'     => SITE_REPLY_TO_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => $sendto,
            'message'     => $msg
        );
        sendemail($param);

        $this->sendSearchAlert($details, $type);

        redirect('ad/success','refresh');

    }

    public function sendSearchAlert($details)
    {
        
        $alerts = $this->user_model->getSearchAlerts($details['latitude'], $details['longitude'], $type);
        foreach ($alerts as $alert) {
            if ($alert['distance'] < $alert['dist']) {
                break 1;
            }
            $id = $alert['user_id'];
            $email = $this->user_model->getUserName($id)['email'];
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
            $data['care_id']        = $details['id'];
            
            $msg = $this->load->view('frontend/email/searchAlert', $data, true);
            
            $param = array(
                'subject'     => 'A new profile has been added in Frumcare.com that matches your search',
                'from'        => SITE_EMAIL,
                'from_name'   => SITE_NAME,
                'replyto'     => SITE_REPLY_TO_EMAIL,
                'replytoname' => SITE_NAME,
                'sendto'      => $email,
                'message'     => $msg
            );
            sendemail($param);
        }
    }
    
    public function approveAds()
    {
        $user_id=check_user();
        $user=get_user($user_id);


        /***************** get super user email ***********************/
        $this->load->model('user_model');
        $superUser=$this->user_model->getSuperUser();


        $a = get_account_details();
        //print_rr($a);
        $id = $a->care_type;

        /********************* get user profile of the current user ******************/

        $emails = $this->common_model->getAdAdminEmails();                    
        $receiveremail = '';                    
        foreach($emails as $e1){
            $receiveremail .= $e1['email1'].',';                        
        }
        $receiveremail = substr_replace($receiveremail ,"",-1);
        
        $details      = $this->user_model->getUserDetailsById($user_id,$id);
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
            'replyto'     => SITE_REPLY_TO_EMAIL,
            'replytoname' => SITE_NAME,
            'sendto'      => $receiveremail,
            'message'     => $msg
        );
        sendemail($param);

    }

  
    // function add_careseeker_step1()
    // {
    //     if($_POST) {
    //         $p = $_POST;
    //         $uri = $this->common_model->create_slug($p['first_name'],false,$p['last_name']);
    //         $exp = explode('_', $p['care_type']);
    //         $care_type = $exp[0]; 
    //         $account_type = $exp[1]; 

    //         $insert = array(
    //             'first_name'        => $p['first_name'],
    //             'last_name'         => $p['last_name'],
    //             'email'             => $p['email'],
    //             'email_hash'        => sha1($p['email']),
    //             'account_category'  => $p['account_category'],
    //             'account_type'      => $account_type,
    //             'care_type'         => $care_type,
    //             'uri'               => $uri,
    //             'password'          => sha1($p['password']),
    //             'original_password' => $p['password']
    //         );
            
    //         if(check_user()) {
    //             $q = $this->common_model->update('tbl_user', $insert, array('id' => check_user()), true);
    //         } else {
    //             $q = $this->common_model->insert('tbl_user', $insert, true);

    //             $this->send_confirmation($p['email'], ucfirst($p['first_name']));
    //             $user_data = getBrowser();
    //             $log = array(
    //                 'user_id' => $q,
    //                 'login_time' => time(),
    //                 'login_browser' => $user_data['name'].' '.$user_data['version'],
    //                 'login_os' => $user_data['platform'],
    //                 'login_ip' => $_SERVER['REMOTE_ADDR']
    //             );
    //             $log_id = $this->common_model->insert('tbl_user_logs', $log, true);
    //             $log_id = sha1($log_id);
    //             $sess = array(
    //                 'current_user' => $q,
    //                 'log_id' => $log_id
    //             );
    //             $this->session->sess_expiration = '14400';
    //             $this->session->set_userdata($sess);
    //         }
            
    //         if(check_user()) {
    //             $q = $this->common_model->update('tbl_user', $insert, array('id' => check_user()));
    //         } 

    //         if($q){
    //             redirect('ad/careseeker/job-details-'.$this->session->userdata('log_id'));
    //         }    
    //     }
    // }

    public function careseeker(){
        if(check_user()){
            $a = get_account_details();
            $id = $a->care_type;
            if($id == 10){
              return $data['main_content'] = 'frontend/care/giver/daycarecenter_form';
            }
            if($id == 13){
              return  $data['main_content'] = 'frontend/care/giver/seniorcareagency_form';
            }
            if($id == 14){
              return  $data['main_content'] = 'frontend/care/giver/specialneedscenter_form';
            }
            if($id == 15){
               return $data['main_content'] = 'frontend/care/giver/cleaningcompany_form';
            }
            if($id == 16){
              return  $data['main_content'] = 'frontend/care/giver/seniorcarecenter_form';  
            }

            if($id == 17)
                return $data['main_content'] = 'frontend/care/seeker/babysitter_form';
            if($id == 18)
                return $data['main_content'] = 'frontend/care/seeker/nanny_form';
            if($id == 19)
                return $data['main_content'] = 'frontend/care/seeker/tutor_form';
            if($id == 20)
                return $data['main_content'] = 'frontend/care/seeker/senior_form';
            if($id == 21)
                return $data['main_content'] = 'frontend/care/seeker/errand_form';
            if($id == 22)
               return $data['main_content'] = 'frontend/care/seeker/specailneedcareseeker_form';
            if($id == 23)
                return $data['main_content'] = 'frontend/care/seeker/therapist_form';
            if($id == 24)
                return $data['main_content'] = 'frontend/care/seeker/cleaning_form';
            if($id == 25)
                return $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
            if($id == 26)
                return $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
             if($id == 27)
                return $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
            if($id == 28)
                return $data['main_content'] = 'frontend/care/seeker/cleaningcompany_form';
        }
    }

    function add_careseeker_step2(){
        if($_POST) {
            $p = $_POST;
            $language = false;
            $looking_to_work = '';
            $wiling_to_work = '';
            $training = '';
            $availability = '';
            $subjects = '';
            $conditions = '';
            $age_group = '';
            if(isset($p['conditions_of_patient'])) {
                $conditions = join(',', $p['conditions_of_patient']);
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

            if(isset($p['age_group'])){
                $age_group = join(',',$p['age_group']);
            }
            if(isset($p['optional_number'])){
                $optional_number = join(',',$p['optional_number']);
            }

            if(isset($p['rate_type'])){
                $rate_type = join(',',$p['rate_type']);
            }

            $insert = array(
                'subjects'              => $subjects,
                'language'              => $language,
                'looking_to_work'       => $looking_to_work,
                'willing_to_work'       => $willing_to_work,
                'type_of_therapy'       => isset($p['type_of_therapy']) ? $p['type_of_therapy'] : '',
                'licence_information'   => isset($p['licence_information']) ? $p['licence_information'] : '',
                'accept_insurance'      => isset($p['accept_insurance']) ? $p['accept_insurance'] : 2,
                'established'           => isset($p['established']) ? $p['established'] : '',
                'certification'         => isset($p['certification']) ? $p['certification'] : '',
                'number_of_children'    => isset($p['number_of_children']) ? $p['number_of_children'] : '',
                'number_of_staff'       => isset($p['number_of_staff']) ? $p['number_of_staff'] : '',
                'age_group'             => $age_group,
                'experience' => isset($p['experience']) ? $p['experience'] : '',
                'training' => $training,
                'hourly_rate' => isset($p['hourly_rate']) ? $p['hourly_rate'] : '',
                'availability' => $availability,
                'profile_description' => isset($p['profile_description']) ? $p['profile_description'] : '',
                'religious_observance' => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                'agree_bg_check' => isset($p['bg_check'])? $p['bg_check'] : '',
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
                'references' => isset($p['references']) ? $p['references'] : 0,
                'photo_of_child' => isset($p['photo_of_child']) ? $p['photo_of_child'] : 0,
                'start_date'     => isset($p['start_date'])?$p['start_date']:'',
                'optional_number'=> isset($optional_number)?$optional_number:'',
                'monthly_rate'    => isset($p['monthly_rate'])?$p['monthly_rate']:'',
                'reference_file'  => isset($p['file'])?$p['file']:'',
                'rate_type'       => isset($rate_type)?$rate_type:'',
                'extra_field'       => isset($extra_field) ? $extra_field : '',
                'sub_care'                 => isset($p['sub_care']) ? $p['sub_care'] : '',
                // added on 28 dec 2014 by santosh
                'created_time'  => strtotime('now'),
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
                'extra_field'       => isset($extra_field) ? $extra_field : '',
                'conditions_of_patient' => $conditions,
                'subjects' => $subjects,
                'language' => $language,
                'looking_to_work' => $looking_to_work,
                'organiztion_name' => isset($p['organization_name'])? $p['organization_name'] : '',
                'organization_type' => isset($p['organization_type'])? $p['organization_type'] : '',
                'job_position' => isset($p['job_position'])? $p['job_position'] : '',
                'willing_to_work' => isset($willing_to_work)? $willing_to_work : '',
                'type_of_therapy' => isset($p['type_of_therapy']) ? $p['type_of_therapy'] : '',
                'licence_information' => isset($p['licence_information']) ? $p['licence_information'] : '',
                'accept_insurance' => isset($p['accept_insurance']) ? $p['accept_insurance'] : 2,
                'established' => isset($p['established']) ? $p['established'] : '',
                'certification' => isset($p['certification']) ? $p['certification'] : '',
                'number_of_children' => isset($p['number_of_children']) ? $p['number_of_children'] : '',
                'number_of_staff' => isset($p['number_of_staff']) ? $p['number_of_staff'] : '',
                'number_of_rooms' => isset($p['number_of_rooms']) ? $p['number_of_rooms'] : '',
                'age_group' => $age_group,
                'experience' => isset($p['experience']) ? $p['experience'] : '',
                'training' => $training,
                'hourly_rate' => isset($p['hourly_rate']) ? $p['hourly_rate'] : '',
                'rate' => isset($p['rate']) ? $p['rate'] : '',
                'monthly_rate' => isset($p['monthly_rate']) ? $p['monthly_rate'] : '',
                'availability' => $availability,
                'religious_observance' => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                'profile_description' => isset($p['profile_description']) ? $p['profile_description'] : '',
                'references' => isset($p['references']) ? $p['references'] : 2,
                'references_details' => isset($p['references_details']) ? $p['references_details'] : '',
                'agree_bg_check' => isset($p['agree_bg_check'])? $p['agree_bg_check'] : '',
                'sunday_from' => isset($p['sunday_from']) ? $p['sunday_from'] : '',
                'sunday_to' => isset($p['sunday_to']) ? $p['sunday_to'] : '',
                'mid_days_from' => isset($p['mid_days_from']) ? $p['mid_days_from'] : '',
                'mid_days_to' => isset($p['mid_days_to']) ? $p['mid_days_to'] : '',
                'friday_from' => isset($p['friday_from']) ? $p['friday_from'] : '',
                'friday_to' => isset($p['friday_to']) ? $p['friday_to'] : '',
                'personal_hygiene' => isset($p['personal_hygiene']) ? $p['personal_hygiene'] : '',
                'smoker' => isset($p['smoker']) ? $p['smoker'] : 2,
                'gender_of_caregiver' => isset($p['gender_of_caregiver']) ? $p['gender_of_caregiver'] : '',
                'gender_of_careseeker' => isset($p['gender_of_careseeker']) ? $p['gender_of_careseeker'] : '',
                'driver_license' => isset($p['driver_license']) ? 1 : 0,
                'vehicle' => isset($p['vehicle']) ? 1 : 0,
                'pick_up_child' => isset($p['pick_up_child']) ? 1 : 0,
                'cook' => isset($p['cook']) ? 1 : 0,
                'basic_housework' => isset($p['basic_housework']) ? 1 : 0,
                'sick_child_care' => isset($p['sick_child_care']) ? 1 : 0,
                'homework_help' => isset($p['homework_help']) ? 1 : 0,   
                'on_short_notice' => isset($p['on_short_notice']) ? 1 : 0,
                'wash' => isset($p['wash']) ? 1 : 0,
                'iron' => isset($p['iron']) ? 1 : 0,
                'fold' => isset($p['fold']) ? 1 : 0,
                'bath_children' => isset($p['bath_children']) ? 1 : 0,
                'caregiverage_from' => isset($p['caregiverage_from']) ? $p['caregiverage_from'] : '',
                'caregiverage_to' => isset($p['caregiverage_to']) ? $p['caregiverage_to'] : '',
                'bed_children' => isset($p['bed_children']) ? 1 : 0,
                'optional_number'   => isset($optional_number)?$optional_number:'',
                'rate_type'   => isset($rate_type)?$rate_type:'',
                'contact_name' => isset($p['name']) ? $p['name'] : '',
            );
            $insert_new = array(
                            'location' => isset($p['location'])? $p['location'] : '',
                            'contact_number' => isset($p['contact_number'])? $p['contact_number'] : '',
                            'age' => isset($p['age'])? $p['age'] : '',
                            'gender' => isset($p['gender'])? $p['gender'] : '',
                            'familartojewish' => isset($p['familarwithjewish'])?$p['familarwithjewish']:'',
                            'zip'               => isset($p['zip'])?$p['zip']:'',
                            'neighbour'         => isset($p['neighbour'])?$p['neighbour']:'',
                            'caregiver_religious_observance' => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                            'smoke' => isset($p['smoker']) ? $p['smoker'] : 2,
                            'hasAd'    => 1,
                            );
            if(isset($p['name'])){
                $uri = $this->common_model->create_slug($p['name']);
                //$insert['uri'] = $p['uri'];
                $insert_new['name'] = $p['name'];
                $insert_new['uri'] = $uri;
                $insert['contact_name'] = $p['name'];
            }

               $response =  $this->getLongitudeAndLatitude($p['location']);
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
                //insert location for profile as well
                $geodata1 = array(
                    'latitude' => $lat,
                    'longitude' => $long,
                );
            if(check_user()) {
               $q = $this->common_model->update('tbl_userprofile', $insert, array('user_id' => check_user()));
               $q = $this->common_model->update('tbl_userprofile', $geodata1, array('user_id' => check_user(), ));
               $q = $this->common_model->update('tbl_user', $geodata, array('id' => check_user()));
               $q = $this->common_model->update('tbl_user', $insert_new, array('id' => check_user())); //by kiran
            }
            if($q){
                $this->notifyUser();
                $this->approveAds();

                $this->session->set_flashdata('success', 'Ad posted successfully. Your ad will be placed on the site after being approved by our team.');
                redirect('user/dashboard');
            }
            else{
                $this->session->set_flashdata('fail', 'Error: Ad could not be posted at this moment');
                redirect('user/dashboard');    
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

    function getCareType(){
        if($this->input->is_ajax_request()){
            $cid         = $this->input->post('care_type');
            $serviceby   = $this->input->post('service_by');
            $care_type   = $this->common_model->get_care($cid,$serviceby);
            $data        = $this->load->view('frontend/care/care_options',array('care_type'=>$care_type),true);
            echo json_encode($data);
            exit();
            
        }
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

    public function approve(){
        $user_id = $this->uri->segment(3);
        $profile_id = $this->uri->segment(4);

        $this->db->where('id',$profile_id);
        $this->db->update('tbl_userprofile',array('profile_status'=>1));

        redirect('ad/success','refresh');

    }

   public function success(){

        $this->breadcrumbs->push('Success', '/help');
        $this->breadcrumbs->unshift('Home', base_url());

        $data = array(
            'main_content' => 'frontend/care/success',
            'title'        => 'Success',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);

    }
    public function job(){
        $id = $this->uri->segment(4);
        if(!is_numeric($id)) die('404 error <br> Page not found');
        if($id == 25)
            $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
        elseif($id == 26)
            $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
        elseif($id == 27)
            $data['main_content'] = 'frontend/care/seeker/childcare_seniorcare_specialneeds_facilities_form';
        elseif($id == 28)
            $data['main_content'] = 'frontend/care/seeker/cleaningcompany_form';
        else
           die('404 error <br> Page not found');
        $data['title'] = 'Job Organizations';
        $this->load->view(FRONTEND_TEMPLATE,$data); 
        
    }
}