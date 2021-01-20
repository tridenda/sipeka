<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pro_product_model extends CI_Model 
{
  // Begin: Datatables
  var $column_order = array(null, 'barcode', 'pro_products.name', 'category_name', 'price'); //set column field database for datatable orderable
  var $column_search = array('barcode', 'pro_products.name', 'price', 'pro_categories.name'); //set column field database for datatable searchable
  var $order = array('product_id' => 'desc'); // default order 

  private function _get_datatables_query() {
      $this->db->select('pro_products.*, pro_categories.name as category_name');
      $this->db->from('pro_products');
      $this->db->join('pro_categories', 'pro_products.category_id = pro_categories.category_id');
      $i = 0;
      foreach ($this->column_search as $product) { // loop column 
          if(@$_POST['search']['value']) { // if datatable send POST for search
              if($i===0) { // first loop
                  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                  $this->db->like($product, $_POST['search']['value']);
              } else {
                  $this->db->or_like($product, $_POST['search']['value']);
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
      $this->db->from('pro_products');
      return $this->db->count_all_results();
  }
  // End: Datatables

  public function get($id = null) 
  {
    $this->db->select('pro_products.*, pro_categories.name AS category_name');
    $this->db->from('pro_products');
    $this->db->join('pro_categories', 'pro_categories.category_id = pro_products.category_id');
    if( $id != null ) {
      $this->db->where('product_id', $id);
    }
    $this->db->order_by('barcode', 'ASC');
    $query = $this->db->get();
    
    return $query;
  }

  public function add($post)
  {
    $params['barcode'] = htmlspecialchars($post['barcode']);
    $params['name'] = htmlspecialchars($post['name']);
    $params['category_id'] = htmlspecialchars($post['category']);
    $params['price'] = htmlspecialchars($post['price']);
    $this->db->insert('pro_products', $params);
  }

  public function edit($post)
  {
    $params['barcode'] = htmlspecialchars($post['barcode']);
    $params['name'] = htmlspecialchars($post['name']);
    $params['category_id'] = htmlspecialchars($post['category']);
    $params['price'] = htmlspecialchars($post['price']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('product_id', $post["product_id"]);
    $this->db->update('pro_products', $params); 
  }

  public function delete($id)
  {
    $this->db->where('product_id', $id);
		$this->db->delete('pro_products');
  }
  
  public function barcode_no() {
    $curdate = strtotime("now");
    $sql = "SELECT MAX(MID(barcode,9,4)) AS barcode_no 
          FROM pro_products 
          WHERE MID(barcode,3,6) = ".date("ymd", $curdate);
    $query = $this->db->query($sql);
    
    if( $query->num_rows() > 0 ) {
      $row = $query->row();
      $n = ((int) $row->barcode_no) + 1;
      $no = sprintf("%'.04d", $n);
    } else {
      $no = "0001";
    }
    $barcode = "PR".date('ymd').$no;
    return $barcode;
  }
}