<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * @package
 * @author      Paul Schwarz <paulsschwarz@gmail.com>
 * @copyright   2012 Paul Schwarz
 * Date         27/04/12 21:00
 */
class Formatter_Automodeler extends Formatter {

    protected $variable_declaration = 'protected $_data';

    protected function format_detail($detail_key, $detail_val)
    {
        // Empty arrays for now, until I know what auto-modeler does
        return;
    }

}
