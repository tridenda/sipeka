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
			$this->Sal_cart_model->add_cart($post);
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
}
