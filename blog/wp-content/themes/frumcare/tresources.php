<?php
/**
 * Template Name: Resources
 * @package frumcare
 */

    $wpurl            = site_url();
    $trimmed_url    = parse_url($wpurl);
    $path1           = explode('/', $trimmed_url['path']);	
    $ciurl       = $trimmed_url['scheme']."://".$trimmed_url['host']."/".$path1[1];
    if($path1[2] == 'dev')
     $ciurl .=   "/".$path1[2]."/";

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
                //var_dump($post);
                $tax = $post->post_name;
                $excerpt = $post->post_excerpt;
            ?>
                    
            <?php endwhile; // end of the loop. ?>
				<div class="left-sidebar-resource">
					<?php 
					//wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); 
					?> 
                    
                                         <ul class="sidebarmenu">
						<li> <a href="<?php echo $ciurl;?>safety-guide"> Safety Guide </a>
						    <ul class="submenuleft">
						        <li style="margin-left: 20px;"> <a href="#"> For Families </a> </li>
						        <li style="margin-left: 20px;"> <a href="#"> For Caregivers </a> </li>
						    </ul>
						 </li>
						<li> <a href="<?php echo $ciurl;?>tips-and-tools"> Advice and Tips </a>
						<ul class="submenuleft">
						    <li style="margin-left: 20px;"> <a href="#"> For Families </a> </li>
						    <li style="margin-left: 20px;"> <a href="#"> For Caregivers </a> </li>
						    <li style="margin-left: 20px;"> <a href="#"> For Employers </a> </li>
						</ul>
						 </li>
						<li> <a href="<?php echo $ciurl;?>faq"> FAQ </a> </li>
						<li> <a href="<?php echo $ciurl;?>rate-calculator"> Rate Calculator </a> </li>						
						<li> <a href="<?php echo $ciurl;?>background-check"> Background Check </a> </li>       
					</ul>
				</div> <!-- left-sidebar-resource end -->

				<div class="right-side-resources">
					<div class="resource-title"><?php echo $excerpt; ?></div>
					   <?php
                            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                            else { $paged = 1; }
                            $resource_arg = array(
                                'post_type'         => 'resource',
                                'resource-category' => $tax,
                                'post_status'       => 'publish',
                                'posts_per_page'    => 4,
                                'paged'             => $paged
                                
                            );
                            $resource_qry = new WP_Query($resource_arg);
                       ?>
                        <div class="pagination_holder" style="display: none;"></div>
                       <div id="container_article">
                       
                        <input type="hidden" class="current_page" value="<?php echo $resource_qry->query_vars['paged'];?>"/>
                        <input type="hidden" class="current_url" value="<?php echo site_url().'/resources/advices/'.$tax.'/';?>"/>
                        <input type="hidden" class="max_page" value="<?php echo $resource_qry->max_num_pages;?>"/>
                        <?php
                            if($resource_qry->have_posts()){
                                while($resource_qry->have_posts()){
                                    $resource_qry->the_post();
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($image_id, 'resource_thumb', true);
                                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                         ?>    
                            
                            <div class="resource-content-wrap clearfix">
						      <?php if(has_post_thumbnail()){ ?>
                                <div class="resource-img">
							     <a href="<?php the_permalink();?>">
                                 <img src="<?php echo $image_url[0];?>" alt="<?php echo $image_alt;?>" />
                                 </a>
                                </div>
                              <?php } ?>

						      <div class="content-resource">
							     <a href="<?php the_permalink();?>">
                                 <?php the_excerpt();?>
                                 </a>
						      </div>
					       </div> <!--resource-content-wrap end -->
                         <?php         
                                }
                            }
                        ?>
                        
                    </div>
					<?php 
                            $r_arg = array(
                                'post_type'         => 'resource',
                                'resource-category' => $tax,
                                'post_status'       => 'publish',
                                'posts_per_page'    => -1
                            );
                            $r_qry = new WP_Query($r_arg);
                    if($r_qry->post_count >= 5){ ?>
                        <a href="#" class="load-article" id="btn_loadmore"> Load more articles </a>
				    <?php } ?>
                    <div class="infinite-loader" style="display:none">
                        <img src="<?php echo get_template_directory_uri();?>/img/ajax-loader.gif" class="loader_image"/>
                    </div>  
                </div> <!-- right-side-resoruces end -->
            </div>
			
	</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
<script>
// $(document).ready(function () {
//     $("ul.sidebarmenu li ul").hide();
//     $("ul.sidebarmenu li").hover(function () {
//         $(this).children("ul.submenuleft").slideDown('fast');
//     }, function () {
//         $(this).children("ul.submenuleft").slideUp('slow');
//     });
// });
</script>
