<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
	<div class="container">
	<?php echo $this->breadcrumbs->show();?>
		<div class="dashboard-left float-left">
			 <?php $this->load->view('frontend/user/dashboard_nav');?>
		</div>

		<div class="dashboard-right float-right">

			<div class="top-welcome">
				<h2>Alerts</h2>
			</div>

			 <table class="table table-bordered">
        
        <?php
        if(!$record){
        ?>
        <p>There are currently no search alerts.</p>
        <?php
        }else{
            ?>
            <tr>
                <th>Date</th>
                <th>Alert Description</th>
            </tr>
            <?php foreach($record as $rec){ ?>
            <tr>
                <td>
                    <?php echo $rec['searcheddate'];?>
                </td>
                <td>
                    <?php 
                        $user = get_user($rec['user_id']);
                        echo $user['name'].' has searched caregiver on frumcare with '.$rec['year_experience'].' years of experience available on '.$rec['time'].' experienced with '.ucwords($rec['experience']).' and '.$rec['education'].'in education';
                    ?>
                </td>
            </tr>
            <?php
            }
        }
        ?>
    </table>

		</div>
	</div>
