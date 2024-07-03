<?php

// Custom Action for this theme
add_action('after_setup_theme', 'carpento_custom_action_init', 0);

function carpento_custom_action_init() {

	do_action('carpento_before_custom_action');

	do_action('carpento_custom_action');

	do_action('carpento_after_custom_action');
}