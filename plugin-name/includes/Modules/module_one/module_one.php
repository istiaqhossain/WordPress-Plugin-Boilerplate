<?php
namespace Author\PluginName\Modules\Module_One;

/**
 * The Module_One Class
 */
class Module_One {

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

        if ( did_action( 'plugin_name_module_one_loaded' ) ) {
            return;
        }
        
        error_log("Module_One construct!");

        $this->plugin = $plugin;

        // Define constants
        $this->define_constants();

        // Loaded action
        do_action( 'plugin_name_module_one_loaded' );

    }

    /**
     * Define the plugin constants
     *
     * @return void
     */
    public function define_constants() {

        define( 'PLUGIN_NAME_MODULE_ONE_FILE', __FILE__ );

    }

}
