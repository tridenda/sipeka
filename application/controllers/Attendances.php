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

	// Begin: Attendance
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
			$this->Attendance_model->add_attendance($post);
		}

		$data['row'] = $this->Attendance_model->get_attendance($id)->result();	
		$data['is_attend'] = $this->Attendance_model->is_attend($id);
		$data['salary'] = $this->Salary_model->get_salary($id)->row();
		$this->template->load('template', 'attendances/attendances/index', $data);
	}
	// End: Attendance
	
	// Begin: Overtime
  public function overtime()
	{
		$data['row'] = $this->Attendance_model->get_overtime()->result();	
		$this->template->load('template', 'attendances/overtime/index', $data);
	}

	
	public function add_overtime()
	{
		$query_users = $this->User_model->get();
		$users[''] = '- Pilih - ';
		foreach( $query_users->result() as $user) {
			$users[$user->user_id] = $user->name;
		}

		$attendance = new stdClass();
		$attendance->attendance_id = null;
		$attendance->user_id = null;
		$attendance->user_name = null;
		$attendance->salary_id = null;
		$attendance->overtime_hour = null;
		$attendance->hour = null;
		$attendance->status = null;
		$attendance->date = date('Y-m-d');

		if( !isset($_POST['add']) ) {
			$data = array(
				'page' => 'add',
				'row' => $attendance,
        'user' => $users,
				'selected_user' => null
			);

			$this->template->load('template', 'attendances/overtime/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('user', 'Nama', 'required');
			$this->form_validation->set_rules('overtime_hour', 'Jumlah ', 'required|numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
          'user' => $users,
					'selected_user' => $this->input->post('user'),
					'row' => $post
				);
				$this->template->load('template', 'attendances/overtime/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				
				$query = $this->Attendance_model->is_attend($post['user'], $post['date']);
				$salary_id = $this->Salary_model->get_salary($post['user'])->row()->salary_id;
				
				if( !isset($salary_id) ) {
					$this->session->set_flashdata('empty', 'Tidak ada data gaji dari pegawai tersebut, mohon isi data gaji sebelum mengisi data lembur.');

					redirect('gaji');
					exit();
				}

				$this->Attendance_model->edit_overtime($post);

				$this->session->set_flashdata('success', 'Status kehadiran dirubah menjadi lembur.');
				redirect('pengisian_lembur');
			}
		}
	}

	public function edit_overtime($id)
	{		
		$query_attendance = $this->Attendance_model->get($id);
		if( $query_attendance->num_rows() > 0 ) {
			$attendance = $query_attendance->row();
			
			$query_users = $this->User_model->get();
			$users[''] = '- Pilih - ';
			foreach( $query_users->result() as $user) {
				$users[$user->user_id] = $user->name;
			}
			
		} else {
			$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
			redirect('pengisian_lembur');
		}

		if( $this->input->post('user') ) {
			$attendance->user_id = $this->input->post('user');
		}

		if( !isset($_POST['edit']) ) {	
			if( $query_attendance->num_rows() > 0 ) {
				$data = array(
					'page' => 'edit',
					'row' => $attendance,
					'user' => $users,
					'selected_user' => $attendance->user_id,
				);
				$this->template->load('template', 'attendances/overtime/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('pengisian_lembur');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
			$this->form_validation->set_rules('user', 'Nama', 'required');
			$this->form_validation->set_rules('overtime_hour', 'Jumlah ', 'required|numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'edit',
					'row' => $attendance,
					'user' => $users,
					'selected_user' => $attendance->user_id,
				);
				$this->template->load('template', 'attendances/overtime/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				
				$query = $this->Attendance_model->is_attend($post['user'], $post['date']);
				$salary_id = $this->Salary_model->get_salary($post['user'])->row()->salary_id;
				if( !isset($salary_id) ) {
					$this->session->set_flashdata('empty', 'Tidak ada data gaji dari pegawai tersebut, mohon isi data gaji sebelum mengisi data lembur.');

					redirect('gaji');
					exit();
				}

				if( $query->num_rows() > 0 ) {
					$this->Attendance_model->edit_overtime($post);

					$this->session->set_flashdata('success', 'Data berhasil diubah.');
					redirect('pengisian_lembur');
				} else {
					$this->session->set_flashdata('empty', 'Karyawan belum mengisi kehadiran.');

					redirect('pengisian_lembur');
				}
			}
		}
	}

	public function delete_overtime() 
	{
		$post = $this->input->post(null, TRUE);
		$this->Attendance_model->delete_overtime($post);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus dari data lembur.');

		redirect('pengisian_lembur');
	}
	// End: Overtime

	// Begin: Annual leave
	public function annual_leave()
	{
		$data['row'] = $this->Attendance_model->get_annual_leave()->result();	
		$this->template->load('template', 'attendances/annual_leave/index', $data);
	}

	public function add_annual_leave()
	{
		$query_users = $this->User_model->get();
		$users[''] = '- Pilih - ';
		foreach( $query_users->result() as $user) {
			$users[$user->user_id] = $user->name;
		}

		$attendance = new stdClass();
		$attendance->attendance_id = null;
		$attendance->user_id = null;
		$attendance->user_name = null;
		$attendance->salary_id = null;
		$attendance->overtime_hour = null;
		$attendance->hour = null;
		$attendance->status = null;
		$attendance->date = date('Y-m-d');

		if( !isset($_POST['add']) ) {
			$data = array(
				'page' => 'add',
				'row' => $attendance,
        'user' => $users,
				'selected_user' => null
			);

			$this->template->load('template', 'attendances/annual_leave/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('user', 'Nama', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
          'user' => $users,
					'selected_user' => $this->input->post('user'),
					'row' => $post
				);
				$this->template->load('template', 'attendances/annual_leave/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$query = $this->Attendance_model->is_attend($post['user'], $post['date']);
				$salary_id = $this->Salary_model->get_salary($post['user'])->row()->salary_id;
				
				if( !isset($salary_id) ) {
					$this->session->set_flashdata('empty', 'Tidak ada data gaji dari pegawai tersebut, mohon isi data gaji sebelum mengisi data cuti.');

					redirect('gaji');
					exit();
				}

				if( $query->num_rows() > 0 ) {
					$salary = $this->Salary_model->get($salary_id)->row();
					if( $salary->annual_leave > 0 ) {
						$this->Salary_model->sub_annual_leave($salary_id);
						$this->Attendance_model->edit_annual_leave($post);

						$this->session->set_flashdata('success', 'Status kehadiran dirubah menjadi cuti.');
						redirect('pengisian_cuti');
					} else {
						$this->session->set_flashdata('empty', 'Hak cuti telah habis untuk pegawai tersebut.');
						redirect('pengisian_cuti');
					}
				} else {
					$this->session->set_flashdata('empty', 'Karyawan belum mengisi kehadiran.');
						redirect('pengisian_cuti');
				}
			}
		}
	}

	public function delete_annual_leave() 
	{
		$post = $this->input->post(null, TRUE);
		
		$this->Salary_model->add_annual_leave($post['salary_id']);
		$this->Attendance_model->delete_annual_leave($post);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus dari data lembur.');

		redirect('pengisian_cuti');
	}
	// End: Annual leave
}