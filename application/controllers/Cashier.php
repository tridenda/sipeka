<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {

	public function index()
	{
		$this->template->load('template', 'cashier/index');
	}
}
