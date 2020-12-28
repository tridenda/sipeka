<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->login->check_not_login();
		// $this->login->check_the_cashier();
		$this->login->check_the_guest();
		$this->load->model('Unit_model');
		$this->load->library('form_validation');
  }

  public function index()
	{
		$data['row'] = $this->Unit_model->get()->result();
		$this->template->load('template', 'materials/units/index', $data);
	}

	public function add()
	{		
		if( !isset($_POST['add']) ) {
			$unit = new stdClass();
			$unit->unit_id = null;
			$unit->name = null;
			$data = array(
				'page' => 'add',
				'row' => $unit
			);

			$this->template->load('template', 'materials/units/form', $data);
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
				$this->template->load('template', 'materials/units/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('units/process');
			}
		}
	}

	public function edit($id)
	{		
		if( !isset($_POST['edit']) ) {
			$query = $this->Unit_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$unit = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $unit
				);
				$this->template->load('template', 'materials/units/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('units');
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
				$this->template->load('template', 'materials/units/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('units/process');
			}
		}
	}

	public function process()
	{
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
			$this->Unit_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->Unit_model->edit($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('units');
	}

	public function delete()
	{
		$id = $this->input->post('unit_id');
		$this->Unit_model->delete($id);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
		redirect('units');
	}
}