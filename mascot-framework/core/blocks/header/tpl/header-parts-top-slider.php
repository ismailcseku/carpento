
	<?php
	/**
	* carpento_before_top_sliders_container hook.
	*
	*/
	do_action( 'carpento_before_top_sliders_container' );
	?>
	<div class="top-sliders-container">
		<?php
			/**
			* carpento_top_sliders_container_start hook.
			*
			*/
			do_action( 'carpento_top_sliders_container_start' );
		?>

		<?php
			echo carpento_get_top_main_slider();
		?>
		
		<?php
			/**
			* carpento_top_sliders_container_end hook.
			*
			*/
			do_action( 'carpento_top_sliders_container_end' );
		?>
	</div>
	<?php
	/**
	* carpento_after_top_sliders_container hook.
	*
	*/
	do_action( 'carpento_after_top_sliders_container' );
	?>
