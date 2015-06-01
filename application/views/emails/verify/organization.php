<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Approval Email</title>
</head>
<body>

<table>
    <?php if(($account_type1=='caregiver') && ($account_type2=='individual')){

        $this->load->view('emails/verify/caregiver/individual');

    }elseif(($account_type1=='caregiver') && ($account_type2=='organization')){
        $this->load->view('emails/verify/caregiver/organization');

    }elseif(($account_type1=='careseeker')&&($account_type2=='individual')){

        $this->load->view('emails/verify/seeker/individual');

    }elseif(($account_type1=='careseeker')&&($account_type2=='organization')){
        $this->load->view('emails/verify/seeker/organization');

    }


    if($ids == 1){
        $this->load->view('emails/verify/caregiver/giver/babysitter_form');
    }
    if($ids == 2){
        $this->load->view('emails/verify/caregiver/giver/nanny_form');
    }
    if($ids == 3){
        $this->load->view('emails/verify/caregiver/giver/nursery_form');
    }
    if($ids == 4){
        $this->load->view('emails/verify/caregiver/giver/tutor_form');
    }
    if($ids == 5){
        $this->load->view('emails/verify/caregiver/giver/senior_form');
    }
    if($ids == 6){
        $this->load->view('emails/verify/caregiver/giver/specialneeds_form');
    }
    if($ids == 7){
        $this->load->view('emails/verify/caregiver/giver/therapist_form');
    }
    if($ids == 8){
        $this->load->view('emails/verify/caregiver/giver/cleaning_form');
    }
    if($ids == 9){
        $this->load->view('emails/verify/caregiver/giver/errand_form');
    }
    if($ids == 10){
        $this->load->view('emails/verify/caregiver/giver/daycarecenter_form');
    }

    if($ids == 13){
        $this->load->view('emails/verify/caregiver/giver/seniorcareagency_form');
    }
    if($ids == 14){
        $this->load->view('emails/verify/caregiver/giver/specialneedscenter_form');
    }
    if($ids == 15){
        $this->load->view('emails/verify/caregiver/giver/cleaningcompany_form');
    }
    if($ids == 16){
        $this->load->view('emails/verify/caregiver/giver/seniorcarecenter_form');
    }
    if($ids == 17)
        $this->load->view('emails/verify/caregiver/seeker/babysitter_form');
    if($ids == 18)
        $this->load->view('emails/verify/caregiver/seeker/nanny_form');
    if($ids == 19)
        $this->load->view('emails/verify/caregiver/seeker/tutor_form');
    if($ids == 20)
        $this->load->view('emails/verify/caregiver/seeker/senior_form');
    if($ids == 21)
        $this->load->view('emails/verify/caregiver/seeker/errand_form');
    if($ids == 22)
        $this->load->view('emails/verify/caregiver/seeker/specailneedcareseeker');
    if($ids == 23)
        $this->load->view('emails/verify/caregiver/seeker/therapist_form');
    if($ids == 24)
        $this->load->view('emails/verify/caregiver/seeker/cleaning_form');
    if($ids == 25)
        $this->load->view('emails/verify/caregiver/seeker/childcare_seniorcare_specialneeds_facilities_form');
    if($ids == 26)
        $this->load->view('emails/verify/caregiver/seeker/childcare_seniorcare_specialneeds_facilities_form');
    if($ids == 27)
        $this->load->view('emails/verify/caregiver/seeker/childcare_seniorcare_specialneeds_facilities_form');
    if($ids == 28)
        $this->load->view('emails/verify/caregiver/seeker/cleaningcompany_form');



    ?>
    <tr><td>Approve this</td><td><a href="<?php echo site_url('ad/approveAd/'.$id);?>">Approve</a> </td></tr>




</table>



</body>
</html>