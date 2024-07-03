<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the .main-content div and #wrapper
 *
 */
?>


	<?php carpento_get_footer_top_callout(); ?>


	<?php
		/**
		 * carpento_main_content_end hook.
		 *
		 */
		do_action( 'carpento_main_content_end' );
	?>
	</div>
	<!-- main-content end --> 
	<?php
		/**
		 * carpento_after_main_content hook.
		 *
		 */
		do_action( 'carpento_after_main_content' );
	?>


	<?php if( apply_filters('carpento_filter_show_footer', true) ): ?>
	<?php carpento_get_footer_parts(); ?>
	<?php endif; ?>
	
	<?php
		/**
		 * carpento_wrapper_end hook.
		 *
		 */
		do_action( 'carpento_wrapper_end' );
	?>
</div>
<!-- wrapper end -->
<?php
	/**
	 * carpento_body_tag_end hook.
	 *
	 */
	do_action( 'carpento_body_tag_end' );
?>
<?php
	/**
	 * nav_search_icon_popup_html hook.
	 *
	 */
	global $nav_search_holder_id;
	do_action( 'carpento_nav_search_icon_popup_html', $nav_search_holder_id );
?>
<?php wp_footer(); ?>
</body>
</html>
