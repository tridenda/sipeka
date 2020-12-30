<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Material_model extends CI_Model 
{

  public function get($id = null) 
  {
    $this->db->select('materials.*, categories.name AS category_name, units.name AS unit_name');
    $this->db->from('materials');
    $this->db->join('categories', 'categories.category_id = materials.category_id');
    $this->db->join('units', 'units.unit_id = materials.unit_id');
    $this->db->order_by('barcode ASC');
    if( $id != null ) {
      $this->db->where('material_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function add($post)
  {
    $params['barcode'] = htmlspecialchars($post['barcode']);
    $params['name'] = htmlspecialchars($post['name']);
    $params['category_id'] = htmlspecialchars($post['category']);
    $params['price'] = htmlspecialchars($post['price']);
    $params['unit_id'] = htmlspecialchars($post['unit']);
    $params['quantity'] = htmlspecialchars($post['quantity']);
    $params['image'] = htmlspecialchars($post['image']);
    $this->db->insert('materials', $params);
  }

  public function edit($post)
  {
    $params['barcode'] = htmlspecialchars($post['barcode']);
    $params['name'] = htmlspecialchars($post['name']);
    $params['category_id'] = htmlspecialchars($post['category']);
    $params['price'] = htmlspecialchars($post['price']);
    $params['unit_id'] = htmlspecialchars($post['unit']);
    $params['quantity'] = htmlspecialchars($post['quantity']);
    if( !empty($post["image"]) ) {
      $params['image'] = htmlspecialchars($post['image']);
    }
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('material_id', $post["material_id"]);
    $this->db->update('materials', $params); 
  }

  public function delete($id)
  {
    $this->db->where('material_id', $id);
		$this->db->delete('materials');
  }
}