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
        <title><?php if(isset($title)) echo $title.' - '; ?> FrumCare</title>
        <?php 
        $this->load->model('common_model');
        if($title=='Register'){

            $seodata=array('meta_title'=>'Create a Caregiver, Parent or Institution Profile on FrumCare','meta_description'=>'Caregivers, parents & institutions: Create a free profile & find suitable caregivers & caregiver jobs in the frum community. Advertising opportunities available too!','meta_keywords'=>'');

        }else{

            $seodata = $this->common_model->getSEODATA();
        }
        ?>

        <meta name="title" content="<?php echo $seodata['meta_title'];?>">
        <meta name="description" content="<?php echo $seodata['meta_desc'];?>">
        <meta name="keywords" content="<?php echo $seodata['meta_keywords'];?>">


        <link href="<?php echo site_url();?>css/bootstrap.css" type="text/css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url('css/main.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/jgrowl.css') ?>">
        <!-- <link rel="stylesheet" href="<?php //echo base_url('css/my-style.css') ?>"> -->
        <link rel="stylesheet" href="<?php echo base_url('css/extra.css') ?>">
        <link href="<?php echo site_url();?>css/progressbar.css" type="text/css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
    <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
    <link rel="icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
    <script src="<?php echo base_url('js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?php echo base_url('js/jquery.validate.js') ?>"></script>

    <script src="<?php echo base_url('js/jgrowl.js') ?>"></script>
    <script src="<?php echo base_url('js/vendor/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('js/select.js') ?>"></script>
    <script src="<?php echo base_url();?>js/jquery.ui.maskinput.js"></script>
    <script type="text/javascript" src="<?php echo site_url();?>js/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
    <link href="<?php echo site_url();?>css/jquery-ui.css" type="text/css" rel="stylesheet">
        <script src="<?php echo base_url('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') ?>"></script>

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



    <script>
        $("#textbox1").ready(function(){        
            $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
         });
        $('document').ready(function(){
            $('.left-search-panel h4').click(function(){
               $('.left-search-panel form').toggle();
            });
        });
    </script>

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
                                <input type="text" name="search_for" value="" placeholder="Search" data-toggle="dropdown"/>
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
                           <!--  <li><a href="<?php echo site_url();?>parents">Parents</a></li>
                            <li><a href="<?php echo site_url();?>caregivers">Caregivers</a></li>
                            <li><a href="<?php echo site_url();?>instutions">Institutions</a></li>
                            <li><a href="<?php echo site_url();?>therapists">Therapists</a></li>
                            <li><a href="<?php echo site_url("blog")?>">Blog</a></li> -->

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
</script>
