<?php
namespace Author\PluginName;

/**
 * The Installer Class
 */
class Installer {

    /**
     * Run on plugin activation
     *
     * @return void
     */
    public function run() {

        error_log('Installer Class run!');

        $this->add_version();

    }

    /**
     * Store plugin info
     *
     * @return void
     */
    public function add_version() {

        $installed = get_option( 'plugin_name_installed' );

        if ( !$installed ) {
            update_option( 'plugin_name_installed', time() );
        }

        update_option( 'plugin_name_version', PLUGIN_NAME_VERSION );

    }

}
