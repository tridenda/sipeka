<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model 
{
  public function get($id = null) 
  {
    $this->db->from('units');
    if( $id != null ) {
      $this->db->where('unit_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function add($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $this->db->insert('units', $params);
  }

  public function edit($post)
  {
    $params['name'] = htmlspecialchars($post['name']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('unit_id', $post["unit_id"]);
    $this->db->update('units', $params); 
  }

  public function delete($id)
  {
    $this->db->where('unit_id', $id);
		$this->db->delete('units');
  }
}