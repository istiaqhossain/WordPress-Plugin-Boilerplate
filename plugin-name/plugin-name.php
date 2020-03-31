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

// don't call the file directly

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The main plugin class
 */
final class Plugin_Name {

    /**
     * Plugin Version
     *
     * @var string
     */
    const VERSION = '0.0.1';

    /**
     * Holds various class instances
     *
     * @var array
     */
    private $container = array();

    /**
     * Plugin Instance
     *
     * @var object
     */
    private static $instance;

    /**
     * Initializes a Singleton Instance
     *
     * Checks for an existing Plugin_Name() instance
     * and if it doesn't find one, creates it.
     *
     * @return \Plugin_Name
     */
    public static function init() {

        if ( !isset( self::$instance ) && !( self::$instance instanceof Plugin_Name ) ) {
            self::$instance = new Plugin_Name;
            self::$instance->setup();
        }

        return self::$instance;

    }

    /**
     * Setup the plugin
     *
     * @return void
     */
    private function setup() {

        // Define constants
        $this->define_constants();

        // Include reduired files
        $this->includes();

        register_activation_hook( __FILE__, array( $this, 'activate' ) );

        // Instantiate classes
        $this->instantiate();

        // Load the modules
        $this->load_module();

        // Loaded action
        do_action( 'plugin_name_loaded' );

    }

    /**
     * Magin getter
     *
     * @param $prop
     *
     * @return mixed
     */
    public function __get( $prop ) {

        if ( array_key_exists( $prop, $this->container ) ) {
            return $this->container[$prop];
        }

        return $this->{$prop};

    }

    /**
     * Magic isset
     *
     * @param $prop
     *
     * @return mixed
     */
    public function __isset( $prop ) {

        return isset( $this->{$prop} ) || isset( $this->container[$prop] );

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
        define( 'PLUGIN_NAME_MODULES', PLUGIN_NAME_PATH . '/modules' );

    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {

        $installer = new \Author\Plugin_Name\Installer();
        $installer->run();

    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function instantiate() {

        new \Author\Plugin_Name\Assets();

        $this->container['modules'] = new \Author\Plugin_Name\Framework\Modules();

    }

    private function includes() {

        include dirname( __FILE__ ) . '/vendor/autoload.php';

    }

    /**
     * Load the modules
     *
     * @return void
     */
    public function load_module() {

        // $modules = $this->modules->get_modules();

        // if ( $modules == false ) {
        //     return;
        // }

        // foreach ( $modules as $key => $module ) {

        //     if ( isset( $module['callback'] ) && class_exists( $module['callback'] ) ) {
        //         new $module['callback']( $this );
        //     }

        // }
        
        // require_once __DIR__ . '/modules/module-one/module-one.php';
        // $module = new \Author\Plugin_Name\ModuleOne\Module_One($this);
        // dd($module);

    }

}

/**
 * Initializes the main plugin
 *
 * @return \Plugin_Name
 */
function plugin_name() {

    return Plugin_Name::init();

}

// kick-off the plugin
plugin_name();