<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salaries extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->functions->only_admin();
		$this->load->model(['Salary_model', 'User_model']);
		$this->load->library('form_validation');
	}

	function get_ajax() {
		$list = $this->Salary_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $salary) {
        $no++;
        $row = array();
        $row[] = $no.".";
        $row[] = $salary->date;
        $row[] = ucwords($salary->user_name);
				$row[] = indo_currency($salary->salary);
				$row[] = $salary->annual_leave." hari";
        // add html for action
				$row[] = '
				<div class="d-flex justify-content-center">
				<button class="mr-1 btn btn-sm btn-outline-info" id="select" 
					data-toggle="modal" data-target="#detail-modal"
					data-date="'.$salary->date.'"
					data-user_name="'.ucwords($salary->user_name).'"
					data-salary="'.indo_currency($salary->salary).'"
					data-meal_allowance="'.indo_currency($salary->meal_allowance).'"
					data-transport_allowance="'.indo_currency($salary->transport_allowance).'"
					data-overtime_allowance="'.indo_currency($salary->overtime_allowance).'"
					data-other_allowance="'.indo_currency($salary->other_allowance).'"
					data-worktime="'.$salary->worktime.' jam"
					data-annual_leave="'.$salary->annual_leave.' hari">
					<i class="fas fa-info-circle"></i> Rincian
				</button>
				<a href="'.base_url('gaji/ubah/').$salary->salary_id.'" class="mr-1 btn btn-outline-primary btn-sm"><i class="far fa-edit"></i> Ubah</a>
				<a href="'.base_url('gaji/hapus/').$salary->salary_id.'" onclick="return confirm(\'Anda akan menghapus data persediaan, yakin?\');" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i> Hapus</a>
				</div>
        ';
        $data[] = $row;
    }
		$output = array(
								"draw" => @$_POST['draw'],
								"recordsTotal" => $this->Salary_model->count_all(),
								"recordsFiltered" => $this->Salary_model->count_filtered(),
								"data" => $data,
						);
		// output to json format
		echo json_encode($output);
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
			$salary->meal_allowance = null;
			$salary->transport_allowance = null;
			$salary->other_allowance = null;
			$salary->overtime_allowance = null;
			$salary->worktime = null;
			$salary->overtime_allowance = null;
			$salary->annual_leave = null;
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
			$this->form_validation->set_rules('date', 'Tahun', 'required');
			$this->form_validation->set_rules('user', 'Nama', 'required');
			$this->form_validation->set_rules('salary', 'Gaji pokok', 'required|numeric');
			$this->form_validation->set_rules('overtime_allowance', 'Upah lembur', 'required|numeric');
			$this->form_validation->set_rules('worktime', 'Waktu kerja', 'required|numeric');
			$this->form_validation->set_rules('annual_leave', 'Hak cuti', 'required|numeric');

			if( $this->Salary_model->get_rows($_POST['user'], $_POST['date']) > 0 ) {
				$this->session->set_flashdata('done', 'Data sudah pernah dibuat.');
				redirect('gaji');
			}

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
			$this->form_validation->set_rules('date', 'Tahun', 'required');
			$this->form_validation->set_rules('user', 'Nama', 'required');
			$this->form_validation->set_rules('salary', 'Gaji pokok', 'required|numeric');
			$this->form_validation->set_rules('overtime_allowance', 'Upah lembur', 'required|numeric');
			$this->form_validation->set_rules('worktime', 'Waktu kerja', 'required|numeric');
			$this->form_validation->set_rules('annual_leave', 'Hak cuti', 'required|numeric');

			if( $this->Salary_model->get_rows($_POST['user'], $_POST['date']) > 0 ) {
				$this->session->set_flashdata('done', 'Data sudah pernah dibuat.');
				redirect('gaji');
			}
			
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

	public function delete($id)
	{
		$salary = $this->Salary_model->get($id)->row();
		$this->Salary_model->delete($id);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
		redirect('gaji');
	}
	
	function user_id_check($str)
	{
		$post = $this->input->post(null, TRUE);	
		$query = $this->db->query("SELECT * FROM salaries WHERE user_id = '$post[user_id]' AND user_id !='$post[user_id]'");
		if( $query->num_rows() > 0 ) {
			$this->form_validation->set_message('user_id_check', '{field} sudah terpakai.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
  
}
