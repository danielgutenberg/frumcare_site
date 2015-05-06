<div class="container">
    <h2>Retrieve you password here</h2>
    <div class="sign-in-form">
        <form action="" method="post" id="forgot-form">
            <input type="text" name="email" class="required email" placeholder="Email"/>
            <input class="btn btn-success check" type="submit" value="Check Email Address"/>
            <div class="loader"></div>
            <div class="success" style="display:none;"></div>
            <div class="error" style="display:none;"></div>
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var imgUrl = "<img src='<?php echo site_url();?>images/loader.gif'/>";
	$('.check').click(function(e){
		$('.loader').html(imgUrl).show();
		e.preventDefault();
		var email_address = $('.email').val();
		$('.loader').show();
			if(email_address == ''){
				$('.loader').hide();
				$('.error').html('Email field cannot be empty').show();
				return false;
			}
			$.ajax({
				type:"post",
				url:"<?php echo site_url();?>login/check_email",
				data:"email="+email_address,
				success:function(msg){
					if(msg == 1){
						$('.error').hide();
						$.ajax({
							type:"post",
							url:"<?php echo site_url();?>login/forgot_password",
							data:"email="+email_address,
							success:function(data){
								if(data == '1'){
									$('.loader').hide();
									$('.success').html('A email has been sent to reset your password.Please check your email.').show();
								}
							}

						});
					}else{
						$('.loader').hide();
						$('.error').html('Email Address your enter dosen\'t exists').css('color','red').show();
					}
				}
			})

	})
});
</script>
