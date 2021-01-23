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
			$this->Sal_neworder_model->update($post);
			$this->Sal_cart_model->delete_all_cart($post);
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
}
