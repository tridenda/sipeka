<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
    $this->load->model(['Material_model','Supplier_model','Stock_model']);
		$this->load->library('form_validation');
  }

  function get_material_ajax() {
		$list = $this->Material_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $material) {
				$no++;
				$row = array();
				$row[] = $material->barcode;
        $row[] = $material->name;
        $row[] = $material->unit_name;
				$row[] = indo_currency($material->price);
				$row[] = $material->quantity;
				// add html for action
				$row[] = '
        <button class="btn btn-sm btn-primary" id="select" 
        data-material_id="'.$material->material_id.'"
        data-barcode="'.$material->barcode.'"
        data-name="'.$material->name.'"
        data-unit_name="'.$material->unit_name.'"
        data-initial_qty="'.$material->quantity.'"
        data-material_price="'.$material->price.'">
          <i class="fas fa-check"></i> Pilih
        </button>';
				$data[] = $row;
		}
		$output = array(
								"draw" => @$_POST['draw'],
								"recordsTotal" => $this->Material_model->count_all(),
								"recordsFiltered" => $this->Material_model->count_filtered(),
								"data" => $data,
						);
		// output to json format
		echo json_encode($output);
  }

  function get_stock_ajax($type) {
		$list = $this->Stock_model->get_datatables($type);
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $stock) {
        $no++;
        $row = array();
        $row[] = $no.".";
        $row[] = indo_date($stock->date, TRUE, TRUE);
        $row[] = $stock->material_name;
        $row[] = $stock->unit_name;
        $row[] = $stock->quantity;
        $row[] = indo_currency($stock->price);
        // add html for action
        $row[] = '
        <button class="btn btn-sm btn-outline-info" id="select" 
          data-toggle="modal" data-target="#detail-modal"
          data-date="'.indo_date($stock->date, TRUE).'"
          data-material_name="'.$stock->material_name.'"
          data-quantity="'.$stock->quantity.'"
          data-notes="'.$stock->notes.'"
          data-supplier_name="'.$stock->supplier_name.'"
          data-created="'.$stock->created.'"
          data-user_name="'.$stock->user_name.'"
          data-material_barcode="'.$stock->material_barcode.'"
          data-unit_name="'.$stock->unit_name.'"
          data-material_price="'.indo_currency($stock->price).'">
          <i class="fas fa-info-circle"></i> Rincian
        </button>
        <a href="'.base_url('persediaan/hapus/').$stock->stock_id.'/'.$stock->material_id.'/'.$stock->quantity.'/'.$type.'" onclick="return confirm(\'Anda akan menghapus data persediaan, yakin?\');" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i> Hapus</a>
        ';
        $data[] = $row;
    }
		$output = array(
								"draw" => @$_POST['draw'],
								"recordsTotal" => $this->Stock_model->count_all($type),
								"recordsFiltered" => $this->Stock_model->count_filtered($type),
								"data" => $data,
						);
		// output to json format
		echo json_encode($output);
  }
  
  // Begin: Stock-in methods
  public function stock_in_index() {
    if( isset($_POST['tutorial']) ) {
			$data['tutorial'] = TRUE;
		}
    // data type for filtering type in, out, missing, and founded
    $data['type'] = 'in';
		$this->template->load('template', 'materials/stocks/index', $data);
  }

  public function stock_in_add() {

    $query_supppliers = $this->Supplier_model->get();
    $suppliers[''] = '- Pilih - ';
    foreach( $query_supppliers->result() as $supplier) {
      $suppliers[$supplier->supplier_id] = $supplier->name;
    }
    
    if( !isset($_POST['in_add']) ) {
      $data = array(
        'supplier' => $suppliers,
        'selected_supplier' => null,
        'page' => 'in_add',
      );
      $this->template->load('template', 'materials/stocks/form', $data);
		} else if( isset($_POST['in_add']) ){
      // Set rules form
      $this->form_validation->set_rules('date', 'Tanggal', 'required');
      $this->form_validation->set_rules('barcode', 'Kodebar', 'required');
      $this->form_validation->set_rules('quantity', 'Jumlah', 'required');
      $this->form_validation->set_rules('material_price', 'Jumlah', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'supplier' => $suppliers,
          'selected_supplier' => $this->input->post('supplier'),
          'page' => 'in_add',
					'row' => $post
				);
				$this->template->load('template', 'materials/stocks/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'in_add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('stocks/process');
			}
		}
  }
  // End: Stock-in methods

  // Begin: Stock-out methods
  public function stock_out_index() {
    if( isset($_POST['tutorial']) ) {
			$data['tutorial'] = TRUE;
		}
    // data type for filtering type in, out, missing, and founded
    $data['type'] = 'out';
		$this->template->load('template', 'materials/stocks/index', $data);
  }

  public function stock_out_add() {

    $query_supppliers = $this->Supplier_model->get();
    $suppliers[''] = '- Pilih - ';
    foreach( $query_supppliers->result() as $supplier) {
      $suppliers[$supplier->supplier_id] = $supplier->name;
    }
    
    if( !isset($_POST['out_add']) ) {
      $data = array(
        'supplier' => $suppliers,
        'selected_supplier' => null,
        'page' => 'out_add',
      );
      $this->template->load('template', 'materials/stocks/form', $data);
		} else if( isset($_POST['out_add']) ){
      // Set rules form
      $this->form_validation->set_rules('date', 'Tanggal', 'required');
      $this->form_validation->set_rules('barcode', 'Kodebar', 'required');
      $this->form_validation->set_rules('quantity', 'Jumlah', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'supplier' => $suppliers,
          'selected_supplier' => $this->input->post('supplier'),
          'page' => 'out_add',
					'row' => $post
				);
				$this->template->load('template', 'materials/stocks/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'out_add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('stocks/process');
			}
		}
  }

  // End: Stock-out methods

  // Begin: Stock-missing methods
  public function stock_missing_index() {
    if( isset($_POST['tutorial']) ) {
			$data['tutorial'] = TRUE;
		}
    // data type for filtering type in, out, missing, and founded
    $data['type'] = 'missing';
		$this->template->load('template', 'materials/stocks/index', $data);
  }

  public function stock_missing_add() {

    $query_supppliers = $this->Supplier_model->get();
    $suppliers[''] = '- Pilih - ';
    foreach( $query_supppliers->result() as $supplier) {
      $suppliers[$supplier->supplier_id] = $supplier->name;
    }
    
    if( !isset($_POST['missing_add']) ) {
      $data = array(
        'supplier' => $suppliers,
        'selected_supplier' => null,
        'page' => 'missing_add',
      );
      $this->template->load('template', 'materials/stocks/form', $data);
		} else if( isset($_POST['missing_add']) ){
      // Set rules form
      $this->form_validation->set_rules('date', 'Tanggal', 'required');
      $this->form_validation->set_rules('barcode', 'Kodebar', 'required');
      $this->form_validation->set_rules('quantity', 'Jumlah', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'supplier' => $suppliers,
          'selected_supplier' => $this->input->post('supplier'),
          'page' => 'missing_add',
					'row' => $post
				);
				$this->template->load('template', 'materials/stocks/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'missing_add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('stocks/process');
			}
		}
  }
  // End: Stock-missing methods

  // Begin: Stock-founded methods
  public function stock_founded_index() {
    if( isset($_POST['tutorial']) ) {
			$data['tutorial'] = TRUE;
		}
    // data type for filtering type in, out, missing, and founded
    $data['type'] = 'founded';
		$this->template->load('template', 'materials/stocks/index', $data);
  }

  public function stock_founded_add() {

    $query_supppliers = $this->Supplier_model->get();
    $suppliers[''] = '- Pilih - ';
    foreach( $query_supppliers->result() as $supplier) {
      $suppliers[$supplier->supplier_id] = $supplier->name;
    }
    
    if( !isset($_POST['founded_add']) ) {
      $data = array(
        'supplier' => $suppliers,
        'selected_supplier' => null,
        'page' => 'founded_add',
      );
      $this->template->load('template', 'materials/stocks/form', $data);
		} else if( isset($_POST['founded_add']) ){
      // Set rules form
      $this->form_validation->set_rules('date', 'Tanggal', 'required');
      $this->form_validation->set_rules('barcode', 'Kodebar', 'required');
      $this->form_validation->set_rules('quantity', 'Jumlah', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'supplier' => $suppliers,
          'selected_supplier' => $this->input->post('supplier'),
          'page' => 'founded_add',
					'row' => $post
				);
				$this->template->load('template', 'materials/stocks/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'founded_add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('stocks/process');
			}
		}
  }
  // End: Stock-founded methods

  public function process() {
    $post = $_SESSION['data']['row'];	
		if( isset($post['in_add']) ) {
      $check = $this->Stock_model->add_stock($post);
      $this->Material_model->update_stock_in($post);
		} else if( isset($post['out_add']) ) {
      $check = $this->Stock_model->add_stock($post);
      $this->Material_model->update_stock_out($post);
		} else if( isset($post['missing_add']) ) {
      $check = $this->Stock_model->add_stock($post);
      $this->Material_model->update_stock_out($post);
		} else if( isset($post['founded_add']) ) {
      $check = $this->Stock_model->add_stock($post);
      $this->Material_model->update_stock_in($post);
		} 

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
    }

    if( isset($post['in_add']) ) {
      redirect('persediaan/masuk');
		} else if( isset($post['out_add']) ) {
      redirect('persediaan/keluar');
		} else if( isset($post['missing_add']) ) {
      redirect('persediaan/hilang');
		} else if( isset($post['founded_add']) ) {
      redirect('persediaan/ditemukan');
		} 
  }

  public function delete($id, $material_id, $quantity, $type)
	{
		$this->Stock_model->delete($id);
    $error = $this->db->error();
    $this->Material_model->delete_stock($material_id, $quantity, $type);
    $this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
    if( $type == "in" ) {
      redirect('persediaan/masuk');
    } else if( $type == "out" ) {
      redirect('persediaan/keluar');
    } if( $type == "missing" ) {
      redirect('persediaan/hilang');
    } else if( $type == "founded" ) {
      redirect('persediaan/ditemukan');
    }
	}
}