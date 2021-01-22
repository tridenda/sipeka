<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sal_cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		// $this->load->model('Sal_cart_model');
	}

	public function add($id)
	{
		$this->template->load('template', 'sales/cart/index');
	}

}
