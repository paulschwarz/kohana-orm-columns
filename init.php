<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package
 * @author      Paul Schwarz <paulsschwarz@gmail.com>
 * @copyright   2012 Paul Schwarz
 * Date         27/04/12 21:00
 */
Route::set('columns', 'columns(/<system>(/<database>(/<table>)))')
	->defaults(array(
		'controller' => 'columns',
		'action'     => 'index',
        'system'     => 'orm',
        'database'   => 'default',
	));
