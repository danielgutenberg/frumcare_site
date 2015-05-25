<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_username')) {
            redirect('admin/login');
        }
        $this->load->model('common_model');
        $this->load->model('admin/user_model');
    }

    function index(){
        $data['title'] = 'User Manager';
        $data['user_data'] = $this->common_model->get_all('tbl_user');
  
        $data['main_content'] = 'admin/user/user';
        $this->load->view(BACKEND_TEMPLATE, $data);
    }
    
    function dashboard($id) {
              
        print_r('got here');
        $this->breadcrumbs->push('Dashboard', site_url().'#');
        $this->breadcrumbs->unshift('My Account', base_url().'user/dashboard');

        $data['main_content']       = 'frontend/user/dashboard';
        $data['verificationdata']   = $this->user_model->getVerificationData($id);
        $data['title']              = 'Dashboard';
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }
    
    function logs(){       
        $data['title'] = 'User Log Manager';
        $data['user_data'] = $this->common_model->getAllUserLogs();
        $data['main_content'] = 'admin/user/user_logs';
        $this->load->view(BACKEND_TEMPLATE, $data);
    }

    function edit($id = '')
    {
        if($_POST) {
            $data = $_POST;
           // $dob = $data['month'].'/'.$data['day'].'/'.$data['year'];
            $edit = array(
                'email' => $data['email'],
                //'dob' => strtotime($dob),
              //  'age' => get_age($dob),
                'gender' => (isset($data['gender']))?$data['gender']:'',
                'account_type' => $data['account_type'],
                'first_name' => $data['fname'],
               // 'middle_name' => $data['mname'],
                //'last_name' => $data['lname'],
                'care_type' => $data['care_type'],
                'status' => (isset($data['activate'])) ? 1 : 0,
                'original_password' => $data['password'],
                'account_category' => $data['account_category']
            );
            if(isset($data['password']) && $data['password'] != '') {
                $edit['password'] = sha1($data['password']);
            }
            $q = $this->common_model->update('tbl_user', $edit, array('id' => $id));
            if($q) {
                $this->session->set_flashdata('msg', 'User data saved');
            } else {
                $this->session->set_flashdata('msg', 'User data not saved');
            }
            redirect('admin/user');
        } else {
            $data['main_content'] = 'admin/user/user_edit';
            $data['detail'] = $this->common_model->get_where('tbl_user', array('id' => $id));
            $data['care'] = $this->common_model->get_where('tbl_care', array('service_type' => $data['detail'][0]['account_category']), 'service_by ASC');
            $this->load->view(BACKEND_TEMPLATE, $data);
        }
    }


    public function delete($id){
        $id = $this->uri->segment(4);
        $del = $this->db->delete('tbl_user',array('id'=>$id));
        if($del){
            $this->session->set_flashdata('success', 'User deleted successfully');
            redirect('admin/user/profile','refresh');
        }

    }

    public function profilepicture(){
        
        $data = array(
                'recordData'    => $this->common_model->getAllProfileImages(),
                'main_content'  => 'admin/user/profilepicture',
                'title'         =>  'Profile Picture Manager'
        );

        $this->load->view(BACKEND_TEMPLATE,$data);
    }

   /* public function deleteProfileImage($id = ''){
        $id = $this->uri->segment(4);
        var_dump($id);exit();
    } */

    public function changeStatus(){
        $user_id    = $this->uri->segment(4);
        $task       = $this->uri->segment(5);

        $this->user_model->updateImageStatus($user_id,$task);
        $this->session->set_flashdata('success', 'Profile picture status changed successfully');
        redirect('admin/user/profilepicture','refresh');
    }

    public function view($id=''){

        $data['detail']             = $this->common_model->get_where('tbl_user', array('id' => $id));
        $data['profile_detail']     = $this->common_model->get_where('tbl_userprofile',array('user_id' => $id));
        $data['payment_detail']     = $this->common_model->get_where('tbl_payments', array('user_id' => $id));
        $data['care_types']         = $this->common_model->getCareType();
        $data['main_content']       = 'admin/user/view';
        $data['title']              = 'User Manager';
        $data['pagetitle']          = 'View';

        $this->load->view(BACKEND_TEMPLATE,$data);
    }

    public function viewlog($id = ''){

        $data = array(
            'main_content' => 'admin/user/viewlogs',
            'recordData'   => $this->user_model->getLogDataById($id),
            'title'        => 'User Log Manager',
            'pagetitle'    => 'View'
        );

        $this->load->view(BACKEND_TEMPLATE,$data);
    }

    public function profile(){
        $data = array(
                'main_content' => 'admin/user/profile',
                'recordData'   => $this->user_model->getAllUsers(),
                'title'        => 'User Profile'
           );

        $this->load->view(BACKEND_TEMPLATE,$data);
    }

    public function viewprofile($id = ''){
        $data = array(
                'main_content' => 'admin/user/profileview',
                'recordData'   => $this->user_model->getByUserId($id),
                'title'        => 'User Profile',
                'pagetitle'    => 'View'

            );

        $this->load->view(BACKEND_TEMPLATE,$data);
    }

     public function deletelog($id = null){
        $this->db->delete('tbl_user_logs', array('id'=> $id));
        $this->session->flashdata('info','User Log Deleted Successfully');
        redirect('admin/user/logs','refresh');
      }
      
     public function status(){        
        $user_id    = $this->uri->segment(4);
        $task       = $this->uri->segment(5);

        $this->user_model->updateStatus($user_id,$task);
        $this->session->set_flashdata('info', 'User status changed successfully');
        redirect('admin/user','refresh');
     }
     
     function reset_password($id){
        if(isset($_POST['reset_password'])){ 
          $id           = $this->input->post('id', true);
          $password     = $this->input->post('password', true);
          
          $emaildata    = $this->user_model->getEmailAddressById($id);
          $this->send_email($emaildata['email'], $password);
          
          $res = $this->user_model->reset_password();
          $this->session->set_flashdata('info', "Password Updated Successfully");
          redirect('admin/user','refresh');  
            
        }
        
        $data = array(
             'main_content' => 'admin/user/reset_password',
             'title'        => 'User Profile',
             'pagetitle'    => 'Reset Password'
        );
        
        $this->load->view(BACKEND_TEMPLATE, $data);
      }
      
      function send_email($email,$password){
         $config = array (
              'mailtype' => 'html',
              'charset'  => 'utf-8',
              'priority' => '1'
         );
        
        $data = array(
            'password'  => $password,
            'link'      => site_url().'login' 
        );
        
        $this->load->library('email',$config);
        $this->email->from('no-reply@frumcare.com', 'Frumcare');
        $this->email->to($email); 
        $this->email->subject('Password Updated');
        $this->email->message($this->load->view('emails/reset_password', $data,true));	
        $this->email->send();
      }
      
}//Controller Close