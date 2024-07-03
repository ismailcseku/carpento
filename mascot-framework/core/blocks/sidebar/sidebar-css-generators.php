<?php

if (!function_exists('carpento_sidebar_padding')) {
	/**
	 * Generate CSS codes for Sidebar Padding
	 */
	function carpento_sidebar_padding() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $carpento_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $carpento_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $carpento_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $carpento_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $carpento_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $carpento_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $carpento_redux_theme_opt[$var_name]['padding-left'];
		}
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_padding');
}


if (!function_exists('carpento_sidebar_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Background Color
	 */
	function carpento_sidebar_bg_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
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
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_bg_color');
}


if (!function_exists('carpento_sidebar_text_align')) {
	/**
	 * Generate CSS codes for Sidebar Text Alignment
	 */
	function carpento_sidebar_text_align() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-text-align';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['text-align'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_text_align');
}





if (!function_exists('carpento_sidebar_title_padding')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Padding
	 */
	function carpento_sidebar_title_padding() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $carpento_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $carpento_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $carpento_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $carpento_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $carpento_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $carpento_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $carpento_redux_theme_opt[$var_name]['padding-left'];
		}
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_title_padding');
}


if (!function_exists('carpento_sidebar_title_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Background Color
	 */
	function carpento_sidebar_title_bg_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
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
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_title_bg_color');
}


if (!function_exists('carpento_sidebar_title_text_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Text Color
	 */
	function carpento_sidebar_title_text_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-text-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
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
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_title_text_color');
}


if (!function_exists('carpento_sidebar_title_font_size')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Font Size
	 */
	function carpento_sidebar_title_font_size() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-font-size';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
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
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_title_font_size');
}


if (!function_exists('carpento_sidebar_title_line_bottom_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Line Bottom Color
	 */
	function carpento_sidebar_title_line_bottom_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-line-bottom-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title.widget-title-line-bottom:after'
		);

		if( !carpento_get_redux_option( 'sidebar-settings-sidebar-title-show-line-bottom' ) ) {
			return;
		}

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
	add_action('carpento_dynamic_css_generator_action', 'carpento_sidebar_title_line_bottom_color');
}