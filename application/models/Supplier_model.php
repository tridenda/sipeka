<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model 
{
  // public function login($post)
  // {
  //   $this->db->select('*');
  //   $this->db->from('suppliers');
  //   $this->db->where('username', $post['username']);
  //   $this->db->where('password', sha1($post['password']));
  //   $query = $this->db->get();
    
  //   return $query;
  // }

  public function get($id = null) 
  {
    $this->db->from('suppliers');
    if( $id != null ) {
      $this->db->where('supplier_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function add($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $params['phone'] = htmlspecialchars($post['phone']);
    $params['address'] = htmlspecialchars($post['address']);
    $params['notes'] = htmlspecialchars($post['notes']);
    $this->db->insert('suppliers', $params);
  }

  public function edit($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $params['phone'] = htmlspecialchars($post['phone']);
    $params['address'] = htmlspecialchars($post['address']);
    $params['notes'] = htmlspecialchars($post['notes']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('supplier_id', $post["supplier_id"]);
    $this->db->update('suppliers', $params); 
  }

  public function delete($id)
  {
    $this->db->where('supplier_id', $id);
		$this->db->delete('suppliers');
  }
}