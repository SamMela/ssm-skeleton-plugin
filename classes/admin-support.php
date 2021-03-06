<?php

/**
 * Class interface to admin support functions for this plugin
 *
 * @package ___PACKAGE_NAME
 */

/**
 * This class admin support functions for this plugin
 *
 * @package ___PACKAGE_NAME
 * @since 1.0
 */
class __CLASSNAMEPREFIX_Admin_Support  extends __CLASSNAMEPREFIX_Base_Support{
	private $initiated 		= false;

	/**
	 * Constructor.
	 */
	public function __construct($plugin) {
		parent::__construct($plugin);
	}
	
	/**
	 * TOP LEVEL class initialization
	 */
	public function init() {
		$this->log(__FILE__ . "init\n");
		if ( ! $this->initiated ) {
			$this->init_hooks();
		}
	}


	/**
	 * Plugin Activation
	 */
	public function plugin_activation() {
		// $this->add_rewrite_rules();
		// flush_rewrite_rules();
	}

	/**
	 * Plugin DeActivation
	 */
	public function plugin_deactivation( ) {
		//tidy up
	}


	/**
	 * Initialize admin hooks
	 */
	public function init_hooks() 
	{
		$this->initiated = true;
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ));
		add_action( 'admin_notices', array( $this, 'display_notice' ) );
	}

	/**
	 * admin_init hook callback function for this class
	 */
	public function admin_init() {
			// $this->add_rewrite_rules();
	}

	/**
	 * admin_notices hook callback function for this class
	 */
	 public function display_notice() {
		 echo("Admin Notices go here");
	}

	public function admin_menu() {
		$this->load_menu();
	}


	public function load_menu() {

		// Create Page
		//add_plugins_page(
		add_options_page( 
			'Page Title 1',		// Page title
			'Menu Title 1', 		// Menu title
			'manage_options', 	// User capability
			'___skeleton-menu-1', 	// Menu/Page slug
			array($this,'display_page_1')
		); 


		/*		
		add_users_page( 
			'Page Title 1',		// Page title
			'Menu Title 1', 		// Menu title
			'manage_options', 	// User capability
			'___skeleton-menu-1', 	// Menu slug
			array($this,'display_page_1')
		); 
		*/

		// Register a setting
		register_setting(
			'option_group_1',
			'option_1_1'
		);

		// Register a setting
		register_setting(
			'option_group_1',
			'option_1_2'
		);

		// Register a setting
		register_setting(
			'option_group_2',
			'option_2_1'
		);

		
		// Create a section
		add_settings_section(
			'___section_1',			// ID for this section and to register options
			'___SECTION 1 TITLE',	// Title displayed on the administration page
			array($this,'section_1_callback'), 	// Callback to render description of the section
			'___skeleton-menu-1'			// Page on which to add this section of options
		);

		// Create ___field_1
		add_settings_field( 
			'___field_1',					// Field ID
			'___FIELD 1 LABEL',			// Label to the left of the option interface element
			array($this,'___field_1_callback'),	// function for rendering the option interface
			'___skeleton-menu-1',			// The page on which this option will be displayed
			'___section_1'					// Name of section to which this field belongs
		);
		
		// Create a field
		add_settings_field( 
			'___field_2',					// Field ID
			'___FIELD 2 LABEL',			// Label to the left of the option interface element
			array($this,'___field_2_callback'),	// function for rendering the option interface
			'___skeleton-menu-1',			// The page on which this option will be displayed
			'___section_1'					// Name of section to which this field belongs
		);
	

	
	}

	// Display SECTION
	public function section_1_callback() {
		echo "___SECTION_1 help/description goes here";
	}

		
	/**
	 * Callback function to display input form element for ___field_1
	 *
	 */	
	 	public function ___field_1_callback() {
		// get option ‘text_string’ value from the database
		$option_value = get_option("option_1_1");
		// echo the field
		echo "<input id='___field_1' name='option_1_1'	type='text' value='{$option_value}' />";
	}

	/**
	 * Callback function to display input form element for ___field_2
	 */
	public function ___field_2_callback() {
		// get option ‘text_string’ value from the database
		$option_value = get_option("option_1_2");
		// echo the field
		echo "<input id='___field_2' name='option_1_2'	type='text' value='{$option_value}' />";
	}

	/**
	 * Callback function to display page identified by ___skeleton-menu-1
	 */
	public function display_page_1() {
		
		global $wp_rewrite;
		
		echo("<div class=\"wrap\">");
		screen_icon();
		echo("<h2>PAGE TITLE 1</h2>");
		echo("<form action=\"options.php\" method=\"post\">");
		settings_fields('option_group_1');
		//settings_fields('option_group_2');
		do_settings_sections('___skeleton-menu-1');
		echo("<input name=\"submit\" type=\"submit\" value=\"Save Changes\" />");
		
		echo("</form>");
		
		echo("<pre>"); print_r($wp_rewrite); echo("</pre>");
		echo("</div>");
	}

	// Add rules
	public function add_rewrite_rules() 
	{
		// add_rewrite_rule( 'stores/?([^/]*)', 'index.php?pagename=stores & store_id=$matches[1]', 'top' );
	}

	/**
	 * Load resources
	 */
	public function load_resources() {
	}


	/**
	 * Add help to this page
	 *
	 * @return false if not the Akismet page
	 */
	public function admin_help() {
	}



}
?>