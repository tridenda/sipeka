<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materials extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    // $this->login->check_not_login();
		// $this->login->check_the_cashier();
		// $this->login->check_the_guest();
		$this->load->model('User_model');
		$this->load->library('form_validation');
  }

  public function index()
	{
		$data['row'] = $this->User_model->get()->result();
		$this->template->load('template', 'materials/materials/index', $data);
	}
}