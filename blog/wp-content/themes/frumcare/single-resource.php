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
           <div class="resource-wrap clearfix">
			<?php while ( have_posts() ) : the_post(); 
                $terms = get_the_terms($post->ID, 'resource-category');
                //var_dump($terms);
                foreach($terms as $term){
                    $slug  = $term->slug;
                }
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, 'medium', true);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            ?>
                    
				<div class="left-sidebar-resource">
					<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); ?>
				</div> <!-- left-sidebar-resource end -->

				<div class="right-side-resources">
					
					<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                    <?php if(has_post_thumbnail()){ ?>
                        <div class="resource-img">
                            <img src="<?php echo $image_url[0];?>" alt="<?php echo $image_alt;?>" />
                        </div>
                    <?php }?>
                    <div class="entry-content">
		              <?php the_content(); ?>
                    </div>
                    <a href="<?php echo site_url();?>/resources/advices/<?php echo $slug;?>" class="load-article"> More Articles </a>
				
                </div> <!-- right-side-resoruces end -->
            
            <?php endwhile; // end of the loop. ?>
            </div>
			
	</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
