<!DOCTYPE html>
<html lang="en-us">
  <meta charset="utf-8">

  <title><?php if(isset($title)){echo $title." - " ;} echo "Admin Panel - FrumCare"; ?></title>
  
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initimental-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <!-- Basic Styles -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/bootstrap.min.css")?>">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/font-awesome.min.css")?>">

  <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/smartadmin-production.css")?>">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/smartadmin-skins.css")?>">

  <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url("plugins/admin/css/demo.css")?>">

  <!-- FAVICONS -->
  <link rel="shortcut icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
  <link rel="icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
  <script src="<?php echo site_url();?>js/jquery.min.js"></script>
  <script src="<?php echo site_url();?>js/jquery.validate.js"></script>
  <script src="<?php echo site_url("plugins/ckeditor/ckeditor.js")?>"></script>
  <script src="<?php echo site_url("plugins/ckfinder/ckfinder.js")?>"></script>
  
    <?php /* extra css added by santosh starts */?>
      <link href="<?php echo site_url();?>css/adminextra.css" type="text/css" rel="stylesheet">
    <?php /* extra css added by santosh ends */?>
  <!-- GOOGLE FONT -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
</head>
<body class="<?php echo segment(2);?>" onload="initialize()">

  <!-- HEADER -->
    <header id="header">
      <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        <span id="" style="margin: 0 16px 0 8px"> 
          <a href="<?php echo site_url();?>admin/dashboard"><img src="<?php echo site_url();?>img/logo.png" height="45px"></a>
        </span>
        <a href="<?php echo site_url();?>admin/dashboard"><span class="logo-text">Admin</span></a>
        <!-- END LOGO PLACEHOLDER -->

        <!-- Note: The activity badge color changes when clicked and resets the number to 0
        Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
        
        <!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
        <div class="ajax-dropdown">

          <!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
          <div class="btn-group btn-group-justified" data-toggle="buttons">
            <label class="btn btn-default">
              <input type="radio" name="activity" id="ajax/notify/mail.html">
              Msgs (14) </label>
            <label class="btn btn-default">
              <input type="radio" name="activity" id="ajax/notify/notifications.html">
              notify (3) </label>
            <label class="btn btn-default">
              <input type="radio" name="activity" id="ajax/notify/tasks.html">
              Tasks (4) </label>
          </div>

          <!-- notification content -->
          <div class="ajax-notifications custom-scroll">

            <div class="alert alert-transparent">
              <h4>Click a button to show messages here</h4>
              This blank page message helps protect your privacy, or you can show the first message here automatically.
            </div>

            <i class="fa fa-lock fa-4x fa-border"></i>

          </div>
          <!-- end notification content -->

          <!-- footer: refresh area -->
          <span> Last updated on: 12/12/2013 9:43AM
            <button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
              <i class="fa fa-refresh"></i>
            </button> </span>
          <!-- end footer -->

        </div>
        <!-- END AJAX-DROPDOWN -->
      </div>

      <!-- projects dropdown -->
     <?php /* <div id="project-context">

        <span class="label">Projects:</span>
        <span id="project-selector" class="popover-trigger-element dropdown-toggle" data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span>

        <!-- Suggestion: populate this list with fetch and push technique -->
        <ul class="dropdown-menu">
          <li>
            <a href="javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
          </li>
          <li>
            <a href="javascript:void(0);">Notes on pipeline upgradee</a>
          </li>
          <li>
            <a href="javascript:void(0);">Assesment Report for merchant account</a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
          </li>
        </ul>
        <!-- end dropdown-menu-->
 
      </div> */?>
      <!-- end projects dropdown -->

      <!-- pulled right: nav area -->
      <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
          <span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
          <span> <a href="<?php echo site_url("admin/logout")?>" title="Sign Out"><i class="fa fa-sign-out"></i></a> </span>
        </div>
        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
          <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- input: search field -->
       <!-- <form action="#search.html" class="header-search pull-right">
          <input type="text" placeholder="Find reports and more" id="search-fld">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
          <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
        </form>
        <!-- end input: search field -->

        <!-- multiple lang dropdown : find all flags in the image folder -->
       <?php /*  <ul class="header-dropdown-list hidden-xs">
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="" src="<?php echo site_url('plugins/admin/img/flags/us.png')?>"> <span> US </span> <i class="fa fa-angle-down"></i> </a>
            <ul class="dropdown-menu pull-right">
              <li class="active">
                <a href="javascript:void(0);"><img alt="" src="<?php echo site_url('plugins/admin/img/flags/us.png')?>"> US</a>
              </li>
              <li>
                <a href="javascript:void(0);"><img alt="" src="<?php echo site_url('plugins/admin/img/flags/es.png')?>"> Spanish</a>
              </li>
              <li>
                <a href="javascript:void(0);"><img alt="" src="<?php echo site_url('plugins/admin/img/flags/de.png')?>"> German</a>
              </li>
            </ul>
          </li>
        </ul> */?>
        <!-- end multiple lang -->

      </div>
      <!-- end pulled right: nav area -->

    </header>
    <!-- END HEADER -->
    
<div class="wrapper">

<!-- google map starts -->
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
    console.log(place);
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>
<!-- for google map ends -->
