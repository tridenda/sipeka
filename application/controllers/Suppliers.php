<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->functions->not_login_cashier();
		$this->load->model('Supplier_model');
		$this->load->library('form_validation');
  }

  public function index()
	{
		if( isset($_POST['tutorial']) ) {
			$data['tutorial'] = TRUE;
		}
		$data['row'] = $this->Supplier_model->get()->result();
		$this->template->load('template', 'materials/suppliers/index', $data);
	}

	public function add()
	{		
		if( !isset($_POST['add']) ) {
			$supplier = new stdClass();
			$supplier->supplier_id = null;
			$supplier->name = null;
			$supplier->phone = null;
			$supplier->address = null;
			$supplier->notes = null;
			$data = array(
				'page' => 'add',
				'row' => $supplier
			);

			$this->template->load('template', 'materials/suppliers/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('phone', 'Nomor telepon', 'numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
					'row' => $post
				);
				$this->template->load('template', 'materials/suppliers/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('suppliers/process');
			}
		}
	}

	public function edit($id)
	{		
		if( !isset($_POST['edit']) ) {
			$query = $this->Supplier_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$supplier = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $supplier
				);
				$this->template->load('template', 'materials/suppliers/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('pemasok');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('phone', 'Nomor telepon', 'numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->template->load('template', 'materials/suppliers/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('suppliers/process');
			}
		}
	}

	public function process()
	{
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
			$this->Supplier_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->Supplier_model->edit($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('pemasok');
	}

	public function delete()
	{
		$id = $this->input->post('supplier_id');
		$this->Supplier_model->delete($id);
		$error = $this->db->error();

		if( $error['code'] == 0 ) {
			$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
			redirect('pemasok');
		} else {
			$this->session->set_flashdata('used', 'Data sedang digunakan di daftar bahan, silahkan hapus semua data bahan yang berhubungan dengan kategori ini.');
			redirect('pemasok');
		}
	}
}