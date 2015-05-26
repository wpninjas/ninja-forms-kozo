<?php if ( ! defined( 'ABSPATH' ) ) exit;

abstract class NF_Base_Menu
{
    public $parent_slug = 'ninja-forms';

    public $capability = 'manage_options';

    public $page_title = '';

    public $menu_title = '';

    public $menu_slug = '';

    public $title = '';

    public $name = '';

    public $settings = array();

    public $options = array();

    public function __construct()
    {
        $this->options = get_option( 'ninja_forms_' . strtolower( $this->name ) );

        $this->capability = apply_filters( 'ninja_forms_kozo_admin_menu_capabilities', 'manage_options');
        $this->page_title = __( 'Ninja Forms', 'ninja-forms' ) . ' - ' . $this->title;
        $this->menu_title = $this->title;

        add_action( 'admin_init', array( $this, 'controller') );
        add_action( 'admin_menu', array( $this, 'register_submenu'), 9001 );
        add_action( 'admin_enqueue_scripts', array( $this, '_enqueue_styles') );
        add_action( 'admin_enqueue_scripts', array( $this, '_enqueue_scripts') );
    }

    /**
     * Register Submenu
     *
     * Add a submenu page to the admin.
     */
    public function register_submenu()
    {
        add_submenu_page(
            $this->parent_slug,
            $this->page_title,
            $this->menu_title,
            $this->capability,
            $this->menu_slug,
            array( $this, 'display' )
        );
    }

    /**
     * Display Admin
     */
    public abstract function display();

    /**
     * Enqueue Styles
     *
     * Checks the current page before calling `enqueue_styles()`.
     */
    public function _enqueue_styles()
    {
        if( isset( $_GET['page'] ) && $this->menu_slug == $_GET['page'] ){
            $this->enqueue_styles();
        }
    }

    /**
     * Enqueue Styles
     */
    public function styles()
    {
        //This section intentionally left blank.
    }

    /**
     * Enqueue Scripts
     *
     * Checks the current page before calling `enqueue_scripts()`.
     */
    public function _enqueue_scripts()
    {
        if( isset( $_GET['page'] ) && $this->menu_slug == $_GET['page'] ){
            $this->enqueue_scripts();
        }
    }

    /**
     * Enqueue Scripts
     */
    public function scripts()
    {
        //This section intentionally left blank.
    }

    /**
     * Controller
     *
     * Allows for method routing based on the `action` query string.
     */
    public function controller()
    {
        if( ! isset( $_GET['page'] ) OR $this->menu_slug != $_GET['page'] ){
            return;
        }

        if( ! isset( $_POST['action'] )  ){
            return;
        }

        $action = $_POST['action'];

        if( method_exists( $this, $action ) ) {
            call_user_func( array( $this, $action ) );
        }
    }

    public function save()
    {
        foreach ( $this->settings as $id => $name ) {
            if( isset( $_POST[ $id ] ) ) {
                $this->options[ $id ] = $_POST[ $id ];
            }
        }
        $updated = update_option( 'ninja_forms_' . $this->name, $this->options );
        //TODO: Add save notice
    }

}
