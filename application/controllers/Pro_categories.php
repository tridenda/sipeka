<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pro_categories extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->functions->not_login_cashier();
		$this->load->model('Pro_category_model');
		$this->load->library('form_validation');
  }

  public function index()
	{
		if( isset($_POST['tutorial']) ) {
			$data['tutorial'] = TRUE;
		}
		$data['row'] = $this->Pro_category_model->get()->result();
		$this->template->load('template', 'products/categories/index', $data);
	}

	public function add()
	{		
		if( !isset($_POST['add']) ) {
			$category = new stdClass();
			$category->category_id = null;
			$category->name = null;
			$data = array(
				'page' => 'add',
				'row' => $category
			);

			$this->template->load('template', 'products/categories/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
					'row' => $post
				);
				$this->template->load('template', 'products/categories/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('pro_categories/process');
			}
		}
	}

	public function edit($id)
	{		
		if( !isset($_POST['edit']) ) {
			$query = $this->Pro_category_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$category = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $category
				);
				$this->template->load('template', 'products/categories/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('produk/kategori');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->template->load('template', 'products/categories/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('pro_categories/process');
			}
		}
	}

	public function process()
	{
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
			$this->Pro_category_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->Pro_category_model->edit($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('produk/kategori');
	}

	public function delete()
	{
		$id = $this->input->post('category_id');
		$this->Pro_category_model->delete($id);
		$error = $this->db->error();

		if( $error['code'] == 0 ) {
			$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
			redirect('produk/kategori');
		} else {
			$this->session->set_flashdata('used', 'Data sedang digunakan di daftar bahan, silahkan hapus semua data bahan yang berhubungan dengan kategori ini.');
			redirect('produk/kategori');
		}
	}
}