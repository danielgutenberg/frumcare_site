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
        <meta property="og:title" content="Write a Review" />
    <meta property="og:type" content="Sharing Widgets" />
    <meta property="og:url" content="<?php echo current_url(); ?>" />
    <meta property="og:description" content="Please write a review on my profile" />
    <meta property="og:site_name" content="FrumCare.com" />
        <?php
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
        ?>

        <?php 
        $this->load->model('common_model');
        $seodata = $this->common_model->getSEODATA($seotitle);
        ?>
        
        <script>/*<![CDATA[*/_holyclock_id="2ba2720960c4f7f322a73415bc856a21";_holyclock_tag='<s'+'cript src\x3d"//www.holyclock.com/holyclock.js?'+Math.floor(+new Date/864E5)+'">\x3c/script>';null!==document.cookie.match(/(?:^|;)\s*_holyclock_qr=\s*\w/)&&null===window.location.hash.match(/#holyclock=qr(?=#|$)/)&&document.write(_holyclock_tag);//]]></script>


        <title><?php echo $seodata['meta_title'];?></title>

        <meta name="title" content="<?php echo $seodata['meta_title'];?>">
        <meta name="description" content="<?php echo $seodata['meta_desc'];?>">
        <meta name="keywords" content="<?php echo $seodata['meta_keywords'];?>">

        
        <link rel="shortcut icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
        <link rel="icon" href="<?php echo site_url("img/favicon.ico")?>" type="image/x-icon">
        
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' type='text/css'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Varela+Round' type='text/css'>
        <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url('css/compressedMain9.css') ?>">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        
        <script src="<?php echo base_url('js/vendor/alljs.min.js') ?>"></script>

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
        <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58cf9555115dd2001125f310&product=custom-share-buttons"></script>
</head>
<body>



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
    <div id="site-wrapper">
        <header class="header">
            <div class="top-bar clearfix">
                
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
                <div class="container">
                    <div class="login-links">
                        <?php if (!$this->session->userdata('current_user') && !$this->session->userdata('fb_id') && !$this->session->userdata('twitter_id')) { ?>
                        <a href="<?php echo base_url('signup') ?>"><i class="icon-login" style="background-image: url(../frumcare/img/lock.png);">&nbsp;</i>Sign up</a>
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


                    </div>
    </div>
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
<script type="text/javascript" src="//maps.google.com/maps/api/js?libraries=places&language=en-AU"></script>

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
        $( "#dateTextbox" ).datepicker({ dateFormat: 'mm/dd/yy' }).val();
    });
</script>

<script>
    $(document).ready(function(){
        $('#contact_number').mask('999-999-9999');
    });
</script>
<script>
    $("#locationField").ready(function(){
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {types: ['address']});
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            $("#locationName").val($("#autocomplete").val());
            $("#cityName").val('');
            $("#stateName").val('');
            $("#countryName").val('');
            var place = autocomplete.getPlace();
            $('.locationName').val(place.formatted_address)
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
    $(document).ajaxSend(function(elm, xhr, s){
        if (s.data instanceof FormData) {
            s.data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>')
        } else {
            if(s.data){
    
                s.data += '&';
            }
            s.data += '<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>';
        }
    });
</script>