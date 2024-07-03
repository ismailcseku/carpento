<?php
	/**
	* carpento_before_blog_section hook.
	*
	*/
	do_action( 'carpento_before_blog_section' );
?>
<section>
	<div class="<?php echo esc_attr( $container_type ); ?>">
		<?php
			/**
			* carpento_blog_container_start hook.
			*
			*/
			do_action( 'carpento_blog_container_start' );
		?>

		<div class="blog-posts">
			<?php
				carpento_get_blog_sidebar_layout();
			?>
		</div>

	<?php
		/**
		* carpento_blog_container_end hook.
		*
		*/
		do_action( 'carpento_blog_container_end' );
	?>
	</div>
</section>
<?php
	/**
	* carpento_after_blog_section hook.
	*
	*/
	do_action( 'carpento_after_blog_section' );
?>
