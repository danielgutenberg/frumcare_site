<?php
class User_model extends CI_Model
{
    function save_user($insert)
    {
        $q = $this->db->insert('tbl_user', $insert);
        return $q ? true : false;
    }

    function save_userdata($insert)
    {
        $this->db->insert('tbl_user', $insert);
        $id = $this->db->insert_id();
        return $id;
    }

    function edit_user($insert, $id)
    {
        $q = $this->db->update('tbl_user', $insert, array('id' => $id));
        return $q ? true : false;
    }

    function validate_user($data)
    {   
        $q = $this->db->get_where('tbl_user', array('email' => $data['email'],'status' => 1,'original_password' => $data['passwd']));
        return $q->num_rows() == 1 ? $q->result_array() : false;
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

    function getAllDetails($acc_cat,$offset,$limit,$latitude,$longitude){
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.user_id WHERE tbl_userprofile.account_category = $acc_cat and tbl_user.status = 1 and tbl_userprofile.profile_status = 1 ";
        if($acc_cat == 3)
            $sql .=" and tbl_userprofile.organization_care = 1";
        $sql .=" having distance <50 ORDER BY distance ASC limit $offset, $limit";
        $query = $this->db->query($sql);
        $res = $query->result_array(); 
        if($res){
            return $res;    
        }else{
            return false;
        }
    }

    function getAllUserDetailsByCountry($offset,$limit,$country){
        $sql = "SELECT tbl_user. * , sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews FROM tbl_user LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.profile_id where account_type = 1 and tbl_userprofile.account_category = 1 and tbl_user.status = 1 and tbl_userprofile.care_type !=7 and tbl_user.country = '$country' GROUP BY tbl_user.id ORDER BY tbl_user.id DESC limit $offset,$limit";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res){
            return $res;    
        }else{
            return false;
        }
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
        $sql = "SELECT tbl_user.*,tbl_userprofile.* FROM tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.id = '$id' and tbl_userprofile.care_type = $care_type and tbl_user.status = 1";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        return $res;   
    }

    public function getCurrentUserTimeTable($user_id){
        $sql = "select * from tbl_user_availability where user_id = '$user_id'";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;      
        else return false;
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
        $sql = "select tbl_user.uri,tbl_user.name,tbl_user.profile_picture,tbl_userprofile.rate,tbl_userprofile.rate_type,tbl_userprofile.care_type from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.care_type = $care_type and tbl_userprofile.id != $currid order by tbl_userprofile.created_on desc limit 5";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res) return $res;
        else return false;
    }

    public function getUserName($u_id){
        $sql    = "select name,email from tbl_user where id=$u_id";
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

    // caregiver sort
    function sort($limit,$care_type,$latitude,$longitude){
        $sql    = "select tbl_user.*, (((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id  = tbl_userprofile.user_id where tbl_userprofile.account_category = 1 and tbl_userprofile.care_type!=7 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$latitude%' and tbl_user.lng like '%$longitude%'";
        if($care_type!='')
             $sql   .=  " and tbl_userprofile.care_type = $care_type";
             $sql   .= " order by distance asc";
             $sql   .= " limit $limit";


        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }

    // caregiver sort
    function sortcareseeker($limit,$care_type,$latitude,$longitude){
        $sql    = "select tbl_user.*, (((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id  = tbl_userprofile.user_id where tbl_userprofile.account_category = 2 and tbl_userprofile.care_type!=7 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$latitude%' and tbl_user.lng like '%$longitude%'";
        if($care_type!='')
             $sql   .=  " and tbl_userprofile.care_type = $care_type";
             $sql   .= " order by distance asc";
             $sql   .= " limit $limit";


        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }

    function orderByDistance($limit){
    $sql = "SELECT tbl_user.*,sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews from tbl_user LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.profile_id where tbl_user.status = 1 and account_category = 1 and account_type = 1 and care_type != 7 and GROUP BY tbl_user.id having distance <= 10 order by distance limit $limit";
    $query = $this->db->query($sql);
     $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }



    // therapist sort

    function therapistsort($limit,$order){
        $sql    = "SELECT tbl_user. * , sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews FROM tbl_user LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.profile_id where account_type = 1 and tbl_user.status = 1 and tbl_user.care_type =7 GROUP BY tbl_user.id";   
        if($order == 'asc')
            $sql .= " ORDER BY tbl_user.name $order limit $limit";
        if($order == 'desc')
            $sql .= " ORDER BY tbl_user.id $order limit $limit";
       // echo $sql;exit;
        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }


    public function getAllTherapist($latitude,$longitude,$offset,$limit){
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_userprofile.account_category = 1 and tbl_userprofile.care_type = 7 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1  and tbl_user.lat like '%$latitude%' and tbl_user.lng like '%$longitude%' ORDER BY distance asc limit $offset, $limit";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }

    public function countUserTable($lat,$lon){
        $sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.care_type !=7 and tbl_userprofile.account_category = 1 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like'%$lon%'";
        $query  = $this->db->query($sql);
        $res = $query->num_rows();
        if($res)
            return $res;
        else 
            return false;
    }

    public function countCareSeeker($lat,$lng){
     $sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.care_type !=7 and tbl_userprofile.account_category = 2 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat' and tbl_user.lng like '%$lng%'";
     $query  = $this->db->query($sql);
     $res = $query->num_rows();
        if($res)
            return $res;
        else 
            return false;   
    }

    public function countTherapists($lat,$lng){
        $sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.care_type = 7 and tbl_userprofile.account_category = 1 and tbl_userprofile.account_category = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like '%$lng%'";
        $query  = $this->db->query($sql);
        $res = $query->num_rows();
        if($res)
            return $res;
        else 
            return false;
    }

    public function getAllInsutions(){
        $sql = "select * from tbl_user where status = 1 and account_type = 2";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res){
            return $res;
        }else{
            return false;    
        }
        
    }

    // organization
    function getAllOraganisations($limit,$offset){
        $sql = "SELECT tbl_user. * , sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews FROM tbl_user LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.profile_id where account_type = 2 and account_category = 1 and tbl_user.status = 1 GROUP BY tbl_user.id ORDER BY tbl_user.id DESC limit $offset,$limit";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }


    function countAllOrganization(){
        $sql = "select * from tbl_user where account_type = 2 and account_category = 1 and status = 1";
        $query  = $this->db->query($sql);
        $res = $query->num_rows();
        if($res)
            return $res;
        else 
            return false;
    }

    function sortOrganization($limit,$order){
        $sql    = "SELECT tbl_user. * , sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews FROM tbl_user LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.profile_id where account_type = 2 and account_category = 1 and tbl_user.status = 1 GROUP BY tbl_user.id";   
        if($order == 'asc')
            $sql .= " ORDER BY tbl_user.name $order limit $limit";
        if($order == 'desc')
            $sql .= " ORDER BY tbl_user.id $order limit $limit";
        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }

    function getPhoneNumber($id){
        $sql = "select contact_number from tbl_user where id = $id";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
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

    
    public function leftsiderbarsearch($data,$latitude,$longitude){
        $temp = explode('_',$data['care_type']);
        $service_id = $temp[0];
        $serviceby  = $temp[1];
        $sql = "SELECT tbl_user.*,(((acos(sin((27.7 * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( 27.7 * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( 85.33 - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = {$data['service']} and tbl_userprofile.account_category={$data['service']} and tbl_userprofile.care_type = '{$data['care_type']}' andtbl_userprofile.account_type = {$serviceby} and tbl_user.city = '{$data['city']}' having distance < {$data['distance_in_length']} order by distance";
        echo $sql;exit;
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }

     public function getVerificationData($id){
        $sql    = "select profile_picture_status,contact_number_status,email_status,facebook_contact_status,twitter_contact_status,google_contact_status from tbl_user where id = $id";
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


     public function searchRecord($data){
        $time       = $data['time'];
        $education  = $data['education'];
        $exp        = $data['year_experience'];
        $num        = $data['no_children'];
        $acc_cat    = $data['category'];
        $sql        = 'select tbl_user. *, sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews FROM tbl_user LEFT OUTER JOIN tbl_reviews on tbl_user.id = tbl_reviews.profile_id WHERE education_level = "'.$education.'" and experience = '.$exp.' and number_of_children = '.$num.' and availability IN ("' . join('","', $time) . '") and tbl_userprofile.account_category = '.$acc_cat.' and tbl_user.status = 1 group by tbl_user.id';
        $query      = $this->db->query($sql);
        $res        = $query->result_array();
        if($res)
            return $res;
        else 
            return false;

     }

     // careseeker 
     function getAllCareSeekerDetails($acc_cat,$offset,$limit,$latitude,$longitude){
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.user_id WHERE tbl_userprofile.account_category = $acc_cat and tbl_user.status = 1 and tbl_userprofile.profile_status = 1";
        //$sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.user_id WHERE tbl_userprofile.account_category = $acc_cat and tbl_user.status = 1 and tbl_userprofile.profile_status = 1";
        if($acc_cat == 3){
            $sql .= " and tbl_userprofile.organization_care = 2";
        }
        $sql .= "  having distance < 50 order by distance ASC limit $offset, $limit";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res){
            return $res;    
        }else{
            return false;
        }
    }
    function countAllcareseekers($acc_cat,$latitude,$longitude){
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.user_id WHERE tbl_userprofile.account_category = $acc_cat and tbl_user.status = 1 and tbl_userprofile.profile_status = 1";        
        if($acc_cat == 3){
            $sql .= " and tbl_userprofile.organization_care = 2";
        }
        $sql .= "  having distance < 50 order by distance ASC";        
        $query = $this->db->query($sql);        
        return $query->num_rows();    
    }  
    function getAllCareSeekerDetailsByCountry($offset,$limit,$country){
        $sql = "SELECT tbl_user. * , sum( tbl_reviews.review_rating ) as total_rating ,count( tbl_reviews.review_rating ) as number_of_reviews FROM tbl_user LEFT OUTER JOIN tbl_reviews ON tbl_user.id = tbl_reviews.profile_id where tbl_userprofile.account_category = 2 and tbl_user.status = 1 and tbl_user.care_type !=7 and tbl_user.country = '$country' GROUP BY tbl_user.id ORDER BY tbl_user.id DESC limit $offset,$limit";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res){
            return $res;    
        }else{
            return false;
        }
    }

    // careseeker sort
    function careseekersort($limit,$order){
        $sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id  = tbl_userprofile.user_id where tbl_userprofile.account_category = 2 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.care_type!=7";
        if($order == 'asc')
            $sql .= " ORDER BY tbl_user.name $order limit $limit";
        if($order == 'desc')
            $sql .= " ORDER BY tbl_user.id $order limit $limit";
        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }

    function careseekerorderByDistance($limit,$latitude,$longitude){    
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance from tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.account_category = 2 GROUP BY tbl_user.id having distance <= 20 order by distance limit $limit";
        echo $sql;exit;
        $query = $this->db->query($sql);
        $res     = $query->result_array();
            if($res)
                return $res;
            else 
                return false;
    }
    //code by kiran
    public function get_caregivers(){
        $this->db->where('status',1);
        $this->db->where('account_category',1);
        $this->db->select('id,name,uri');
        $query = $this->db->get('tbl_user');
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
    //code by kiran
    public function get_my_review($limit,$start,$field){
        $this->db->join('tbl_user','tbl_reviews.user_profile_id = tbl_user.id','left');
        $this->db->limit($limit,$start);
        $this->db->where($field,$this->session->userdata('current_user'));
        //$this->db->select('*');
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
        //if($q->num_rows()>0){
//            return $q->result();
//        }
//        else{
//            return false;
//        }
    }//CODE BY CHAND
    
    //  function get_ticket_detail($id){
    //     $id = $id['id'];
    //     $this->db->where('id', $id);
    //     $q = $this->db->get('tbl_tickets');
    //     $data = $q->result_array();
    //     return $data;
    // }//CODE BY CHAND


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

    public function search_careseeker($search_text){
        $sql = "SELECT * FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status = 1 AND tbl_userprofile.care_type < 17 AND tbl_user.name LIKE '".mysql_real_escape_string($search_text)."%'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
            if($data)
                return $data;
            else
            return false;
        }
        
        
        function get_user_info(){
             $user_id = $this->session->userdata('current_user');
        $this->db->where(array('id'=>$user_id));
        $res = $this->db->get('tbl_user');
        return $res->result_array();
        }
    
    function current_user($care_id = array())
    {
        $care_type = $care_id['care_id'];
        $user_id = $this->session->userdata('current_user');
        $this->db->where(array('user_id'=>$user_id,'care_type'=>$care_type));
        $res = $this->db->get('tbl_userprofile');
        return $res->result_array();
        $num_rows = $res->num_rows();
        /*if($num_rows==0)
        {
            $this->db->where(array('user_id'=>$user_id,'care_type'=>$care_type));
            $res = $this->db->get('tbl_userprofile');
            return $data = $res->result_array();
        }else{
            return $data = $res->result_array();
        }*/
        
        
    }//CODE BY CHAND
    
    function update_job_details($care_type = array())
    {
        $profileStatus = 1;
        $email = 0;
        $care_type = $care_type['care_id'];
        if($_POST) {
            $p = $_POST;
            $id = $this->session->userdata('current_user');
            $language = false;
            $looking_to_work = '';
            $willing_to_work = '';
            $training = '';
            $availability = '';
            $subjects = '';
            $conditions = '';
            $optional_number = '';
            $age_group = '';
            if(isset($p['conditions_of_patient'])) {
                $conditions = $p['conditions_of_patient'];
            }
            if(isset($p['subjects'])) {
                $subjects = join(',', $p['subjects']);
            }
            if(isset($p['language'])) {
                $language = join(',', $p['language']);
            }
            if(isset($p['looking_to_work'])) {
                $looking_to_work = join(',', $p['looking_to_work']);
            }
            if(isset($p['willing_to_work'])) {
                $willing_to_work = join(',', $p['willing_to_work']);
            }
            if(isset($p['training'])) {
                $training = join(',', $p['training']);
            }
            if(isset($p['availability'])) {
                $availability = join(',', $p['availability']);
            }
            if(isset($p['optional_number'])){
                $optional_number = join(',',$p['optional_number']);
            }
            if(isset($p['age_group'])){
                $age_group = join(',',$p['age_group']);
            }
            if(isset($p['rate_type'])){
                $rate_type = join(',',$p['rate_type']);
            }
            if(isset($p['extra_field'])){
                $extra_field = join(',',$p['extra_field']);
            }

            if ($p['profile_description'] || $p['file'] || $p['pdf'] || $p['facility_pic']) {
                $profileStatus = 0;
                $email = 1;
            }
            $insert = array(
                'profile_status' => $profileStatus,
                'subjects' => $subjects,
                'language' => $language,
                'optional_number' => $optional_number,
                'looking_to_work' => $looking_to_work,
                'willing_to_work' => $willing_to_work,
                'caregiverage_from'  => isset($p['caregiverage_from'])?$p['caregiverage_from']:0,
                'caregiverage_to'  => isset($p['caregiverage_from'])?$p['caregiverage_to']:0,
                'type_of_therapy' => isset($p['type_of_therapy']) ? $p['type_of_therapy'] : '',
                'licence_information' => isset($p['licence_information']) ? $p['licence_information'] : '',
                'accept_insurance' => isset($p['accept_insurance']) ? $p['accept_insurance'] : 2,
                'established' => isset($p['established']) ? $p['established'] : '',
                'certification' => isset($p['certification']) ? $p['certification'] : '',
                'number_of_children' => isset($p['number_of_children']) ? $p['number_of_children'] : '',
                'number_of_staff' => isset($p['number_of_staff']) ? $p['number_of_staff'] : '',
                'age_group' => isset($age_group)?$age_group:'',
                'experience' => isset($p['experience']) ? $p['experience'] : '',
                'training' => $training,
                'hourly_rate' => isset($p['hourly_rate']) ? $p['hourly_rate'] : '',
                'availability' => $availability,
                'profile_description' => isset($p['profile_description']) ? $p['profile_description'] : '',
                'religious_observance' => isset($p['religious_observance']) ? $p['religious_observance'] : '',
                'agree_bg_check' => isset($p['bg_check'])? $p['bg_check'] : '',
                'job_position' => isset($p['job_position'])? $p['job_position'] : '',
                'driver_license' => isset($p['driver_license']) ? 1 : 0,
                'vehicle' => isset($p['vehicle']) ? 1 : 0,
                'pick_up_child' => isset($p['pick_up_child']) ? 1 : 0,
                'cook' => isset($p['cook']) ? 1 : 0,
                'basic_housework' => isset($p['basic_housework']) ? 1 : 0,
                'sick_child_care' => isset($p['sick_child_care']) ? 1 : 0,
                'homework_help' => isset($p['homework_help']) ? 1 : 0,
                'on_short_notice' => isset($p['on_short_notice']) ? 1 : 0,
                'clean' => isset($p['clean']) ? 1 : 0,
                'wash' => isset($p['wash']) ? 1 : 0,
                'iron' => isset($p['iron']) ? 1 : 0,
                'fold' => isset($p['fold']) ? 1 : 0,
                'bath_children' => isset($p['bath_children']) ? 1 : 0,
                'bed_children' => isset($p['bed_children']) ? 1 : 0,
                'references' => isset($p['references']) ? $p['references'] : 0,
                'photo_of_child' => isset($p['photo_of_child']) ? $p['photo_of_child'] : 0,
                'organiztion_name' => isset($p['organization_name']) ? $p['organization_name'] : '', 
                'organization_type' => isset($p['organization_type'])? $p['organization_type'] : '',
                'smoker' => isset($p['smoker']) ? $p['smoker'] : '',
                //'contact_number' => isset($p['contact_number'])? $p['contact_number'] : '',//NO
                //'gender' => isset($p['gender'])? $p['gender'] : '',//No
                //'age' => isset($p['age'])? $p['age'] : '',//NO
                //'location' => isset($p['location'])? $p['location'] : '',//NO
                'gender_of_caregiver' => isset($p['gender_of_caregiver']) ? $p['gender_of_caregiver'] : 1,//No
                'conditions_of_patient' => $conditions,
                'licence_information'   => isset($p['licence_information'])?$p['licence_information']:'',
                'number_of_rooms' => isset($p['number_of_rooms'])?$p['number_of_rooms']:'',
                'personal_hygiene' => isset($p['personal_hygiene'])?$p['personal_hygiene']:'',
                'references' => isset($p['references']) ? $p['references'] : 2,
                'reference_file' => isset($p['file'])?$p['file']:'',
                'sunday_from'   => isset($p['sunday_from'])?$p['sunday_from']:'',
                'sunday_to'   => isset($p['sunday_to'])?$p['sunday_to']:'',
                'rate_type' => isset($p['rate']) && isset($p['rate_type']) ? $p['rate_type']:'',
                'mid_days_from' => isset($p['mid_days_from'])?$p['mid_days_from']:'',
                'mid_days_to'   => isset($p['mid_days_to'])?$p['mid_days_to']:'',
                'friday_from'   => isset($p['friday_from'])?$p['friday_from']:'',
                'friday_to'   => isset($p['friday_to'])?$p['friday_to']:'',
                'vacation_days'   => isset($p['vacation_days'])?$p['vacation_days']:'',
                'pdf'           => isset($p['pdf'])?$p['pdf']:'',
                'extended_hrs'  => isset($p['extended_hrs_available'])?$p['extended_hrs_available']:'',
                'flexible_hours'=> isset($p['flexible_hours'])?$p['flexible_hours']:'',
                'payment_option'   => isset($p['payment_option'])?$p['payment_option']:'',
                'days_from' => isset($p['days_from'])?$p['days_from']:'',
                'days_to' => isset($p['days_to'])?$p['days_to']:'',
                'hours_from'  => isset($p['hours_from'])?$p['hours_from']:'',
                'hours_to'=> isset($p['hours_to'])?$p['hours_to']:'',
                'caregiverage_from' => isset($p['caregiverage_from'])?$p['caregiverage_from']:'',
                'caregiverage_to'   => isset($p['caregiverage_to'])?$p['caregiverage_to']:'',
                'rate'              => isset($p['rate'])?$p['rate']:'',
                'rate_type'         => isset($rate_type)?$rate_type:'',
                'facility_pic'      => isset($p['facility_pic'])?$p['facility_pic']:'',
                'sub_care'              => isset($p['sub_care']) ? $p['sub_care'] : '',
                'extra_field'       => isset($extra_field) ? $extra_field : ''
            );

            if(check_user()) {
              
                    if(isset($p['start_date'])){
                        $insert['start_date'] = $p['start_date'];
                    }
                    if(isset($p['job_description'])){
                        $insert['job_description'] = $p['job_description'];
                    }
                    $this->db->where(array('user_id'=>$id,'care_type'=>$care_type));
                    $q = $this->db->update('tbl_userprofile',$insert);
                    
                    
                    $this->db->where('id',$id);
                    $res = $this->db->get('tbl_user');
                    $user_data = $res->result_array();
                    if($q){
                        $insert_user = array(
                            'contact_number' => isset($p['contact_number'])? $p['contact_number'] : $user_data[0]['contact_number'],
                            'gender' => isset($p['gender'])? $p['gender'] : $user_data[0]['gender'],
                            'age' => isset($p['age'])? $p['age'] : $user_data[0]['age'],
                            'location' => isset($p['location'])? $p['location'] : $user_data[0]['location'],
                            'name' => isset($p['name']) ? $p['name'] : $user_data[0]['name'],
                            'zip' => isset($p['zip']) ? $p['zip'] : $user_data[0]['zip'],
                            'neighbour' => isset($p['neighbour']) ? $p['neighbour'] : $user_data[0]['neighbour'],
                            'lat'=>isset($p['lat']) ? $p['lat'] : $user_data[0]['lat'],
                            'lng'=>isset($p['lng']) ? $p['lng'] : $user_data[0]['lng'],
                            'hasAd' => 1
                        );
                        
                        //print_r($insert_user); exit;
                    
                        $this->db->where(array('id'=>$id));
                        $q2 = $this->db->update('tbl_user',$insert_user);                        
                        
                    }
                }
            }
                
    }

    public function getUserPackage($uid){
        $sql    = "select package_id from tbl_user where id = $uid";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }

    public function insert_new_profile($data){
        if($this->db->insert('tbl_userprofile',$data)){
            //return TRUE;
             return $this->db->insert_id();
        }
        else{
            return FALSE;
        }
    }
    
    public function getSearches(){
            $sql    = "select * from tbl_searchhistory";
            $query  = $this->db->query($sql);
            $res    = $query->result_array();
            if($res) 
                return $res;
            else
                return false;
    }
    
    public function getSearchAlerts(){
        $sql    = "select * from tbl_searchhistory where createAlert = 1";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res) 
            return $res;
        else
            return false;
    }

    public function getHistory($uid){
        $sql    = "select tbl_searchhistory.*, tbl_care.service_name from tbl_searchhistory join tbl_care on tbl_searchhistory.care_type = tbl_care.id where user_id = $uid and  searcheddate < NOW() order by searcheddate desc";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }

    public function getCurrentSearches($uid){
        $sql = "select *  from tbl_searchhistory where user_id = $uid  and searcheddate = CURDATE() order by id desc";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;

    }



    public function getAlertData($id){
         // if(is_array($datas)){
        //   foreach($datas as $data):
        //     $neighbour          = $data['neighbor'];
        //     $year_experience    = $data['year_experience'];
        //     $gender             = $data['gender'];
        //     $smoker             = $data['smoker'];
        //     $language           = $data['language'];
        //     $observance         = $data['observance'];
        //     $number_of_children = $data['number_of_children'];
        //     $morenum            = $data['morenum'];
        //     $age_group          = $data['age_group'];
        //     $looking_to_work    = $data['looking_to_work'];
        //     $training           = $data['training'];
        //     $availability       = $data['availability'];
        //     $driver_license     = $data['driver_license'];
        //     $vehicle            = $data['vehicle'];
        //     $pick_up_child      = $data['pick_up_child'];
        //     $cook               = $data['cook'];
        //     $homework_help      = $data['homework_help'];
        //     $basic_housework    = $data['basic_housework'];
        //     $sick_child_care    = $data['sick_child_care'];
        //     $on_short_notice    = $data['on_short_notice'];
        //     $caregiverage_from  = $data['caregiverage_from'];
        //     $caregiverage_to    = $data['caregiverage_to'];
        //     $start_date         = $data['start_date'];
        //     $willing_to_work    = $data['willing_to_work'];
        //     $subjects           = $data['subjects'];
        //     $accept_insurance   = $data['accept_insurance'];
        //     $rate               = $data['rate'];
        //     $rate_type          = $data['rate_type'];
        //     $gender_of_caregiver = $data['gender_of_caregiver'];
        //     $care_type              = $data['care_type'];

            //$sql = "select * from tbl_user left outer join tbl_userprofile on tbl_userprofile.user_id = tbl_user.id where tbl_userprofile.care_type = $care_type";
            // if($neighbour!= '')
            //     $sql .= " and tbl_user.neighbour like '$neighbour%'";
            // if($year_experience !='')
            //     $sql .= " or tbl_user.year_experience = $year_experience";
            // if($gender !='')
            //     $sql .= " or tbl_user.gender = $gender";
            // if($smoker != 0)
            //     $sql .= " or tbl_userprofile.smoker = $smoker";
            // if($language !='')
            //     $sql .= " or tbl_userprofile.language = '$language'";
            // if($observance !='')
            //     $sql .= " or tbl_userprofile.religious_observance = $observance";
            // if($number_of_children !='')
            //     $sql .= " or tbl_userprofile.number_of_children = $number_of_children";
            // if($morenum !='')
            //     $sql .= " or tbl_userprofile.optional_number = '$morenum'";
            // if($age_group !='')
            //     $sql .= " or tbl_userprofile.age_group = '$age_group'";
            // if($looking_to_work !='')
            //     $sql .= " or tbl_userprofile.looking_to_work = '$looking_to_work'";
            // if($training !='')
            //     $sql .= " or training = '$training'";
            // if($availability !='')
            //     $sql .= " or availability = '$availability'"; 
            // if($driver_license != 0)
            //     $sql .= " or driver_license = $driver_license";
            // if($vehicle != 0)
            //     $sql .= " or vehicle = $vehicle";
            // if($pick_up_child != 0)
            //     $sql .= " or pick_up_child = $pick_up_child";
            // if($cook != 0)
            //     $sql .= " or cook = $cook";
            // if($homework_help != 0)
            //     $sql .= " or homework_help = $homework_help";
            // if($sick_child_care != 0)
            //     $sql .= " or sick_child_care = $sick_child_care";
            // if($on_short_notice != 0)
            //     $sql .= " or on_short_notice = $on_short_notice";
            // if($caregiverage_from !='')
            //     $sql .= " or caregiverage_from = $caregiverage_from";
            // if($caregiverage_to !='')
            //     $sql .= " or caregiverage_to = $caregiverage_to";
            // if($start_date !='')
            //     $sql .= " or start_date = $start_date";
            // if($willing_to_work !='')
            //     $sql .= " or willing_to_work = $willing_to_work";
            // if($subjects !='')
            //     $sql .= " and subjects = $subjects";
            // if($accept_insurance != 0)
            //     $sql .= " or accept_insurance = $accept_insurance";
            // if($rate !='')
            //     $sql .= " or rate = $rate";
            // if($rate_type != 0)
            //     $sql .= " and rate_type = '$rate_type'";
            // if($gender_of_caregiver != 0)
            //     $sql .= " or gender_of_caregiver = $gender_of_caregiver";
            
          //    $query = $this->db->query($sql);
          //    $res = $query->result_array();
          //       if($res)
          //           return $res;
          //       else
          //           return false;
          // endforeach;
        // }else{
        //     return false;
        // }
            
        $sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.user_id = $id";
        //echo $sql;exit;
        $query = $this->db->query($sql);
        $res = $query->result_array();
        //print_rr($res);
               if($res)
                   return $res;
                else
                    return false;
    }


    public function care(){
        $sql = "select * from tbl_care";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else
            return false;

    }
    //public function get_extra_profile(){
    public function get_all_profile(){    
        $this->db->join('tbl_care','tbl_userprofile.care_type = tbl_care.id','left');
        $this->db->where('user_id',$this->session->userdata('current_user'));
        $this->db->order_by("tbl_userprofile.id", "desc");
        $query = $this->db->get('tbl_userprofile');
        return $query->result();        
    }

   /* public function get_current_profile(){
         $this->db->join('tbl_care','tbl_user.care_type = tbl_care.id','left');
        $this->db->where('tbl_user.id',$this->session->userdata('current_user'));
        $this->db->select('service_name,care_type,account_category');
        $query = $this->db->get('tbl_user');
        return $query->row();        
    }*/

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
        $sql    = "select * from tbl_favorites where user_id = $id";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    public function existing_profile_check($account_category,$care_type){
        //$i=0;
        $this->db->where('user_id',$this->session->userdata('current_user'));
        //$this->db->where('account_category',$account_category);
        $this->db->where('care_type',$care_type);
        $query = $this->db->get('tbl_userprofile');
        if($query->num_rows() > 0){
            return false;
        }
        else{
            return TRUE;
        }
        /*$query->free_result();

        $this->db->where('id',$this->session->userdata('current_user'));
        $this->db->where('account_category',$account_category);
        $this->db->where('care_type',$care_type);
        $query = $this->db->get('tbl_user');
        if($query->num_rows() > 0){
            $i=1;
        }
        if($i == 1){
            return FALSE;
        }
        else{
            return TRUE;
        }*/
    }
    public function delete_this_profile($user_id,$care_type){
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
    }//CODE BY CHAND

    public function get_account_category(){
        $this->db->where('id',$this->session->userdata('current_user'));
        $this->db->select('account_category');
        $query = $this->db->get('tbl_userprofile');
        return $query->row();
    } 

    public function get_all_profile_by_id($id){
        $this->db->where('user_id',$id);
        $query = $this->db->get('tbl_userprofile');
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }
    public function get_my_account_category($id){
        $this->db->where('user_id',$id);
        $query = $this->db->get('tbl_account_category');
        return $query->result_array();
    }   
    
    public function orderByCare($care_id,$lat,$lng){
        $sql    = "select* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.care_type = $care_id and tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like '%$lng%'";
        $res  = $this->db->query($sql);
        $data   = $res->result_array();
    
    foreach ($data as $d){
        $user_id = $d['user_id'];
        $this->db->where(array('id'=>$user_id,'status'=>1));
        $res2 = $this->db->get('tbl_user');
        $data2 = $res2->result_array();
        $num_rows = $res2->num_rows();
        foreach ($data2 as $d2)
        if($num_rows>0){
            $new_data[] = array_merge($d,$d2);
            
        }
        
    }
    //$query = $this->db->query($sql);
     //$res     = $query->result_array();
        if(isset($new_data))
            return $new_data;
        else 
            return false;
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

    public function getPersonalDetails($idhash){
        $sql = "SELECT tbl_user.* , tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE SHA1( tbl_user.id ) =  '$idhash'";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }
    public function job_or_profile(){
        $ac = $this->session->userdata('account_category');
        $oc = $this->session->userdata('organization_care'); 
        if($ac == 1){ 
            $profile1='Profile';
        }
        if($ac ==2){ 
            $profile1='Job';
        }
        if($ac=3){
            if($oc ==1){
                $profile1='Profile';
            }
            if($oc==2){
                $profile1='Job';
            }
        }
        return $profile1;
      }

      public function therapistsearch($data,$latitude,$longitude){
        

        if(isset($data)){
            $neighbour = $data['neighbour'];
            $caregiverage_from = $data['caregiverage_from'];
            $caregiverage_to = $data['caregiverage_to'];
            $gender = $data['gender'];
            $language = $data['lang'];
            $observance = $data['observance'];
            $insurance = $data['insurance'];
            $care_type = $data['care_type'];
        }
        
        $sql = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status=1 and tbl_userprofile.care_type=7 ";
         
         if($data['smoker']!=''){
				    $sql .= " and tbl_userprofile.smoker=".$data['smoker'];
            }
         if($data['caregiverage_from'] && $data['caregiverage_to']){
                $sql .= " and tbl_user.age between ".$data['caregiverage_from'].' and '.$data['caregiverage_to'];
            }
         if($data['gender'] && $data['gender'] != 3 ){                
        			     $sql .=" and tbl_user.gender=".$data['gender'];
        			} 

         if($language!=''){
            $langs = explode(',',$language);
                if(is_array($langs)){
                    foreach($langs as $lang):
                        $sql .= " and find_in_set('$lang',tbl_userprofile.language)";
                    endforeach;
                }
         }
         if($observance !=''){
                $observances = explode(',',$observance);
                if(is_array($observances)){
                    foreach($observances as $obs):
                        $sql .= " and find_in_set('$obs', tbl_userprofile.religious_observance)";
                    endforeach;
                }
         }
         if($insurance!=''){
            $sql .= " and tbl_userprofile.accept_insurance = $insurance";
         }
         $sql .=" order by distance asc";
         $query = $this->db->query($sql);
         $res =  $query->result_array();
         if($res)
            return $res;
        else
            return false;

      }

      public function searchbylocation($latitude,$longitude){
            $sql    = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type = 7 and tbl_user.lat like '$latitude%' and tbl_user.lng like '$longitude%' order by distance asc";
            $query  =  $this->db->query($sql);
            $res    = $query->result_array();
            if($res)
                return $res;
            else
                return false;
    }

    public function getProfilePicture($id){
        $sql    = "select profile_picture from tbl_user where id = $id";
        $query  = $this->db->query($sql);
        $res = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }

    public function getSuperUser(){
        $user=$this->db->where('id',1)->get('tbl_admin')->row();
        return $user;

    }


    public function get($id){
        
    }

    public function get_by($table,$where){
        return $this->db->where($where)->get($table)->result();


    }
}