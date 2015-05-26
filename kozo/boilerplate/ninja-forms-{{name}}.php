<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
Plugin Name: Ninja Forms - {{NAME}}
Plugin URI: {{PLUGIN URI}}
Description: {{DESCRIPTION}}
Version: 0.0.1

Author: {{AUTHOR}}
Author URI: {{AUTHOR URI}}

Copyright {{YEAR}} {{AUTHOR}}.
*/

if( ! class_exists( 'NF_Base_Menu' ) ) {
    require_once 'classes/menu.class.php';
}
require_once 'includes/admin/menu.php';

/**
 * Class NF_{{NAME}}
 */
class NF_{{NAME}}
{
    const VERSION = '0.0.1';

    const TEXTDOMAIN = 'ninja-forms-{{name}}';

    /**
     * Plugin Directory
     *
     * @var string $dir
     */
    public static $dir = '';

    /**
     * Plugin URL
     *
     * @var string $url
     */
    public static $url = '';



    /**
     * Constructor
     */
    public function __construct()
    {
        self::$dir = plugin_dir_path( __FILE__ );

        self::$url = plugin_dir_url( __FILE__ );

        add_action( 'plugins_loaded', array( $this, 'ninja_forms_includes' ) );
    }



    /*
    * Public Methods
    */

    /**
     * Ninja Forms Includes
     *
     * Include plugin files for use in Ninja Forms
     */
    public function ninja_forms_includes()
    {
        require_once self::$dir . 'includes/actions/{{name}}.php';
    }


    /*
     * Private Methods
     */

    //Add private methods here
}

new NF_{{NAME}}();