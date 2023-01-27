<?php

function register_map_event_post_type() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-calendar',
            "supports" => [ "title", "editor", "thumbnail" ],
  
        )
    );
}
add_action( 'init', 'register_map_event_post_type' );
add_action( 'add_meta_boxes', 'event_meta_boxes' );

function event_meta_boxes() {
    add_meta_box( 'event-meta-box-0', __( 'Event Info', 'events' ), 
		'map_meta_box_event_link', 'events', 'normal', 'high' 
	);
}
function map_custom_field( $value ) {
	global $post; 
	$custom_field = get_post_meta( $post->ID, $value, true );
	if ( !empty( $custom_field ) )
		return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );
	return false;
}

function map_meta_box_event_link() { 
    global $wpdb;
    $admin_wie_gpx =  $wpdb->prefix.'admin_wie_gpx';
	$custom_maps = $wpdb->get_results("SELECT *  FROM $admin_wie_gpx WHERE is_active = 1 ORDER BY id DESC");




    $event_link = map_custom_field('event_link');
    
    $custom_map = json_decode(map_custom_field('custom_map'));
    if(empty($custom_map)) {
        $custom_map = [];
    }
  
    
  
  
	wp_nonce_field( 'mapeditor_meta_box_nonce', 'map_editor_nonce' ); ?>
	<p>
		<label for="event_link"><b>Event Link</b>:</label><br />
		<input type="text" name="event_link" placeholder="Add Event Link" required="required" value="<?php echo $event_link; ?>" size="50"/>
	</p>
    <p >
		<label for="event_link" class="cform-label"><b>Add Custom Map</b>:</label><br />
		<select name="custom_map[]"  class="cform-control" multiple>
            <option value="">Select</option>
            <?php foreach($custom_maps as $i => $map) { ?>
               
                <option value="<?php echo $map->id; ?>" <?php echo (in_array($map->id, $custom_map)) ? 'selected' : ''; ?>><?php echo ucfirst($map->title); ?></option>
            <?php } ?>
           
        </select>
	</p>
	<?php

}
function events_meta_box_save( $post_id ) {
   
    // Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    // Verify the nonce. If insn't there, stop the script
    if( !isset( $_POST['map_editor_nonce'] ) || !wp_verify_nonce( $_POST['map_editor_nonce'], 'mapeditor_meta_box_nonce' ) ) return;
    if( isset( $_POST['event_link'] ) ){
		update_post_meta($post_id, 'event_link', $_POST['event_link'] );
	}
  
    if( isset( $_POST['custom_map'] ) ){
		update_post_meta($post_id, 'custom_map', json_encode($_POST['custom_map'] ));
	}
}
add_action( 'save_post_events', 'events_meta_box_save');