<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<title><?php imwb_zonpress_get_blogtitle(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php 
   $favicon = imwb_zonpress_get_option('faviconurl');
   if(empty($favicon)) 
      echo '<link rel="Shortcut Icon" href="'.get_template_directory_uri().'/images/favicon.ico" type="image/x-icon">';
   else
      echo '<link rel="Shortcut Icon" href="'.$favicon.'" type="image/x-icon">';
?>	
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script>
   jQuery(document).ready(function($) {
   $('a.zp-ctr-track, .zp-product .moretag').on('click', function(event) {
      var btn = this;
      var data = { action :'update_ctr_action', postid: $(btn).attr('data-post-item'), nonce : '<?php echo wp_create_nonce( "imwb_zonpress_update_ctr" );?>'};
      $.ajax({async: false, type: 'POST', url: '<?php echo admin_url( "admin-ajax.php" );?>', data: data,  dataType: 'json'});
   });
<?php if (is_user_logged_in()) { ?>
      $('a.wishlistlink').on('click', function(event) {
         var btn = this;
         var data = { action :'update_wishlist_action', postid: $(btn).attr('data-post-item'),
             userid: <?php echo $user_ID; ?>, nonce : '<?php echo wp_create_nonce( "imwb_zonpress_update_wishlist" );?>'
         };
         $.ajax({async: false, type: 'POST', url: '<?php echo admin_url( "admin-ajax.php" );?>',
            data: data,  dataType: 'json', success: function(data) { $(btn).replaceWith(data.html); }
         });
        event.preventDefault();
      });
<?php } 
if($_REQUEST['action'] == 'wishlist') {
?>
   $('a.del-wishlistlink').on('click', function(event) {
      var btn = this;
      var data = { action :'delete_wishlist_action', postid: $(btn).attr('data-post-item'), userid: <?php echo $user_ID; ?>,
          nonce : '<?php echo wp_create_nonce( 'imwb_zonpress_delete_wishlist' );?>'
      };
      $.ajax({ async: false, type: 'POST', url: '<?php echo admin_url( 'admin-ajax.php' );?>', data: data, dataType: 'json',
         success: function(data) { $(btn).parents('li').fadeOut('slow', function() {$(this).remove(); });}
      });
      event.preventDefault();
   });
<?php } ?>
   });
</script>
<?php
$pmColors = new CSS_Color(imwb_zonpress_get_option('menubgcol'));
$sbColors = new CSS_Color(imwb_zonpress_get_option('sidebarbgcol'));
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/<?php echo imwb_zonpress_get_option('navbarcol'); ?>.css" type="text/css"> 
<style>
a{color:<?php echo imwb_zonpress_get_option('acolor'); ?>;}
a:hover, a:focus {color:<?php echo imwb_zonpress_get_option('ahovercolor'); ?>;}
<?php if (imwb_zonpress_get_option('headerbgcol') != '#') { ?>
.header-wrapper  {background-color: <?php echo imwb_zonpress_get_option('headerbgcol'); ?>; }
<?php } ?>
.carousel-thumbs, .content_sidebar {background-color: <?php echo imwb_zonpress_get_option('postbgcol'); ?>; }
#mainCarousel { background-color: <?php echo imwb_zonpress_get_option('fpbgcol'); ?>; border: 1px solid <?php echo imwb_zonpress_get_option('fpbdrcol'); ?>}
#mainCarousel .carousel-inner > .item > .content .title a, #mainCarousel .carousel-inner > .item > .content .stats a, .wishlistlink, .wishlistlink:hover, .the-post h1.title {color: <?php echo imwb_zonpress_get_option('fptitlecol'); ?>;}
#mainCarousel .carousel-inner > .item > .content .title a:hover, #mainCarousel .carousel-inner > .item > .content .stats a:hover {color: <?php echo imwb_zonpress_get_option('fptitlehvrcol'); ?>;}
#mainCarousel .carousel-inner > .item > .content .description, #mainCarousel .carousel-inner > .item > .content .stats { color: <?php echo imwb_zonpress_get_option('fpdesccol'); ?>;}
.price {color: <?php echo imwb_zonpress_get_option('fppricecol'); ?>;}
<?php if (imwb_zonpress_get_option('sidebarbgcol') != '#') { ?>
.content_sidebar li,#footer .widget-area .widget_popularProducts  {background-color: #<?php echo $sbColors->bg[0]; ?>;}
.content_sidebar ul ul li a:hover, #widgets_404 ul ul li a:hover{background-color:  #<?php echo $sbColors->bg['-2']; ?>;}
<?php } ?>
#footer-wrapper  { background-color: <?php echo imwb_zonpress_get_option('footerbgcol'); ?>; }
#footer .widget-area ul ul li a {color: <?php echo imwb_zonpress_get_option('footertxtlinkcol'); ?>;}
#footer .widget-area ul ul li a:hover {color: <?php echo imwb_zonpress_get_option('footertxtlinkhvrcol'); ?>;}
#footer .widget-area .tagcloud a  {color: <?php echo imwb_zonpress_get_option('footertxtcol'); ?>;}
#footer .copyright {color: <?php echo imwb_zonpress_get_option('footercopyrightextcolor'); ?>;}
#site-navigation ul li a { color: <?php echo imwb_zonpress_get_option('sitemenutxtcol'); ?>;}
.well-white{background-color: <?php echo imwb_zonpress_get_option('homeboxbgcol'); ?>; }
.well-white h1{color: <?php echo imwb_zonpress_get_option('homeboxh1col'); ?>; }
.well-white p{color: <?php echo imwb_zonpress_get_option('homeboxtxtcol'); ?>; }
<?php if(imwb_zonpress_get_option('posthidemenu') == 'N')   { ?>
#post-navigation {background-color:  <?php echo imwb_zonpress_get_option('postmenubgcol'); ?>;}
#post-navigation ul li a { color: <?php echo imwb_zonpress_get_option('postmenutxtcol'); ?>;}
#post-navigation ul li a:hover { color: <?php echo imwb_zonpress_get_option('postmenutxtcol'); ?>;text-decoration:underline;}
#post-navigation ul li.active a {background: <?php echo imwb_zonpress_get_option('postmenuseltxtcol'); ?>;color:#fff;text-decoration:underline;}
 <?php } ?>
.panel-default > .panel-heading{ background-color: <?php echo imwb_zonpress_get_option('widgettitlebgcol'); ?>; color: <?php echo imwb_zonpress_get_option('widgettitletxtcol'); ?>;}
#footer .widget-title {background-color: <?php echo imwb_zonpress_get_option('footerbgcol'); ?>; color: <?php echo imwb_zonpress_get_option('footertxtcol'); ?>;}
.btn-success {color: <?php echo imwb_zonpress_get_option('postprdbtntxtcol'); ?>; background-color: <?php echo imwb_zonpress_get_option('postprdbtnbgcol'); ?>;border:0px none;-webkit-transition: background .3s ease;transition: background .3s ease}
.btn-success:hover,.btn-success:focus,.btn-success:active,.btn-success.active,.btn-success.disabled,.btn-success[disabled] {color: <?php echo imwb_zonpress_get_option('postprdbtntxtcol'); ?>; background-color: <?php echo imwb_zonpress_get_option('postprdbtnbghvrcol'); ?>;}
.posts-wrapper {background-color: <?php echo imwb_zonpress_get_option('postbgcol'); ?>;}
.thumbnail .title a,.post .title a:visited {  color: <?php echo imwb_zonpress_get_option('posttitlecol'); ?>;}
.thumbnail .title a:hover { color: <?php echo imwb_zonpress_get_option('posttitlehvrcol'); ?>; }
.post .description, .price-info {color: <?php echo imwb_zonpress_get_option('postdesccol'); ?>;}
.the-post .content {color: <?php echo imwb_zonpress_get_option('postdesccol'); ?>;}
.the-post .stats {color: <?php echo imwb_zonpress_get_option('postdesccol'); ?>;}
<?php	
   $header_image = get_header_image();
   $text_color   = get_header_textcolor();
   if ( ! empty( $header_image ) ) {	?>
		.site-header {
			background: url(<?php echo esc_url($header_image); ?>);
			background-repeat:no-repeat;
			background-size:cover;
			background-position:center;
		}
<?php } 
		// Has the text been hidden?
	if ( ! display_header_text() ) { ?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
<?php } ?>
		.site-title,
		.site-description {
			text-align:<?php echo get_theme_mod( 'zp_header_text_align', 'center' );?>;
         <?php if ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) { ?>
			color: #<?php echo esc_attr( $text_color ); ?>;
			<?php }?>
		}
</style>
<?php if(imwb_zonpress_get_option('headerscripts') != '') 
   echo imwb_zonpress_get_option('headerscripts');
?>
<?php if(imwb_zonpress_get_option('pageloader') == 'Y') { ?>
<script>
setTimeout(function(){
    $(".se-pre-con").hide();
}, 2000);
</script>
<?php } ?>
</head>
<body <?php body_class(); ?>>
<?php if(imwb_zonpress_get_option('pageloader') == 'Y') { ?>
<div class="se-pre-con"></div>
<?php } ?>
<?php if(is_single() && (imwb_zonpress_get_option('commenttype') == '1' || imwb_zonpress_get_option('commenttype') == '2')) { ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php } ?>

<?php if(imwb_zonpress_get_option('headerstyles') == '1') { ?>
<div class="containers">
<?php } ?>
<header class="site-header" role="banner"> 
<?php if(imwb_zonpress_get_option('headerstyles') == '0') { ?>
<div class="containers">
<?php } ?>  
  <div class="row">
<div class="col-xs-12 col-md-2 pull-left"> 	 
  <hgroup> 
 <h1 class="site-title"><a href="<?php bloginfo( 'url' );?>"><img src="/img/logo.png"></a></h1>
  </hgroup>
  </div>
<!--  <div class="col-md-2 pull-right">-->
<!--<div class="well cart">-->
<!--<ul class="list-unstyled">-->

<!--      </ul>  -->
<!--</div>-->
<!--</div>-->
  <div class="col-md-6 pull-right">
  <nav id="site-navigation">
      <ul>
<?php if(is_user_logged_in()) { 
   global $current_user, $user_identity;
   wp_get_current_user();    
?> 
    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i style="font-size:16px;" class="fa fa-shopping-cart">
          </i> <span id="div_total_min_cart_item">0</span> - Items<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart" role="menu" id="div_mini_cart_html">
          </ul>
    </li>
   <li><a href="<?php bloginfo( 'url' );?>?action=wishlist" ><span class="badge trans"><i class="fa fa-heart"></i> <?php echo imwb_zonpress_get_option('wishlisttext');?></span></a></li> 
   <li><a href="<?php bloginfo( 'url' );?>?action=profile"><span class="badge trans"><i class="fa fa-user"></i> <?php _e("My Profile", "imwb_zonpress");?></span></a></li>
   <li class="last"><a href="<?php echo wp_logout_url('index.php');?>"><span class="badge trans"><i class="fa fa-lock"></i> <?php _e("Sign Out", "imwb_zonpress");?></span></a></li>
<?php } else { ?>  
   <li><a class="smcf-register" href="<?php bloginfo( 'url' );?>/wp-login.php?action=register" target="_blank"><span class="badge trans"><i class="fa fa-user"></i> <?php _e("Create Account", "imwb_zonpress");?></span></a></li> 
   <li class="last"><a class="smcf-login" href="<?php bloginfo( 'url' );?>/wp-login.php"><span class="badge trans"><i class="fa fa-lock"></i> <?php _e("Sign In", "imwb_zonpress");?></span></a></li>
<?php } ?>
      </ul>
      </nav>         
</div>

<?php if(imwb_zonpress_get_option('headerstyles') == '0') { ?>
</div> 
<?php } ?> 
</header>
<?php if(imwb_zonpress_get_option('headerstyles') == '1') { ?>
</div>
<?php } ?> 

<?php if(imwb_zonpress_get_option('headerstyles') == '1') { ?>
<div class="containers"> 
<?php } ?>
<nav style="border-radius:0px;" class="navbar navbar-default" role="navigation">
<?php if(imwb_zonpress_get_option('headerstyles') == '0') { ?>
<div class="containers"> 
<?php } ?>
  <!-- Brand and toggle get grouped for better mobile display --> 
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php
        wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => false,
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
    ?>
   <?php if(imwb_zonpress_get_option('searchmrsmenu') == 'N') { ?>
    <form id="searchform" action="<?php echo esc_url( home_url( '/' ) );?>" method="get" class="navbar-form navbar-right" role="search">
      <div class="form-group">
      <input id="s" type="text" name="s" class="form-control" value="<?php echo imwb_zonpress_get_option('searchtext');?>" onblur="if (this.value == '') {this.value = '<?php echo imwb_zonpress_get_option('searchtext');?>';}" onfocus="if (this.value == '<?php echo imwb_zonpress_get_option('searchtext');?>') {this.value = '';}">
      </div>
      <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
      <?php } ?> 
  </div>
  <!-- /.navbar-collapse -->
</nav> 
</div> 