<?php
/**
 * ThemeMascot functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 */

global $carpento_theme_info;
$carpento_theme_info = wp_get_theme();

if (!function_exists('mascot_core_carpento_plugin_installed')) {
	/**
	 * Core Plugin installed?*/
	function mascot_core_carpento_plugin_installed() {
		return defined( 'MASCOT_CORE_CARPENTO_VERSION' );
	}
}

/* VARIABLE DEFINITIONS
================================================== */
define( 'MASCOT_THEME_ACTIVE', 'TRUE' );
define( 'CARPENTO_AUTHOR', 'ThemeMascot' );
define( 'CARPENTO_FRAMEWORK_VERSION', '1.0' );
define( 'CARPENTO_TEMPLATE_URI', get_template_directory_uri() );
define( 'CARPENTO_TEMPLATE_DIR', get_template_directory() );

define( 'CARPENTO_ASSETS_URI', CARPENTO_TEMPLATE_URI . '/assets' );
define( 'CARPENTO_ASSETS_DIR', CARPENTO_TEMPLATE_DIR . '/assets' );

define( 'CARPENTO_ADMIN_ASSETS_URI', CARPENTO_TEMPLATE_URI . '/admin/assets' );
define( 'CARPENTO_ADMIN_ASSETS_DIR', CARPENTO_TEMPLATE_DIR . '/admin/assets' );

define( 'CARPENTO_FRAMEWORK_FOLDER', 'mascot-framework' );
define( 'CARPENTO_FRAMEWORK_DIR', CARPENTO_TEMPLATE_DIR . '/'. CARPENTO_FRAMEWORK_FOLDER );

define( 'CARPENTO_THEME_VERSION', $carpento_theme_info->get( 'Version' ) );
define( 'CARPENTO_POST_EXCERPT_LENGTH', 25 );


/* Initial Actions
================================================== */
add_action( 'after_setup_theme', 		'carpento_action_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 		'carpento_action_wp_enqueue_scripts',12 );
add_action( 'widgets_init', 			'carpento_action_widgets_init' );
add_action( 'wp_head', 					'carpento_action_wp_head',1 );
add_action( 'wp_head', 					'carpento_action_wp_head_at_the_end', 100 );

//admin actions
add_action( 'admin_enqueue_scripts',	'carpento_action_theme_admin_enqueue_scripts' );

add_action( 'wp_footer', 				'carpento_action_wp_footer' );


/* MASCOT FRAMEWORK
================================================== */
require_once( CARPENTO_FRAMEWORK_DIR . '/mascot-framework.php' );



if(!function_exists('carpento_action_after_setup_theme')) {
	/**
	 * After Setup Theme
	 */
	function carpento_action_after_setup_theme() {
		//Theme Support
		global $supported_post_formats;
		$supported_post_formats = array( 'gallery', 'link', 'quote', 'audio', 'video' );

		//This feature enables Post Formats support for this theme
		add_theme_support( 'post-formats', $supported_post_formats );

		//This feature enables Automatic Feed Links for post and comment in the head
		add_theme_support( 'automatic-feed-links' );

		//This feature enables Post Thumbnails support for this theme
		add_theme_support( 'post-thumbnails' );

		//Woocommerce theme suport
		add_theme_support( 'woocommerce' );

		// Custom Backgrounds
		add_theme_support( 'custom-background', array(
			'default-color' => 'fff',
		) );

		//This feature enables plugins and themes to manage the document title tag. This should be used in place of wp_title() function
		add_theme_support( 'title-tag' );

		//This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


		// add excerpt support for pages
		add_post_type_support( 'page', 'excerpt' );

		//Thumbnail Sizes
		set_post_thumbnail_size( 672, 448, true );
		add_image_size( 'carpento_thumbnail_height', 600, 800, true );
		add_image_size( 'carpento_thumbnail_height_400', 400, 532, true );

		add_image_size( 'carpento_square', 550, 550, true );
		add_image_size( 'carpento_landscape', 1100, 550, true );
		add_image_size( 'carpento_portrait', 550, 1100, true );
		add_image_size( 'carpento_huge_square', 1100, 1100, true );
		add_image_size( 'carpento_square_150', 150, 150, true );

		add_image_size( 'carpento_small_height', 150, 180, true );

		//Content Width
		if ( ! isset( $content_width ) ) $content_width = 1170;

		//Theme Textdomain
		load_theme_textdomain( 'carpento', get_template_directory() . '/languages' );

		//Register Nav Menus
		$register_nav_menus_array = array(
			'primary' 					=> esc_html__( 'Primary Navigation Menu', 'carpento' ),
			'page-404-helpful-links' 	=> esc_html__( 'Page 404 Helpful Links', 'carpento' )
		);

		register_nav_menus( $register_nav_menus_array );
	}
}


if(!function_exists('carpento_action_wp_enqueue_scripts')) {
	/**
	 * Enqueue Script/Style
	 */
	function carpento_action_wp_enqueue_scripts() {
		wp_enqueue_script( 'jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-accordion');

		if( !is_admin() ){

			/**
			 * Enqueue Style
			 */

			if( is_rtl() ) {
				wp_enqueue_style( 'bootstrap-rtl', CARPENTO_TEMPLATE_URI . '/assets/css/bootstrap-rtl.min.css' );
			} else {
				wp_enqueue_style( 'bootstrap', CARPENTO_TEMPLATE_URI . '/assets/css/bootstrap.min.css' );
			}
			wp_enqueue_style( 'animate', CARPENTO_TEMPLATE_URI . '/assets/css/animate.min.css' );

			//enable preloader
			wp_register_style( 'carpento-preloader', CARPENTO_TEMPLATE_URI . '/assets/css/preloader.css' );
			$page_preloader = carpento_get_redux_option( 'general-settings-enable-page-preloader' );
			if( $page_preloader ) {
				wp_enqueue_style( 'carpento-preloader' );
			}

			/**
			 * Enqueue Fonts
			 */
			//font-awesome icons
			wp_deregister_style( 'font-awesome' );
			wp_deregister_style( 'font-awesome-v4-shims' );
			wp_enqueue_style( 'font-awesome-5-all', CARPENTO_TEMPLATE_URI . '/assets/css/font-awesome5.min.css' );
			wp_enqueue_style( 'font-awesome-4-shim', CARPENTO_TEMPLATE_URI . '/assets/css/font-awesome-v4-shims.css' );
			//linear icons
			wp_enqueue_style( 'font-linear-icons', CARPENTO_TEMPLATE_URI . '/assets/fonts/linear-icons/style.css' );



			//google fonts
			wp_enqueue_style( 'carpento-google-fonts', carpento_google_fonts_url(), [], null );

			/**
			 * Enqueue Script
			 */
			wp_enqueue_script( 'html5shiv', CARPENTO_TEMPLATE_URI . '/assets/js/html5shiv.min.js', array(''), '3.7.3' );
			wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
			wp_enqueue_script( 'respond', CARPENTO_TEMPLATE_URI . '/assets/js/respond.min.js', array(''), '1.4.2' );
			wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

			wp_enqueue_script( 'bootstrap', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/bootstrap.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'menuzord', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/menuzord/js/menuzord.js', array('jquery'), false, true );

			//external plugins single file:
			wp_enqueue_script( 'jquery-appear', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery.appear.js', array('jquery'), false, true );
			wp_enqueue_script( 'isotope', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/isotope.pkgd.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'imagesloaded' );
			wp_enqueue_script( 'jquery-scrolltofixed', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery-scrolltofixed-min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-easing', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery.easing.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-fitvids', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery.fitvids.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-localscroll', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery.localscroll.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-scrollto', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery.scrollto.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-lettering', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery.lettering.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-textillate', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery.textillate.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-nice-select', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery-nice-select/jquery.nice-select.min.js', array('jquery'), false, true );
			wp_enqueue_style( 'nice-select', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/jquery-nice-select/nice-select.css' );
			wp_enqueue_script( 'wow', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/wow.min.js', null, false, true );


			//gsap
			wp_register_script( 'gsap', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/gsap.min.js', array( 'jquery' ), '3.5.0', true );
			wp_register_script( 'tm-scroll-trigger', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/scroll-trigger.js', array( 'jquery' ), '3.10.5', true );
			wp_register_script( 'tm-splitText', CARPENTO_TEMPLATE_URI . '/assets/js/plugins/split-text.js', array( 'jquery' ), '3.6.1', true );
			wp_register_script( 'tm-gsap-bg-animation', CARPENTO_TEMPLATE_URI . '/assets/js/gsap-bg-animation.js', array( 'jquery' ), '3.6.1', true );


			//Theme Custom JS
			wp_enqueue_script( 'mascot-custom', CARPENTO_TEMPLATE_URI . '/assets/js/custom.js', array('jquery'), false, true );

			//Enqueue comment-reply.js
			if ( is_singular() && comments_open() && get_option('thread_comments') ) {
				wp_enqueue_script( 'comment-reply' );
			}

			if(defined('ELEMENTOR_VERSION')) {
				//enqued elementor frontend in all pages due to FOUC
				wp_enqueue_style( 'elementor-frontend' );
			}

			//style main for this theme
			$direction_suffix = is_rtl() ? '-rtl' : '';
			wp_enqueue_style( 'carpento-style-main', CARPENTO_TEMPLATE_URI . '/assets/css/style-main' . $direction_suffix . '.css', array(), CARPENTO_THEME_VERSION );

			//woo
			$direction_suffix = is_rtl() ? '.rtl' : '';
			if ( carpento_is_woocommerce_page() ) {
				wp_enqueue_style( 'carpento-woo-shop', CARPENTO_TEMPLATE_URI . '/assets/css/shop/woo-shop' . $direction_suffix . '.css', array('carpento-style-main') );
				wp_enqueue_style( 'carpento-woo-shop-single', CARPENTO_TEMPLATE_URI . '/assets/css/shop/shop-single' . $direction_suffix . '.css', array('carpento-style-main') );
			}
			if ( carpento_exists_woocommerce() ) {
				wp_register_style( 'carpento-woo-shop-mini-cart', CARPENTO_TEMPLATE_URI . '/assets/css/shop/shop-mini-cart' . $direction_suffix . '.css', array('carpento-style-main') );
			}


			//Typography Set from metabox
			$mascot_primary_typography_set = '';
			$page_metabox_change_typography = carpento_get_rwmb_group( 'carpento_' . "page_mb_typography_settings", 'change_typography', carpento_get_page_id() );
			if( $page_metabox_change_typography ) {
				//Theme Color from page meta box
				$mascot_primary_typography_set = carpento_get_rwmb_group( 'carpento_' . "page_mb_typography_settings", 'primary_typography_set', carpento_get_page_id() );
			}
			if( !empty($mascot_primary_typography_set) ) {
				wp_enqueue_style( 'carpento-primary-typography-set', CARPENTO_TEMPLATE_URI . '/assets/css/typography/' . $mascot_primary_typography_set );
			}








			//Theme Color
			$mascot_primary_theme_color = '';
			$page_metabox_change_primary_theme_color = carpento_get_rwmb_group( 'carpento_' . "page_mb_theme_color_settings", 'change_primary_theme_color', carpento_get_page_id() );

			if( $page_metabox_change_primary_theme_color ) {
				//Theme Color from page meta box
				$mascot_primary_theme_color = carpento_get_rwmb_group( 'carpento_' . "page_mb_theme_color_settings", 'primary_theme_color', carpento_get_page_id() );

			} else if ( !_empty( carpento_get_redux_option( 'theme-color-settings-theme-color-type' ) ) ) {
				//Theme Color from Theme Options
				if( carpento_get_redux_option( 'theme-color-settings-theme-color-type' ) == 'predefined' ) {
					//Primary Theme Color
					$mascot_primary_theme_color = !_empty( carpento_get_redux_option( 'theme-color-settings-primary-theme-color' ) ) ? carpento_get_redux_option( 'theme-color-settings-primary-theme-color' ) : '';
				} else if ( carpento_get_redux_option( 'theme-color-settings-theme-color-type' ) == 'custom' ) {
					//Custom Theme Color
					$redux_css_file_name = carpento_get_redux_option( 'theme-color-settings-custom-theme-color-filename' );
					if( !empty( $redux_css_file_name ) ) {
						$mascot_primary_theme_color = $redux_css_file_name . '.css';
					} else if ( !is_multisite() ) {
						if ( file_exists( CARPENTO_ASSETS_DIR . '/css/colors/custom-theme-color.css' ) ) {
							$mascot_primary_theme_color = 'custom-theme-color.css';
						}
					} else {
						if ( file_exists( CARPENTO_ASSETS_DIR . '/css/colors/custom-theme-color-msid-' . carpento_get_multisite_blog_id() . '.css' ) ) {
							$mascot_primary_theme_color = 'custom-theme-color-msid-' . carpento_get_multisite_blog_id() . '.css';
						}
					}
				}
			} else {
				$mascot_primary_theme_color = 'theme-skin-color-set1.css';
			}

			wp_enqueue_style( 'carpento-primary-theme-color', CARPENTO_TEMPLATE_URI . '/assets/css/colors/' . $mascot_primary_theme_color );


			//Attach Premade CSS File into the header
			$mascot_premade_sitewise_css_file = carpento_get_redux_option( 'theme-color-settings-premade-sitewise-css-file' );
			if( !empty($mascot_premade_sitewise_css_file) ) {
				wp_enqueue_style( 'carpento-premade-sitewise-css-file', CARPENTO_TEMPLATE_URI . '/assets/css/sites/' . $mascot_premade_sitewise_css_file );
			}


			if( is_rtl() ) {
				wp_enqueue_style( 'carpento-style-main-rtl-extra', CARPENTO_TEMPLATE_URI . '/assets/css/style-main-rtl-extra.css' );
			}

			//Dark mode
			$enable_dark_layout_mode = carpento_get_rwmb_group( 'carpento_' . "page_mb_dark_layouts_settings", 'enable_dark_layout_mode', carpento_get_page_id() );
			if( $enable_dark_layout_mode ) {
				wp_enqueue_style( 'carpento-style-main-dark', CARPENTO_TEMPLATE_URI . '/assets/css/style-main-dark.css' );
			} else if( carpento_get_redux_option( 'general-settings-enable-dark-mode' ) ) {
				wp_enqueue_style( 'carpento-style-main-dark', CARPENTO_TEMPLATE_URI . '/assets/css/style-main-dark.css' );
			}


			//Dynamic Style
			if ( !is_multisite() ) {
				if ( mascot_core_carpento_plugin_installed() && file_exists( CARPENTO_ASSETS_DIR . '/css/dynamic-style.css' ) ) {
					wp_enqueue_style( 'carpento-dynamic-style', CARPENTO_TEMPLATE_URI . '/assets/css/dynamic-style.css' );
				}
			} else {
				if ( mascot_core_carpento_plugin_installed() && file_exists( CARPENTO_ASSETS_DIR . '/css/dynamic-style-msid-' . carpento_get_multisite_blog_id() . '.css' ) ) {
					wp_enqueue_style( 'carpento-dynamic-style', CARPENTO_TEMPLATE_URI . '/assets/css/dynamic-style-msid-' . carpento_get_multisite_blog_id() . '.css' );
				}
			}

		}
	}
}



if(!function_exists('carpento_action_theme_admin_enqueue_scripts')) {
	/**
	 * Add Admin Scripts
	 */
	function carpento_action_theme_admin_enqueue_scripts() {
		wp_enqueue_style( 'font-awesome', CARPENTO_TEMPLATE_URI . '/assets/css/font-awesome5.min.css' );
		wp_enqueue_style( 'carpento-custom-admin', CARPENTO_TEMPLATE_URI . '/admin/assets/css/custom-admin.css' );
		wp_enqueue_script( 'carpento-admin', CARPENTO_TEMPLATE_URI . '/admin/assets/js/admin.js', array('jquery'), null, true );
	}
}



if(!function_exists('carpento_detect_elementor_and_add_class')) {
	/**
	 * Detect Elementor Enabled in Page Content and then add class to body
	 */
	function carpento_detect_elementor_and_add_class( $classes ) {
		$elementor_enabled = false;
		if ( did_action( 'elementor/loaded' ) ) {
			$elementor_enabled = true;
		}
		if (  is_archive() ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if (  is_search() ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if ( is_singular( 'portfolio-items' ) ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if ( $elementor_enabled != 'false' && $elementor_enabled == true ) {
			$classes[] = 'tm_elementor_page_status_true';
		} else {
			$classes[] = 'tm_elementor_page_status_false';
		}
		return $classes;
	}
	add_filter( 'body_class','carpento_detect_elementor_and_add_class' );
}



if(!function_exists('carpento_google_fonts_url')) {
	/**
	 * @return string Google fonts URL
	 */
	function carpento_google_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		//fonts
		$fonts = apply_filters( 'carpento_google_web_fonts', $fonts );

		//font subsets
		$subsets = apply_filters('carpento_google_font_subset', 'latin,latin-ext');

		if ( !empty( $fonts ) ) {
			foreach ($fonts as $key => $value) {
				$fonts[$key] = "family=" . $value;
			}
		}
		$fonts_url = implode( '&', $fonts );
		$fonts_url = '//fonts.googleapis.com/css2?' . $fonts_url. '&display=swap';

		return $fonts_url;
	}
}


if(!function_exists('carpento_primary_google_fonts')) {
	/**
	 * @return primary google fonts used in this theme
	 */
	function carpento_primary_google_fonts( $fonts ) {

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'carpento' ) ) {
			$fonts[] = 'Outfit:wght@400;500;600;700;800';
			$fonts[] = 'Roboto:wght@400;500;600;700;800';
			$fonts[] = 'Caveat:wght@400;500;600;700';
		}

		return $fonts;
	}
	add_filter( 'carpento_google_web_fonts', 'carpento_primary_google_fonts' );
}

if(!function_exists('carpento_wrap_embed_with_div')) {
	function carpento_wrap_embed_with_div( $cache, $url, $attr, $post_ID ) {
		$classes = array();

		// Add these classes to all embeds.
		$classes_all = array(
			'tm-responsive-video-wrapper',
		);

		// Check for different providers and add appropriate classes.

		if ( false !== strpos( $url, 'vimeo.com' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-vimeo';
		}

		if ( false !== strpos( $url, 'youtube.com' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-youtube';
		}

		if ( false !== strpos( $url, 'wordpress.tv' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-videopress';
		}

		$classes = array_merge( $classes, $classes_all );

		return '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">' . $cache . '</div>';
	}
	add_filter( 'embed_oembed_html', 'carpento_wrap_embed_with_div', 99, 4 );
}

if(!function_exists('carpento_override_mce_options')) {
	function carpento_override_mce_options($initArray) {
		$opts = '*[*]';
		$initArray['valid_elements'] = $opts;
		$initArray['extended_valid_elements'] = $opts;
		return $initArray;
	}
	add_filter('tiny_mce_before_init', 'carpento_override_mce_options');
}