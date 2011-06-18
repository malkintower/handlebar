<?php defined('SYSPATH') or die('No direct script access.');

if ( ! class_exists('Mustache', FALSE))
{
	// Load Mustache
	require Kohana::find_file('vendor', 'mustache/Mustache');
}