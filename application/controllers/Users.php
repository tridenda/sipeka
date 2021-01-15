<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->functions->only_admin();
		$data['row'] = $this->User_model->get()->result();
		$this->template->load('template', 'users/users/index', $data);
	}
	
	public function add()
	{		
		$this->functions->only_admin();
		if( !isset($_POST['add']) ) {
			$user = new stdClass();
			$user->user_id = null;
			$user->name = null;
			$user->username = null;
			$user->password = null;
			$user->passconf = null;
			$user->address = null;
			$user->level = null;
			$user->image = null;
			$user->created = null;
			$user->updated = null;
			$data = array(
				'page' => 'add',
				'row' => $user
			);

			$this->template->load('template', 'users/users/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('username', 'Nama pengguna', 'required|min_length[5]|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'Kata sandi', 'required|min_length[6]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi kata sandi', 'required|min_length[6]|matches[password]');
			$this->form_validation->set_rules('level', 'Tingkat', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
					'row' => $post
				);
				$this->template->load('template', 'users/users/form', $data);
			} else {
				// Image configuration before upload
				$config['upload_path'] = './uploads/users/cashier/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = 'user-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload', $config);

				// Image condition if there's an image
				if( @$_FILES['image']['name'] != null ) {
					if( $this->upload->do_upload('image') ) {
						$post = $this->input->post(null, TRUE);	
						$post['image'] = $this->upload->data('file_name');
						$_SESSION['data'] = array(
							'page' => 'add',
							'row' => $post
						);
						$this->session->set_flashdata('item');
						$this->User_model->add($post);
						$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
						redirect('pengguna/pramuniaga');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pengguna/pramuniaga');
					} 
				} else {
					$post = $this->input->post(null, TRUE);
					$post['image'] = null;	
					$_SESSION['data'] = array(
						'page' => 'add',
						'row' => $post
					);
					$this->session->set_flashdata('item');
					redirect('users/process');
				}
			}
		}
	}

	public function edit($id)
	{		
		$this->functions->only_admin();
		if( !isset($_POST['edit']) ) {
			$query = $this->User_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$user = $query->row();
				$user->passconf = null;
				$data = array(
					'page' => 'edit',
					'row' => $user
				);
				$this->template->load('template', 'users/users/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('pengguna/pramuniaga');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('username', 'Nama pengguna', 'required|min_length[5]|callback_username_check');
			if( $this->input->post('password') || $this->input->post('passconf') ) {
				$this->form_validation->set_rules('password', 'Kata sandi', 'required|min_length[6]');
				$this->form_validation->set_rules('passconf', 'Konfirmasi kata sandi', 'required|min_length[6]|matches[password]');
			}
			$this->form_validation->set_rules('level', 'Tingkat', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->template->load('template', 'users/users/form', $data);
			} else {
				// Image configuration before upload
				$config['upload_path'] = './uploads/users/cashier/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = 'user-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload', $config);

				// Image condition if there's an image
				if( @$_FILES['image']['name'] != null ) {
					if( $this->upload->do_upload('image') ) {
						$user = $this->User_model->get($post['id'])->row();
						if( $user->image != null  && $user->image != 'login.jpg') {
							$target_file = './uploads/users/cashier/'.$user->image;
							unlink($target_file);
						}

						$post = $this->input->post(null, TRUE);	
						$post['image'] = $this->upload->data('file_name');
						$_SESSION['data'] = array(
							'page' => 'edit',
							'row' => $post
						);
						$this->session->set_flashdata('item');
						$this->User_model->edit($post);
						$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
						redirect('pengguna/pramuniaga');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pengguna/pramuniaga');
					} 
				} else {
					$post = $this->input->post(null, TRUE);
					$post['image'] = null;	
					$_SESSION['data'] = array(
						'page' => 'edit',
						'row' => $post
					);
					$this->session->set_flashdata('item');
					redirect('users/process');
				}
			}
		}
	}

	public function process()
	{
		
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
			$this->User_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->User_model->edit($post);
		} else if( isset($post['user_edit']) ) {
			$this->User_model->edit($post);
			if( $this->db->affected_rows() > 0 ) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			}
			redirect('pengguna/pengaturan');
			exit();
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('pengguna/pramuniaga');
	}

	public function delete()
	{
		$this->functions->only_admin();
		$id = $this->input->post('user_id');
		$user = $this->User_model->get($id)->row();
		if( $user->image != null && $user->image != 'login.jpg') {
			$target_file = './uploads/users/cashier/'.$user->image;
			unlink($target_file);
		}
		$this->User_model->delete($id);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
		redirect('pengguna/pramuniaga');
	}

	function username_check($str)
	{
		$this->functions->only_admin();
		$post = $this->input->post(null, TRUE);	
		$query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND user_id !='$post[user_id]'");
		if( $query->num_rows() > 0 ) {
			$this->form_validation->set_message('username_check', '{field} sudah terpakai.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function settings()
	{		
		if( !isset($_POST['user_edit']) ) {
			$query = $this->User_model->get($_SESSION['userid']);	
			if( $query->num_rows() > 0 ) {
				$user = $query->row();
				$user->passconf = null;
				$data = array(
					'page' => 'user_edit',
					'row' => $user
				);
				$this->template->load('template', 'users/users/settings', $data);
			} 
		} else if( isset($_POST['user_edit']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');
			if( $this->input->post('password') || $this->input->post('passconf') ) {
				$this->form_validation->set_rules('password', 'Kata sandi', 'required|min_length[6]');
				$this->form_validation->set_rules('passconf', 'Konfirmasi kata sandi', 'required|min_length[6]|matches[password]');
			}

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'user_edit',
					'row' => $post
				);
				$this->template->load('template', 'users/users/settings', $data);
			} else {
				// Image configuration before upload
				$config['upload_path'] = './uploads/users/cashier/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = 'user-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload', $config);

				
				// Image condition if there's an image
				if( @$_FILES['image']['name'] != null ) {
					if( $this->upload->do_upload('image') ) {
						$user = $this->User_model->get($post['id'])->row();
						if( $user->image != null  && $user->image != 'login.jpg') {
							$target_file = './uploads/users/cashier/'.$user->image;
							unlink($target_file);
						}

						$post = $this->input->post(null, TRUE);	
						$post['image'] = $this->upload->data('file_name');
						$_SESSION['data'] = array(
							'page' => 'user_edit',
							'row' => $post
						);
						$this->session->set_flashdata('item');
						$this->User_model->edit($post);
						$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
						redirect('pengguna/pengaturan');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pengguna/pengaturan');
					} 
				} else {
										$post = $this->input->post(null, TRUE);
					$post['image'] = null;	
					$_SESSION['data'] = array(
						'page' => 'user_edit',
						'row' => $post
					);
					$this->session->set_flashdata('item');
					redirect('users/process');
				}
			}
		}
	}

	public function helper()
	{
		$this->template->load('template', 'users/users/helper');
	}
}
