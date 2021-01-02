<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->check_not_login();
		// $this->login->check_the_cashier();
    $this->login->check_the_guest();
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
        data-initial_qty="'.$material->quantity.'">
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
        $row[] = indo_date($stock->date, TRUE);
        $row[] = $stock->material_name;
        $row[] = $stock->quantity;
        $row[] = $stock->notes;
        // if user klik detail
        $row[] = $stock->supplier_name;
        $row[] = $stock->created;
        $row[] = $stock->user_name;
        $row[] = $stock->material_barcode;
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
          data-material_barcode="'.$stock->material_barcode.'">
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

  public function stock_in_delete() {
		$this->template->load('template', 'materials/stocks/index');
  }
  // End: Stock-in methods

  // Begin: Stock-out methods
  public function stock_out_index() {
		$this->template->load('template', 'materials/stocks/index');
  }

  public function stock_out_add() {
		$this->template->load('template', 'materials/stocks/index');
  }

  public function stock_out_delete() {
		$this->template->load('template', 'materials/stocks/index');
  }
  // End: Stock-out methods

  // Begin: Stock-missing methods
  public function stock_missing_index() {
		$this->template->load('template', 'materials/stocks/index');
  }

  public function stock_missing_add() {
		$this->template->load('template', 'materials/stocks/index');
  }

  public function stock_missing_delete() {
		$this->template->load('template', 'materials/stocks/index');
  }
  // End: Stock-missing methods

  // Begin: Stock-founded methods
  public function stock_founded_index() {
		$this->template->load('template', 'materials/stocks/index');
  }

  public function stock_founded_add() {
		$this->template->load('template', 'materials/stocks/index');
  }

  public function stock_founded_delete() {
		$this->template->load('template', 'materials/stocks/index');
  }
  // End: Stock-founded methods

  public function process() {
    $post = $_SESSION['data']['row'];	
		if( isset($post['in_add']) ) {
      $check = $this->Stock_model->add_stock_in($post);
      $this->Material_model->update_stock_in($post);
		} 

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
    redirect('persediaan/masuk');
  }

  public function delete($id, $material_id, $quantity, $type)
	{
		$this->Stock_model->delete($id);
    $error = $this->db->error();

    $this->Material_model->update_stock_out($material_id, $quantity);
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