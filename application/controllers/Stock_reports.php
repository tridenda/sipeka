<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->functions->only_admin();
	}

  public function index()
	{
		$this->ci =& get_instance();
		$this->template->load('template', 'reports/stocks/index');
	}

}
