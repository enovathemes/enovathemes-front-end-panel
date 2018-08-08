<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function efp_output(){

	/* Get front-end panel settings
	--------------------------------*/

		$general_theme_options = get_option('general_theme_options');
		$utility_theme_options = get_option('utility_theme_options');

		$gen_apply_config      = isset($general_theme_options["gen_apply_config"]) ? esc_attr($general_theme_options["gen_apply_config"]) : "false";
		$gen_display_mobile    = isset($general_theme_options["gen_display_mobile"]) ? esc_attr($general_theme_options["gen_display_mobile"]) : "false";
		$gen_button_landing    = isset($general_theme_options["gen_button_landing"]) ? esc_url($general_theme_options["gen_button_landing"]) : '';
		$gen_button_purchase   = isset($general_theme_options["gen_button_purchase"]) ? esc_url($general_theme_options["gen_button_purchase"]) : '';
		$gen_layout            = isset($general_theme_options["gen_layout"]) ? $general_theme_options["gen_layout"] : '';
		
		$gen_color_version     = isset($general_theme_options["gen_color_version"]) ? $general_theme_options["gen_color_version"] : '';
		$gen_header_version    = isset($general_theme_options["gen_header_version"]) ? $general_theme_options["gen_header_version"] : '';
		$gen_footer_version    = isset($general_theme_options["gen_footer_version"]) ? $general_theme_options["gen_footer_version"] : '';

		$uti_chat              = isset($utility_theme_options["uti_chat"]) ?  esc_attr($utility_theme_options["uti_chat"]) : "false";
		$uti_chat_page_name    = isset($utility_theme_options["uti_chat_page_name"]) ? esc_attr($utility_theme_options["uti_chat_page_name"]) : '';
		$uti_author_name       = isset($utility_theme_options["uti_author_name"]) ? esc_attr($utility_theme_options["uti_author_name"]) : '';
		$uti_author_link       = isset($utility_theme_options["uti_author_link"]) ? esc_url($utility_theme_options["uti_author_link"]) : '';


	/* Get user "data" variables
	--------------------------------*/
	
		$data_layout  = (isset($_GET["data_layout"]) && !empty($_GET["data_layout"])) ? $_GET["data_layout"] : "default";
		$data_header  = (isset($_GET["data_header"]) && !empty($_GET["data_header"])) ? $_GET["data_header"] : "default";
		$data_footer  = (isset($_GET["data_footer"]) && !empty($_GET["data_footer"])) ? $_GET["data_footer"] : "default";
		$data_color   = (isset($_GET["data_color"])  && !empty($_GET["data_color"]))  ? $_GET["data_color"]  : "default";

?>

	<?php if ($gen_apply_config == "true"): ?>
		
		<div class="efp" data-mobile="<?php echo $gen_display_mobile; ?>">
			<div class="efp-toggle">
				<div class="efp-toggle-opt efp-toggle-main"><span class="toggle-icon icon-efp-cog"></span></div>
			</div>
			<div class="efp-body">

				<!-- Author -->

				<?php if (!empty($uti_author_name) && !empty($uti_author_link)): ?>
					<a class="efp-author" target="_blank" href="<?php echo $uti_author_link; ?>"><?php echo esc_html__('Created by', 'enovathemes-front-end-panel').' <strong>'.$uti_author_name.'<i class="icon-efp-link"></i></strong>'; ?></a>
				<?php endif ?>

				<!-- Buttons -->

				<?php if (!empty($gen_button_purchase) || !empty($gen_button_landing)): ?>
					<div class="efp-group buttons">
						<?php if (!empty($gen_button_purchase)): ?>
							<a target="_blank" href="<?php echo esc_url($gen_button_purchase); ?>" class="efp-btn"><?php echo esc_html__('Purchase now', 'enovathemes-front-end-panel'); ?></a>
						<?php endif ?>
						<?php if (!empty($gen_button_landing)): ?>
							<a target="_blank" href="<?php echo esc_url($gen_button_landing); ?>" class="efp-btn dark"><?php echo esc_html__('Landing page', 'enovathemes-front-end-panel'); ?></a>
						<?php endif ?>
					</div>
				<?php endif ?>

				<!-- Colors -->

				<?php if (!empty($gen_color_version)): ?>
					<div class="efp-group">
						<h5><?php echo esc_html__('Choose color demo', 'enovathemes-front-end-panel'); ?></h5>
						<?php echo efp_format_check_option($gen_color_version); ?>
					</div>
				<?php endif ?>

				<!-- Layout -->

				<?php if (!empty($gen_layout)): ?>
					<div class="efp-group">
						<h5><?php echo esc_html__('Choose layout demo', 'enovathemes-front-end-panel'); ?></h5>
						<?php echo efp_format_select_option($gen_layout); ?>
					</div>
				<?php endif ?>

				<!-- Headers -->

				<?php if (!empty($gen_header_version)): ?>
					<div class="efp-group">
						<h5><?php echo esc_html__('Choose header demo', 'enovathemes-front-end-panel'); ?></h5>
						<?php echo efp_format_select_option($gen_header_version); ?>
					</div>
				<?php endif ?>

				<!-- Footers -->

				<?php if (!empty($gen_footer_version)): ?>
					<div class="efp-group">
						<h5><?php echo esc_html__('Choose footer demo', 'enovathemes-front-end-panel'); ?></h5>
						<?php echo efp_format_select_option($gen_footer_version); ?>
					</div>
				<?php endif ?>

				<!-- Demos -->

				<?php
					$demos = new WP_Query(array( 
						'post_type'      => 'demo', 
						'posts_per_page' => '10000',
						'order'          => 'ASC',
						'orderby'        => 'date'
					));
				?>
				<?php if($demos->have_posts()): ?>
					<div class="efp-demo">
						<h5><?php echo esc_html__('Choose demo', 'enovathemes-front-end-panel'); ?></h5>
						<?php while($demos->have_posts()) : $demos->the_post(); ?>
							<?php
								$values 	= get_post_custom( get_the_ID() );
			    				$demo_link  = isset( $values['demo_link'][0] ) ? $values["demo_link"][0] : "";
			    				$demo_img   = (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(),'full') : "";
							?>
							<?php if(!empty($demo_link) && !empty($demo_img)): ?>
								<a href="<?php echo esc_url($demo_link); ?>" title="<?php echo get_the_title(); ?>" target="_blank">
									<img src="<?php echo $demo_img; ?>" alt="<?php echo get_the_title(); ?>">
								</a>
							<?php endif; ?>	
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>

			</div>	
		</div>

		<!-- Facebook messenger -->

		<?php if ($uti_chat == 'true' && !empty($uti_chat_page_name)): ?>
			<a target="_blank" href="https://m.me/<?php echo $uti_chat_page_name; ?>" class="fb-messengermessageus">
				<i class="icon-efp-chat"></i><span>Presale chat</span>
			</a>
		<?php endif ?>

	<?php endif ?>

<?php
}
add_action( 'wp_footer', 'efp_output' );

?>