<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model 
{

  // Begin: Datatables
  var $column_order = array(null, 'name', 'gender', 'phone', 'address', 'point'); //set column field database for datatable orderable
  var $column_search = array('name', 'gender', 'phone', 'address', 'point'); //set column field database for datatable searchable
  var $order = array('member_id' => 'desc'); // default order 

  private function _get_datatables_query() {
      $this->db->from('members');
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