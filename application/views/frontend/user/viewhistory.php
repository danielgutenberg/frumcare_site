<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
<script>
    $("#locationField").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    //console.log(place.geometry.location);
                    var lat = place.geometry.location.A;
                    var lng = place.geometry.location.F;                                 
                    $("#lat").val(lat);
                    $("#lng").val(lng);                                
                });
    });
</script>
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>

	<div class="dashboard-left float-left">
		 <?php $this->load->view('frontend/user/dashboard_nav');?>
	</div>
	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>Search History</h2>
		</div>


       
	   <table class="table table-bordered table-striped">
        
        <?php
        if(!$record){
        ?>
        <p>No search history available</p>
        <?php
        }
        else{
            ?>
            <tr>
                <th>Location</th>
                <th>Distance</th>
                <th>Searched Keywords</th>
                <th></th>
            </tr>
            <?php
            foreach($record as $rec)
            {
            
            $id = $rec['id'];
            unset($rec['id']);
            unset($rec['user_id']);
            unset($rec['care_type']);
            unset($rec['neighbor']);
            unset($rec['searcheddate']);
            $alert = $rec['createAlert'];
            unset($rec['createAlert']);
            ?>
            <tr>
                <td>
                    <input type="hidden" id="id" value="<?php echo $id?>"/>
                    <div id="locationField">
                        <input type="hidden" id="lat" name="lat" val="<?php echo isset($rec['lat']) ? $rec['lat'] : ''?>"/>
                        <input type="hidden" id="lng" name="lng" val="<?php echo isset($rec['long']) ? $rec['long'] : ''?>"/> 
                        <input type="text" name="location" class="location" id="autocomplete" value="<?php echo isset($rec['location']) ? $rec['location'] : ''?>"/>
                    </div>
                </td>
                <td>
                    <select name="distance" id="distance">
                        <option value="unlimited" <?php echo isset($rec['distance']) && $rec['distance'] == 10000 ? 'selected' : '' ?>>Unlimited Miles</option>
                        <option value="1" <?php echo isset($rec['distance']) && $rec['distance'] == 1 ? 'selected' : '' ?>>1 Miles</option>
                        <option value="2" <?php echo isset($rec['distance']) && $rec['distance'] == 2 ? 'selected' : '' ?>>2 Miles</option>
                        <option value="5" <?php echo isset($rec['distance']) && $rec['distance'] == 5 ? 'selected' : '' ?>>5 Miles</option>
                        <option value="10" <?php echo isset($rec['distance']) && $rec['distance'] == 10 ? 'selected' : '' ?>>10 Miles</option>
                        <option value="25" <?php echo isset($rec['distance']) && $rec['distance'] == 25 ? 'selected' : '' ?>>25 Miles</option>
                        <option value="50" <?php echo isset($rec['distance']) && $rec['distance'] == 50 ? 'selected' : '' ?>>50 Miles</option>
                       </select>
                </td>
                <td>
                	<?php 
                	echo $rec['service_name'];
                	unset($rec['service_name']);
                	unset($rec['distance']);
                	unset($rec['lat']);
                	unset($rec['long']);
                	if ($rec['gender'] == 1) {
                	   echo ', Male'; 
                	}
                	if ($rec['gender'] == 2) {
                	   echo ', Female'; 
                	}
                	unset($rec['gender']);
                	if ($rec['year_experience'] > 0) {
                	    if ($rec['year_experience'] == 6) {
                	        echo ', 5+ years of experience'; 
                	    } else {
                	        echo $rec['year_experience'] . ' years of experience';
                	    }
                	}
                // 	foreach($rec as $key => $value) { 
                // 	   if ($value > 0) { 
                // 	        echo ', ' . $key;
                // 	   }
                // 	}
                	?>
                </td>
                <td>
                    <?php if ($alert == 0) { ?>
                    <button class="createAlert"><a href="">Create Alert</a></button>
                    <?php } else { ?>
                    <button><a href="<?php echo site_url();?>user/removealert/<?php echo $id; ?>">Cancel Alert</a></button>
                    <?php } ?>
                </td>
            </tr>
            <?php
            }
            }
        ?>
    </table>

</div>
</div>
<script>
	$(document).ready(function(){
		$('.createAlert').click(function(){
		    var id = $('#id').val();
		    var lat = $('#lat').val();
		    var long = $('#lng').val();
		    var distance = $( "#distance option:selected" ).val();
		    var location = $('.location').val();
            
			$.ajax({
				type:"get",
				url:"<?php echo site_url();?>user/createalert/" + id,
				data:"lat="+lat+"&long="+long+"&distance="+distance+"&location="+location,
				success:function(message){
				}
			});
		});
        
	});
</script>
