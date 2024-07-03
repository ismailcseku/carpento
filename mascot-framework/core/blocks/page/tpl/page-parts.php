<?php
	/**
	* carpento_before_page_section hook.
	*
	*/
	do_action( 'carpento_before_page_section' );
?>
<section class="main-content-section-wrapper">
	<div class="<?php echo esc_attr( $container_type ); ?>">
		<?php
			/**
			* carpento_page_container_start hook.
			*
			*/
			do_action( 'carpento_page_container_start' );
		?>

		<?php
			if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				carpento_get_page_sidebar_layout( $page_layout );
			endwhile;
			endif;
		?>

		<?php
			/**
			* carpento_page_container_end hook.
			*
			*/
			do_action( 'carpento_page_container_end' );
		?>
	</div>
</section> 
<?php
	/**
	* carpento_after_page_section hook.
	*
	*/
	do_action( 'carpento_after_page_section' );
?>