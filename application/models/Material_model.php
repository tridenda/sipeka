<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Material_model extends CI_Model 
{

  // Begin: Units
  public function get_unit($id = null) 
  {
    $this->db->from('units');
    if( $id != null ) {
      $this->db->where('unit_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function add_unit($post)
  {
    $params['name'] = $post["name"];
    $this->db->insert('units', $params);
  }

  public function delete_unit($id)
  {
    $this->db->where('unit_id', $id);
    $this->db->delete('units');
  }

  public function edit_unit($post)
  {
    $params['name'] = $post["name"];
    $this->db->where('unit_id', $post["unit_id"]);
    $this->db->update('units', $params);
  }
  // End: Units

  // Begin: Suppliers
  public function get_supplier($id = null) 
  {
    $this->db->from('suppliers');
    if( $id != null ) {
      $this->db->where('supplier_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function add_supplier($post)
  {
    $params['name'] = $post["name"];
    $params['phone'] = $post["phone"];
    $params['address'] = $post["address"];
    $params['notes'] = $post["notes"];
    $this->db->insert('suppliers', $params);
  }

  public function delete_supplier($id)
  {
    $this->db->where('supplier_id', $id);
    $this->db->delete('suppliers');
  }

  public function edit_supplier($post)
  {
    $params['name'] = $post["name"];
    $params['phone'] = $post["phone"];
    $params['address'] = $post["address"];
    $params['notes'] = $post["notes"];
    $this->db->where('supplier_id', $post["supplier_id"]);
    $this->db->update('suppliers', $params);
  }
  // End: Suppliers
}