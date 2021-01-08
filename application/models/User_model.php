<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('username', $post['username']);
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    
    return $query;
  }

  public function get($id = null) 
  {
    $this->db->from('users');
    if( $id != null ) {
      $this->db->where('user_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function add($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $params['username'] = htmlspecialchars($post['username']);
    $params['password'] = sha1(htmlspecialchars($post['password']));
    $params['address'] = htmlspecialchars($post['address']);
    $params['level'] = htmlspecialchars($post['level']);
    $params['image'] = htmlspecialchars($post['image']);
    if( $post['image'] == null ) {
      $params['image'] = 'login.jpg';
    }
    $this->db->insert('users', $params);
  }

  public function edit($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    if( !empty($post["username"]) ) {
      $params['username'] = htmlspecialchars($post['username']);
    }
    if( !empty($post["password"]) ) {
      $params['password'] = sha1(htmlspecialchars($post["password"]));
    }
    $params['address'] = htmlspecialchars($post['address']);
    $params['level'] = htmlspecialchars($post['level']);
    if( !empty($post["image"]) ) {
      $params['image'] = htmlspecialchars($post['image']);
    }
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('user_id', $post["user_id"]);
    $this->db->update('users', $params); 
  }

  public function delete($id)
  {
    $this->db->where('user_id', $id);
		$this->db->delete('users');
  }
}