<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
$header_return_true_false = ( carpento_get_redux_option( '404-page-settings-show-header', true ) == true ) ? 'carpento_return_true' : 'carpento_return_false';
add_filter( 'carpento_filter_show_header', $header_return_true_false );

$footer_return_true_false = ( carpento_get_redux_option( '404-page-settings-show-footer', true ) == true ) ? 'carpento_return_true' : 'carpento_return_false';
add_filter( 'carpento_filter_show_footer', $footer_return_true_false );

get_header();

carpento_get_title_area_parts();

carpento_get_404_parts();

get_footer();
