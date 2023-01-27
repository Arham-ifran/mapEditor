<?php
function ur_theme_start_session() {
    if (!session_id())
        session_start();

}
add_action("init", "ur_theme_start_session", 1);



function polyline_decode( $string ) {

    $points = array();

    $index = $i = 0;

    $previous = array(0,0);

    while ($i < strlen($string)) {

        $shift = $result = 0x00;

        do {

            $bit = ord(substr($string, $i++)) - 63;

            $result |= ($bit & 0x1f) << $shift;

            $shift += 5;

        } while ($bit >= 0x20);



        $diff = ($result & 1) ? ~($result >> 1) : ($result >> 1);

        $number = $previous[$index % 2] + $diff;

        $previous[$index % 2] = $number;

        $index++;

        $points[] = $number * 1 / pow(10, 5);

    }

    return $points;

}

// Related to strava

function pace( $mps ) {

	if ( ! $mps ) {

		return __( 'N/A', 'wp-strava' );

	}

	$kmh = $mps * 3.6;

	$s   = 3600 / $kmh;

	$ss  = $s / 60;

	$ms  = floor( $ss ) * 60;

	$sec = sprintf( '%02d', round( $s - $ms ) );

	$min = floor( $ss );

	return "{$min}:{$sec}";

}



function speed($avg_speed) {

	$min = floor((1000/$avg_speed)/60);
	$sec = round((((1000/$avg_speed)/60) - $min)*60,0);
	if (strlen($sec) == 1) {

		$sec = '0' . $sec;

	}
	$ret = $min . '.' . $sec;
	if ($ret > 0) {

		$ret = $ret * 1;

	}
	return number_format((float)$ret, 2, '.', ',');

 

}

function gpx_speed($distance, $moving) {

	$ret = $distance / $moving * 3.6;

	return str_replace(',', '', number_format($ret, 2));

}

function wgenerate_num($num) {

	$bytes = random_bytes($num);

	$hex = bin2hex($bytes);

	return $hex;

}

function xml_2_string ($xml_object) {

    return (string) $xml_object;

}

function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);
	if ($unit == "K") {
	    return ($miles * 1.609344);
    } else if ($unit == "N") {
	    return ($miles * 0.8684);
    } else {
		return $miles;
    }
}

function wie_split_product_by_guid_cart_items( $cart_item_data, $product_id ){

	$unique_cart_item_key = uniqid();

	$new_value = [];

	$new_value['guid'] = $_POST['guid'];

	$new_value['config'] = $_POST['config'];

	$_SESSION['config'] = $new_value['config'];

	$cart_item_data['unique_key'] = $_POST['guid'];

	return array_merge($cart_item_data, $new_value);

}

add_filter( 'woocommerce_add_cart_item_data', 'wie_split_product_by_guid_cart_items', 10, 2 );

add_filter('woocommerce_get_cart_item_from_session', 'wie_get_cart_items_from_session', 1, 3);

function wie_get_cart_items_from_session($item, $values, $key) {
    if (array_key_exists('guid', $values)) {

        $item['guid'] = $values['guid'];

    }
    if (array_key_exists('config', $values)) {

        $item['config'] = $values['config'];

    }
    return $item;

}
add_filter('woocommerce_cart_item_name', 'wie_add_usr_custom_session', 1, 3);

function wie_add_usr_custom_session($product_name, $values, $cart_item_key) {

    $html = '';

    if(isset($values['guid'])) {
    	$html .= '<div>';
    	$html .= '<span><strong>Guid: </strong> ' . $values['guid'] . ' </span>';
    	$html .= '</div>';
    }

    $return_string = $product_name . "<br />" . $html;
    return $return_string;

}
add_action('woocommerce_checkout_create_order_line_item', 'action_checkout_create_order_line_item', 10, 4 );

function action_checkout_create_order_line_item( $item, $cart_item_key, $values, $order ) {
    global $wpdb;
    $guid  = $values['guid'];
    $style = '';
    $event_info = '';
    $wie_gpx = $wpdb->prefix.'wie_gpx';
    $gpx_data = $wpdb->get_row("SELECT * FROM $wie_gpx WHERE config_id = '$guid'");
    $stripslashes = stripslashes($gpx_data->gpx_file_data);
    $json_decode = json_decode($stripslashes);
    if(isset($gpx_data->map_event_id) && !empty($gpx_data->map_event_id)) {
        $event_info .= '<div>';
        $event_info .= '<strong>Event ID:</strong>';
        $event_info .= '<span>'.$gpx_data->map_event_id . ' </span>';
        $event_info .= '</div>';
    }
    $html = '';
    $html .= '<div>';
    $html .= '<span>'.$guid . ' </span>';
    $html .= '</div>';

    $html .= $event_info;
    $html1 = '';
    $html1 .= '<div>';
    $html1 .= '<button type="button" class="wie_download_pdf button button-primary" data-guid="'.$guid.'" data-variation="'.$gpx_data->product_variation_id.'" event_id="'.$gpx_data->map_event_id.'">Download Image</button>';
    $html1 .= '</div>';
    $style .= '<div class="map-block-s">';  
    if($json_decode->design->config->layer->theme->layout_theme != 'theme-two' && $json_decode->design->config->layer->theme->layout_theme != 'theme-three') { 
        $style .= '<div><strong>Titles:</strong>
            <span><strong>Headline:</strong></span>
            <span>'.$json_decode->design->config->layer->text->headline.'</span>
            <span><strong>Subtitle:</strong></span>
            <span>'.$json_decode->design->config->layer->text->subtitle.'</span>
            <span><strong>Footnote:</strong></span>
            <span>'.$json_decode->design->config->layer->text->footnote.'</span>
            <span><strong>Meta Data</strong></span>
            <span>'.$json_decode->design->config->layer->text->metadata.'</span>
        </div>';
    }
    if($json_decode->design->config->layer->theme->layout_theme == 'theme-two') { 
    $style .= '<div><strong>Titles Twe:</strong>
            <span><strong>Headline:</strong></span>
            <span>'.$json_decode->design->config->layer->text->theadline.'</span>
            <span><strong>Subtitle:</strong></span>
            <span>'.$json_decode->design->config->layer->text->tsubtitle.'</span>
            <span><strong>Label One:</strong></span>
            <span>'.$json_decode->design->config->layer->text->labelone.'</span>
            <span><strong>Value One:</strong></span>
            <span>'.$json_decode->design->config->layer->text->valueone.'</span>
            <span><strong>Label Two:</strong></span>
            <span>'.$json_decode->design->config->layer->text->labeltwo.'</span>
            <span><strong>Value Two:</strong></span>
            <span>'.$json_decode->design->config->layer->text->valuetwo.'</span>

            <span><strong>Label Three:</strong></span>
            <span>'.$json_decode->design->config->layer->text->labelthree.'</span>
            <span><strong>Value Three:</strong></span>
            <span>'.$json_decode->design->config->layer->text->valuethree.'</span>

            <span><strong>Label Four:</strong></span>
            <span>'.$json_decode->design->config->layer->text->labelfour.'</span>
            <span><strong>Value Four:</strong></span>
            <span>'.$json_decode->design->config->layer->text->valuefour.'</span>

            <span><strong>Label Five:</strong></span>
            <span>'.$json_decode->design->config->layer->text->labelfive.'</span>
            <span><strong>Value Five:</strong></span>
            <span>'.$json_decode->design->config->layer->text->valuefive.'</span>

            <span><strong>Label Six:</strong></span>
            <span>'.$json_decode->design->config->layer->text->labelsix.'</span>
            <span><strong>Value Six:</strong></span>
            <span>'.$json_decode->design->config->layer->text->valuesix.'</span>
        </div>';
    } 
    if($json_decode->design->config->layer->theme->layout_theme == 'theme-three') { 
        $style .= '<div><strong>Titles Drie:</strong>
            <span><strong>Headline:</strong></span>
            <span>'.$json_decode->design->config->layer->text->ttheadline.'</span>
            <span><strong>Subtitle:</strong></span>
            <span>'.$json_decode->design->config->layer->text->ttsubtitle.'</span>
            <span><strong>Waarde één:</strong></span>
            <span>'.$json_decode->design->config->layer->text->coordinaten.'</span>
            <span><strong>Waarde twee:</strong></span>
            <span>'.$json_decode->design->config->layer->text->ras.'</span>
        </div>';
    }
    $style .= '<div><strong>Titles Position:</strong>
    <span>'.$json_decode->design->config->layer->position->position.'</span>
    </div>
    
    <div><strong>Color Scheme:</strong>
    <span>'.ucfirst($json_decode->design->config->poster->style).'</span>
    </div>
    <div><strong>Material:</strong>
    <span>'.ucfirst($json_decode->design->config->paper->material).'</span>
    </div>
    <div><strong>Layout:</strong>
    <span>'.ucfirst($json_decode->design->config->paper->orientation).'</span>
    </div>
    <div><strong>Size:</strong>
    <span>'.$json_decode->design->config->paper->size.'</span>
    </div>
    <div><strong>Outline:</strong>
    <span>'.ucfirst($json_decode->design->config->layer->outline->type).'</span>
    </div>
    <div><strong>Kleur houten lijst:</strong>
    <span>'.ucfirst($json_decode->design->config->layer->framed_poster->poster).'</span>
    </div>
    <div><strong>Gradient Overlay:</strong>
    <span>'.ucfirst($json_decode->design->config->layer->overlay->type).'</span>
    </div>
    <div><strong>Line Thickness:</strong>
    <span>'.$json_decode->design->config->font->size.'</span>
    </div>
    <div><strong>Font Family:</strong>
    <span>'.$json_decode->design->config->font->family.'</span>
    </div>
    <div><strong>Font Size:</strong>
    <span>'.$json_decode->design->config->font->size.'</span>
    </div>';
    $style .= '</div>';
	$item->update_meta_data('Guid', $html);
	$item->update_meta_data('_kaartstijl_details', $style);
	$item->update_meta_data('_pdf',  $html1);
}
add_action( 'woocommerce_before_cart_table', 'woo_add_continue_shopping_button_to_cart' );
add_action( 'woocommerce_before_checkout_form', 'woo_add_continue_shopping_button_to_cart' );



function woo_add_continue_shopping_button_to_cart() {
    $shop_page_url = get_site_url().'/aangepaste-kaart/';
    echo '<div class="woocommerce-message">';
    echo ' <a href="'.$shop_page_url.'" class="button">Bestel nog een Strava-print →</a> Wil je nog meer prints bestellen?';
    echo '</div>';
}

function change_update_cart_text( $translated, $text, $domain ) {
    if($translated == 'Update cart'){
        $translated = 'Update winkelwagen';
    }
    if($translated == 'Proceed to checkout'){
        $translated = 'Bestelling afronden';
    }

    if($translated == 'Cart totals'){
        $translated = 'Totaal';
    }

    if($translated == 'Subtotal'){
        $translated = 'Subtotaal';
    }

    if($translated == 'Total'){
        $translated = 'Totaal';
    }

    if($translated == 'Personalized Cycling Map Print') {
        $translated = 'Gepersonaliseerde Strava-print';
    }

    if($translated == 'cart' || $translated == 'Cart') {
        $translated = 'Winkelwagen';
    }

    if($translated == 'Additional information') {
        $translated = 'Extra informatie';
    }

    if($translated == 'Your order') {
        $translated = 'Jouw bestelling';
    }

    if($translated == 'Select your bank') {
        $translated = 'Bank selecteren';
    }

    if($translated == 'Place order') {
        $translated = 'Bestelling plaatsen';
    }

    if($translated == 'privacy policy') {
        $translated = 'privacybeleid';
    }

    if($translated == 'date') {
        $translated = 'DATUM';
    }

    if($translated == 'Payment method:') {
        $translated = 'Betaalmethode:';
    }

    if($translated == 'Order details') {
        $translated = 'Jouw bestelling';
    }

    if($translated == 'Subtotal:') {
        $translated = 'Subtotaal:';
    }

    if($translated == 'Total:'){
        $translated = 'Totaal:';
    }

    if($translated == 'Billing details'){
        $translated = 'Factuurgegevens';
    }

    if($translated == 'Your cart is currently empty.'){
        $translated = 'Jouw winkelwagen is leeg';
    }

    if($translated == 'Ship to a different address?'){
        $translated = 'Verzend naar een ander adres?';
    }

    if($translated == 'Payment completed by' ) {
        $translated = 'Betaling afgerond door';
    }

    if($translated == 'last 4 digits' ) {
        $translated = 'laatste 4 getallen';
    }

    if ($translated === 'Coupon:') {
		$translated = 'Kortingscode:';
    }

    if ($translated === 'Coupon code:') {
		$translated = 'Kortingscode:';
	}

    if ($translated === 'Coupon code') {
		$translated = 'Kortingscode';
	}

    if ($translated === 'Apply coupon') {
		$translated = 'Kortingscode toepassen';
	}
    return $translated;
}
add_filter( 'gettext', 'change_update_cart_text', 20, 3 );


add_filter( 'woocommerce_thankyou_order_received_text', 'misha_thank_you_title', 20, 2 );
function misha_thank_you_title( $thank_you_title, $order ){
	return 'Bedankt! Jouw bestelling is goed ontvangen.';
}

add_filter( 'woocommerce_coupon_message', 'filter_woocommerce_coupon_message', 10, 3 );
function filter_woocommerce_coupon_message( $msg, $msg_code, $coupon ) {

    // Get applied coupons
    if($msg === __( 'Coupon code applied successfully.', 'woocommerce')) {
        $msg = 'De kortingscode is toegepaste';
    }

    if($msg === __( 'Coupon code already applied!', 'woocommerce')) {
        $msg = 'De kortingscode is al toegepast!';
    }
    return $msg;

}

add_filter('woocommerce_coupon_error', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_cart_totals_coupon_label', 'rename_coupon_label',10, 1);

function rename_coupon_label($err, $err_code=null, $something=null){
	$err = str_ireplace("Coupon","Kortingscode ",$err);
	return $err;

}

function filter_woocommerce_cart_totals_coupon_html( $coupon_html, $coupon, $discount_amount_html ) {
    $coupon_html = str_replace( '[Remove]', '[Verwijderen]', $coupon_html );
    return $coupon_html;

}
add_filter( 'woocommerce_cart_totals_coupon_html', 'filter_woocommerce_cart_totals_coupon_html', 10, 3 );


function mapbox_wie_gpx_setting ()  {

    add_submenu_page('edit.php?post_type=product',
        'Custom Map', 'Custom Map',
        'manage_options', 'custom_maps',
        'wgpx_custom_maps' 
    );
    $site_permalink = get_site_url().'/aangepaste-kaart/';
    add_submenu_page('edit.php?post_type=product',
        'Create Custom Map', 'Create Custom Map',
        'manage_options', $site_permalink
    );
}
add_action( 'admin_menu', 'mapbox_wie_gpx_setting', 1);
function wgpx_custom_maps() { ?>
      
    <div class="wrap">
        <h1> Custom Map </h1>
         <?php
        $table = new Gpx_List_Table();
        $table->default_columns = [
            'title',
            'is_active',
            'edit'
        ];
        $table->sortable_columns = [
            'title'              => ['title', false],
            'is_active'          => ['is_active', false],
            'edit'              => ['edit', false],
            'delete'             => ['delete', false],
        ];
        $table->order_column = 'id';
        $table->columns = [
            'title'              => __('Name'),
            'is_active'             => __('Active'),
            'edit'             => __('Edit'),
            'delete'             => __('Delete'),
        ];
        ?>
   
        <form> 
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
            <?php
            $table->prepare_items();
            $table->search_box('Search','search_id');
            $table->display(); ?>
        </form>
    <?php 
}