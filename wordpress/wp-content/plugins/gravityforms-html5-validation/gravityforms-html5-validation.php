<?php
/*
Plugin Name: Gravity Forms HTML5 Validation
Plugin URI: http://www.isoftware.gr/wordpress/plugins/gravityforms-html5-validation
Description: Adds native HTML5 validation support to Gravity Forms' fields. Javascript & jQuery are required.
Version: 2.3
Author: iSoftware
Author URI: http://www.isoftware.gr

------------------------------------------------------------------------
Copyright 2014 iSoftware Greece.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

if ( !class_exists('GFHtml5Validation')) :

class GFHtml5Validation {

	protected $_version = "2.3";
	protected $_min_gravityforms_version = "1.7.8";
	protected $_slug = "html5_validation";
	protected $_full_path = __FILE__;
	protected $_title = "Gravity Forms HTML5 Validation";
	protected $_short_title = "HTML5 Validation";

	private $_strings = null;

    /**
     * Class constructor which hooks the instance into the WordPress init action
     */
    public function __construct() {
        add_action('init', array(&$this, 'init'));
        $this->pre_init();
    }

	//--------------  Initialization functions  ---------------------------------------------------

	/**
	 * Add tasks or filters here that you want to perform during the class constructor - before WordPress has been completely initialized
	 */
	public function pre_init(){

		// Initialize our path
		$this->_path =  dirname(__FILE__);

		$this->_strings = array();
	
	}

	/**
	 * Plugin starting point. Handles hooks and loading of language files.
	 */
	public function init() {

		// load_plugin_textdomain($this->_slug, FALSE, $this->_slug . '/languages');

		if( defined('RG_CURRENT_PAGE') && RG_CURRENT_PAGE == 'admin-ajax.php' ) {

			// If gravity forms is supported, initialize AJAX
			if($this->is_gravityforms_supported()){
				$this->init_ajax();
			}

		} else if (is_admin()) {

			$this->init_admin();

		} else {

			if($this->is_gravityforms_supported()){
				$this->init_frontend();
			}
		}

	}


	/** 
	 * add tasks or filters here that you want to perform both in the backend and frontend and for ajax requests
	 */
	public function init_ajax(){
		
		// STOP HERE IF GRAVITY FORMS IS NOT SUPPORTED
		if (isset($this->_min_gravityforms_version) && !$this->is_gravityforms_supported($this->_min_gravityforms_version))
			return;

	}

	/** 
	 * add tasks or filters here that you want to perform only in admin
	 */
	public function init_admin(){
	 
		// STOP HERE IF GRAVITY FORMS IS NOT SUPPORTED
		if (isset($this->_min_gravityforms_version) && !$this->is_gravityforms_supported($this->_min_gravityforms_version))
			return;
	
	}

	/** 
	 * add tasks or filters here that you want to perform only in the front end
	 */
	public function init_frontend(){
		
		// STOP HERE IF GRAVITY FORMS IS NOT SUPPORTED
		if (isset($this->_min_gravityforms_version) && !$this->is_gravityforms_supported($this->_min_gravityforms_version))
			return;

		// enqueue frontend scripts
		add_action('gform_enqueue_scripts', array(&$this, 'enqueue_scripts_frontend'), 10, 2);

		// We use this filter to manipulate our own field editor settings output
		add_filter( 'gform_field_content', array( &$this, 'get_field_content'), 10, 3);

	}

	//--------------  Action / Filter Target functions  ---------------------------------

	protected function log( $message , $attachment = null){

		if (!$this->_debug) return;

		if (defined('DOING_AJAX') ) {
			$call_mode = "WP_AJAX";
		}elseif ( defined('RG_CURRENT_PAGE') && RG_CURRENT_PAGE == 'admin-ajax.php') {
			$call_mode = "GF_AJAX";
		}else {
			$call_mode = "NORMAL";
		}
		
		$user_mode = defined('IS_ADMIN') ? "ADMIN" 	: "NORMAL";

		$timestamp = date("Y-m-d H:i:s");
		$log  = "[ {$timestamp} ][ $call_mode ][ $user_mode ][ $message ]\r\n\n";

		if (isset($attachment) ){

			$type = gettype($attachment);
			switch ($type) {
				case 'array':
				case 'object':
					$log .= print_r($attachment, true);
					break;
				
				default:
					$log .= (string) $attachment;
					break;
			}
			$log .= "\r\n\n";
		}

		$logfile = $this->get_base_path() . '/debug.log';
		file_put_contents ( $logfile , $log , FILE_APPEND);
	}

	/**
	* Target of gform_field_content both on form editor & frontend.
	*/
	public function get_field_content( $field_content, $field, $force_frontend_label ){
	
		if ( !isset($field_content) || !$this->is_gravityforms_html5_enabled() || !isset($field) || !array_key_exists('formId', $field) ) 
			return $field_content;

		if( !isset($field['isRequired']) || !$field['isRequired'])
            return $field_content;

		// Current Field Attributes
		$form_id = $field['formId'];
		$field_id = $field['id'];
		$field_type = $field['type'];

		$field_uid = "input_{$form_id}_{$field_id}";

		
		// Handle Field Content Encoding
		$encoding = mb_detect_encoding( $field_content );
		if ($encoding != "UTF-8")
			$field_content = mb_convert_encoding( $field_content, 'UTF-8');
		$field_content_wrapped = "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /></head><body>$field_content</body></html>";

		// Disable libxml error output while we are processing html
		$use_errors = libxml_use_internal_errors(true);

		// Prepare Dom Document and XPath		
		$doc = new DomDocument();   
		$doc->preserveWhiteSpace = false; // needs to be before loading, to have any effect
		$doc->formatOutput = false;
	   @$doc->loadHTML( $field_content_wrapped );
		$xpath = new DOMXpath($doc);

		switch( $field_type ){
            case 'text':
            case 'textarea':
            case 'number':
            case 'select':
            case 'multiselect':
            case 'phone':
            case 'website':
            	$field_type_map = array( "select" => "select", "multiselect" => "select", "textarea" =>"textarea" );
				$lookup_type = array_key_exists( $field_type, $field_type_map ) ? $field_type_map[$field_type] : 'input' ;
				if( $input = (( $result = $xpath->query("//{$lookup_type}[@id='{$field_uid}']")) ? $result->item(0) : null )){
					$input->setAttribute('required', 'required');
				}

				break;

			case 'email':

				// Process Email 
			 	if( $input = (( $result = $xpath->query("//input[@id='{$field_uid}']")) ? $result->item(0) : null ) ){
					$input->setAttribute('required', 'required');
				}
			
				if ( isset($field['emailConfirmEnabled']) && $field['emailConfirmEnabled']) {

					if( $input = (( $result = $xpath->query("//input[@id='{$field_uid}_2']")) ? $result->item(0) : null ) ){
						$input->setAttribute('required', 'required');
					}

				}

				break;

			case 'name':

				if (isset($field['nameFormat'])){

					switch ($field['nameFormat']) {
						case 'simple':
						
							if( $input = (( $result = $xpath->query("//input[@id='{$field_uid}']")) ? $result->item(0) : null ) ){
								$input->setAttribute('required', 'required');
							}
						
							break;

						case 'normal':
						case 'extended':

							// Process Name Prefix
							if( $field['nameFormat'] == 'extended' ){

								if( $input = (( $result = $xpath->query("//input[@id='{$field_uid}_2']")) ? $result->item(0) : null ) ){
									$input->setAttribute('required', 'required');
								}

							}

							// Process Name First 
							if( $input = (( $result = $xpath->query("//input[@id='{$field_uid}_3']")) ? $result->item(0) : null ) ){
								$input->setAttribute('required', 'required');
							}


							// Process Name Last
							if( $input = (( $result = $xpath->query("//input[@id='{$field_uid}_6']")) ? $result->item(0) : null ) ){
								$input->setAttribute('required', 'required');
							}

						
							// Process Name Suffix
							if( $field['nameFormat'] == 'extended' ){

								if( $input = (( $result = $xpath->query("//input[@id='{$field_uid}_8']")) ? $result->item(0) : null ) ){
									$input->setAttribute('required', 'required');
								}

							}
							break;
					}
				
				}
				break;

		}
		
		$field_content = $doc->SaveHTML();

		// Remove our html wrapper from processed field
		$field_content = str_replace( 
			array('<html>', '</html>', '<head>', '</head>', "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">", '<body>', '</body>'), 
			array('', '', '', '', '', '', ''),
			$field_content
		);

		$field_content = trim(preg_replace('/^<!DOCTYPE.+?>/', '', $field_content));
 
 		// Check if we are currently on ajax and fix double quotes to single.
		if( defined('RG_CURRENT_PAGE') && RG_CURRENT_PAGE == 'admin-ajax.php' ) {

			// Replace non escaped double quotes with single quotes for ajax support
			$matches = array();
			preg_match_all('/"[^"\\\\]*(?:\\\\.[^"\\\\]*)*"/s', $field_content, $matches);
			if (count($matches[0]) > 0) {
				foreach ($matches[0] as $match) {
					$replace = "'" . substr($match, 1 , strlen($match) - 2 ) . "'";
					$field_content = str_replace( $match, $replace, $field_content);
				}
			}

		}

		// Renable libxml error handling
		libxml_use_internal_errors($use_errors);

		return $field_content;

	}

	/**
	* Target of wp_enqueue_scripts hooks.
	*/
	public function enqueue_scripts_frontend( $form = "", $ajax = false ){
		
		// Register our scripts and styles
		wp_register_script('gravityforms-html5-validation', $this->get_base_url() . "/js/gravityforms-html5-validation.js",	'jquery', $this->_version, false );
		wp_enqueue_script( 'gravityforms-html5-validation');
	}

	/**
	* Target of admin_enqueue_scripts.
	*/
	public function enqueue_scripts_admin(){}

	//--------------  Helper functions  ---------------------------------------------------

	/**
	 * Returns the url of the root folder of the current Add-On.
	 *
	 * @param string $full_path Optional. The full path the the plugin file.
	 * @return string
	 */
	protected function get_base_url( $full_path = "" ) {
		if (empty($full_path))
			$full_path = $this->_full_path;

		return plugins_url(null, $full_path);
	}
	
	/**
	 * Returns the path of the root folder of the current Add-On.
	 *
	 * @param string $full_path Optional. The full path the the plugin file.
	 * @return string
	 */
	protected function get_base_path( $full_path = "" ) {
		if (empty($full_path))
			$full_path = $this->_full_path;

		return plugin_dir_path($full_path);
	}

	/**
	 * Returns an html formatted form tooltip.
	 *
	 * @param string $title The tooltip title.
	 * @param string $description The tooltip title.
	 * @return string
	 */
	protected function generate_tooltip( $title, $description ){
		$tooltip = "";
		if (is_string($title))
			$tooltip .= "<h6>{$title}</h6>";
		if (is_string($description))
			$tooltip .= $description;
		return $tooltip;
	}
	
	protected function get_string( $name ){
		if (is_array($this->_strings) && array_key_exists( $name, $this->_strings))
			return $_strings[$name];
		return "";
	}

	/**
	* Render a Template File
	*
	* @param $filePath
	* @param null $viewData
	* @param false $echo
	* @return string
	*/
	protected function get_template_part( $template_filename, $view_data = null) {
	 
		( $view_data ) ? extract( $view_data ) : null;
	 
		ob_start();
		include ( $this->get_base_path() . DIRECTORY_SEPARATOR  . "templates" . DIRECTORY_SEPARATOR . $template_filename );
		$template = ob_get_contents();
		ob_end_clean();

		return $template;
	}

	/**
	 * Checks whether the Gravity Forms is installed.
	 *
	 * @return bool
	 */
	public function is_gravityforms_installed() {
		return class_exists("GFForms");
	}

	/**
	 * Checks whether the Gravity Forms html5 output is enabled.
	 *
	 * @return bool
	 */
	public function is_gravityforms_html5_enabled(){
		return class_exists("RGFormsModel") && RGFormsModel::is_html5_enabled();
	}
	
	/**
	 * Checks whether the current version of Gravity Forms is supported
	 *
	 * @param $min_gravityforms_version
	 * @return bool|mixed
	 */
	public function is_gravityforms_supported($min_gravityforms_version = "") {
		if(isset($this->_min_gravityforms_version) && empty($min_gravityforms_version))
			$min_gravityforms_version = $this->_min_gravityforms_version;

		if(empty($min_gravityforms_version))
			return true;

		if (class_exists("GFCommon")) {
			$is_correct_version = version_compare(GFCommon::$version, $min_gravityforms_version, ">=");
			return $is_correct_version;
		} else {
			return false;
		}
	}

}
new GFHtml5Validation();

endif;

if(!function_exists('dflt')):
function dflt( $object , $property = null, $default = "" ){

	$type = gettype($object);
	switch ($type) {
		
		case 'NULL':
			return $default;
			break;

		case 'object':
			if(!is_string( $property ))
				return $object;

			if(isset( $object->$property ))
		        return $object->$property;
			
			break;
		
		case 'array':
			if(!is_string( $property ))
				return $object;

			if(array_key_exists( $property, $object ))
		       	return $object[$property];
		
			break;

		default:
			return $object;
			break;

	}

	return $default;

}

endif;