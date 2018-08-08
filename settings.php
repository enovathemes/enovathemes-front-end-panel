<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Theme panel settings

add_action( 'admin_menu', 'add_efp_settings' );
function add_efp_settings(){
	add_submenu_page(
		'edit.php?post_type=demo',
		esc_html__( 'Settings', 'enovathemes-front-end-panel'),
		esc_html__( 'Settings', 'enovathemes-front-end-panel'),
		'administrator',
		'efp_settings',
		'render_efp_settings'
	);
}

function render_efp_settings(){	
?>
	<div class="enovathemes-front-end-panel-container wrap">
		<?php settings_errors(); ?>

		<?php

		$theme_tabs = array(
			'general_theme_options' => esc_html__('General options','enovathemes-front-end-panel'),
			'utility_theme_options' => esc_html__('Utility options','enovathemes-front-end-panel'),
		);

		$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_theme_options';

        ?>

        <h2 class="nav-tab-wrapper">
			<?php foreach ($theme_tabs as $tab => $value): ?>
           		<a href="?post_type=demo&page=efp_settings&tab=<?php echo $tab; ?>" class="nav-tab <?php echo $active_tab == $tab ? 'nav-tab-active' : ''; ?>"><?php echo $value; ?></a>
			<?php endforeach; ?>
        </h2>

		<form class="enovathemes-front-end-panel-settings" method="post" action="options.php">
			<?php
				if( $active_tab == 'general_theme_options' ) {
					echo '<div class="general_theme_options">';
		            	settings_fields( 'general_theme_options' );
						do_settings_sections( 'general_theme_options' );
					echo '</div>';
		        } elseif ($active_tab == 'utility_theme_options') {
		        	echo '<div class="utility_theme_options">';
		        		settings_fields( 'utility_theme_options' );
		        	echo '</div>';
						do_settings_sections( 'utility_theme_options' );
		        }
				submit_button();
			?>
		</form>
	</div>
<?php }

add_action('admin_init', 'efp_settings_sections');
function efp_settings_sections() {

	$theme_options_group = array(
		array(
			'section_slug' => 'general_theme_options', 
			'section_title' => esc_html__('General options', 'enovathemes-front-end-panel'), 
			'section_fields' => array(
				array(
					'field-id'          => 'gen_apply_config',
					'field-title'       => esc_html__('Activate front-end panel:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Toggle this option if you want Front-end panel to affect your demo', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'gen_display_mobile',
					'field-title'       => esc_html__('Display on mobile:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Toggle this option if you want Front-end panel to display on mobile devices (under 768px wide)', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'gen_global_variable',
					'field-title'       => esc_html__('Global variable name:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Enter global variable name for theme options if you use reduxframework for your theme options', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'gen_button_landing',
					'field-title'       => esc_html__('Landing page link:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Paste link to landing page here', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'gen_button_purchase',
					'field-title'       => esc_html__('Button purchase:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Paste item link here (you can include your referal too)', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'gen_layout',
					'field-title'       => esc_html__('Layout:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Add Label:link pair of layout demos. Example is Boxed:https://yourlink.com/boxed OR Boxed:https://yourlink.com/?data_layout=boxed (Use line break (press Shift + Enter) to separate between items)', 'enovathemes-front-end-panel')
				
				),
				array(
					'field-id'          => 'gen_color_version',
					'field-title'       => esc_html__('Color versions:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Add #color code (hex):link pair of colors demos. Example is #ff5500:https://yourlink.com/color-1 OR #ff5500:https://yourlink.com/?data_color=1 (Use line break (press Shift + Enter) to separate between items)', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'gen_header_version',
					'field-title'       => esc_html__('Header versions:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Add Label:link pair of header demos. Example is Transparent:https://yourlink.com/header-transparent OR Transparent:https://yourlink.com/?data_header=transparent (Use line break (press Shift + Enter) to separate between items)', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'gen_footer_version',
					'field-title'       => esc_html__('Footer versions:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Add Label:link pair of footer demos. Example is Fixed:https://yourlink.com/footer-fixed OR Transparent:https://yourlink.com/?data_footer=fixed (Use line break (press Shift + Enter) to separate between items)', 'enovathemes-front-end-panel')
				),
			)
		),
		array(
			'section_slug' => 'utility_theme_options', 
			'section_title' => esc_html__('Utility options', 'enovathemes-front-end-panel'), 
			'section_fields' => array(
				array(
					'field-id'          => 'uti_chat',
					'field-title'       => esc_html__('Presale chat:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Toggle this option if you want to enable presale chat via facebook messenger', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'uti_chat_page_name',
					'field-title'       => esc_html__('Presale chat page:', 'enovathemes-front-end-panel'),
					'field-description' => esc_html__('Paste here your page name. Example: https://www.facebook.com/enovathemes/?ref=bookmarks paste the enovathemes', 'enovathemes-front-end-panel')
				),
				array(
					'field-id'          => 'uti_author_name',
					'field-title'       => esc_html__('Author profile name:', 'enovathemes-front-end-panel'),
					'field-description' => ''
				),
				array(
					'field-id'          => 'uti_author_link',
					'field-title'       => esc_html__('Author profile/portfolio link:', 'enovathemes-front-end-panel'),
					'field-description' => ''
				),
			)
		),
	);

	foreach ($theme_options_group as $option_group){

		add_settings_section( 
	        $option_group['section_slug'],
	        $option_group['section_title'],
	        $option_group['section_slug'].'_callback',
	        $option_group['section_slug']
	    );

	    register_setting(  
	        $option_group['section_slug'],  
	        $option_group['section_slug']  
	    );

	    foreach ($option_group['section_fields'] as $option_field) {

			add_settings_field(	
				$option_field['field-id'],
				$option_field['field-title'],
				$option_field['field-id'].'_callback',
				$option_group['section_slug'],
				$option_group['section_slug'],
				array($option_field['field-description'])
			);
		}
	}
}

function general_theme_options_callback (){
	echo "<hr>";
}

function utility_theme_options_callback (){
	echo "<hr>";
}

/*	General theme options fields
-----------------------------------------------*/

	function gen_apply_config_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_apply_config'])) {
			$settings['gen_apply_config'] = "";
		}

		$output = "";

		$output .= '<div id="gen_apply_config">';
			$output .= '<input type="checkbox" value="true" '.checked( $settings['gen_apply_config'], 'true', false) . ' id="general_theme_options[gen_apply_config]" name="general_theme_options[gen_apply_config]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_display_mobile_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_display_mobile'])) {
			$settings['gen_display_mobile'] = "";
		}

		$output = "";

		$output .= '<div id="gen_display_mobile">';
			$output .= '<input type="checkbox" value="true" '.checked( $settings['gen_display_mobile'], 'true', false) . ' id="general_theme_options[gen_display_mobile]" name="general_theme_options[gen_display_mobile]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_global_variable_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_global_variable'])) {
			$settings['gen_global_variable'] = "";
		}

		$output = "";

		$output .= '<div id="gen_global_variable">';
			$output .= '<input type="text" value="'.$settings['gen_global_variable'].'" id="general_theme_options[gen_global_variable]" name="general_theme_options[gen_global_variable]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_button_landing_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_button_landing'])) {
			$settings['gen_button_landing'] = "";
		}

		$output = "";

		$output .= '<div id="gen_button_landing">';
			$output .= '<input type="text" value="'.$settings['gen_button_landing'].'" id="general_theme_options[gen_button_landing]" name="general_theme_options[gen_button_landing]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_button_purchase_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_button_purchase'])) {
			$settings['gen_button_purchase'] = "";
		}

		$output = "";

		$output .= '<div id="gen_button_purchase">';
			$output .= '<input type="text" value="'.$settings['gen_button_purchase'].'" id="general_theme_options[gen_button_purchase]" name="general_theme_options[gen_button_purchase]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_layout_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_layout'])) {
			$settings['gen_layout'] = "";
		}

		$output = "";

		$output .= '<div id="gen_layout">';
			$output .= '<textarea id="general_theme_options[gen_layout]" name="general_theme_options[gen_layout]" >';
				$output .=$settings['gen_layout'];
			$output .= '</textarea>';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_color_version_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_color_version'])) {
			$settings['gen_color_version'] = "";
		}

		$output = "";

		$output .= '<div id="gen_color_version">';
			$output .= '<textarea id="general_theme_options[gen_color_version]" name="general_theme_options[gen_color_version]" >';
				$output .=$settings['gen_color_version'];
			$output .= '</textarea>';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_header_version_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_header_version'])) {
			$settings['gen_header_version'] = "";
		}

		$output = "";

		$output .= '<div id="gen_header_version">';
			$output .= '<textarea id="general_theme_options[gen_header_version]" name="general_theme_options[gen_header_version]" >';
				$output .=$settings['gen_header_version'];
			$output .= '</textarea>';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function gen_footer_version_callback($args) {

		$settings = get_option('general_theme_options');

		if(!isset($settings['gen_footer_version'])) {
			$settings['gen_footer_version'] = "";
		}

		$output = "";

		$output .= '<div id="gen_footer_version">';
			$output .= '<textarea id="general_theme_options[gen_footer_version]" name="general_theme_options[gen_footer_version]" >';
				$output .=$settings['gen_footer_version'];
			$output .= '</textarea>';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}


/*	Utility theme options fields
-----------------------------------------------*/

	function uti_chat_callback($args) {

		$settings = get_option('utility_theme_options');

		if(!isset($settings['uti_chat'])) {
			$settings['uti_chat'] = "";
		}

		$output = "";

		$output .= '<div id="uti_chat">';
			$output .= '<input type="checkbox" value="true" '.checked( $settings['uti_chat'], 'true', false) . ' id="utility_theme_options[uti_chat]" name="utility_theme_options[uti_chat]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function uti_chat_page_name_callback($args) {

		$settings = get_option('utility_theme_options');

		if(!isset($settings['uti_chat_page_name'])) {
			$settings['uti_chat_page_name'] = "";
		}

		$output = "";

		$output .= '<div id="uti_chat_page_name">';
			$output .= '<input type="text" value="'.$settings['uti_chat_page_name'].'" id="utility_theme_options[uti_chat_page_name]" name="utility_theme_options[uti_chat_page_name]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function uti_author_name_callback($args) {

		$settings = get_option('utility_theme_options');

		if(!isset($settings['uti_author_name'])) {
			$settings['uti_author_name'] = "";
		}

		$output = "";

		$output .= '<div id="uti_author_name">';
			$output .= '<input type="text" value="'.$settings['uti_author_name'].'" id="utility_theme_options[uti_author_name]" name="utility_theme_options[uti_author_name]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}

	function uti_author_link_callback($args) {

		$settings = get_option('utility_theme_options');

		if(!isset($settings['uti_author_link'])) {
			$settings['uti_author_link'] = "";
		}

		$output = "";

		$output .= '<div id="uti_author_link">';
			$output .= '<input type="text" value="'.$settings['uti_author_link'].'" id="utility_theme_options[uti_author_link]" name="utility_theme_options[uti_author_link]" >';
			if (!empty($args[0])) {$output .= '<div></div><p class="enovathemes-front-end-panel-info">'.$args[0].'</p>';}
		$output .= '</div>';
		echo $output;
	     
	}
	
?>