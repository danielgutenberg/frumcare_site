<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Seniorcaregiver_model extends CI_Model{
		public function __construct(){
			parent:: __construct();
		}

		public function getAllData($latitude,$longitude,$offset,$limit){
			$sql 	= "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 1 and tbl_userprofile.care_type = 5 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1  order by distance asc limit $offset,$limit";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
           public function searchbylocation($latitude,$longitude){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 1 AND tbl_userprofile.care_type = 5  order by distance asc";
			$query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
		public function search($search,$latitude,$longitude){
			if(is_array($search)){
				$care_type  		= $search['care_type'];
				$neighbour 			= $search['neighbour'];
				$caregiverage_from 	= $search['caregiverage_from'];
				$caregiverage_to 	= $search['caregiverage_to'];
				$gender 			= $search['gender'];
				$language 			= $search['languages'];
				$observance 		= $search['observance'];
				$min_exp 			= $search['min_exp'];
				$availability		= $search['availability'];
				$carelocation 		= $search['carelocation'];
				$trainings 			= $search['trainings'];
				$able_to_work		= $search['able_to_work'];
				$driver_license		= $search['driver_license'];
				$vehicle			= $search['vehicle'];
				$available 			= $search['available'];
                $start_date         = $search['start_date'];
			}

				$sql = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join  tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status=1 and tbl_userprofile.care_type=5";			

				if($search['caregiverage_from'] && $search['caregiverage_to']){
                    $sql .= " and tbl_user.age between ".$search['caregiverage_from'].' and '.$search['caregiverage_to'];
                }
                if($search['smoker']!=''){
				    $sql .= " and tbl_userprofile.smoker=".$search['smoker'];
                }
				if($search['gender'] && $search['gender'] != 3 ){                
				     $sql .=" and tbl_user.gender=".$search['gender'];
				}

				if($language!=''){
					$languages = explode(',',$language);
					if(is_array($languages)){
							$first = array_shift($languages);
		                	$sql .= " and (FIND_IN_SET('$first' ,tbl_userprofile.language)";
		                	foreach($languages as $data){
	                    		$sql .= " or FIND_IN_SET('$data',tbl_userprofile.language)";
		  	            	}
		  	            	$sql .= ")";
					}

				}

				if($observance){
	                $observance = explode(',',$observance);
	                if(is_array($observance)){
	                	if(!in_array('Any', $observance)) {
	                		$first = array_shift($observance);
		                	$sql .= " and (FIND_IN_SET('$first' ,tbl_user.caregiver_religious_observance)";
		                	foreach($observance as $data){
	                    		$sql .= " or FIND_IN_SET('$data',tbl_user.caregiver_religious_observance)";
		  	            	}
		  	            	$sql .= ")";
	                	}
	                }
	            }

				if($min_exp!=''){
					$sql .= " and tbl_userprofile.experience >= $min_exp";
				}

				if($availability!=''){
					$times = explode(',',$availability);
					if(is_array($times)){
						foreach($times as $time):
							$sql .=" and find_in_set('$time',tbl_userprofile.availability)";
						endforeach;
					}
				}
				if($carelocation!=''){
					$locations = explode(',',$carelocation);
					if(is_array($locations)){
						foreach($locations as $location):
							$sql .=" and find_in_set('$location',tbl_userprofile.looking_to_work)";
						endforeach;	
					}
				}

				if($trainings!=''){
					$training = explode(',',$trainings);
					foreach($training as $tran):
						$sql .=" and find_in_set('$tran',tbl_userprofile.training)";
					endforeach;
				}

				if($driver_license!=''){
					$sql .=" and tbl_userprofile.driver_license=$driver_license";
				}

				if($vehicle!=''){
					$sql .=" and tbl_userprofile.vehicle=$vehicle";
				}
				if($available!=''){
					$sql .=" and tbl_userprofile.on_short_notice=$available";
				}
                if($start_date)
				$sql .= " and tbl_userprofile.start_date='".$start_date."'";
                $sql .="  order by distance asc";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;

		}

		public function countSeniorcaregiver($lat,$lon){
			$sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.account_category = 1 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like'%$lon%' and tbl_userprofile.care_type = 5";
	        $query  = $this->db->query($sql);
	        $res = $query->num_rows();
	        if($res)
	            return $res;
	        else 
	            return false;
		}

	}

?>
