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
            $alert = $rec['createAlert'];
            unset($rec['createAlert']);
            ?>
            <tr>
                <td>
                    <label>Location</label>
                    <div id="locationField">
                        <input type="hidden" id="lat" name="lat"/>
                        <input type="hidden" id="lng" name="lng"/> 
                        <input type="text" name="location" class="required" id="autocomplete" required/>
                    </div>
                </td>
                <td>
                    <select name="distance" id="distance">        
                        <option value="1">1 Miles</option>
                        <option value="2">2 Miles</option>
                        <option value="5">5 Miles</option>
                        <option value="10">10 Miles</option>
                        <option value="25">25 Miles</option>
                        <option value="50">50 Miles</option>
                        <option value="unlimited" selected="selected">Unlimited Miles</option>
                    </select>
                </td>
                <td>
                	<?php 
                	echo $rec['service_name'];
                	unset($rec['service_name']);
                	if ($rec['gender'] == 1) {
                	   echo ', Male'; 
                	}
                	if ($rec['gender'] == 2) {
                	   echo ', Female'; 
                	}
                	unset($rec['gender']);
                	foreach($rec as $key => $value) { 
                	   if ($value > 0) { 
                	        echo ', ' . $key;
                	   }
                	}?>
                </td>
                <td>
                    <?php if ($alert == 0) { ?>
                    <button><a href="<?php echo site_url();?>user/createalert/<?php echo $id; ?>">Create Alert</a></button>
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
