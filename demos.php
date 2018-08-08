<?php 

function efp_demo() {


	$labels = array(
		'name'               => esc_html__('Demos', 'enovathemes-front-end-panel'),
		'singular_name'      => esc_html__('Demo', 'enovathemes-front-end-panel'),
		'add_new'            => esc_html__('Add new demo', 'enovathemes-front-end-panel'),
		'add_new_item'       => esc_html__('Add new demo', 'enovathemes-front-end-panel'),
		'edit_item'          => esc_html__('Edit demo', 'enovathemes-front-end-panel'),
		'new_item'           => esc_html__('New demo', 'enovathemes-front-end-panel'),
		'all_items'          => esc_html__('All demos', 'enovathemes-front-end-panel'),
		'view_item'          => esc_html__('View demo', 'enovathemes-front-end-panel'),
		'search_items'       => esc_html__('Search demos', 'enovathemes-front-end-panel'),
		'not_found'          => esc_html__('No demos found', 'enovathemes-front-end-panel'),
		'not_found_in_trash' => esc_html__('No demos found in trash', 'enovathemes-front-end-panel'), 
		'parent_item_colon'  => '',
		'menu_name'          => esc_html__('Front-end panel', 'enovathemes-front-end-panel')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true, 
		'show_in_menu'       => true, 
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'demo','with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => false, 
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-visibility',
		'supports'           => array( 'title', 'thumbnail'),
	);

	register_post_type( 'demo', $args );
}

add_action( 'init', 'efp_demo' );

function efp_demo_taxonomies() {

	register_taxonomy('demo-category', 'demo', array(
		'hierarchical' => true,
		'labels' => array(
			'name' 				=> esc_html__( 'Demo category', 'enovathemes-front-end-panel' ),
			'singular_name' 	=> esc_html__( 'Demo category', 'enovathemes-front-end-panel' ),
			'search_items' 		=> esc_html__( 'Search category', 'enovathemes-front-end-panel' ),
			'all_items' 		=> esc_html__( 'All categories', 'enovathemes-front-end-panel' ),
			'parent_item' 		=> esc_html__( 'Parent category', 'enovathemes-front-end-panel' ),
			'parent_item_colon' => esc_html__( 'Parent category', 'enovathemes-front-end-panel' ),
			'edit_item' 		=> esc_html__( 'Edit category', 'enovathemes-front-end-panel' ),
			'update_item' 		=> esc_html__( 'Update category', 'enovathemes-front-end-panel' ),
			'add_new_item' 		=> esc_html__( 'Add new category', 'enovathemes-front-end-panel' ),
			'new_item_name' 	=> esc_html__( 'New category', 'enovathemes-front-end-panel' ),
			'menu_name' 		=> esc_html__( 'Demo categories', 'enovathemes-front-end-panel' ),
		),
		'rewrite' => array(
			'slug' 		   => 'demo-cateogry',
			'with_front'   => true,
			'hierarchical' => true
		),
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true
	));

}
add_action( 'init', 'efp_demo_taxonomies', 0 );

add_action("admin_init", "efp_add_demo_metabox");
function efp_add_demo_metabox(){
	add_meta_box(
        "demo-link", 
        esc_html__("Demo link", 'enovathemes-front-end-panel'),
        "efp_render_demo_link", 
        "demo",
        "normal", 
        "high"
    );
    add_meta_box(
        "demo-preview", 
        esc_html__("Demo preview image", 'enovathemes-front-end-panel'),
        "efp_render_demo_preview", 
        "demo",
        "side", 
        "default"
    );
}

function efp_render_demo_link($post) {
	$values     = get_post_custom( $post->ID );
    $demo_link  = isset( $values['demo_link'] ) ? esc_url( $values["demo_link"][0] ) : "";
    wp_nonce_field( 'efp_demo_meta_nonce', 'efp_demo_meta_nonce' );
?>
<div id="enovathemes-front-end-panel-demo-link">
    <div>
        <label for="demo_link"><?php echo esc_html__('Enter demo link here:', 'enovathemes-front-end-panel'); ?></label>
        <input name="demo_link" id="demo_link" type="text" value="<?php echo $demo_link;?>" ></input>
    </div>
</div>
<?php
}

function efp_render_demo_preview($post) {
	$values     = get_post_custom( $post->ID );
    $demo_preview  = isset( $values['demo_preview'] ) ? esc_url( $values["demo_preview"][0] ) : "";
    wp_nonce_field( 'efp_demo_meta_nonce', 'efp_demo_meta_nonce' );
?>
<div id="enovathemes-front-end-panel-demo-preview">
	<br>
    <div class="efp-upload">
        <input name="demo_preview" type="hidden" class="efp-upload-path" value="<?php echo esc_url($demo_preview);?>"/> 
        <input class="efp-button-upload button" type="button" value="<?php echo esc_html__('Upload image', 'enovathemes-addons') ?>" />
        <input class="efp-button-remove button" type="button" value="<?php echo esc_html__('Remove image', 'enovathemes-addons') ?>" />
        <br><br>
        <img src='<?php echo esc_url($demo_preview); ?>' class='efp-preview-upload'/>
    </div>
</div>
<?php
}

add_action( 'save_post', 'efp_save_demo_link' );  
function efp_save_demo_link( $post_id )  
{  
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['efp_demo_meta_nonce'] ) || !wp_verify_nonce( $_POST['efp_demo_meta_nonce'], 'efp_demo_meta_nonce' ) ) return;  
    if ( ! current_user_can( 'edit_page', $post_id ) ) return;

    if( isset( $_POST['demo_link'] ) ){
    	update_post_meta($post_id, "demo_link",$_POST["demo_link"]);
    }

    if( isset( $_POST['demo_preview'] ) ){
    	update_post_meta($post_id, "demo_preview",$_POST["demo_preview"]);
    }
    
}

add_filter("manage_edit-demo_columns", "efp_demo_edit_columns");
function efp_demo_edit_columns($columns){
	$columns['cb']    = "<input type=\"checkbox\" />";
	$columns['title'] = esc_html__("Title", 'enovathemes-front-end-panel');
	$columns['img']   = esc_html__("Thumbnail", 'enovathemes-front-end-panel');
	$columns['demo_link']   = esc_html__("Link", 'enovathemes-front-end-panel');
	return $columns;
}

add_action("manage_demo_posts_custom_column", "efp_demo_custom_columns");
function efp_demo_custom_columns($column){
	global $post;
	$values = get_post_custom();
	switch ($column){

		case "img":

		echo '<a href="' . get_edit_post_link() . '">';
        	echo the_post_thumbnail( 'thumbnail' );
        echo '</a>';
			
		break;

		case "demo_link":
		$values = get_post_custom( $post->ID );
		if(isset( $values['demo_link'][0]) && !empty($values['demo_link'][0]) ){
        	echo $values['demo_link'][0];
		}
			
		break;
	}
}