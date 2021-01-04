<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->not_login_cashier();
	}
	
	public function get_date() {
		date_default_timezone_set('Asia/Jakarta');
		echo indo_date(date('Y-m-d'), TRUE);
		echo " - ";
		echo date('H:i:s'); 
	}

  public function index()
	{
		$this->ci =& get_instance();
		$this->template->load('template', 'index');
	}

}
