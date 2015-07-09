<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <h3>My Profile</h3>
            <p><?php echo $current_user[0]['first_name'].' '.$current_user[0]['last_name'];?></p>
            <div style="width: 100px; height: 100px; background-color: #03a9f4;">Img</div><br />
            <a href="#"><button class="btn btn-default">Select Photo</button></a>
        </div>
        
        <div class="col-xs-12 col-md-8">
            
        </div>
    </div>
    <br />
    <div>
        <?php echo anchor('user/addprofile','Add New Profile');?></a> &nbsp; &nbsp; 
        <a href="<?php echo site_url();?>user/upgradestatus">Upgrade Status</a>
    </div>
</div>

<!------------------------------------------------------------------------!>
<!------------------------------------------------------------------------!>


