<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ad extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!is_super()) {
            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
            redirect('admin/login');
        }
        $this->load->model('common_model');
        $this->load->model('user_model');
        $this->load->model('admin/ad_model');
        $this->load->model('caretype_model');
        $this->load->model('review_model');
        $this->load->model('refrence_model');
        $this->load->library('fileupload_lib');
        
                
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
    }

    function index(){
        $data['title'] = 'Ad Manager';
        $data['user_data']    = $this->ad_model->getAdDetails();
        //print_r($data['user_data']); exit;
        $data['main_content'] = 'admin/ad/ad_view';
        $this->load->view(BACKEND_TEMPLATE, $data);
    }

    function edit($id = ''){
        if(isset($_POST['add_user'])) {
                $this->ad_model->updatedetails($id);
                $this->session->set_flashdata('succes', 'Ad details updated successfully.');
                redirect('admin/ad','refresh');
        } else {

            $data['main_content'] = 'admin/ad/ad_edit';
            $data['detail']       = $this->ad_model->getAd($id);
            if($data['detail'][0]['organization_care'] != 0){
                $service_type = $data['detail'][0]['organization_care'];
            }else{
                $service_type = $data['detail'][0]['account_category'];
            }
            $data['care']         = $this->common_model->get_where('tbl_care', array('service_type' => $service_type), 'service_by ASC');
            $data['next']         = $this->common_model->getNextRecord('tbl_user',$data['detail'][0]['id']);
            $data['previous']     = $this->common_model->getPreviousRecord('tbl_user',$data['detail'][0]['id']);
            $data['title']        = 'Ad Manager';
            $data['pagetitle']    = 'Edit';

            $this->load->view(BACKEND_TEMPLATE, $data);
        }
    }


    function detail($id = ''){
        $id  = $this->uri->segment(4);
        if(isset($_POST['update'])){
            //var_dump($_POST);exit();
            if(isset($_POST['looking_to_work']))
                $looking_to_work = join(',',$_POST['looking_to_work']);

            if(isset($_POST['training']))
                $training = join(',',$_POST['training']);

            if(isset($_POST['availability']))
                $availability = join(',',$_POST['availability']);

            if(isset($_POST['willing_to_work']))
                $willing_to_work = join(',', $_POST['willing_to_work']);

            if(isset($_POST['subjects']))
                $subjects = join(',', $_POST['subjects']);

            if(isset($_POST['language']))
                $language = join(',', $_POST['language']);

            //if(isset($_POST['conditions_of_paitent']))
            //    $condition_of_patient = join(',',$_POST['conditions_of_paitent']);

            if(isset($_POST['optionalnumber']))
                 $optionalnumber = join(',',$_POST['optionalnumber']);

            if(isset($_POST['age_group']))
                $agegroup = join(',',$_POST['age_group']);
            if(isset($_POST['rate_type']))
                $rate_type = join(',',$_POST['rate_type']);
            $p = $_POST;
            $data = array(
                // 'account_category'      => $this->input->post('account_category',true),
                'looking_to_work'       => isset($looking_to_work)?$looking_to_work:'',
                'number_of_children'    => $this->input->post('number_of_children',true),
                'age_group'             => isset($agegroup)?$agegroup:'',
                'optional_number'        => isset($optionalnumber)?$optionalnumber:'',
                'experience'            => $this->input->post('experience',true),
                'training'              => isset($training)?$training:'',
                'hourly_rate'           => $this->input->post('hourly_rate',true),
                'availability'          => isset($availability)?$availability:'',
                'agree_bg_check'        => $this->input->post('bg_check',true),
                'driver_license'        => $this->input->post('driver_license',true),
                'vehicle'               => $this->input->post('vehicle',true),
                'pick_up_child'         => $this->input->post('pick_up_child',true),
                'cook'                  => $this->input->post('cook',true),
                'basic_housework'       => $this->input->post('basic_housework',true),
                'homework_help'         => $this->input->post('homework_help',true),
                'sick_child_care'       => $this->input->post('sick_child_care',true),
                'on_short_notice'       => $this->input->post('on_short_notice',true),
                'type_of_therapy'       => $this->input->post('type_of_therapy',true),
                'certification'         => $this->input->post('certification',true),
                'accept_insurance'      => $this->input->post('accept_insurance',true),
                'profile_description'   => $this->input->post('profile_description',true),
                'willing_to_work'       => isset($willing_to_work)?$willing_to_work:'',
                'subjects'              => isset($subjects)?$subjects:'',
                'number_of_staff'       => $this->input->post('number_of_staff',true),
                'wash'                  => $this->input->post('wash',true),
                'iron'                  => $this->input->post('iron',true),
                'fold'                  => $this->input->post('fold',true),
                'bath_children'         => $this->input->post('bath_children',true),
                'bed_children'          => $this->input->post('bed_children',true),
                'language'              => isset($language)?$language:'',
                'established'           => $this->input->post('established',true),
                'photo_of_child'        => $this->input->post('photo_of_child',true),
                'clean'                 => $this->input->post('clean',true),
                'religious_observance'  => $this->input->post('religious_observance',true),
                'smoker'                => $this->input->post('smoker',true),
                'conditions_of_patient' => $this->input->post('conditions_of_patient',true),
                'accept_insurance'      => $this->input->post('accept_insurance',true),
                'monthly_rate'          => $this->input->post('monthly_rate',true),
                'job_position'          => $this->input->post('job_postion',true),
                'organiztion_name'      => $this->input->post('organization_name',true),
                'organization_type'     => $this->input->post('organization_type',true),
                'start_date'            => $this->input->post('start_date',true),
                'updated_on'            => date('Y-m-d'),
                'updated_time'          =>strtotime('now'),
                'caregiverage_from'     => $this->input->post('agefrom',true),
                'caregiverage_to'       => $this->input->post('ageto',true),
                'rate'                  => $this->input->post('rate',true),
                'rate_type'             => isset($rate_type)?$rate_type:'',
                //'reference_file'        => $this->input->post('file',true),
                'number_of_rooms'       => $this->input->post('number_of_rooms'),
                'job_description'       => $this->input->post('job_description'),
                'flexible_hours'        => $this->input->post('flexible_hours'),
                'payment_option'        => isset($p['payment_option'])?$p['payment_option']:'',
                'days_from'             => isset($p['days_from'])?$p['days_from']:'',
                'days_to'               => isset($p['days_to'])?$p['days_to']:'',
                'hours_from'            => isset($p['hours_from'])?$p['hours_from']:'',
                'hours_to'              => isset($p['hours_to'])?$p['hours_to']:'',
                'mid_days_from'         => isset($p['mid_days_from'])?$p['mid_days_from']:'',
                'mid_days_to'           => isset($p['mid_days_to'])?$p['mid_days_to']:'',
                'friday_from'           => isset($p['friday_from'])?$p['friday_from']:'',
                'friday_to'             => isset($p['friday_to'])?$p['friday_to']:'',
                'vacation_days'         => isset($p['vacation_days'])?$p['vacation_days']:'',
                'pdf'                   => isset($p['pdf'])?$p['pdf']:'',
                'extended_hrs'          => isset($p['extended_hrs_available'])?$p['extended_hrs_available']:'',                
                'gender_of_caregiver'   => isset($p['gender_of_caregiver']) ? $p['gender_of_caregiver'] : 1,//No
                'licence_information'   => isset($p['licence_information'])?$p['licence_information']:'',
                'profile_status'        => 1,
                'personal_hygiene'      => isset($p['personal_hygiene'])?$p['personal_hygiene']:'',
                'references'            => isset($p['references']) ? $p['references'] : 2,
                'reference_file'        => isset($p['file'])?$p['file']:'',
                'sunday_from'           => isset($p['sunday_from'])?$p['sunday_from']:'',
            );

            $q = $this->ad_model->edit_advertisement($data,$id);
            if(isset($_POST['contact_number'])){
                $insert_user['contact_number'] = $_POST['contact_number']; 
            }
             if(isset($_POST['gender'])){
                $insert_user['gender'] = $_POST['gender']; 
            }
             if(isset($_POST['location'])){
                $insert_user['location'] = $_POST['location']; 
            }
             if(isset($_POST['name'])){
                $insert_user['name'] = $_POST['name']; 
            }
             if(isset($_POST['zip'])){
                $insert_user['zip'] = $_POST['zip']; 
            }
             if(isset($_POST['neighbour'])){
                $insert_user['neighbour'] = $_POST['neighbour']; 
            }
            if(!empty($insert_user))
                $p = $this->common_model->update('tbl_user',$insert_user,array('id'=>$_POST['user_id']));
            $this->session->flashdata('success', "Ad Upated Successfully");
            redirect('admin/ad/','refresh');
        }
        $data['main_content'] = 'admin/ad/details';
        $data['detail']       = $this->ad_model->getAllDetails($id);
        $data['care_type']    = $this->common_model->get_all('tbl_care','');
        $data['ad_form']      = $this->loadform($data['detail'][0]['care_type']);
        $data['title']        = 'Ad Manager';
        $data['pagetitle']    = 'Detail';
        $this->load->view(BACKEND_TEMPLATE,$data);
    }

    function delete(){
        $id = $this->uri->segment(4);
        if($id){
            $this->ad_model->delete($id);
            $this->session->set_flashdata('success', 'Advertisement successfully deleted.');
            redirect('admin/ad','refresh');
        }
    }


    function loadform($care_type){
        //echo $care_type;die();
            if($care_type == 1)
                return $view = 'admin/ad/forms/caregiver/babysitter';
            if($care_type == 2)
                return $view = 'admin/ad/forms/caregiver/nanny';
            if($care_type == 3)
                return $view = 'admin/ad/forms/caregiver/nursery';
            if($care_type == 4)
                return $view= 'admin/ad/forms/caregiver/tutor';
            if($care_type == 5)
                return $view = 'admin/ad/forms/caregiver/seniorcaregiver';
            if($care_type == 6)
                return $view = 'admin/ad/forms/caregiver/specailneedcaregiver';
            if($care_type == 7)
                return $view = 'admin/ad/forms/caregiver/therapist';
            if($care_type == 8)
                return $view = 'admin/ad/forms/caregiver/cleaning_household';
            if($care_type == 9)
                return $view = 'admin/ad/forms/caregiver/errand_runner';
            if($care_type == 10)
                return $view = 'admin/ad/forms/caregiver/daycarecenter';
            if($care_type == 11)
                return $view = 'admin/ad/forms/caregiver/daycamp';
            if($care_type == 12)
                return $view = 'admin/ad/forms/caregiver/afternoonactivities';
            if($care_type == 13)
                return $view = 'admin/ad/forms/caregiver/seniorcareagency';
            if($care_type == 14)
                return $view = ('admin/ad/forms/caregiver/specialneedcenter');
            if($care_type == 15) 
                return $view = 'admin/ad/forms/caregiver/cleaningcompany';
            if($care_type == 16) 
                return $view = 'admin/ad/forms/caregiver/nursinghome';
            if($care_type == 17) 
                return $view = 'admin/ad/forms/careseeker/babysitter';
            if($care_type == 18) 
                return $view = 'admin/ad/forms/careseeker/nanny';
            if($care_type == 19) 
                return $view = 'admin/ad/forms/careseeker/tutor';
            if($care_type == 20) 
                return $view = 'admin/ad/forms/careseeker/srcaregiver';
            if($care_type == 21) 
                return $view = 'admin/ad/forms/careseeker/errand_runner';
            if($care_type == 22) 
                return $view = 'admin/ad/forms/careseeker/specailneedcaregiver';
            if($care_type == 23) 
                return $view = 'admin/ad/forms/careseeker/therapist';
            if($care_type == 24) 
                return $view = 'admin/ad/forms/careseeker/cleaninghousehold';
            if($care_type == 25) 
                return $view = 'admin/ad/forms/careseeker/staffforchildcare';
            if($care_type == 26) 
                return $view = 'admin/ad/forms/careseeker/staffforchildcare';
            if($care_type == 27) 
                return $view = 'admin/ad/forms/careseeker/staffforchildcare';
            if($care_type == 28) 
                return $view = 'admin/ad/forms/careseeker/workerforcleaningcomapny';
    }

    public function hide($id = null){
            $this->db->where('id',$id);
            $this->db->update('tbl_user', array('status'=>2));

            $this->session->set_flashdata('success', 'Ad hidden Successfully');
            redirect('admin/ad','refresh');
    }

    public function changestatus()
    {
        if (!is_super()) {
            $this->session->set_flashdata('error', 'You do not have permissions to perform this action');
            redirect('login');
        }
        $task       = $this->uri->segment(4);
        $profile_id = $this->uri->segment(5);
        if($task == 'reject')
            $profile_status = 0;
        else
            $profile_status = 1;
        
         if($profile_id){
             $this->db->where('id',$profile_id);
             $this->db->update('tbl_userprofile',array('profile_status' =>$profile_status));
             $this->session->set_flashdata('info','Ad status updated successfully.');
             if ($task != 'reject') {
                $userProfile = get_userprofile($profile_id);
                $details = $this->user_model->getUserDetailsById($userProfile['user_id'], $userProfile['care_type']);
                $user = get_user($userProfile['user_id']);
                $sendto = $user['email'];
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
                 
                 
                 $this->sendSearchAlerts($profile_id);
             }
             
             redirect('admin/ad','refresh');
         }
         
    }
    
    public function sendSearchAlerts($id)
    {
        $details = $this->ad_model->getProfile($id);
        $alerts = $this->user_model->getSearchAlerts($details['lat'], $details['lng'], $details['care_type']);
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

        public function uploadfile(){
            $this->fileupload_lib->upload('files');
        }//CODE BY CHAND



}//Controller Close
