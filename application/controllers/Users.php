<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->check_not_login();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->User_model->get()->result();
		$this->template->load('template', 'users/index', $data);
	}
	
	public function add()
	{		
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Nama pengguna', 'required|min_length[5]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Kata sandi', 'required|min_length[6]');
		$this->form_validation->set_rules('confpass', 'Konfirmasi kata sandi', 'required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('level', 'Tingkat', 'required');

		// Set condition form
		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'users/add');
		} else {
			$post = $this->input->post(null, TRUE);	
			$this->User_model->add($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil disimpan');
				</script>";
			}
			redirect('users');
		}
	}

	public function delete()
	{
		$id = $this->input->post('user_id');
		$this->User_model->delete($id);

		if( $this->db->affected_rows() > 1 ) {
			echo "<script>
					alert('Data berhasil dihapus');
			</script>";
		}
		redirect('users');
	}

	public function edit($id)
	{		
		// Set rules form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Nama pengguna', 'required|min_length[5]|callback_username_check');
		if( $this->input->post('password') || $this->input->post('confpass') ) {
			$this->form_validation->set_rules('password', 'Kata sandi', 'required|min_length[6]');
			$this->form_validation->set_rules('confpass', 'Konfirmasi kata sandi', 'required|min_length[6]|matches[password]');
		}
		$this->form_validation->set_rules('level', 'Tingkat', 'required');

		// Set condition form
		if ($this->form_validation->run() == FALSE) {
			$query = $this->User_model->get($id);
			if( $query->num_rows() > 0 ) {
				$data['row'] = $query->row();
				$this->template->load('template', 'users/edit', $data);
			} else {
				echo "<script>
						alert('Data tidak ditemukan.');
				</script>";
				redirect('users');
			}
		} else {
			$post = $this->input->post(null, TRUE);	
			$this->User_model->edit($post);
			if( $this->db->affected_rows() > 1 ) {
				echo "<script>
						alert('Data berhasil diubah.');
				</script>";
			}
			redirect('users');
		}
	}

	function username_check($str)
	{
		$post = $this->input->post(null, TRUE);	
		$query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND user_id !='$post[user_id]'");
		if( $query->num_rows() > 0 ) {
			$this->form_validation->set_message('username_check', '{field} sudah terpakai.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
