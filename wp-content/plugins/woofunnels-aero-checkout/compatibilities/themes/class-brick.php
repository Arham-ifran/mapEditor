<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WFACP_Compatibility_With_Theme_Brick {
	public function __construct() {
		/* checkout page */
		add_action( 'wfacp_none_checkout_pages', [ $this, 'force_execute_embed_shortcode' ], - 1 );
	}

	public function is_enabled() {
		if ( function_exists( 'bricks_is_builder' ) ) {
			return true;
		}

		return false;
	}

	public function force_execute_embed_shortcode() {
		if ( ! $this->is_enabled() || class_exists( 'WFACP_Template_loader' ) ) {
			return;
		}

		global $post;
		if ( is_null( $post ) || $post->post_type == WFACP_Common::get_post_type_slug() ) {
			return;
		}
		$panels_data = get_post_meta( $post->ID, '_bricks_page_content_2', true );;

		if ( empty( $panels_data ) ) {
			return;
		}
		$shortcodes     = json_encode( $panels_data );
		$start_position = strpos( $shortcodes, '[wfacp_forms' );
		if ( false === $start_position ) {
			return;
		}
		$shortcode_string = substr( $shortcodes, $start_position );
		$closing_position = strpos( $shortcode_string, ']', 1 );
		if ( false === $closing_position ) {
			return;
		}
		$shortcode_string = substr( $shortcodes, $start_position, $closing_position + 1 );
		if ( strlen( $shortcode_string ) <= 0 ) {
			return;
		}
		do_shortcode( $shortcode_string );

	}

}

if ( ! defined( 'BRICKS_VERSION' ) ) {

	return;
}

WFACP_Plugin_Compatibilities::register( new WFACP_Compatibility_With_Theme_Brick(), 'wfacp-brick' );
