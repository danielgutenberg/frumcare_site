<!DOCTYPE html>
<!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
        ?>

        <?php 
        $this->load->model('common_model');
        if($title=='Register'){

            $seodata=array('meta_title'=>'Create a Caregiver, Parent or Institution Profile on FrumCare','meta_desc'=>'Caregivers, parents & institutions: create a free profile & find suitable caregivers & caregiver jobs in the Jewish community. Advertising opportunities available too!','meta_keywords'=>'');

        }
        elseif($title=='Caregivers'){
            $seodata=array('meta_title'=>'Find a Jewish Babysitter, Nanny or Senior Caregiver - FrumCare','meta_desc'=>'Frumcare is the only online tool to find the perfect nanny, babysitter or senior caregiver in the Jewish community.','meta_keywords'=>'');

        }
        elseif($title=='Jobs'){
            $seodata=array('meta_title'=>'Find A Local Caregiver Job In The Jewish Community - FrumCare','meta_desc'=>'Our searchable database of babysitting, senior caregiver jobs & more helps you find a suitable job in the Jewish community, in just the right location.','meta_keywords'=>'');

        }
        elseif($title=='Workers / Staff'){
            $seodata=array('meta_title'=>'Jewish Organizations Find Caregivers & Staff ','meta_desc'=>'Jewish organizations and institutions can successfully recruit caregivers, employees and staff as well as advertise their services on FrumCare.com ','meta_keywords'=>'');

        }
        elseif($title=='Therapist'){
            $seodata=array('meta_title'=>'Find Jewish Therapists Serving the Jewish Community - FrumCare ','meta_desc'=>'Frum Care brings you qualified therapists sensitive to the needs of the Jewish community.','meta_keywords'=>'');

        }

        elseif($title=='Help'){
            $seodata=array('meta_title'=>'Contact Us','meta_desc'=>'Contact us if you need more information or help finding Jewish babysitters & Jewish jobs or if we can help you in anyway.','meta_keywords'=>'');

        }
        elseif($title=='How it works'){
            $seodata=array('meta_title'=>'Learn How FrumCare Works','meta_desc'=>'The ins and outs of our online tool for caregivers, job seekers and Jewish families seeking in home help.','meta_keywords'=>'');

        }
        elseif($title=='Safety Guide - For Families'){
            $seodata=array('meta_title'=>'A Safety Guide for Families seeking household help','meta_desc'=>'Whether you are seeking a Jewish babysitter, housekeeper, childcare or elderly care, FrumCare provides a safety guide to having a positive and safe experience for your Jewish home.','meta_keywords'=>'');

        }
        elseif($title=='Safety Guide - For Caregivers'){
            $seodata=array('meta_title'=>'A Safety Guide for Caregivers','meta_desc'=>'As a caregiver your safety comes first.Whether you are a babysitter, housekeeper or senior care worker, FrumCare guides you to having a safe caregiver experience..','meta_keywords'=>'');

        }
        elseif($title=='Advice and Tips - For Families'){
            $seodata=array('meta_title'=>'Hiring a Caregiver: Tips From the Experts','meta_desc'=>'Expert tips on how to hire the best caregiver for your Jewish home.','meta_keywords'=>'');

        }
        elseif($title=='Advice and Tips - For Caregivers'){
            $seodata=array('meta_title'=>'Advice and Tips for Caregivers from the Experts','meta_desc'=>'FrumCare shares expert advice and tips for caregivers including preventing caregiver burnout, preparing for an interview, how to look for a caregiver job & more.','meta_keywords'=>'');

        }
        elseif($content_data){
            $seodata=array('meta_title'=>$content_data['seo_meta_title'],'meta_desc'=>$content_data['seo_meta_description'],'meta_keywords'=>$content_data['seo_meta_keywords']);
        }

        else{

            $seodata = $this->common_model->getSEODATA();

        }
        ?>

        <title><?php echo $seodata['meta_title'].' - '; ?> FrumCare</title>

        <meta name="title" content="<?php echo $seodata['meta_title'];?>">
        <meta name="description" content="<?php echo $seodata['meta_desc'];?>">
        <meta name="keywords" content="<?php echo $seodata['meta_keywords'];?>">


        

        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url('css/all.css') ?>">
        
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' type='text/css'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <!--[if lt IE 9]>
        <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
        <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
        <link rel="icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php echo base_url('js/jgrowl.js') ?>"></script>
        <script src="<?php echo base_url('js/vendor/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('js/select.js') ?>"></script>
        <script src="<?php echo base_url('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') ?>"></script>
        <script src="<?php echo base_url('js/jquery.raty.js') ?>"></script>

        <!-- Facebook Conversion Code for Caregiver leads -->
        <script>(function() {
                var _fbq = window._fbq || (window._fbq = []);
                if (!_fbq.loaded) {
                    var fbds = document.createElement('script');
                    fbds.async = true;
                    fbds.src = '//connect.facebook.net/en_US/fbds.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(fbds, s);
                    _fbq.loaded = true;
                }
            })();
            window._fbq = window._fbq || [];
            window._fbq.push(['track', '6030516600835', {'value':'0.01','currency':'ILS'}]);
        </script>
        <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6030516600835&amp;cd[value]=0.01&amp;cd[currency]=ILS&amp;noscript=1" /></noscript>
</head>
<body onload="initialize()">

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NXZHPF"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NXZHPF');</script>
<!-- End Google Tag Manager -->


    <div class="page-loader-modal"></div>
<!--[if lt IE 9]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="site-wrapper">
        <header class="header">
            <div class="top-bar clearfix">
                <div class="container">
                    <div class="login-links">
                        <?php if (!$this->session->userdata('current_user') && !$this->session->userdata('fb_id') && !$this->session->userdata('twitter_id')) { ?>
                        <a href="<?php echo base_url('signup') ?>"><i class="icon-login">&nbsp;</i>Sign up</a>
                        <a href="<?php echo base_url('login') ?>"><i class="icon-lock">&nbsp;</i>Log in</a>
                        <?php
                    } else {
                        if ($this->session->userdata('fb_id'))
                            $logout = $this->session->userdata('fb_logout');
                        else
                            $logout = base_url('logout'); ?>
                        <a href="<?php echo base_url('user/dashboard') ?>"><i class="icon-login">&nbsp;</i>My
                            Account</a>
                            <a href="<?php echo $logout ?>"><i class="icon-lock">&nbsp;</i>Log out</a>
                            <?php } ?>
                        </div>

                        <div class="search">
                        <form method="get" action="<?php echo site_url();?>search">
                            <div class="search-select">
                            <select name="category" style="width: 100%">
                                <option value="all">All</option>
                                <option value="caregiver" class="selected">Caregivers</option>
                                <option value="careseeker">Jobs</option>
                            </select>
                            </div>

                            <div class="dropdown">
                                <input type="text" name="search_for" value="" placeholder="Search" data-toggle="dropdown" required="required"/>
                                <input type="hidden" value=""/>
                                <button type="submit" class="submit"><i class="icon-search">&nbsp;</i></button>

                            </div>
                        </form>
                    </div>
        
        <!--end search-->
    </div>
</div>
<!--end top-bar-->

<div class="header-main">
    <div class="container">
        <h1 class="col-lg-4 col-md-4 col-sm-4 col-xs-12 center logo">
            <a href="<?php echo base_url() ?>">
                <img src="<?php echo base_url('img/logo.png') ?>" alt="Frumcare.com">
            </a>
        </h1>

        <div class="navigation col-lg-8 col-md-8 col-sm-8 col-xs-12 center">
            <nav>
                <div class="toggle-menu">Menu</div>
                <ul class="primary-nav">
                            <li>
                                <div class="dropdown">
                                  <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                                    Caregivers
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>signup">Create a Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>caregivers/all">Find a Caregiver</a></li>
                                </ul>
                            </div>
                        </li>

                        <li>
                           <div class="dropdown">
                              <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                                Jobs
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>signup" id="2" class="postjob">Post a Job</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>jobs/all">Find a Job</a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                       <div class="dropdown">
                          <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                            Institutions
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>signup"> Advertise Your Services</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>caregivers/organizations">Find Workers for Your Organization</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                   <div class="dropdown">
                      <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                        Therapists
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>signup">Advertise Your Services</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url();?>caregivers/therapists">Find a Therapist</a></li>
                    </ul>
                </div>
            </li>

            <li><a href="<?php echo site_url("blog")?>">Blog</a></li>

        </ul>
    </nav>
</div>
<div class="clearfix"></div>
</div>
</div>
<!--end header-main-->
</header>
<script>
$('.postjob').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    $.ajax({
        type:"post",
        url:"<?php echo site_url();?>signup/setsession",
        data:"account_type="+id,
        success:function(msg){
            if(msg == 'done'){
                window.location.href="<?php echo site_url();?>signup";
            }
        }

    })
});

$(function(){
    $("#locationField").keypress(function(event){
        if ((event.charCode >= 47 && event.charCode <= 57) || // 0-9
            (event.charCode >= 65 && event.charCode <= 90) || // A-Z
            (event.charCode >= 97 && event.charCode <= 122)||
            (event.charCode == 32 || event.charCode == 92)){
                return true
            } 
            else {
                alert("Please use only english letters");
                event.preventDefault()
            }
            
    });
});
</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=places&language=en-AU"></script>
<script>
    $("#locationField").ready(function(){
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {types: ['address']});
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            $("#cityName").val('');
            $("#stateName").val('');
            $("#countryName").val('');
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            var i = 0;
            var len = place.address_components.length;
            while (i < len) {
                var ac = place.address_components[i];
                if (ac.types.indexOf('locality') >= 0 || ac.types.indexOf('sublocality') >=0 ) {
                    $("#cityName").val(ac.long_name);
                }
                if (ac.types.indexOf('administrative_area_level_1') >= 0) {
                    $("#stateName").val(ac.short_name);
                }
                if (ac.types.indexOf('country') >= 0) {
                    $("#countryName").val(ac.long_name);
                }
                i++;
            }
            $("#lat").val(lat);
            $("#lng").val(lng);
            document.getElementById("error").innerHTML="";
        });
        
        $("#locationField").keypress(function(event){
            if ((event.charCode >= 47 && event.charCode <= 57) || // 0-9
                (event.charCode >= 65 && event.charCode <= 90) || // A-Z
                (event.charCode >= 97 && event.charCode <= 122)||
                (event.charCode == 32 || event.charCode == 92)){
                    return true
                } 
            else {
                alert("Please use only english letters in the location search");
                event.preventDefault()
            }
        });
        
        $('#locationField').on('click', function(){
            $('#autocomplete').val('')
            $('#lat').val('')
        });
        
        $('#locationSearch').on('click', function(){
            $('#autocomplete').val('')
            $('#lat').val('')
        });
    });
    
</script>
<script>
    $(document).ready(function(){
        $('#careseekerButton').click(function(event) {
            event.preventDefault(); 
            if ($('#lat').val() == '') {
                window.scrollTo(0, $("#locationField").offset().top);
                $("#locationField").css('border-color', 'red')
                document.getElementById("error").innerHTML="Please click on location from dropdown";
            } else {
                $('#personal-details-form').submit()
            }
        });
        $('#edit-account-button').click(function(event) {
            event.preventDefault(); 
            if ($('#lat').val() == '') {
                window.scrollTo(0, $("#locationField").offset().top);
                $("#locationField").css('border-color', 'red')
                document.getElementById("error").innerHTML="Please click on location from dropdown";
            } else {
                $('#edituserdetails').submit()
            }
        });
    });
     
    $("#dateTextbox").ready(function(){
        $( "#dateTextbox" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    });
</script>

<script>
    $(document).ready(function(){
        $('#contact_number').mask('999-999-9999');
    });
</script>
