<?php
class Profile_model extends CI_Model
{
    
    function save_profile($insert)
    {
        $model = $this->fill_model($insert);
        $q = $this->db->insert('tbl_userprofile', $model);
        return $q ? $this->db->insert_id(): false;
    }
    
    function get_profile($id)
    {
        $query = $this->db->get_where('tbl_userprofile', ['id' => $id]);
        $res = $query->row_array();
        return $res;
    }
    
    function fill_model($data)
    {
        $model = [];
        $fields = $this->db->list_fields('tbl_userprofile');
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                if (is_array($data[$field])) {
                    $data[$field] = join(',',$data[$field]);
                }
                $model[$field] = $data[$field];
            }
        }
        
        return $model;
    }

    function edit_profile($insert, $id)
    {
        $model = $this->fill_model($insert);
        $q = $this->db->update('tbl_userprofile', $model, array('id' => $id));
        return $q ? true : false;
    }
    
    function edit_profile_by_user_id($insert, $id)
    {
        $model = $this->fill_model($insert);
        $q = $this->db->update('tbl_userprofile', $model, array('user_id' => $id));
        return $q ? true : false;
    }

}