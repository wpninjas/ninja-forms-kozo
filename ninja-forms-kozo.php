<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
Plugin Name: Ninja Forms - Kozo
Plugin URI: http://ninjaforms.com/extensions/kozo
Description: Kozo makes developing for Ninja Forms ninja fast.
Version: 0.0.1

Author: The WP Ninjas
Author URI: http://wpninjas.com

Copyright 2015 WP Ninjas.
*/

if( ! class_exists( 'NF_Base_Menu' ) ) {
    require_once 'classes/menu.class.php';
}
require_once 'kozo/generator.php';
require_once 'includes/admin/menu.php';

/**
 * Class NF_Kozo
 */
class NF_Kozo
{
    const VERSION = '0.0.1';

    const TEXTDOMAIN = 'ninja-forms-kozo';

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
        require_once self::$dir . 'includes/actions/example.php';
    }

    /**
     * Translation
     *
     * A wrapper for the WordPress translation function
     * @param $text
     * @return mixed
     */
    public static function __( $text ){
        return __( $text, self::TEXTDOMAIN );
    }

    /**
     * Echo Translation
     *
     * A wrapper for the WordPress echo translation function
     * @param $text
     */
    public static function _e( $text ){
        _e( $text, self::TEXTDOMAIN );
    }


    /*
     * Private Methods
     */

    //Add private methods here
}

new NF_Kozo();