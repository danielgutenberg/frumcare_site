<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends CI_Controller {

	public function __construct(){
		parent:: __construct();
        $this->load->model('admin/ticket_model', 'ticket');
        $this->load->model('common_model');
        if(!$this->session->userdata('admin_username'))
        {
            redirect('admin/login');
        }
	}

	public function index(){

        $this->load->library('pagination');
        $offset = $this->uri->segment(4)?$this->uri->segment(4):0;

        $config['base_url'] = site_url().'admin/ticket/index/';
        $config['total_rows'] = $this->db->count_all('tbl_tickets');
        $config['per_page'] = 10;
        $config['uri_segment'] = $offset;
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";

        $this->pagination->initialize($config);

        $data['title'] = "Ticket Manager";	 
        $data['details'] = $this->ticket->get_all_tickets();
        $data['links'] = $this->pagination->create_links();
        $data['main_content']='admin/ticket/ticket_view';
        $this->load->view('admin/includes/template', $data);	
	}

    public function view($id){
        $id = $this->uri->segment(4);
        $data['title']              = "Ticket Manager";
        $data['pagetitle']          = 'View';
        $data['next']               = $this->common_model->getNextRecord('tbl_tickets',$id);
        $data['previous']           = $this->common_model->getPreviousRecord('tbl_tickets',$id);
        $data['details']            = $this->ticket->get_ticket_detail($id);
        $data['commentordetail']    = $this->ticket->getCommentorDetail($id);
        $data['main_content']       = "admin/ticket/ticket_detail_view";
        $this->load->view('admin/includes/template',$data);
    }
 
    public function add_reply($id){

        $data = array(
            'ticketId'          => $id,
            'replydate'         => time(),
            'reply_text'        => $_POST['reply_text'],
            'status'            => 1,
            'reply_by'          => $this->session->userdata('admin_username'),
            'internal_comments' => $_POST['internal_comments'],
            'view'              => 1
        );

        $emaildata = array(
                'email_address' => $_POST['emailaddress'],
                'reply_text'    => $_POST['reply_text'],
                'subject'       => $_POST['subject'],
        );

        $this->sendReply($emaildata);

        $res = $this->db->insert('tbl_tickets_history', $data);
        if($res){
            $r = '<tr><td></td><td><div class="bubble me"><div>'.$_POST['reply_text'].'</div><div class="time">'.date('h:iA, d M Y', $data['replydate']).'</div></div></td>';
            echo $r;

            $this->session->set_flashdata('success', 'Ticket Replied Successfully');
            redirect('admin/ticket/view/'.$id,'refresh');
        }
    } 
     
    public function delete($id){
        $res = $this->ticket->delete_ticked($id);
        if($res)
        {
            $this->session->set_flashdata('info',"Ticket Deleted Successfully");
            redirect('admin/ticket','refresh');
        }
    }

    public function changestatus($id=null){
        $id = segment(4);
        $this->db->set('status','1',FALSE);
        $this->db->where('id',$id);
        $this->db->update('tbl_tickets');
        redirect('admin/ticket/view/'.$id,'refresh');
    }

    public function sendReply($emaildata){

        $email_config = array(        
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n",
        ); 


        $this->load->library('email',$email_config);
        
        $this->email->from('noreply@frumcare', 'FRUMCARE');
        $this->email->to($emaildata['email_address']);
        
        $this->email->subject('Reply to the ticket');
        $this->email->message($this->load->view('admin/ticket/email',$emaildata,true));
        
        $this->email->send();
        
    }

}

/* End of file testimonial.php */
/* Location: ./application/controllers/admin/testimonial.php */
