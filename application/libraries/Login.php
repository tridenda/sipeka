<?php

Class Login {

  function __construct() {
    $this->ci =& get_instance();
  }

  function user_login() {
    $this->ci->load->model('User_model');
    $user_id = $this->ci->session->userdata('userid');
    $user_data = $this->ci->User_model->get($user_id)->row();
    
    return $user_data;
  }

  public function check_already_login()
  {
    $user_id = $this->ci->session->userdata('userid');
    $guest_name = $this->ci->session->userdata('guest_name');
    if( $user_id ) {
      redirect('cashier/index');
    } else if( $guest_name ) {
      redirect('cashier/index');
    }
  }

  public function check_not_login()
  {
    $user_id = $this->ci->session->userdata('userid');
    $guest_name = $this->ci->session->userdata('guest_name');
    if( !$user_id ) {
      redirect('auth/login');
    } else if( !$guest_name ) {
      redirect('auth/login');
    }
  }
}
