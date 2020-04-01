<?php
namespace Author\PluginName\Modules\Module_Two;

/**
 * The Module_Two Class
 */
class Module_Two {

    /**
     * @var mixed
     */
    private $plugin;

    /**
     * Construct Class
     *
     * @param \Plugin_Name $plugin
     */
    public function __construct( \Plugin_Name $plugin ) {

        if ( did_action( 'plugin_name_module_two_loaded' ) ) {
            return;
        }
        
        error_log("Module_Two construct!");

        $this->plugin = $plugin;

        // Define constants
        $this->define_constants();

        // Loaded action
        do_action( 'plugin_name_module_two_loaded' );

    }

    /**
     * Define the plugin constants
     *
     * @return void
     */
    public function define_constants() {

        define( 'PLUGIN_NAME_MODULE_TWO_FILE', __FILE__ );

    }

}
