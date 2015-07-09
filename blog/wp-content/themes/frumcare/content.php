<?php
/**
 * @package frumcare
 */

$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'blog_thumb', true);
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

?>
<div class="archive-post-wrap clearfix">
<?php if(has_post_thumbnail()){ ?>
    <div class="blog-img">
        <a href="<?php the_permalink();?>" title="<?php the_title();?>" ><img src="<?php echo $image_url[0]?>" alt="<?php echo $image_alt;?>" /></a>
	</div>
<?php } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="title-blg">
            <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a>
        </div>
		<?php //if ( 'post' == get_post_type() ) : ?>
		<!--<div class="entry-meta">
			<?php //frumcare_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php //endif; ?>
	</header><!-- .entry-header -->
    <div class="date-authr">
	   <span class="date"><?php echo get_the_date();?></span>
	   <span class="authr">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author();?></a>
        </span>
	</div>	
    <div class="entry-content">
		<?php the_excerpt();?>
	</div><!-- .entry-content -->
    <a class="read-more" href="<?php the_permalink();?>"> Read more </a>
	<!--<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'frumcare' ) );
				if ( $categories_list && frumcare_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'frumcare' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'frumcare' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'frumcare' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'frumcare' ), __( '1 Comment', 'frumcare' ), __( '% Comments', 'frumcare' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'frumcare' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</div>
