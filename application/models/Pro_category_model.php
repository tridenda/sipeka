<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pro_category_model extends CI_Model 
{
  public function get($id = null) 
  {
    $this->db->from('pro_categories');
    if( $id != null ) {
      $this->db->where('category_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function get_material($id) 
  {
    $this->db->from('materials');
    $this->db->where('category_id', $id);
    $query = $this->db->get();
    
    return $query;
  }

  public function add($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $this->db->insert('pro_categories', $params);
  }

  public function edit($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('category_id', $post["category_id"]);
    $this->db->update('pro_categories', $params); 
  }

  public function delete($id)
  {
    $this->db->where('category_id', $id);
		$this->db->delete('pro_categories');
  }
}