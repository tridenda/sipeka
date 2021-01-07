<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendances extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->load->model(['Attendance_model', 'Salary_model']);
		$this->load->library('form_validation');
	}

	public function index()
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
		$data['row'] = $this->Attendance_model->get($id)->result();	
		$data['is_attend'] = $this->Attendance_model->is_attend($id);
		$data['salary'] = $this->Salary_model->get_salary($id)->row();
		$this->template->load('template', 'attendances/fill_attendance', $data);
  }
  
  public function absence()
	{
		$this->template->load('template', 'attendances/absence');
	}
}