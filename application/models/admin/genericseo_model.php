<?php 
class Genericseo_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	 function update_generic_seo(){
        $meta_keywords=$this->input->post('meta_tags');
        $meta_title=$this->input->post('meta_title');
        $meta_desc=$this->input->post('meta_desc'); 
        $google_analytics=$this->input->post('google_analytics'); 
        $is_active=$this->input->post('is_active'); 
         
         $update_data = array(
                   'meta_title' =>$meta_title,
                   'meta_desc' => $meta_desc,
                   'meta_keywords' =>$meta_keywords,
                   'google_analytics' =>$google_analytics,
                   'isActive' =>$is_active
                );
        
        $this->db->where('id', '1');
        $this->db->update('tbl_generic_seo', $update_data);
    }
    
    function get_generic_seo(){
        $sql="SELECT  * FROM tbl_generic_seo";
        $result=$this->db->query($sql);
        if($result->num_rows()>0) 
        {
           return $result->row_array();
        }
        else
        {
            return false;
        }
    }

}
?>