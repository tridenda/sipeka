<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendances extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->load->model(['Attendance_model', 'Salary_model', 'User_model']);
		$this->load->library('form_validation');
	}

	public function attendance()
	{	
		$id = $this->session->userdata('userid');	
		$post = $this->input->post(null, TRUE);
		if( isset($post['add']) ) {
			$query = $this->Attendance_model->is_attend($id);	
			if( $query->num_rows() > 0 ) {
				$this->session->set_flashdata('done', 'Anda sudah mengisi kehadiran.');
				redirect('pengisian_kehadiran');
			}
			$this->Attendance_model->add($post);
		}
		$data['row'] = $this->Attendance_model->get_attendance($id)->result();	
		$data['is_attend'] = $this->Attendance_model->is_attend($id);
		$data['salary'] = $this->Salary_model->get_salary($id)->row();
		$this->template->load('template', 'attendances/attendances/index', $data);
  }
	
	// Overtime work only by Admin
  public function overtime()
	{
		$this->functions->only_admin();
		$data['row'] = $this->Attendance_model->get_overtime()->result();	
		$this->template->load('template', 'attendances/overtime/index', $data);
	}

	public function add_overtime()
	{
		$this->functions->only_admin();
		$query_users = $this->User_model->get();
		$users[''] = '- Pilih - ';
		foreach( $query_users->result() as $user) {
			$users[$user->user_id] = $user->name;
		}

		if( !isset($_POST['submit']) ) {
			$data = array(
        'user' => $users,
				'selected_user' => null,
			);

			$this->template->load('template', 'attendances/overtime/form', $data);
		} else if( isset($_POST['submit']) ){
			// Set rules form
			$this->form_validation->set_rules('user', 'Nama', 'required');
			$this->form_validation->set_rules('overtime_hour', 'Jumlah ', 'required|numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
          'user' => $users,
					'selected_user' => $this->input->post('user'),
					'row' => $post
				);
				$this->template->load('template', 'attendances/overtime/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				
				$query = $this->Attendance_model->is_attend($post['user'], $post['created']);
				
				if( $query->num_rows() > 0 ) {
					$this->Attendance_model->edit($post);

					$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
					redirect('pengisian_lembur');
				}
				$salary_id = $this->Salary_model->get_salary($post['user'])->row()->salary_id;
				$this->Attendance_model->add($post, $salary_id);
				

				if( $this->db->affected_rows() > 0 ) {
					$this->session->set_flashdata('success', 'Data berhasil disimpan.');
				}
				redirect('pengisian_lembur');
			}
		}
	}

	// Annual leave only by Admin
	public function annual_leave()
	{
		$this->functions->only_admin();
		$this->template->load('template', 'attendances/annual_leave/index');
	}
}