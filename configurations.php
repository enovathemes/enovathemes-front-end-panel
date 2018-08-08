<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function efp_demo_configurations_init() {

	$general_theme_options = get_option('general_theme_options');

	$gen_apply_config      = isset($general_theme_options["gen_apply_config"]) ? $general_theme_options["gen_apply_config"] : "false";
	$gen_global_variable   = isset($general_theme_options["gen_global_variable"]) ? $general_theme_options["gen_global_variable"] : "";

	if (!empty($gen_global_variable) && $gen_apply_config == 'true') {

		global $$gen_global_variable;

		// Get data from user
		$data_layout  = (isset($_GET["data_layout"]) && !empty($_GET["data_layout"])) ? $_GET["data_layout"] : "default";
		$data_header  = (isset($_GET["data_header"]) && !empty($_GET["data_header"])) ? $_GET["data_header"] : "default";
		$data_footer  = (isset($_GET["data_footer"]) && !empty($_GET["data_footer"])) ? $_GET["data_footer"] : "default";
		$data_color   = (isset($_GET["data_color"]) && !empty($_GET["data_color"])) ? $_GET["data_color"]    : "default";

		/* Start configurations here
		----------------------*/

			/* Configure dynamic styles
			----------------------*/

				function efp_demo_configurations_include_dynamic_styles() {

					wp_enqueue_style('efp-inline-dynamic-styles', plugins_url( '/css/efp-inline-dynamic-styles.css', __FILE__ ));

					$general_theme_options = get_option('general_theme_options');
					$gen_apply_config      = isset($general_theme_options["gen_apply_config"]) ? $general_theme_options["gen_apply_config"] : "false";
					$gen_global_variable   = isset($general_theme_options["gen_global_variable"]) ? $general_theme_options["gen_global_variable"] : "";

					// Get data from user
					$data_color = (isset($_GET["data_color"]) && !empty($_GET["data_color"])) ? $_GET["data_color"]    : "default";

					global $$gen_global_variable;

					$dynamic_styles = '';

					if ($data_color == 2) {

						$color = '#13A399';

						// change color settings from theme options
						$GLOBALS[$gen_global_variable]['main-color']                               = $color;
						$GLOBALS[$gen_global_variable]['mtt-back-color']['regular']                = $color;
						$GLOBALS[$gen_global_variable]['header-menu-color']['hover']   	           = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['hover']   	   = $color;
						$GLOBALS[$gen_global_variable]['header-menu-effect-color']['color'] 	   = $color;
						$GLOBALS[$gen_global_variable]['header-top-button-back-color']['regular']  = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['color'] = $color;

						$GLOBALS[$gen_global_variable]['mtt-back-color']['hover']                  = '#111111';
						$GLOBALS[$gen_global_variable]['header-top-button-text-color']['hover']    = '#212121';

						$GLOBALS[$gen_global_variable]['logo-mobile-retina']['url'] = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-mobile-retina-color-2.png';
						$GLOBALS[$gen_global_variable]['logo-retina']['url']        = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-2.png';
						$GLOBALS[$gen_global_variable]['logo-fixed-retina']['url']  = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-2.png';

						$dynamic_styles .= '.page-id-14 #rev_slider_1_1 .tp-bgimg,
						.page-id-14 #et-content-box-1 .et-icon-wrap,
						.page-id-14 #et-tab-1 .tabset .tab.active
						{background-color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-dropcap
						{color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-list-icon .icon
						{color: '.$color.' !important;box-shadow: inset 0 0 0 2px '.$color.' !important;}';

					}

					if ($data_color == 3) {

						$color = '#F16541';

						// change color settings from theme options
						$GLOBALS[$gen_global_variable]['main-color']                               = $color;
						$GLOBALS[$gen_global_variable]['mtt-back-color']['regular']                = $color;
						$GLOBALS[$gen_global_variable]['header-menu-color']['hover']   	           = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['hover']   	   = $color;
						$GLOBALS[$gen_global_variable]['header-menu-effect-color']['color'] 	   = $color;
						$GLOBALS[$gen_global_variable]['header-top-button-back-color']['regular']  = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['color'] = $color;

						$GLOBALS[$gen_global_variable]['mtt-back-color']['hover']                  = '#111111';
						$GLOBALS[$gen_global_variable]['header-top-button-text-color']['hover']    = '#212121';

						$GLOBALS[$gen_global_variable]['logo-mobile-retina']['url'] = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-mobile-retina-color-3.png';
						$GLOBALS[$gen_global_variable]['logo-retina']['url']        = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-3.png';
						$GLOBALS[$gen_global_variable]['logo-fixed-retina']['url']  = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-3.png';

						$dynamic_styles .= '.page-id-14 #rev_slider_1_1 .tp-bgimg,
						.page-id-14 #et-content-box-1 .et-icon-wrap,
						.page-id-14 #et-tab-1 .tabset .tab.active
						{background-color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-dropcap
						{color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-list-icon .icon
						{color: '.$color.' !important;box-shadow: inset 0 0 0 2px '.$color.' !important;}';

					}

					if ($data_color == 4) {

						$color = '#90C133';

						// change color settings from theme options
						$GLOBALS[$gen_global_variable]['main-color']                               = $color;
						$GLOBALS[$gen_global_variable]['mtt-back-color']['regular']                = $color;
						$GLOBALS[$gen_global_variable]['header-menu-color']['hover']   	           = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['hover']   	   = $color;
						$GLOBALS[$gen_global_variable]['header-menu-effect-color']['color'] 	   = $color;
						$GLOBALS[$gen_global_variable]['header-top-button-back-color']['regular']  = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['color'] = $color;

						$GLOBALS[$gen_global_variable]['mtt-back-color']['hover']                  = '#111111';
						$GLOBALS[$gen_global_variable]['header-top-button-text-color']['hover']    = '#212121';

						$GLOBALS[$gen_global_variable]['logo-mobile-retina']['url'] = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-mobile-retina-color-4.png';
						$GLOBALS[$gen_global_variable]['logo-retina']['url']        = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-4.png';
						$GLOBALS[$gen_global_variable]['logo-fixed-retina']['url']  = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-4.png';

						$dynamic_styles .= '.page-id-14 #rev_slider_1_1 .tp-bgimg,
						.page-id-14 #et-content-box-1 .et-icon-wrap,
						.page-id-14 #et-tab-1 .tabset .tab.active
						{background-color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-dropcap
						{color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-list-icon .icon
						{color: '.$color.' !important;box-shadow: inset 0 0 0 2px '.$color.' !important;}';

					}

					if ($data_color == 5) {

						$color = '#008BB7';

						// change color settings from theme options
						$GLOBALS[$gen_global_variable]['main-color']                               = $color;
						$GLOBALS[$gen_global_variable]['mtt-back-color']['regular']                = $color;
						$GLOBALS[$gen_global_variable]['header-menu-color']['hover']   	           = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['hover']   	   = $color;
						$GLOBALS[$gen_global_variable]['header-menu-effect-color']['color'] 	   = $color;
						$GLOBALS[$gen_global_variable]['header-top-button-back-color']['regular']  = $color;
						$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['color'] = $color;

						$GLOBALS[$gen_global_variable]['mtt-back-color']['hover']                  = '#111111';
						$GLOBALS[$gen_global_variable]['header-top-button-text-color']['hover']    = '#212121';

						$GLOBALS[$gen_global_variable]['logo-mobile-retina']['url'] = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-mobile-retina-color-5.png';
						$GLOBALS[$gen_global_variable]['logo-retina']['url']        = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-5.png';
						$GLOBALS[$gen_global_variable]['logo-fixed-retina']['url']  = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-color-5.png';

						$dynamic_styles .= '.page-id-14 #rev_slider_1_1 .tp-bgimg,
						.page-id-14 #et-content-box-1 .et-icon-wrap,
						.page-id-14 #et-tab-1 .tabset .tab.active
						{background-color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-dropcap
						{color: '.$color.' !important;}';

						$dynamic_styles .= '.page-id-14 .et-list-icon .icon
						{color: '.$color.' !important;box-shadow: inset 0 0 0 2px '.$color.' !important;}';

					}

					/* Read only (do not edit)
					----------------------*/

						$dynamic_styles = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $dynamic_styles);
						$dynamic_styles = str_replace(': ', ':', $dynamic_styles);
						$dynamic_styles = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $dynamic_styles);

						if (!empty($dynamic_styles)) {
							wp_add_inline_style( 'efp-inline-dynamic-styles', $dynamic_styles );
						}
				}
				add_action( 'wp_enqueue_scripts', 'efp_demo_configurations_include_dynamic_styles',2);
			
			/* Configure dynamic scripts
			----------------------*/

				function efp_demo_configurations_include_dynamic_scripts() {

					if ( ! wp_script_is( 'jquery', 'done' ) ) {
						wp_enqueue_script( 'jquery' );
					}

					wp_enqueue_script('efp-inline-dynamic-scripts', plugins_url( '/js/efp-inline-dynamic-scripts.js', __FILE__ ), array('jquery'), '');

					// Get data from user
					$data_color = (isset($_GET["data_color"]) && !empty($_GET["data_color"])) ? $_GET["data_color"]    : "default";

					$dynamic_scripts = '';

					if ($data_color == 2) {
						$dynamic_scripts .= 'jQuery(document).ready(function(){';
							$dynamic_scripts .= 'jQuery("#features-row img").attr("src","https://enovathemes.com/efp-demo/wp-content/uploads/image2.jpg");';
						$dynamic_scripts .= '})';
					}

					if ($data_color == 3) {
						$dynamic_scripts .= 'jQuery(document).ready(function(){';
							$dynamic_scripts .= 'jQuery("#features-row img").attr("src","https://enovathemes.com/efp-demo/wp-content/uploads/image3.jpg");';
						$dynamic_scripts .= '})';
					}

					if ($data_color == 4) {
						$dynamic_scripts .= 'jQuery(document).ready(function(){';
							$dynamic_scripts .= 'jQuery("#features-row img").attr("src","https://enovathemes.com/efp-demo/wp-content/uploads/image4.jpg");';
						$dynamic_scripts .= '})';
					}

					if ($data_color == 5) {
						$dynamic_scripts .= 'jQuery(document).ready(function(){';
							$dynamic_scripts .= 'jQuery("#features-row img").attr("src","https://enovathemes.com/efp-demo/wp-content/uploads/image5.jpg");';
						$dynamic_scripts .= '})';
					}

					/* Read only (do not edit)
					----------------------*/

						$dynamic_scripts = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $dynamic_scripts);
						$dynamic_scripts = str_replace(': ', ':', $dynamic_scripts);
						$dynamic_scripts = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $dynamic_scripts);

						if (!empty($dynamic_scripts)) {
							wp_add_inline_script( 'efp-inline-dynamic-scripts', $dynamic_scripts);
						}
				}
				add_action( 'wp_enqueue_scripts', 'efp_demo_configurations_include_dynamic_scripts' );

			/* Configure layout
			----------------------*/

				if ($data_layout == "boxed") {
					$GLOBALS[$gen_global_variable]['layout'] = 'boxed';
					$GLOBALS[$gen_global_variable]['site-background']['background-image'] = 'https://enovathemes.com/efp-demo/wp-content/uploads/background.jpg';
					$GLOBALS[$gen_global_variable]['site-background']['background-color'] = '#cd3b9a';
				}

			/* Configure header
			----------------------*/

				if ($data_header == 2) {
					$GLOBALS[$gen_global_variable]['transparent-header']           		= 1;
					$GLOBALS[$gen_global_variable]['header-back-color']['color']   		= '#ffffff';
					$GLOBALS[$gen_global_variable]['header-back-color']['alpha']   		= 0;
					$GLOBALS[$gen_global_variable]['header-menu-color']['regular'] 		= '#ffffff';
					$GLOBALS[$gen_global_variable]['header-menu-color']['hover']   		= '#212121';
					$GLOBALS[$gen_global_variable]['header-menu-effect-color']['color'] = '#ffffff';
					$GLOBALS[$gen_global_variable]['header-menu-effect-color']['alpha'] = 1;
					$GLOBALS[$gen_global_variable]['header-menu-m']                     = '4';
					$GLOBALS[$gen_global_variable]['header-menu-m-1600']                = '4';
					$GLOBALS[$gen_global_variable]['header-menu-effect']                = 'box';
					$GLOBALS[$gen_global_variable]['logo-retina']['url'] 				= 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-header-2.png';
				
					$GLOBALS[$gen_global_variable]['sticky-header-back-color']['color']   		= '#ffffff';
					$GLOBALS[$gen_global_variable]['sticky-header-back-color']['alpha']   		= 1;
					$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['regular'] 		= '#212121';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['hover']   		= '#ffffff';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['color']  = '#8e24aa';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['alpha']  = 1;
					$GLOBALS[$gen_global_variable]['logo-fixed-retina']['url'] 				    = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina.png';
				}

				if ($data_header == 3) {
					$GLOBALS[$gen_global_variable]['header-top']   			            = 0;
					$GLOBALS[$gen_global_variable]['header-back-color']['color']   		= '#8e24aa';
					$GLOBALS[$gen_global_variable]['header-back-color']['alpha']   		= 1;
					$GLOBALS[$gen_global_variable]['header-menu-color']['regular'] 		= '#ffffff';
					$GLOBALS[$gen_global_variable]['header-menu-color']['hover']   		= '#212121';
					$GLOBALS[$gen_global_variable]['header-menu-effect-color']['color'] = '#ffffff';
					$GLOBALS[$gen_global_variable]['header-menu-effect-color']['alpha'] = 1;
					$GLOBALS[$gen_global_variable]['header-menu-m']                     = '4';
					$GLOBALS[$gen_global_variable]['header-menu-m-1600']                = '4';
					$GLOBALS[$gen_global_variable]['header-menu-effect']                = 'box';
					$GLOBALS[$gen_global_variable]['logo-retina']['url'] 				= 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-header-2.png';
				
					$GLOBALS[$gen_global_variable]['sticky-header-back-color']['color']   		= '#8e24aa';
					$GLOBALS[$gen_global_variable]['sticky-header-back-color']['alpha']   		= 1;
					$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['regular'] 		= '#ffffff';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['hover']   		= '#212121';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['color']  = '#ffffff';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['alpha']  = 1;
					$GLOBALS[$gen_global_variable]['logo-fixed-retina']['url'] 				    = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-header-2.png';
				}

				if ($data_header == 4) {
					$GLOBALS[$gen_global_variable]['header-top']   			            = 0;
					$GLOBALS[$gen_global_variable]['header-back-color']['color']   		= '#212121';
					$GLOBALS[$gen_global_variable]['header-back-color']['alpha']   		= 1;
					$GLOBALS[$gen_global_variable]['header-menu-color']['regular'] 		= '#ffffff';
					$GLOBALS[$gen_global_variable]['header-menu-color']['hover']   		= '#212121';
					$GLOBALS[$gen_global_variable]['header-menu-effect-color']['color'] = '#ffffff';
					$GLOBALS[$gen_global_variable]['header-menu-effect-color']['alpha'] = 1;
					$GLOBALS[$gen_global_variable]['header-menu-m']                     = '4';
					$GLOBALS[$gen_global_variable]['header-menu-m-1600']                = '4';
					$GLOBALS[$gen_global_variable]['header-menu-effect']                = 'box';
					$GLOBALS[$gen_global_variable]['logo-retina']['url'] 				= 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-header-2.png';
				
					$GLOBALS[$gen_global_variable]['sticky-header-back-color']['color']   		= '#212121';
					$GLOBALS[$gen_global_variable]['sticky-header-back-color']['alpha']   		= 1;
					$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['regular'] 		= '#ffffff';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-color']['hover']   		= '#212121';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['color']  = '#ffffff';
					$GLOBALS[$gen_global_variable]['sticky-header-menu-effect-color']['alpha']  = 1;
					$GLOBALS[$gen_global_variable]['logo-fixed-retina']['url'] 				    = 'https://enovathemes.com/efp-demo/wp-content/uploads/logo-retina-header-2.png';
				}

				switch ($data_header) {

					case 2:
						update_post_meta(14, 'rev_slider', 'slider-full');
						break;

					case 3:
						update_post_meta(14, 'rev_slider', 'slider-light');
						break;
					
					default:
						update_post_meta(14, 'rev_slider', 'slider-1');
						break;

				}

			/* Configure footer
			----------------------*/

				$footer_settings  = get_option('footer_settings');

				switch ($data_footer) {

					case 2:
						$footer_settings["footer_id"] = 148;
						update_option( 'footer_settings', $footer_settings );
						break;

					case 3:
						$footer_settings["footer_id"] = 149;
						update_option( 'footer_settings', $footer_settings );
						break;
					
					default:
						$footer_settings["footer_id"] = 28;
						update_option( 'footer_settings', $footer_settings );
						break;

				}

	}

}
add_action('init', 'efp_demo_configurations_init');
?>