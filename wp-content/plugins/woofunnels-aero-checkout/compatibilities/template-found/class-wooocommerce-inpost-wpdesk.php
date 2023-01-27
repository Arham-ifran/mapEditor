<?php

/**
 * WooCommerce InPost
 * By WP Desk
 *
 */
class WFACP_Shipping_Packzkomaty_impost {
	public function __construct() {
		add_action( 'wfacp_after_template_found', [ $this, 'remove_action' ] );
		add_action( 'wfacp_internal_css', [ $this, 'add_internal_css' ] );

	}

	public function is_enabled() {
		if ( ! class_exists( 'WPDesk_Paczkomaty_Checkout' ) ) {
			return false;
		}

		return true;
	}

	public function remove_action() {

		if ( ! $this->is_enabled() ) {
			return;
		}

		$instance = WFACP_Common::remove_actions( 'woocommerce_review_order_after_shipping', 'WPDesk_Paczkomaty_Checkout', 'woocommerce_review_order_after_shipping' );
		if ( method_exists( $instance, 'woocommerce_review_order_after_shipping' ) && $instance instanceof WPDesk_Paczkomaty_Checkout ) {
			add_action( 'wfacp_woocommerce_review_order_after_shipping', array( $instance, 'woocommerce_review_order_after_shipping' ) );
		}


		$instance_obj = WFACP_Common::remove_actions( 'woocommerce_review_order_after_shipping', 'WPDesk_Paczkomaty_Checkout', 'display_choose_machine_field' );
		if ( method_exists( $instance_obj, 'display_choose_machine_field' ) && $instance_obj instanceof WPDesk_Paczkomaty_Checkout ) {
			add_action( 'wfacp_woocommerce_review_order_after_shipping', array( $instance_obj, 'display_choose_machine_field' ) );

		}
	}

	public function add_internal_css() {
		if ( ! $this->is_enabled() || ! function_exists( 'wfacp_template' ) ) {
			return;
		}


		$instance = wfacp_template();
		if ( ! $instance instanceof WFACP_Template_Common ) {
			return;
		}
		$bodyClass = "body ";


		if ( 'pre_built' !== $instance->get_template_type() ) {

			$bodyClass = "body #wfacp-e-form ";
		}

		echo "<style>";
		echo $bodyClass . '#wfacp_checkout_form .paczkomaty-shipping select{width: 100%;margin-bottom:10px;}';
		echo $bodyClass . '#wfacp_checkout_form .paczkomaty-shipping .select2-container{width: 100% !important;}';
		echo $bodyClass . '#wfacp_checkout_form .paczkomaty-shipping {border-bottom: 0;}';
		echo $bodyClass . '#wfacp_checkout_form #open-geowidget{display: inline-block;margin-top: 10px;}';


		echo "</style>";

	}
}

if ( ! defined( 'WOOCOMMERCE_PACZKOMATY_INPOST_VERSION' ) ) {
	return;
}
WFACP_Plugin_Compatibilities::register( new WFACP_Shipping_Packzkomaty_impost(), 'wc-inpost' );

