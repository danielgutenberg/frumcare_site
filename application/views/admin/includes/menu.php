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
          if(in_array('profilepics',$tempaccess)){
            $ppaccess = site_url().'admin/user/profilepicture';
            $picaccess = site_url().'admin/user/picturemanagement';
            }
          else
            $ppaccess = site_url().'admin/#';
          if(in_array('userprofile', $tempaccess))
            $uprofileaccess = site_url().'admin/user/profile';
          else
            $uprofileaccess = site_url().'admin/#';

            if(in_array('emailtemplate', $tempaccess))
                $emaillog  = site_url().'admin/emaillogs';
            else
                $emaillog = site_url().'admin/#';

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
      <nav>

        <ul>
            <li>
                <a href="<?php echo site_url();?>admin/dashboard" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Dashboard</span></a>
            </li>
            <li>
                <a href="<?php echo site_url();?>admin/admin" title="Admin"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Admin</span></a>
            </li>
            <li>
                <a href="<?php echo $adminrole;?>" title="Admin Role"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Admin Role</span></a>
            </li>
            <li>
                <a href="<?php echo $pageaccess;?>" title="Page Manager"><i class="fa fa-lg fa-fw fa-file-o"></i> <span class="menu-item-parent">Page Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $useraccess;?>" title="User Manager"><i class="fa fa-lg fa-fw fa-sitemap"></i> <span class="menu-item-parent">User Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $logaccess;?>" title="User Log Manager"><i class="fa fa-lg fa-fw fa-bar-chart"></i> <span class="menu-item-parent">User Log Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $ppaccess;?>" title="User ProfilePicture Manager"><i class="fa fa-lg fa-fw fa-film"></i> <span class="menu-item-parent">User Profile Picture Manager</span></a>
            </li>
            <!-- <li>
                <a href="<?php // echo $picaccess;?>" title="Picture Manager"><i class="fa fa-lg fa-fw fa-film"></i> <span class="menu-item-parent">Picture Manager</span></a>
            </li> -->
            <li>
                <a href="<?php echo $uprofileaccess;?>" title="User Profile Configuration"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">User Profile Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $emaillog;?>" title="Email Log"><i class="fa fa-lg fa-fw fa-pencil"></i> <span class="menu-item-parent">Email Sent Box</span></a>
            </li>
            <li>
              <a href="<?php echo $emailtemplate;?>" title="Email Template Manager"><i class="fa fa-lg fa-fw fa-pencil"></i> <span class="menu-item-parent">Email Template Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $payment;?>" title="Payment Manager"><i class="fa fa-lg fa-fw fa-dollar"></i> <span class="menu-item-parent">Payment Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $adaccess;?>" title="Ad Manager"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Ad Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $searchalert;?>" title="Search Alert"><i class="fa fa-lg fa-fw fa-search"></i> <span class="menu-item-parent">Search Alert</span></a>
            </li>
            <li>
                <a href="<?php echo $package;?>" title="Package Manager"><i class="fa fa-lg fa-fw fa-suitcase"></i> <span class="menu-item-parent">Package Manager</span></a>
            </li>
            <li>
                <a href="<?php echo $feature;?>" title="Feature Manager"><i class="fa fa-lg fa-fw fa-th"></i> <span class="menu-item-parent">Feature Manager</span></a>
            </li>
            <li>
              <a href="<?php echo $ticket;?>" title="Ticket Manager"><i class="fa fa-lg fa-fw fa-ticket"></i> <span class="menu-item-parent">Ticket Manager</span></a>
            </li>
            <li>
              <a href="<?php echo $testimonial;?>" title="Testimonial Manager"><i class="fa fa-lg fa-fw fa-quote-left"></i> <span class="menu-item-parent">Testimonial Manager</span></a>
            </li>
            <li>
              <a href="<?php echo $generalseo;?>" title="General SEO Manager"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">General SEO Manager</span></a>
            </li>
            <li>
              <a href="<?php echo $notification;?>" title="Notification Manager"><i class="fa fa-lg fa-fw fa-bell"></i><span class="menu-item-parent">Notification Manager</span></a>
            </li>
        </ul>
      </nav>
      <span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>

<div id="main" role="main">

  <div id="ribbon">

        <span class="ribbon-button-alignment">
          <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>
        <!-- breadcrumb -->
        <ol class="breadcrumb">
          <li>
            <a href="<?php echo site_url();?>admin/dashboard">Home</a>
          </li>
          <?php if(isset($title)) echo '<li><a href="'.site_url().'admin/'.$this->uri->segment(2).'">'.$title.'</a></li>';?>
          <?php if(isset($pagetitle)) echo '<li>'.$pagetitle.'</li>';?>
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
<style ="text/css">
#demo-setting{
  display: none;
}
</style>
