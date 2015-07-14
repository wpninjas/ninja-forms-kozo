<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Menu_{{NAME}} extends NF_Base_Menu
{
    public $menu_slug = 'ninja-forms-{{name}}';

    public function __construct()
    {
        $this->name  = '{{name}}';
        $this->title = __( '{{Name}}', NF_{{NAME}}::TEXTDOMAIN );

        $this->settings = array(
            'example1' => __( 'Example One', NF_{{NAME}}::TEXTDOMAIN ),
            'example2' => __( 'Example Two', NF_{{NAME}}::TEXTDOMAIN ),
        );

        parent::__construct();
    }

    /**
     * Display
     *
     * The default display method.
     */
    public function display()
    {
        $this->tab = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : '';
        include NF_{{NAME}}::$dir . 'includes/templates/admin-menu.html.php';
    }

    /**
     * Enqueue Styles
     */
    public function enqueue_styles()
    {
        wp_enqueue_style(
        /* Handle       */ 'ninja-forms-{{name}}-admin-css',
            /* Source       */ NF_{{NAME}}::$url . '/assets/css/dev/ninja-forms-{{name}}-admin.css',
            /* Dependencies */ FALSE,
            /* Version      */ NF_{{NAME}}::VERSION,
            /* In Footer    */ FALSE
        );
    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script(
        /* Handle       */ 'ninja-forms-{{name}}-admin-js',
            /* Source       */ NF_{{NAME}}::$url . '/assets/js/min/ninja-forms-{{name}}-admin.min.js',
            /* Dependencies */ array( 'jquery' ),
            /* Version      */ NF_{{NAME}}::VERSION,
            /* In Footer    */ TRUE
        );
    }


} // End NF_{{NAME}}_Menu Class

new NF_{{NAME}}_Menu();
