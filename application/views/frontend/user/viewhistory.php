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
                <th>Date</th>
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
            unset($rec['createAlert']);
            ?>
            <tr>
                <td><?php echo $rec['searcheddate'];
                
            unset($rec['searcheddate']);?>
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
                    <button><a href="<?php echo site_url();?>user/createalert/<?php echo $id; ?>">Create Alert</a></button>
                    <button><a href="<?php echo site_url();?>user/removealert/<?php echo $id; ?>">Cancel Alert</a></button>
                </td>
            </tr>
            <?php
            }
            }
        ?>
    </table>

</div>
</div>