<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Cleaningcompany_model extends CI_Model {
	   public function __construct(){
			parent:: __construct();
		}

      public function getAllcleaningcompany($latitude,$longitude,$limit,$start){
		  	$sql 	= "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type = 15  order by distance asc limit $start,$limit";
        $query 	=  $this->db->query($sql);
			  $res 	= $query->result_array();
        if($res){
	        return $res;
        }else{
            return false;
        }
	    }

     public function sort($limit,$order){
        $sql = "SELECT * FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =15 limit $limit";
        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }        
    
   	public function search($postdata,$latitude,$longitude){
			$sql  = "select *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.care_type=15 ";            
			if(!empty($postdata['language']) && $postdata['language'] !='undefined'){				
                 $looking_to_work = explode(',',$postdata['language']);
                  if(is_array($looking_to_work)){
                        foreach($looking_to_work as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.looking_to_work)"; 
  	                     }
                    }
            }
			if(!empty($postdata['willing_to_work']) && $postdata['willing_to_work'] !='undefined'){				
                 $willing_to_work = explode(',',$postdata['willing_to_work']);
                  if(is_array($willing_to_work)){
                        foreach($willing_to_work as $data){
                            $data1 = mysql_real_escape_string($data);
                            $sql .= " and FIND_IN_SET('$data1',tbl_userprofile.willing_to_work)"; 
  	                     }
                    }
            }
            $sql .="  order by distance asc";   
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}	   


    public function count($latitude,$longitude){
        $sql  = "SELECT * FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type = 15 and tbl_user.lat like '%$latitude%' and tbl_user.lng like '%$longitude%'";
        $query  =  $this->db->query($sql);
        $res  = $query->num_rows();
        if($res){
          return $res;
        }else{
            return false;
        }
      }

       function pages(){
         $this->breadcrumbs->push('Cleaning / Household help', site_url().'#');
         $this->breadcrumbs->unshift('Home', base_url());

         if(isset($this->session->userdata['search_limit'])){
            $per_page = $this->session->userdata['search_limit'];
         }else{
                $per_page = 15;
         }

          if(check_user()){
            $locationdetails = $this->common_model->getMyLocation(check_user());
            if(is_array($locationdetails)){
                $latitude = floor($locationdetails[0]['lat']);
                $longitude = floor($locationdetails[0]['lng']);
            }
        }else{
            $ipdata = $this->common_model->getIPData($this->ipaddress);
            if(is_array($ipdata)){
                $latitude = floor($ipdata['lat']);
                $longitude = floor($ipdata['lon']);
            }    
        }
        $page = $this->uri->segment(3)?$this->uri->segment(3):1;
        $offset =    ($page - 1) * $per_page;

         if($offset > 1)
            $per_page = $page * $per_page;

        $userdata =  $this->cleaning->getAllData($latitude,$longitude,$offset,$per_page);

        $data = array(
           'main_content' => 'frontend/cleaning/index',
            'title'        => 'Cleaning / Household help',
            'ipdata'       =>   $this->common_model->getIPData($this->ipaddress),
            'userdatas'    => $userdata,
            'userlogs'     => $this->user_model->getUserLog()
        );
        $this->load->view(FRONTEND_TEMPLATE, $data);
    }

	}