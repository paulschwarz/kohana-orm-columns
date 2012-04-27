<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * @package
 * @author      Paul Schwarz <paulsschwarz@gmail.com>
 * @copyright   2012 Paul Schwarz
 * Date         27/04/12 21:00
 */
abstract class Formatter {

    public static function factory($system)
    {
        // Set the class name
        $class = 'Formatter_'.ucfirst($system);

        if (class_exists($class))
        {
            return new $class;
        }
    }

    public function format($all_tables)
    {
        $tables = array();

        foreach ($all_tables as $table_name => $table_columns)
        {
            $buffer = $this->variable_declaration.' = array('.PHP_EOL;

            foreach ($table_columns as $column_name => $column_details)
            {
                $buffer .= __('    \':col\' => array('.$this->fields($column_details).');'.PHP_EOL,
                    array(':col' => $column_name));
            }

            $buffer .= ');';

            $tables[$table_name] = $buffer;
        }

        return $tables;
    }

    protected function fields($column_details)
    {
        $details = array();

        foreach($column_details as $detail_key => $detail_val)
        {
            list($key, $val) = $this->format_detail($detail_key, $detail_val);

            if (isset($key))
            {
                if (is_string($val))
                {
                    $val = "'$val'";
                }
                elseif (is_bool($val))
                {
                    $val = $val ? 'TRUE' : 'FALSE';
                }

                $details[] = "'$key' => $val";
            }
        }

        return implode($details, ', ');
    }

    protected abstract function format_detail($detail_key, $detail_val);

}
