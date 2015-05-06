<?php
/**
 * The template for displaying all single posts.
 *
 * @package frumcare
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container">
            <div class="breadcrumb breadcrum-wrap">
                <?php if(function_exists('bcn_display')){
                    wp_reset_query();
                    bcn_display();
                }?>                
            </div>
            <div class="single-blog-wrap">
		      <?php while ( have_posts() ) : the_post(); ?>

			     <?php get_template_part( 'content', 'single' ); ?>

			     <?php //frumcare_post_nav(); ?>

			     <?php
			     	// If comments are open or we have at least one comment, load up the comment template
				        if ( comments_open() || '0' != get_comments_number() ) :
				    	comments_template();
				        endif;
	          	?>
</div>
		      <?php endwhile; // end of the loop. ?>
                <div class="right-sidebar">
                <?php get_sidebar(); ?>
                </div>
            </div> <!-- container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>