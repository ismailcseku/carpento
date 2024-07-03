<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php do_action( 'carpento_blog_post_entry_header_start' ); ?>
		<?php carpento_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'carpento_blog_post_entry_header_end' ); ?>
	</div>
	<div class="entry-content">
		<?php do_action( 'carpento_blog_post_entry_content_start' ); ?>



		<?php carpento_post_meta(); ?>
		<?php carpento_get_post_title(); ?>
		<div class="post-excerpt">
			<?php carpento_get_excerpt(); ?>
		</div>
		<?php do_action( 'carpento_blog_post_entry_content_end' ); ?>

		<?php echo carpento_blog_read_more_link(); ?>
	</div>
	<div class="clearfix"></div>
</article>