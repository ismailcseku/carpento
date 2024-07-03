<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if (is_sticky()) {
		echo '<div class="post-sticky-icon" title="' . esc_attr__('Sticky Post', 'carpento') . '"><i class="fas fa-map-pin"></i></div>';
	}
	?>

	<?php if( $show_post_featured_image ) { ?>
		<div class="entry-header">
			<?php do_action( 'carpento_blog_post_entry_header_start' ); ?>
			<div class="thumb-wrapper">
				<?php carpento_get_post_thumbnail( $post_format ); ?>
				<?php carpento_get_post_thumbnail( $post_format ); ?>
			</div>

			<?php if ( has_post_thumbnail() ) { ?>
				<?php if( carpento_get_redux_option( 'blog-settings-post-meta', true, 'show-post-date-split' ) ) { ?>
					<div class="post-single-meta">
						<?php carpento_post_shortcode_single_meta( 'show-post-date-split' ); ?>
					</div>
				<?php } ?>
			<?php } ?>

			<?php do_action( 'carpento_blog_post_entry_header_end' ); ?>
		</div>
	<?php } ?>
	<div class="entry-content">
		<?php do_action( 'carpento_blog_post_entry_content_start' ); ?>
		<?php carpento_post_meta(); ?>
		<?php carpento_get_post_title(); ?>
		<div class="post-excerpt">
			<?php carpento_get_excerpt(); ?>
		</div>
		<?php echo carpento_blog_read_more_link(); ?>
	</div>
	<?php do_action( 'carpento_blog_post_entry_content_end' ); ?>
	<div class="clearfix"></div>
</article>