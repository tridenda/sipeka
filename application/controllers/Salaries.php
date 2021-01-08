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
					data-salary="'.indo_currency($salary->salary).' / bulan"
					data-meal_allowance="'.indo_currency($salary->meal_allowance).' / bulan"
					data-transport_allowance="'.indo_currency($salary->transport_allowance).' / bulan"
					data-overtime_allowance="'.indo_currency($salary->overtime_allowance).' / jam"
					data-other_allowance="'.indo_currency($salary->other_allowance).' / bulan"
					data-worktime="'.$salary->worktime.' jam"
					data-annual_leave="'.$salary->annual_leave.' hari">
					<i class="fas fa-info-circle"></i> Rincian
				</button>
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
			$this->form_validation->set_rules('date', 'Tahun', 'required|callback_date_check');
			$this->form_validation->set_rules('user', 'Nama', 'required');
			$this->form_validation->set_rules('salary', 'Gaji pokok', 'required|numeric');
			$this->form_validation->set_rules('overtime_allowance', 'Upah lembur', 'required|numeric');
			$this->form_validation->set_rules('worktime', 'Waktu kerja', 'required|numeric');
			$this->form_validation->set_rules('annual_leave', 'Hak cuti', 'required|numeric');

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
	
	function date_check($str)
	{
		$post = $this->input->post(null, TRUE);	
		$query = $this->db->query("SELECT * FROM salaries WHERE date = '$post[date]' AND user_id = '$post[user]'");
		if( $query->num_rows() > 0 ) {
			$this->form_validation->set_message('date_check', '{field} pernah dibuat.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
  
}
