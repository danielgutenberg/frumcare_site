<?php 
class Cms_model extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}

	public function getPageDetailBySlug($slug){
		$sql = "select * from tbl_pages where slug = '$slug'";
		$query = $this->db->query($sql);
		$res = $query->row_array();
		return $res;
	}
}
?>
