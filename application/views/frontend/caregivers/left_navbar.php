<?php echo $this->breadcrumbs->show();?>
	<?php 
	if(segment(1) == 'therapists'){
		$this->session->set_userdata(array('care'=> 7));
	}

	 if(segment(1) == 'caregivers'){
	 		$this->session->unset_userdata('care');
	 }
	 ?>
		<h3>Category</h3>  			
	  <div class="left-search-panel">
	 	<h4>Refine Results</h4>
	 	<form method="post" id="left-nav" action="">
	 			<div><label>Country</label>
	 				 	<select name="country" class="country">
	 				 	<option value="">--select country--</option>
	 					<?php foreach($countries as $country):?>
	 						<option value="<?php echo $country['code'];?>" <?php if($ipdata['countryCode'] == $country['code']){?> selected="selected"<?php } ?>><?php echo $country['name'];?></option>
	 					<?php endforeach;?>
	 				</select>
	 			</div>
	 	
	 			<div class="citys">
		 			<label>City</label>
		 			<input type="text" name="city" value="<?php if(isset($ipdata['city'])) echo $ipdata['city'];?>" class="city"/>
	 			</div>
	 			<div class="zip">
		 			<label>Zip</label>
		 			<input type="text" name="zip" value="<?php if(isset($ipdata['zipcode'])) echo $ipdata['zipcode'];?>" class="zipcode"/>
	 			</div>

	 			<div class="neighborhood">
		 			<label>Neighborhood</label>
		 			<input type="text" name="neighborhood" value="" class="neighbour">
	 			</div>
	 			<div class="select-services">
		 			<label>Select a service</label>
		 				<select name="service" class="service required">
		 					<option value="">--select--</option>
		 					<option value="1" <?php if(segment(1) == 'therapists'){?> selected="selected" <?php } ?>>Caregivers</option>
		 					<option value="2">Careseekers</option>
		 				</select>
		 			</div>
	 			
	 			
		 			<div class="choose-services">
		 				<label>Choose Type</label>
		 				<!-- <select name="type">
		 					<option value="">--select a type--</option>
		 				</select> -->
		 				<div id="select_options"></div>
		 			</div>
	 			
		 			<div class="within-distance"><label>Within</label>
		 			<input type="text" name="distance_in_length" class="required distance">
		 				<select name="distance">
		 					<option value="miles">Miles</option>
		 				</select>
		 			
	 			</div>

	 			<div class="keywordss"><label>Keyword(s)</label>
		 				<input type="text" name="keywords" class="keywords" />
		 				Add keywords to filter the terms found in job search
		 			</div>
	 				<div class="search-btns" colspan="2">
		 				<input type="submit" name="search" value="Search" class="btn btn-primary search" />
		 			</div>
	 			
	 	</form>

	 	<div>
	 		<form id="leftnavbar-down" method="post" action="">
		 		<div class="time-available" colspan="2"><h4>Time available</h4> 
		 			<div>
		 		<input type="checkbox" value="Imm/ Start Date" name="time[]" class="required">
		 			<span>Imm/Start Date</span>
		 		</div>

		 		<div>
		 			<input type="checkbox" value="Part Time" name="time[]" class="required">
		 			<span>Part Time</span>
		 		</div>

		 		<div>
		 			<input type="checkbox" value="Full Time" name="time[]" class="required">
		 			<span>Full Time</span>
		 		</div>

		 		<div>
		 			<input type="checkbox" value="Morning" name="time[]" class="required">
		 			<span>Morning</span>
		 		</div>

		 		<div>
		 			<input type="checkbox" value="Afternoon" name="time[]" class="required">
		 			<span>Afternoon</span>
		 		</div>

		 		<div>
		 			<input type="checkbox" value="Evening" name="time[]" class="required">
		 			<span>Evening</span>
		 		</div>

		 		<div>
		 			<input type="checkbox" value="Weekends/ Shabbos" name="time[]" class="required">
		 			<span>Weekends/ Shabbos</span>
		 		</div>

		 		<div>
		 			<input type="checkbox" value="Night Hours" name="time[]" class="required">
		 			<span>Night Hours</span>
		 		</div>

		 		<div>
					<input type="checkbox" value="Daily hours" name="time[]" class="required">
		 			<span>Daily hours</span>
		 		</div>
		 		<div>
		 			<input type="checkbox" value="Weekend hours" name="time[]" class="required">
		 			<span>Weekend hours</span>
		 		</div>
		 		<div>
		 			<input type="checkbox" value="Vacation schedule" name="time[]" class="required">
		 			<span>Vacation schedule</span>
		 		</div>
		 		<div>
		 			<input type="checkbox" value="24 hr care" name="time[]" class="required">
		 			<span>24 hr care</span>
		 		</div>
				</div>
		 		<div class="background-check">
					<h4>Background Check</h4>
		 			<select name="background_check">
	 					<option value="">--select--</option>
	 					<option value="basicbackground">Basic Background Check</option>
	 					<option value="driving">Motor Vehicle Record Check</option>
		 			</select>
		 		</div>
		 		

		 		<div class="year-exp">
		 		<span>Years of Experience</span>
		 			<select name="year_experience" class="required">
		 			<option value="">--select--</option>
		 				<option value="1">1 year</option>	
		 				<option value="2">2 years</option>	
		 				<option value="3">3 years</option>	
		 				<option value="4">4 years</option>	
		 				<option value="5+">5+ years</option>	
		 			</select>
		 		</div>
		 		<div class="no-child">
		 		<span>Number of Children</span>
		 			<select name="no_children" class="required">
		 			<option value="">--select--</option>
		 				<option value="1">01</option>	
		 				<option value="2">02</option>	
		 				<option value="3">03</option>	
		 				<option value="4">04</option>	
		 				<option value="5">5+</option>	
		 			</select>
		 		</div>
		 		<div class="time-available" colspan="2"><h4>Experience With</h4>
			 		<div class="any"><input type="checkbox" value="any" name="experience" class="required">
			 			<span>Any</span>
			 		</div>
			 		<div>
			 			<input type="checkbox" value="bathing" name="experience" class="required">
			 			<span>Bathing</span>
			 		</div>
			 		<div>
			 			<input type="checkbox" value="dressing" name="experience" class="required">
			 			<span>Dressing</span>
			 		</div>
			 		<div>
			 			<input type="checkbox" value="grooming" name="experience" class="required">
			 			<span>Grooming</span>
			 		</div>
			 		<div>
			 			<input type="checkbox" value="toileting" name="experience" class="required">
			 			<span>Toileting</span>
			 		</div>
			 		<div>
			 			<input type="checkbox" value="feeding" name="experience" class="required">
			 			<span>Feeding & sepcial diet</span>
			 		</div>
		 		</div>

		 		<div class="educationss" colspan="2"><h4>Education</h4>
		 		<div>
	 				<select name="education" class="required">
	 					<option value="">--select--</option>
		 				<option value="Elementary">Elementary</option>
		 				<option value="High school">High school</option>
		 				<option value="Yeshiva/Seminary">Yeshiva/Seminary</option>
		 				<option value="Degree">Degree</option>
	 				</select>
		 		</div>
		 		<?php 
		 			if(segment(1) == 'caregivers'){
		 				$acc_cat = 1;
		 			}else{
		 				$acc_cat = 2;
		 			}
		 		?>

		 		<input type="hidden" name="category" value="<?php echo $acc_cat;?>">
			 		<div colspan="2" class="search-btns">
				 		<input type="submit" class="btn btn-primary searchs" value="Search" name="searchs">
				 	</div>

			</form>
		</div>

	 		<!-- <div>
	 			<span>Student</span>
	 				<select name="education">
	 					<option value="">--select--</option>
		 				<option value="Elementary">Elementary</option>
		 				<option value="High school">High school</option>
		 				<option value="Yeshiva/Seminary">Yeshiva/Seminary</option>
		 				<option value="Degree">Degree</option>
	 				</select>
	 			
	 		</div> -->
</div>

	 
	  </div>
<script>
	$(document).ready(function(){
		var cat = "<?php echo $this->uri->segment(1);?>";
		$('.service').change(function() {
    			var account_category = $(this).val();
    			 	$.ajax({
		                type:"post",
		                url:"<?php echo site_url();?>ad/getCareType",
		                data:"care_type="+account_category,
		                dataType:"json",
		                success:function(done){
		                   if(done){
		                    $('#select_options').html(done).show();
		                   }
		                   if(account_category == 1){
		                        $('.msg').text('Type of care you provide');
		                   }
		                   if(account_category == 2){
		                        $('.msg').text('Type of care you are seeking');
		                   }
		                }
        			});
		});

		$('#select_options').addClass('select-services');
		$('#select_options, #care_type').addClass('service_type');


		$("#left-nav").validate({
		    submitHandler: function(form) {
			        //$('#left-nav').submit(function(e) {
			        	$('#left-nav').unbind('submit').bind('submit',function(e) {
			        	var care_type = $('#care_type').val();
			        	var service   = $('.service').val();
			        	var distance = $('.distance').val();
			        	
			        	if(care_type == '' || care_type == null){
			        		$('.error').html('This field is required').show();
								return false;
			        	}

			        	if(distance == '' || distance == null){
			        		$('.error').html('This field is required').show();
							return false;
			        	}

			        		$(".searchloader").fadeIn("fast");
			        		e.preventDefault();
			        			$.ajax({
									type:"post",
									url:"<?php echo site_url();?>caregivers/search",
									data: $( this ).serializeArray(),
									success:function(done){
										$(".searchloader").fadeOut("fast");
										var json = jQuery.parseJSON(done);
										var pagenum = json.num;
										var pagedata = json.userdatas;
										$('#list_container').html(pagedata);
									}
								});
			        });
		   }
		});

		$('#leftnavbar-down').validate({
			 submitHandler: function(form) {
			 	$('#leftnavbar-down').unbind('submit').bind('submit',function(e) {
			 		 $(".searchloader").fadeIn("fast");
					e.preventDefault();
			        $.ajax({
			        	type:"post",
						url:"<?php echo site_url();?>caregivers/searchRecord",
						data: $( this ).serializeArray(),
						success:function(msg){
							 $(".searchloader").fadeOut("fast");
							 var jsonData 		= jQuery.parseJSON(msg);
							 var pagenum 		= jsonData.num;
							 var pagedata  		= jsonData.userdatas;
							 var totalRecord 	= jsonData.total;
							 $('#list_container').html(pagedata);
						}
			        });
			 	});
			 }
		});

		var option = $( ".service option:selected" ).val();
		if(option!=''){
			$.ajax({
            type:"post",
            url:"<?php echo site_url();?>ad/getCareType",
            data:"care_type="+option,
            dataType:"json",
            success:function(msg){
               if(msg){
                $('#select_options').html(msg).show();
               }

            }
        });
		}
	});
</script>