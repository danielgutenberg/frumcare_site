<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package frumcare
 */
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
    <aside class="recent-posts clearfix">
        <h1>Recent Posts</h1>
        <ul>
        <?php 
            $recent_arg = array(
                'post_type'     => 'post', 
                'post_status'   => 'publish',
                'posts_per_page'=> 4
            );
            $recent_qry = new WP_Query($recent_arg);
            if($recent_qry->have_posts()){
                while($recent_qry->have_posts()){
                    $recent_qry->the_post();
                    $r_date = get_the_date();
        ?>
            <li>
                <a href="<?php the_permalink();?>">
                    <h3><?php the_title();?></h3>
                    <div class="post-date"><?php echo $r_date;?></div>
                </a>
            </li>
        <?php
                }
            }
        ?>
        </ul>
        <a class="all-post" href="<?php echo site_url();?>">All Posts</a>
    </aside>
    
    <aside class="categories">
    <h1>Categories</h1>
    <ul class="category-list">
    <?php $args = array(
            'orderby'            => 'name',
	        'order'              => 'ASC',
            'exclude'            => '1',
            'hierarchical'       => 1,
            'title_li'           => '',
            'show_option_none'   => __( 'No categories' )                     
        ); 
        wp_list_categories( $args );    
    ?>
    </ul>
    </aside>
    
    <aside class="archives">
        <h1>Archives</h1>
        <ul class="archive-list">
        <?php $args = array(
	               'type'            => 'monthly',
	               'limit'           => '',
	               'format'          => 'html', 
	               'before'          => '',
	               'after'           => '',
                   'show_post_count' => false,
	               'echo'            => 1,
	               'order'           => 'DESC'
                ); 
            wp_get_archives( $args );
        ?>
        </ul>
    </aside>
    
    
</div><!-- #secondary -->
