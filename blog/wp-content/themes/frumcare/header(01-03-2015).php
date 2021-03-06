<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package frumcare
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
     <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,900italic,900,700,700italic,400italic,300italic,300,100,100italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,800italic,800,700italic,700' rel='stylesheet' type='text/css'>

<link rel="shortcut icon" href="<?php echo do_shortcode("[theme_option do='favicon']"); ?>" />

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "702e5d05-eb6f-470c-8ccc-fea29bd59c8d", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
            <!--[if lt IE 9]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="site-wrapper" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="top-bar clearfix">
                    <div class="container">
                        <div class="login-links">
                            <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>                            
                            <!--<a href="#"><i class="icon-login">&nbsp;</i>Sign up</a>
                            <a href="#"><i class="icon-lock">&nbsp;</i>Log in</a>-->
                        </div>

                        <div class="search">
                            <form>
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">Baby Sitters<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <li><a href="#">Something</a></li>
                                        <li><a href="#">Something</a></li>
                                    </ul>
                                    <input type="hidden" value="" />
                                    <button type="submit" class="submit"><i class="icon-search">&nbsp;</i></button>
                                </div>
                            </form>
                        </div><!--end search-->
                    </div>
                </div><!--end top-bar-->

<div class="header-main">
                    <div class="container">
			<h1 class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Target-temporaries"/> </a></h1>
		<div class="navigation">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<!--<button class="menu-toggle"><?php _e( 'Primary Menu', 'frumcare' ); ?></button> -->
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu1' ) ); ?>
			 <!--<ul class="primary-nav">
                    <li><a href="#">Parents</a></li>
                    <li><a href="#">Childcare Workers</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
            </ul>-->
		</nav><!-- #site-navigation -->
		 <div class="button-link">
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu2' , 'fallback_cb' => false ) ); ?>
        <!--<a href="" class="link-block browse-caregivers">Browse our <br />list of caregivers</a>
            <a href="" class="link-block browse-caregivers-job">Browse our <br />caregiver jobs</a>-->
        </div>
	</div>
		        <div class="clearfix"></div>
                    </div>
                </div><!--end header-main-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
