<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>

	<div class="dashboard-left float-left">
		 <?php $this->load->view('frontend/user/dashboard/nav');?>
	</div>
	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>My Search Alerts</h2>
		</div>
		<div style="margin-bottom:10px">
		    <?php
		    if(is_array($record) && count($record) >=1) {
		        echo 'You have created ' . count($record) . ' search alert';
		        if(count($record) > 1) {
		            echo 's';
		        }
		    }?>
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
                <th style="width:20px">#</th>
                <th>Care Type</th>
                <th>Near</th>
                <th>Distance</th>
                <th>Actions</th>
            </tr>
            <?php
            $i = 1;
            foreach($record as $rec)
            {
            $job = '';
            $jobs = [10, 13, 14, 17,18, 19, 20, 21];
            if (in_array($rec['care_type'], $jobs)) {
                $job = ' Job';
            }
            $id = $rec['id'];
            ?>
            <tr>
                <td style="width:20px">
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $rec['service_name'] . $job?>
                </td>
                <td>
                    <?php echo $rec['location'] ?>
                </td>
                <td>
                    <?php echo $rec['distance'] . ' miles' ?>
                </td>
                <td>
                    <button style="width:120px; margin-bottom:3px"><a href="<?php echo site_url();?>user/edit_alert/<?php echo $id; ?>/<?php echo $rec['care_type']?>">Edit Alert</a></button>
                    <br>
                    <button style="width:120px"><a onclick="return confirm('Are you sure youw ant to delete this search alert?');" href="<?php echo site_url();?>user/removealert/<?php echo $id; ?>">Cancel Alert</a></button>
                </td>
            </tr>
            <?php
            $i++;
            }
            }
        ?>
    </table>
    
    <div style="margin-bottom:10px">
		    <button class="btn btn-default"><a href="<?php echo site_url();?>user/add_new_alert">Create New Alert</a></button>
		</div>

</div>
</div>
