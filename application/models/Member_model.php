<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model 
{

  public function get($id = null) 
  {
    $this->db->from('members');
    if( $id != null ) {
      $this->db->where('member_id', $id);
    }
    $this->db->order_by('member_id', 'desc');
    $query = $this->db->get();

    return $query;
  }

  public function add($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $params['gender'] = htmlspecialchars($post['gender']);
    $params['phone'] = htmlspecialchars($post['phone']);
    if( !empty($post["address"]) ) {
      $params['address'] = htmlspecialchars($post['address']);
    }
    $params['point'] = htmlspecialchars($post['point']);
    $this->db->insert('members', $params);
  }

  public function edit($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $params['gender'] = htmlspecialchars($post['gender']);
    $params['phone'] = htmlspecialchars($post['phone']);
    if( !empty($post["address"]) ) {
      $params['address'] = htmlspecialchars($post['address']);
    }
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('member_id', $post['member_id']);
    $this->db->update('members', $params); 
  }

  public function delete($id)
  {
    $this->db->where('member_id', $id);
		$this->db->delete('members');
  }
}