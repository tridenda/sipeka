<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->load->model('Member_model');
		$this->load->library('form_validation');
	}

	function get_ajax() {
		$list = $this->Member_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $member) {
				$no++;
				$row = array();
				$row[] = $no.".";
				$row[] = $member->name;
				$row[] = $member->gender == 'male' ? 'Laki-laki' : 'Perempuan';
				$row[] = $member->phone;
				$row[] = $member->address;
				$row[] = indo_currency($member->point);
				$row[] = '
					<form action="'.base_url('pengguna/pelanggan/hapus').'" method="post">
						<a class="btn btn-sm btn-outline-primary" href="'.base_url('pengguna/pelanggan/ubah/'.$member->member_id).'">
							<i class="far fa-edit"></i> Ubah
						</a>
						<input name="member_id" type="hidden" value="'.$member->member_id.'">
						<button onclick="return confirm(\'Anda akan menghapus data pelanggan, yakin?\');" class="btn btn-sm btn-outline-danger">
							<i class="far fa-trash-alt"></i> Hapus
						</button>
					</form>';
				$row[] = '
					<form action="'.base_url('penjualan/pesanan_baru').'" method="post">
						<button class="btn btn-sm btn-primary">
							<i class="fas fa-hand-pointer"></i> Pilih
						</button>
					</form>
					';
				$data[] = $row;
		}
		$output = array(
								"draw" => @$_POST['draw'],
								"recordsTotal" => $this->Member_model->count_all(),
								"recordsFiltered" => $this->Member_model->count_filtered(),
								"data" => $data,
						);
		// output to json format
		echo json_encode($output);
	}

	public function index()
	{
		if( isset($_POST['tutorial']) ) {
			$data['tutorial'] = TRUE;
		}
		$data['row'] = $this->Member_model->get()->result();
		$this->template->load('template', 'users/members/index', $data);
	}

	public function add()
	{		
		if( !isset($_POST['add']) ) {
			$member = new stdClass();
			$member->member_id = null;
			$member->name = null;
			$member->gender = null;
			$member->phone = null;
			$member->address = null;
			$member->point = null;
			$data = array(
				'page' => 'add',
				'row' => $member
			);

			$this->template->load('template', 'users/members/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('gender', 'Jenis kelamin', 'required');
			$this->form_validation->set_rules('phone', 'Nomor HP', 'required|is_unique[members.phone]');
			$this->form_validation->set_rules('point', 'Poin', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
					'row' => $post
				);
				$this->template->load('template', 'users/members/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$post['image'] = null;	
				$_SESSION['data'] = array(
					'page' => 'add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('members/process');
			}
		}
	}
	
	public function edit($id)
	{		
		if( !isset($_POST['edit']) ) {
			$query = $this->Member_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$member = $query->row();
				$member->passconf = null;
				$data = array(
					'page' => 'edit',
					'row' => $member
				);
				$this->template->load('template', 'users/members/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('pengguna/pelanggan');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('gender', 'Jenis kelamin', 'required');
			$this->form_validation->set_rules('phone', 'Nomor HP', 'required|callback_phone_check');
			$this->form_validation->set_rules('point', 'Poin', 'required');
			$this->form_validation->set_rules('name', 'Nama', 'required');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->template->load('template', 'users/members/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);

				$_SESSION['data'] = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('members/process');
			}
		}
	}

	public function process()
	{
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
			$this->Member_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->Member_model->edit($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('pengguna/pelanggan');
	}

	public function delete()
	{
		$id = $this->input->post('member_id');
		$this->Member_model->delete($id);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
		redirect('pengguna/pelanggan');
	}

	function phone_check($str)
	{
		$post = $this->input->post(null, TRUE);	
		$query = $this->db->query("SELECT * FROM members WHERE phone = '$post[phone]' AND member_id != '$post[member_id]'");
		if( $query->num_rows() > 0 ) {
			$this->form_validation->set_message('phone_check', '{field} sudah terpakai.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}