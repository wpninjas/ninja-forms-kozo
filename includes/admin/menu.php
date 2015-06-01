<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Kozo_Menu extends NF_Base_Menu
{
    public $menu_slug = 'ninja-forms-kozo';

    public function __construct()
    {
        $this->name = 'Kozo';
        $this->title = NF_Kozo::__( $this->name );

        $this->settings = array(
            'example1' => NF_Kozo::__( 'Example One' ),
            'example2' => NF_Kozo::__( 'Example Two' ),
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
        include NF_Kozo::$dir . 'includes/templates/admin-menu.html.php';
    }

    /**
     * Enqueue Styles
     */
    public function enqueue_styles()
    {
        wp_enqueue_style(
            /* Handle       */ 'ninja-forms-kozo-admin-css',
            /* Source       */ NF_Kozo::$url . '/assets/css/dev/ninja-forms-kozo-admin.css',
            /* Dependencies */ FALSE,
            /* Version      */ NF_Kozo::VERSION,
            /* In Footer    */ FALSE
        );
    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script(
            /* Handle       */ 'ninja-forms-kozo-admin-js',
            /* Source       */ NF_Kozo::$url . '/assets/js/min/ninja-forms-kozo-admin.min.js',
            /* Dependencies */ array( 'jquery' ),
            /* Version      */ NF_Kozo::VERSION,
            /* In Footer    */ TRUE
        );
    }

    /**
     * Generate Route
     */
    public function generate()
    {
        $args = array(
            'name'        => $_POST['name'],
            'plugin_uri'  => $_POST['plugin_uri'],
            'description' => $_POST['description'],
            'author'      => $_POST['author'],
            'author_uri'  => $_POST['author_uri'],
            'download'    => $_POST['download'],
            'install'     => $_POST['install'],
        );

        $generator = new NF_Kozo_Generator( $args );

        $generator->generate();
    }

} // End NF_Kozo_Menu Class

new NF_Kozo_Menu();
