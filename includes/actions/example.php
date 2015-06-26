<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Example_Action extends NF_Notification_Base_Type
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
        $this->name = __( 'Example', NF_Kozo::TEXTDOMAIN );

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
     * @param $id
     * @return void
     */
    public function edit_screen( $id = '' )
    {
        $settings['example'] = Ninja_Forms()->notification( $id )->get_setting( 'example' );

        include NF_Kozo::$dir . 'includes/templates/action-example.html.php';
    }



    /**
     * Process
     *
     * @param string $id
     * @return void
     */
    public function process( $id = '' )
    {
        //Process Action Here
    }
}

new NF_Example_Action;
