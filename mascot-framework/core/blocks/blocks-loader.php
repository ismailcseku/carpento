<?php

/* Loads all blocks located in blocks folder
================================================== */
if( !function_exists('carpento_load_all_template_parts') ) {
	function carpento_load_all_template_parts() {
		foreach( glob(CARPENTO_FRAMEWORK_DIR.'/core/blocks/*/loader.php') as $each_template_part_loader ) {
			require_once $each_template_part_loader;
		}
	}
	add_action('carpento_before_custom_action', 'carpento_load_all_template_parts');
}