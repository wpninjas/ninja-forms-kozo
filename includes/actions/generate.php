<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Kozo_Generate_Action extends NF_Notification_Base_Type
{
    /**
     * @var name
     */
    public $name;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->name = NF_Kozo::__( 'Generate' );

        add_filter( 'nf_notification_types', array( $this, 'register_action_type' ) );
    }


    /**
     * Register Action Type
     *
     * @param $types
     * @return array
     */
    public function register_action_type( $types )
    {
        $types[ $this->name ] = $this;
        return (array) $types;
    }



    /**
     * Edit Screen
     *
     * @return void
     */
    public function edit_screen( $id = '' )
    {
        $form_id = Ninja_Forms()->notification( $id )->form_id;
        $form = Ninja_Forms()->form( $form_id );

        $settings['plugin-name'] = Ninja_Forms()->notification( $id )->get_setting( 'plugin-name' );

        include NF_Kozo::$dir . 'includes/templates/action-generate.html.php';
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

        $settings['plugin-name'] = Ninja_Forms()->notification( $id )->get_setting( 'plugin-name' );

        $plugin_name = $ninja_forms_processing->get_field_value( $settings['plugin-name'] );

        $args = array(
            'name'        => $plugin_name,
            'download'    => 1,
        );

        $generator = new NF_Kozo_Generator( $args );

        $generator->generate();
    }

}

new NF_Kozo_Generate_Action;
