<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Plugin Name: Ninja Forms - {{Name}}
 * Plugin URI: {{PLUGIN URI}}
 * Description: {{DESCRIPTION}}
 * Version: 0.0.1
 * Author: {{AUTHOR}}
 * Author URI: {{AUTHOR URI}}
 * Text Domain: {{name}}
 *
 * Copyright {{YEAR}} {{AUTHOR}}.
 */

if( version_compare( get_option( 'ninja_forms_version', '0.0.0' ), '3.0.0', '>' ) || get_option( 'ninja_forms_load_deprecated', FALSE ) ) {

    include 'deprecated/ninja-forms-{{name}}.php';

} else {

    /**
     * Class NF_{{NAME}}
     */
    final class NF_{{NAME}}
    {
        const VERSION = '0.0.1';
        const SLUG    = '{{name}}';
        const NAME    = '{{Name}}';
        const AUTHOR  = '{{AUTHOR}}';
        const PREFIX  = 'NF_{{NAME}}';

        /**
         * @var NF_{{NAME}}
         * @since 3.0
         */
        private static $instance;

        /**
         * Plugin Directory
         *
         * @since 3.0
         * @var string $dir
         */
        public static $dir = '';

        /**
         * Plugin URL
         *
         * @since 3.0
         * @var string $url
         */
        public static $url = '';

        /**
         * Main Plugin Instance
         *
         * Insures that only one instance of a plugin class exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         *
         * @since 3.0
         * @static
         * @static var array $instance
         * @return NF_{{NAME}} Highlander Instance
         */
        public static function instance()
        {
            if (!isset(self::$instance) && !(self::$instance instanceof NF_{{NAME}})) {
                self::$instance = new NF_{{NAME}}();

                self::$dir = plugin_dir_path(__FILE__);

                self::$url = plugin_dir_url(__FILE__);

                /*
                 * Register our autoloader
                 */
                spl_autoload_register(array(self::$instance, 'autoloader'));
            }
        }

        public function __construct()
        {
            add_action( 'admin_init', array( $this, 'setup_license') );
            add_action( 'nf_register_fields', array($this, 'register_fields'));
            add_action( 'nf_register_actions', array($this, 'register_actions'));
            add_action( 'ninja_forms_register_payment_gateways', array($this, 'register_payment_gateways'));
        }

        public function setup_license()
        {
            if ( ! class_exists( 'NF_Extension_Updater' ) ) return;

            new NF_Extension_Updater( self::NAME, self::VERSION, self::AUTHOR, __FILE__, self::SLUG );
        }

        public function register_fields($actions)
        {
            $actions[ '{{name}}' ] = new NF_{{NAME}}_Fields_{{NAME}}Example();

            return $actions;
        }

        public function register_actions($actions)
        {
            $actions[ '{{name}}' ] = new NF_{{NAME}}_Actions_{{NAME}}Example();

            return $actions;
        }

        public function register_payment_gateways($payment_gateways)
        {
            $payment_gateways[ '{{name}}' ] = new NF_{{NAME}}_PaymentGateways_{{NAME}}Example();

            return $payment_gateways;
        }

        public function autoloader($class_name)
        {
            if (class_exists($class_name)) return;

            if ( false === strpos( $class_name, self::PREFIX ) ) return;

            $class_name = str_replace( self::PREFIX, '', $class_name );
            $classes_dir = realpath(plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR;
            $class_file = str_replace('_', DIRECTORY_SEPARATOR, $class_name) . '.php';

            if (file_exists($classes_dir . $class_file)) {
                require_once $classes_dir . $class_file;
            }
        }
    }

    /**
     * The main function responsible for returning The Highlander Plugin
     * Instance to functions everywhere.
     *
     * Use this function like you would a global variable, except without needing
     * to declare the global.
     *
     * @since 3.0
     * @return {class} Highlander Instance
     */
    function NF_{{NAME}}()
    {
        return NF_{{NAME}}::instance();
    }

    NF_{{NAME}}();
}