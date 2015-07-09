<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testimonial_model extends CI_Model
{
    public function get_all_testimonials($offset,$limit)
    {   
        /*$this->db->select('t.*, u.first_name, u.middle_name, u.last_name, u.account_type, u.profile_picture');
        $this->db->from('tbl_testimonials as t');
        $this->db->join('tbl_user as u', 't.user_id = u.id');
        $this->db->order_by('t.id','desc');*/
        $this->db->limit($limit,$offset);
        $q = $this->db->get('tbl_testimonials');
        if($q->num_rows()>0){
            return $q->result();
        }
        else{
            return false;
        }
    }
   
    //delete a testimonial
    public function delete_testimonial($id)
    {
        $res = $this->db->delete('tbl_testimonials',array('id'=>$id));
        return $res;
    }
    
    //get content of a testimonial to edit
    public function edit_testimonial($id)
    {
        /*$this->db->select('t.*, u.first_name, u.middle_name, u.last_name, u.account_type, u.profile_picture');
        $this->db->from('tbl_testimonials as t');
        $this->db->join('tbl_user as u', 't.user_id = u.id');
        $this->db->order_by('t.id','desc');
        $this->db->where('t.id', $id);*/
        $q = $this->db->get_where('tbl_testimonials', array('id'=>$id));
        
        return $q->row();
    }

    public function getData($num){
        $sql    = "select * from tbl_testimonials limit $num";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res) return $res;
        else return false;
    }
    
}
