<?php 
/*
    Plugin Name: Enovathemes front-end panel
    Plugin URI: https://enovathemes.com
    Text Domain: enovathemes-front-end-panel
    Domain Path: /languages/
    Description: Theme demo presentation helper plugin
    Author: Enovathemes
    Version: 1.0
    Author URI: https://enovathemes.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'ENOVATHEMES_FRONT_END_PANEL', plugin_dir_path( __FILE__ ));

function efp_admin_scripts_styles() {
    wp_enqueue_style( 'enovathemes-front-end-panel-admin-style', plugins_url( '/css/admin.css', __FILE__ ) );
    wp_enqueue_script( 'enovathemes-front-end-panel-admin-script', plugins_url( '/js/admin.js', __FILE__ ),array('jquery'), '', true);
    return;
}
add_action('admin_enqueue_scripts','efp_admin_scripts_styles');

function efp_demo_scripts_styles(){
    if(!is_admin()){
        wp_enqueue_style('enovathemes-front-end-panel-styles', plugins_url( '/css/style.css', __FILE__ ) );

        wp_enqueue_script( 'imagesloaded');
        wp_enqueue_script('enovathemes-front-end-panel-nicescroll', plugins_url('/js/jquery.nicescroll.min.js', __FILE__ ), array('jquery'), '', true);
        wp_enqueue_script('enovathemes-front-end-panel-isotop', plugins_url('/js/isotop.js', __FILE__ ), array('jquery'), '', true);
        wp_enqueue_script('enovathemes-front-end-panel-init', plugins_url('/js/init.js', __FILE__ ), array('jquery'), '', true);
    }
}
add_action( 'wp_enqueue_scripts', 'efp_demo_scripts_styles' );

function efp_format_select_option($option) {
    $output = "<select class=\"efp-select\">";
    $split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $option);

    foreach($split as $haystack) {
        if (strpos($haystack, ":")) {
            $string = explode(":", trim($haystack), 2);
            $key   = strip_tags(trim($string[0]));
            $value = strip_tags(trim($string[1]));
            $output .='<option value="'.esc_url($value).'">'.esc_attr($key).'</option>';
        } else {
            $output = $output . $haystack;
        }
    }
    $output .='</select>';
    return $output;
}

function efp_format_check_option($option) {
    $output = "<div class=\"efp-check\">";
    $split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $option);

    foreach($split as $haystack) {
        if (strpos($haystack, ":")) {
            $string = explode(":", trim($haystack), 2);
            $key   = strip_tags(trim($string[0]));
            $value = strip_tags(trim($string[1]));
            $output .='<a href="'.esc_url($value).'" style="background:'.esc_attr($key).';"></a>';
        } else {
            $output = $output . $haystack;
        }
    }
    $output .='</div>';
    return $output;
}

// Demos shortcode
function efp_demos($atts, $content = null) {

    extract(shortcode_atts(
        array(
            'columns' => '3',
            'order'   => 'ASC',
            'orderby' => 'date'
        ), $atts)
    );

    global $post;

    $output  = "";

    static $id_counter = 1;

    $query_options = array(
        'post_type'           => 'demo',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => 1000, 
        'orderby'             => $orderby,
        'order'               => $order,
    );

    $demos = new WP_Query($query_options);

    if($demos->have_posts()){

        $args = array(
            'orderby'           => 'name', 
            'order'             => 'ASC',
            'hide_empty'        => true, 
            'exclude'           => array(), 
            'exclude_tree'      => array(), 
            'number'            => '', 
            'fields'            => 'all', 
            'slug'              => '', 
            'parent'            => '',
            'hierarchical'      => false, 
            'child_of'          => 0, 
            'get'               => '', 
            'name__like'        => '',
            'description__like' => '',
            'pad_counts'        => false, 
            'offset'            => '', 
            'search'            => '', 
            'cache_domain'      => 'core'
        );

        $count_posts = wp_count_posts('demo');
        $taxonomy    = 'demo-category'; 
        $tax_terms = get_terms($taxonomy);

        $output .='<div class="efp-demos-list-container">';

            if (count($tax_terms) != 0){

                $output .='<div class="efp-filter">';
                    $output .='<span class="first-filter active filter" data-filter="all" data-count="'.$count_posts->publish.'">'.esc_html__('All', 'enovathemes-front-end-panel').'</span>';
                    foreach(get_terms('demo-category',$args) as $filter_term){
                        $filter_count    = $filter_term->count;
                        $filter_children = get_term_children( $filter_term->term_id, 'demo-category' );
                        if(is_array($filter_children) && !empty($filter_children)) {
                            foreach ($filter_children as $filter_child) {
                                $filter_child_obj = get_term($filter_child, 'demo-category');
                                $filter_count = $filter_count + $filter_child_obj->count;
                            }
                        }
                        $output .='<span class="filter" data-filter="'.$filter_term->slug.'" data-count="'.$filter_count.'">'.$filter_term->name.'</span>';
                    }
                $output .='</div>';

            }

            $output .='<ul id="efp-demos-list-'.$id_counter.'" data-columns="'.$columns.'" class="efp-demos-list">';
                
                while($demos->have_posts()) : $demos->the_post();
                    
                    $values       = get_post_custom( get_the_ID() );
                    $demo_link    = isset( $values['demo_link'][0] ) ? esc_url($values["demo_link"][0]) : "";
                    $demo_preview = isset( $values['demo_preview'][0] ) ? esc_url($values["demo_preview"][0]) : "";

                    $classes= array('all');

                    if (get_the_terms( $post->ID, 'demo-category', '', ' ', '' )) {
                        foreach(get_the_terms( $post->ID, 'demo-category', '', '', '' ) as $term) {
                            array_push($classes, $term->slug);
                        }
                    }

                    $output .='<li class="'.join( ' ', get_post_class('efp-demos-list-item '.implode(' ',$classes))).'" id="demo-'.get_the_ID().'">';
                        if (!empty($demo_preview) && !empty($demo_link)) {
                            $output .='<a href="'.$demo_link.'" title="'.esc_attr(get_the_title()).'" target="_blank">';
                                $output .='<img src="'.$demo_preview.'" alt="'.esc_attr(get_the_title()).'">';
                                $output .='<h6 class="efp-demos-list-item-title">'.esc_html(get_the_title()).'</h6>';
                            $output .='</a>';
                        }
                    $output .='</li>';

                endwhile;
            $output .='</ul>';
        $output .='</div>';

        $id_counter++;

        return $output;

        wp_reset_postdata();

    } else {
        $output  = esc_html__('No demos found', 'enovathemes-front-end-panel');
    }

}
add_shortcode('efp_demos', 'efp_demos');

require_once('demos.php' );
require_once('configurations.php' );
require_once('settings.php' );
require_once('front-end-output.php' );

?>
