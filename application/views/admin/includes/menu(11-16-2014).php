<aside id="left-panel">
      <!-- User info -->
      <div class="login-info">
          <span>
            <a href="<?php echo site_url();?>admin/admin/adminprofile/<?php echo $this->session->userdata['admin_id'];?>"><img src="<?php echo site_url("plugins/admin/img/avatars/sunny.png")?>" alt="me" class="online" /> </a>
            <a href="<?php echo site_url();?>admin/admin/adminprofile/<?php echo $this->session->userdata['admin_id'];?>" id="show-shortcuts">
            <?php echo ucwords($this->session->userdata['admin_username']);?> 
            <!-- <i class="fa fa-angle-down"></i> -->
          </a> 
          </span>
      </div>
      <!-- end user info -->
      
      
       <?php 
        $admin_level  = $this->session->userdata['admin_level'];
        if($admin_level){
          $accessareas  = Common_model::getRoleAccessByRoleName($admin_level);
          $tempaccess = explode(',',$accessareas['access']);
          if(in_array('pages', $tempaccess))
            $pageaccess = site_url().'admin/page';
          else
            $pageaccess = site_url().'admin/#';
          if(in_array('viewusers',$tempaccess))
            $useraccess = site_url().'admin/user';
          else
            $useraccess = site_url().'admin/#';
          if(in_array('viewuserlog',$tempaccess))
              $logaccess = site_url().'admin/user/logs';
          else
            $logaccess  = site_url().'admin/#';
          if(in_array('profilepics',$tempaccess))
            $ppaccess = site_url().'admin/user/profilepicture';
          else
            $ppaccess = site_url().'admin/#';
          if(in_array('userprofile', $tempaccess))
            $uprofileaccess = site_url().'admin/user/profile';
          else
            $uprofileaccess = site_url().'admin/#';
          if(in_array('emailtemplate', $tempaccess))
              $emailtemplate  = site_url().'admin/emailtemplate';
          else
            $emailtemplate = site_url().'admin/#';
          if(in_array('admanager',$tempaccess))
            $adaccess = site_url().'admin/ad';
          else
            $adaccess = site_url().'admin/#';
          if(in_array('searchalert',$tempaccess))
            $searchalert = site_url().'admin/searchalert';
          else
            $searchalert = site_url().'admin/#';
          if(in_array('package',$tempaccess))
            $package = site_url().'admin/package';
          else
            $package = site_url().'admin/#';
          if(in_array('feature',$tempaccess))
            $feature = site_url().'admin/feature';
          else
            $feature = site_url().'admin/#';
          if(in_array('testimonial',$tempaccess))
            $testimonial = site_url().'admin/testimonial';
          else
            $testimonial = site_url().'admin/#';
          if(in_array('notifications',$tempaccess))
            $notifications = site_url().'admin/notifications';
          else
            $notifications = site_url().'admin/#';
          if(in_array('accept_payment',$tempaccess))
            $payment = site_url().'admin/payment';
          else
            $payment = site_url().'admin/#';
          if(in_array('acceptandrejectad',$tempaccess))
            $ad = site_url().'admin/ad';
          else
            $ad = site_url().'admin/#';
          if(in_array('replyticket',$tempaccess))
            $ticket = site_url().'admin/ticket';
          else
            $ticket = site_url().'admin/#';
          if(in_array('generalseo',$tempaccess))
            $generalseo = site_url().'admin/genericseo';
          else
            $generalseo = site_url().'admin/#';
          if(in_array('notification',$tempaccess))
            $notification = site_url().'admin/notification';
          else
            $notification = site_url().'admin/#';
          if(in_array('adminrole',$tempaccess))
            $adminrole = site_url().'admin/adminrole';
          else
            $adminrole = site_url().'admin/#';
          if(in_array('admin',$tempaccess))
            $admin= site_url().'admin/admin';
          else
            $admin= site_url().'admin/#';
        }         
      ?>

   <?php /*    <nav>

        <ul>
            <li>
                <a href="<?php echo site_url();?>admin/dashboard" title="Dashboard">Dashboard</a>
            </li>
          <li>
                <a href="<?php echo site_url();?>admin/admin" title="Admin Manager">Admin Manager</a>
            </li>
	<li>
              <a href="<?php echo site_url();?>admin/adminrole" title="Admin Role Manager">AdminRole Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/page" title="Page Manager">Page Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/user" title="User Manager">User Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/user/logs" title="User Log Manager">User Log Manager</a>
            </li>
            <li>  
                <a href="<?php echo site_url();?>admin/user/profilepicture" title="User ProfilePicture Manager">User Profile Picture Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/user/profile" title="User Profile Configuration">User Profile Manager</a>
            </li>
            <li>
              <a href="<?php echo site_url();?>admin/emailtemplate" title="Email Template Manager">Email Template Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/payment" title="Payment Manager">Payment Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/ad" title="Ad Manager">Ad Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/searchalert" title="Search Alert">Search Alert</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/package" title="Package Manager">Package Manager</a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/feature" title="Feature Manager">Feature Manager</a>
            </li>
            <li>
              <a href="<?php echo site_url();?>admin/ticket" title="Ticket Manager">Ticket Manager</a>
            </li>
            <li>
              <a href="<?php echo site_url();?>admin/testimonial" title="Testimonial Manager">Testimonial Manager</a>
            </li>
            <li>
              <a href="<?php echo site_url();?>admin/genericseo" title="General SEO Manager">General SEO Manager</a>
            </li>
            <li>
              <a href="<?php echo site_url();?>admin/notification" title="Notification Manager">Notification Manager</a>
            </li>
            
        </ul>
      </nav> */?>
      
      
       <nav>
        <ul>
            <li>
                <a href="<?php echo site_url();?>admin/dashboard" title="Dashboard">Dashboard</a>
            </li>
            <li>
                <a href="<?php echo $admin;?>" title="Admin">Admin</a>
            </li>
            <li>
                <a href="<?php echo $adminrole;?>" title="Admin Role">AdminRole</a>
            </li>
            <li>
                <a href="<?php echo $pageaccess;?>" title="Page Manager">Page Manager</a>
            </li>
            <li>
                <a href="<?php echo $useraccess;?>" title="User Manager">User Manager</a>
            </li>
            <li>
                <a href="<?php echo $logaccess;?>" title="User Log Manager">User Log Manager</a>
            </li>
            <li>  
                <a href="<?php echo $ppaccess;?>" title="User ProfilePicture Manager">User Profile Picture Manager</a>
            </li>
            <li>
                <a href="<?php echo $uprofileaccess;?>" title="User Profile Configuration">User Profile Manager</a>
            </li>
            <li>
              <a href="<?php echo $emailtemplate;?>" title="Email Template Manager">Email Template Manager</a>
            </li>
            <li>
                <a href="<?php echo $payment;?>" title="Payment Manager">Payment Manager</a>
            </li>
            <li>
                <a href="<?php echo $adaccess;?>" title="Ad Manager">Ad Manager</a>
            </li>
            <li>
                <a href="<?php echo $searchalert;?>" title="Search Alert">Search Alert</a>
            </li>
            <li>
                <a href="<?php echo $package;?>" title="Package Manager">Package Manager</a>
            </li>
            <li>
                <a href="<?php echo $feature;?>" title="Feature Manager">Feature Manager</a>
            </li>
            <li>
              <a href="<?php echo $ticket;?>" title="Ticket Manager">Ticket Manager</a>
            </li>
            <li>
              <a href="<?php echo $testimonial;?>" title="Testimonial Manager">Testimonial Manager</a>
            </li>
            <li>
              <a href="<?php echo $generalseo;?>" title="General SEO Manager">General SEO Manager</a>
            </li>
            <li>
              <a href="<?php echo $notification;?>" title="Notification Manager">Notification Manager</a>
            </li>
        </ul>
      </nav>
      
      <span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>

<div id="main" role="main">

  <div id="ribbon">

        <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
          <li>Home</li><?php if(isset($title)) echo '<li>'.$title.'</li>';?>
        </ol>
        <!-- end breadcrumb -->

        <!-- You can also add more buttons to the
        ribbon for further usability

        Example below:

        <span class="ribbon-button-alignment pull-right">
        <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
        <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
        <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
        </span> -->

      </div>
      <!-- END RIBBON -->
  <div id="content">


<script type="text/javascript">
  // $(document).ready(function(){
  //   $('#show-shortcut').on(click, function(){
      
  //   });
  // });
</script>
