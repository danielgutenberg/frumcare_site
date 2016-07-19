<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emaillogs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_model');
        if (!is_super()) {
            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
            redirect('admin/login');
        }
        $this->load->model('admin/emaillogs_model');
     }
     
     public function index()
     {
        $data['emaillogs'] = $this->emaillogs_model->get_emaillogs();
        $data['main_content'] = "admin/emaillogs/emaillogs_view";
        $this->load->view('admin/includes/template', $data);
     }
     
     public function view($id)
     {
        $data['detail'] = $this->emaillogs_model->view_detail($id);
        $data['main_content'] = "admin/emaillogs/view_deatail_log";
        $this->load->view('admin/includes/template',$data);
     }
     
     public function delete($id)
     {
        $res = $this->emaillogs_model->delete($id);
        if($res)
        {
            $this->session->set_flashdata('info',"Information Deleted Successfully");
            redirect('admin/emaillogs');
        }
     }

     public function markasurgent($id = ''){
        $this->db->where('id',$id);
        $this->db->update('tbl_email_logs',array('markasurgent'=>1));

        $this->session->set_flashdata('success', 'Email has been marked as urgent');
        redirect('admin/emaillogs/view/'.$id, 'refresh');
     }

     public function markasunread($id=''){
        $this->db->where('id',$id);
        $this->db->update('tbl_email_logs',array('markasunread'=>1));

        $this->session->set_flashdata('success', 'Email has been marked as unread');
        redirect('admin/emaillogs/view/'.$id, 'refresh');
     }

     public function reply(){
        if($this->input->is_ajax_request()){
            $to         = $this->input->post('send_to',true);
            $message    = $this->input->post('email_content',true); 
            $subject    = $this->input->post('subject',true);

            $config = array(
                'mailtype'  => 'html', 
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );

            $this->load->library('email', $config);
            
            $this->email->from('info@frumcare.com', 'FRUMCARE');
            $this->email->to($to);
            
            $this->email->subject($subject);
            $this->email->message($message);
            
            $a = $this->email->send();
            echo $a;
            //echo $this->email->print_debugger();

        }
     }
}
