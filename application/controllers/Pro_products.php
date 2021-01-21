<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pro_products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->load->model(['Pro_product_model', 'Pro_category_model']);
		$this->load->library('form_validation');
	}

	function get_ajax() {
		$list = $this->Pro_product_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $product) {
				$no++;
				$row = array();
				$row[] = $no.".";
				$row[] = $product->barcode;
				$row[] = $product->name;
				$row[] = $product->category_name;
				$row[] = indo_currency($product->price);
				$row[] = '
				<form action="'.base_url('produk/daftar_produk/hapus').'" method="post">
					<a class="btn btn-sm btn-outline-primary" href="'.base_url('produk/daftar_produk/ubah/').$product->product_id.'">
						<i class="far fa-edit"></i> Ubah
					</a>
					<input name="product_id" type="hidden" value="'.$product->product_id.'">
					<button onclick="return confirm(\'Anda akan menghapus data produk, yakin?\');" class="btn btn-sm btn-outline-danger">
						<i class="far fa-trash-alt"></i> Hapus
					</button>
				</form>';
				$data[] = $row;
		}
		$output = array(
								"draw" => @$_POST['draw'],
								"recordsTotal" => $this->Pro_product_model->count_all(),
								"recordsFiltered" => $this->Pro_product_model->count_filtered(),
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
		$data['row'] = $this->Pro_product_model->get()->result();
		$this->template->load('template', 'products/products/index', $data);
	}
	
	public function add()
	{		
		$query_categories = $this->Pro_category_model->get();
		$categories[''] = '- Pilih - ';
		foreach( $query_categories->result() as $category) {
			$categories[$category->category_id] = $category->name;
		}

		if( !isset($_POST['add']) ) {
			$product = new stdClass();
			$product->product_id = null;
			$product->barcode = $this->Pro_product_model->barcode_no();
			$product->name = null;
			$product->category_id = null;
			$product->price = null;
			$data = array(
				'page' => 'add',
				'row' => $product,
				'category' => $categories,
				'selected_category' => null
			);

			$this->template->load('template', 'products/products/form', $data);
		} else if( isset($_POST['add']) ){
			// Set rules form
			$this->form_validation->set_rules('barcode', 'Kode bar', 'required|is_unique[materials.barcode]');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('price', 'Harga', 'required|numeric');
			$this->form_validation->set_rules('category', 'Kategori', 'required');


			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'add',
					'row' => $post,
					'category' => $categories,
					'selected_category' => $this->input->post('category')
				);
				$this->template->load('template', 'products/products/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'add',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('pro_products/process');
			}
		}
	}

	public function edit($id)
	{		
		$query_product = $this->Pro_product_model->get($id);
		if( $query_product->num_rows() > 0 ) {
			$product = $query_product->row();
			
			$query_categories = $this->Pro_category_model->get();
			foreach( $query_categories->result() as $category) {
				$categories[$category->category_id] = $category->name;
			}
			
		} else {
			$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
			redirect('produk/daftar_produk');
		}

		if( $this->input->post('category') ) {
			$product->category_id = $this->input->post('category');
		}

		if( !isset($_POST['edit']) ) {
			$query = $this->Pro_product_model->get($id);	
			if( $query->num_rows() > 0 ) {
				$post = $query->row();
				$data = array(
					'page' => 'edit',
					'row' => $post,
					'category' => $categories,
					'selected_category' => $product->category_id
				);
				$this->template->load('template', 'products/products/form', $data);
			} else {
				$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
				redirect('produk/daftar_produk');
			}
		} else if( isset($_POST['edit']) ){
			// Set rules form
			$this->form_validation->set_rules('barcode', 'Kode bar', 'required|callback_barcode_check');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('category', 'Kategori', 'required');
			$this->form_validation->set_rules('price', 'Harga', 'required|numeric');

			// Set condition form, if FALSE process is canceled
			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post(null, TRUE);	
				$data = array(
					'page' => 'edit',
					'row' => $post,
					'category' => $categories,
					'selected_category' => $product->category_id
				);
				$this->template->load('template', 'products/products/form', $data);
			} else {
				$post = $this->input->post(null, TRUE);
				$_SESSION['data'] = array(
					'page' => 'edit',
					'row' => $post
				);
				$this->session->set_flashdata('item');
				redirect('pro_products/process');
			}
		}
	}

	public function process()
	{
		$post = $_SESSION['data']['row'];	
		if( isset($post['add']) ) {
			$this->Pro_product_model->add($post);
		} else if( isset($post['edit']) ) {
			$this->Pro_product_model->edit($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		}
		redirect('produk/daftar_produk');
	}

	public function delete()
	{
		$id = $this->input->post('product_id');
		$this->Pro_product_model->delete($id);

		$this->session->set_flashdata('deleted', 'Data berhasil dihapus.');
		redirect('produk/daftar_produk');
	}

	function barcode_check($str)
	{
		$post = $this->input->post(null, TRUE);	
		$query = $this->db->query("SELECT * FROM pro_products WHERE barcode = '$post[barcode]' AND product_id !='$post[product_id]'");
		if( $query->num_rows() > 0 ) {
			$this->form_validation->set_message('barcode_check', '{field} sudah terpakai.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
