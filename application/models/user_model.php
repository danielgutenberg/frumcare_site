<?php
class User_model extends CI_Model
{
    
    function save_user($insert)
    {
        $model = $this->fill_model($insert);
        $q = $this->db->insert('tbl_user', $model);
        return $q ? $this->db->insert_id(): false;
    }
    
    function get_model($id)
    {
        $query = $this->db->get_where('tbl_user', ['id' => $id]);
        $res = $query->row_array();
        return $res;
    }
    
    function fill_model($data)
    {
        $model = [];
        $fields = $this->db->list_fields('tbl_user');
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

    function edit_user($insert, $id)
    {
        $model = $this->fill_model($insert);
        if (empty($model)) {
            return true;
        }
        $q = $this->db->update('tbl_user', $model, array('id' => $id));
        return $q ? true : false;
    }

    function validate_user($data)
    {   
        $email = $data['email'];
        $sql = "SELECT * FROM tbl_user where email = '$email'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if (!$res['original_password']) {
            $this->db->where(array('email'=>$email));
            $this->db->update('tbl_user', ['original_password' => $data['passwd'], 'password' => encrypt_decrypt('encrypt', $data['passwd'])]); 
        }
        $q = $this->db->get_where('tbl_user', array('email' => $data['email'],'status' => 1,'original_password' => $data['passwd']));
        return $q->num_rows() == 1 ? $q->result_array() : false;
    }

    public function getSocialLoginUser($email)
    {
        $sql = "select * from tbl_user where email = '$email'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
    }
    
    public function getDuplicateEmail($email, $id)
    {
        $sql = "select * from tbl_user where email = '$email' and id != $id";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
    }
    
    public function getUserDetails($id)
    {
        $sql = "SELECT * FROM tbl_user where id = '$id'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        return $res;
    }

    public function getNewUserProfile($id)
    {
        $sql = "SELECT * FROM tbl_userprofile where user_id = '$id'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        return $res;
    }

    public function getUserLog(){
        $sql = "select * from tbl_user_logs group by user_id order by id desc";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        return $res;
    }


    public function getUserDetailsBySlug($slug,$care_type){
        $sql = "SELECT tbl_user.*,tbl_userprofile.* FROM tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.uri = '$slug' and tbl_userprofile.care_type = $care_type and tbl_user.status = 1";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        return $res;
    }

    public function getUserDetailsById($id,$care_type){
        $this->db->join('tbl_userprofile','tbl_userprofile.user_id = tbl_user.id','left');
        $this->db->where(array('tbl_user.id' => $id, 'tbl_userprofile.care_type' => $care_type, 'tbl_user.status' => 1));
        $query = $this->db->get('tbl_user');
        $res = $query->row_array();
        return $res;
    }

    public function getUserLogById($user_id){
        $sql = "select login_time from tbl_user_logs where user_id = '$user_id' order by id desc limit 1";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
    }

    public function getJobs(){
        $sql = "select * from tbl_userprofile where account_category = 2 and profile_status = 1";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)return $res;
        else return false;
    }

    public function getJobBySlug($slug, $careType){
        $sql = "select * from tbl_user join tbl_userprofile on tbl_userprofile.user_id = tbl_user.id where uri='$slug' and tbl_userprofile.care_type ='$careType'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res)return $res;
        else return false;
    }

    public function getSimilarPersons($care_type,$currid){
        $sql = "select tbl_user.uri,tbl_user.name,tbl_user.profile_picture,tbl_userprofile.rate,tbl_userprofile.rate_type,tbl_userprofile.care_type,tbl_userprofile.currency from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.care_type = $care_type and tbl_userprofile.profile_status = 1 and tbl_userprofile.photo_status = 1 and tbl_userprofile.id != $currid order by tbl_userprofile.created_on desc limit 5";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res) return $res;
        else return false;
    }

    public function getUserName($u_id){
        $sql    = "select * from tbl_user where id=$u_id";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res) return $res;
        else return false;
    }

    function checkUserStatus($email){
        $sql = "select name,email,original_password,email_status from tbl_user where email_hash = '$email'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
    }

    function getAllByCategoryId($cat_id){
        $sql = "SELECT tbl_user. * , sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews FROM tbl_user LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.profile_id where care_type = $cat_id GROUP BY tbl_user.id ORDER BY tbl_user.id DESC";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res) return $res;
        else return false;
    }

    function check_verficationcode($code,$uid){
        $sql = "select * from tbl_verificationcodes where user_id = $uid and verfication_code = '$code'";
        $query = $this->db->query($sql);
        $res = $query->num_rows();
            if($res > 0) return '1';
            else return '0';
    }

    public function checkPhoneVerficationStatus($id){
        $sql    = "select contact_number_status from tbl_user where id = $id";
        $query  = $this->db->query($sql);
        $res    =  $query->result_array();
        if($res)
            return $res[0]['contact_number_status'];
        else
            return false;
    }

    public function getVerficationCode(){
        $sql = "select * from tbl_verificationcodes";
         $query  = $this->db->query($sql);
        $res    =  $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }

     public function getVerificationData($id){
        $sql    = "select profile_picture_status,contact_number_status,email_status from tbl_user where id = $id";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res)
            return $res;
        else
            return false;
     }

     public function addtestimonials(){
        $data = array(
            'testimonial_for'           => $this->input->post('testimonial_for',TRUE),
            'testimonial_by'            => $this->input->post('testimonial_by',TRUE),
            'image'                     => $this->input->post('profile_picture',TRUE),
            'user_id'                   => $this->input->post('user_id',TRUE),
            'testimonial_date'          => $this->input->post('testimonial_date',TRUE),
            'score'                     => $this->input->post('score',TRUE),
            'testimonial_description'   => $this->input->post('testimonial_description',TRUE)
        );
        $this->db->insert('tbl_testimonials',$data);
    }
    
    public function get_my_review($limit,$start,$field){
        $this->db->join('tbl_user','tbl_reviews.user_profile_id = tbl_user.id','left');
        $this->db->where($field,$this->session->userdata('current_user'));
        $this->db->order_by('created_date','desc');
        $query = $this->db->get('tbl_reviews');
         if($query->num_rows() > 0){
            return $query->result_array();
        }
        else{
            return FALSE;
        }
    }

    function get_ticket(){

        $id =  $this->session->userdata('current_user');
        $this->db->order_by('id','desc');
        $this->db->where('user_id',$id);
        $q = $this->db->get('tbl_tickets');
        $data = $q->result_array();
        return $data;
        $this->load->library('pagination');
    }//CODE BY CHAND


    public function get_ticket_detail($id = array()){
        $id = $id['id'];
        $this->db->where('t.id', $id);
        $this->db->select('t.id, t.subject,t.description,t.file,t.created_date as submitted_date, r.*');
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

    function record_count(){
        $id =  $this->session->userdata('current_user');
        $this->db->where('user_id',$id);
		$query = $this->db->get('tbl_tickets');
		return $query->num_rows();
	}//CODE BY CHAND


     function getCommentorDetail($id){
        $id = $id['id'];
        $sql        = "select * from tbl_tickets where id = $id";
        $query      = $this->db->query($sql);
        $res        = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }//CODE BY CHAND
    
    function getNewsletterSubscription($email)
    {
        $sql        = "select * from tbl_newlettersubscription where email = '$email' limit 1";
        $query      = $this->db->query($sql);
        $res        = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }

    function ticket_data_view($limit,$start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id','asc');
        $id =  $this->session->userdata('current_user');
        $this->db->where('user_id',$id);
        $query = $this->db->get('tbl_tickets');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }//CODE BY CHAND

    //kiran
    public function review_record_count(){
        $this->db->where('user_id',$this->session->userdata('current_user'));
        $query = $this->db->get('tbl_reviews');
        return $query->num_rows();
    }

    function current_user($care_id = array())
    {
        $care_type = $care_id['care_id'];
        $user_id = $this->session->userdata('current_user');
        $this->db->where(array('user_id'=>$user_id,'care_type'=>$care_type));
        $res = $this->db->get('tbl_userprofile');
        return $res->result_array();
        $num_rows = $res->num_rows();
    }//CODE BY CHAND

    

    public function getUserPackage($uid){
        $sql    = "select package_id from tbl_user where id = $uid";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }

    public function getSearchAlerts($latitude, $longitude, $type)
    {
        if (!$latitude) {
            $latitude = 40;
        }
        if (!$longitude) {
            $longitude = -74;
        }
        $sql    = "select *, (((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `long` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS dist from tbl_searchhistory where createAlert = 1 and care_type = $type";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function getNurserySearchAlerts($latitude, $longitude)
    {
        if (!$latitude) {
            $latitude = 40;
        }
        if (!$longitude) {
            $longitude = -74;
        }
        $sql    = "select tbl_searchhistory.*, tbl_userprofile.care_type as USERCARETYPE, (((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `long` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS dist from tbl_searchhistory join tbl_userprofile on tbl_userprofile.user_id = tbl_searchhistory.user_id where createAlert = 1 and tbl_searchhistory.care_type = 1 and tbl_userprofile.care_type = 17";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function getWorkersSearchAlerts($latitude, $longitude, $type)
    {
        $adTypes = [
            25 => 1,
            26 => 5,
            27 => 6,
            28 => 8
        ];
        
        $historyTypes = [
            25 => 17,
            26 => 20,
            27 => 22,
            28 => 24
        ];
        
        $history = $historyTypes[$type];
        $ad = $adTypes[$type];
        
        if (!$latitude) {
            $latitude = 40;
        }
        if (!$longitude) {
            $longitude = -74;
        }
        $sql    = "select tbl_searchhistory.*, tbl_userprofile.looking_to_work as caregivingLocation, (((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `long` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS dist from tbl_searchhistory join tbl_userprofile on tbl_userprofile.user_id = tbl_searchhistory.user_id where createAlert = 1 and tbl_searchhistory.care_type = $history and tbl_userprofile.care_type = $ad";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }

    public function getHistory($uid){
        $sql    = "select tbl_searchhistory.*, tbl_care.service_name from tbl_searchhistory join tbl_care on tbl_searchhistory.care_type = tbl_care.id where user_id = $uid and createAlert = 1 and searcheddate < NOW() order by searcheddate";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function getAlert($user_id, $id)
    {
        $sql    = "select tbl_searchhistory.*, tbl_care.service_name from tbl_searchhistory join tbl_care on tbl_searchhistory.care_type = tbl_care.id where user_id = $user_id and tbl_searchhistory.id = $id and  searcheddate < NOW() order by searcheddate desc";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function getLocation($id)
    {
        $sql    = "select location,lng,lat,city,state,country from tbl_user where id = $id";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function get_all_profile($userId = null){
        $this->db->join('tbl_user', 'tbl_user.id = tbl_userprofile.user_id', 'left');
        $this->db->join('tbl_care','tbl_userprofile.care_type = tbl_care.id','left');
        if ($userId) {
            $this->db->where('user_id',$userId);
        } else {
            $this->db->where('user_id',$this->session->userdata('current_user'));
        }
        $this->db->order_by("tbl_userprofile.id", "desc");
        $this->db->select('tbl_userprofile.*, tbl_care.*, tbl_user.city, tbl_user.state, tbl_user.country, tbl_user.name, tbl_user.organization_name, tbl_user.uri, tbl_user.profile_picture, tbl_user.profile_picture_status');
        $query = $this->db->get('tbl_userprofile');
        return $query->result();
    }
    
    public function getAllUsers()
    {
        $query = $this->db->get('tbl_user');
        return $query->result();
    }

    function getPackages(){
        $sql    = "select * from tbl_packages";
        $query  = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }

    public function getMyFavorites($id){
        $this->db->join('tbl_user', 'tbl_user.id = tbl_userprofile.user_id', 'left');
        $this->db->join('tbl_care','tbl_userprofile.care_type = tbl_care.id','left');
        $this->db->join('tbl_favorites', 'tbl_userprofile.id = tbl_favorites.profile_id', 'left');
        $this->db->where('tbl_favorites.user_id',$this->session->userdata('current_user'));
        $this->db->order_by("tbl_userprofile.id", "desc");
        $this->db->select('tbl_favorites.id as favoritesId, tbl_userprofile.*, tbl_care.*, tbl_user.city, tbl_user.state, tbl_user.country, tbl_user.name, tbl_user.uri, tbl_user.profile_picture');
        $query = $this->db->get('tbl_userprofile');
        return $query->result();
    }
    public function existing_profile_check($account_category,$care_type)
    {
        $this->db->where('user_id', $this->session->userdata('current_user'));
        $this->db->where('care_type', $care_type);
        $query = $this->db->get('tbl_userprofile');
        if($query->num_rows() > 0){
            return false;
        }
        else{
            return TRUE;
        }
    }
    
    public function deleteAccount($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_user');
    }
    
    public function delete_this_profile($user_id,$care_type)
    {
        $this->db->where('user_id',$user_id);
        $this->db->where('care_type',$care_type);
        $this->db->update('tbl_userprofile', array('profile_status' => 2));
    }

    public function unarchive_this_profile($user_id,$care_type){
        $this->db->where('user_id',$user_id);
        $this->db->where('care_type',$care_type);
        $this->db->update('tbl_userprofile', array('profile_status' => 1));
    }

    public function getProfilePackage($user_id,$care_type){
        $sql        = "select package_id from tbl_userprofile where user_id = $user_id and care_type = $care_type";
        $query      = $this->db->query($sql);
        $res        = $query->row_array();
        if($res){
            return $res;
        }else{
            return false;
        }
    }

    public function updateProfilePackage($data){

        $uid         = $data['user_id'];
        $care_type  = $data['care_type'];

        $this->db->where(array('user_id'=>$uid,'care_type'=>$care_type));
        $this->db->update('tbl_userprofile',array('package_id'=>$data['package_id']));

    }

    function getpackage_dtl()
    {
        $post = $this->input->post();
        $res = $this->db->get_where('tbl_packages',array('id'=>$post['package']));
        return $res->result_array();
    }
    
    public function get_my_account_category($id){
        $this->db->where('user_id',$id);
        $query = $this->db->get('tbl_account_category');
        return $query->result_array();
    }

    public function getMembership($id){
        $sql    = "select care_type,package_id from tbl_userprofile where user_id = $id";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
             return false;
    }

    public function getFeaturesByPackageId($id){
        $sql = "select * from tbl_packages where package_name='$id'";
        $query = $this->db->query($sql);
        $res   = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function getMessagesFromEmailLogs()
    {
        $sql = "select * from tbl_email_logs where email_subject = 'Somebody Contacted you on FrumCare'";
        $query = $this->db->query($sql);
        $res   = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function saveMessage($model)
    {
        $q = $this->db->insert('tbl_messages', $model);
        return $q ? $this->db->insert_id(): false;
    }
    
    public function getMessages($recipientId, $senderId)
    {
        if ($senderId) {
            $this->db->where("(receiver_id='$senderId' OR sender_id='$senderId')");
        }
        $this->db->where("(receiver_id='$recipientId' OR sender_id='$recipientId')");
        $query = $this->db->get('tbl_messages');
        $res   = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
}