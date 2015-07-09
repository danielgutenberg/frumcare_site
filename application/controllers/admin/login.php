<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends  CI_Controller
{
    function __construct()
    {
      parent::__construct();
      $this->load->helper('cookie');
      $this->load->model('admin/admin_model');
      if($this->session->userdata('admin_username'))
      {
        redirect('admin/dashboard');
      }
    }

    function index(){

      if(get_cookie('remember_login')){
          $id = get_cookie('remember_login');
          $this->db->where('id',$id);
          $query=$this->db->get('tbl_admin');
          if($query->num_rows()>0)
          {
              $q    = $query->row();
              $user = array(
                     'admin_id'=>$q->id,
                     'admin_username'=>$q->username,
                     'admin_level'=>$q->role,
                     'admin_login_url'=>$this->input->server('HTTP_REFERER', TRUE)
              );
              $this->session->set_userdata($user);
              redirect('admin');
          }
          //die();
      }

        $login_url = $this->input->server('HTTP_REFERER', TRUE);
        if ($this->input->post('submit')){
            if ($this->admin_model->login_check()){
                redirect('admin/dashboard');
            }
            else{
                $this->load->helper('cookie');
                $count = $this->input->cookie('admin_invalid_count');
                if(empty($count)){
                    $count = 0;
                }                
                $count++;
                if($count == 4){                    
                    $this->session->set_flashdata('info', 'Too many attempts! This may redirect you to homepage. Please enter valid username and password');
                    $this->input->set_cookie('admin_invalid_count',$count,time()+3600);
                }
                elseif($count == 5){
                    delete_cookie('admin_invalid_count');
                    $this->session->set_flashdata('info', 'Invalid username or password');
                    redirect('welcome');
                }else{
                    $this->session->set_flashdata('info', 'Invalid username or password');
                    $this->input->set_cookie('admin_invalid_count',$count,time()+3600);    
                }                      
                //$this->session->set_flashdata('info', 'Invalid username or password');
                 redirect($login_url, 'location');
            }
        }
        else{            
            $data['title']='Login';
            //$data['main_content']='admin/login_view';
            $this->load->view('admin/login_view',$data);
        }
    }
    


}//Controller Close
