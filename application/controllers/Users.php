<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->login->check_not_login();
		$this->load->model('User_model');
		$this->template->load('template', 'users/index');
	}
	
	public function add()
	{
		$this->login->check_not_login();	
		
		// Load form validation
		$this->load->library('form_validation');
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Nama pengguna', 'required|min_length[5]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Kata sandi', 'required|min_length[6]');
		$this->form_validation->set_rules('confpass', 'Konfirmasi kata sandi', 'required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('level', 'Tingkat', 'required');
		// Set message to Indonesian
		$this->form_validation->set_message('required', '{field} harus terisi.');
		$this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
		$this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');
		$this->form_validation->set_message('is_unique', '{field} sudah terdaftar.');
		// Set condition form
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'users/add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->load->model('User_model');	
			$this->User_model->add($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil disimpan');
				</script>";
			}
			redirect('users');
		}

		
	}
}
