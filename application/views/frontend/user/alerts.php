<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
	<div class="container">
	<?php echo $this->breadcrumbs->show();?>
		<div class="dashboard-left float-left">
			 <?php $this->load->view('frontend/user/dashboard_nav');?>
		</div>
        <?php
            $search_count=0;
            $record_count=0;
            $i=1;
        ?>
		<div class="dashboard-right float-right">
			<div class="top-welcome">
				<h2>Alerts</h2>
			</div>
			 <table class="table table-bordered"> 
                <?php
                if(!$record){?>
                    <p>There are currently no search alerts.</p>
                    <?php
                }
                else{?>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Alert Description</th>
                    </tr>
                    <?php 
                    
                    $data = array();
                    //echo "<pre>";
                    //print_r($record);exit;
                    foreach($searches as $search){
                        foreach($record as $rec){
                            if($search['care_type']==$rec['care_type']){
                                $string = "";
                                if($rec['neighbour'] == $search['neighbor']){
                                    $data['neighbour'] = $search['neighbour'];
                                    if(!empty($search['neighbour'])){
                                        $string = "neighbour arround ".$rec['neighbour'].",";
                                    }                                
                                }                                
                                if($rec['experience'] == $search['year_experience']){  
                                     $data['experience'] = $search['year_experience'];
                                     if(!empty($search['experience'])){
                                        $string .= $search['year_experience']." of experience,";   
                                    }                                 
                                }   
                                 if($rec['gender'] == $search['gender']){  
                                     $data['gender'] = $search['gender'];
                                     if(!empty($search['gender'])){
                                        $string .=" gender ".($search['gender']==1?'male,':'female,');   
                                    }                                 
                                 }
                                 if($rec['smoker'] == $search['smoker']){  
                                     $data['smoker'] = $search['smoker'];
                                     if(!empty($search['smoker'])){                                 
                                        $string .= $search['smoker']==1?' smoking allowed,':' smoking not allowed,';
                                     }                            
                                 }
                                 if($rec['language'] == $search['language']){  
                                     $data['language'] = $search['language'];
                                     if(!empty($search['language'])){
                                        $string .=" languages ".$search['language'].',';   
                                    }                                 
                                 }
                                 if($rec['religious_observance'] == $search['observance']){  
                                     $data['religious_observance'] = $search['observance'];
                                     if(!empty($search['religious_observance'])){
                                        $string .=" religious observance ".$search['observance'].',';   
                                    }                                 
                                 }
                                 if($rec['number_of_children'] == $search['number_of_children']){  
                                     $data['number_of_children'] = $search['number_of_children'];
                                     if(!empty($search['number_of_children'])){
                                        $string .=" number of children ".$search['number_of_children'].',';   
                                    }                                 
                                 }
                                 if($rec['optional_number'] == $search['morenum']){  
                                     $data['optional_number'] = $search['morenum'];
                                     if(!empty($search['optional_number'])){
                                        $string .=" optional number ".$search['morenum'].',';   
                                    }                                 
                                 }
                                 if($rec['age_group'] == $search['age_group']){  
                                     $data['age_group'] = $search['age_group'];
                                     if(!empty($search['age_group'])){
                                        $string .=" age group ".$search['age_group'].',';   
                                    }                                 
                                 }
                                 if($rec['looking_to_work'] == $search['looking_to_work']){
                                     $data['looking_to_work'] = $search['looking_to_work'];
                                     if(!empty($search['looking_to_work'])){
                                        $string .=" looking to work ".$search['looking_to_work'].',';   
                                    }                                 
                                 }
                                 if($rec['training'] == $search['training']){
                                     $data['training'] = $search['training'];
                                     if(!empty($search['training'])){
                                        $string .=" training ".$search['training'].',';   
                                    }                                 
                                 }
                                 if($rec['availability'] == $search['availability']){
                                     $data['availability'] = $search['availability'];
                                     if(!empty($search['availability'])){
                                        $string .=" availability ".$search['availability'].',';   
                                    }                                 
                                 }
                                 if($rec['start_date'] == $search['start_date']){
                                     $data['start_date']  = $search['start_date'];
                                     if(!empty($search['start_date']) && $search['start_date'] != '0000-00-00'){
                                        $string .=" start date ".$search['start_date'].',';   
                                    }                                 
                                 }
                                 if($rec['driver_license'] == $search['driver_license']){
                                     $data['driver_license']  = $search['driver_license'];
                                      if($search['driver_license']==1){
                                        $string .=" having driver license,";
                                     }                                 
                                 }
                                 if($rec['vehicle'] == $search['vehicle']){
                                     $data['vehicle']  = $search['vehicle'];
                                     if($search['vehicle']==1){
                                        $string .=" having vehicle,";
                                     }
                                 }
                                 if($rec['pick_up_child'] == $search['pick_up_child']){
                                     $data['pick_up_child']  = $search['pick_up_child'];
                                     if($search['pick_up_child']==1){
                                        $string .=" willing to pick up child,";
                                     }
                                 }
                                 if($rec['cook'] == $search['cook']){
                                     $data['cook']  = $search['cook'];
                                      if($search['cook']==1){
                                        $string .=" willing to cook food,";
                                     }
                                 }    
                                 if($rec['basic_housework'] == $search['basic_housework']){
                                     $data['basic_housework']  = $search['basic_housework'];
                                      if($search['basic_housework']==1){
                                        $string .=" willing to do basic housework,";
                                     }
                                 }
                                 if($rec['homework_help'] == $search['homework_help']){
                                     $data['homework_help']  = $search['homework_help'];
                                     if($search['homework_help']==1){
                                        $string .=" willing to help in homework,";                                    
                                     }
                                 }
                                 if($rec['sick_child_care'] == $search['sick_child_care']){
                                     $data['sick_child_care']  = $search['sick_child_care'];
                                      if($search['sick_child_care']==1){
                                        $string .=" willing to care sick child,";
                                     }
                                 }
                                 if($rec['on_short_notice'] == $search['on_short_notice']){
                                     $data['on_short_notice']  = $search['on_short_notice'];
                                      if($search['on_short_notice']==1){
                                        $string .=" available on short notice,";
                                     }
                                 }
                                 if($rec['caregiverage_from'] == $search['caregiverage_from']){
                                     $data['caregiverage_from']  = $search['caregiverage_from'];
                                     if(!empty($search['caregiverage_from'])){
                                        $string .=" caregiver age from ".$search['caregiverage_from']." to";   
                                    }                                 
                                 }
                                 if($rec['caregiverage_to'] == $search['caregiverage_to']){
                                     $data['caregiverage_to']  = $search['caregiverage_to'];
                                     if(!empty($search['caregiverage_to'])){
                                        $string .= $search['caregiverage_to'].',';   
                                    }                                 
                                 }
                                 if($rec['willing_to_work'] == $search['willing_to_work']){
                                     $data['willing_to_work']  = $search['willing_to_work'];
                                     if(!empty($search['willing_to_work'])){
                                        $string .= " willing to work in ".$search['willing_to_work'].',';   
                                    }                                 
                                 }                
                                 if($rec['subjects'] == $search['subjects']){
                                     $data['subjects']  = $search['subjects'];
                                     if(!empty($search['subjects'])){
                                        $string .= " subjects in ".$search['subjects'].',';   
                                    }                                 
                                 }
                                 if($rec['accept_insurance'] == $search['accept_insurance']){
                                     $data['accept_insurance']   = $search['accept_insurance'];
                                     if($search['accept_insurance']==1){
                                        $string .=" must accept insurance,";
                                     }
                                 }
                                 if($rec['rate'] == $search['rate']){
                                     $data['rate']   = $search['rate'];
                                     if($rec['rate_type'] == $search['rate_type']){
                                        if($search['rate_type']=='1,2'){
                                            $s ='per hour and per month';
                                        }else if($search['rate_type']=='1'){
                                            $s ='per hour';
                                        }else{
                                            $s ='per month';
                                        }
                                     }
                                     if(!empty($search['rate'])){
                                        $string .= " rate ".$search['rate'].' '.isset($s).',';   
                                    }                                 
                                 }
                                 if($rec['gender_of_caregiver'] == $search['gender_of_caregiver']){
                                     $data['gender_of_caregiver']   = $search['gender_of_caregiver'];
                                     if(!empty($search['gender_of_caregiver'])){
                                        $string .= " gender of caregiver ".$search['gender_of_caregiver'].',';   
                                    }                                 
                                 }
            
                                $string = substr_replace($string ,"",-1);//removes comma form last
                                $data['user']      = $search['user_id'];
                                $data['care_type']  = $search['care_type'];
                                
                                if($data['user']!= 0){
                                    $user = get_user($data['user']);
                                    $name = ucwords($user['name']);
                                }else{
                                    $name = "Guest";
                                }
                                if($data['care_type']){
                                    $care = get_care_detail($data['care_type']);
                                    $carename = $care['service_name'];
                                }
                                
                                if(!empty($string)){?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php 
                                            $date = explode(' ',$search['searcheddate']);
                                            echo $date[0];?>
                                        </td>
                                        <td>
                                                <?php
                                                    echo $name." has searched ".$carename." on frumcare with ".$string;
                                                ?> 
                                        </td>
                                    </tr>
                                    <?php                                
                                }
                                $record_count++;
                            }                                
                        }//first foreach close
                        $search_count++;
                    }//second foreach close
                }//close of else
                ?>
            </table>
            <?php
                if($record_count==0)
                    echo "You have no search alert";
                if($search_count==0)
                    echo "search history is empty"; 
                //echo "<br>"."Total record checked: ".$record_count.'<br>';
                //echo "Total search checked: ".$search_count.'<br>';
            ?>
    </div>
</div>
