<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package
 * @author      Paul Schwarz <paulsschwarz@gmail.com>
 * @copyright   2012 Paul Schwarz
 * Date         27/04/12 21:00
 */
class Controller_Columns extends Controller {

	public function action_index()
	{
        if (Kohana::$environment !== Kohana::DEVELOPMENT)
        {
            throw new Kohana_HTTP_Exception_403('Available in development mode only. Check your Kohana::$environment.');
        }

        $system = $this->request->param('system');
        $database_group = $this->request->param('database');
        $table = $this->request->param('table');

        // Get the actual database instance
        try
        {
            $database = Database::instance($database_group);
        }
        catch(ErrorException $e)
        {
            throw new Kohana_Exception('The database group ":database" does not exist in the database.php config file.',
                array(':database' => $database_group));
        }

        $tables = array();

        // Get an array of table names
        if(isset($table))
        {
            $tables[] = $table;
        }
        else
        {
            // If you didn't specify which one then get all of them
            $tables = $this->get_tables($database);
        }

        // Get the formatter
        $formatter = Formatter::factory($system);
        if (is_null($formatter))
        {
            throw new Kohana_Exception('A formatter for system ":system" is not available.', array(':system' => $system));
        }

        // Load the database meta data
        $details = $this->discover_columns($database, $tables);

        $this->response->body(View::factory('columns')
            ->set('tables', $tables)
            ->set('details',  $formatter->format($details))
        );
	}

    protected function discover_columns(Database $database, array $tables)
    {
        $details = array();

        foreach($tables as $table)
        {
            $details[$table] = $database->list_columns($table);
        }

        return $details;
    }

    protected function get_tables(Database $database)
    {
        return $database->list_tables();
    }

}
