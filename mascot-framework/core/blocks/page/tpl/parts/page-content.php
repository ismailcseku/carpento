<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="page-content">
			<?php
				carpento_get_blog_single_post_thumbnail();
			?>
			<?php
				/**
				* carpento_before_page_content hook.
				*
				*/
				do_action( 'carpento_before_page_content' );
			?>
			<?php
				the_content();
			?>
			<?php
				/**
				* carpento_after_page_content hook.
				*
				*/
				do_action( 'carpento_after_page_content' );
			?>

			<?php carpento_get_post_wp_link_pages(); ?>
			
			<?php
				if( carpento_get_redux_option( 'page-settings-show-share' ) ) {
					carpento_get_social_share_links();
				}
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
	if( $page_show_comments ) {
		carpento_show_comments();
	}
?>
