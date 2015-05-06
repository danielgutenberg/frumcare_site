<?php
class Admin_model extends CI_Model
{
    function login_check()
    {
        $username = $this->input->post('username');
        $password = encrypt_decrypt('encrypt', $this->input->post('password'));
        $this->db->where('username',$this->input->post('username'));
        $this->db->where('password',$password);
        $this->db->where('status',1);
        $query=$this->db->get('tbl_admin');
        if($query->num_rows()>0)
        {
            $q=$query->row();
            $user=array(
                       'admin_id'=>$q->id,
                       'admin_username'=>$q->username,
                       'admin_level'=>$q->role,
                       'admin_login_url'=>$this->input->server('HTTP_REFERER', TRUE)
                      );
            if($this->input->post('remember'))
            {
               //echo $rem = $this->input->post('remember');
                $cookie = array(
                    'name'   => 'remember_login',
                    'value'  => $q->id,
                    'expire' => '86500',
                );
                set_cookie($cookie); 
            }
            $this->session->set_userdata($user);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    function get_user_details($id){
        return $this->db->get_where('tbl_admin',array('id'=>$id))->result_array();
    }

    function loadinfo(){
        return $this->db->get('tbl_admin')->result_array();
    }

    function check($data){
        $this->db->where($data);
        $query=$this->db->get('tbl_admin');
        
        //$this->db->last_query();
        
        if($query->num_rows()>0){
              return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    function check_pass($data){
        $this->db->where($data);
        $query=$this->db->get('tbl_admin');
        
        //$this->db->last_query();
        return $query;
        
    }

    function add_save(){
        $post=$this->input->post();
        $data = array(
            'full_name'=>$post['name'],
            'username'=>$post['username'],
            'password'=>encrypt_decrypt('encrypt', $post['password']),
            'email1'=>$post['email_address1'],
            //'email2'=>$post['email_address2'],
            //'email3'=>$post['email_address3'],
			'role'=>$post['role'],
            'status' => $post['status'],
        );
            
        $res = $this->db->insert('tbl_admin',$data);
        if($res){
            return true;
        }
        else{
            return null;
        }
    }

    function edit($id){
        $res = $this->db->get_where('tbl_admin',array('id'=>$id));
        return $res->row_array();
    }

    function edit_save(){
        $post               = $this->input->post();
        $id                 = $post['id']; 
        $data['full_name']  = $post['name'];
        $data['username']   = $post['username'];
        $data['password']   = encrypt_decrypt('encrypt',$post['current_password']);
        $data['email1']     = $post['email_address1'];
		$data['role']       = $post['role'];
        $data['status']     = $post['status'];

        $this->db->where('id',"$id");
        $res = $this->db->update('tbl_admin',$data);
        if($res){
            return "updated";
        }
        else{
            return null;
        }
            
       
    }
    
    function update($update){
       return $this->db->update('tbl_admin',$update);
    }

    function delete($id){
        $res = $this->db->delete('tbl_admin',array('id' => $id));
        if($res){
            return true;
        }
        else{
            return null;
        }
    }

    function getProfileData($id){
        $sql    = "select * from tbl_admin where id = $id";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res)
            return $res;
        else 
            return false;
    }

    public function getAllAdminUsers(){
        $sql    = "select * from tbl_admin";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function getAllRoles(){
        $sql        = "select * from tbl_adminrole where status = 1";
        $query      = $this->db->query($sql);
        $res        = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    
}//Model Close