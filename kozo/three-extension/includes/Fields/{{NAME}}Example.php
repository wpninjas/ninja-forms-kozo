<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class NF_Field_{{NAME}}Example
 */
class NF_{{NAME}}_Fields_{{NAME}}Example extends NF_Fields_Textbox
{
    protected $_name = '{{name}}';

    protected $_section = 'common';

    protected $_type = 'textbox';

    protected $_templates = 'textbox';

    public function __construct()
    {
        parent::__construct();

        $this->_nicename = __( '{{Name}} Example Field', 'ninja-forms' );
    }
}