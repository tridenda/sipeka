<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Material_model extends CI_Model 
{
  // Begin: Datatables
  var $column_order = array(null, 'barcode', 'materials.name', 'category_name', 'unit_name', 'price', 'quantity'); //set column field database for datatable orderable
  var $column_search = array('barcode', 'materials.name', 'price'); //set column field database for datatable searchable
  var $order = array('material_id' => 'asc'); // default order 

  private function _get_datatables_query() {
      $this->db->select('materials.*, categories.name as category_name, units.name as unit_name');
      $this->db->from('materials');
      $this->db->join('categories', 'materials.category_id = categories.category_id');
      $this->db->join('units', 'materials.unit_id = units.unit_id');
      $i = 0;
      foreach ($this->column_search as $material) { // loop column 
          if(@$_POST['search']['value']) { // if datatable send POST for search
              if($i===0) { // first loop
                  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                  $this->db->like($material, $_POST['search']['value']);
              } else {
                  $this->db->or_like($material, $_POST['search']['value']);
              }
              if(count($this->column_search) - 1 == $i) //last loop
                  $this->db->group_end(); //close bracket
          }
          $i++;
      }
        
      if(isset($_POST['order'])) { // here order processing
          $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      }  else if(isset($this->order)) {
          $order = $this->order;
          $this->db->order_by(key($order), $order[key($order)]);
      }
  }

  function get_datatables() {
      $this->_get_datatables_query();
      if(@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
      $query = $this->db->get();
      return $query->result();
  }

  function count_filtered() {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
  }

  function count_all() {
      $this->db->from('materials');
      return $this->db->count_all_results();
  }
  // End: Datatables

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

  function update_stock_in($data) 
	{
		$quantity = $data['quantity'];
		$material_id = $data['material_id'];
		$sql = "UPDATE materials SET quantity = quantity + '$quantity' WHERE material_id = '$material_id'";
		$this->db->query($sql);
  }

  function update_stock_out($data) 
	{
		$quantity = $data['quantity'];
		$material_id = $data['material_id'];
		$sql = "UPDATE materials SET quantity = quantity - '$quantity' WHERE material_id = '$material_id'";
		$this->db->query($sql);
  }
  
  function delete_stock($id, $quantity, $type) 
	{
    if( $type == "in" ) {
      $sql = "UPDATE materials SET quantity = quantity - '$quantity' WHERE material_id = '$id'";
		  $this->db->query($sql);
    } else if( $type == "out" ) {
      $sql = "UPDATE materials SET quantity = quantity + '$quantity' WHERE material_id = '$id'";
		  $this->db->query($sql);
    } else if( $type == "missing" ) {
      $sql = "UPDATE materials SET quantity = quantity + '$quantity' WHERE material_id = '$id'";
		  $this->db->query($sql);
    } else if( $type == "founded" ) {
      $sql = "UPDATE materials SET quantity = quantity - '$quantity' WHERE material_id = '$id'";
		  $this->db->query($sql);
    }
	}
}