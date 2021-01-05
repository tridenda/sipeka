<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salaries extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->not_login_cashier();
		$this->login->only_admin();
		$this->load->model(['Salary_model', 'User_model']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->Salary_model->get()->result();
		$this->template->load('template', 'users/salaries/index', $data);
	}
	
	public function add()
	{		
    $query_users = $this->User_model->get();
		$users[''] = '- Pilih - ';
		foreach( $query_users->result() as $user) {
			$users[$user->user_id] = $user->name;
		}
    
		if( !isset($_POST['add']) ) {
			$salary = new stdClass();
			$salary->salary_id = null;
			$salary->user_id = null;
			$salary->salary = null;
			$salary->notes = null;
			$salary->created = null;
			$salary->updated = null;
			$data = array(
        'page' => 'add',
        'user' => $users,
				'selected_user' => null,
				'row' => $salary
			);

			$this->template->load('template', 'users/salaries/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
      $this->form_validation->set_rules('user', 'Nama pramuniaga', 'required');
      $this->form_validation->set_rules('salary', 'Gaji', 'required|numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
          'page' => 'add',
          'user' => $users,
					'selected_user' => $this->input->post('user'),
					'row' => $post
				);
				$this->template->load('template', 'users/salaries/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
        $_SESSION['data'] = array(
          'page' => 'add',
          'row' => $post
				);
        $this->session->set_flashdata('item');
        redirect('salaries/process');
			}
		}
	}

	public function edit($id)
	{		
    $query_salaries = $this->Salary_model->get($id);
		if( $query_salaries->num_rows() > 0 ) {
			$salaries = $query_salaries->row();
			
			$query_users = $this->User_model->get();
			foreach( $query_users->result() as $user) {
				$users[$user->user_id] = $user->name;
			}
			
		} else {
			$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
			redirect('daftar_bahan');
		}

		if( $this->input->post('user') ) {
			$salaries->user_id = $this->input->post('user');
		}
    
		if( !isset($_POST['edit']) ) {
			$query = $this->Salary_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$salary = $query->row();
				$data = array(
					'page' => 'edit',
					'user' => $users,
					'selected_user' => $salaries->user_id,
					'row' => $salary
				);
				$this->template->load('template', 'users/salaries/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('gaji');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
      $this->form_validation->set_rules('user', 'Nama pramuniaga', 'required');
      $this->form_validation->set_rules('salary', 'Gaji', 'required|numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
          'page' => 'edit',
          'user' => $users,
					'selected_user' => $salaries->user_id,
					'row' => $post
				);
				
				$this->template->load('template', 'users/salaries/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);	
        $_SESSION['data'] = array(
          'page' => 'edit',
          'row' => $post
				);
				
        $this->session->set_flashdata('item');
        redirect('salaries/process');
			}
		}
	}

	public function process()
	{
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
      $this->Salary_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->Salary_model->edit($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('gaji');
	}

	public function delete()
	{
		$id = $this->input->post('salary_id');
		$salary = $this->Salary_model->get($id)->row();
		$this->Salary_model->delete($id);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
		redirect('gaji');
  }
  
}
