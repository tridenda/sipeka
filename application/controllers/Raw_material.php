<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raw_material extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
		$this->login->check_not_login();
  }
  
  // Begin: Material List
  public function material_list()
	{
		$this->template->load('template', 'raw-material/material-list/index');
  }

  public function add_material()
	{
		$this->template->load('template', 'raw-material/material-list/add-material');
  }

  public function edit_material()
	{
		$this->template->load('template', 'raw-material/material-list/edit-material');
  }
  // End: Material List
  
  // Begin: Category
  public function categories()
	{
		$this->template->load('template', 'raw-material/categories/index');
  }

  public function add_category()
	{
		$this->template->load('template', 'raw-material/categories/add-category');
  }

  public function edit_category()
	{
		$this->template->load('template', 'raw-material/categories/edit-category');
  }
  // End: Category
  
  // Begin: Units
  public function units()
	{
		$this->template->load('template', 'raw-material/units/index');
  }

  public function add_unit()
	{
		$this->template->load('template', 'raw-material/units/add-unit');
  }

  public function edit_unit()
	{
		$this->template->load('template', 'raw-material/units/edit-unit');
  }
  // End: Units

  // Begin: Suppliers
  public function suppliers()
	{
		$this->template->load('template', 'raw-material/suppliers/index');
  }

  public function add_supplier()
	{
		$this->template->load('template', 'raw-material/suppliers/add-supplier');
  }

  public function edit_supplier()
	{
		$this->template->load('template', 'raw-material/suppliers/edit-supplier');
  }
  // End: Suppliers

  // Begin: Stock
  public function stock_found()
	{
		$this->template->load('template', 'raw-material/stock/stock-found');
  }

  public function stock_in()
	{
		$this->template->load('template', 'raw-material/stock/stock-in');
  }
  
  public function stock_missing()
	{
		$this->template->load('template', 'raw-material/stock/stock-missing');
  }

  public function stock_out()
	{
		$this->template->load('template', 'raw-material/stock/stock-out');
  }

  // End: Stock
}
