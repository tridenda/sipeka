<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materials extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login->not_login_cashier();
		$this->load->model(['Material_model','Unit_model', 'Category_model']);
		$this->load->library('form_validation');
	}

	function get_ajax() {
		$list = $this->Material_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $material) {
				$no++;
				$row = array();
				$row[] = $no.".";
				$row[] = $material->barcode;
				$row[] = $material->name;
				$row[] = $material->category_name;
				$row[] = indo_currency($material->price);
				$row[] = $material->unit_name;
				$row[] = $material->quantity;
				// $row[] = $material->image != null ? '<img src="'.base_url('uploads/materials/materials/'.$material->image).'" class="img" alt="Gambar '.$material->name.'" style="width: 5rem; height: 5rem">' : null;
				// add html for action
				$row[] = '
				<form action="'.base_url('daftar_bahan/hapus').'" method="post">
					<a class="btn btn-sm btn-outline-primary" href="'.base_url('daftar_bahan/ubah/').$material->material_id.'">
						<i class="far fa-edit"></i> Ubah
					</a>
					<input name="material_id" type="hidden" value="'.$material->material_id.'">
					<button onclick="return confirm(\'Anda akan menghapus data bahan, yakin?\');" class="btn btn-sm btn-outline-danger">
						<i class="far fa-trash-alt"></i> Hapus
					</button>
				</form>';
				$data[] = $row;
		}
		$output = array(
								"draw" => @$_POST['draw'],
								"recordsTotal" => $this->Material_model->count_all(),
								"recordsFiltered" => $this->Material_model->count_filtered(),
								"data" => $data,
						);
		// output to json format
		echo json_encode($output);
	}

	public function index()
	{
		$data['row'] = $this->Material_model->get()->result();
		$this->template->load('template', 'materials/materials/index', $data);
	}
	
	public function add()
	{		
		$query_categories = $this->Category_model->get();
		$categories[''] = '- Pilih - ';
		foreach( $query_categories->result() as $category) {
			$categories[$category->category_id] = $category->name;
		}
		$query_units = $this->Unit_model->get();
		$units[''] = '- Pilih - ';
		foreach( $query_units->result() as $unit) {
			$units[$unit->unit_id] = $unit->name;
		}

		if( !isset($_POST['add']) ) {
			$material = new stdClass();
			$material->material_id = null;
			$material->barcode = null;
			$material->name = null;
			$material->category_id = null;
			$material->price = null;
			$material->quantity = null;
			$material->image = null;
			$material->created = null;
			$material->updated = null;
			$data = array(
				'page' => 'add',
				'row' => $material,
				'category' => $categories,
				'unit' => $units,
				'selected_category' => null,
				'selected_unit' => null
			);

			$this->template->load('template', 'materials/materials/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('barcode', 'Kode bar', 'required|is_unique[materials.barcode]');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('price', 'Harga', 'required|numeric');
			$this->form_validation->set_rules('unit', 'Satuan', 'required');


			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
					'row' => $post,
					'category' => $categories,
					'unit' => $units,
					'selected_category' => $this->input->post('category'),
					'selected_unit' => $this->input->post('unit')
				);
				$this->template->load('template', 'materials/materials/form', $data);
			} else {
				// Image configuration before upload
				$config['upload_path'] = './uploads/materials/materials/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = 'material-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload', $config);

				// Image condition if there's an image
				if( @$_FILES['image']['name'] != null ) {
					if( $this->upload->do_upload('image') ) {
						$post = $this->input->post(null, TRUE);	
						$post['image'] = $this->upload->data('file_name');
						$_SESSION['data'] = array(
							'page' => 'add',
							'row' => $post,
						);
						$this->session->set_flashdata('item');
						$this->Material_model->add($post);
						redirect('daftar_bahan');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('daftar_bahan');
					} 
				} else {
					$post = $this->input->post(null, TRUE);
					$post['image'] = null;	
					$_SESSION['data'] = array(
						'page' => 'add',
						'row' => $post
					);
					$this->session->set_flashdata('item');
					redirect('materials/process');
				}
			}
		}
	}

	public function edit($id)
	{		
		$query_material = $this->Material_model->get($id);
		if( $query_material->num_rows() > 0 ) {
			$material = $query_material->row();
			
			$query_categories = $this->Category_model->get();
			$categories[''] = '- Pilih - ';
			foreach( $query_categories->result() as $category) {
				$categories[$category->category_id] = $category->name;
			}
			$query_units = $this->Unit_model->get();
			$units[''] = '- Pilih - ';
			foreach( $query_units->result() as $unit) {
				$units[$unit->unit_id] = $unit->name;
			}
			
		} else {
			$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
			redirect('daftar_bahan');
		}

		if( $this->input->post('category') ) {
			$material->category_id = $this->input->post('category');
		}
		if( $this->input->post('unit') ) {
			$material->unit_id = $this->input->post('unit');
		}

		if( !isset($_POST['edit']) ) {
			$query = $this->Material_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$post = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $post,
					'category' => $categories,
					'unit' => $units,
					'selected_category' => $material->category_id,
					'selected_unit' => $material->unit_id
				);
				$this->template->load('template', 'materials/materials/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('daftar_bahan');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
			$this->form_validation->set_rules('barcode', 'Kode bar', 'required|callback_barcode_check');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('price', 'Harga', 'required|numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'edit',
					'row' => $post,
					'category' => $categories,
					'unit' => $units,
					'selected_category' => $material->category_id,
					'selected_unit' => $material->unit_id
				);
				$this->template->load('template', 'materials/materials/form', $data);
			} else {
				// Image configuration before upload
				$config['upload_path'] = './uploads/materials/materials/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048;
				$config['file_name'] = 'material-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload', $config);

				// Image condition if there's an image
				if( @$_FILES['image']['name'] != null ) {
					if( $this->upload->do_upload('image') ) {
						$material = $this->Material_model->get($post['id'])->row();
						if( $material->image != null ) {
							$target_file = './uploads/materials/materials/'.$material->image;
							unlink($target_file);
						}

						$post = $this->input->post(null, TRUE);	
						$post['image'] = $this->upload->data('file_name');
						$_SESSION['data'] = array(
							'page' => 'edit',
							'row' => $post
						);
						$this->session->set_flashdata('item');
						$this->Material_model->edit($post);
						redirect('daftar_bahan');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('daftar_bahan');
					} 
				} else {
					$post = $this->input->post(null, TRUE);
					$post['image'] = null;	
					$_SESSION['data'] = array(
						'page' => 'edit',
						'row' => $post
					);
					$this->session->set_flashdata('item');
					redirect('materials/process');
				}
			}
		}
	}

	public function process()
	{
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
			$this->Material_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->Material_model->edit($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('daftar_bahan');
	}

	public function delete()
	{
		$id = $this->input->post('material_id');
		$material = $this->Material_model->get($id)->row();
		if( $material->image != null && $material->image != 'login.jpg') {
			$target_file = './uploads/materials/materials/'.$material->image;
			unlink($target_file);
		}
		$this->Material_model->delete($id);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
		redirect('daftar_bahan');
	}

	function barcode_check($str)
	{
		$post = $this->input->post(null, TRUE);	
		$query = $this->db->query("SELECT * FROM materials WHERE barcode = '$post[barcode]' AND material_id !='$post[material_id]'");
		if( $query->num_rows() > 0 ) {
			$this->form_validation->set_message('barcode_check', '{field} sudah terpakai.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
