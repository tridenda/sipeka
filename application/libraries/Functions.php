<?php

Class Functions {

  function __construct() {
    $this->ci =& get_instance();
  }

  function user_login() {
    $this->ci->load->model('User_model');
    $user_id = $this->ci->session->userdata('userid');
    $guest = $this->ci->session->userdata('guest');

    if( !$guest ) {
      $user_data = $this->ci->User_model->get($user_id)->row();
    } else {
      $user_data = (object) array(
				'username' => $this->ci->session->userdata('userid'),
				'name' => $this->ci->session->userdata('userid'),
        'level' => $this->ci->session->userdata('level'),
        'image' => 'login.jpg'
      );
    }   
    return $user_data;
  }


  // kick all users except admin and redirect to Beranda
  public function only_admin()
  {
    $user_id = $this->ci->session->userdata('level');

    if( $user_id != "1"  ) {
      redirect('beranda');
    } 
  }

  // Kick all users when them want to visit cashier pages
  public function not_login_cashier()
  {
    $user_id = $this->ci->session->userdata('userid');

    if( !$user_id ) {
      redirect('kasir');
    } 
  }

  // Kick all users when them want to visit members pages
  public function not_login_members()
  {
    $user_id = $this->ci->session->userdata('userid');

    if( !$user_id ) {
      redirect('pelanggan');
    } 
  }

  // Kick all users when them want to visit members pages
  public function is_login_cashier()
  {
    $user_id = $this->ci->session->userdata('level');

    if( $user_id == "1" || $user_id == "2" ) {
      redirect('beranda');
    } 
  }

  // Kick all users when them want to visit members pages
  public function is_login_members()
  {
    $user_id = $this->ci->session->userdata('level');

    if( $user_id == "3" || $user_id == "4" ) {
      redirect('members/index');
    } 
  }

  // Get number rows of supplier table
	public function get_supplier() {
		$this->ci->load->model('Supplier_model');
    $query = $this->ci->Supplier_model->get();	
    $num_rows = $query->num_rows();
		
		return $num_rows;
  }
  
  // Get number rows of supplier table
	public function get_cashier() {
		$this->ci->load->model('User_model');
    $query = $this->ci->User_model->get();	
    $num_rows = $query->num_rows();
		
		return $num_rows;
	}
}
