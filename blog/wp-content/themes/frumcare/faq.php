<?php
/**
 * Template Name: faq
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
			
				<div class="left-sidebar-resource">
					<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); ?> 
                    <!--
<ul>
						<li> <a href="#"> Advice </a> </li>
						<li class="sub-menu"> <a href="#"> For Family </a> </li>
						<li class="sub-menu"> <a href="#"> For Caregiver </a> </li>
						<li class="sub-menu"> <a href="#"> For Employers </a> </li>
						<li> <a href="#"> Rate Calculator </a> </li>
						<li> <a href="#"> FAQ </a> </li>
						<li> <a href="#"> Safety Guide </a> </li>
						<li> <a href="#"> Background Checks </a> </li>       
					</ul>
-->
				</div> <!-- left-sidebar-resource end -->

				<div class="right-side-resources">
				    <div class="title-search-wrap">
                        <div class="resource-title">Frequently Asked Questions </div>
                            <form id="faq_search" action="" method="post">
					           <input type="search" class="search-field" name="stext" placeholder="Search FAQ`s">
					           <input type="submit" class="buton">
                            </form>
                    </div>
                    
                    <?php if(isset($_POST['stext'])){ 
                    
                         $faq_arg = array(
                                'post_type'     => 'faqs',                                
                                'post_status'   => 'publish',
                                's'             => $_POST['stext'],
                                'posts_per_page'=> -1,
                                'order'         => 'ASC'
                            );    
                            $faq_qry = new WP_Query($faq_arg);    
                            if($faq_qry->have_posts()){
                                while($faq_qry->have_posts()){
                                    $faq_qry->the_post();
                            ?>
                                <div class="question-ans">
                                    <div class="qusn" id="question_<?php the_ID();?>"><?php the_title();?></div>
                                    <div class="ans close" id="ans_<?php the_ID();?>" style="display: none;"><?php the_content();?></div>
                                </div>    
                            <?php  }
                            } else { ?>
                                <div>No FAQ found for <?php echo $_POST['stext'];?>. Please try another key word.</div>
                            <?php } ?>
                        
                    <?php }else{ 
                        
                        $t_args = array(
                            'orderby'           => 'id', 
                            'order'             => 'ASC',
                            'hide_empty'        => true, 
                        );
                        $terms = get_terms('categories', $t_args);
                        //var_dump($terms);
                        
                        foreach($terms as $term){ 
                            $faq_arg = array(
                                'post_type'     => 'faqs',
                                'categories'    => $term->slug,
                                'post_status'   => 'publish',
                                'posts_per_page'=> -1,
                                'order'         => 'ASC'
                            );    
                            $faq_qry = new WP_Query($faq_arg); ?>
                            <div class="question-wrap">
                                <div class="faq-title"><?php echo $term->name;?></div>
                            <?php 
                            if($faq_qry->have_posts()){
                                while($faq_qry->have_posts()){
                                    $faq_qry->the_post();
                            ?>
                                <div class="question-ans">
                                    <div class="qusn" id="question_<?php the_ID();?>"><?php the_title();?></div>
                                    <div class="ans close" id="ans_<?php the_ID();?>" style="display: none;"><?php the_content();?></div>
                                </div>    
                            <?php  }
                            }
                        ?>
                            </div>
                        <?php } ?>
                        
                    
                    <!--
<div class="question-wrap">
                        <div class="faq-title"> Common Questions from Merchants</div>
                        <div class="question-ans">
                            <div class="qusn">Vivamus dui mi, consequat aliquet est nec pellentesque?</div>
                            <div class="ans">Pellentesque ac auctor mauris. Donec eu est orci. Sed volutpat pretium urna non ultricies. Praesent et ipsum vitae urna varius viverra et a urna. Proin gravida pellentesque ultrices. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum eget luctus arcu, ut cursus sem. Duis iaculis suscipit erat, ac euismod dolor commodo quis. Phasellus ultrices quis nunc eu euismod. Vivamus dapibus turpis ut neque vehicula egestas quis ac nisi. In hac habitasse platea dictumst. Praesent gravida sem sed hendrerit fringilla. Pellentesque molestie non magna sed posuere. Integer sit amet tincidunt nisi, a gravida eros. </div>
                        </div>
                        
                    </div>
-->

                    <?php } ?>
                    
                </div> <!-- right-side-resoruces end -->
            </div><!-- .resource-wrap -->
			
        	</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>