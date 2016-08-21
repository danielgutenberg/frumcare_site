<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>

	<div class="dashboard-left float-left">
		 <?php $this->load->view('frontend/user/dashboard/nav');?>
	</div>
	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2><?php echo $title; ?></h2>
		</div>
		
		


       
	   <table class="table table-bordered table-striped">
        
        <?php
        if(!$record){
        ?>
        <p>No Messages</p>
        <?php
        }
        else{
            ?>
            <tr>
                <th>Time</th>
                <th>Message</th>
            </tr>
            <?php
            foreach($record['messages'] as $rec) { ?>
            <tr>
                <td>
                    <?php echo $rec['time']?>
                </td>
                <td>
                    <?php echo $rec['comment'] ?>
                </td>
            </tr>
        <?php }
        }
        ?>
    </table>


</div>
</div>
