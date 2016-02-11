<div>
    <h2>
        <?php /*  
            $name_array = explode(" ",$name);
            echo $name_array[0]."'s "; */
        ?>
        Job Details
    </h2>
</div>    
<?php


    if($care_type==17){
        $this->load->view('frontend/user/details/job/babysitter');
    }
    else if($care_type==18){
        $this->load->view('frontend/user/details/job/nanny');
    }        
    else if($care_type==19){
        $this->load->view('frontend/user/details/job/tutor');
    }
    else if($care_type==20){
        $this->load->view('frontend/user/details/job/senior_caregiver');
    }
    else if($care_type==22){
        $this->load->view('frontend/user/details/job/special_needs_caregiver');            
    }
    else if($care_type==23){
        $this->load->view('frontend/user/details/job/baby_nurse');
    }
    else if($care_type==24){
        $this->load->view('frontend/user/details/job/cleaning');        
    }
    else{
        $this->load->view('frontend/user/details/job/errand_runner');
    }
?>
