<?php

if (!function_exists('carpento_layout_settings_boxed_layout_padding_top_bottom')) {
	/**
	 * Generate CSS codes for Boxed Layout - Padding Top & Bottom
	 */
	function carpento_layout_settings_boxed_layout_padding_top_bottom() {
		global $carpento_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-padding-top-bottom';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		//if Page Layout boxed
		if( carpento_get_redux_option( 'layout-settings-page-layout' ) == 'boxed' ) {
			$padding_top = $carpento_redux_theme_opt[$var_name]['padding-top'];
			$padding_bottom = $carpento_redux_theme_opt[$var_name]['padding-bottom'];

			if( !empty( $padding_top ) && $padding_top != "" ) {
				$padding_top = carpento_remove_suffix( $padding_top, 'px');
				$declaration['padding-top'] = $padding_top . 'px';
			}
			if( !empty( $padding_bottom ) && $padding_bottom != "" ) {
				$padding_bottom = carpento_remove_suffix( $padding_bottom, 'px');
				$declaration['padding-bottom'] = $padding_bottom . 'px';
			}
		}

		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_layout_settings_boxed_layout_padding_top_bottom');
}


if (!function_exists('carpento_stretched_layout_background_color')) {
	/**
	 * Generate CSS codes for Stretched Layout - Background Color
	 */
	function carpento_stretched_layout_background_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'layout-settings-stretched-layout-bg-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-stretched-layout',
		);

		//if empty then return
		if( carpento_get_redux_option( 'layout-settings-page-layout' ) != 'stretched' ) {
			return;
		}
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( carpento_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $carpento_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $carpento_redux_theme_opt[$var_name];
			}
			carpento_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_stretched_layout_background_color');
}


if (!function_exists('carpento_boxed_layout_background_color')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Color
	 */
	function carpento_boxed_layout_background_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( carpento_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $carpento_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $carpento_redux_theme_opt[$var_name];
			}
			carpento_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_boxed_layout_background_color');
}




if (!function_exists('carpento_boxed_layout_background_pattern')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Pattern
	 */
	function carpento_boxed_layout_background_pattern() {
		global $carpento_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-pattern';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( carpento_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-patter' ) {
			if( $carpento_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-image'] = 'url('.$carpento_redux_theme_opt[$var_name].')';
			}
			carpento_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_boxed_layout_background_pattern');
}


if (!function_exists('carpento_boxed_layout_bg')) {
	/**
	 * Generate CSS codes for Widget Footer Background
	 */
	function carpento_boxed_layout_bg() {
		global $carpento_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgimg';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( carpento_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-image' ) {
			$declaration = carpento_redux_option_field_background( $var_name );
			carpento_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_boxed_layout_bg');
}

