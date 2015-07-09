<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>

	<div class="dashboard-left float-left">
		 <?php $this->load->view('frontend/user/dashboard_nav');?>
	</div>
	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>My Payment History</h2>
            <?php 
                if(user_flash()){
		            echo user_flash();
		        }
            ?>
		</div>


	   <table class="table table-bordered table-striped">
        
        <?php
        if(!$record){
        ?>
        <p>This feature is under construction</p>
        <?php
        }
        else{
            ?>
            <tr>
                <th>Profile</th>
                <th>Package Name</th>
                <th>Package Price</th>
                <th>Invoice Number</th>
                <th>Paid Date</th>
                <th>Payment Received Date</th>
            </tr>
            <?php
            foreach($record as $rec)
            {
            ?>
            <tr>
                <td><?php 
                        //echo $rec['profile_id'];
                        $care = get_care_detail($rec['profile_id']);
                        echo $care['service_name'];
                    ?></td>
                <td><?php echo $rec['package_name'];?></td>
                <td><?php echo $rec['package_amount'];?></td>
                <td><?php echo $rec['invoice_number'];?></td>
                <td><?php echo $rec['created_date'];?></td>
                <td><?php echo $rec['updated_date'];?></td>
            </tr>
            <?php
            }
            }
        ?>
    </table>

</div>
</div>
