	<!-- Header -->
	<?php
		/**
		* carpento_before_header hook.
		*
		*/
		do_action( 'carpento_before_header' );
	?>
	<header id="header" class="header <?php echo esc_attr(implode(' ', $header_classes)); ?>" <?php if( $params['header_layout_type'] == 'header-vertical-nav' ) { ?> style="<?php echo esc_attr( $vertical_nav_bgcolor ); ?> <?php echo esc_attr( $vertical_nav_bgimg ); ?>" <?php } ?>>
		<?php
			/**
			* carpento_header_start hook.
			*
			*/
			do_action( 'carpento_header_start' );
		?>
		<?php
			/**
			* carpento_header_top_area hook.
			*
			* @hooked carpento_get_header_top
			*/
			do_action( 'carpento_header_top_area' );
		?>
		<?php
			carpento_get_header_layout_type();
		?>

		<?php
			/**
			* carpento_header_end hook.
			*
			*/
			do_action( 'carpento_header_end' );
		?>
	</header>
	<?php
		/**
		* carpento_after_header hook.
		*
		*/
		do_action( 'carpento_after_header' );
	?>