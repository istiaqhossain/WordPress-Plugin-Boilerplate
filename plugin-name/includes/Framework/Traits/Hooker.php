<?php
namespace Author\Plugin_Name\Framework\Traits;

/**
 * Trait Hooker
 */
trait Hooker {

    /**
     * Hooks a function on to a specific action.
     *
     * @param string $tag
     * @param $function
     * @param int $priority
     * @param int $accepted_args
     *
     * @return void
     */
    public function action( $tag, $function, $priority = 10, $accepted_args = 1 ) {
        
        add_action( $tag, array( $this, $function ), $priority, $accepted_args );

    }

    /**
     * @param string $tag
     * @param $function
     * @param int $priority
     * @param int $accepted_args
     */
    public function filter( $tag, $function, $priority = 10, $accepted_args = 1 ) {
        
        add_filter( $tag, array( $this, $function ), $priority, $accepted_args );
        
    }
}
