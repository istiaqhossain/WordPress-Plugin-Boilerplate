<?php
namespace Author\PluginName\Framework;

/**
 * The Modules Class
 */
class Modules {

    /**
     * Hold the modules
     *
     * @var
     */
    protected $modules;

    /**
     * Initialize
     */
    public function __construct() {

        $this->init_modules();

    }

    public function init_modules() {

        $this->modules = array(
            'module-one' => array(
                'title'       => __( 'Module One', 'plugin-name' ),
                'slug'        => 'plugin-name-module-one',
                'description' => __( 'Module One Description', 'plugin-name' ),
                'callback'    => '\Author\PluginName\Modules\Module_One\Module_One',
                'modules'     => apply_filters( 'plugin_name_module_one_modules', array() ),
            ),
            'module-two' => array(
                'title'       => __( 'Module Two', 'plugin-name' ),
                'slug'        => 'plugin-name-module-two',
                'description' => __( 'Module Two Description', 'plugin-name' ),
                'callback'    => '\Author\PluginName\Modules\Module_Two\Module_Two',
                'modules'     => apply_filters( 'plugin_name_module_two_modules', array() ),
            ),
        );

    }

    /**
     * Get all the registered modules
     *
     * @return void
     */
    public function get_modules() {

        return apply_filters( 'plugin_name_get_modules', $this->modules );

    }

    /**
     * Get a module
     * 
     * @param $module
     * 
     * @return mixed
     */
    public function get_module( $module ) {

        if ( array_key_exists( $module, $this->modules ) ) {
            return $this->modules[$module];
        }

        return false;

    }

}
