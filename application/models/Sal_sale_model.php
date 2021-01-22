<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sal_sale_model extends CI_Model 
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
      $this->db->where('status', 'Lunas');
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
}