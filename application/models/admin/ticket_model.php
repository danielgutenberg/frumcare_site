<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ticket_model extends CI_Model
{
    public function get_all_tickets(){   
        //$this->db->limit($limit,$offset);
        $this->db->select('id, subject,status,name');
        $q = $this->db->get('tbl_tickets');
        if($q->num_rows()>0){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function get_view_count($id){
        $this->db->like('ticketId', $id);
        $this->db->like('view', '0');
        $this->db->from('tbl_tickets_history');
        return $this->db->count_all_results();        
    }

    public function set_as_viewed($id){
        $this->db->update('tbl_tickets_history', array('view'=>1), array('ticketId'=>$id, 'view'=>0));        
    }
   
    //delete a testimonial
    public function delete_ticked($id){
        $this->db->delete('tbl_tickets',array('id'=>$id));
        $this->db->delete('tbl_tickets_history',array('ticketId'=>$id));
        return true;
    }
    
    //get content of a testimonial to edit
    public function get_ticket_detail($id){
            $this->db->where('t.id', $id);
        $this->db->select('t.id, t.subject,t.description,t.file, t.status as ticket_status, r.*');
        $this->db->from('tbl_tickets as t');
        $this->db->join('tbl_tickets_history as r', 't.id = r.ticketId','left outer');
        $this->db->order_by('r.id','asc');
        $this->db->group_by('r.id');
        $q = $this->db->get_where('tbl_tickets');
        if($q->num_rows()>0){
            return $q->result();
        }
        else{
            return false;
        }
    }

    public function delete_ticket($id){
        
    }

    public function getCommentorDetail($id){
        $sql        = "select * from tbl_tickets where id = $id";
        $query      = $this->db->query($sql);
        $res        = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }
    
}
