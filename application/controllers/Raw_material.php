<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raw_material extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
    $this->login->check_not_login();
    $this->load->model('Material_model');
		$this->load->library('form_validation');
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
    $data['row'] = $this->Material_model->get_supplier()->result();
		$this->template->load('template', 'raw-material/suppliers/index', $data);
  }

  public function add_supplier()
	{		
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('phone', 'Nomor telepon', 'numberic');
    
    // Set condition form
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'raw-material/suppliers/add-supplier');
		} else {
			$post = $this->input->post(null, TRUE);	
      $this->Material_model->add_supplier($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil disimpan');
				</script>";
			}
			redirect('raw_material/suppliers');
		}
  }

  public function edit_supplier($id)
	{
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('phone', 'Nomor telepon', 'numberic');

		// Set condition form
		if ($this->form_validation->run() == FALSE) {
			$query = $this->Material_model->get_supplier($id);
			if( $query->num_rows() > 0 ) {
				$data['row'] = $query->row();
				$this->template->load('template', 'raw-material/suppliers/edit-supplier', $data);
			} else {
				echo "<script>
						alert('Data tidak ditemukan.');
				</script>";
				redirect('raw_material/suppliers');
			}
		} else {
			$post = $this->input->post(null, TRUE);	

			$this->Material_model->edit_supplier($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil diubah.');
				</script>";
			}
			redirect('raw_material/suppliers');
		}
  }

  public function delete_supplier()
	{
		$id = $this->input->post('supplier_id');
    $this->Material_model->delete_supplier($id);

		if( $this->db->affected_rows() > 1 ) {
			echo "<script>
					alert('Data berhasil dihapus');
			</script>";
		}
		redirect('raw_material/suppliers');
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
