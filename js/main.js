// form validation
$('#login-form').validate();
$('#sign-up').validate({
		 rules:{
		 	agree:"required",
		 	org_password:{
		 		required:true,
		 		minlenght:5
		 	},
		 	  confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#org_password"

                },
		 },
		 messages:{
		 	agree:"Please accept your terms & condtions to continue.",
		 	 org_password: {
                    required: "Please enter password",
                },
                confirm_password: {
                    required: "Please enter confirm password",
                    equalTo: "Please enter the same password as above"
                },
		 }
});
$('#forgot-form').validate();
$('#personal-details-form').validate();
$('#verification').validate();
$('#addrefrences').validate();
$('#payment_form').validate();
//$('#left-nav').validate();

jQuery(document).ready(function($){
   	$('.toggle-menu').click(function(){
		$('.primary-nav').slideToggle('slow');
    });


    $('.form-field select').customStyle();
    $('.care-type select').customStyle();
    $('.search select').customStyle();
       
});