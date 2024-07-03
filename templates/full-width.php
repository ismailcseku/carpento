<?php
/**
 * Template Name: Full Width
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

carpento_get_title_area_parts();

carpento_get_page( 'container-fluid pt-0 pb-0', 'no-sidebar' );

get_footer();
