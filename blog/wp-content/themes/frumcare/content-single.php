<?php
/**
 * @package frumcare
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
            if(has_post_thumbnail()){
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, 'blog_featured', true);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        ?>
            <div class="featured-image"><img src="<?php echo $image_url[0];?>" alt="<?php echo $image_alt;?>" /></div>
        <?php } ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); 
             $tag_list = get_the_tag_list('',', ','');       
        ?>

		<div class="entry-meta">			
            Posted by <?php the_author_posts_link();?> on <?php the_date();?> | Tagged in <?php echo $tag_list;?> | <?php comments_number( 'no comment', '1 comment', '% comments' ); ?>
		</div><!-- .entry-meta -->
	   
       <div class="share-this">
            <span class='st_facebook_hcount' displayText='Facebook'></span>
            <span class='st_twitter_hcount' displayText='Tweet'></span>
            <span class='st_googleplus_hcount' displayText='Google +'></span>
       </div>
    
    </header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'frumcare' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php //echo do_shortcode('[subscribe2]');?>
    
    <!--<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'frumcare' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'frumcare' ) );

			if ( ! frumcare_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'frumcare' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'frumcare' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'frumcare' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'frumcare' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'frumcare' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->