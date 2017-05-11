<?php
/**
 * Plugin Name: IM Front End Form Extension for ACF (Free)
 * Description: The Front End Form Plugin brings the awesomeness, and ease of use, of the Advanced Custom Fields Plugin for WordPress into the front end by generating a shortcode for each Field Group you create in ACF. But it's not just for creating a basic contact form. You can create quizes, interactive questionnaires, support request systems integrated with the Project Manager Plugin and more...
 * Author: Iterate Marketing
 * Author URI: http://www.iteratemarketing.com
 * Plugin URI: http://www.iteratemarketing.com
 * Version: 1.0.11
 */
define( 'ACFFEF_FREE_VERSION', '1.0.11');

function acffef_dependency_active($dependency) {
	$acffef_dep_active = false;

	switch($dependency) {
		case 'acffef-premium':
			$acffef_dep_active = (defined('TPCP_ACFFEF_ROOT') && is_plugin_active( ltrim( strrchr( rtrim( TPCP_ACFFEF_ROOT, '/'), '/'), '/' ) . '/acf-frontend-form-premium.php' ));
			break;
		case 'cpt-ui':
			$acffef_dep_active = (defined('CPT_VERSION') && defined('CPTUI_WP_VERSION'));
			break;
		case 'acf':
			$acffef_dep_active = (array_key_exists( 'acf/helpers/get_dir', $GLOBALS['wp_filter'] ) || array_key_exists( 'acf/get_valid_field', $GLOBALS['wp_filter'] ));
			break;
		case 'acf-pro':
			$acffef_dep_active = (array_key_exists( 'acf/get_valid_field', $GLOBALS['wp_filter'] ));
			break;
		default:
			break;
	};

	return $acffef_dep_active;
}


require_once( dirname( __FILE__ ). '/classes/ACFFrontendFormAdminRawScripts.php' );
require_once( dirname( __FILE__ ). '/classes/ACFFrontendFormAdminNotices.php' );
require_once( dirname( __FILE__ ). '/classes/ACFFrontendFormActivation.php' );
require_once( dirname( __FILE__ ). '/classes/ACFFrontendFormPointers.php' );
require_once( dirname( __FILE__ ). '/classes/ACFFrontendForm.php' );
ACFFrontendForm::instance( );
ACFFrontendFormPointers::instance( );
ACFFrontendFormAdminRawScripts::instance();
ACFFrontendFormAdminNotices::instance();
ACFFrontendFormActivation::instance();

register_activation_hook( __FILE__,  'acffef_free_activation_hook');

function acffef_free_activation_hook() {
	ACFFrontendFormActivation::intro_notice();
}

$current_version = get_option( 'acffef_free_version' );
if (!is_string($current_version) || $current_version != ACFFEF_FREE_VERSION) {
	update_option('acffef_free_version', ACFFEF_FREE_VERSION);
}
function add_custom_styles() {
    wp_enqueue_style( 'ACFFEF-custom', plugin_dir_url( __FILE__ ) .'assets/css/ACFFEF-custom.css ');
	  wp_enqueue_script( 'ACFFEF-custom', plugin_dir_url( __FILE__ ) .'assets/js/ACFFEF-custom.js','','',true );
}
add_action( 'wp_enqueue_scripts', 'add_custom_styles' );
?>
