<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	// Begin: Cashier functions
	public function login_cashier()
	{
		$this->functions->is_login_cashier();
		$this->load->view('auth/cashier');
	}

  public function process_cashier()
	{
		$post = $this->input->post(null, TRUE);
		$this->load->model('User_model');
		$query = $this->User_model->login($post);
		if( $query->num_rows() > 0 ) {
			$row = $query->row();
			$params = array(
				'userid' => htmlspecialchars($row->user_id),
				'level' => htmlspecialchars($row->level)
			);
			// Activate this timeout when you're going to run the program
			// $this->session->set_tempdata($params, 'userid', 3600);
			// $this->session->set_tempdata($params, 'level', 3600);
			$this->session->set_userdata($params);
			echo "<script>
					alert('Selamat, berhasil masuk!');
					window.location='".base_url('beranda')."';
				</script>";
		} else {
			echo "<script>
					alert('Nama pengguna / kata sandi salah!');
					window.location='".base_url('kasir')."';
				</script>";
		} 
  }
  
  public function logout_cashier()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('kasir');
	}  
	// End: Cashier functions

	// Begin: Shutdown/restart function
	public function turn_off($type) {

		if( $type == "shutdown") {
			shell_exec("shutdown.exe.lnk");
		} else if( $type == "restart") {
			shell_exec("restart.exe.lnk");
		} 		
	}
	// End: Shutdown/restart function
}