<?php
/**
 * frumcare functions and definitions
 *
 * @package frumcare
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'frumcare_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function frumcare_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on frumcare, use a find and replace
	 * to change 'frumcare' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'frumcare', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	function register_my_menus(){
        register_nav_menus(array(
            'primary-menu'=> __('Primary Menu'),
            'main-menu1' => __('Main Menu1'),
            'main-menu2' => __('Main Menu2'),            
            'footer-menu1' => __('Footer Menu1'),
            'footer-menu2' => __('Footer Menu2'),
            'footer-menu3' => __('Footer Menu3'),
            'sidebar-menu' => __('Sidebar Menu')
            )
        );
    }
    add_action('init', 'register_my_menus');
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'frumcare_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // frumcare_setup
add_action( 'after_setup_theme', 'frumcare_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function frumcare_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'frumcare' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'frumcare_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function frumcare_scripts() {
	wp_enqueue_style( 'frumcare-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array() );
	
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-v11.js', '1.11.0', true);
        wp_enqueue_script('jquery');
    }
    
    wp_enqueue_script( 'frumcare-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    
	wp_enqueue_script( 'frumcare-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script('polyfills-mordernizer',get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', array(), false);
	    
    wp_enqueue_script('main',get_template_directory_uri() . '/js/main.js', array(), false);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'frumcare_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/** To add excerpt field*/
add_action('init', 'my_custom_init');
function my_custom_init() {
    add_post_type_support( 'page', 'excerpt' );
}

/*------------Theme options Shortcodes---------------------------*/
 function theme_option_shortcode($atts)
 {
   foreach($atts as $key=>$val)
   {
    $$key = $val;
   }
   $args = array('post_type'=>'theme-option','posts_per_page'=>1,'post_status'=>'publish','order'=>'DESC');
   $theme_query = new WP_Query($args);
   if($theme_query->have_posts())
   {
    while($theme_query->have_posts())
    {
        $theme_query->the_post();
        if($do=='site-logo' || $do=='favicon')
        {
            $site_logo = types_render_field($do,array('raw'=>true));
            $site_logo_array = explode('wp-content',$site_logo);
            return site_url().'/wp-content'.$site_logo_array[1];
        }
        else
        {
          $return = types_render_field($do,array('raw'=>true));
          wp_reset_query();
          return $return;    
        }
        
    }
   }
   
 }
 add_shortcode( 'theme_option', 'theme_option_shortcode');

/** for shortcode to use data 
*   <?php echo do_shortcode("[theme_option do='site-logo']") ;?>
*/

add_image_size('blog_thumb', 327, 307, true);
add_image_size('blog_featured', 793, 253, true);
add_image_size('resource_thumb', 148, 137, true);

/**
 * Remove the text - 'You may use these <abbr title="HyperText Markup
 * Language">HTML</abbr> tags ...'
 * from below the comment entry box.
 */

add_filter('comment_form_defaults', 'remove_comment_styling_prompt');

function remove_comment_styling_prompt($defaults) {
    $defaults['comment_notes_after'] = '';
    return $defaults;
}
