<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sal_cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->load->model(['Sal_neworder_model', 'Sal_cart_model']);
	}

	public function index($id)
	{
		$data['row'] = $this->Sal_neworder_model->get($id)->row();
		$data['cart'] = $this->Sal_cart_model->get_cart(null, $id);
		if( $data['row'] == null || $data['row']->status == 'Lunas') {
			$this->session->set_flashdata('empty', 'Data tidak ditemukan.');
			redirect('penjualan/pesanan_baru');
		}
		$this->template->load('template', 'sales/cart/index', $data);
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);

		if( isset($_POST['add_cart']) ) {
			$product_id = $post['product_id'];
			$sale_id = $post['sale_id'];
			$check_cart = $this->Sal_cart_model->get_cart(['sal_cart.product_id' => $product_id], $sale_id);
			if( $check_cart->num_rows() > 0 ) {
				$this->Sal_cart_model->update_cart_quantity($post, $sale_id);
			} else {
				$this->Sal_cart_model->add_cart($post);
			}
		} 
		
		if( isset($_POST['update_cart_table']) ) {
			$this->Sal_cart_model->update_cart($post);
		}

		if( isset($_POST['paynow']) ) {
			$post['status'] = true;
			$this->Sal_neworder_model->update($post);
			$cart = $this->Sal_cart_model->get_cart(null, $post['sale_id'])->result();
			$rows = [];
			foreach( $cart as $crt => $value) {
				array_push($rows, array(
						'sale_id' => $post['sale_id'],
						'product_id' => $value->product_id,
						'price' => $value->price,
						'product_id' => $value->product_id,
						'quantity' => $value->quantity,
						'discount' => $value->discount,
						'total' => $value->total
					)
				);
			}
			$this->Sal_neworder_model->add_sale_detail($rows);
			$this->Sal_cart_model->delete_all_cart($post);
		}

		if( isset($_POST['paylater']) ) {
			$this->Sal_neworder_model->update($post);
		}

		if( $this->db->affected_rows() > 0 ) {
			$params = array("success" => true); 
		} else {
			$params = array("success" => false);
		}

		echo json_encode($params);
	}

	function cart_data($id)
	{
		$data['cart'] = $this->Sal_cart_model->get_cart(null, $id);
		$this->load->view('sales/cart/cart', $data);
	}

	public function delete_cart()
	{
		$post = $this->input->post('cart_id');
		$this->Sal_cart_model->delete_cart($post['cart_id']);

		if( $this->db->affected_rows() > 0 ) {
			$params = array("success" => true); 
		} else {
			$params = array("success" => false);
		}

		echo json_encode($params);
	}

	public function receipt_print($sale_id)
	{
		$data = array(
			'sale' => $this->Sal_neworder_model->get_sales($sale_id)->row(),
			'sale_details' => $this->Sal_neworder_model->get_sale_details($sale_id)->result()
		);
		$this->load->view('sales/cart/receipt_print', $data);
	}

	public function request_print($sale_id)
	{
		$data = array(
			'sale' => $this->Sal_neworder_model->get_sales($sale_id)->row(),
			'sale_details' => $this->Sal_cart_model->get_cart(null, $sale_id)->result()
		);
		$this->load->view('sales/cart/request_print', $data);
	}
}
