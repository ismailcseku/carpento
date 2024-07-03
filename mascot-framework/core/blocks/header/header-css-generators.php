<?php


if (!function_exists('carpento_get_header_top_cpt_elementor_wpb_shortcodes_custom_css')) {
	/**
	 * Add VC inline css to body
	 */
	function carpento_get_header_top_cpt_elementor_wpb_shortcodes_custom_css() {
		$current_page_id = carpento_get_page_id();

		//Footer Widget Area
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = carpento_get_rwmb_group( 'carpento_' . "page_mb_header_settings", 'headertop_cpt_elementor', $current_page_id );
		if( ! carpento_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['header_top_cpt_post'] = $temp_meta_value;
		} else {
			$params['header_top_cpt_post'] = carpento_get_redux_option( 'header-settings-choose-header-top-cpt-elementor', 'default' );
		}


		//VC Custom CSS
		$shortcodes_custom_css = get_post_meta( $params['header_top_cpt_post'], '_wpb_shortcodes_custom_css', true );
		if ( ! empty( $shortcodes_custom_css ) ) {
			wp_add_inline_style( 'carpento-dynamic-style', $shortcodes_custom_css );
		}


	}
	add_action( 'wp_enqueue_scripts', 'carpento_get_header_top_cpt_elementor_wpb_shortcodes_custom_css' );
}


if (!function_exists('carpento_header_logo_maximum_width')) {
	/**
	 * Generate CSS codes for Maximum logo width
	 */
	function carpento_header_logo_maximum_width() {
		global $carpento_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-width';
		$declaration = array();
		$selector = array(
			'header#header .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}


		$declaration['max-width'] = $carpento_redux_theme_opt[$var_name].'px';
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_logo_maximum_width');
}


if (!function_exists('carpento_header_logo_maximum_height')) {
	/**
	 * Generate CSS codes for Maximum logo height
	 */
	function carpento_header_logo_maximum_height() {
		global $carpento_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-height';
		$declaration = array();
		$selector = array(
			'header#header .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}


		$declaration['max-height'] = $carpento_redux_theme_opt[$var_name].'px';
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_logo_maximum_height');
}


if (!function_exists('carpento_header_logo_maximum_height_in_sticky_mode')) {
	/**
	 * Generate CSS codes for Maximum logo height in Sticky Mode
	 */
	function carpento_header_logo_maximum_height_in_sticky_mode() {
		global $carpento_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-height-in-sticky-mode';
		$declaration = array();
		$selector = array(
			'header#header .header-nav-wrapper.tm-sticky-menu .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}


		$declaration['max-height'] = $carpento_redux_theme_opt[$var_name].'px';
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_logo_maximum_height_in_sticky_mode');
}




if (!function_exists('carpento_header_logo_margin_around_it')) {
	/**
	 * Generate CSS codes for logo margin
	 */
	function carpento_header_logo_margin_around_it() {
		global $carpento_redux_theme_opt;
		//margin around it
		$var_name = 'logo-settings-logo-margin-around';
		$declaration = array();
		$selector = array(
			'header#header .menuzord-brand'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		//added margin into the container.
		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $carpento_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-right'] != "" ) {
			$declaration['margin-right'] = $carpento_redux_theme_opt[$var_name]['margin-right'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $carpento_redux_theme_opt[$var_name]['margin-bottom'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-left'] != "" ) {
			$declaration['margin-left'] = $carpento_redux_theme_opt[$var_name]['margin-left'];
		}
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_logo_margin_around_it');
}

if (!function_exists('carpento_header_logo_sticky_margin_around_it')) {
	/**
	 * Generate CSS codes for logo margin in sticky
	 */
	function carpento_header_logo_sticky_margin_around_it() {
		global $carpento_redux_theme_opt;
		//margin around it
		$var_name = 'logo-settings-logo-sticky-margin-around';
		$declaration = array();
		$selector = array(
			'header#header .header-nav-wrapper.tm-sticky-menu .menuzord-brand'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		//added margin into the container.
		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $carpento_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-right'] != "" ) {
			$declaration['margin-right'] = $carpento_redux_theme_opt[$var_name]['margin-right'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $carpento_redux_theme_opt[$var_name]['margin-bottom'];
		}
		if( $carpento_redux_theme_opt[$var_name]['margin-left'] != "" ) {
			$declaration['margin-left'] = $carpento_redux_theme_opt[$var_name]['margin-left'];
		}
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_logo_sticky_margin_around_it');
}


if (!function_exists('carpento_header_nav_row_custom_background_color')) {
	/**
	 * Generate CSS codes for Header Navigation Row Custom Background Color
	 */
	function carpento_header_nav_row_custom_background_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-custom-bgcolor';
		$declaration = array();
		$selector = array(
			'header#header .header-nav .header-nav-container',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$header_layout_type = carpento_get_redux_option( 'header-settings-choose-header-layout-type' );
		if( $header_layout_type == 'header-vertical-nav' ) {
			$selector = array(
				'body.tm-vertical-nav header#header',
			);
		}

		$declaration['background-color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_nav_row_custom_background_color');
}



if (!function_exists('carpento_header_nav_row_nav_item_font_size')) {
	/**
	 * Generate CSS codes for Main Nav Item Font Size
	 */
	function carpento_header_nav_row_nav_item_font_size() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-font-size';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > a'
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
}


if (!function_exists('carpento_header_nav_row_nav_dropdown_menu_width')) {
	/**
	 * Generate CSS codes for Dropdown Menu Width(px)
	 */
	function carpento_header_nav_row_nav_dropdown_menu_width() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-skin-dropdown-menu-width';
		$declaration = array();
		$selector = array(
			'.menuzord-menu ul.dropdown',
			'.menuzord-menu ul.dropdown li ul.dropdown',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}


		$declaration['min-width'] = $carpento_redux_theme_opt[$var_name].'px';
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_nav_row_nav_dropdown_menu_width');
}

if (!function_exists('carpento_header_nav_row_nav_item_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item Typography
	 */
	function carpento_header_nav_row_nav_item_typography() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > a'
		);

		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);




		//hover color
		$var_name = 'header-settings-navigation-item-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li:hover > a',
			'#top-primary-nav .menuzord-menu > li.active > a'
		);

		if( $carpento_redux_theme_opt[$var_name] != '' ) {
			$declaration['color'] = $carpento_redux_theme_opt[$var_name];
			carpento_dynamic_css_generator($selector, $declaration);
		}
		


		//padding around it
		$var_name = 'header-settings-navigation-item-padding';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li'
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
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_nav_row_nav_item_typography');
}


if (!function_exists('carpento_header_nav_row_nav_item_dropdown_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item dropdown Typography
	 */
	function carpento_header_nav_row_nav_item_dropdown_typography() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-dropdown-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu ul.dropdown li a'
		);

		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);

		//hover color
		$var_name = 'header-settings-navigation-item-dropdown-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu ul.dropdown li:hover > .menu-item-link:not(.tm-submenu-title)',
			'#top-primary-nav .menuzord-menu ul.dropdown li.active > .menu-item-link:not(.tm-submenu-title)'
		);

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_nav_row_nav_item_dropdown_typography');
}


if (!function_exists('carpento_header_nav_row_nav_item_megamenu_dropdown_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item megamenu dropdown Typography
	 */
	function carpento_header_nav_row_nav_item_megamenu_dropdown_typography() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-megamenu-dropdown-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li a.menu-item-link'
		);

		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);

		//hover color
		$var_name = 'header-settings-navigation-item-megamenu-dropdown-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li:hover > .menu-item-link:not(.tm-submenu-title)',
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li.active > .menu-item-link:not(.tm-submenu-title)'
		);

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_nav_row_nav_item_megamenu_dropdown_typography');
}



if (!function_exists('carpento_header_nav_row_custom_nav_link_n_icon_color')) {
	/**
	 * Generate CSS codes for Header Navigation Row Link and Cart/Search/Side Push Icon Color
	 */
	function carpento_header_nav_row_custom_nav_link_n_icon_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-custom-navigation-link-n-icon-color';
		$declaration = array();
		
		$selector = array(
			'header#header .header-nav .header-nav-container .menuzord-menu > li > a',
			'header#header .header-nav .header-nav-container .search-icon',
			'header#header .header-nav .header-nav-container .mini-cart-icon',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $carpento_redux_theme_opt ) ) {
			return;
		}

		if( $carpento_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		echo "@media (min-width: ". CARPENTO_MENUZORD_MEGAMENU_BREAKPOINT_FW ."){";
		
		$declaration['color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);


		
		$header_layout_type = carpento_get_redux_option( 'header-settings-choose-header-layout-type' );
		if( $header_layout_type == 'header-vertical-nav' ) {
			$selector = array(
				'body.tm-vertical-nav header#header .vertical-nav-sidebar-widget-wrapper .widget',
				'body.tm-vertical-nav header#header .vertical-nav-sidebar-widget-wrapper .widget-title',
			);
			$declaration['color'] = $carpento_redux_theme_opt[$var_name];
			carpento_dynamic_css_generator($selector, $declaration);
		}


		//background color
		$selector = array(
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner',
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner:before',
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner:after',
		);
		$declaration['background-color'] = $carpento_redux_theme_opt[$var_name];
		carpento_dynamic_css_generator($selector, $declaration);
		
		echo "}";

	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_nav_row_custom_nav_link_n_icon_color');
}


if (!function_exists('carpento_header_navigation_vertical_navbar_width')) {
	/**
	 * Generate CSS codes for Vertical Nav Bar Width
	 */
	function carpento_header_navigation_vertical_navbar_width() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-navbar-width';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header'
		);
		
		$navbar_width = $carpento_redux_theme_opt[$var_name];
		$declaration['width'] = $navbar_width.'px';
		$dynamic_css_width = carpento_dynamic_css_generator($selector, $declaration, false);

		//margin left
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav .main-content',
			'body.tm-vertical-nav footer.footer'
		);
		$declaration['margin-left'] = $navbar_width.'px';
		$dynamic_css_margin_left = carpento_dynamic_css_generator($selector, $declaration, false);


		//container width
		$var_name = 'header-settings-navigation-vertical-nav-container-width';
		$declaration = array();

		$selector = array(
			'body.tm-vertical-nav .elementor-top-section.elementor-section-boxed>.elementor-container'
		);
		$container_width = $carpento_redux_theme_opt[$var_name];
		echo "@media (min-width: ". ($container_width + $navbar_width + 50) .'px' ."){";
		$declaration['max-width'] = $container_width.'px !important';
		$declaration['width'] = $container_width.'px !important';
		echo esc_attr( $dynamic_css_width );
		echo esc_attr( $dynamic_css_margin_left );
		carpento_dynamic_css_generator($selector, $declaration);
		echo "}";

	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_vertical_navbar_width');
}


if (!function_exists('carpento_header_navigation_vertical_nav_bgimg')) {
	/**
	 * Generate CSS codes for Background Image for Vertical Nav
	 */
	function carpento_header_navigation_vertical_nav_bgimg() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-bgimg';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header'
		);

		$declaration = carpento_redux_option_field_background( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_vertical_nav_bgimg');
}



if (!function_exists('carpento_header_navigation_vertical_nav_widget_title_typography')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Text Typography
	 */
	function carpento_header_navigation_vertical_nav_widget_title_typography() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-title-typography';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget .widget-title'
		);

		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_vertical_nav_widget_title_typography');
}

if (!function_exists('carpento_header_navigation_vertical_nav_widget_text_typography')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Text Typography
	 */
	function carpento_header_navigation_vertical_nav_widget_text_typography() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-text-typography';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget'
		);

		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_vertical_nav_widget_text_typography');
}

if (!function_exists('carpento_header_navigation_vertical_nav_widget_link_typography')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Link Typography
	 */
	function carpento_header_navigation_vertical_nav_widget_link_typography() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-link-typography';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget a'
		);

		$declaration = carpento_redux_option_field_typography( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_vertical_nav_widget_link_typography');
}

if (!function_exists('carpento_header_navigation_vertical_nav_widget_link_hover_color')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Link Hover Color
	 */
	function carpento_header_navigation_vertical_nav_widget_link_hover_color() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-link-hover-color';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget a:hover'
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
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_vertical_nav_widget_link_hover_color');
}






if (!function_exists('carpento_header_navigation_side_push_panel_width')) {
	/**
	 * Generate CSS codes for Side push panel Bar Width
	 */
	function carpento_header_navigation_side_push_panel_width() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-side-push-panel-width';
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);
		
		$navbar_width = $carpento_redux_theme_opt[$var_name];
		$declaration['width'] = $navbar_width.'px';
		$dynamic_css_width = carpento_dynamic_css_generator($selector, $declaration, false);

		//right or left
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);
		$declaration['right'] = '-'.$navbar_width.'px';
		$dynamic_css_pos_right = carpento_dynamic_css_generator($selector, $declaration, false);

		echo "@media (min-width: 1200px){";
		echo esc_attr( $dynamic_css_width );
		echo esc_attr( $dynamic_css_pos_right );
		echo "}";

	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_side_push_panel_width');
}


if (!function_exists('carpento_header_navigation_side_push_panel_bgimg')) {
	/**
	 * Generate CSS codes for Background Image for Side push panel
	 */
	function carpento_header_navigation_side_push_panel_bgimg() {
		global $carpento_redux_theme_opt;
		$var_name = 'header-settings-navigation-side-push-panel-bgimg';
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);

		$declaration = carpento_redux_option_field_background( $var_name );
		carpento_dynamic_css_generator($selector, $declaration);
	}
	add_action('carpento_dynamic_css_generator_action', 'carpento_header_navigation_side_push_panel_bgimg');
}