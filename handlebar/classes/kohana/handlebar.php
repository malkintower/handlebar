<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Integrates Justin Hileman's php mustache implementation into
 * the Kohana 3 framework
 *
 * [ref-mustache]: http://mustache.github.com/
 * [ref-php-mustache]: https://github.com/bobthecow/mustache.php
 *
 * Based partially on the default KO3 View Class
 * and Zombor's KOstache Class
 *
 * @package    Kohana/Handlebar
 * @category   Base
 * @author     Phil Paxton (kisd.co.uk)
 */
abstract class Kohana_Handlebar extends Mustache
{
	// Holds the rendered template so it can be further
	// manipulated using the 'after' method(s)
	protected $_html;
	
	// Array of local variables
	protected $_data = array();

	/**
	 * Allows mustache templates to be inserted into the base mustache template
	 *
	 * @access protected
	 * @param string $name of the mustache template to insert
	 * @param string $replace mustache section (leave blank to set the base template) (default: null)
	 * @return void
	 * @throws Kohana_Exception
	 */
	protected function insert_template($name, $replace = NULL)
	{
		if ($path = Kohana::find_file('views', $name, 'mustache'))
		{
			if ($replace === NULL)
			{
				// Set base template
				$this->_template = file_get_contents($path);
			}
			else
			{
				// need to replace all occurrences of {{foo}} but not {{{foo}}}
				$pattern = '/(?<!{){{'.preg_quote($replace, '/').'}}(?!})/';

				// Insert template into the base template
				$this->_template = preg_replace($pattern, file_get_contents($path), $this->_template);
			}
		}
		else
		{
			throw new Kohana_Exception('Could not find the mustache template: :var',
				array(':var' => $name));
		}
	}

	/**
	 * Returns a new View Class object.
	 *
	 *     $view = Handlebar::factory($class);
	 *
	 * @param   string  view class name
	 * @return  View Class object
	 */
	static function factory($class)
	{
		$view_class = 'View_'.str_replace('/', '_', $class);

		return new $view_class;
	}

	/**
	 * Assigns a value by reference. The benefit of binding is that values can
	 * be altered without re-setting them. It is also possible to bind variables
	 * before they have values. Assigned values will be available as a
	 * variable within the view class:
	 *
	 *     // This reference can be accessed as $ref within the view class
	 *     $view->bind('ref', $bar);
	 *
	 * @param   string   variable name
	 * @param   mixed    referenced variable
	 * @return  $this
	 */
	public function bind($key, & $value)
	{
		$this->_data[$key] = & $value;

		return $this;
	}

	public function before()
	{
		// Nothing by default
	}

	public function after()
	{
		// Nothing by default
	}

	/**
	 * Magic method, searches for the given variable and returns its value.
	 *
	 *     $value = $view->foo;
	 *
	 * [!!] If the variable has not yet been set, an exception will be thrown.
	 *
	 * @param   string  variable name
	 * @return  mixed
	 * @throws  Kohana_Exception
	 */
	public function & __get($key)
	{
		if (isset($this->_data[$key]))
		{
			return $this->_data[$key];
		}
		else
		{
			throw new Kohana_Exception('View variable is not set: :var',
				array(':var' => $key));
		}
	}

	/**
	 * Magic method, calls [Handlebar::set] with the same parameters.
	 *
	 *     $view->foo = 'something';
	 *
	 * @param   string  variable name
	 * @param   mixed   value
	 * @return  void
	 */
	public function __set($key, $value)
	{
		$this->set($key, $value);
	}

	/**
	 * Magic method, determines if a variable is set.
	 *
	 *     isset($view->foo);
	 *
	 * [!!] `NULL` variables are not considered to be set by [isset](http://php.net/isset).
	 *
	 * @param   string  variable name
	 * @return  boolean
	 */
	public function __isset($key)
	{
		return isset($this->_data[$key]);
	}

	/**
	 * Magic method, unsets a given variable.
	 *
	 *     unset($view->foo);
	 *
	 * @param   string  variable name
	 * @return  void
	 */
	public function __unset($key)
	{
		unset($this->_data[$key]);
	}

	/**
	 * Magic method, returns the output of [Mustache::render].
	 *
	 * @return  string
	 * @uses    Mustache::render
	 */
	public function __toString()
	{
		try
		{
			$this->before();
			$this->_html = parent::render();
			$this->after();

			return $this->_html;
		}
		catch (Exception $e)
		{
			if (Kohana::$errors)
			{
				// Display the exception message
				Kohana_Exception::handler($e);
				return '';
			}
			else
			{
				return 'Error Rendering Page';
			}
		}
	}

}