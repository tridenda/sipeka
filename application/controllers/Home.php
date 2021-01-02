<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->check_not_login();
  }

  public function index()
	{
		$this->ci =& get_instance();
		$this->load->view('index');
	}

}
