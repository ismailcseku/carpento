<?php
	/**
	 * ReduxFramework Sample Config File
	 * For full documentation, please visit: http://docs.reduxframework.com/
	 */

	if ( ! class_exists( 'Redux' ) ) {
		return;
	}

	// This is your option name where all the Redux data is stored.
	$opt_name = "carpento_redux_theme_opt";

	// This line is only for altering the demo. Can be easily removed.
	$opt_name = apply_filters( 'carpento_redux_theme_opt/opt_name', $opt_name );

	$site_url = site_url();

	//custom action hook for this template:
	add_action('redux/options/carpento_redux_theme_opt/saved', 'carpento_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/carpento_redux_theme_opt/saved', 'carpento_generate_dynamic_css');
	add_action('redux/options/carpento_redux_theme_opt/reset', 'carpento_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/carpento_redux_theme_opt/reset', 'carpento_generate_dynamic_css');
	add_action('redux/options/carpento_redux_theme_opt/section/reset', 'carpento_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/carpento_redux_theme_opt/section/reset', 'carpento_generate_dynamic_css');

	//required files
	require_once( 'filter-social-links.php' );
	/*
	 *
	 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
	 *
	 */

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
					$sample_patterns[ $sample_patterns_url . $sample_patterns_file ] = array(
						'alt' => $name,
						'img' => $sample_patterns_url . $sample_patterns_file
					);
				}
			}
		}
	}


	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

	/*

		As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


	 */


	// -> START General Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'General', 'carpento' ),
		'id'     => 'general-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-admin-home',
		'fields' => array(
			array(
				'id'       => 'general-settings-favicon',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Favicon', 'carpento' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'carpento' ),
				'subtitle' => esc_html__( 'Upload a 32px x 32px png/gif image that will represent your website favicon.', 'carpento' ),
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/favicon.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-144',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 144x144 Icon', 'carpento' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'carpento' ),
				'subtitle' => esc_html__( 'Upload a 144px x 144px png image that will be your website bookmark on retina iOS devices.', 'carpento' ),
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/apple-touch-icon-144x144.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-114',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 114x114 Icon', 'carpento' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'carpento' ),
				'subtitle' => esc_html__( 'Upload a 114px x 114px png image that will be your website bookmark on retina iOS devices.', 'carpento' ),
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/apple-touch-icon-114x114.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-72',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 72x72 Icon', 'carpento' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'carpento' ),
				'subtitle' => esc_html__( 'Upload a 72px x 72px Png image that will be your website bookmark on non-retina iOS devices.', 'carpento' ),
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/apple-touch-icon-72x72.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-32',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 32x32 Icon', 'carpento' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'carpento' ),
				'subtitle' => esc_html__( 'Upload a 32px x 32px png image that will be your website bookmark on non-retina iOS devices.', 'carpento' ),
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/apple-touch-icon.png' ),
			),
			array(
				'id'       => 'general-settings-enable-responsive',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Responsive', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disable the responsive behaviour of the theme', 'carpento' ),
				'default'  => true,
			),
			array(
				'id'       => 'general-settings-enable-backtotop',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Back To Top', 'carpento' ),
				'subtitle' => esc_html__( 'Enable Back to Top button that appears in the bottom right corner of the screen.', 'carpento' ),
				'default'  => true,
			),


			array(
				'id'       => 'general-settings-smooth-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Smooth Scroll', 'carpento' ),
				'subtitle' => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices).', 'carpento' ),
				'default'  => true,
			),

			array(
				'id'       => 'general-settings-enable-element-animation-effect',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Animation Effect on Different Elements', 'carpento' ),
				'subtitle' => esc_html__( 'Enabling this option will enable animation effect.', 'carpento' ),
				'default'  => true,
			),
		)
	) );

	$my_wp_get_theme = wp_get_theme();
	// -> START Logo Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Logo', 'carpento' ),
		'id'     => 'logo-settings',
		'desc'   => sprintf( esc_html__( 'If you want to upload SVG logo then please install this %1$ssvg plugin%2$s', 'carpento' ), '<a target="_blank" href="' . esc_url( 'https://wordpress.org/plugins/svg-support/' ) . '">', '</a>' ),
		'icon'   => 'dashicons-before dashicons-palmtree',
		'fields' => array(
			array(
				'id'       => 'logo-settings-site-brand',
				'type'     => 'text',
				'title'    => esc_html__( 'Site Brand', 'carpento' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as logo', 'carpento' ),
				'desc'     => '',
				'default'  => $my_wp_get_theme->get( 'Name' ),
			),

			array(
				'id'       => 'logo-settings-want-to-use-logo',
				'type'     => 'switch',
				'title'    => esc_html__( 'Use logo in replace of "Site Brand" Text?', 'carpento' ),
				'subtitle' => esc_html__( 'If you want to use logo then please enable it.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),

			array(
				'id'       => 'logo-settings-switchable-logo',
				'type'     => 'switch',
				'title'    => esc_html__( 'Switchable logo(Light+Dark)?', 'carpento' ),
				'subtitle' => esc_html__( 'If you want to use switchable logo then please enable it.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-default',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Default)', 'carpento' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'carpento' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '0' ),
			),

			array(
				'id'       => 'logo-settings-logo-default-dark-bg',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (White) For Dark Background', 'carpento' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'carpento' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '0' ),
			),

			array(
				'id'       => 'logo-settings-logo-primary',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Default)', 'carpento' ),
				'subtitle' => esc_html__( 'Upload a logo for the default mode.', 'carpento' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-on-sticky',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Sticky Mode)', 'carpento' ),
				'subtitle' => esc_html__( 'Upload a logo for the sticky mode.', 'carpento' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '1' ),
			),


			array(
				'id'            => 'logo-settings-maximum-logo-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Logo Width(px)', 'carpento' ),
				'subtitle'      => esc_html__( 'Enter maximum logo width in px.', 'carpento' ),
				'desc'          => '',
				'default'       => 200,
				'min'           => 20,
				'step'          => 1,
				'max'           => 500,
				'display_value' => 'text',
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),


			array(
				'id'            => 'logo-settings-maximum-logo-height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Logo Height(px)', 'carpento' ),
				'subtitle'      => esc_html__( 'Enter maximum logo height in px.', 'carpento' ),
				'desc'          => '',
				'default'       => 55,
				'min'           => 20,
				'step'          => 1,
				'max'           => 250,
				'display_value' => 'text',
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),
			array(
				'id'            => 'logo-settings-maximum-logo-height-in-sticky-mode',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Logo Height(px) in Sticky Mode', 'carpento' ),
				'subtitle'      => esc_html__( 'Enter maximum logo height in px in sticky header mode.', 'carpento' ),
				'desc'          => '',
				'default'       => 40,
				'min'           => 20,
				'step'          => 1,
				'max'           => 250,
				'display_value' => 'text',
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),

			array(
				'id'            => 'logo-settings-logo-margin-around',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin(px) Around Logo', 'carpento' ),
			),

			array(
				'id'            => 'logo-settings-logo-sticky-margin-around',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin(px) Around Logo in Sticky Mode', 'carpento' ),
			),

			array(
				'id'       => 'logo-settings-admin-login-logo',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'WordPress Admin Login Logo', 'carpento' ),
				'subtitle' => esc_html__( 'Change the default wordpress login logo. Dimensions should be 250x50 px', 'carpento' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/logo-wide.png' ),
			),

		)
	) );


	// -> START Theme Color Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Theme Color Settings', 'carpento' ),
		'id'     => 'theme-color-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-art',
		'fields' => array(
			array(
				'id'       => 'theme-color-settings-theme-color-type',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Website Primary Theme Color', 'carpento' ),
				'subtitle' => esc_html__( 'Select website primary theme color', 'carpento' ),
				'options' => array(
					'predefined' => esc_html__( 'Predefined Theme Colors', 'carpento' ),
					'custom'     => esc_html__( 'Custom Theme Color', 'carpento' )
				),
				'default' => 'predefined',
			),
			array(
				'id'       => 'theme-color-settings-primary-theme-color',
				'type'     => 'select',
				'title'    => esc_html__( 'Predefined Theme Colors', 'carpento' ),
				'subtitle' => esc_html__( 'Choose one from these predefined theme colors', 'carpento' ),
				'desc'     => '',
				'options'	=> carpento_metabox_get_list_of_predefined_theme_color_css_files(),
				'default'  => 'theme-skin-color-set1.css',
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'predefined' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color1',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Primary Theme Color', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom primary color for the theme.', 'carpento' ),
				'default'  => '#1296CC',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color2',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Secondary Theme Color', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom secondary color for the theme.', 'carpento' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color3',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom 3rd Theme Color', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom 3rd color for the theme.', 'carpento' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color4',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom 4th Theme Color', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom 4th color for the theme.', 'carpento' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color-filename',
				'type'     => 'text',
				'title'    => esc_html__( 'File Name to Save This Color Set (Optional)', 'carpento' ),
				'subtitle' => esc_html__( 'If you want to save this color set as a css file then give a name of the file. File name must starts with "theme-color-". Same name will override exising one. Leave empty for not to save it as a css file.', 'carpento' ),
				'desc'     => '',
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),



			//Site Category CSS files
			array(
				'id'       	=> 'theme-color-settings-theme-color-custom-site-cssfile-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Attach Premade CSS File to get extra styling throughout the site.', 'carpento' ),
				'notice'    => false,
			),
			array(
				'id'       => 'theme-color-settings-premade-sitewise-css-file',
				'type'     => 'select',
				'title'    => esc_html__( 'Attach Premade CSS File into the header', 'carpento' ),
				'subtitle' => esc_html__( 'These files are located in assets/css/sites folder of this theme.', 'carpento' ),
				'options'	=> carpento_metabox_get_list_of_premade_sitewise_css_files(),
			),
		)
	) );

	// -> START Dark Mode Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Dark Mode', 'carpento' ),
		'id'     => 'darkmode-settings',
		'icon'   => 'dashicons-before dashicons-visibility',
		'fields' => array(
			array(
				'id'       => 'general-settings-enable-dark-mode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Dark Mode', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disable the Dark Mode of the theme', 'carpento' ),
				'default'  => false,
			),
		)
	) );


	// -> START Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Typography', 'carpento' ),
		'id'     => 'typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
	) );

	// -> START Body Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Body Typography', 'carpento' ),
		'id'     => 'primary-body-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'typography-primary-body',
				'type'          => 'typography',
				'title'         => esc_html__( 'Primary Body Typography', 'carpento' ),
				'subtitle'      => esc_html__( 'Specify the body font properties.', 'carpento' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'            => 'typography-primary-body-link-color',
				'type'          => 'color',
				'title'         => esc_html__( 'Primary Link Color', 'carpento' ),
				'subtitle'      => esc_html__( 'Specify link color throughout the body.', 'carpento' ),
				'transparent'   => false,
			),
		)

	) );

	// -> START Body Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Section Title Typography', 'carpento' ),
		'id'     => 'section-title-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'typography-section-title',
				'type'          => 'typography',
				'title'         => esc_html__( 'Section Title Typography', 'carpento' ),
				'subtitle'      => esc_html__( 'Specify the Section Title font properties.', 'carpento' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'            => 'typography-section-subtitle',
				'type'          => 'typography',
				'title'         => esc_html__( 'Section Sub-Title Typography', 'carpento' ),
				'subtitle'      => esc_html__( 'Specify the Section Sub-Title font properties.', 'carpento' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
		)

	) );

	// -> START Headings Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Headings Typography', 'carpento' ),
		'id'     => 'headings-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			//section H1 Starts
			array(
				'id'       => 'typography-h1-h6-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Common Heading H1 to h6', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for heading H1, H2, H3, H4, H5, H6.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h1-h6',
				'type'          => 'typography',
				'title'         => esc_html__( 'Common Heading(H1 to h6) Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),



			//section H1 Starts
			array(
				'id'       => 'typography-h1-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H1', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for heading H1.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h1',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H1 Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h1-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h1-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H2 Starts
			array(
				'id'       => 'typography-h2-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H2', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for heading H2.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h2',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H2 Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h2-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h2-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H3 Starts
			array(
				'id'       => 'typography-h3-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H3', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for heading H3.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h3',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H3 Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h3-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h3-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H4 Starts
			array(
				'id'       => 'typography-h4-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H4', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for heading H4.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h4',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H4 Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h4-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h4-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H5 Starts
			array(
				'id'       => 'typography-h5-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H5', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for heading H5.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h5',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H5 Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h5-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h5-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H6 Starts
			array(
				'id'       => 'typography-h6-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H6', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for heading H6.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h6',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H6 Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h6-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h6-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),



		)
	) );

	// -> START Button Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Button Typography', 'carpento' ),
		'id'     => 'primary-button-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'button-typography-btn-default',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Default', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-default-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Default', 'carpento' ),
			),
			array(
				'id'            => 'button-typography-btn-lg',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Large', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-lg-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Large', 'carpento' ),
			),
			array(
				'id'            => 'button-typography-btn-sm',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Small', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-sm-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Small', 'carpento' ),
			),
			array(
				'id'            => 'button-typography-btn-xs',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Extra Small', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-xs-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Extra Small', 'carpento' ),
			),
		)

	) );

	// -> START Link Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Post/Page Content Link Typography', 'carpento' ),
		'id'     => 'content-link-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'link-typography-link',
				'type'          => 'typography',
				'title'         => esc_html__( 'Link Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'	   => 'link-typography-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Link Hover Color', 'carpento' ),
				'transparent' => false,
			),
		)
	) );


	// -> START Layout Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Layout Settings', 'carpento' ),
		'id'     => 'layout-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-table',
		'fields' => array(
			array(
				'id'        => 'layout-settings-page-layout',
				'type'      => 'button_set',
				'compiler'  => true,
				'title'     => esc_html__( 'Page Layout', 'carpento' ),
				'subtitle'  => esc_html__( 'Select primary page layout of your theme', 'carpento' ),
				'options'   => array(
					'boxed'        => esc_html__( 'Boxed', 'carpento' ),
					'stretched'    => esc_html__( 'Stretched', 'carpento' )
				),
				'default'   => 'stretched',
			),

			array(
				'id'       => 'layout-settings-content-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Content Width', 'carpento' ),
				'subtitle' => esc_html__( 'Select content width. You can use any width by using custom CSS', 'carpento' ),
				'options' => array(
					'container-970px'     => esc_html__( '970px', 'carpento' ),
					'container-default'   => esc_html__( '1170px (Bootstrap Default)', 'carpento' ),
					'container-elementor-default'    => esc_html__( 'Elementor Default', 'purerelax' ),
					'container-1230px'    => esc_html__( '1230px', 'carpento' ),
					'container-1300px'    => esc_html__( '1300px', 'carpento' ),
					'container-1340px'    => esc_html__( '1340px', 'carpento' ),
					'container-1440px'    => esc_html__( '1440px', 'carpento' ),
					'container-1500px'    => esc_html__( '1500px', 'carpento' ),
					'container-1600px'    => esc_html__( '1600px', 'carpento' ),
					'container-100pr'     => esc_html__( 'Fullwidth 100%', 'carpento' )
				),
				'default' => 'container-1230px',
			),
			array(
				'id'       => 'layout-settings-stretched-layout-bg-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Solid Color(Stretched Mode)', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom color for background.', 'carpento' ),
				'transparent' => false,
				'required' => array( 'layout-settings-page-layout', '=', 'stretched' ),
			),


			//section H3 Starts
			array(
				'id'       => 'layout-settings-boxed-layout-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Boxed Layout Settings', 'carpento' ),
				'subtitle' => esc_html__( 'Define styles for Boxed Layout.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'layout-settings-page-layout', '=', 'boxed' ),
			),
			array(
				'id'             => 'layout-settings-boxed-layout-padding-top-bottom',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				// Have one field that applies to all
				'top'            => true,     // Disable the top
				'right'          => false,     // Disable the right
				'bottom'         => true,     // Disable the bottom
				'left'           => false,     // Disable the left
				'units'          => 'px',
				'units_extended' => 'true',
				'display_units'  => true,   // Set to false to hide the units if the units are specified
				'title'          => esc_html__( 'Padding Top & Bottom(px)', 'carpento' ),
				'subtitle'       => esc_html__( 'Top and bottom padding in px for boxed layout.', 'carpento' ),
				'desc'           => esc_html__( 'Controls the top and bottom padding of the boxed layout. Ex: 40px, 40px. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'carpento' ),
				'default'            => array(
					'padding-top'     => '40',
					'padding-bottom'  => '40',
					'units'          => 'px',
				)
			),
			array(
				'id'       => 'layout-settings-boxed-layout-container-shadow',
				'type'     => 'switch',
				'title'    => esc_html__( 'Container Shadow?', 'carpento' ),
				'subtitle' => esc_html__( 'Add shadow around the container.', 'carpento' ),
				'default'  => 0,
				'on'       => 'On',
				'off'      => 'Off',
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Background Type', 'carpento' ),
				'subtitle' => esc_html__( 'You can use patterns, image or solid color as a background.', 'carpento' ),
				'options'	=> array(
					'bg-color'     => esc_html__( 'Solid Color', 'carpento' ),
					'bg-patter'    => esc_html__( 'Patterns from Theme Library', 'carpento' ),
					'bg-image'     => esc_html__( 'Upload Own Image', 'carpento' ),
				),
				'default'  => 'bg-color',
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Solid Color', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom color for background (default: #444).', 'carpento' ),
				'default'  => '#444',
				'transparent' => true,
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-color' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-pattern',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Patterns from Theme Library', 'carpento' ),
				'subtitle' => esc_html__( 'Select a patterns by clicking on it.', 'carpento' ),
				'desc'     => '',
				'options'	=> $sample_patterns,
				'default'  => key($sample_patterns),
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-patter' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-bgimg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background Image', 'carpento' ),
				'subtitle' => esc_html__( 'Body background image.', 'carpento' ),
				'background-color' => false,
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-image' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Header
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header', 'carpento' ),
		'id'     => 'header',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
	) );


	// -> START Header Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header', 'carpento' ),
		'id'     => 'header-layout',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-settings-choose-header-visibility',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Visibility', 'carpento' ),
				'subtitle' => esc_html__( 'Show or hide header globally', 'carpento' ),
				'default'  => 1,
				'on'       => 'Show',
				'off'      => 'Hide',
			),



			array(
				'id'        => 'header-settings-choose-header-top-cpt-elementor-info',
				'type'      => 'info',
				'title'     => esc_html__( 'Elementor Headers', 'carpento' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Header (Built with Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('You can create your own Header from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-transparent',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Floating/Transparent (Built with Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('You can create your own Header from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Sticky (Built with Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('It will be shown when you scroll down. You can create your own Header from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-mobile',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Mobile/Tab (Built with Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('It will be visible on Tab & Mobile devices only. You can create your own Header from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
		)
	) );


	// -> START Header Navigation Row
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Default Header Navigation Row', 'carpento' ),
		'id'     => 'header-navigation-layout',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(

			//Header Visibility Important
			array(
				'id'        => 'header-settings-header-navigation-info-field-important',
				'type'      => 'info',
				'title'     => esc_html__( 'Important!', 'carpento' ),
				'subtitle'  => sprintf( esc_html__( 'As you have chosen %1$sHeader Visibility%2$s to %1$sHide%2$s so there\'s nothing to show here!', 'carpento' ), '<strong>', '</strong>'),
				'notice'    => false,
				'required' => array( 'header-settings-choose-header-visibility', '!=', '1' ),
			),




			array(
				'id'       => 'header-settings-navigation-show-header-nav-row',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Default Header Navigation Row', 'carpento' ),
				'subtitle' => esc_html__( 'Enabling/Disabling this option will show/hide Whole Header Navigation Row section.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),































































			array(
				'id'       => 'header-settings-header-layout-type-container',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Header Nav Row Container', 'carpento' ),
				'subtitle' => esc_html__( 'Put Header nav content boxed or stretched fullwidth.', 'carpento' ),
				'options'	=> array(
					'container' => esc_html__( 'Container', 'carpento' ),
					'container-fluid' => esc_html__( 'Container Fluid', 'carpento' )
				),
				'default' => 'container',
			),


			array(
				'id'       => 'header-settings-header-layout-floating-bg-shadow',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Header Background Shadow (Header Floating)', 'carpento' ),
				'options'	=> array(
					'header-bg-no-shadow'		=> esc_html__( 'No Shadow', 'carpento' ),
					'header-bg-dark-shadow'		=> esc_html__( 'Dark Background Shadow', 'carpento' ),
					'header-bg-light-shadow'	=> esc_html__( 'Light Background Shadow', 'carpento' ),
				),
				'default' => 'header-bg-no-shadow',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),


			array(
				'id'       => 'header-settings-header-layout-floating-text-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Text Color (Header Floating)', 'carpento' ),
				'options'	=> array(
					'header-floating-bg-dark-text-white'	=> esc_html__( 'White Text', 'carpento' ),
					'header-floating-bg-white-text-dark'		=> esc_html__( 'Dark Text', 'carpento' ),
				),
				'default' => 'header-floating-bg-dark-text-white',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),

			array(
				'id'       => 'header-settings-header-layout-floating-bg-color-sticky',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Color (on Header Floating + Sticky)', 'carpento' ),
				'options'	=> array(
					'header-floating-sticky-bg-white'	=> esc_html__( 'White BG', 'carpento' ),
					'header-floating-sticky-bg-dark'		=> esc_html__( 'Dark BG', 'carpento' ),
				),
				'default' => 'header-floating-sticky-bg-dark',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),

			array(
				'id'       => 'header-settings-choose-header-layout-type',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Header Layout Type', 'carpento' ),
				'subtitle' => esc_html__( 'Select the type of header you would like to use', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'header-default' => array(
						'alt' => 'Header Default',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/header-layout/header-default.jpg'
					),

					'header-mobile-nav' => array(
						'alt' => 'Mobile Nav',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/header-layout/header-mobile-nav.jpg'
					),
				),
				'default'  => 'header-default',
			),































			array(
				'id'       => 'header-settings-navigation-show-header-nav-bar-fixed-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Navigation Bar Fixed/Sticky on Scroll?', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-show-header-nav-bar-always-visible-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Navigation Bar Always Visible(Fixed at the top) on Sticky?', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'header-settings-navigation-show-header-nav-bar-fixed-on-scroll', '=', '1' ),
			),

			array(
				'id'       => 'header-settings-navigation-bgcolor-use-themecolor',
				'type'     => 'select',
				'title'    => esc_html__( 'Use Theme Color in Background?', 'carpento' ),
				'subtitle' => esc_html__( 'Use theme color or custom bg color in Header Navigation Row', 'carpento' ),
				'desc'     => '',
				'options'  => mascot_core_carpento_theme_color_list(),
				'default'  => '',
			),
			array(
				'id'       => 'header-settings-navigation-custom-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Background Color', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom background color for Header Navigation Row.', 'carpento' ),
				'transparent' => true,
				'required' => array( 'header-settings-navigation-bgcolor-use-themecolor', '=', '' ),
			),



			array(
				'id'        => 'header-settings-navigation-custom-navigation-link-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Cart/Search/Side Push Icons', 'carpento' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-navigation-custom-navigation-link-n-icon-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Navigation Link and Cart/Search/Side Push Icon Color', 'carpento' ),
				'subtitle' => esc_html__( 'Pick a custom color for link and icons on Header Navigation Row.', 'carpento' ),
				'transparent' => true,
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-cart-icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Cart Icon', 'carpento' ),
				'subtitle' => esc_html__( 'Add Cart Icon on the right hand side of the menu. WooCommerce plugin needs to be installed.', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-cart-icon-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Cart Icon in Mobile Device', 'carpento' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-menu-cart-icon', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-menu-cart-icon-code',
				'type'     => 'text',
				'title'    => esc_html__( 'Cart Icon', 'carpento' ),
				'subtitle' => sprintf( esc_html__( 'You can change the search icon from here. See full list of icons from %1$shere%2$s', 'carpento' ), '<a target="_blank" href="' . esc_url( 'http://docs.kodesolution.info/icons/' ) . '">', '</a>' ),
				'desc'     => '',
				'default'  => 'lnr lnr-icon-cart1',
				'required' => array( 'header-settings-navigation-show-menu-cart-icon', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-show-menu-search-icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Search Icon', 'carpento' ),
				'subtitle' => esc_html__( 'Add Search Icon on the right hand side of the menu.', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-search-icon-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Search Icon in Mobile Device', 'carpento' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-menu-search-icon', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-menu-search-icon-code',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Icon', 'carpento' ),
				'subtitle' => sprintf( esc_html__( 'You can change the search icon from here. See full list of icons from %1$shere%2$s', 'carpento' ), '<a target="_blank" href="' . esc_url( 'http://docs.kodesolution.info/icons/' ) . '">', '</a>' ),
				'desc'     => '',
				'default'  => 'fa fa-search',
				'required' => array( 'header-settings-navigation-show-menu-search-icon', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-show-side-push-panel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Side Push Panel', 'carpento' ),
				'subtitle' => esc_html__( 'Add Side Push Icon on the right hand side of the menu to Enable/Disable Side Push Panel section. You can easily add your widgets to this section from Appearance > Widgets (Side Push Panel Sidebar)', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-side-push-panel-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Side Push Panel Icon in Mobile Device', 'carpento' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-side-push-panel', '=', '1' ),
			),


			//Header Nav - Custom Button
			array(
				'id'        => 'header-settings-navigation-custom-button-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Custom Button', 'carpento' ),
				'subtitle'  => esc_html__( 'Add Custom Button on the right hand side of the Header Navigation Row', 'carpento' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-navigation-show-custom-button',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Custom Button', 'carpento' ),
				'subtitle' => esc_html__( 'Add Custom Button on the right hand side of the Header Navigation Row.', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-custom-button-reflect-other-pages',
				'type'     => 'switch',
				'title'    => esc_html__( 'Reflect This Settings in Other Pages too?', 'carpento' ),
				'subtitle' => esc_html__( 'If you enable it then this button will be shown on other header styles chose from Page Settings.', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-info',
				'type'     => 'sortable',
				'title'    => esc_html__( 'Custom Button Info', 'carpento' ),
				'subtitle' => esc_html__( 'Enter your custom button info.', 'carpento' ),
				'desc'     => esc_html__( 'Show a custom button in the Header Navigation Row.', 'carpento' ),
				'label'    => true,
				'options'	=> array(
					'title'  => '',
					'link'   => '',
				),
				'default' => array(
					'title'  => esc_html__( 'Custom Button', 'carpento' ),
					'link'   => '#',
				),
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-design-style',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Design Style', 'carpento' ),
				'desc'     => '',
				'options'	=> array_flip( mascot_core_carpento_get_btn_design_style() ),
				'default'  => 'btn-gray',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Size', 'carpento' ),
				'desc'     => '',
				'options'	=> array_flip( mascot_core_carpento_get_button_size() ),
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-flat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Flat', 'carpento' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-outlined',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Outlined', 'carpento' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-round',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Round', 'carpento' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-link-open-in-window',
				'type'     => 'select',
				'title'    => esc_html__( 'Open Link in', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'_blank' => esc_html__( 'New Tab', 'carpento' ),
					'_self'  => esc_html__( 'Same Tab', 'carpento' ),
				),
				'default'  => '_blank',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-show-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Button in Mobile Device', 'carpento' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'carpento' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),


			array(
				'id'        => 'header-settings-navigation-color-scheme-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Navigation Color Scheme', 'carpento' ),
				'notice'    => false,
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-color-scheme',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Color Scheme', 'carpento' ),
				'subtitle' => esc_html__( 'Select the color scheme of main menu', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => esc_html__( 'Default', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/default.jpg '
					),
					'blue' => array(
						'alt' => esc_html__( 'Blue', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/blue.jpg '
					),
					'green' => array(
						'alt' => esc_html__( 'Green', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/green.jpg '
					),
					'orange' => array(
						'alt' => esc_html__( 'Orange', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/orange.jpg '
					),
					'pink' => array(
						'alt' => esc_html__( 'Pink', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/pink.jpg '
					),
					'purple' => array(
						'alt' => esc_html__( 'Purple', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/purple.jpg '
					),
					'red' => array(
						'alt' => esc_html__( 'Red', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/red.jpg '
					),
					'yellow' => array(
						'alt' => esc_html__( 'Yellow', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/yellow.jpg '
					)
				),
				'default'  => 'default',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),

			array(
				'id'       => 'header-settings-navigation-primary-effect',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Primary Effect', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'fade'  => esc_html__( 'Fade', 'carpento' ),
					'slide' => esc_html__( 'Slide', 'carpento' )
				),
				'default'  => 'slide',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-css3-animation',
				'type'     => 'button_set',
				'title'    => esc_html__( 'CSS3 Animation', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'none'      => esc_html__( 'None', 'carpento' ),
					'zoom-in'   => esc_html__( 'Zoom In', 'carpento' ),
					'zoom-out'  => esc_html__( 'Zoom Out', 'carpento' ),
					'drop-up'   => esc_html__( 'Drop Up', 'carpento' ),
					'drop-left' => esc_html__( 'Drop Left', 'carpento' ),
					'swing'     => esc_html__( 'Swing', 'carpento' ),
					'flip'      => esc_html__( 'Flip', 'carpento' ),
					'roll-in'   => esc_html__( 'Roll In', 'carpento' ),
					'stretch'   => esc_html__( 'Stretch', 'carpento' ),
				),
				'default'  => 'none',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-skin',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Navigation Skin', 'carpento' ),
				'subtitle' => esc_html__( 'Select the skin of main menu you would like to use', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => 'default',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/default.jpg'
					),
					'bottom-trace' => array(
						'alt' => 'bottom-trace',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/bottom-trace.jpg'
					),
					'rounded-boxed' => array(
						'alt' => 'rounded-boxed',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/rounded-boxed.jpg'
					),
					'boxed' => array(
						'alt' => 'boxed',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/boxed.jpg'
					),
					'border-boxed' => array(
						'alt' => 'border-boxed',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-boxed.jpg'
					),
					'top-bottom-boxed-border' => array(
						'alt' => 'top-bottom-boxed-border',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/top-bottom-boxed-border.jpg'
					),
					'border-left' => array(
						'alt' => 'border-left',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-left.jpg'
					),
					'border-top' => array(
						'alt' => 'border-top',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-top.jpg'
					),
					'border-bottom' => array(
						'alt' => 'border-bottom',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-bottom.jpg'
					),
					'border-top-bottom' => array(
						'alt' => 'border-top-bottom',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-top-bottom.jpg'
					),
				),
				'default'  => 'default',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),


		)
	) );


	// -> START Header Navigation Skin Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Nav Typography', 'carpento' ),
		'id'     => 'header-header-navigation-skin-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(


			//Header Nav - Navigation Skin
			array(
				'id'        => 'header-settings-navigation-skin-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Navigation Skin', 'carpento' ),
				'subtitle'  => esc_html__( 'Select the skin of main menu you would like to use', 'carpento' ),
				'notice'    => false,
				'required'  => array(
					array( 'header-settings-show-header-top', '=', '1' )
				)
			),
			array(
				'id'            => 'header-settings-navigation-item-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Items Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Main Nav Items Hover/Active Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'            => 'header-settings-navigation-item-dropdown-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Dropdown Items Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-dropdown-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Dropdown Items Hover/Active Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
			),


			array(
				'id'            => 'header-settings-navigation-skin-dropdown-menu-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Dropdown Menu Width(px)', 'carpento' ),
				'subtitle'      => esc_html__( 'Enter width of dropdown menu in px.', 'carpento' ),
				'desc'          => '',
				'default'       => 260,
				'min'           => 150,
				'step'          => 1,
				'max'           => 400,
				'display_value' => 'text',
			),



			array(
				'id'            => 'header-settings-navigation-item-megamenu-dropdown-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Megamenu Items Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-megamenu-dropdown-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Megamenu Items Hover/Active Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'            => 'header-settings-navigation-item-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Main Nav Items Padding(px) Around it', 'carpento' ),
			),
		)
	) );





	// -> START Header Menu Megamenu
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Megamenu', 'carpento' ),
		'id'     => 'header-menu-megamenu',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-menu',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-menu-megamenu-enable-megamenu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mega Menu', 'carpento' ),
				'subtitle' => sprintf( esc_html__( 'Turn on to enable mega menu. After enabling mega menu, you will get a lot of options for mega menu at %1$sAppearance > Menus%2$s', 'carpento' ), '<strong>', '</strong>'),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
		)
	) );




	// -> START Page Title Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Page Title', 'carpento' ),
		'id'     => 'page-title-settings',
		'desc'   => esc_html__( 'Enable/Disable Page Title Area for posts and pages.', 'carpento' ),
		'icon'   => 'dashicons-before dashicons-archive',
		'fields' => array(
			array(
				'id'       => 'page-title-settings-enable-page-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Page Title', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'page-title-settings-choose-page-title-cpt-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Page Title (Built with Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('It will be shown at the top of the page under header. You can create your own one from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=page-title').'" target="_blank">Dashboard > Parts - Page Title</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'page-title' ),
					'posts_per_page' => -1,
				),
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-default-page-title-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Or Enable Default Page Title', 'carpento' ),
				'indent'   => true,
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-default-page-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Default Page Title', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Page Title Layout', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'standard' => array(
						'alt' => 'standard',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/footer/f11.jpg'
					),
					'split' => array(
						'alt' => 'split',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/footer/f7.jpg'
					),
				),
				'default'  => 'standard',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-container',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Title Area Container', 'carpento' ),
				'subtitle' => esc_html__( 'Put Page Title content into boxed or stretched fullwidth.', 'carpento' ),
				'options'	=> array(
					'container' => esc_html__( 'Container', 'carpento' ),
					'container-fluid' => esc_html__( 'Container Fluid', 'carpento' )
				),
				'default' => 'container',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-custom-padding-top-bottom',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Custom Padding Top & Bottom into Page Title Area', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'             => 'page-title-settings-container-padding-top-bottom',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				// Have one field that applies to all
				'top'            => true,     // Disable the top
				'right'          => false,     // Disable the right
				'bottom'         => true,     // Disable the bottom
				'left'           => false,     // Disable the left
				'units'          => 'px',
				'units_extended' => 'true',
				'display_units'  => true,   // Set to false to hide the units if the units are specified
				'title'          => esc_html__( 'Padding Top & Bottom(px)', 'carpento' ),
				'subtitle'       => esc_html__( 'Top and bottom padding in px of page title container.', 'carpento' ),
				'desc'           => esc_html__( 'Controls the top and bottom padding of page title. Ex: 80px, 80px. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'carpento' ),
				'default'            => array(
					'padding-top'     => '80',
					'padding-bottom'  => '80',
					'units'          => 'px',
				),
				'required' => array( 'page-title-settings-enable-custom-padding-top-bottom', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Title', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disable title on Page Title Area. It is possible to disable them individually using page meta settings.', 'carpento' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-subtitle',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Subtitle', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disable Sub title on Page Title Area. It is possible to disable them individually using page meta settings.', 'carpento' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-breadcrumbs',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Breadcrumbs', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disable breadcrumbs on Page Title. It is possible to disable them individually using page meta settings.', 'carpento' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-height',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Area Height', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'select2' => array( array( 'minimumResultsForSearch' => 'Infinity' ) ),
				'options'	=> array(
					'padding-default'       => esc_html__( 'Default', 'carpento' ),
					'padding-extra-small'   => esc_html__( 'Extra Small', 'carpento' ),
					'padding-small'         => esc_html__( 'Small', 'carpento' ),
					'padding-medium'        => esc_html__( 'Medium', 'carpento' ),
					'padding-large'         => esc_html__( 'Large', 'carpento' ),
					'padding-extra-large'   => esc_html__( 'Extra Large', 'carpento' ),
				),
				'default'  => 'padding-medium',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-text-color',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Default Text Color', 'carpento' ),
				'desc'     => '',
				'subtitle' => esc_html__( 'Select default text color. Inverted will turn font color to black. Inverted is suitable for white background.', 'carpento' ),
				'options'	=> array(
					'text-default'   => esc_html__( 'Default (Text White)', 'carpento' ),
					'text-inverted'  => esc_html__( 'Inverted (Text Black)', 'carpento' )
				),
				'default' => 'text-default',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Alignment', 'carpento' ),
				'subtitle' => esc_html__( 'Text Alignment of Page Title', 'carpento' ),
				'desc'     => '',
				'options'	=> carpento_redux_text_alignment_list(),
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-top-border-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Title Area Top Border Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-bottom-border-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Title Area Bottom Border Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),


			//Page Title background
			array(
				'id'       => 'page-title-settings-bg-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Title Background', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg',
				'type'     => 'background',
				'title'    => esc_html__( 'Page Title Background', 'carpento' ),
				'subtitle' => esc_html__( 'Choose background image or color.', 'carpento' ),
				'default'  => array(
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => '',
					'background-position'   => 'center center',
				),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Page Title Background Overlay', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'carpento' ),
				'subtitle'      => esc_html__( 'Overlay on background image on Page Title.', 'carpento' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'carpento' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'carpento' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'carpento' ),
					'dark'          => esc_html__( 'Dark', 'carpento' ),
					'white'         => esc_html__( 'White', 'carpento' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'carpento' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'carpento' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'carpento' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'carpento' )
				),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-layer-overlay-status', '=', '1' )
				)
			),

			//background video
			array(
				'id'       => 'page-title-settings-bg-video-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Background Video', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-type',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Video Type', 'carpento' ),
				'subtitle' => '',
				'options' => array(
					'youtube' => esc_html__( 'Youtube', 'carpento' ),
					'self-hosted' => esc_html__( 'Self Hosted Video', 'carpento' )
				),
				'default' => 'youtube',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-youtube-id',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube Video ID', 'carpento' ),
				'subtitle'    => esc_html__( 'Only put video ID not the whole URL.', 'carpento' ),
				'desc'     => '',
				'placeholder'    => esc_html__( 'Example: E5ln4uR4TwQ', 'carpento' ),
				'default' => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'youtube' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-video-poster',
				'type'     => 'media',
				'title'    => esc_html__( 'Video Poster', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-mp4-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'MP4 Video URL', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'mp4', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-webm-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'WEBM Video URL', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'webm', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-ogv-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'OGV Video URL', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'false', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-section-ends',
				'type'     => 'section',
				'title'    => '',
				'subtitle' => '',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
				)
			),



			//animation
			array(
				'id'       => 'page-title-settings-title-animation-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Animation Effect', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-title-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Animation Effect', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_carpento_animate_css_animation_list(),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-animation-duration',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Animation Duration', 'carpento' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Change the animation duration. Example: 1500ms or 1.5s or 0.5s etc. Default 0.5s.', 'carpento' ),
				'placeholder' => esc_html__( '1.5s', 'carpento' ),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-subtitle-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Sub Title Animation Effect', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_carpento_animate_css_animation_list(),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-subtitle-animation-duration',
				'type'     => 'text',
				'title'    => esc_html__( 'Sub Title Animation Duration', 'carpento' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Change the animation duration. Example: 1500ms or 1.5s or 0.5s etc. Default 0.5s.', 'carpento' ),
				'placeholder' => esc_html__( '1.5s', 'carpento' ),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-animation-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),



			//section Typography Starts
			array(
				'id'       => 'page-title-settings-title-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Typography', 'carpento' ),
				'subtitle' => esc_html__( 'Define text and styles for Title.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'carpento' ),
				'subtitle' => esc_html__( 'Choose title element tag', 'carpento' ),
				'desc'     => '',
				'options'	=> mascot_core_carpento_heading_tag_list_all(),
				'default'  => 'h1',
			),
			array(
				'id'            => 'page-title-settings-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Title Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-title-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Title Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'page-title-settings-subtitle-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Subtitle Tag', 'carpento' ),
				'subtitle' => esc_html__( 'Choose subtitle element tag', 'carpento' ),
				'desc'     => '',
				'options'	=> mascot_core_carpento_heading_tag_list_all(),
				'default'  => 'h6',
			),
			array(
				'id'            => 'page-title-settings-subtitle-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Sub Title Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-subtitle-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Sub Title Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'            => 'page-title-settings-breadcrumbs-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Breadcrumbs Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-last-child-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Last Child Text Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-seperator-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Seperator Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Link Hover/Active Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-title-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Footer
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer', 'carpento' ),
		'id'     => 'footer',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-down-alt',
	) );

	// -> START Footer Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer Settings', 'carpento' ),
		'id'     => 'footer-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-down-alt2',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'footer-settings-footer-visibility',
				'type'     => 'switch',
				'title'    => esc_html__( 'Footer Visibility', 'carpento' ),
				'subtitle' => esc_html__( 'Show or hide footer globally', 'carpento' ),
				'default'  => 1,
				'on'       => 'Show',
				'off'      => 'Hide',
			),
			array(
				'id'       => 'footer-settings-enable-default-footer',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Default Footer Widgets(Not Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('You can customize footer widgets from here %s', 'carpento'), '<a href="'.admin_url('widgets.php').'" target="_blank">Appearance > Widgets</a>'),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'footer-settings-choose-footer-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Or Choose Custom Made Footer (Built with Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('You can create your own footer from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=footer').'" target="_blank">Dashboard > Parts - Footer</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'footer' ),
					'posts_per_page' => -1,
				),
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Footer Background Color', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the background color of Footer.', 'carpento' ),
				'transparent' => false,
			),





			array(
				'id'        => 'footer-settings-footer-top-typography',
				'type'      => 'info',
				'title'     => esc_html__( 'Typography', 'carpento' ),
				'notice'    => false,
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'            => 'footer-settings-footer-top-widget-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Title Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),


			array(
				'id'       => 'footer-settings-footer-widget-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom Under Widget Title', 'carpento' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'carpento' ),
				'desc'     => '',
				'default'  => '1',
			),
			array(
				'id'       => 'footer-settings-footer-widget-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'carpento' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'carpento' ),
				'desc'     => '',
				'options'  => mascot_core_carpento_theme_color_list(),
				'default'  => '1',
				'required' => array( 'footer-settings-footer-widget-title-show-line-bottom', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-widget-title-line-bottom-custom-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Line Bottom Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'footer-settings-footer-widget-title-line-bottom-theme-colored', '=', '' ),
			),


			array(
				'id'            => 'footer-settings-footer-top-widget-text-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Text Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'            => 'footer-settings-footer-top-widget-link-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Link Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-top-widget-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Widget Link Hover/Active Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),

		)
	) );




	// -> START Blog Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Blog', 'carpento' ),
		'id'     => 'blog-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-media-document',
	) );



	// -> START Blog Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Blog Archive Page', 'carpento' ),
		'id'     => 'blog-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-settings-archive-page-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Blog Post Layout for Archive Pages', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a default layout for archive pages', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'standard-1-col' => 'Standard 1 Column Default',
					'standard-1-col-classic' => 'Standard 1 Column Classic',
					'standard-2-col' => 'Standard 2 Columns',
					'standard-3-col' => 'Standard 3 Columns',
					'standard-4-col' => 'Standard 4 Columns',
					'masonry-2-col'  => 'Masonry 2 Columns',
					'masonry-3-col'  => 'Masonry 3 Columns',
					'masonry-4-col'  => 'Masonry 4 Columns',
				),
				'default'  => 'masonry-2-col',
			),
			array(
				'id'       => 'blog-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'carpento' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'carpento' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'carpento' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'carpento' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'carpento' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'carpento' ),
				),
				'default'  => 'sidebar-right-33',
			),


			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Blog Default Sidebar', 'carpento' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on blog archive pages.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'default-sidebar',
				'required' => array( 'blog-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Blog Sidebar 2', 'carpento' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on blog archive pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'blog-secondary-sidebar',
				'required' => array( 'blog-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Blog Sidebar 2 - Position', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'carpento' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'carpento' ),
					'right'     => esc_html__( 'Right', 'carpento' )
				),
				'default'  => 'right',
				'required' => array( 'blog-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),


			array(
				'id'       => 'blog-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'carpento' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'            => 'blog-settings-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'carpento' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'carpento' ),
				'desc'          => '',
				'default'       => 22,
				'min'           => 0,
				'step'          => 1,
				'max'           => 500,
				'display_value' => 'text',
			),
			array(
				'id'       => 'blog-settings-show-post-featured-image',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Featured Image', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Featured Image in blog page.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-settings-post-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'carpento' ),
				'subtitle' => esc_html__( 'Featured image size in blog page.', 'carpento' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'carpento_featured_image',
				'required' => array( 'blog-settings-show-post-featured-image', '=', '1' ),
			),
			array(
				'id'       => 'blog-settings-post-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Post Meta', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide each Post Meta on your page.', 'carpento' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'carpento' ),
					'show-post-date'            => esc_html__( 'Show Date', 'carpento' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'carpento' ),
					'show-post-category'        => esc_html__( 'Show Category', 'carpento' ),
					'show-post-comments-count'  => esc_html__( 'Show Comments Count', 'carpento' ),
					'show-post-tag'             => esc_html__( 'Show Tag', 'carpento' ),
					'show-post-like-button'     => esc_html__( 'Show Like Button', 'carpento' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '1',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-comments-count' => '0',
					'show-post-tag' => '0',
					'show-post-like-button' => '0'
				)
			),
			array(
				'id'       => 'blog-settings-show-pagination',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Pagination', 'carpento' ),
				'subtitle' => esc_html__( 'Enabling this option will show comments on your page.', 'carpento' ),
				'default'  => true,
			),
		)
	) );



	// -> START Single Post Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Single Post', 'carpento' ),
		'id'     => 'blog-single-post-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-single-post-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'carpento' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'carpento' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'carpento' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'carpento' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'carpento' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'carpento' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'carpento' ),
				),
				'default'  => 'sidebar-right-33',
			),



			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Sidebar', 'carpento' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on blog single pages.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'default-sidebar',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar 2', 'carpento' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on blog single pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'blog-secondary-sidebar',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar 2 - Position', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'carpento' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'carpento' ),
					'right'     => esc_html__( 'Right', 'carpento' )
				),
				'default'  => 'right',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),



			array(
				'id'       => 'blog-single-post-settings-show-post-featured-image',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Featured Image', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Featured Image in blog page.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'            => 'blog-single-post-settings-featured-image-height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Featured Image Height(px)', 'carpento' ),
				'subtitle'      => esc_html__( 'Set height for featured image displayed on your blog single page.', 'carpento' ),
				'desc'          => '',
				'default'       => 600,
				'min'           => 0,
				'step'          => 1,
				'max'           => 1200,
				'display_value' => 'text',
			),
			array(
				'id'       => 'blog-single-post-settings-enable-drop-caps',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Drop Caps', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling Drop Caps for the first letter of post content.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-single-post-settings-post-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Post Meta', 'carpento' ),
				'subtitle'     => esc_html__( 'Enable/Disabling this option will show/hide each Post Meta on your page.', 'carpento' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'carpento' ),
					'show-post-date'            => esc_html__( 'Show Date', 'carpento' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'carpento' ),
					'show-post-category'        => esc_html__( 'Show Category', 'carpento' ),
					'show-post-comments-count'  => esc_html__( 'Show Comments Count', 'carpento' ),
					'show-post-like-button'     => esc_html__( 'Show Like Button', 'carpento' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '1',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-comments-count' => '1',
					'show-post-like-button' => '0'
				)
			),
			array(
				'id'       => 'blog-single-post-settings-show-tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Tags', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide tags on your page.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),


			//section Next/Previous Navigation Link Starts
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Next/Previous Navigation Link', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Next/Previous Single Post Navigation Link', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link for Next & Previous Posts.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-within-same-cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation Link Within Same Category', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link to the next/previous post within the same category as the current post.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'blog-single-post-settings-show-next-pre-post-link', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section Author Info Box
			array(
				'id'       => 'blog-single-post-settings-author-info-box-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Author Info Box', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author Info Box', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Author Info Box on your page.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-show-social-icons',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Icons', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'blog-single-post-settings-author-info-box', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-show-author-email',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author Email', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'blog-single-post-settings-author-info-box', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Related Posts Starts
			array(
				'id'       => 'blog-single-post-settings-related-posts-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Related Posts', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Posts List/Carousel on your page.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Posts', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts-carousel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Carousel?', 'carpento' ),
				'subtitle' => esc_html__( 'Make it carousel or grid', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts-count',
				'type'     => 'text',
				'title'    => esc_html__( 'Number of Posts', 'carpento' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Enter number of posts to display. Default 3', 'carpento' ),
				'default'  => '3',
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-related-posts-show-excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Excerpt', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'            => 'blog-single-post-settings-show-related-posts-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'carpento' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'carpento' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'blog-single-post-settings-show-related-posts-excerpt', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-related-posts-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),



			//section Show Comments Starts
			array(
				'id'       => 'blog-single-post-settings-comments-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Comments', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Comments on your page.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comments', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-single-post-settings-comments-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),

		)
	) );



	// -> START Single Post Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Other Settings', 'carpento' ),
		'id'     => 'blog-other-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-other-settings-show-blog-title-description',
				'type'     => 'switch',
				'title'    => esc_html__( 'Custom Blog Title & Description', 'carpento' ),
				'subtitle' => esc_html__( 'Add title and description in title section of blog page', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'blog-other-settings-blog-title-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Title Text', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'News', 'carpento' ),
				'required' => array( 'blog-other-settings-show-blog-title-description', '=', '1' ),
			),
			array(
				'id'       => 'blog-other-settings-blog-description-text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Blog Description Text', 'carpento' ),
				'desc'     => '',
				'default'  => '',
				'required' => array( 'blog-other-settings-show-blog-title-description', '=', '1' ),
			)
		)
	) );




	// -> START Shop Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Woocommerce Shop', 'carpento' ),
		'id'     => 'shop-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-cart',
	) );



	// -> START Shop Archive Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Shop Archive/Category Layout', 'carpento' ),
		'id'     => 'shop-archive-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'shop-archive-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'carpento' ),
				'subtitle' => esc_html__( 'Make the shop page fullwidth or not.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar Position', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the position of shop sidebar.', 'carpento' ),
				'options'	=> array(
					'left'          => esc_html__( 'Left', 'carpento' ),
					'right'         => esc_html__( 'Right', 'carpento' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'carpento' )
				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for shop page', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'3'      => esc_html__( 'Sidebar 1/4', 'carpento' ),
					'4'      => esc_html__( 'Sidebar 1/3', 'carpento' ),
				),
				'default'  => '4',
				'required' => array( 'shop-archive-settings-sidebar-position', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-choose',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Sidebar', 'carpento' ),
				'subtitle' => esc_html__( 'Choose sidebar that will be displayed on shop page.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'shop_sidebar',
				'required' => array( 'shop-archive-settings-sidebar-position', '!=', 'no-sidebar' ),
			),




			array(
				'id'       => 'shop-layout-settings-select-shop-catalog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Shop Catalog Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Select the type of layout you would like to display.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => 'Default',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/shop/type/default.png'
					),
					'classic' => array(
						'alt' => 'Classic',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/shop/type/classic.png'
					),
				),
				'default'  => 'default'
			),

			array(
				'id'       => 'shop-layout-settings-select-shop-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Shop Layout Mode (FitRows Or Masonry)', 'carpento' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/shop/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/shop/layout-mode/masonry.png'
					),
				),
				'default'  => 'fitrows'
			),


			array(
				'id'       => 'shop-archive-settings-products-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Products Per Row', 'carpento' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your shop items.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '4',
			),
			array(
				'id'            => 'shop-archive-settings-products-per-page',
				'type'          => 'slider',
				'title'         => esc_html__( 'Number of Products Per Page', 'carpento' ),
				'subtitle'      => esc_html__( 'Controls the number of items to display on shop archive pages. Set to -1 to display all. Set to 0 to use the number of posts from Settings > Reading.', 'carpento' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => -1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
			),
			array(
				'id'            => 'shop-archive-settings-products-per-page-dropdown-options',
				'type'          => 'text',
				'title'         => esc_html__( 'WooCommerce Products Per Page Dropdown', 'carpento' ),
				'subtitle'      => esc_html__( 'List of options products per page to show into the select dropdown menu.', 'carpento' ),
				'desc'         => esc_html__( 'Seperated by spaces', 'carpento' ),
				'default'       => '8 16 32 64',
			),
			array(
				'id'            => 'shop-archive-settings-gutter-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Shop Column Spacing (Gutter Size) px', 'carpento' ),
				'subtitle'      => esc_html__( 'Controls column spacing or gutter size between items on shop archive pages.', 'carpento' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 250,
				'display_value' => 'text',
			),
			array(
				'id'       => 'shop-archive-settings-products-thumb-type',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Thumbnail Type', 'carpento' ),
				'subtitle'    => esc_html__( 'Select your preferred style for your WooCommmerce product thumbnail.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'image-featured'  => 'Featured Image',
					'image-swap'  => 'Image Swap',
					'image-gallery'  => 'Gallery Images',
				),
				'default'  => 'image-swap',
			),
		)
	) );



	// -> START Shop Single Product Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Shop Single Product', 'carpento' ),
		'id'     => 'shop-single-product-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'shop-single-product-settings-enable-page-title',
				'type'     => 'select',
				'title'    => esc_html__( 'Enable Shop Single Page Title', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'default'     => esc_html__( 'Default', 'carpento' ),
					'yes'     => esc_html__( 'Yes', 'carpento' ),
					'no'    => esc_html__( 'No', 'carpento' ),
				),
				'default'  => 'default',
			),
			array(
				'id'       => 'shop-single-product-settings-custom-page-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Custom Shop Single Page Title', 'carpento' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as page title of product details page', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'Shop', 'carpento' ),
			),
			array(
				'id'       => 'shop-single-product-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'carpento' ),
				'subtitle' => esc_html__( 'Make the single product page fullwidth or not.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'shop-single-product-settings-sidebar-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar Position', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the sidebar position of shop single product page.', 'carpento' ),
				'options'	=> array(
					'left'          => esc_html__( 'Left', 'carpento' ),
					'right'         => esc_html__( 'Right', 'carpento' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'carpento' )
				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'shop-single-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for shop page', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'3'      => esc_html__( 'Sidebar 1/4', 'carpento' ),
					'4'      => esc_html__( 'Sidebar 1/3', 'carpento' ),
				),
				'default'  => '4',
				'required' => array( 'shop-single-product-settings-sidebar-position', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'shop-single-product-settings-sidebar-choose',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Sidebar', 'carpento' ),
				'subtitle' => esc_html__( 'Choose sidebar that will be displayed on shop page.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'shop_sidebar',
				'required' => array( 'shop-single-product-settings-sidebar-position', '!=', 'no-sidebar' ),
			),



			array(
				'id'       => 'shop-single-product-settings-select-single-catalog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Product Details Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Select the type of layout you would like to display.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'image-with-thumb' => array(
						'alt' => 'image-with-thumb',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/shop/single-layout/image-with-thumb.png'
					),
					'plain-image' => array(
						'alt' => 'plain-image',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/shop/single-layout/plain-image.png'
					),
					'sticky-side-text' => array(
						'alt' => 'sticky-side-text',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/shop/single-layout/sticky-side-text.png'
					),
				),
				'default'  => 'image-with-thumb'
			),



			array(
				'id'       => 'shop-single-product-settings-product-images-column-width',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Images Column Width', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'4'     => esc_html__( 'Small - 4/12', 'carpento' ),
					'5'     => esc_html__( 'Medium - 5/12', 'carpento' ),
					'6'     => esc_html__( 'Large - 6/12', 'carpento' ),
					'8'     => esc_html__( 'Extra Large - 8/12', 'carpento' ),
				),
				'default'  => '6',
			),
			array(
				'id'       => 'shop-single-product-settings-product-images-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Images Alignment', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'left'     => esc_html__( 'Left', 'carpento' ),
					'right'    => esc_html__( 'Right', 'carpento' ),
				),
				'default'  => 'left',
			),

			array(
				'id'       => 'shop-single-product-settings-enable-gallery-slider',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Slider Feature', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'shop-single-product-settings-select-single-catalog-layout', '=', 'image-with-thumb' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Lightbox Feature', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-gallery-zoom',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Zoom Feature', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),



			array(
				'id'       => 'shop-single-product-settings-show-product-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Product Title', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'shop-single-product-settings-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Single Product Title Tag', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_carpento_heading_tag_list_all(),
				'default'  => 'h3',
			),
			array(
				'id'       => 'shop-single-product-settings-enable-product-meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Product Meta', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sharing', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),


			//section Related Posts Starts
			array(
				'id'       => 'shop-single-product-settings-related-products-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Related Products', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Products List/Carousel on your page.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'shop-single-product-settings-related-products-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Related Products Columns', 'carpento' ),
				'subtitle' => esc_html__( 'Set number of columns for related and upsells products only', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '4',
			),
			array(
				'id'            => 'shop-single-product-settings-related-products-count',
				'type'          => 'text',
				'title'         => esc_html__( 'Related Products Count', 'carpento' ),
				'subtitle'      => esc_html__( 'Number of related products shown on single product page. Enter "0" to disable.', 'carpento' ),
				'default'       => '4',
			),

			array(
				'id'       => 'shop-single-product-settings-related-products-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START WooCommerce Styling Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'WooCommerce Styling', 'carpento' ),
		'id'     => 'woocommerce-styling-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'woocommerce-styling-product-price-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Product Price Color', 'carpento' ),
				'subtitle' => esc_html__( 'Select your custom color for product price.', 'carpento' ),
				'transparent' => false,
			),
			array(
				'id'       => 'woocommerce-styling-product-on-sale-tag-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'On Sale Tag Background Color', 'carpento' ),
				'subtitle' => esc_html__( 'Select your custom background color for on-sale tag.', 'carpento' ),
				'transparent' => true,
			),
		)
	) );



	// -> START Side Push Panel Sidebar
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Side Push Panel Sidebar', 'carpento' ),
		'id'     => 'header-side-push-panel-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-menu-alt2',
		'fields' => array(


			array(
				'id'       => 'header-settings-choose-side-push-panel-cpt-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Pre Made Side Push Panel Area (Built with Elementor)', 'carpento' ),
				'subtitle' => sprintf(esc_html__('You can create your own one from %s', 'carpento'), '<a href="'.admin_url('edit.php?post_type=side-push-panel').'" target="_blank">Dashboard > Parts - Side Push Panel</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'side-push-panel' ),
					'posts_per_page' => -1,
				),
			),

			array(
				'id'       		=> 'header-settings-navigation-side-push-panel-width',
				'type'          => 'slider',
				'title'    		=> esc_html__( 'Side Push Panel Width', 'carpento' ),
				'subtitle' 		=> esc_html__( 'Default: 380px', 'carpento' ),
				'desc'          => '',
				'default'       => 380,
				'min'           => 100,
				'step'          => 1,
				'max'           => 1000,
				'display_value' => 'text',
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-bgimg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background of Side Push Panel', 'carpento' ),
				'default'  => array(
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => '',
					'background-position'   => 'left bottom',
					'background-image'      => '',
				),
			),

			array(
				'id'       => 'header-settings-navigation-side-push-panel-center-content',
				'type'     => 'switch',
				'title'    => esc_html__( 'Center Content', 'carpento' ),
				'subtitle' => esc_html__( 'Center the content of Side Push Panel area.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),

			array(
				'id'       => 'header-settings-navigation-side-push-panel-widget-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom Under Widget Title', 'carpento' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'carpento' ),
				'desc'     => '',
				'default'  => '0',
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-widget-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'carpento' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'carpento' ),
				'desc'     => '',
				'options'  => mascot_core_carpento_theme_color_list(),
				'default'  => '1',
				'required' => array( 'header-settings-navigation-side-push-panel-widget-title-show-line-bottom', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Background Overlay', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'carpento' ),
				'subtitle'      => esc_html__( 'Overlay on background image.', 'carpento' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( 'header-settings-navigation-side-push-panel-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'carpento' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'carpento' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'carpento' ),
					'dark'          => esc_html__( 'Dark', 'carpento' ),
					'white'         => esc_html__( 'White', 'carpento' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'carpento' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'carpento' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'carpento' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'carpento' )
				),
				'default' => 'white',
			),



		)
	) );



	// -> START Page Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Page', 'carpento' ),
		'id'     => 'page-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-media-default',
		'fields' => array(
			array(
				'id'       => 'page-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'carpento' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'carpento' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'carpento' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'carpento' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'carpento' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'carpento' ),

				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Default Sidebar', 'carpento' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on pages.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'page-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Sidebar 2', 'carpento' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Page Sidebar 2 - Position', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'carpento' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'carpento' ),
					'right'     => esc_html__( 'Right', 'carpento' )
				),
				'default'  => 'right',
				'required' => array( 'page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'page-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Page Comments', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disable comments on all pages except the post pages. It is possible to disable them individually using page meta settings.', 'carpento' ),
				'default'  => true,
			),
			array(
				'id'       => 'page-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
		)
	) );



	// -> START Preloader Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Preloader', 'carpento' ),
		'id'     => 'preloader-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-clock',
		'fields' => array(
			array(
				'id'       => 'general-settings-enable-page-preloader-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Preloader Settings', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disable Page Preloader.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'general-settings-enable-page-preloader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Page Preloader', 'carpento' ),
				'subtitle' => esc_html__( 'Enabling this option will show page preloader.', 'carpento' ),
				'default'  => false,
			),
			array(
				'id'        => 'general-settings-page-preloading-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Preloading Text', 'carpento' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as Preloader Text.', 'carpento' ),
				'desc'     => '',
				'default'    => esc_html__( 'Loading', 'carpento' ),
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'            => 'general-settings-page-preloading-text-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Preloading Text Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-page-preloading-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Preloading Text Color', 'carpento' ),
				'transparent' => false,
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type',
				'type'      => 'button_set',
				'compiler'  => true,
				'title'     => esc_html__( 'Page Preloader Image Type', 'carpento' ),
				'subtitle'  => esc_html__( 'Select preloader type', 'carpento' ),
				'options'   => array(
					'upload-preloader'    => esc_html__( 'Upload Gif', 'carpento' ),
					'css-preloader'    => esc_html__( 'CSS Preloader', 'carpento' ),
					'gif-preloader'    => esc_html__( 'Predefined Gif Preloader', 'carpento' ),
				),
				'default'   => 'css-preloader',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-page-preloading-image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Upload Gif Preloading Image', 'carpento' ),
				'subtitle' => esc_html__( 'Upload/choose preloader image', 'carpento' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => CARPENTO_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'            => 'general-settings-page-preloading-image-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Image Width(px)', 'carpento' ),
				'subtitle'      => esc_html__( 'Enter maximum image width in px.', 'carpento' ),
				'desc'          => '',
				'default'       => 100,
				'min'           => 20,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloading-image-animate',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Animate Preloading Image', 'carpento' ),
				'desc'     => '',
				'default'  => '1',
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type-css',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose CSS Preloader', 'carpento' ),
				'subtitle' => esc_html__( 'Choose Predefined CSS Preloader.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'preloader-bubblingG'           => esc_html__( 'Bubbling', 'carpento' ),
					'preloader-circle-loading-wrapper' => esc_html__( 'Circle Loading', 'carpento' ),
					'preloader-coffee'              => esc_html__( 'Coffee', 'carpento' ),
					'preloader-battery'             => esc_html__( 'Battery', 'carpento' ),
					'preloader-dot-circle-rotator'  => esc_html__( 'Dot Circle Rotator', 'carpento' ),
					'preloader-dot-loading'         => esc_html__( 'Dot Loading', 'carpento' ),
					'preloader-double-torus'        => esc_html__( 'Double Torus', 'carpento' ),
					'preloader-equalizer'           => esc_html__( 'Equalizer', 'carpento' ),
					'preloader-floating-circles'    => esc_html__( 'Floating Circles', 'carpento' ),
					'preloader-fountainTextG'       => esc_html__( 'Fountain Text', 'carpento' ),
					'preloader-jackhammer'          => esc_html__( 'Jackhammer', 'carpento' ),
					'preloader-loading-wrapper'     => esc_html__( 'Loading', 'carpento' ),
					'preloader-orbit-loading'       => esc_html__( 'Orbit Loading', 'carpento' ),
					'preloader-speeding-wheel'      => esc_html__( 'Speeding Wheel', 'carpento' ),
					'preloader-square-swapping'     => esc_html__( 'Square Swapping', 'carpento' ),
					'preloader-tube-tunnel'         => esc_html__( 'Tube Tunnel', 'carpento' ),
					'preloader-whirlpool'           => esc_html__( 'Whirlpool', 'carpento' ),
				),
				'default'  => 'preloader-dot-loading',
				'required' => array( 'general-settings-page-preloader-type', '=', 'css-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type-gif',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Gif Icon Preloader', 'carpento' ),
				'subtitle' => esc_html__( 'Choose Predefined Gif Icon Preloader.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/1.gif'  =>  'preloader-1',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/2.gif'  =>  'preloader-2',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/3.gif'  =>  'preloader-3',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/4.gif'  =>  'preloader-4',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/5.gif'  =>  'preloader-5',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/6.gif'  =>  'preloader-6',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/7.gif'  =>  'preloader-7',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/8.gif'  =>  'preloader-8',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/9.gif'  =>  'preloader-9',
					CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/10.gif' =>  'preloader-10',
				),
				'default'  => CARPENTO_ADMIN_ASSETS_URI . '/images/preloaders/1.gif',
				'required' => array( 'general-settings-page-preloader-type', '=', 'gif-preloader' ),
			),
			array(
				'id'       => 'general-settings-page-preloader-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Preloader Whole Background Color', 'carpento' ),
				'transparent' => false,
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-show-disable-button',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Disable Preloader Button', 'carpento' ),
				'subtitle'    => esc_html__( 'Show Disable Preloader Button at the corner of the screen.', 'carpento' ),
				'desc'     => '',
				'default'  => '1',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-show-disable-button-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Disable Preloader Button Text', 'carpento' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared into the Disable Preloader Button.', 'carpento' ),
				'desc'     => '',
				'default'    => esc_html__( 'Disable Preloader', 'carpento' ),
				'required' => array( 'general-settings-page-preloader-show-disable-button', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-enable-page-preloader-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Portfolio Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio', 'carpento' ),
		'id'     => 'portfolio-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-format-gallery',
	) );



	// -> START Portfolio Layout Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio Archive Layout', 'carpento' ),
		'id'     => 'portfolio-layout-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'portfolio-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for portfolio pages', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'carpento' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'carpento' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'carpento' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'carpento' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'carpento' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'carpento' ),

				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Default Sidebar', 'carpento' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on portfolio pages.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'portfolio-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Sidebar 2', 'carpento' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on portfolio pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'portfolio-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Portfolio Sidebar 2 - Position', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'carpento' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'carpento' ),
					'right'     => esc_html__( 'Right', 'carpento' )
				),
				'default'  => 'right',
				'required' => array( 'portfolio-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),




			array(
				'id'       => 'portfolio-layout-settings-select-portfolio-design-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Design Style', 'carpento' ),
				'subtitle' => esc_html__( 'Select the type of portfolio you would like to display.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'portfolio-style2-simple' => array(
						'alt' => 'Default',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio/type/default.png'
					),
				),
				'default'  => 'portfolio-style2-simple'
			),

			array(
				'id'       => 'portfolio-layout-settings-select-portfolio-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Layout Mode (FitRows Or Masonry)', 'carpento' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry'
			),


			array(
				'id'       => 'portfolio-layout-settings-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Portfolio Items Per Row', 'carpento' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your portfolio items.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
			),
			array(
				'id'            => 'portfolio-layout-settings-items-per-page',
				'type'          => 'slider',
				'title'         => esc_html__( 'Number of Portfolio Items Per Page', 'carpento' ),
				'subtitle'      => esc_html__( 'Controls the number of items to display on portfolio archive pages. Set to -1 to display all. Set to 0 to use the number of posts from Settings > Reading.', 'carpento' ),
				'desc'          => '',
				'default'       => 10,
				'min'           => -1,
				'step'          => 1,
				'max'           => 40,
				'display_value' => 'text',
			),
			array(
				'id'            => 'portfolio-layout-settings-gutter-size',
				'type'     => 'select',
				'title'         => esc_html__( 'Portfolio Column Spacing (Gutter Size) px', 'carpento' ),
				'subtitle'      => esc_html__( 'Controls column spacing or gutter size between items on portfolio archive pages.', 'carpento' ),
				'desc'     => '',
				'options'	=> carpento_isotope_gutter_list_redux(),
				'default'  => 'gutter-15',
			),
			array(
				'id'       => 'portfolio-layout-settings-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'carpento' ),
				'subtitle' => esc_html__( 'Featured image size in Portfolio Archive page.', 'carpento' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'carpento_square',
			),
			array(
				'id'       => 'portfolio-layout-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'carpento' ),
				'subtitle' => esc_html__( 'Make the portfolio page fullwidth or not.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
		)
	) );



	// -> START Portfolio Single Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio Single', 'carpento' ),
		'id'     => 'portfolio-single-page-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'portfolio-single-page-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'carpento' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for portfolio details pages', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'carpento' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'carpento' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'carpento' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'carpento' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'carpento' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'carpento' ),
				),
				'default'  => 'no-sidebar',
			),



			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Sidebar', 'carpento' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on portfolio single pages.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar 2', 'carpento' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on portfolio single pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'carpento' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar 2 - Position', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'carpento' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'carpento' ),
					'right'     => esc_html__( 'Right', 'carpento' )
				),
				'default'  => 'right',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),


			array(
				'id'       => 'portfolio-single-page-settings-select-portfolio-details-type',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Details Type', 'carpento' ),
				'subtitle' => esc_html__( 'Select the type of portfolio details you would like to display.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'small-image' => array(
						'alt' => esc_html__( 'Small Image', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image.png'
					),
					'small-image-slider' => array(
						'alt' => esc_html__( 'Small Image Slider', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image-slider.png'
					),
					'small-image-gallery' => array(
						'alt' => esc_html__( 'Small Image Gallery', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image-gallery.png'
					),
					'big-image' => array(
						'alt' => esc_html__( 'Big Image', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image.png'
					),
					'big-image-slider' => array(
						'alt' => esc_html__( 'Big Image Slider', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image-slider.png'
					),
					'big-image-gallery' => array(
						'alt' => esc_html__( 'Big Image Gallery', 'carpento' ),
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image-gallery.png'
					),
				),
				'default'  => 'small-image'
			),


			//Small Image
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Settings', 'carpento' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'carpento' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'carpento' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'carpento' ),
					'right'  => esc_html__( 'Right Side', 'carpento' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'carpento' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'carpento' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'carpento' ),
					'4'     => esc_html__( 'One Third (1/3)', 'carpento' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'carpento' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'carpento' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),




			//Small Image Slider
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Slider Settings', 'carpento' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'carpento' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'carpento' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'carpento' ),
					'right'  => esc_html__( 'Right Side', 'carpento' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'carpento' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'carpento' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'carpento' ),
					'4'     => esc_html__( 'One Third (1/3)', 'carpento' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'carpento' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'carpento' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),




			//Small Image Gallery
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Gallery Settings', 'carpento' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'carpento' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'carpento' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'carpento' ),
					'right'  => esc_html__( 'Right Side', 'carpento' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'carpento' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'carpento' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'carpento' ),
					'4'     => esc_html__( 'One Third (1/3)', 'carpento' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'carpento' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'carpento' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Gallery Layout Mode (FitRows Or Masonry)', 'carpento' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-isotope-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Images Per Row', 'carpento' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your gallery items.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),




			//Big Image
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Settings', 'carpento' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'carpento' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'carpento' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'carpento' ),
					'under'  => esc_html__( 'Under the Images', 'carpento' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image' )
				)
			),




			//Big Image Slider
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-slider-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Slider Settings', 'carpento' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-slider' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-slider-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'carpento' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'carpento' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'carpento' ),
					'under'  => esc_html__( 'Under the Images', 'carpento' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-slider' )
				)
			),




			//Big Image Gallery
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Gallery Settings', 'carpento' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'carpento' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'carpento' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'carpento' ),
					'under'  => esc_html__( 'Under the Images', 'carpento' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Gallery Layout Mode (FitRows Or Masonry)', 'carpento' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-isotope-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Images Per Row', 'carpento' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your gallery items.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),






			array(
				'id'        => 'portfolio-single-page-settings-other-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Other Settings', 'carpento' ),
				'notice'    => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Portfolio Meta', 'carpento' ),
				'subtitle'     => esc_html__( 'Enable/Disabling this option will show/hide each Portfolio Meta on your Portfolio Details Page.', 'carpento' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'carpento' ),
					'show-post-date'            => esc_html__( 'Show Date', 'carpento' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'carpento' ),
					'show-post-category'        => esc_html__( 'Show Category', 'carpento' ),
					'show-post-tag'             => esc_html__( 'Show Tag', 'carpento' ),
					'show-post-checklist-custom-fields'   => esc_html__( 'Show Checklist Custom Fields', 'carpento' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '0',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-tag' => '1',
					'show-post-checklist-custom-fields' => '1',
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),


			//section Next/Previous Navigation Link Starts
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Next/Previous Navigation Link', 'carpento' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Next/Previous Single Post Navigation Link', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link for Next & Previous Posts.', 'carpento' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link-within-same-cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation Link Within Same Category', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link to the next/previous post within the same category as the current post.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'portfolio-single-page-settings-show-next-pre-post-link', '=', '1' ),
			),




			//section Related Posts Starts
			array(
				'id'       => 'portfolio-single-page-settings-related-posts-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Related Posts', 'carpento' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Portfolio Items', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Posts List/Carousel on your page.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts-carousel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Carousel?', 'carpento' ),
				'subtitle' => esc_html__( 'Make it carousel or grid', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts-count',
				'type'     => 'text',
				'title'    => esc_html__( 'Number of Posts', 'carpento' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Enter number of posts to display. Default 3', 'carpento' ),
				'default'  => '3',
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'            => 'portfolio-single-page-settings-show-related-posts-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'carpento' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'carpento' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),



			//section Related Posts Starts
			array(
				'id'       => 'portfolio-single-page-settings-comments-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Comments', 'carpento' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comments', 'carpento' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Comments on your page.', 'carpento' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),

		)
	) );



	/* Check for Give */
	if ( class_exists( 'Give' ) ) {
	// -> START Give Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Give - Donation', 'carpento' ),
		'id'     => 'give-donation-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-heart',
		'fields' => array(
			array(
				'id'       => 'give-form-details-page-style',
				'type'     => 'select',
				'title'    => esc_html__( 'Give Form Details Page Style', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'form-style1' => esc_html__( 'Form Custom Style1', 'carpento' ),
					'form-style2' => esc_html__( 'Form Custom Style2', 'carpento' ),

				),
				'default'  => 'sideform-style1',
			),
			array(
				'id'       => 'give-donation-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Give Donation Page Sidebar Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for Donation Page', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'carpento' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'carpento' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'carpento' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'carpento' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'carpento' ),

				),
				'default'  => 'sidebar-right-25',
			),



			array(
				'id'       => 'give-donation-settings-related-posts-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Other Settings', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'give-donation-settings-campaign-creation-date',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Creation Date', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the campaign creation date on or off.', 'carpento' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-creator',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Campaign Creator', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the campaign donation count on or off.', 'carpento' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-categories',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Categories', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the campaign categories on or off.', 'carpento' ),
				'default'  => 0,
			),
			array(
				'id'       => 'give-donation-settings-campaign-tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Tags', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the campaign tags on or off.', 'carpento' ),
				'default'  => 0,
			),
			array(
				'id'       => 'give-donation-settings-campaign-progress-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Progress Bar', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the campaign campaign progress bar on or off.', 'carpento' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-raised-goal',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Stats', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the campaign raised goal on or off.', 'carpento' ),
				'default'  => 1,
			),
		)
	) );
	}






	// -> START Custom Post Types Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom Post Types', 'carpento' ),
		'id'     => 'cpt-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-carrot',
	) );




	// -> START Custom Post Types Portfolio Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'CPT - Portfolio', 'carpento' ),
		'id'     => 'cpt-settings-portfolio',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'cpt-settings-portfolio-enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Portfolio Post Type', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the portfolio custom post type on or off.', 'carpento' ),
				'default'  => 1,
			),
			array(
				'id'       => 'cpt-settings-portfolio-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Label', 'carpento' ),
				'subtitle' => esc_html__( 'Rename the Custom Post Type. ', 'carpento' ),
				'default'  => 'Portfolio',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-admin-dashicon',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Admin Dashboard Icon', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_carpento_wp_admin_dashicons_list(),
				'default'   => 'dashicons-mascot',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Slug', 'carpento' ),
				'subtitle' => esc_html__( 'Specify a custom slug for Portfolio Post Type. ', 'carpento' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'carpento' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-cat-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Category Slug', 'carpento' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Category of Portfolio Post Type. ', 'carpento' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'carpento' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio-category',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-tag-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Tag Slug', 'carpento' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Tag of Portfolio Post Type. ', 'carpento' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'carpento' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio-tag',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
		)
	) );


	// -> START Custom Post Types Projects Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'CPT - Projects', 'carpento' ),
		'id'     => 'cpt-settings-projects',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'cpt-settings-projects-enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Projects Post Type', 'carpento' ),
				'subtitle' => esc_html__( 'Toggle the projects custom post type on or off.', 'carpento' ),
				'default'  => 1,
			),
			array(
				'id'       => 'cpt-settings-projects-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Label', 'carpento' ),
				'subtitle' => esc_html__( 'Rename the Custom Post Type. ', 'carpento' ),
				'default'  => 'Projects',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-admin-dashicon',
				'type'     => 'select',
				'title'    => esc_html__( 'Projects Admin Dashboard Icon', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_carpento_wp_admin_dashicons_list(),
				'default'   => 'dashicons-mascot',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Slug', 'carpento' ),
				'subtitle' => esc_html__( 'Specify a custom slug for Projects Post Type. ', 'carpento' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'carpento' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'projects',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-cat-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Category Slug', 'carpento' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Category of Projects Post Type. ', 'carpento' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'carpento' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'projects-category',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),





			array(
				'id'        => 'cpt-settings-projects-archive-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Project Archive Page Settings', 'carpento' ),
				'notice'    => false,
			),
			array(
				'id'       => 'cpt-settings-projects-archive-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Project Layout Mode (FitRows Or Masonry)', 'carpento' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/staff/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/staff/layout-mode/masonry.png'
					),
				),
				'default'  => 'fitrows'
			),
			array(
				'id'       => 'cpt-settings-projects-archive-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Projects Per Row', 'carpento' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your Projects.', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'=> '3',
			),
			array(
				'id'            => 'cpt-settings-projects-archive-gutter-size',
				'type'     => 'select',
				'title'         => esc_html__( 'Column Spacing (Gutter Size) px', 'carpento' ),
				'desc'     => '',
				'options'	=> carpento_isotope_gutter_list_redux(),
				'default'  => 'gutter-15',
			),


			array(
				'id'       => 'cpt-settings-projects-archive-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'carpento' ),
				'subtitle' => esc_html__( 'Featured image size in blog page.', 'carpento' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'carpento_featured_image',
			),


			array(
				'id'       => 'cpt-settings-projects-archive-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_carpento_heading_tag_list_all(),
				'default'  => 'h4',
			),
		)
	) );



	// -> START Sidebar Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Sidebar Widgets', 'carpento' ),
		'id'     => 'sidebar-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-align-left',
		'fields' => array(
			array(
				'id'       => 'sidebar-settings-sidebar-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Sidebar Padding(px)', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the sidebar padding. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'carpento' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sidebar Background Color', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar.', 'carpento' ),
				'transparent' => false,
			),
			array(
				'id'       => 'sidebar-settings-sidebar-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Text Alignment', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'left'     => esc_html__( 'Left', 'carpento' ),
					'center'   => esc_html__( 'Center', 'carpento' ),
					'right'    => esc_html__( 'Right', 'carpento' ),
				),
				'default'  => '',
			),


			//section Related Items Starts
			array(
				'id'       => 'sidebar-settings-sidebar-title-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Sidebar Widget Title', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Widget Title Padding(px)', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the sidebar widget title padding. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'carpento' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Color', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar widget title box', 'carpento' ),
				'transparent' => false,
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color', 'carpento' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar widget title box', 'carpento' ),
				'transparent' => false,
			),
			array(
				'id'            => 'sidebar-settings-sidebar-title-font-size',
				'type'          => 'text',
				'title'         => esc_html__( 'Font Size(px)', 'carpento' ),
				'subtitle'      => esc_html__( 'Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'carpento' ),
				'desc'          => '',
			),


			array(
				'id'       => 'sidebar-settings-sidebar-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom', 'carpento' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'carpento' ),
				'desc'     => '',
				'default'  => '1',
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'carpento' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'carpento' ),
				'desc'     => '',
				'options'  => mascot_core_carpento_theme_color_list(),
				'default'  => '1',
				'required' => array( 'sidebar-settings-sidebar-title-show-line-bottom', '=', '1' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-line-bottom-custom-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Line Bottom Color', 'carpento' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'sidebar-settings-sidebar-title-line-bottom-theme-colored', '=', '' ),
			),


			array(
				'id'     => 'sidebar-settings-sidebar-title-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START 404 Page Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( '404 Page', 'carpento' ),
		'id'     => '404-page-settings',
		'desc'   => esc_html__( 'Title, content and background settings for 404 Error Page', 'carpento' ),
		'icon'   => 'dashicons-before dashicons-editor-help',
		'fields' => array(
			array(
				'id'       => '404-page-settings-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Layout', 'carpento' ),
				'subtitle' => esc_html__( 'Choose one among different layouts.', 'carpento' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'simple' => array(
						'alt' => 'Simple',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/404/simple.jpg'
					),
					'split' => array(
						'alt' => 'Split',
						'img' => CARPENTO_ADMIN_ASSETS_URI . '/images/404/split.jpg'
					),
				),
				'default'  => 'simple',
			),
			array(
				'id'       => '404-page-settings-show-header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Header', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => '404-page-settings-show-footer',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Footer', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),

			array(
				'id'       => '404-page-settings-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Alignment', 'carpento' ),
				'subtitle' => esc_html__( 'Text Alignment of this page', 'carpento' ),
				'desc'     => '',
				'options'	=> carpento_redux_text_alignment_list(),
				'default'  => 'text-center',
			),
			array(
				'id'       => '404-page-settings-show-back-to-home-button',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Back to Home Button', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => '404-page-settings-back-to-home-button-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Back to Home Button Label', 'carpento' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Default: "Back to Home"', 'carpento' ),
				'default'  => esc_html__( 'Back to Home', 'carpento' ),
				'required' => array(
					array( '404-page-settings-show-back-to-home-button', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-show-social-links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Links', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),





			//section custom background
			array(
				'id'       => '404-page-settings-custom-background-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Custom Background', 'carpento' ),
				'subtitle' => esc_html__( 'Define background for 404 page.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-custom-background-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Custom Background', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => '404-page-settings-bg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background', 'carpento' ),
				'subtitle' => esc_html__( 'Choose background image or color.', 'carpento' ),
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Background Overlay', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'carpento' ),
				'subtitle'      => esc_html__( 'Overlay on background image on footer.', 'carpento' ),
				'desc'          => '',
				'default'       => 7,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' ),
					array( '404-page-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'carpento' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'carpento' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'carpento' ),
					'dark'          => esc_html__( 'Dark', 'carpento' ),
					'white'         => esc_html__( 'White', 'carpento' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'carpento' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'carpento' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'carpento' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'carpento' )
				),
				'default' => 'dark',
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' ),
					array( '404-page-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-custom-background-section-ends',
				'type'     => 'section',
				'title'    => '',
				'subtitle' => '',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),





			//section Title Starts
			array(
				'id'       => '404-page-settings-title-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Title', 'carpento' ),
				'subtitle' => esc_html__( 'Define text and styles for Title.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'carpento' ),
				'subtitle' => esc_html__( 'Set page title to show', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( '404', 'carpento' ),
			),
			array(
				'id'       => '404-page-settings-subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Sub Title Text', 'carpento' ),
				'subtitle' => esc_html__( 'Set page sub title to show', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'Oops! Page Not Found!', 'carpento' ),
			),
			array(
				'id'            => '404-page-settings-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Title Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => '404-page-settings-title-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => '404-page-settings-title-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),





			//section Content Starts
			array(
				'id'       => '404-page-settings-content-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Content', 'carpento' ),
				'subtitle' => esc_html__( 'Define text and styles for Content.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Content Text', 'carpento' ),
				'subtitle' => esc_html__( 'Enter the content for 404 page which will be showed below title.', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'The page you are looking for does not exist. It might have been moved or deleted.', 'carpento' ),
			),
			array(
				'id'            => '404-page-settings-content-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Content Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => '404-page-settings-content-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => '404-page-settings-content-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Helpful Links Starts
			array(
				'id'       => '404-page-settings-helpful-links-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Helpful Links', 'carpento' ),
				'subtitle' => esc_html__( 'Define text and styles for helpful links.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-show-helpful-links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Helpful Links', 'carpento' ),
				'subtitle' => '',
				'desc'     => sprintf( esc_html__( 'Please create a new menu from %1$sAppearance > Menus%2$s and set Theme Location %1$s"Page 404 Helpful Links"%2$s', 'carpento' ), '<strong>', '</strong>', '<br>'),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => '404-page-settings-helpful-links-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Heading Text', 'carpento' ),
				'subtitle' => esc_html__( 'Set heading text to show', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'Helpful Links', 'carpento' ),
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-helpful-links-heading-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-helpful-links-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Links Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-helpful-links-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Search Box Starts
			array(
				'id'       => '404-page-settings-search-box-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Search Box', 'carpento' ),
				'subtitle' => esc_html__( 'Define text and styles for search box.', 'carpento' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-show-search-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Search Box', 'carpento' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),
			array(
				'id'       => '404-page-settings-search-box-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Heading Text', 'carpento' ),
				'subtitle' => esc_html__( 'Set heading text to show', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'Search Website', 'carpento' ),
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-search-box-paragraph',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Paragraph Text', 'carpento' ),
				'subtitle' => esc_html__( 'Set paragraph text to show', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'Please use the search box to find what you are looking for. Perhaps searching can help.', 'carpento' ),
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-search-box-heading-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-search-box-paragraph-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Paragraph Typography', 'carpento' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-search-box-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );


	if( mascot_core_carpento_plugin_installed() && function_exists( 'mascot_core_carpento_redux_opt_maintenance_section' ) ) {
		Redux::setSection( $opt_name, mascot_core_carpento_redux_opt_maintenance_section() );
	}


	// -> START Social Links Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Social Links', 'carpento' ),
		'id'     => 'social-links',
		'desc'   => esc_html__( 'This is your official social links. Set the order of social links to be appeared in the header/footer section.', 'carpento' ),
		'icon'   => 'dashicons-before dashicons-facebook-alt',
		'fields' => $redux_config_social_links_arraylist
	) );



	// -> START Sharing Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Sharing Settings', 'carpento' ),
		'id'     => 'sharing-settings',
		'desc'   => esc_html__( 'Enable/Disable social sharing buttons for posts, pages and portfolio single pages', 'carpento' ),
		'icon'   => 'dashicons-before dashicons-share',
		'fields' => array(
			array(
				'id'       => 'sharing-settings-enable-sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sharing', 'carpento' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'carpento' ),
				'off'      => esc_html__( 'No', 'carpento' ),
			),

			array(
				'id'       => 'sharing-settings-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Sharing Heading', 'carpento' ),
				'subtitle' => esc_html__( 'Your custom text for the social sharing heading.', 'carpento' ),
				'desc'     => '',
				'default'  => esc_html__( 'Share On:', 'carpento' ),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),
			array(
				'id'       => 'sharing-settings-icon-type',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icon Type', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'text'          => 'Text',
					'icon'          => 'Flat Icon',
					'icon-brand'    => 'Icon with Brand Color',
				),
				'default'  => 'icon-brand',
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			//Buttons Type Icon
			array(
				'id'       => 'sharing-settings-social-links-color',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Links - Background Color', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'icon-gray'     => esc_html__( 'Gray', 'carpento' ),
					'icon-dark'     => esc_html__( 'Dark', 'carpento' ),
					'icon-white'    => esc_html__( 'White', 'carpento' ),
					''              => esc_html__( 'Default', 'carpento' ),
				),
				'default'  => 'icon-gray',
				'required' => array(
					array( 'sharing-settings-icon-type', '=', 'icon' ),
				)
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-style',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icons Style', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'icon-rounded'   => esc_html__( 'Rounded', 'carpento' ),
					'icon-default'	 => esc_html__( 'Default', 'carpento' ),
					'icon-circled'   => esc_html__( 'Circled', 'carpento' ),
				),
				'default'  => 'icon-circled',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-size',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icons Size', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					''          => esc_html__( 'Default', 'carpento' ),
					'icon-xs'   => esc_html__( 'Extra Small', 'carpento' ),
					'icon-sm'	=> esc_html__( 'Small', 'carpento' ),
					'icon-md'   => esc_html__( 'Medium', 'carpento' ),
					'icon-lg'   => esc_html__( 'Large', 'carpento' ),
					'icon-xl'   => esc_html__( 'Extra Large', 'carpento' ),
				),
				'default'  => 'icon-md',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-animation-effect',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Icons Animation Effect', 'carpento' ),
				'desc'     => '',
				'options'	=> array(
					'styled-icons-effect-rollover'   => esc_html__( 'Roll Over', 'carpento' ),
					''                               => esc_html__( 'Default', 'carpento' ),
					'styled-icons-effect-rotate'     => esc_html__( 'Rotate', 'carpento' ),
				),
				'default'  => '',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-border-style',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Make Sharing Icon Area Bordered?', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => '0',
				'required' => array(
					array( 'sharing-settings-social-links-color', '!=', 'brand-color' ),
				)
			),
			array(
				'id'       => 'sharing-settings-social-links-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Sharing Icons Theme Colored?', 'carpento' ),
				'subtitle' => esc_html__( 'To make the sharing icons theme colored, please check it.', 'carpento' ),
				'desc'     => '',
				'options'  => mascot_core_carpento_theme_color_list(),
				'default'  => '',
				'required' => array(
					array( 'sharing-settings-social-links-color', '!=', 'brand-color' ),
				)
			),





			array(
				'id'       => 'sharing-settings-show-social-share-on',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Social Share On', 'carpento' ),
				'subtitle'     => '',
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-on-posts'     => esc_html__( 'Posts', 'carpento' ),
					'show-on-pages'     => esc_html__( 'Pages', 'carpento' ),
					'show-on-tribe-events'     => esc_html__( 'Tribe Events', 'carpento' ),
					'show-on-portfolio' => esc_html__( 'Portfolio', 'carpento' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-on-posts' => '1',
					'show-on-pages' => '1',
					'show-on-tribe-events' => '1',
					'show-on-portfolio' => '1',
				),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),
			array(
				'id'       => 'sharing-settings-networks',
				'type'     => 'sorter',
				'title'    => esc_html__( 'Seleted Social Networks', 'carpento' ),
				'desc'     => '',
				'compiler' => 'true',
				'options'	=> array(
					'Enabled' => array(
						'twitter'    => 'Twitter',
						'facebook'   => 'Facebook',
						'linkedin'   => 'Linkedin',
						'email'      => 'Email',
					),
					'Disabled'  => array(
						'tumblr'     => 'Tumblr',
						'pinterest'  => 'Pinterest',
						'vk'        => 'VK',
						'reddit'    => 'Reddit',
						'print'     => 'Print',
					),
				),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			//section Social Network URLs Starts
			array(
				'id'       => 'sharing-settings-icon-tooltip-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Sharing Icon Tooltip', 'carpento' ),
				'subtitle' => '',
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			array(
				'id'       => 'sharing-settings-tooltip-directions',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Tooltip Text Directions', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'top'    => 'Top',
					'right'  => 'Right',
					'bottom' => 'Bottom',
					'left'   => 'Left',
					'none'   => 'None',
				),
				'default'  => 'top',
			),
			array(
				'id'       => 'sharing-settings-tooltip-twitter',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Twitter', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Twitter', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-facebook',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Facebook', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Facebook', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-linkedin',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for LinkedIn', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on LinkedIn', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-tumblr',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Tumblr', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Tumblr', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-email',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Email', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Email', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-vk',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for VKontakte', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on VKontakte', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-pinterest',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Pinterest', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Pinterest', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-reddit',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Reddit', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Reddit', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-print',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Print', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Print This Page', 'carpento' ),
			),
			array(
				'id'       => 'sharing-settings-icon-tooltip-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),

		)
	) );



	// -> START Twitter API Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'API Settings', 'carpento' ),
		'id'     => 'theme-api-settings',
		'desc'  => esc_html__( 'Fill the following fields if you want to use these features', 'carpento' ),
		'icon'   => 'dashicons-before dashicons-admin-network',
		'fields' => array(
			array(
				'id'        => 'theme-api-settings-gmaps',
				'type'      => 'info',
				'title'     => esc_html__( 'Google Maps API Settings', 'carpento' ),
				'subtitle'  => esc_html__( 'Fill the following field if you want to use Google Maps', 'carpento' ),
				'notice'    => false,
			),
			array(
				'id'       => 'theme-api-settings-gmaps-api-key',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Maps API Key', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),


			array(
				'id'        => 'theme-api-settings-twitter',
				'type'      => 'info',
				'title'     => esc_html__( 'Twitter API Settings', 'carpento' ),
				'subtitle'  => sprintf( esc_html__('Fill the following fields if you want to use Twitter Feed Widget. You can collect those keys by creating your own Twitter API from here %s%s', 'carpento'), '<a target="_blank" class="text-white" href="' . esc_url( 'https://dev.twitter.com/apps' ) . '">', '</a>' ),
				'notice'    => false,
			),

			array(
				'id'       => 'theme-api-settings-twitter-api-key',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter API Key', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'theme-api-settings-twitter-api-secret',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter API Secret', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),

			array(
				'id'       => 'theme-api-settings-twitter-api-access-token',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Access Token', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'theme-api-settings-twitter-api-access-token-secret',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Access Token Secret', 'carpento' ),
				'subtitle' => '',
				'desc'     => '',
			),
		)
	) );



	// -> START Custom HTML/JS Codes
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom HTML/JS Codes', 'carpento' ),
		'id'     => 'custom-codes',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-code',
		'fields' => array(
			array(
				'id'       => 'custom-codes-custom-html-script-header',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Custom HTML/JS Code - in Header before &lt;/head&gt; tag', 'carpento' ),
				'subtitle' => esc_html__( 'If you have any custom HTML or JS Code you would like to add in the header before &lt;/head&gt; tag of the site then please enter it here. Only accepts javascript code wrapped with &lt;script&gt; tags and valid HTML markup.', 'carpento' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => '',
				'default'     => '',
			),
			array(
				'id'       => 'custom-codes-custom-html-script-footer',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Custom HTML/JS Code - in Footer before &lt;/body&gt; tag', 'carpento' ),
				'subtitle' => esc_html__( 'If you have any custom HTML or JS Code you would like to add in the footer before &lt;/body&gt; tag of the site then please enter it here. Only accepts javascript code wrapped with &lt;script&gt; tags and valid HTML markup.', 'carpento' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => '',
				'default'     => '',
			)
		)
	) );


	/*
	 * <--- END SECTIONS
	 */

