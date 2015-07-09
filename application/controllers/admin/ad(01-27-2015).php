<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ad extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_username')) {
            redirect('admin/login');
        }
        $this->load->model('common_model');
        $this->load->model('admin/ad_model');
    }

    function index()
    {
        $data['title'] = 'Ad Manager';
      //  $data['user_data'] = $this->common_model->get_all('tbl_userprofile');
        $data['user_data']    = $this->ad_model->getAdDetails();   
        $data['main_content'] = 'admin/ad/ad_view';
        $this->load->view(BACKEND_TEMPLATE, $data);
    }

    function edit($id = '')
    {
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

            if(isset($_POST['conditions_of_paitent']))
                $condition_of_patient = join(',',$_POST['conditions_of_paitent']);

            $data = array(
                // 'account_category'      => $this->input->post('account_category',true),
                'looking_to_work'       => isset($looking_to_work)?$looking_to_work:'',
                'number_of_children'    => $this->input->post('number_of_children',true),
                'age_group'             => $this->input->post('age_group',true),
                'experience'            => $this->input->post('experience',true),
                'training'              => isset($training)?$training:'',
                'hourly_rate'           => $this->input->post('hourly_rate',true),
                'availability'          => isset($availability)?$availability:'',
                'references'            => $this->input->post('references',true),
                'agree_bg_check'        => $this->input->post('bg_check',true),
                'driver_license'        => $this->input->post('driver_license',true),
                'vehicle'               => $this->input->post('vehicle',true),
                'pick_up_child'         => $this->input->post('pick_up_child',true),
                'cook'                  => $this->input->post('cook',true),
                'basic_housework'       => $this->input->post('basic_housework',true),
                'homework_help'         => $this->input->post('homework_help',true),
                'sick_child_care'       => $this->input->post('sick_child_care',true),
                'on_short_notice'       => $this->input->post('on_short_notice',true),
                'updated_on'            => date('Y-m-d'),
                'type_of_therapy'       => $this->input->post('type_of_therapy',true),
                'certification'         => $this->input->post('certification',true),
                'accept_insurance'      => $this->input->post('accept_insurance',true),
                'profile_description'   => $this->input->post('profile_description',true),
                'willing_to_work'       => isset($willing_to_work)?$willing_to_work:'',
                'subjects'              => isset($subjects)?$subjects:'',
                'age_group'             => $this->input->post('age_group',true),
                'number_of_staff'       => $this->input->post('number_of_staff',true),
                'wash'                  => $this->input->post('wash',true),
                'iron'                  => $this->input->post('iron',true),
                'fold'                  => $this->input->post('fold',true),
                'bath_children'         => $this->input->post('bath',true),
                'bed_children'          => $this->input->post('bed_children',true),
                'language'              => isset($language)?$language:'',
                'established'           => $this->input->post('established',true),
                // 'location'              => $this->input->post('location',true),
                //'contact_number'        => $this->input->post('contact_number',true),
                //'age'                   => $this->input->post('age',true),
                'photo_of_child'        => $this->input->post('photo_of_child',true),
                'clean'                 => $this->input->post('clean',true),
                //'gender'                => $this ->input->post('gender',true),
                'religious_observance'  => $this->input->post('religious_observance',true),
                'smoker'                => $this->input->post('smoker',true),
                'conditions_of_patient' => isset($condition_of_patient)?$condition_of_patient:'',
                'accept_insurance'      => $this->input->post('accept_insurance',true),
                'monthly_rate'          => $this->input->post('monthly_rate',true),
                'job_position'          => $this->input->post('job_postion',true),
                'organiztion_name'      => $this->input->post('organization_name',true),
                'organization_type'     => $this->input->post('organization_type',true),
                'start_date'            => $this->input->post('start_date',true),
                'updated_on'            => date('Y-m-d'),
            );

            $this->ad_model->edit_advertisement($data,$id);
            $this->session->flashdata('success', "Ad Upated Successfully");
            redirect('admin/ad/detail/'.$id,'refresh');
        }
        
        $data['main_content'] = 'admin/ad/details';
        $data['detail']       = $this->ad_model->getAllDetails($id);
        //echo  $data['detail'][0]['care_type'];
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
    
    public function changestatus(){
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
             redirect('admin/ad','refresh');
         }


    }
}//Controller Close
