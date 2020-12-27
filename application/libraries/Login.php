<?php

Class Login {

  function __construct() {
    $this->ci =& get_instance();
  }

  function user_login() {
    $this->ci->load->model('User_model');
    $user_id = $this->ci->session->userdata('userid');
    $guest = $this->ci->session->userdata('guest');

    if( !$guest ) {
      $user_data = $this->ci->User_model->get($user_id)->row();
      // var_dump($user_data);
      // exit();
    } else {
      // $user_id = 240;
      // $user_data = $this->ci->User_model->get($user_id)->row();
      // var_dump($user_data);
      $user_data = (object) array(
				'username' => $this->ci->session->userdata('userid'),
				'name' => $this->ci->session->userdata('userid'),
        'level' => $this->ci->session->userdata('level'),
        'image' => 'login.jpg'
      );
    }
    
    return $user_data;
  }

  public function check_already_login()
  {
    $user_id = $this->ci->session->userdata('userid');

    if( $user_id  ) {
      redirect('cashier/index');
    } 
  }

  public function check_not_login()
  {
    $user_id = $this->ci->session->userdata('userid');

    if( !$user_id ) {
      redirect('auth/login');
    } 
  }
}
