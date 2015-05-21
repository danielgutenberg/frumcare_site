<?php

class Common_Model extends CI_Model
{
    public function get_parent_pages(){
        $this->db->select('*');
        $q=$this->db->get_where('tbl_page_config',array('is_active' => 1, 'parent_id' => 0));
        return $q->result_array();
    }

    public function insert($table_name, $data, $return_id = false){   
        $q = $this->db->insert($table_name, $data);
        if($return_id)
            return $this->db->insert_id();
        return $q ? true : false;
    }

    public function get_all($table_name, $select_active = ''){
        $this->db->order_by('id', 'DESC');
        if($select_active != '') {
            $this->db->where('is_active', '1');
        }
        $q = $this->db->get($table_name);
        return ($q->num_rows() > 0) ? $q->result_array() : '';
    }

    public function get_where($table_name, $condition, $order = ''){
        if($order != '')
              $this->db->order_by($order);
         $q = $this->db->get_where($table_name, $condition)->result_array();

        return (count($q) > 0) ? $q : '';
    }

    public function update($table_name, $data, $condition, $return_id = false){
        $this->db->where($condition);
        $q = $this->db->update($table_name, $data);
        if($return_id)
            return $condition['id'];
        return $q ? true : false;
    }

    public function delete_data($table_name, $condition){
        $q = $this->db->delete($table_name, $condition);
        return $q ? true : false;
    }

    public function set_is_active($table_name, $id, $value){
        $data = array(
            'is_active' => ($value == 0) ? 1 : 0
        );
        $this->db->where('id', $id);
        $this->db->update($table_name, $data);
        return;
    }

    function get_count($table_name, $condition = array()){
        if(!empty($condition)) {
            $this->db->where($condition);
        }
        return $this->db->get($table_name)->num_rows();
    }

    function verify_email($table_name, $condition1 = array(), $condition2 = array()){
        if(!empty($condition2)){
            $q = $this->db->get_where($table_name, $condition1)->num_rows();
            if($q == 0) {
                $q = $this->db->get_where($table_name, $condition2)->num_rows();
                $return = ($q == 0) ? 1 : 0;
            } else {
                $return = 1;
            }
        } else {
            $q = $this->db->get_where($table_name, $condition1)->num_rows();
            $return = ($q == 0) ? 1 : 0;
        }
        return $return;
    }

    function confirm_email($table_name, $hash){
        $q = $this->db->get_where($table_name, array('SHA1(email)' => $hash));
        return $q->num_rows() == 1 ? $q->result_array() : false;
    }

    public function getAdminEmails(){
        $sql = "select contact_email1, contact_email2,contact_email3,contact_email4,contact_email5 from tbl_website_config where enable_notifications = 1";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        return $res;
    }

    public function getCountries(){
        $sql = "select * from tbl_countries";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        return $res;   
    }

    public function getCareType(){
        $sql = "select * from tbl_care";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        return $res;
    }

    public function create_slug($fname){
        //Lower case everything
        $string1 = strtolower($fname);
        //Make alphanumeric (removes all other characters)
        $string1 = preg_replace("/[^a-z0-9_\s-]/", "", $fname);
        //Clean up multiple dashes or whitespaces
        $string1 = preg_replace("/[\s-]+/", " ", $fname);
        //Convert whitespaces and underscore to dash
        $string1 = preg_replace("/[\s_]/", "-", $fname);


        $uri = strtolower($string1);

        $sql = "select count(*) as num from tbl_user where uri LIKE '%$uri%'";
        $q = $this->db->query($sql);
        $res = $q->row_array();
        if($res['num'] > 0){
           $val = $uri.'-'.$res['num'];

           return $val;
        }else{
               $val = $uri;
               return $val;
        }        
    }

    public function getAllUserLogs(){
        $sql = "select * from tbl_user_logs";
        $query = $this->db->query($sql);
        $res = $query->result_array();
        if($res) return $res;
        else return false;
    }

    public function sendemail($email,$subject,$message){
        $config = Array(
                         // 'protocol' => 'smtp',
                         // 'smtp_host' => 'ssl://smtp.googlemail.com',
                         // 'smtp_port' => 465,
                         // 'smtp_user' => 'frumcare2015@gmail.com', //change it to yours
                         // 'smtp_pass' => 'frumcare.com', // change it to yours
                          'mailtype' => 'html',
                          'charset' => 'iso-8859-1',
                          'wordwrap' => TRUE
                        );
                        
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");      
        $this->email->from('info@frumcare.com', 'FRUMCARE');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function getNextRecord($table_name,$cur_id){
        $sql = "SELECT id FROM $table_name WHERE id > $cur_id ORDER BY id LIMIT 1";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
    }

      public function getPreviousRecord($table_name,$cur_id){
        $sql = "SELECT id FROM $table_name WHERE id < $cur_id ORDER BY id DESC LIMIT 1;";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
    }

    public function pager($limit,$url){
        $this->load->library('pagination');
        
        $config['base_url'] = $url;
        $config['total_rows'] =  $this->db->where('status', 1)->count_all_results('tbl_user');
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<div class="navigations">';
        $config['full_tag_close'] = '</div>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<span class="in-active">';
        $config['prev_tag_close'] = '</span>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<span class="in-active">';
        $config['next_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></span>';
        $config['num_tag_open'] = '<span class="in-active">';
        $config['num_tag_close'] = '</span>';
        $config['first_tag_open'] = '<span class="in-active">';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="in-active">';
        $config['last_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
        return $this->pagination->create_links();

    }

    public function get_care($id,$service_by){
        $sql = "select * from tbl_care where service_type = $id and service_by = $service_by order by display_order asc";
        $query = $this->db->query($sql);
        $res = $query->result_array();
            if($res)
                return $res;
            else 
                return false;

    }

    public function getIPData($ip){
        //$ip='119.6.144.74'; //ip of china
        //$ip='202.166.205.143'; //ip of kathmandu        
        //$location = file_get_contents('http://freegeoip.net/json/'.$ip);
        //$ip='109.226.44.128';isareal
        $location = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));                                
        if($location){
            if(empty($location['city'])){            
                $lat = $location['lat'];
                $lng = $location['lon'];                                            
                $json = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
                $json_data = json_decode($json);                                
                $location['city'] = $json_data->results[3]->formatted_address;                                
            }            
            return $location;            
        }                                                           
         else{
            $new_data = @unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));                        
            if($new_data){
                $location2 = array(
                            'lat'           => $new_data['geoplugin_latitude'],
                            'lon'           => $new_data['geoplugin_longitude'],
                            'city'          => $new_data['geoplugin_city'],
                            'regionName'    => $new_data['geoplugin_regionName'],                            
                            'country'       => $new_data['geoplugin_countryName'],
                        );
                 if(empty($location2['city'])){            
                    $lat = $location2['lat'];
                    $lng = $location2['lon'];                                            
                    $json2 = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
                    $json_data2 = json_decode($json2);                                
                    $location2['city'] = $json_data2->results[3]->formatted_address;                                
                }                                            
                return $location2;
            }
            else{
                return false;    
                            
            }                                                                         
         }    
    }

    function getLongitudeAndLatitude($address){
      $prepAddr = str_replace(' ','+',$address);
      $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
      $output= json_decode($geocode);
      if($output){
        return $output;
      }else{
        return false;
      }
        
    }


    public function getdistance($lat1, $lon1, $lat2, $lon2, $unit){
        if($lat2 == '')
                $lat2 = 0;
          if($lon2 == '')
                $lon2 = 0;   
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
            return ($miles * 1.609344);
          }else if ($unit == "N") {
              return ($miles * 0.8684);
          }else {
                return $miles;
            }
    }

    public function getAllProfileImages(){
        $sql    = "select id, name, profile_picture, profile_picture_status from tbl_user order by id desc";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res){
            return $res;
        }else{
            return false;
        }

    }

    public function getSEODATA(){
        $sql    = "select * from tbl_generic_seo where isActive = 1";
        $query  = $this->db->query($sql);
        $res    = $query->row_array();
        if($res)
            return $res;
        else 
            return false;
    }

    public function getRoleAccessByRoleName($rolename){
        $sql        = "select * from tbl_adminrole where role_name='$rolename'";
        $query      = $this->db->query($sql);
        $res        = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    function subscribe(){
        $sub_name = $_GET['sub_name'];
        $sub_email = $_GET['sub_email'];
        
        $insert = array(
            'name' => $sub_name,
            'email' => $sub_email,
        );
        $num_rows = $this->db->get_where('tbl_newlettersubscription',array('email'=>$sub_email))->num_rows();
        if($num_rows>0){
            return false;
        }else{
            $this->db->insert('tbl_newlettersubscription',$insert);
            return true;
        }
        
    }

    public function getAdAdminEmails(){
        $sql    = "SELECT email1 FROM tbl_admin LEFT OUTER JOIN tbl_adminrole ON FIND_IN_SET('userprofile', tbl_adminrole.access)WHERE tbl_admin.role = tbl_adminrole.role_name AND tbl_admin.status = 1";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($query)
            return $query->result_array();
        else
            return false;

    }

    public function getUserAdmiEmails(){
        $sql    = "SELECT email1 FROM tbl_admin LEFT OUTER JOIN tbl_adminrole ON FIND_IN_SET('viewusers', tbl_adminrole.access)WHERE tbl_admin.role = tbl_adminrole.role_name AND tbl_admin.status = 1";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }

     public function getTicketAdmiEmails(){
        $sql    = "SELECT email1 FROM tbl_admin LEFT OUTER JOIN tbl_adminrole ON FIND_IN_SET('replyticket', tbl_adminrole.access)WHERE tbl_admin.role = tbl_adminrole.role_name AND tbl_admin.status = 1";
        $query  = $this->db->query($sql);
        $res    = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    }
    
    public function getMyLocation($user_id){
        $sql    = "select lat,lng,location from tbl_user where  id = $user_id";
        $query  = $this->db->query($sql);
        $res = $query->result_array();
        if($res)
            return $res;
        else
            return false;
    } 

    public function getEmailAddressById($uri){
        $sql = "select * from tbl_user where uri = '$uri' and status = 1";
        $query  = $this->db->query($sql);
        $res = $query->row_array();
        if($res)
            return $res;
        else
            return false;
    }


}
