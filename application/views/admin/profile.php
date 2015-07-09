<div class="row">
    <div class="col-md-9 content-box">
        <div class="row main-content">
            <h2>Welcome <?php echo $user_details[0]['full_name'];?></h2>
            <a href="<?php echo site_url('admin/admin/edit')."/".$user_details[0]['id']; ?>" class="btn btn-info">Update Details ?</a>
        	<?php if($this->session->flashdata('info'))
        	{
        		$info = $this->session->flashdata('info');
        		echo "<h3 class='someinfo alert alert-danger'>$info</h3> ";
        	}
            ?>
         </div>
    </div>
</div>
