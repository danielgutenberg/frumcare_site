<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">

<div class="container">
<?php echo $this->load->breadcrumbs->show();?>

	

	<div class="dashboard-left float-left">
	<?php $this->load->view('frontend/user/dashboard_nav');?>
	</div><!--dashboard-left-->


	<div class="dashboard-right float-right">

			<div class="top-welcome">
				<h2>Upgrade Now</h2>
			</div>


			<div class="user content upgrade">
			<?php echo $this->session->flashdata('info');?>
				<form action="<?php echo site_url().'payment/save'?>" id="packageupgrade" method="post">
					 <label>Package</label>
					 <select name="package" class="form control required package">
					 	<option value="">--select--</option>
					 	<?php 
					 		if(is_array($packagedata)){
					 			foreach($packagedata as $pdata):
					 	?>
					 		<option value="<?php echo $pdata['id'];?>"<?php if($userpackage['package_id'] == $pdata['id']){?> selected="selected" <?php }?> ><?php echo ucfirst($pdata['package_name']);?></option>

					 	<?php
					 			endforeach;
					 		}
					 	?>
					 </select>
					 <input type="hidden" name="user_id" value="<?php echo $this->session->userdata['current_user'];?>">
					 <input type="hidden" name="profile_id" value="<?php echo $this->uri->segment(4);?>">
					  <ul id="ct"></ul>
					 <input type="submit" name="save" value="Upgrade Now" class="btn btn-primary">
				</form>
			</div>
	</div>
</div>
	
<script>
	$('#packageupgrade').validate();
	$(document).ready(function(){
		getFeatures($('.package').find("option:selected").text());

		$('.package').change(function(){
			var package = $(this).find("option:selected").text();
			$.ajax({
				type:"post",
				url:"<?php echo site_url();?>user/getFeature",
				data:"pid="+package,
				dataType: "json",
				success:function(data){
						if(data == false){
							$('#ct').hide();
						}
						if(data != false){
							$.each(data, function(i, item){
			               	 $('#ct').append('<li style="color: #000">'+ item.feature_name.toUpperCase()+'</li>').show();
			            	});
						}
				}
			})
		})
	});

	function getFeatures(package){
		$.ajax({
				type:"post",
				url:"<?php echo site_url();?>user/getFeature",
				data:"pid="+package,
				dataType: "json",
				success:function(data){
						if(data == false){
							$('#ct').hide();
						}
						if(data != false){
							$.each(data, function(i, item){
			               	 $('#ct').html('<li style="color: #000">'+ item.feature_name.toUpperCase()+'</li>').show();
			            	});
						}
				}
			});
	}
</script>
