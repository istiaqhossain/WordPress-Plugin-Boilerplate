<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             0.0.1
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.0.1
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

final class Plugin_Name {

    /**
     * Plugin Version
     *
     * @var string
     */
    const VERSION = '0.0.1';

    /**
     * Class Constructor
     */
    private function __construct() {

    }

    /**
     * Initializes a Singleton Instance
     *
     * @return \Plugin_Name
     */
    public static function init() {

        /**
         * @var mixed
         */
        static $instance = false;

        if ( $instance === false ) {
            $instance = new self();
        }

        return $instance;

    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        
        define( 'PLUGIN_NAME_VERSION', self::VERSION );
        define( 'PLUGIN_NAME_FILE', __FILE__ );
        define( 'PLUGIN_NAME_PATH', __DIR__ );
        define( 'PLUGIN_NAME_URL', plugins_url( '', PLUGIN_NAME_FILE ) );
        define( 'PLUGIN_NAME_ASSETS', PLUGIN_NAME_URL . '/assets' );

    }

}

/**
 * Initializes the plugin
 *
 * @return \Plugin_Name
 */
function plugin_name() {

    return Plugin_Name::init();

}

// kick-off the plugin
plugin_name();