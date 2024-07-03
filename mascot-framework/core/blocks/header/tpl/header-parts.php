<?php if( $header_slider_type != 'no-slider' && $header_slider_position == 'above-header' ) : ?>
	<?php carpento_get_blocks_template_part( 'header-parts-top-slider', null, 'header/tpl', $params ); ?>
	<?php if( $params['header_visibility'] ) { ?>
	<?php carpento_get_blocks_template_part( 'header-parts-header', null, 'header/tpl', $params ); ?>
	<?php } ?>
<?php else : ?>
	<?php if( $params['header_visibility'] ) { ?>
	<?php carpento_get_blocks_template_part( 'header-parts-header', null, 'header/tpl', $params ); ?>
	<?php } ?>
	<?php carpento_get_blocks_template_part( 'header-parts-top-slider', null, 'header/tpl', $params ); ?>
<?php endif; ?>