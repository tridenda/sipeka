<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
    $this->login->check_already_login();
		$this->load->view('auth/index');
  }

  public function guest()
	{
    $this->login->check_already_login();
		$this->load->view('auth/guest');
  }

  public function process()
	{
		$post = $this->input->post(null, TRUE);
		if( isset($post['member']) ) {
			$this->load->model('User_model');
			$query = $this->User_model->login($post);
			if( $query->num_rows() > 0 ) {
				$row = $query->row();
				$params = array(
					'userid' => htmlspecialchars($row->user_id),
					'level' => htmlspecialchars($row->level)
				);
				$this->session->set_userdata($params);
				echo "<script>
						alert('Selamat, berhasil masuk!');
						window.location='".base_url('cashier/index')."';
					</script>";
			} else {
				echo "<script>
						alert('Nama pengguna / kata sandi salah!');
						window.location='".base_url('auth/login')."';
					</script>";
			} 
		} else if( isset($post['guest']) ) {
      $params = array(
				'userid' => htmlspecialchars($_POST['guest_name']),
				'guest' => TRUE,
        'level' => '3'
      );
      $this->session->set_userdata($params);
      echo "<script>
						alert('Selamat, berhasil masuk!');
						window.location='".base_url('cashier/index')."';
					</script>";
    }
  }
  
  public function logout()
	{
		$params = array('userid', 'level', 'guest');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}  
}