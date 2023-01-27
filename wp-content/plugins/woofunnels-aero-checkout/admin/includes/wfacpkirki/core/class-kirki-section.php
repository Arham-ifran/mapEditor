<?php
/**
 * Handles sections created via the WFACPKirki API.
 *
 * @package     WFACPKirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

/**
 * Each section is a separate instrance of the WFACPKirki_Section object.
 */
class WFACPKirki_Section {

	/**
	 * An array of our section types.
	 *
	 * @access private
	 * @var array
	 */
	private $section_types = array();

	/**
	 * The object constructor.
	 *
	 * @access public
	 * @param array $args The section parameters.
	 */
	public function __construct( $args ) {

		$this->section_types = apply_filters( 'wfacpkirki_section_types', $this->section_types );
		$this->add_section( $args );

	}

	/**
	 * Adds the section using the WordPress Customizer API.
	 *
	 * @access public
	 * @param array $args The section parameters.
	 */
	public function add_section( $args ) {

		global $wp_customize;

		// The default class to be used when creating a section.
		$section_classname = 'WP_Customize_Section';

		if ( isset( $args['type'] ) && array_key_exists( $args['type'], $this->section_types ) ) {
			$section_classname = $this->section_types[ $args['type'] ];
		}
		if ( isset( $args['type'] ) && 'wfacpkirki-outer' === $args['type'] ) {
			$args['type']      = 'outer';
			$section_classname = 'WP_Customize_Section';
		}

		// Add the section.
		$wp_customize->add_section( new $section_classname( $wp_customize, sanitize_key( $args['id'] ), $args ) );

	}
}
