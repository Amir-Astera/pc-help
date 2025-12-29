<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.com
 * @copyright 2014 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */
// Add menus to the site
function it_menus() {
    register_nav_menus(
        array(
            'main-menu'             => esc_html__( 'Main Menu','superfine' ),
            'top-menu'              => esc_html__( 'Top Bar Links','superfine' ),
            'one-page'              => esc_html__( 'One Page Menu','superfine' ),
            'bottom-footer-menu'    => esc_html__( 'Bottom Footer Menu Links','superfine' ),
            '404NotFoundMenu'       => esc_html__( '404NotFoundMenu','superfine')
        )
    );
}
add_action( 'init', 'it_menus' );

