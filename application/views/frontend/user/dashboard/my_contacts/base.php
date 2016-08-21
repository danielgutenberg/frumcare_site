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
        <p>No Contacts</p>
        <?php
        }
        else{
            ?>
            <tr>
                <th>Contact Name</th>
                <th>Email</th>
                <th># of Messages</th>
                <th>Messages</th>
                <th>Send a Message</th>
            </tr>
            <?php
            foreach($record as $rec) { ?>
            <tr>
                <td>
                    <?php echo $rec['name']?>
                </td>
                <td>
                    <?php echo $rec['email'] ?>
                </td>
                <td>
                    <?php echo count($rec['messages']); ?>
                </td>
                <td>
                    <button style="width:120px; margin-bottom:3px">
                        <a target="_blank" href="<?php echo site_url() . 'user/contacts/' . $rec['id'] ?>">View Messages</a>
                    </button>
                </td>
                <td>
                    <button style="width:120px; margin-bottom:3px">
                        <a target="_blank" href="<?php echo site_url() . $rec['url'] ?>">Send Message</a>
                    </button>
                </td>
            </tr>
        <?php }
        }
        ?>
    </table>


</div>
</div>
