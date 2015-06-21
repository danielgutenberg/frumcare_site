<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>

	<div class="dashboard-left float-left">
		 <?php $this->load->view('frontend/user/dashboard_nav');?>
	</div>
	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>History</h2>
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
            </tr>
            <?php
            foreach($record as $rec)
            unset($rec['id']);
            unset($rec['user_id']);
            unset($rec['care_type']);
            unset($rec['neighbor']);
            {
            ?>
            <tr>
                <td><?php echo $rec['searcheddate'];
                
            unset($rec['searcheddate']);?></td>
                <td>
                	<?php 
                	echo $rec['service_name'] . ', ';
                	unset($rec['service_name']);
                	foreach($rec as $key => $value) { 
                	   if ($value > 0) { 
                	        echo $key . ', ';
                	   }
                	}?>
                </td>
            </tr>
            <?php
            }
            }
        ?>
    </table>

</div>
</div>