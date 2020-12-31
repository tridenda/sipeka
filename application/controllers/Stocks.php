<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->check_not_login();
		// $this->login->check_the_cashier();
		$this->login->check_the_guest();
		$this->load->library('form_validation');
  }

  // Begin: Stock-in methods
  public function stock_in_index() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }

  public function stock_in_add() {
		$this->template->load('template', 'materials/stocks/stock-in/form');
  }

  public function stock_in_delete() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }
  // End: Stock-in methods

  // Begin: Stock-out methods
  public function stock_out_index() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }

  public function stock_out_add() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }

  public function stock_out_delete() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }
  // End: Stock-out methods

  // Begin: Stock-missing methods
  public function stock_missing_index() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }

  public function stock_missing_add() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }

  public function stock_missing_delete() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }
  // End: Stock-missing methods

  // Begin: Stock-founded methods
  public function stock_founded_index() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }

  public function stock_founded_add() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }

  public function stock_founded_delete() {
		$this->template->load('template', 'materials/stocks/stock-in/index');
  }
  // End: Stock-founded methods

}