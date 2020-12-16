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
    $this->ci =& get_instance();
    $user_id = $this->ci->session->userdata('userid');
    if( $user_id ) {
      redirect('cashier/index');
    }
  }

  public function check_not_login()
  {
    $this->ci =& get_instance();
    $user_id = $this->ci->session->userdata('userid');
    if( !$user_id ) {
      redirect('auth/login');
    }
  }

}