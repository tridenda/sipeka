<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->functions->not_login_members()
	}

	public function index()
	{
		$this->ci =& get_instance();
		$this->template->load('members/template', 'members/index');
	}
}