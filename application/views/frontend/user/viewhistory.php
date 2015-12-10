<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>

	<div class="dashboard-left float-left">
		 <?php $this->load->view('frontend/user/dashboard_nav');?>
	</div>
	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>Search Alerts</h2>
		</div>
		<div style="margin-bottom:10px">
		    <button class="btn btn-default"><a href="<?php echo site_url();?>user/add_new_alert">Create New Alert</a></button>
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
                <th>Care Type</th>
                <th>Near</th>
                <th>Distance</th>
                <th>Actions</th>
            </tr>
            <?php
            foreach($record as $rec)
            {
            
            $id = $rec['id'];
            ?>
            <tr>
                <td>
                    <?php echo $rec['service_name'] ?>
                </td>
                <td>
                    <?php echo $rec['location'] ?>
                </td>
                <td>
                    <?php echo $rec['distance'] . ' miles' ?>
                </td>
                <td>
                    <button><a href="<?php echo site_url();?>user/removealert/<?php echo $id; ?>">Cancel</a></button>
                    <button><a href="<?php echo site_url();?>user/edit_alert/<?php echo $id; ?>/<?php echo $rec['care_type']?>">Edit</a></button>
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
