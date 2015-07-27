<?php
class Common_care_model extends CI_Model
{
      public function sort($per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance){                                        
        if(empty($latitude) && empty($latitude)){
            $ip = $_SERVER['REMOTE_ADDR'];
            $ipdata = $this->getIPData($ip);
            if(is_array($ipdata)){
                $latitude = $ipdata['lat'];
                $longitude = $ipdata['lon'];                
            }else{
                die('Some error occured. We will fix it soon');
            }
        }
        $order_type = 'asc';
        if($option == 'tbl_userprofile.id'){
            $order_type = 'desc';
        }        
        $sql = "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  left outer join tbl_care on tbl_care.id = tbl_userprofile.care_type WHERE tbl_user.status = 1 and tbl_userprofile.profile_status = 1 ";                
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type and tbl_userprofile.account_category = $account_category";
        }
        else{
           if($account_category==1){
                $sql.=" and tbl_care.service_type = 1";
           }
           if($account_category==2){
                $sql.=" and and tbl_care.service_type = 2";
           }
           if($account_category ==3 ) {
                if(segment(1) == 'caregivers' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17";
                elseif(segment(1) == 'jobs' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type > 24";                
                else $sql .=" and (tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17) or tbl_userprofile.care_type > 24";
           }                      
        }
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }
        $sql.= " order by $option $order_type";
        $query = $this->db->query($sql);
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    public function paginate($position,$item_per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance){
        if(empty($latitude) && empty($latitude)){
            $ip = $_SERVER['REMOTE_ADDR'];
            $ipdata = $this->getIPData($ip);
            if(is_array($ipdata)){
                $latitude = $ipdata['lat'];
                $longitude = $ipdata['lon'];                
            }else{
                die('Some error occured. We will fix it soon');
            }
        }
        $order_type = 'asc';
        if($option == 'tbl_userprofile.id'){
            $order_type = 'desc';
        }        
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  WHERE tbl_user.status = 1 and tbl_userprofile.profile_status = 1 ";
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type";
        }
        else{
           if($account_category==1){
                $sql.=" and tbl_userprofile.care_type < 10";
           }
           if($account_category==2){
                $sql.=" and tbl_userprofile.care_type >16 and tbl_userprofile.care_type < 25";
           }   
           //if($account_category ==3) $sql .=" and (tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17) or tbl_userprofile.care_type > 24";
           if($account_category ==3 ) {
                if(segment(1) == 'caregivers' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17";
                elseif(segment(1) == 'jobs' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type > 24";                
                else $sql .=" and (tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17) or tbl_userprofile.care_type > 24";
           }         
        }
        $uri = $this->uri->segment(1);
        if($uri == 'careseeker_childcare'){
            $sql = " and tbl_userprofile.looking_to_work = 'Caregiving institution'";
        }
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }
        $sql.= " order by $option $order_type limit $position,$item_per_page";       
        $query = $this->db->query($sql);
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    public function getCount($latitude,$longitude,$account_category,$care_type,$distance){                
        if(empty($latitude) && empty($latitude)){
            $ip = $_SERVER['REMOTE_ADDR'];
            $ipdata = $this->getIPData($ip);
            if(is_array($ipdata)){
                $latitude = $ipdata['lat'];
                $longitude = $ipdata['lon'];                
            }else{
                die('Some error occured. We will fix it soon');
            }
        }
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  WHERE tbl_user.status = 1 and tbl_userprofile.profile_status = 1 ";
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type";
        }
        else{
           if($account_category==1){
                $sql.=" and tbl_userprofile.care_type < 10";
           }
           if($account_category==2){
                $sql.=" and tbl_userprofile.care_type >16 and tbl_userprofile.care_type < 25";
           }
           //if($account_category ==3) $sql .=" and (tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17) or tbl_userprofile.care_type > 24";
           if($account_category ==3 ) {
                if(segment(1) == 'caregivers' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17";
                elseif(segment(1) == 'jobs' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type > 24";                
                else $sql .=" and (tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17) or tbl_userprofile.care_type > 24";
           }                       
        }
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }                        
        $query = $this->db->query($sql);        
        return $query->num_rows();
                
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
}
