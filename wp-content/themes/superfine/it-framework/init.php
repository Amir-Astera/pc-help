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

 if ( ! defined( 'WPINC' ) ) { die; }

class it_Globals { 

    public function __construct() {
        defined( 'THEME_DIR' )                      or  define( 'THEME_DIR',                get_template_directory() );
        defined( 'THEME_URI' )                      or  define( 'THEME_URI',                get_template_directory_uri() );

        defined( 'FRAMEWORK_DIR' )                  or  define( 'FRAMEWORK_DIR',            THEME_DIR . '/it-framework' );
        defined( 'FRAMEWORK_URI' )                  or  define( 'FRAMEWORK_URI',            THEME_URI . '/it-framework' );

        defined( 'FRAMEWORK_ASSETS_DIR' )           or  define( 'FRAMEWORK_ASSETS_DIR',      FRAMEWORK_DIR . '/assets' );
        defined( 'FRAMEWORK_ASSETS_URI' )           or  define( 'FRAMEWORK_ASSETS_URI',      FRAMEWORK_URI . '/assets' );

        defined( 'FRAMEWORK_CONFIG_DIR' )           or  define( 'FRAMEWORK_CONFIG_DIR',     FRAMEWORK_DIR . '/includes/config' );
        defined( 'FRAMEWORK_CONFIG_URI' )           or  define( 'FRAMEWORK_CONFIG_URI',     FRAMEWORK_URI . '/includes/config' );

        defined( 'FRAMEWORK_PLUGIN_DIR' )           or  define( 'FRAMEWORK_PLUGIN_DIR',     FRAMEWORK_DIR . '/plugins' );
        defined( 'FRAMEWORK_PLUGIN_URI' )           or  define( 'FRAMEWORK_PLUGIN_URI',     FRAMEWORK_URI . '/plugins' );

        defined( 'FRAMEWORK_INCLUDES_DIR' )         or  define( 'FRAMEWORK_INCLUDES_DIR',   FRAMEWORK_DIR . '/includes' );
        defined( 'FRAMEWORK_INCLUDES_URI' )         or  define( 'FRAMEWORK_INCLUDES_URI',   FRAMEWORK_URI . '/includes' );

        // include files.
        locate_template ('it-framework/includes/it-framework.php', true                          );
        locate_template ('it-framework/config/it-metaboxes-config.php', true                     );
        locate_template ('it-framework/includes/it-enqueue-settings.php', true                   );
        locate_template ('it-framework/includes/it-nav-menu.php', true                           );
        locate_template ('it-framework/includes/it-sidebars.php', true                           );
        locate_template ('it-framework/includes/it-comments.php', true                           );
        locate_template ('it-framework/includes/it-global-functions.php', true                   );
        locate_template ('it-framework/includes/it-posts.php', true                              );
        locate_template ('it-framework/includes/nav_menu/it-menu.php', true                      ); 
        locate_template ('it-framework/includes/it-post-formats.php', true                       );
        locate_template ('it-framework/plugins/bbpress/bbpress.php', true                        );
        locate_template ('it-framework/plugins/tgm-plugin-activation/tgm-plugins.php', true      );
        locate_template ('it-framework/plugins/importer/importer.php', true                      );
        locate_template ('it-framework/includes/it-post-like.php', true                          );
        locate_template ('it-framework/widgets/it-widgets.php', true                             );
        if(class_exists('Woocommerce')) {
            locate_template ('it-framework/plugins/woocommerce/it-woocommerce.php', true         );
        }
    }
}
new it_Globals();
