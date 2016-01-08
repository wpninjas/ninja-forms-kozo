<?php if ( ! defined( 'ABSPATH' ) || ! class_exists( 'NF_Abstracts_Action' )) exit;

/**
 * Class NF_Action_{{NAME}}Example
 */
final class NF_{{NAME}}_Actions_{{NAME}}Example extends NF_Abstracts_Action
{
    /**
     * @var string
     */
    protected $_name  = '{{name}}';

    /**
     * @var array
     */
    protected $_tags = array();

    /**
     * @var string
     */
    protected $_timing = 'normal';

    /**
     * @var int
     */
    protected $_priority = '10';

    /**
     * Constructor
     */
    public function __construct()
{
    parent::__construct();

    $this->_nicename = __( '{{Name}} Example Action', 'ninja-forms' );
}

    /*
    * PUBLIC METHODS
    */

    public function save()
{

}

    public function process( $action_settings, $form_id, $data )
{
    return $data;
}
}