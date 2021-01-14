<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salaries extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
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
				if( $this->functions->user_login()->level == '1') {
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
				} else {
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
					</div>
					';
				}
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
		$this->template->load('template', 'salaries/salaries/index', $data);
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

			$this->template->load('template', 'salaries/salaries/form', $data);
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
				$this->template->load('template', 'salaries/salaries/form', $data);
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

	// Begin: Payments
	public function salary_payment()
	{
		//Preparing to input status on table attendances and add workday on table users
		if( isset($_POST['submit']) ) {
			$this->form_validation->set_rules('workdaysum', 'Hari kerja', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {

				// Nothing happend

			} else {
				// get the post date, user_id, user_name, attendance, annual_leave, overtime, and workday
				$post = $this->input->post(null, TRUE);
				$initial_salary = $this->Salary_model->get_salary($post['user_id'], $post['date'])->row();

				// get user data
				$user_data = $this->User_model->get($post['user_id'])->row();
				// salary perhour
				// basic salary / (workdaysum * worktime perday)
				$salary_perhour = $initial_salary->salary / ($post['workdaysum'] * $initial_salary->worktime);
				
				// salary permonth
				// (attendancee + annual_leave) * workdaysum * worktime perday
				$salary_permonth = ($post['attendance'] + $post['annual_leave']) * $salary_perhour * $initial_salary->worktime;

				// overtime salary per
				// overtime * overtime allowance
				$salary_overtime = $post['overtime'] * $initial_salary->overtime_allowance;

				$_SESSION['data'] = array(
					'salary_perhour' => $salary_perhour,
					'salary_permonth' => $salary_permonth,
					'salary_overtime' => $salary_overtime,
					'initial_salary' => $initial_salary,
					'user_data' => $user_data,
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('pembayaran_gaji/form');
			}
		}
		$data['row'] = $this->Salary_model->get_payment()->result();
		$this->template->load('template', 'salaries/salary_payment/index', $data);
	}  

	public function salary_payment_form()
	{
		// There's a bug miss algoritm when pay something
		// In the first input workdaysum will be added
		// and in the second or else workday is same with the first input
		$this->functions->only_admin();
		if( isset($_POST['submit']) ) {
			$post = $this->input->post(null, TRUE);
			$this->Salary_model->finish_payment($post);
			if( isset($post['workdaysum']) ) {
				$this->Salary_model->update_workdaysum($post);
			}
			
			$this->session->set_flashdata('success', 'Gaji berhasil terbayar');
			redirect('pembayaran_gaji');
		}
		$this->template->load('template', 'salaries/salary_payment/form');
	} 
	
	public function annual_leave_payment()
	{
		$data['row'] = $this->Salary_model->get()->result();
		$this->template->load('template', 'salaries/annual_leave_payment/index', $data);
	}  

	public function annual_leave_payment_form()
	{
		$this->functions->only_admin();
		if( isset($_POST['submit']) ) {
			$post = $this->input->post(null, TRUE);
			$this->Salary_model->update_annual_leave($post);
						
			$this->session->set_flashdata('success', 'Cuti berhasil dibayar');
			redirect('pembayaran_cuti');
		}
		$post = $this->input->post(null, TRUE);
		$data['user_data'] = $this->User_model->get($post['user_id'])->row();
		$data['row'] = $post;
		$this->template->load('template', 'salaries/annual_leave_payment/form', $data);
	}  
	// End: Payments  
}
