<?php

if (!function_exists('carpento_404_title_typography')) {
	/**
	 * Generate CSS codes for Title Typography
	 */
	function carpento_404_title_typography() {
		$var_name = '404-page-settings-title-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .title'
		);
		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_title_typography');
}


if (!function_exists('carpento_404_title_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Title Margin Top & Bottom
	 */
	function carpento_404_title_margin_top_bottom() {
		global $carpento_redux_theme_opt;
		$var_name = '404-page-settings-title-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $carpento_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $carpento_redux_theme_opt[$var_name]['margin-bottom'];
		}
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_title_margin_top_bottom');
}



if (!function_exists('carpento_404_content_typography')) {
	/**
	 * Generate CSS codes for Content Typography
	 */
	function carpento_404_content_typography() {
		$var_name = '404-page-settings-content-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .content',
			'.page-404-wrapper .content p'
		);
		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_content_typography');
}


if (!function_exists('carpento_404_content_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Content Margin Top & Bottom
	 */
	function carpento_404_content_margin_top_bottom() {
		global $carpento_redux_theme_opt;
		$var_name = '404-page-settings-content-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .content p'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		if( $carpento_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $carpento_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $carpento_redux_theme_opt[$var_name]['margin-bottom'];
		}
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_content_margin_top_bottom');
}


if (!function_exists('carpento_404_bg')) {
	/**
	 * Generate CSS codes for Widget Footer Background
	 */
	function carpento_404_bg() {
		$var_name = '404-page-settings-bg';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper'
		);

		if( carpento_get_redux_option( '404-page-settings-custom-background-status' ) ) {
			$declaration = carpento_redux_option_field_background( $var_name );
			carpento_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_bg');
}



if (!function_exists('carpento_404_helpful_links_heading_typography')) {
	/**
	 * Generate CSS codes for Helpful Links Heading Typography
	 */
	function carpento_404_helpful_links_heading_typography() {
		$var_name = '404-page-settings-helpful-links-heading-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .helpful-links .heading'
		);
		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_helpful_links_heading_typography');
}



if (!function_exists('carpento_404_helpful_links_typography')) {
	/**
	 * Generate CSS codes for Helpful Links Typography
	 */
	function carpento_404_helpful_links_typography() {
		$var_name = '404-page-settings-helpful-links-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .helpful-links .page-404-helpful-links-nav li a'
		);
		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_helpful_links_typography');
}



if (!function_exists('carpento_404_search_box_heading_typography')) {
	/**
	 * Generate CSS codes for Search Box Heading Typography
	 */
	function carpento_404_search_box_heading_typography() {
		$var_name = '404-page-settings-search-box-heading-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .search-box .heading'
		);
		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_search_box_heading_typography');
}



if (!function_exists('carpento_404_search_box_paragraph_typography')) {
	/**
	 * Generate CSS codes for Search Box Paragraph Typography
	 */
	function carpento_404_search_box_paragraph_typography() {
		$var_name = '404-page-settings-search-box-paragraph-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .search-box .paragraph',
			'.page-404-wrapper .search-box .paragraph p'
		);
		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_404_search_box_paragraph_typography');
}