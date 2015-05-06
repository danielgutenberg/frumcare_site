<?php 
class Blog_model extends CI_model{
	public function __construct(){
		parent:: __construct();
        
	}


    public function getSafetyFirstPosts($id){
        $this->load->database('wordpress', TRUE);
        $sql = "SELECT * FROM lajdf1lj_term_relationships LEFT OUTER JOIN lajdf1lj_posts ON lajdf1lj_term_relationships.object_id = lajdf1lj_posts.id WHERE lajdf1lj_term_relationships.term_taxonomy_id = $id and lajdf1lj_posts.post_status = 'publish'  order by lajdf1lj_posts.post_date desc limit 2";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else
             return false;
    }

    public function getAdvicePosts($id){
        $this->load->database('wordpress', TRUE);
        $sql = "SELECT * FROM lajdf1lj_term_relationships LEFT OUTER JOIN lajdf1lj_posts ON lajdf1lj_term_relationships.object_id = lajdf1lj_posts.id WHERE lajdf1lj_term_relationships.term_taxonomy_id = $id and lajdf1lj_posts.post_status = 'publish'  order by lajdf1lj_posts.post_date desc limit 2";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else
             return false;
    }

}
