<?php
/**
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

                <?php 
                    $blog_page = get_post(9);
                    //var_dump($blog_page);
                    $page_title = apply_filters('the_title', $blog_page->post_title);
                    $page_excerpt = apply_filters('the_excerpt', $blog_page->post_excerpt);
                ?>
				<div class="heading-wrap">
				<div class="title-blog"><?php echo $page_title;?></div>
				<div class="sub-text"><?php echo $page_excerpt;?></div>
				</div>


				<?php 
                    $blog_arg = array(
                        'post_type'     => 'post',
                        'post_status'   => 'publish',
                        'posts_per_page'=> -1                    
                    );
                    $blog_qry = new WP_Query($blog_arg);
                    if($blog_qry->have_posts()){
                        while($blog_qry->have_posts()){
                            $blog_qry->the_post();
                            $date = get_the_date();
                            $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id, 'blog_thumb', true);
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                            
                ?>
                <div class="blog-content-wrap clearfix">
					<?php if(has_post_thumbnail()){ ?>
                    <div class="blog-img">
						<a href="<?php the_permalink();?>" title="<?php the_title();?>" ><img src="<?php echo $image_url[0]?>" alt="<?php echo $image_alt;?>" /></a>
					</div>
                    <?php } ?>
					<div class="blog-content">
						<div class="title-blg"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></div>
						<div class="date-authr">
							<span class="date"><?php echo $date;?></span>
							<span class="authr">
                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author();?></a>
                            </span>
						</div>
						<div class="blg-descrp"><?php the_excerpt();?></div>
						<a class="read-more" href="<?php the_permalink();?>"> Read more </a>
					</div>
				</div> <!-- blog-content-wrap -->       
                            
                <?php          
                        }
                    }
                ?>
               
				
                
                

		
            </div> <!-- container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?//php get_sidebar(); ?>
<?php get_footer(); ?>
