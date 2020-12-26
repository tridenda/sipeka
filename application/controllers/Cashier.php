<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->check_not_login();
	}

	public function index()
	{
		// $this->login->check_not_login();
		$this->template->load('template', 'cashier/index');
	}
}
