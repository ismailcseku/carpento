<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'post-single clearfix ' . $enable_drop_caps ) ); ?>>
	<div class="entry-header">
		<?php do_action( 'carpento_blog_single_entry_header_start' ); ?>
		<?php carpento_get_blog_single_post_thumbnail( $post_format ); ?>
		<?php do_action( 'carpento_blog_single_entry_header_end' ); ?>
	</div>
	<div class="entry-content">
		<?php do_action( 'carpento_blog_single_entry_content_start' ); ?>
		<?php
			$quote_quote = carpento_get_rwmb_group( 'carpento_' . "blog_mb_pf_quote_settings", 'quote' );
			if( !empty($quote_quote) ) :
		?>
		<?php carpento_get_single_post_title(); ?>
		<div class="post-excerpt">
			<?php the_content();?>
			<div class="clearfix"></div>
		</div>
		<?php endif; ?>
		<?php carpento_get_post_wp_link_pages(); ?>
		<?php carpento_blog_single_post_meta(); ?>
		<?php do_action( 'carpento_blog_single_entry_content_end' ); ?>
	</div>
</article>