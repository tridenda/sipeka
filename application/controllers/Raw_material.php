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
    $data['row'] = $this->Material_model->get_category()->result();
		$this->template->load('template', 'raw-material/categories/index', $data);
  }

  public function add_category()
	{		
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('phone', 'Nomor telepon', 'numeric');
    
    // Set condition form
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'raw-material/categories/add-category');
		} else {
			$post = $this->input->post(null, TRUE);	
      $this->Material_model->add_category($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil disimpan');
				</script>";
			}
			redirect('raw_material/categories');
		}
  }

  public function edit_category($id)
	{
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');

		// Set condition form
		if ($this->form_validation->run() == FALSE) {
			$query = $this->Material_model->get_category($id);
			if( $query->num_rows() > 0 ) {
				$data['row'] = $query->row();
				$this->template->load('template', 'raw-material/categories/edit-category', $data);
			} else {
				echo "<script>
						alert('Data tidak ditemukan.');
				</script>";
				redirect('raw_material/categories');
			}
		} else {
			$post = $this->input->post(null, TRUE);	

			$this->Material_model->edit_category($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil diubah.');
				</script>";
			}
			redirect('raw_material/categories');
		}
  }

  public function delete_category()
	{
		$id = $this->input->post('category_id');
    $this->Material_model->delete_unit($id);

		if( $this->db->affected_rows() > 1 ) {
			echo "<script>
					alert('Data berhasil dihapus');
			</script>";
		}
		redirect('raw_material/categories');
	}
  // End: Category
  
  // Begin: Units
  public function units()
	{
    $data['row'] = $this->Material_model->get_unit()->result();
		$this->template->load('template', 'raw-material/units/index', $data);
  }

  public function add_unit()
	{		
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('phone', 'Nomor telepon', 'numeric');
    
    // Set condition form
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'raw-material/units/add-unit');
		} else {
			$post = $this->input->post(null, TRUE);	
      $this->Material_model->add_unit($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil disimpan');
				</script>";
			}
			redirect('raw_material/units');
		}
  }

  public function edit_unit($id)
	{
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');

		// Set condition form
		if ($this->form_validation->run() == FALSE) {
			$query = $this->Material_model->get_unit($id);
			if( $query->num_rows() > 0 ) {
				$data['row'] = $query->row();
				$this->template->load('template', 'raw-material/units/edit-unit', $data);
			} else {
				echo "<script>
						alert('Data tidak ditemukan.');
				</script>";
				redirect('raw_material/units');
			}
		} else {
			$post = $this->input->post(null, TRUE);	

			$this->Material_model->edit_unit($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil diubah.');
				</script>";
			}
			redirect('raw_material/units');
		}
  }

  public function delete_unit()
	{
		$id = $this->input->post('unit_id');
    $this->Material_model->delete_unit($id);

		if( $this->db->affected_rows() > 1 ) {
			echo "<script>
					alert('Data berhasil dihapus');
			</script>";
		}
		redirect('raw_material/units');
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
		$this->form_validation->set_rules('phone', 'Nomor telepon', 'numeric');
    
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
		$this->form_validation->set_rules('phone', 'Nomor telepon', 'numeric');

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
