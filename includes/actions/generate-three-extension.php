<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Action_GenerateThreeExtension extends NF_Notification_Base_Type
{
    const SLUG = 'kozo-generate-three-extension';

    /**
     * @var name
     */
    public $name;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->name = __( 'Generate THREE Extension', NF_Kozo::TEXTDOMAIN );

        add_action( 'init', array( $this, 'download' ) );

        add_action( 'wp_head', array( $this, 'download_redirect') );

        add_filter( 'nf_notification_types', array( $this, 'register_action_type' ) );

        add_action( 'admin_notices', array( $this, 'check_for_redirects' ) );
    }


    /**
     * Register Action Type
     *
     * @param $types
     * @return array
     */
    public function register_action_type( $types )
    {
        $types[ self::SLUG ] = $this;
        return (array) $types;
    }



    /**
     * Edit Screen
     *
     * @return void
     */
    public function edit_screen( $id = '' )
    {
        $form = Ninja_Forms()->form( $_GET['form_id'] );

        $settings = $this->get_settings( $id );

        include NF_Kozo::$dir . 'includes/templates/action-generate-three.html.php';
    }



    /**
     * Process
     *
     * @param string $id
     * @return void
     */
    public function process( $id = '' )
    {
        global $ninja_forms_processing;

        $settings = $this->get_settings( $id );

        $args = array(
            'name'        => $ninja_forms_processing->get_field_value( $settings['plugin-name'] ),
            'plugin_uri'         => $ninja_forms_processing->get_field_value( $settings['plugin-uri'] ),
            'description' => $ninja_forms_processing->get_field_value( $settings['description'] ),

            'use_action' => $ninja_forms_processing->get_field_value( $settings['use-action'] ),
            'use_field' => $ninja_forms_processing->get_field_value( $settings['use-field'] ),
            'use_payment' => $ninja_forms_processing->get_field_value( $settings['use-payment'] ),

            'author'        => $ninja_forms_processing->get_field_value( $settings['author'] ),
            'author_uri'         => $ninja_forms_processing->get_field_value( $settings['author-uri'] ),

            'download'           => $settings['download'],

            'boilerplate' => 'three-extension'
        );

        $generator = new NF_Kozo_Generator( $args );

        $file_path = $generator->generate();

        $file_path_hashed = wp_hash( $file_path );

        add_option( 'nf_kozo_download_' . $file_path_hashed, $file_path );

        $download_nonce = wp_create_nonce( 'nf_kozo_download_' . $file_path_hashed );

        if( $ninja_forms_processing ){
            $redirect_url = add_query_arg( array( 'nf-kozo-nonce' => $download_nonce, 'nf-kozo-download' => $file_path_hashed ) ) ;
            $ninja_forms_processing->update_form_setting( 'landing_page', $redirect_url );
        }
    }

    public function check_for_redirects()
    {
        if( ( isset( $_GET['page'] ) AND 'ninja-forms' != $_GET['page'] ) OR ( ! isset( $_GET['form_id']) ) ) return;

        $actions = nf_get_notifications_by_form_id( $_GET['form_id'] );

        $is_active_redirect = FALSE;
        $is_active_kozo_generate = FALSE;

        foreach( $actions as $action ){

            if( 'redirect' == $action['type'] AND $action['active']  ){
                $is_active_redirect = TRUE;
            }

            if( self::SLUG == $action['type'] AND $action['active']  ){
                $is_active_kozo_generate = TRUE;
            }

            if( $is_active_kozo_generate AND $is_active_redirect ){
                include NF_Kozo::$dir . 'includes/templates/action-generate-admin-notice.html.php';
            }
        }
    }

    public function download_redirect()
    {
        if( ! isset( $_REQUEST['nf-kozo-nonce'] ) ) return;

        $nonce = $_REQUEST['nf-kozo-nonce'];
        $file_path_hashed = $_REQUEST['nf-kozo-download'];
        if( wp_verify_nonce( $nonce, 'nf_kozo_download_' . $file_path_hashed )  AND ( ! isset( $_REQUEST['nf-kozo-do-download'] ) )  ) {

            $file_path = get_option( 'nf_kozo_download_' . $file_path_hashed );

            $download_nonce = wp_create_nonce( 'nf_kozo_download_' . $file_path_hashed );

            echo '<meta http-equiv="refresh" content="0; URL=' . add_query_arg( array( 'nf-kozo-download-nonce' => $download_nonce, 'nf-kozo-do-download' => 1)) . '">;';
        }
    }

    public function download()
    {
        if( ! isset( $_REQUEST['nf-kozo-download-nonce'] ) ) return;

        $nonce = $_REQUEST['nf-kozo-download-nonce'];
        $file_path_hashed = $_REQUEST['nf-kozo-download'];
        if( wp_verify_nonce( $nonce, 'nf_kozo_download_' . $file_path_hashed ) AND ( $_REQUEST['nf-kozo-do-download'] ) ) {

            $file_path = get_option( 'nf_kozo_download_' . $file_path_hashed );

            NF_Kozo_Generator::download( $file_path );
        }
    }

    private function get_settings( $id = '' )
    {
        $settings = array();

        if( ! $id ) return $settings;

        $settings['plugin-name'] = Ninja_Forms()->notification( $id )->get_setting( 'plugin-name' );
        $settings['plugin-uri']  = Ninja_Forms()->notification( $id )->get_setting( 'plugin-uri' );
        $settings['description'] = Ninja_Forms()->notification( $id )->get_setting( 'description' );

        $settings['use-action'] = Ninja_Forms()->notification( $id )->get_setting( 'use-action' );
        $settings['use-field'] = Ninja_Forms()->notification( $id )->get_setting( 'use-field' );
        $settings['use-payment'] = Ninja_Forms()->notification( $id )->get_setting( 'use-payment' );

        $settings['author']      = Ninja_Forms()->notification( $id )->get_setting( 'author' );
        $settings['author-uri']  = Ninja_Forms()->notification( $id )->get_setting( 'author-uri' );

        $settings['download']    = Ninja_Forms()->notification( $id )->get_setting( 'download' );

        return $settings;
    }
}

new NF_Action_GenerateThreeExtension;
