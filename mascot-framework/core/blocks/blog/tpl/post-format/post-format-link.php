<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="link-content">
		<?php do_action( 'carpento_blog_post_entry_header_start' ); ?>
		<?php carpento_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'carpento_blog_post_entry_header_end' ); ?>
	</div>
</article>