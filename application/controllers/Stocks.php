<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->check_not_login();
		// $this->login->check_the_cashier();
		$this->login->check_the_guest();
		// $this->load->model('Material_model');
		// $this->load->model('Unit_model');
		$this->load->model('Supplier_model');
		$this->load->library('form_validation');
  }

  // Begin: Stock-in methods
  public function stock_in_index() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_in_add() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_in_delete() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }
  // End: Stock-in methods

  // Begin: Stock-out methods
  public function stock_out_index() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_out_add() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_out_delete() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }
  // End: Stock-out methods

  // Begin: Stock-missing methods
  public function stock_missing_index() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_missing_add() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_missing_delete() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }
  // End: Stock-missing methods

  // Begin: Stock-founded methods
  public function stock_founded_index() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_founded_add() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }

  public function stock_founded_delete() {
    $data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
  }
  // End: Stock-founded methods

}