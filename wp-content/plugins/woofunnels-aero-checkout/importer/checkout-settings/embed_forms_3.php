<?php
$product_field  = WFACP_Common::get_product_field();
$advanced_field = WFACP_Common::get_advanced_fields();


$settings = [
	'show_on_next_step' => [
		'single_step' => [
			'billing_email'      => 'true',
			'billing_first_name' => 'false',
			'billing_last_name'  => 'false',
			'billing_phone'      => 'false',
		],
		'two_step'    => [
			'shipping-address'    => 'true',
			'address'             => 'true',
			'shipping_calculator' => 'true'
		]
	],
];

$customizer_data = [
	'wfacp_form' => [
		'wfacp_form_section_embed_forms_2_disable_steps_bar'                => false,
		'wfacp_form_section_embed_forms_2_select_type'                      => "tab",
		'wfacp_form_section_text_below_placeorder_btn'                      => __( "* 100% Secure &amp; Safe Payments *", 'woofunnels-aero-checkout' ),
		'wfacp_form_section_embed_forms_2_step_alignment'                   => "center",
		'wfacp_form_section_embed_forms_2_step_form_max_width'              => '450',
		'wfacp_form_section_embed_forms_2_active_step_bg_color'             => '#4c4c4c',
		'wfacp_form_section_embed_forms_2_active_step_text_color'           => '#ffffff',
		'wfacp_form_section_embed_forms_2_active_step_count_bg_color'       => '#ffffff',
		'wfacp_form_section_embed_forms_2_active_step_count_border_color'   => '#ffffff',
		'wfacp_form_section_embed_forms_2_active_step_tab_border_color'     => '#f58e2d',
		'wfacp_form_section_embed_forms_2_inactive_step_bg_color'           => '#f2f2f2',
		'wfacp_form_section_embed_forms_2_inactive_step_text_color'         => '#979090',
		'wfacp_form_section_embed_forms_2_inactive_step_count_bg_color'     => 'rgba(255,255,255,0)',
		'wfacp_form_section_embed_forms_2_inactive_step_count_text_color'   => '#d1d1d1',
		'wfacp_form_section_embed_forms_2_inactive_step_count_border_color' => '#d1d1d1',
		'wfacp_form_section_embed_forms_2_inactive_step_tab_border_color'   => '#ededed',
		'wfacp_form_section_embed_forms_2_active_step_count_text_color'     => '#4c4c4c',
		'wfacp_form_section_embed_forms_2_step_heading_font_size'           => [
			'desktop'      => '15',
			'tablet'       => '14',
			'mobile'       => '14',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		],
		'wfacp_form_form_fields_1_embed_forms_2_billing_first_name'         => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_billing_last_name'          => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_billing_city'               => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_billing_postcode'           => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_billing_country'            => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_billing_state'              => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_shipping_city'              => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_shipping_postcode'          => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_shipping_country'           => 'wfacp-col-left-half',
		'wfacp_form_form_fields_1_embed_forms_2_shipping_state'             => 'wfacp-col-left-half',
		'wfacp_form_section_embed_forms_2_field_border_width'               => '1',
		'wfacp_form_section_embed_forms_2_btn_order-place_bg_color'         => '#f58e2d',
		'wfacp_form_section_embed_forms_2_btn_order-place_text_color'       => '#ffffff',
		'wfacp_form_section_embed_forms_2_color_type'                       => 'hover',
		'wfacp_form_section_embed_forms_2_btn_order-place_bg_hover_color'   => '#d46a06',
		'wfacp_order_summary_section_embed_forms_2_order_summary_hide_img'  => true,
		'wfacp_form_section_embed_forms_2_sec_heading_color'                => '#424141',
		'wfacp_form_section_embed_forms_2_btn_order-place_btn_font_weight'  => 'bold',
		'wfacp_form_section_embed_forms_2_field_border_color'               => '#c3c0c0',
		'wfacp_form_section_embed_forms_2_heading_font_weight'              => 'wfacp-bold',
		'wfacp_form_section_embed_forms_2_heading_fs'                       => [
			'desktop'      => '18',
			'tablet'       => '18',
			'mobile'       => '18',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		],
		'wfacp_form_section_embed_forms_2_step_sub_heading_font_size'       => [
			'desktop'      => '13',
			'tablet'       => '12',
			'mobile'       => '12',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		],
		'wfacp_form_section_embed_forms_2_btn_next_btn_text'                => __( 'PROCEED TO NEXT STEP  →', 'woofunnels-aero-checkout' ),
		'wfacp_form_section_embed_forms_2_btn_order-place_btn_text'         => __( 'PLACE ORDER NOW ', 'woofunnels-aero-checkout' ),
		'wfacp_form_section_payment_methods_heading'                        => __( 'Payment method', 'woofunnels-aero-checkout' ),
		'wfacp_form_section_embed_forms_2_btn_back_btn_text'                => __( 'PROCEED TO FINAL STEP →', 'woofunnels-aero-checkout' ),

	],

];


$steps = [
	'single_step' => [
		'name'          => __( 'Step 1', 'woofunnels-aero-checkout' ),
		'slug'          => 'single_step',
		'friendly_name' => __( 'Single Step Checkout', 'woofunnels-aero-checkout' ),
		'active'        => 'yes',
	],
	'two_step'    => [
		'name'          => __( 'Step 2', 'woofunnels-aero-checkout' ),
		'slug'          => 'two_step',
		'friendly_name' => __( 'Two Step Checkout', 'woofunnels-aero-checkout' ),
		'active'        => 'yes',
	],
	'third_step'  => [
		'name'          => __( 'Step 3', 'woofunnels-aero-checkout' ),
		'slug'          => 'third_step',
		'friendly_name' => __( 'Three Step Checkout', 'woofunnels-aero-checkout' ),
		'active'        => 'yes',
	],
];


$pageLayout = [
	'steps'                       => $steps,
	'fieldsets'                   => [

		'single_step' => [
			[
				'name'        => __( 'Your Products', 'woofunnels-aero-checkout' ),
				'sub_heading' => '',
				'class'       => '',
				'html_fields' => [
					'product_switching' => 'true',
				],
				'fields'      => [
					$product_field['product_switching'],

				],

			],
			[
				'name'        => __( 'Customer Information', 'woofunnels-aero-checkout' ),
				'class'       => '',
				'sub_heading' => '',
				'fields'      => [
					[
						'label'        => __( 'Email', 'woocommerce' ),
						'required'     => 'true',
						'type'         => 'email',
						'class'        => [ 'form-row-wide', ],
						'validate'     => [ 'email', ],
						'autocomplete' => 'email username',
						'priority'     => '110',
						'id'           => 'billing_email',
						'field_type'   => 'billing',
						'placeholder'  => __( 'john.doe@example.com ', 'woofunnels-aero-checkout' ),
					],
					[
						'label'        => __( 'First name', 'woocommerce' ),
						'required'     => 'true',
						'class'        => [ 'form-row-first', ],
						'autocomplete' => 'given-name',
						'priority'     => '10',
						'type'         => 'text',
						'id'           => 'billing_first_name',
						'field_type'   => 'billing',
						'placeholder'  => __( 'John', 'woofunnels-aero-checkout' ),
					],
					[
						'label'        => __( 'Last name', 'woocommerce' ),
						'required'     => 'true',
						'class'        => [ 'form-row-last', ],
						'autocomplete' => 'family-name',
						'priority'     => '20',
						'type'         => 'text',
						'id'           => 'billing_last_name',
						'field_type'   => 'billing',
						'placeholder'  => __( 'Doe', 'woofunnels-aero-checkout' ),
					],
					[
						'label'        => __( 'Phone', 'woocommerce' ),
						'type'         => 'tel',
						'class'        => [ 'form-row-wide' ],
						'id'           => 'billing_phone',
						'field_type'   => 'billing',
						'validate'     => [ 'phone' ],
						'placeholder'  => '999-999-9999',
						'autocomplete' => 'tel',
						'priority'     => 100,
					],
				],
			],
		],
		'two_step'    => [
			[
				'name'        => __( 'Shipping Address', 'woofunnels-aero-checkout' ),
				'class'       => '',
				'sub_heading' => '',
				'html_fields' => [ 'shipping_calculator' => true ],
				'fields'      => [
					WFACP_Common::get_single_address_fields( 'shipping' ),
					WFACP_Common::get_single_address_fields(),
					isset( $advanced_field['shipping_calculator'] ) ? $advanced_field['shipping_calculator'] : []
				],
			],

		],
		'third_step'  => [
			[
				'name'        => __( 'Order summary', 'woofunnels-aero-checkout' ),
				'sub_heading' => '',
				'class'       => '',
				'html_fields' => [
					'order_coupon'  => 'true',
					'order_summary' => 'true',
				],
				'fields'      => [
					$advanced_field['order_coupon'],
					$advanced_field['order_summary']
				],

			],


		]
	],
	'product_settings'            => [
		'coupons'                             => '',
		'enable_coupon'                       => 'false',
		'disable_coupon'                      => 'false',
		'hide_quantity_switcher'              => 'true',
		'enable_delete_item'                  => 'false',
		'hide_product_image'                  => 'false',
		'is_hide_additional_information'      => 'true',
		'additional_information_title'        => WFACP_Common::get_default_additional_information_title(),
		'hide_quick_view'                     => 'true',
		'hide_you_save'                       => 'true',
		'hide_best_value'                     => 'false',
		'best_value_product'                  => '',
		'best_value_text'                     => 'Best Value',
		'best_value_position'                 => 'above',
		'enable_custom_name_in_order_summary' => 'false',
		'autocomplete_enable'                 => 'false',
		'autocomplete_google_key'             => '',
		'preferred_countries_enable'          => 'false',
		'preferred_countries'                 => '',
		'product_switcher_template'           => 'default',
	],
	'have_coupon_field'           => 'true',
	'have_billing_address'        => 'true',
	'have_shipping_address'       => 'true',
	'have_billing_address_index'  => '7',
	'have_shipping_address_index' => '6',
	'enabled_product_switching'   => 'yes',
	'have_shipping_method'        => 'true',
	'current_step'                => 'third_step',
];


$product_settings                     = [];
$product_settings['settings']         = $pageLayout['product_settings'];
$product_settings['products']         = [];
$product_settings['default_products'] = [];

return [
	'default_customizer_value'       => $customizer_data,
	'page_layout'                    => $pageLayout,
	'page_settings'                  => $settings,
	'wfacp_product_switcher_setting' => $product_settings,
];
