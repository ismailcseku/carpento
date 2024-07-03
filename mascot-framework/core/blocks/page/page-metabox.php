<?php
add_filter( 'rwmb_meta_boxes', 'carpento_page_metaboxes' );

/**
 * Register meta boxes
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function carpento_page_metaboxes( $meta_boxes ) {
	//list active sidebars
	$active_sidebar_list = array();
	$active_sidebar_list[ 'inherit' ] = esc_html__( 'Inherit from Theme Options', 'carpento' );
	global $wp_registered_sidebars;
	foreach ( $wp_registered_sidebars as $key => $value ) {
		$active_sidebar_list[ $key ] = $value['name'];
	}

	//get primary thme location menu item
	$theme_locations = get_nav_menu_locations();
	$primary_nav_menu_name = 'none';
	if( array_key_exists('primary', $theme_locations) && !empty($theme_locations['primary']) ) {
		$primary_nav_menu_obj = get_term( $theme_locations['primary'], 'nav_menu' );
		$primary_nav_menu_name = $primary_nav_menu_obj->name;
	}

	//ALL custom post types
	//$post_types = get_post_types();

	//Get a List of All Revolution Slider Aliases
	//revslider version 6
	$list_rev_sliders = array();
	if ( class_exists( 'RevSliderSlider' ) ) {
		$list_rev_sliders[0] = esc_html__( 'Select a Slider', 'carpento' );
		$rev_slider = new RevSliderSlider();
		$all_rev_sliders = $rev_slider->get_sliders();
		foreach ( $all_rev_sliders as $each_slide ) {
			$list_rev_sliders[$each_slide->id] = $each_slide->alias;
		}
	}


	//Get a List of All Layer Slider Aliases
	$list_layer_sliders = array();
	if ( class_exists( 'LS_Sliders' ) ) {
		$list_layer_sliders[0] = esc_html__( 'Select a Slider', 'carpento' );
		$LS_Sliders_list = LS_Sliders::find();
		foreach ( $LS_Sliders_list as $each_slide ) {
			$list_layer_sliders[ $each_slide['id'] ] = $each_slide['name'];
		}
	}


	// Background Patterns Reader
	$sample_patterns_path = CARPENTO_ADMIN_ASSETS_DIR . '/images/pattern/';
	$sample_patterns_url  = CARPENTO_ADMIN_ASSETS_URI . '/images/pattern/';
	$sample_patterns      = array();

	if ( is_dir( $sample_patterns_path ) ) {

		if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
			$sample_patterns = array();

			while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

				if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
					$name              = explode( '.', $sample_patterns_file );
					$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
					$sample_patterns[$sample_patterns_url . $sample_patterns_file] = $sample_patterns_url . $sample_patterns_file;
				}
			}
		}
	}


	$text_align_array = array(
		'inherit'			=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
		'text-left flip'	=> esc_html__( 'Left', 'carpento' ),
		'text-center'		=> esc_html__( 'Center', 'carpento' ),
		'text-right flip'	=> esc_html__( 'Right', 'carpento' ),
	);

	// Page Sidebar
	$meta_boxes[] = array(
		'id'			=> 'page_sidebar',
		'title'			=> esc_html__( 'Page Sidebar', 'carpento' ),
		'post_types'	=> array( 'post', 'page', 'portfolio', 'campaign' ),
		'context'		=> 'side',
		'priority'		=> 'low',
		// Sub-fields
		'fields'		=> array(
			array(
				'id'     => 'carpento_' . 'page_mb_sidebar_layout_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// Sub-fields
				'fields' => array(
					array(
						'name'		=> esc_html__( 'Sidebar Layout', 'carpento' ),
						'id'		=> 'sidebar_layout',
						'type'		=> 'image_select',
						'options' 	=> array(
							'inherit'				=> CARPENTO_ADMIN_ASSETS_URI . '/images/sidebar/inherit.png',
							'sidebar-right-25'		=> CARPENTO_ADMIN_ASSETS_URI . '/images/sidebar/sidebar-right-25.png',
							'sidebar-right-33'		=> CARPENTO_ADMIN_ASSETS_URI . '/images/sidebar/sidebar-right-33.png',
							'no-sidebar'			=> CARPENTO_ADMIN_ASSETS_URI . '/images/sidebar/no-sidebar.png',
							'sidebar-left-25'		=> CARPENTO_ADMIN_ASSETS_URI . '/images/sidebar/sidebar-left-25.png',
							'sidebar-left-33'		=> CARPENTO_ADMIN_ASSETS_URI . '/images/sidebar/sidebar-left-33.png',
							'both-sidebar-25-50-25' => CARPENTO_ADMIN_ASSETS_URI . '/images/sidebar/both-sidebar-25-50-25.png',
						),
						'std'		=> 'inherit',
					),
					array(
						'name'		=> esc_html__( 'Pick Sidebar Default', 'carpento' ),
						'id'		=> 'sidebar_default',
						'type'		=> 'select',
						'options'	=> $active_sidebar_list,
					),
					array(
						'type' 		=> 'heading',
						'name' 		=> esc_html__( 'Sidebar 2 Settings', 'carpento' ),
						'desc'		=> esc_html__( 'Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Pick Sidebar 2', 'carpento' ),
						'id'		=> 'sidebar_two',
						'type'		=> 'select',
						'options'   => $active_sidebar_list,
					),
					array(
						'name'		=> esc_html__( 'Sidebar 2 Position', 'carpento' ),
						'id'		=> 'sidebar_two_position',
						'type'		=> 'select',
						'desc'		=> esc_html__( 'Controls the position of sidebar 2. In that case, sidebar 1 will be shown on opposite side.', 'carpento' ),
						'options'	=> array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'left'		=> esc_html__( 'Left', 'carpento' ),
							'right'	 	=> esc_html__( 'Right', 'carpento' )
						),
					),
				),
			),
		),
	);

	// Meta Box Settings for this Page
	$meta_boxes[] = array(
		'title'	 => esc_html__( 'Page Settings', 'carpento' ),
		'post_types' => array( 'post', 'page', 'portfolio', 'campaign' ),
		'priority'   => 'high',

		// List of tabs, in one of the following formats:
		// 1) key => label
		// 2) key => array( 'label' => Tab label, 'icon' => Tab icon )
		'tabs'		=> array(


			'header'  => array(
				'label' => esc_html__( 'Header', 'carpento' ),
				'icon'  => 'dashicons-arrow-up-alt', // Dashicon
			),
			'theme-color' => array(
				'label' => esc_html__( 'Theme Color Settings', 'carpento' ),
				'icon'  => 'dashicons-art', // Dashicon
			),
			'typography-setting' => array(
				'label' => esc_html__( 'Typography Settings', 'carpento' ),
				'icon'  => 'dashicons-editor-bold', // Dashicon
			),
			'logo' => array(
				'label' => esc_html__( 'Logo', 'carpento' ),
				'icon'  => 'dashicons-palmtree', // Dashicon
			),
			'page-title'		=> array(
				'label' => esc_html__( 'Page Title', 'carpento' ),
				'icon'  => 'dashicons-archive', // Dashicon
			),
			'layout-setings'	=> array(
				'label' => esc_html__( 'Layout Settings', 'carpento' ),
				'icon'  => 'dashicons-editor-table', // Dashicon
			),
			'dark-layouts'	=> array(
				'label' => esc_html__( 'Dark Mode', 'carpento' ),
				'icon'  => 'dashicons-editor-table', // Dashicon
			),
			'footer'	=> array(
				'label' => esc_html__( 'Footer Settings', 'carpento' ),
				'icon'  => 'dashicons-arrow-down-alt', // Dashicon
			),
			'slider' => array(
				'label' => esc_html__( 'Slider Settings', 'carpento' ),
				'icon'  => 'dashicons-update', // Dashicon
			),
			'general' => array(
				'label' => esc_html__( 'General Settings', 'carpento' ),
				'icon'  => 'dashicons-admin-home', // Dashicon
			),
		),

		// Tab style: 'default', 'box' or 'left'. Optional
		'tab_style' => 'left',

		// Show meta box wrapper around tabs? true (default) or false. Optional
		'tab_wrapper' => true,

		'fields'	=> array(


			//Header tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_header_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'header',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Header', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Header Visibility', 'carpento' ),
						'id'		=> 'header_visibility',
						'type'		=> 'select',
						'desc'		=> esc_html__( 'Show or hide complete header only for this page.', 'carpento' ),
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'   		=> esc_html__( 'Show', 'carpento' ),
							'0' 		=> esc_html__( 'Hide', 'carpento' ),
						),
					),



					// DIVIDER
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Header  (Built with Elementor)', 'carpento' ),
					),

					array(
						'name' => esc_html__( 'Choose Header (Elementor)', 'carpento' ),
						'desc' => sprintf(esc_html__('Made using Elementor. Create your own one from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
						'id'          => 'headertop_cpt_elementor',
						'type'        => 'post',

						// Post type.
						'post_type'   => 'header-top',

						// Field type.
						'field_type'  => 'select_advanced',

						// Placeholder, inherited from `select_advanced` field.
						'placeholder' => esc_html__( 'Select a Pre Made Header', 'carpento' ),

						// Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
						'query_args'  => array(
							'post_status'    => 'publish',
							'posts_per_page' => - 1,
						),
					),

					array(
						'name' => esc_html__( 'Or Choose Transparent Header (Elementor)', 'carpento' ),
						'desc' => esc_html__( 'Made From Custom Post Type by using Elementor.', 'carpento' ),
						'id'          => 'headertop_cpt_elementor_transparent',
						'type'        => 'post',

						// Post type.
						'post_type'   => 'header-top',

						// Field type.
						'field_type'  => 'select_advanced',

						// Placeholder, inherited from `select_advanced` field.
						'placeholder' => esc_html__( 'Select a Pre Made Header', 'carpento' ),

						// Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
						'query_args'  => array(
							'post_status'    => 'publish',
							'posts_per_page' => - 1,
						),
					),

					array(
						'name' => esc_html__( 'Choose Header Sticky (Elementor)', 'carpento' ),
						'desc' => esc_html__( 'It will be shown when you scroll down. Made From Custom Post Type by using Elementor.', 'carpento' ),
						'id'          => 'headertop_cpt_elementor_sticky',
						'type'        => 'post',

						// Post type.
						'post_type'   => 'header-top',

						// Field type.
						'field_type'  => 'select_advanced',

						// Placeholder, inherited from `select_advanced` field.
						'placeholder' => esc_html__( 'Select a Pre Made Sticky Header', 'carpento' ),

						// Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
						'query_args'  => array(
							'post_status'    => 'publish',
							'posts_per_page' => - 1,
						),
					),

					array(
						'name' => esc_html__( 'Choose Header Mobile/Tab (Elementor)', 'carpento' ),
						'desc' => esc_html__( 'It will be visible on Tab & Mobile devices only. Made From Custom Post Type by using Elementor.', 'carpento' ),
						'id'          => 'headertop_cpt_elementor_mobile',
						'type'        => 'post',

						// Post type.
						'post_type'   => 'header-top',

						// Field type.
						'field_type'  => 'select_advanced',

						// Placeholder, inherited from `select_advanced` field.
						'placeholder' => esc_html__( 'Select a Pre Made Sticky Header', 'carpento' ),

						// Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
						'query_args'  => array(
							'post_status'    => 'publish',
							'posts_per_page' => - 1,
						),
					),








					array(
						'type' => 'heading',
						'name' => esc_html__( 'Default Header Navigation Row', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Default Header Nav Row (Show/Hide)', 'carpento' ),
						'id'		=> 'header_nav_row_visibility',
						'type'		=> 'select',
						'desc'		=> esc_html__( 'Show or hide default header nav row only for this page.', 'carpento' ),
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'   		=> esc_html__( 'Show', 'carpento' ),
							'0' 		=> esc_html__( 'Hide', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Primary Navigation Menu', 'carpento' ),
						'id'		=> 'custom_primary_nav_menu',
						'type'		=> 'select',
						'desc'		=> sprintf( esc_html__( 'Select which menu you want to display as primary navigation on this page. Currently set to %1$s%2$s%3$s.', 'carpento' ), '<a target="_blank" href="' . esc_url( admin_url( 'nav-menus.php?action=locations' ) ) . '">', $primary_nav_menu_name, '</a>' ),
						'options'   => carpento_get_registered_menus(),
					),
					array(
						'name'		=> esc_html__( 'Enable One Page Nav Smooth Scrolling Effect', 'carpento' ),
						'id'		=> 'enable_one_page_nav_scrolling_effect',
						'type'		=> 'checkbox',
						'desc'		=> esc_html__( 'Check this box in order to enable one page navigation smooth scrollling effect.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Show Custom Button', 'carpento' ),
						'id'		=> 'show_custom_button',
						'type'		=> 'select',
						'desc'		=> esc_html__( 'Enabling this option will show Custom Button.', 'carpento' ),
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'   		=> esc_html__( 'Yes', 'carpento' ),
							'0' 		=> esc_html__( 'No', 'carpento' ),
						),
					),
					array(
						'name'		=> 'title',
						'id'		=> 'custom_button_title',
						'type'		=> 'text',
						'visible'   => array(
							array( 'show_custom_button', '=', '1' )
						),
					),
					array(
						'name'		=> 'link',
						'id'		=> 'custom_button_link',
						'type'		=> 'text',
						'visible'   => array(
							array( 'show_custom_button', '=', '1' )
						),
					),
					array(
						'name'		=> esc_html__( 'Main Nav Items Text Color', 'carpento' ),
						'id'		=> 'main_nav_items_text_color',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   	=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'white'   	=> esc_html__( 'Text White', 'carpento' ),
							'dark' 	=> esc_html__( 'Text Dark', 'carpento' ),
						),
					),








					array(
						'type' => 'heading',
						'name' => esc_html__( 'Header Layout', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Header Layout Type (Built in)', 'carpento' ),
						'id'		=> 'header_layout_type',
						'type'		=> 'select',
						'options'   => array(
							'inherit'						=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'header-current-theme-style1'	=> esc_html__( 'Header Current Theme Style 1', 'carpento' ),
							'header-current-theme-style2'	=> esc_html__( 'Header Current Theme Style 2', 'carpento' ),

							'header-side-panel-nav'			=> esc_html__( 'Side Push Panel Nav', 'carpento' ),
							'header-vertical-nav'			=> esc_html__( 'Vertical Nav', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Header Container', 'carpento' ),
						'id'		=> 'header_container',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   		=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'container' 		=> esc_html__( 'Container', 'carpento' ),
							'container-fluid' 	=> esc_html__( 'Container Fluid', 'carpento' )
						),
					),




					// DIVIDER
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Header Floating Options', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Header Background Shadow (Header Floating)', 'carpento' ),
						'id'		=> 'header_floating_bg_shadow',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   		=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'header-bg-no-shadow'		=> esc_html__( 'No Shadow', 'carpento' ),
							'header-bg-dark-shadow'		=> esc_html__( 'Dark Background Shadow', 'carpento' ),
							'header-bg-light-shadow'	=> esc_html__( 'Light Background Shadow', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Text Color (Header Floating)', 'carpento' ),
						'id'		=> 'header_floating_text_color',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   		=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'header-floating-bg-dark-text-white'	=> esc_html__( 'White Text', 'carpento' ),
							'header-floating-bg-white-text-dark'		=> esc_html__( 'Dark Text', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Background Color (on Header Floating + Sticky)', 'carpento' ),
						'id'		=> 'header_floating_bg_color_sticky',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   		=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'header-floating-sticky-bg-white'	=> esc_html__( 'White BG', 'carpento' ),
							'header-floating-sticky-bg-dark'		=> esc_html__( 'Dark BG', 'carpento' ),
						),
					),



					array(
						'type' => 'heading',
						'name' => esc_html__( 'Header Layout - Vertical Nav', 'carpento' ),
						'visible'   => array(
							array( 'header_layout_type', '=', 'header-vertical-nav' )
						),
					),
					array(
						'name'		=> esc_html__( 'Background Color', 'carpento' ),
						'id'		=> 'vertical_nav_bgcolor',
						'type'		=> 'color',
						'visible'   => array(
							array( 'header_layout_type', '=', 'header-vertical-nav' )
						),
					),
					array(
						'name'		=> esc_html__( 'Background Image', 'carpento' ),
						'id'		=> 'vertical_nav_bgimg',
						'type'		=> 'image_advanced',
						'max_file_uploads' => 1,
						'max_status'=> false,
						'visible'   => array(
							array( 'header_layout_type', '=', 'header-vertical-nav' )
						),
					),
					array(
						'name'		=> esc_html__( 'Shadow', 'carpento' ),
						'id'		=> 'vertical_nav_shadow',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
						'visible'   => array(
							array( 'header_layout_type', '=', 'header-vertical-nav' )
						),
					),
					array(
						'name'		=> esc_html__( 'Vertical Area Border', 'carpento' ),
						'id'		=> 'vertical_nav_border',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
						'visible'   => array(
							array( 'header_layout_type', '=', 'header-vertical-nav' )
						),
					),
					array(
						'name'		=> esc_html__( 'Center Content', 'carpento' ),
						'id'		=> 'vertical_nav_content',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
						'visible'   => array(
							array( 'header_layout_type', '=', 'header-vertical-nav' )
						),
					),

				),
			),
			//Header tab ends





			//theme-color tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_theme_color_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'theme-color',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Theme Color Settings', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Change Primary Theme Color', 'carpento' ),
						'id'		=> 'change_primary_theme_color',
						'type'		=> 'checkbox',
						'desc'		=> esc_html__( 'If you want to change primary theme color of this page then check this option.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Primary Theme Color', 'carpento' ),
						'id'		=> 'primary_theme_color',
						'type'		=> 'select',
						'options'   => carpento_metabox_get_list_of_predefined_theme_color_css_files(),
						'visible'   => array(
							array( 'change_primary_theme_color', '=', true )
						),
					),
				),
			),
			//theme-color tab ends





			//typography-setting tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_typography_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'typography-setting',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Typography', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Change Typography', 'carpento' ),
						'id'		=> 'change_typography',
						'type'		=> 'checkbox',
						'desc'		=> esc_html__( 'If you want to change typography of this page then check this option.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Choose Predefined Typography', 'carpento' ),
						'id'		=> 'primary_typography_set',
						'type'		=> 'select',
						'options'   => carpento_metabox_get_list_of_predefined_typography_files(),
						'visible'   => array(
							array( 'change_typography', '=', true )
						),
					),
				),
			),
			//typography-setting tab ends



			//Logo tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_logo_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'logo',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Logo Settings', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Alternative Site Brand', 'carpento' ),
						'id'		=> 'logo_site_brand',
						'desc'		=> esc_html__( 'Enter the text that will be appeared as logo.', 'carpento' ),
						'type'		=> 'text',
					),

					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Logo', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Use logo in replace of text?', 'carpento' ),
						'id'		=> 'use_logo',
						'type'		=> 'select',
						'options'   => array(
							'inherit' 	=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Logo (Default)', 'carpento' ),
						'id'		=> 'logo_default',
						'type'		=> 'image_advanced',
						'max_file_uploads' => 1,
						'max_status'=> false,
						'visible'   => array( 'use_logo', '!=', '0' ),
					),

					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Switchable logo', 'carpento' ),
						'visible'   => array( 'use_logo', '!=', '0' ),
					),
					array(
						'name'		=> esc_html__( 'Switchable logo(Light/Dark)?', 'carpento' ),
						'id'		=> 'use_switchable_logo',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
						'visible'   => array( 'use_logo', '!=', '0' ),
					),
					array(
						'name'		=> esc_html__( 'Logo (Default)', 'carpento' ),
						'id'		=> 'logo_light',
						'type'		=> 'image_advanced',
						'max_file_uploads' => 1,
						'max_status'=> false,
						'visible'   => array( 'use_switchable_logo', '!=', '0' ),
					),
					array(
						'name'		=> esc_html__( 'Logo (Sticky Mode)', 'carpento' ),
						'id'		=> 'logo_dark',
						'type'		=> 'image_advanced',
						'max_file_uploads' => 1,
						'max_status'=> false,
						'visible'   => array( 'use_switchable_logo', '!=', '0' ),
					),

					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Logo height', 'carpento' ),
						'visible'   => array( 'use_logo', '!=', '0' ),
					),
					array(
						'name'		=> esc_html__( 'Maximum logo height(px)', 'carpento' ),
						'id'		=> 'logo_maximum_height',
						'type'		=> 'slider',
						'desc'		=> esc_html__( 'Enter maximum logo height in px.', 'carpento' ),
						'suffix' => esc_html__( 'px', 'carpento' ),
						'js_options' => array(
							'min'  => 20,
							'max'  => 150,
							'step' => 1,
						),
						// Default value
						'std'		=> 40,
						'visible'   => array( 'use_logo', '!=', '0' ),
					),
				),
			),
			//Logo tab ends



			//Page Title tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_page_title_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'page-title',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Page Title', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Enable Page Title', 'carpento' ),
						'id'		=> 'enable_page_title',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
					),

					array(
						'name' => esc_html__( 'Choose Page Title (Built with Elementor)', 'carpento' ),
						'id'          => 'page_title_widget_area',
						'type'        => 'post',
						'desc'		=> sprintf(esc_html__('Create your own one from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=page-title').'" target="_blank">Dashboard > Parts - Page Title</a>'),

						// Post type.
						'post_type'   => 'page-title',

						// Field type.
						'field_type'  => 'select_advanced',

						// Placeholder, inherited from `select_advanced` field.
						'placeholder' => esc_html__( 'Select a Page Title', 'carpento' ),

						// Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
						'query_args'  => array(
							'post_status'    => 'publish',
							'posts_per_page' => - 1,
						),
					),


					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Title & Subtitle', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Page Title Type', 'carpento' ),
						'id'		=> 'page_title_type',
						'type'		=> 'select',
						'options'   => array(
							'page-title'   		=> esc_html__( 'Show This Page Title', 'carpento' ),
							'custom-title'		=> esc_html__( 'Enter Custom Title', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Custom Title Text', 'carpento' ),
						'id'		=> 'custom_page_title_text',
						'desc'		=> esc_html__( 'Enter the text that will be appeared as page title.', 'carpento' ),
						'type'		=> 'text',
						'visible'   => array(
							array( 'page_title_type', '=', 'custom-title' )
						),
					),
					array(
						'name'		=> esc_html__( 'Subtitle Text', 'carpento' ),
						'id'		=> 'page_sub_title_text',
						'desc'		=> esc_html__( 'Enter the text that will be appeared as subtitle.', 'carpento' ),
						'type'		=> 'text',
					),


					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Page Title Layout', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Choose Page Title Layout', 'carpento' ),
						'id'		=> 'title_layout',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'standard'  => esc_html__( 'Standard', 'carpento' ),
							'split'	 	=> esc_html__( 'Split', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Page Title Container', 'carpento' ),
						'id'		=> 'title_container',
						'type'		=> 'select',
						'options'   => array(
							'inherit'			=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'container'			=> esc_html__( 'Container', 'carpento' ),
							'container-fluid'   => esc_html__( 'Container Fluid', 'carpento' )
						),
					),
					array(
						'name'		=> esc_html__( 'Page Title Text Alignment', 'carpento' ),
						'id'		=> 'title_text_align',
						'type'		=> 'select',
						'options'   => $text_align_array,
					),
					array(
						'name'		=> esc_html__( 'Default Text Color', 'carpento' ),
						'id'		=> 'title_default_text_color',
						'type'		=> 'select',
						'options'   => array(
							'inherit'		=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'text-light' 	=> esc_html__( 'Light Text', 'carpento' ),
							'text-dark'  	=> esc_html__( 'Dark Text', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Page Title Height', 'carpento' ),
						'id'		=> 'title_area_height',
						'type'		=> 'select',
						'options'   => array(
							'inherit'				=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'padding-default'		=> esc_html__( 'Default', 'carpento' ),
							'padding-extra-small'   => esc_html__( 'Extra Small', 'carpento' ),
							'padding-small'			=> esc_html__( 'Small', 'carpento' ),
							'padding-medium'		=> esc_html__( 'Medium', 'carpento' ),
							'padding-large'			=> esc_html__( 'Large', 'carpento' ),
							'padding-extra-large'   => esc_html__( 'Extra Large', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Show Title', 'carpento' ),
						'id'		=> 'title_area_show_title',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Show Breadcrumbs', 'carpento' ),
						'id'		=> 'title_area_show_breadcrumbs',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
					),


					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Page Title Background', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Page Title Background Type', 'carpento' ),
						'id'		=> 'title_area_bg_type',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'bg-color'  => esc_html__( 'Background Color', 'carpento' ),
							'bg-img'	=> esc_html__( 'Background Image', 'carpento' ),
							'bg-video'	=> esc_html__( 'Background Video', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Background Color', 'carpento' ),
						'id'		=> 'title_area_bgcolor',
						'type'		=> 'color',
						'visible'   => array(
							array( 'title_area_bg_type', '=', 'bg-color' )
						),
					),
					array(
						'name'		=> esc_html__( 'Background Image', 'carpento' ),
						'id'		=> 'title_area_bgimg',
						'type'		=> 'image_advanced',
						'max_file_uploads' => 1,
						'max_status'=> false,
						'visible'   => array(
							array( 'title_area_bg_type', '=', 'bg-img' )
						),
					),



					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Background Overlay', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Add Page Title Background Overlay?', 'carpento' ),
						'id'		=> 'title_area_bg_layer_overlay_status',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Overlay Opacity', 'carpento' ),
						'id'		=> 'title_area_bg_layer_overlay_opacity',
						'type'		=> 'slider',
						'desc'		=> esc_html__( 'Overlay on background image on Page Title.', 'carpento' ),
						'js_options' => array(
							'min'  => 1,
							'max'  => 9,
							'step' => 1,
						),
						// Default value
						'std'		=> 7,
						'visible'   => array(
							array( 'title_area_bg_layer_overlay_status', '=', '1' )
						),
					),
					array(
						'name'		=> esc_html__( 'Overlay Color', 'carpento' ),
						'id'		=> 'title_area_bg_layer_overlay_color',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'dark'  	=> esc_html__( 'Dark', 'carpento' ),
							'white' 	=> esc_html__( 'White', 'carpento' )
						),
						'visible'   => array(
							array( 'title_area_bg_layer_overlay_status', '=', '1' )
						),
					),



					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Animation Effect', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Title Animation Effect', 'carpento' ),
						'id'		=> 'title_animation_effect',
						'type'		=> 'select_advanced',
						'options'   => mascot_core_carpento_animate_css_animation_list(),
					),
					array(
						'name'		=> esc_html__( 'Subtitle Animation Effect', 'carpento' ),
						'id'		=> 'subtitle_animation_effect',
						'type'		=> 'select_advanced',
						'options'   => mascot_core_carpento_animate_css_animation_list(),
					),

					// DIVIDER
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Typography', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Title Tag', 'carpento' ),
						'id'		=> 'title_tag',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'h1'		=> 'h1',
							'h2'		=> 'h2',
							'h3'		=> 'h3',
							'h4'		=> 'h4',
							'h5'		=> 'h5',
							'h6'		=> 'h6',
						),
					),
					array(
						'name'		=> esc_html__( 'Title Color', 'carpento' ),
						'id'		=> 'title_color',
						'type'		=> 'color',
					),
					array(
						'name'		=> esc_html__( 'Subtitle Tag', 'carpento' ),
						'id'		=> 'subtitle_tag',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'h1'		=> 'h1',
							'h2'		=> 'h2',
							'h3'		=> 'h3',
							'h4'		=> 'h4',
							'h5'		=> 'h5',
							'h6'		=> 'h6',
						),
					),
					array(
						'name'		=> esc_html__( 'Subtitle Color', 'carpento' ),
						'id'		=> 'subtitle_color',
						'type'		=> 'color',
					),
				),
			),
			//Page Title tab ends




			//Layout tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_layout_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'layout-setings',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Layout Settings', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Page Layout', 'carpento' ),
						'id'		=> 'page_layout',
						'type'		=> 'select',
						'options'   => array(
							'inherit'		=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'boxed'			=> esc_html__( 'Boxed', 'carpento' ),
							'stretched'	 	=> esc_html__( 'Stretched', 'carpento' )
						),
					),


					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Content Width Setting', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Content Width', 'carpento' ),
						'id'		=> 'content_width',
						'desc'		=> esc_html__( 'Select content width. You can use any width by using custom CSS.', 'carpento' ),
						'type'		=> 'select',
						'options'   => array(
							'inherit'				=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'container-970px'	 	=> esc_html__( '970px', 'carpento' ),
							'container-default'		=> esc_html__( '1170px (Bootstrap Default)', 'carpento' ),
							'container-1230px'		=> esc_html__( '1230px (Wide)', 'carpento' ),
							'container-1300px'		=> esc_html__( '1300px (Wider)', 'carpento' ),
							'container-1340px'		=> esc_html__( '1340px (Wider)', 'carpento' ),
							'container-1440px'		=> esc_html__( '1440px (Wider)', 'carpento' ),
							'container-1500px'		=> esc_html__( '1500px (Wider)', 'carpento' ),
							'container-1600px'		=> esc_html__( '1600px (Wider)', 'carpento' ),
							'container-100pr'	 	=> esc_html__( 'Fullwidth 100%', 'carpento' )
						),
					),
					array(
						'name'		=> esc_html__( 'Background Solid Color(For Stretched Mode)', 'carpento' ),
						'id'		=> 'stretched_layout_bg_color',
						'type'		=> 'color',
					),


					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Boxed Layout Settings', 'carpento' ),
						'visible'   => array( 'page_layout', '!=', 'stretched' ),
					),
					array(
						'name'		=> esc_html__( 'Padding Top(px)', 'carpento' ),
						'id'		=> 'boxed_layout_padding_top',
						'desc'		=> esc_html__( 'Please put only integer value. Because the unit \'px\' will be automatically added at the end of the value.', 'carpento' ),
						'type'		=> 'number',
						'visible'   => array(
							array( 'page_layout', '!=', 'stretched' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Padding Bottom(px)', 'carpento' ),
						'id'		=> 'boxed_layout_padding_bottom',
						'desc'		=> esc_html__( 'Please put only integer value. Because the unit \'px\' will be automatically added at the end of the value.', 'carpento' ),
						'type'		=> 'number',
						'visible'   => array(
							array( 'page_layout', '!=', 'stretched' ),
						),
					),
					array(
						'name'		=> esc_html__( 'Container Shadow?', 'carpento' ),
						'id'		=> 'boxed_layout_container_shadow',
						'desc'		=> esc_html__( 'Add shadow around the container.', 'carpento' ),
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
						'visible'   => array( 'page_layout', '!=', 'stretched' ),
					),


					array(
						'name'		=> esc_html__( 'Background Type', 'carpento' ),
						'id'		=> 'boxed_layout_bg_type',
						'desc'		=> esc_html__( 'You can use patterns, image or solid color as a background.', 'carpento' ),
						'type'		=> 'select',
						'options'   => array(
							'inherit'		=> esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'bg-color'	 	=> esc_html__( 'Solid Color', 'carpento' ),
							'bg-pattern'	=> esc_html__( 'Patterns from Theme Library', 'carpento' ),
							'bg-image'	 	=> esc_html__( 'Upload Own Image', 'carpento' ),
						),
						'visible'   => array( 'page_layout', '!=', 'stretched' ),
					),
					array(
						'name'		=> esc_html__( 'Background Color', 'carpento' ),
						'id'		=> 'boxed_layout_bg_type_color',
						'type'		=> 'color',
						'visible'   => array(
							array( 'boxed_layout_bg_type', '=', 'bg-color' )
						),
					),
					array(
						'name'		=> esc_html__( 'Background Pattern from Theme Library', 'carpento' ),
						'id'		=> 'boxed_layout_bg_type_pattern',
						'type'		=> 'image_select',
						// Array of 'value' => 'Image Source' pairs
						'options'   => $sample_patterns,
						'std'		=> $sample_patterns[key($sample_patterns)],
						// Allow to select multiple values? Default is false
						'visible'   => array(
							array( 'boxed_layout_bg_type', '=', 'bg-pattern' )
						),
					),
					array(
						'name'		=> esc_html__( 'Background Image', 'carpento' ),
						'id'		=> 'boxed_layout_bg_type_img',
						'type'		=> 'image_advanced',
						'max_file_uploads' => 1,
						'max_status'=> false,
						'visible'   => array(
							array( 'boxed_layout_bg_type', '=', 'bg-image' )
						),
					),
				),
			),
			//Layout tab ends



			//dark layout tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_dark_layouts_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'dark-layouts',
				// Sub-fields
				'fields' => array(
					array(
						'type'		=> 'heading',
						'name'		=> esc_html__( 'Dark Mode Settings', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Enable Dark Layout Mode', 'carpento' ),
						'id'		=> 'enable_dark_layout_mode',
						'type'		=> 'checkbox',
						'desc'		=> esc_html__( 'Check this box to enable dark layout mode.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Custom Dark Background Color', 'carpento' ),
						'id'		=> 'dark_layout_mode_bg_color',
						'type'		=> 'color',
						'desc'		=> esc_html__( 'You can choose custom Background Color. Otherwise it will come from style css file.', 'carpento' ),
					),
				),
			),
			//Layout tab ends


			//footer tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_footer_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'footer',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Footer Settings', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Footer Visibility', 'carpento' ),
						'id'		=> 'footer_visibility',
						'type'		=> 'select',
						'desc'		=> esc_html__( 'Show or hide footer only for this page.', 'carpento' ),
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Show', 'carpento' ),
							'0'			=> esc_html__( 'Hide', 'carpento' ),
						),
					),
					array(
						'name' => esc_html__( 'Choose Footer (Built with Elementor)', 'carpento' ),
						'id'          => 'footer_widget_area',
						'type'        => 'post',
						'desc'		=> sprintf(esc_html__('Create your own one from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=footer').'" target="_blank">Dashboard > Parts - Footer</a>'),

						// Post type.
						'post_type'   => 'footer',

						// Field type.
						'field_type'  => 'select_advanced',

						// Placeholder, inherited from `select_advanced` field.
						'placeholder' => esc_html__( 'Select a Footer', 'carpento' ),

						// Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
						'query_args'  => array(
							'post_status'    => 'publish',
							'posts_per_page' => - 1,
						),
					),
					array(
						'name'		=> esc_html__( 'Fixed Footer Bottom Effect', 'carpento' ),
						'id'		=> 'footer_fixed_footer_bottom',
						'type'		=> 'select',
						'desc'		=> esc_html__( 'Enabling this option will make Footer gradually appear on scroll. This is popular for OnePage Websites.', 'carpento' ),
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
					),
				),
			),
			//footer tab ends




			//slider tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_slider_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'slider',
				// Sub-fields
				'fields' => array(
					//slider tab starts
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Slider Settings', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Slider Type', 'carpento' ),
						'id'		=> 'slider_type',
						'type'		=> 'select',
						'desc' => esc_html__( 'Select the type of slider you want to display.', 'carpento' ),
						'options'   => array(
							'no-slider'			=> esc_html__( 'No Slider', 'carpento' ),
							'rev-slider'		=> esc_html__( 'Slider Revolution', 'carpento' ),
							'layer-slider'		=> esc_html__( 'Layer Slider', 'carpento' ),
						),
						'std'		=> 'no-slider',
					),
					array(
						'name'		=> esc_html__( 'Choose Revolution Slider', 'carpento' ),
						'id'		=> 'select_rev_slider',
						'type'		=> 'select',
						'desc' => esc_html__( 'Select the name(alias) of the revolution slider you want to display.', 'carpento' ),
						'options'   => $list_rev_sliders,
						'visible'   => array( 'slider_type', '=', 'rev-slider' ),
					),
					array(
						'name'		=> esc_html__( 'Choose Layer Slider', 'carpento' ),
						'id'		=> 'select_layer_slider',
						'type'		=> 'select',
						'desc' => esc_html__( 'Select the name(alias) of the revolution slider you want to display.', 'carpento' ),
						'options'   => $list_layer_sliders,
						'visible'   => array( 'slider_type', '=', 'layer-slider' ),
					),
					array(
						'name'		=> esc_html__( 'Slider Position', 'carpento' ),
						'id'		=> 'slider_position',
						'type'		=> 'select',
						'desc' => esc_html__( 'Choose position of the slider you want to display. You can put it below or above the header.', 'carpento' ),
						'options'   => array(
							'default'		=> esc_html__( 'Default', 'carpento' ),
							'below-header'	=> esc_html__( 'Below Header', 'carpento' ),
							'above-header'	=> esc_html__( 'Above Header', 'carpento' ),
						),
						'std'		=> 'default',
						'visible'   => array( 'slider_position', '!=', 'no-slider' ),
					),
					//slider tab ends


				),
			),
			//slider tab ends


			//general tab starts
			array(
				'id'     => 'carpento_' . 'page_mb_general_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'general',
				// Sub-fields
				'fields' => array(
					array(
						'type' => 'heading',
						'name' => esc_html__( 'General Settings', 'carpento' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Hide Featured Image', 'carpento' ),
						'id'		=> 'hide_featured_image',
						'type'		=> 'checkbox',
						'desc'		=> esc_html__( 'Enable/Disabling this option will show/hide Featured Image in blog page.', 'carpento' ),
					),
					array(
						'name'		=> esc_html__( 'Show Comments', 'carpento' ),
						'id'		=> 'show_comments',
						'type'		=> 'select',
						'options'   => array(
							'inherit'   => esc_html__( 'Inherit from Theme Options', 'carpento' ),
							'1'			=> esc_html__( 'Yes', 'carpento' ),
							'0'			=> esc_html__( 'No', 'carpento' ),
						),
					),
				),
			),
			//general tab ends


		),
	);


	return $meta_boxes;
}
