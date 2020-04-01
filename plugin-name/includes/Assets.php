<?php
namespace Author\PluginName;

/**
 * Asset handler class
 */
class Assets {

    /**
     * Class Constructor
     */
    public function __construct() {

        error_log('Assets Class run!');

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

    }

    /**
     * Enqueue Frontend Scripts
     *
     * @return void
     */
    public function enqueue_frontend_scripts() {

        $styles = $this->get_styles()['frontend'];

        foreach ( $styles as $handler => $style ) {
            wp_register_style(
                $handler,
                $style['src'],
                false,
                $style['version'],
                false
            );

            wp_enqueue_style( $handler );
        }

        $scripts = $this->get_scripts()['frontend'];

        foreach ( $scripts as $handler => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script(
                $handler,
                $script['src'],
                $deps,
                $script['version'],
                true
            );

            wp_enqueue_script( $handler );
        }

    }

    /**
     * Enqueue Admin Scripts
     *
     * @return void
     */
    public function enqueue_admin_scripts() {

        $styles = $this->get_styles()['admin'];

        foreach ( $styles as $handler => $style ) {
            wp_register_style(
                $handler,
                $style['src'],
                false,
                $style['version'],
                false
            );

            wp_enqueue_style( $handler );
        }

        $scripts = $this->get_scripts()['admin'];

        foreach ( $scripts as $handler => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script(
                $handler,
                $script['src'],
                $deps,
                $script['version'],
                true
            );

            wp_enqueue_script( $handler );
        }

    }

    /**
     * Plugin Stylesheets
     *
     * @return array
     */
    public function get_styles() {

        return array(
            'admin'    => array(
                'plugin-name-admin' => array(
                    'src'     => PLUGIN_NAME_ASSETS . '/css/plugin_name_admin.css',
                    'version' => filemtime( PLUGIN_NAME_PATH . '/assets/css/plugin_name_admin.css' ),
                ),
            ),
            'frontend' => array(
                'plugin-name-frontend' => array(
                    'src'     => PLUGIN_NAME_ASSETS . '/css/plugin_name_frontend.css',
                    'version' => filemtime( PLUGIN_NAME_PATH . '/assets/css/plugin_name_frontend.css' ),
                ),
            ),
        );

    }

    public function get_scripts() {
        return array(
            'admin'    => array(
                'plugin-name-admin' => array(
                    'src'     => PLUGIN_NAME_ASSETS . '/js/plugin_name_admin.js',
                    'version' => filemtime( PLUGIN_NAME_PATH . '/assets/js/plugin_name_admin.js' ),
                    'deps'    => array( 'jquery' ),
                ),
            ),
            'frontend' => array(
                'plugin-name-frontend' => array(
                    'src'     => PLUGIN_NAME_ASSETS . '/js/plugin_name_frontend.js',
                    'version' => filemtime( PLUGIN_NAME_PATH . '/assets/js/plugin_name_frontend.js' ),
                    'deps'    => array( 'jquery' ),
                ),
            ),
        );
    }

}
