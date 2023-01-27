<?php

class WFACP_Compatibility_WoodMart_Theme {
	public function __construct() {
		add_action( 'init', [ $this, 'register_elementor_widget' ], 150 );
		add_action( 'wfacp_after_checkout_page_found', [ $this, 'action' ], 20 );
		add_action( 'wfacp_checkout_page_found', [ $this, 'remove_action' ] );
		add_action( 'wfacp_internal_css', [ $this, 'internal_css' ] );
	}

	public function remove_action() {
		if ( function_exists( 'woodmart_section_negative_gap' ) ) {
			remove_action( 'wp', 'woodmart_section_negative_gap' );
		}
	}

	public function action() {
		$this->clear_cache();
		add_filter( 'body_class', [ $this, 'remove_class' ] );
	}

	public function clear_cache() {
		$is_clear_cached = get_post_meta( WFACP_Common::get_id(), 'wfacp_woodmart_clear_cached', true );
		if ( 'yes' === $is_clear_cached ) {
			return;
		}
		if ( class_exists( 'Elementor\Plugin' ) ) {
			Elementor\Plugin::$instance->files_manager->clear_cache();
			update_post_meta( WFACP_Common::get_id(), 'wfacp_woodmart_clear_cached', 'yes' );
		}
	}

	public function remove_class( $body_class ) {

		$notification_key = array_search( "notifications-sticky", $body_class );
		if ( isset( $body_class[ $notification_key ] ) ) {
			unset( $body_class[ $notification_key ] );
		}


		return $body_class;
	}

	public function enable() {
		if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
			return false;
		}

		return true;
	}

	public function internal_css() {
		if ( ! $this->enable() ) {
			return;
		}
		$instance = wfacp_template();
		if ( ! $instance instanceof WFACP_Template_Common ) {
			return;
		}

		$bodyClass = "body";
		if ( 'pre_built' !== $instance->get_template_type() ) {

			$bodyClass = "body #wfacp-e-form ";
		}


		$cssHtml = "<style>";
		$cssHtml .= $bodyClass . ".select2-container--default .select2-selection--single .select2-selection__rendered{padding-right: 12px !important;padding-left: 12px !important;}";
		$cssHtml .= "</style>";
		echo $cssHtml;

	}


	public function register_elementor_widget() {
		if ( class_exists( 'Elementor\Plugin' ) ) {
			$instance = WFACP_Elementor::get_instance();
			$instance->initialize_widgets();
		}
	}
}

if ( ! function_exists( 'woodmart_load_classes' ) ) {
	return;
}

WFACP_Plugin_Compatibilities::register( new WFACP_Compatibility_WoodMart_Theme(), 'woodmart' );
