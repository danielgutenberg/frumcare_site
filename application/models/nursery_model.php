<?php
    class Nursery_model extends CI_Model{
        public function __construct(){
                parent:: __construct();
        }
        
        public function getAllData($limit,$offset,$latitude,$longitude){
            $sql = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 1 and tbl_userprofile.care_type = 3  and tbl_user.status=1 and tbl_userprofile.profile_status=1  order by distance limit $offset,$limit";
            $query = $this->db->query($sql);
            $res = $query->result_array();
            if($res)
                return $res;
            else
                return false;
        }
         public function searchbylocation($per_page,$offset,$latitude,$longitude){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 1 AND tbl_userprofile.care_type =3  order by distance asc";
			$query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
        
        public function search($data,$latitude,$longitude){
            if(is_array($data)){
                $neighbour  = $data['neighbour'];
                $fromage    = $data['caregiverage_from'];
                $toage      = $data['caregiverage_to'];
                $gender     = $data['gender'];
                $lang       = $data['languages'];
                $observance = $data['observance'];
                $ages       = $data['age_group'];
                $care_type  = $data['care_type'];
                $looking_to_work = $data['looking_to_work'];  
                
                $sql = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.care_type=3 and tbl_user.status = 1  and tbl_userprofile.profile_status = 1";                                      
                    if($data['caregiverage_from'] && $data['caregiverage_to']){
                        $sql .= " and tbl_user.age between ".$postdata['caregiverage_from'].' and '.$postdata['caregiverage_to'];
                    }
                    if($data['gender'] && $data['gender'] != 3 ){                
			     $sql .=" and tbl_user.gender=".$data['gender'];
			}                    
                    if(!empty($data['smoker']) && $data['smoker']!='undefined'){
				        $sql .= " and tbl_userprofile.smoker=".$data['smoker'];
                    }
                    if($lang!=''){
                        $langs = explode(',',$lang);
                        foreach($langs as $lang):
                            $sql .= " and find_in_set('$lang',tbl_userprofile.language)";
                        endforeach;
                    }
                    
                    if($observance!=''){
                        $observances = explode(',',$observance);
                        foreach($observances as $obs):
                            $sql .= " and find_in_set('$obs',tbl_userprofile.religious_observance)";
                        endforeach;
                    }
                    
                     if($ages!=''){
                        $age_groups = explode(',',$ages);
                        foreach($age_groups as $age_group):
                            $sql .= " and find_in_set('$age_group',tbl_userprofile.age_group)";
                        endforeach;
                    }
                    if($looking_to_work!=''){
                        $sql .= " and tbl_userprofile.looking_to_work = '$looking_to_work'";
                    }
                    $sql .="  order by distance asc";
                    $query = $this->db->query($sql);
                    $res = $query->result_array();
                    if($res)
                        return $res;
                    else
                        return false;
            }
        }

        public function countNursery($lat,$lon){
            $sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.care_type !=7 and tbl_userprofile.account_category = 1 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like'%$lon%' and tbl_userprofile.care_type = 3";
            $query  = $this->db->query($sql);
            $res = $query->num_rows();
            if($res)
                return $res;
            else 
                return false;
        }
    } 
?>