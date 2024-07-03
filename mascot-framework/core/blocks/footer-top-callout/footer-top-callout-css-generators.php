<?php

if (!function_exists('carpento_footer_top_callout_text_font_size')) {
	/**
	 * Generate CSS codes for Footer Top Callout Font Size
	 */
	function carpento_footer_top_callout_text_font_size() {
		global $carpento_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-text-font-size';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-content, #footer-top-callout-wrap .callout-content *'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['font-size'] = $carpento_redux_theme_opt[$var_name] . 'px';
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_footer_top_callout_text_font_size');
}

if (!function_exists('carpento_footer_top_callout_text_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Font Size
	 */
	function carpento_footer_top_callout_text_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-text-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-content, #footer-top-callout-wrap .callout-content *'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_footer_top_callout_text_color');
}



if (!function_exists('carpento_footer_top_callout_icon_font_size')) {
	/**
	 * Generate CSS codes for Footer Top Callout Icon Size
	 */
	function carpento_footer_top_callout_icon_font_size() {
		global $carpento_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-left-font-icon-fontsize';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-icon i'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['font-size'] = $carpento_redux_theme_opt[$var_name] . 'px';
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_footer_top_callout_icon_font_size');
}


if (!function_exists('carpento_footer_top_callout_icon_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Icon Color
	 */
	function carpento_footer_top_callout_icon_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-left-font-icon-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap .callout-icon i'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_footer_top_callout_icon_color');
}


if (!function_exists('carpento_footer_top_callout_area_bg_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Area Background Color
	 */
	function carpento_footer_top_callout_area_bg_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-bgcolor';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}
		
		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['background-color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_footer_top_callout_area_bg_color');
}


if (!function_exists('carpento_footer_top_callout_area_border_top_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Area Border Top Color
	 */
	function carpento_footer_top_callout_area_border_top_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-border-top-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}
		
		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['border-top'] = '3px solid ' . $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_footer_top_callout_area_border_top_color');
}


if (!function_exists('carpento_footer_top_callout_area_border_bottom_color')) {
	/**
	 * Generate CSS codes for Footer Top Callout Area Border Bottom Color
	 */
	function carpento_footer_top_callout_area_border_bottom_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'footer-top-call-out-area-border-bottom-color';
		$declaration = array();
		$selector = array(
			'#footer-top-callout-wrap'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}
		
		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['border-bottom'] = '3px solid ' . $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_footer_top_callout_area_border_bottom_color');
}