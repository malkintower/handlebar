<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Handlebar extends Controller
{
	public $view;

	public function after()
	{
		$this->request->response = $this->view;
	}

}