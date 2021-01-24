<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sal_neworder_model extends CI_Model 
{
  // Begin: Datatables
  var $column_order = array(null); //set column field database for datatable orderable
  var $column_search = array('sal_sales.name', 'members.name'); //set column field database for datatable searchable
  var $order = array('sale_id' => 'desc'); // default order 

  private function _get_datatables_query() {
      $this->db->select('sal_sales.*, users.name as user_name', 'sales.name as member_name');
      $this->db->from('sal_sales');
      $this->db->join('users', 'sal_sales.user_id = users.user_id', 'left');
      $this->db->join('members', 'sal_sales.member_id = members.member_id', 'left');
      $this->db->where('status', 'Ditunda');
      $this->db->order_by('sale_id', 'DESC');
      $i = 0;
      foreach ($this->column_search as $member) { // loop column 
          if(@$_POST['search']['value']) { // if datatable send POST for search
              if($i===0) { // first loop
                  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                  $this->db->like($member, $_POST['search']['value']);
              } else {
                  $this->db->or_like($member, $_POST['search']['value']);
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
      $this->db->from('members');
      return $this->db->count_all_results();
  }
  // End: Datatables

  public function get($id = null, $first = null) 
  {
    if( $first ) {
        $this->db->select('sal_sales.*, users.name AS user_name');
        $this->db->from('sal_sales');
        $this->db->join('users', 'sal_sales.user_id = users.user_id');
        $this->db->order_by('sale_id', 'DESC');
        $this->db->limit(1);
        
        $query = $this->db->get();
    } else {
        $this->db->select('sal_sales.*, users.name AS user_name');
        $this->db->from('sal_sales');
        $this->db->join('users', 'sal_sales.user_id = users.user_id');
        
        if( $id != null ) {
        $this->db->where('sale_id', $id);
        } 
        $query = $this->db->get();
    }
    
    return $query;
  }

  public function get_neworder() 
  {
    $this->db->from('sal_sales');
    $this->db->where('status', 'Ditunda');
    
    $query = $this->db->get();
    
    return $query;
  }

  public function delete($id)
  {
    $this->db->where('sale_id', $id);
    $this->db->delete('sal_sales');
  }

  public function add($post) {
    $params['invoice'] = $post['invoice'];
    $params['user_id'] =  $this->session->userdata('userid');;
    $params['member_id'] = $post['member_id'] == '' ? null : htmlspecialchars($post['member_id']);
    $params['name'] = htmlspecialchars($post['member_name_modal']);
    $params['table_number'] = htmlspecialchars($post['table_number_modal']);
    $params['date'] = date('Y-m-d', strtotime("now"));
    $this->db->insert('sal_sales', $params);
  }

  public function invoice_no() {
    $curdate = strtotime("now");
    $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
          FROM sal_sales 
          WHERE MID(invoice,3,6) = ".date("ymd", $curdate);
    $query = $this->db->query($sql);
    
    if( $query->num_rows() > 0 ) {
      $row = $query->row();
      $n = ((int) $row->invoice_no) + 1;
      $no = sprintf("%'.04d", $n);
    } else {
      $no = "0001";
    }
    $invoice = "IN".date('ymd').$no;
    return $invoice;
  }

  public function update($post)
  {
    $params['invoice'] = $post['invoice'];
    $params['total_price'] = $post['subtotal'];
    $params['discount'] = $post['subdiscount'];
    $params['final_price'] = $post['grandtotal'];
    $params['cash'] = $post['cash'];
    $params['remaining'] = $post['remaining'];
    $params['notes'] = $post['notes'];
    $params['date'] = $post['date'];
    $params['status'] = "Lunas";
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('sale_id', $post["sale_id"]);
    $this->db->update('sal_sales', $params); 
  }

  public function add_sale_detail($params)
  {
    $this->db->insert_batch('sal_details', $params);
  }

  public function get_sale_details($sale_id = null)
  {
    $this->db->select('sal_details.*, pro_products.name as product_name');
    $this->db->from('sal_details');
    $this->db->join('pro_products', 'sal_details.product_id = pro_products.product_id');
    if( $sale_id != null ) {
      $this->db->where('sal_details.sale_id', $sale_id);
    }
    $query = $this->db->get();

    return $query;
  }

  public function get_sales($sale_id = nul)
  {
    $this->db->select('sal_sales.*, users.name as user_name');
    $this->db->from('sal_sales');
    $this->db->join('users', 'sal_sales.user_id = users.user_id');
    if( $sale_id != null ) {
      $this->db->where('sale_id', $sale_id);
    }
    $query = $this->db->get();
    return $query;
  }
}