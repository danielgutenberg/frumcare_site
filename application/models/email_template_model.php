<?php 
class Email_template_model extends CI_Model{
	public function getEmailTemplateBySlug($slug){
		$sql = "select * from tbl_email_templates where slug='$slug' and isActive=1";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		if($res)return $res;
		else return false;
	}

}
