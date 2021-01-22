<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sal_sales extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->not_login_cashier();
		$this->load->model('Sal_sale_model');
		$this->load->library('form_validation');
	}

	function get_ajax() {
		$list = $this->Sal_sale_model->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $sale) {
        $no++;
        $row = array();
        $row[] = $no.".";
				$row[] = $sale->invoice;
				if( isset($sale->member_name) ) {
					$row[] = $sale->member_name;
					$sale->name = $sale->member_name;
				} else {
					$row[] = $sale->name;
				}
				if( isset($sale->final_price) ) {
					$row[] = indo_currency($sale->final_price);
				}
				$row[] = $sale->notes;
				// add html for action
				$row[] = '
					<div class="d-flex justify-content-center">
					<button class="mr-1 btn btn-sm btn-outline-info" id="select" 
						data-toggle="modal" data-target="#detail-modal"
						data-date="'.indo_date($sale->date, TRUE, TRUE).'"
						data-invoice="'.$sale->invoice.'"
						data-name="'.$sale->name.'"
						data-total_price="'.indo_currency($sale->total_price).'"
						data-discount="'.indo_currency($sale->discount).'"
						data-final_price="'.indo_currency($sale->final_price).'"
						data-cash="'.indo_currency($sale->cash).'"
						data-remaining="'.indo_currency($sale->remaining).'"
						data-notes="'.$sale->notes.'"
						data-user_name="'.$sale->user_name.'"
						data-status="'.$sale->status.'">
						<i class="fas fa-info-circle"></i> Rincian
					</button>
					</div>
					';
        $data[] = $row;
    }
		$output = array(
								"draw" => @$_POST['draw'],
								"recordsTotal" => $this->Sal_sale_model->count_all(),
								"recordsFiltered" => $this->Sal_sale_model->count_filtered(),
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
		$this->template->load('template', 'sales/sales/index');
	}

}
