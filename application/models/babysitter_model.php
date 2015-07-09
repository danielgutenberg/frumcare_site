<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Babysitter_model extends CI_Model {
	
		public function __construct(){
			parent:: __construct();
		}


		public function getAllBabySitter($latitude,$longitude,$limit,$offset){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 1 AND tbl_userprofile.care_type =1 having distance <50 order by distance asc limit $offset,$limit";
			$query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
        public function searchbylocation($latitude,$longitude,$limit,$offset){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 1 AND tbl_userprofile.care_type =1 having distance <50 order by distance asc limit $offset,$limit";
			$query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}

		public function searchByNeighborhood($neighborhood){
			$sql 	= "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_user.neighbour like '$neighborhood%' and tbl_userprofile.account_category=1 and tbl_userprofile.care_type=1";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
		
		public function searchAll($postdata,$latitude,$longitude){
			$sql  = "select *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.account_category = 1";            			
            if($postdata['gender'] && $postdata['gender'] != 3 ){                
			     $sql .=" and tbl_user.gender=".$postdata['gender'];
			}
            if(!empty($postdata['smoker']) && $postdata['smoker']!='undefined')
				$sql .= " and tbl_userprofile.smoker=".$postdata['smoker'];
			if($postdata['language']){           
                  $lang = explode(',',$postdata['language']);
                  if(is_array($lang)){
                        foreach($lang as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.language)"; 
  	                     }
                    }
            }
            if($postdata['observance']){
                 $observance = explode(',',$postdata['observance']);
                  if(is_array($observance)){
                        foreach($observance as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.religious_observance)"; 
  	                     }
                    }
            }
			if($postdata['number_of_children'])
				$sql .= " and tbl_userprofile.number_of_children >=".$postdata['number_of_children'];
			if($postdata['morenum']){				
                 $optional_number = explode(',',$postdata['morenum']);
                  if(is_array($optional_number)){
                        foreach($optional_number as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.optional_number)"; 
  	                     }
                    }
            }
			if($postdata['age_group']){				
                 $age_group = explode(',',$postdata['age_group']);
                  if(is_array($age_group)){
                        foreach($age_group as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.age_group)"; 
  	                     }
                    }
            }
			if($postdata['looking_to_work']){				
                 $looking_to_work = explode(',',$postdata['looking_to_work']);
                  if(is_array($looking_to_work)){
                        foreach($looking_to_work as $data){
                            $data1 = mysql_real_escape_string($data);
                            $sql .= " and FIND_IN_SET('$data1',tbl_userprofile.looking_to_work)"; 
  	                     }
                    }
            }
			if($postdata['year_experience'])
				$sql .= " and tbl_userprofile.experience>=".$postdata['year_experience'];
			if($postdata['training']){				
                 $training = explode(',',$postdata['training']);
                  if(is_array($training)){
                        foreach($training as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.training)"; 
  	                     }
                    }
            }
			if($postdata['availability']){				
                 $availability = explode(',',$postdata['availability']);
                  if(is_array($availability)){
                        foreach($availability as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.availability)"; 
  	                     }
                    }
            }
			if($postdata['driver_license'])
				$sql .= " and tbl_userprofile.driver_license=".$postdata['driver_license'];
			if($postdata['vehicle'])
				$sql .= " and tbl_userprofile.vehicle=".$postdata['vehicle'];
			if($postdata['pick_up_child'])
				$sql .= " and tbl_userprofile.pick_up_child=".$postdata['pick_up_child'];
			if($postdata['cook'])
				$sql .= " and tbl_userprofile.cook=".$postdata['cook'];
			if($postdata['basic_housework'])
				$sql .= " and tbl_userprofile.basic_housework=".$postdata['basic_housework'];
			if($postdata['homework_help'])
				$sql .= " and tbl_userprofile.homework_help=".$postdata['homework_help'];
			if($postdata['sick_child_care'])
				$sql .= " and tbl_userprofile.sick_child_care=".$postdata['sick_child_care'];
			if($postdata['on_short_notice'])
				$sql .= " and tbl_userprofile.on_short_notice=".$postdata['on_short_notice'];
            if($postdata['caregiverage_from'] && $postdata['caregiverage_to']){
                $sql .= " and tbl_user.age between ".$postdata['caregiverage_from'].' and '.$postdata['caregiverage_to'];
            }            
            if($postdata['start_date'])
				$sql .= " and tbl_userprofile.start_date='".$postdata['start_date']."'";
            //echo $sql;exit;
			//$sql .=" having distance <50 order by distance asc";
            $query 	= $this->db->query($sql);
			$res 	= $query->result_array();
            //var_dump($res);exit;
			if($res)
				return $res;
			else
				return false;
		}
		
		

		public function search($postdata,$latitude,$longitude){
			$sql  = "select *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.care_type=1";            			
            if($postdata['gender'] && $postdata['gender'] != 3 ){                
			     $sql .=" and tbl_user.gender=".$postdata['gender'];
			}
            if(!empty($postdata['smoker']) && $postdata['smoker']!='undefined')
				$sql .= " and tbl_userprofile.smoker=".$postdata['smoker'];
			if($postdata['language']){           
                  $lang = explode(',',$postdata['language']);
                  if(is_array($lang)){
                        foreach($lang as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.language)"; 
  	                     }
                    }
            }
            if($postdata['observance']){
                 $observance = explode(',',$postdata['observance']);
                  if(is_array($observance)){
                        foreach($observance as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.religious_observance)"; 
  	                     }
                    }
            }
			if($postdata['number_of_children'])
				$sql .= " and tbl_userprofile.number_of_children >=".$postdata['number_of_children'];
			if($postdata['morenum']){				
                 $optional_number = explode(',',$postdata['morenum']);
                  if(is_array($optional_number)){
                        foreach($optional_number as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.optional_number)"; 
  	                     }
                    }
            }
			if($postdata['age_group']){				
                 $age_group = explode(',',$postdata['age_group']);
                  if(is_array($age_group)){
                        foreach($age_group as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.age_group)"; 
  	                     }
                    }
            }
			if($postdata['looking_to_work']){				
                 $looking_to_work = explode(',',$postdata['looking_to_work']);
                  if(is_array($looking_to_work)){
                        foreach($looking_to_work as $data){
                            $data1 = mysql_real_escape_string($data);
                            $sql .= " and FIND_IN_SET('$data1',tbl_userprofile.looking_to_work)"; 
  	                     }
                    }
            }
			if($postdata['year_experience'])
				$sql .= " and tbl_userprofile.experience>=".$postdata['year_experience'];
			if($postdata['training']){				
                 $training = explode(',',$postdata['training']);
                  if(is_array($training)){
                        foreach($training as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.training)"; 
  	                     }
                    }
            }
			if($postdata['availability']){				
                 $availability = explode(',',$postdata['availability']);
                  if(is_array($availability)){
                        foreach($availability as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.availability)"; 
  	                     }
                    }
            }
			if($postdata['driver_license'])
				$sql .= " and tbl_userprofile.driver_license=".$postdata['driver_license'];
			if($postdata['vehicle'])
				$sql .= " and tbl_userprofile.vehicle=".$postdata['vehicle'];
			if($postdata['pick_up_child'])
				$sql .= " and tbl_userprofile.pick_up_child=".$postdata['pick_up_child'];
			if($postdata['cook'])
				$sql .= " and tbl_userprofile.cook=".$postdata['cook'];
			if($postdata['basic_housework'])
				$sql .= " and tbl_userprofile.basic_housework=".$postdata['basic_housework'];
			if($postdata['homework_help'])
				$sql .= " and tbl_userprofile.homework_help=".$postdata['homework_help'];
			if($postdata['sick_child_care'])
				$sql .= " and tbl_userprofile.sick_child_care=".$postdata['sick_child_care'];
			if($postdata['on_short_notice'])
				$sql .= " and tbl_userprofile.on_short_notice=".$postdata['on_short_notice'];
            if($postdata['caregiverage_from'] && $postdata['caregiverage_to']){
                $sql .= " and tbl_user.age between ".$postdata['caregiverage_from'].' and '.$postdata['caregiverage_to'];
            }            
            if($postdata['start_date'])
				$sql .= " and tbl_userprofile.start_date='".$postdata['start_date']."'";
            //echo $sql;exit;
			//$sql .=" having distance <50 order by distance asc";
            $query 	= $this->db->query($sql);
			$res 	= $query->result_array();
            //var_dump($res);exit;
			if($res)
				return $res;
			else
				return false;
		}

		public function countBabysitter($lat,$lon){
			$sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.care_type !=7 and tbl_userprofile.account_category = 1 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like'%$lon%' and tbl_userprofile.care_type = 1";
	        $query  = $this->db->query($sql);
	        $res = $query->num_rows();
	        if($res)
	            return $res;
	        else 
	            return false;
		}

	
	}
	
	/* End of file babysitter_model.php */
	/* Location: ./application/models/babysitter_model.php */
?>