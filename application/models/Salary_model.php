<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_model extends CI_Model 
{

  // Begin: Datatables
  var $column_order = array(null, 'salaries.date', 'user_name', 'salaries.salary', 'salaries.annual_leave'); //set column field database for datatable orderable
  var $column_search = array('salaries.date', 'user_name', 'salaries.salary', 'salaries.annual_leave'); //set column field database for datatable searchable
  var $order = array('salary_id' => 'desc'); // default order 

  private function _get_datatables_query() {
      $this->db->select('salaries.*, users.name as user_name');
      $this->db->from('salaries');
      $this->db->join('users', 'salaries.user_id = users.user_id');
      $this->db->order_by('date', 'DESC');
      $i = 0;
      foreach ($this->column_search as $salary) { // loop column 
          if(@$_POST['search']['value']) { // if datatable send POST for search
              if($i===0) { // first loop
                  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                  $this->db->like($salary, $_POST['search']['value']);
              } else {
                  $this->db->or_like($salary, $_POST['search']['value']);
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
      $this->db->from('salaries');
      return $this->db->count_all_results();
  }
  // End: Datatables

  public function get($id = null) 
  {
    $this->db->select('salaries.*, users.name AS user_name');
    $this->db->from('salaries');
    $this->db->join('users', 'salaries.user_id = users.user_id');
    
    if( $id != null ) {
      $this->db->where('salary_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function get_rows($id = null, $date = null) 
  {
    $this->db->from('salaries');
    $this->db->where('user_id', $id);
    $this->db->where('date', $date);
    $query = $this->db->get();
    
    return $query->num_rows();
  }

  public function get_salary($id = null, $date = null) 
  {

    if( $id == null && $date == null) {
      $this->db->from('salaries');
      $query = $this->db->get();
    } else if( $id != null && $date == null) {
      $this->db->from('salaries');
      $this->db->where('user_id', $id);
      $query = $this->db->get();
    } else {
      $date = substr($date, -19, 4);
      $sql = "SELECT * FROM salaries 
              WHERE MID(salaries.date,1,4) = '$date' AND user_id = $id";
      $query = $this->db->query($sql);
    }   
    
    return $query;
  }

  public function add($post)
  {
    $params['date'] = htmlspecialchars($post['date']);
    $params['user_id'] = htmlspecialchars($post['user']);
    $params['salary'] = htmlspecialchars($post['salary']);
    $params['meal_allowance'] = $post['meal_allowance'] == '' ? null : htmlspecialchars($post['meal_allowance']);
    $params['transport_allowance'] = $post['transport_allowance'] == '' ? null : htmlspecialchars($post['transport_allowance']);
    $params['overtime_allowance'] = $post['overtime_allowance'] == '' ? null : htmlspecialchars($post['overtime_allowance']);
    $params['other_allowance'] = $post['other_allowance'] == '' ? null : htmlspecialchars($post['other_allowance']);
    $params['worktime'] = htmlspecialchars($post['worktime']);
    $params['annual_leave'] = htmlspecialchars($post['annual_leave']);
    $this->db->insert('salaries', $params);
  }

  public function edit($post)
  {
    $params['date'] = htmlspecialchars($post['date']);
    $params['user_id'] = htmlspecialchars($post['user']);
    $params['salary'] = htmlspecialchars($post['salary']);
    $params['meal_allowance'] = $post['meal_allowance'] == '' ? null : htmlspecialchars($post['meal_allowance']);
    $params['transport_allowance'] = $post['transport_allowance'] == '' ? null : htmlspecialchars($post['transport_allowance']);
    $params['overtime_allowance'] = $post['overtime_allowance'] == '' ? null : htmlspecialchars($post['overtime_allowance']);
    $params['other_allowance'] = $post['other_allowance'] == '' ? null : htmlspecialchars($post['other_allowance']);
    $params['worktime'] = htmlspecialchars($post['worktime']);
    $params['annual_leave'] = htmlspecialchars($post['annual_leave']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('salary_id', $post["salary_id"]);
    $this->db->update('salaries', $params); 
  }

  public function delete($id)
  {
    $this->db->where('salary_id', $id);
		$this->db->delete('salaries');
  }

  public function add_annual_leave($id)
  {
    $updated = date('Y-m-d H:i:s');
    
		$sql = "UPDATE salaries
            SET annual_leave = annual_leave+1, updated = '$updated'
            WHERE salary_id = '$id'";
    
    $this->db->query($sql);
  }

  public function sub_annual_leave($id)
  {
    $updated = date('Y-m-d H:i:s');
    
		$sql = "UPDATE salaries
            SET annual_leave = annual_leave-1, updated = '$updated'
            WHERE salary_id = '$id'";
    
    $this->db->query($sql);
  }

  public function get_payment() 
  {
    $sql = "SELECT 
      attendances.date, 
      users.user_id, 
      users.name AS user_name, 
      COUNT(IF(attendances.notes = 'hadir', 1, 0)) AS attendance,
      COUNT(IF(attendances.notes = 'cuti', 1, 0)) AS annual_leave,
      SUM(IF(attendances.notes = 'lembur', attendances.overtime_hour, 0)) AS overtime,
      attendances.status
      FROM attendances
      INNER JOIN users ON attendances.user_id=users.user_id 
      GROUP BY user_name, MID(attendances.date,1,7) ORDER BY attendances.date DESC";
    $query = $this->db->query($sql);

    return $query;
  }

  public function finish_payment($post)
  {
    $date = substr($post['date'],-19,7);    
    
    $user_id = htmlspecialchars($post['user_id']);
    $sql = "UPDATE attendances
            SET status = 'terbayar'
            WHERE user_id = $user_id AND MID(date,1,7)='$date' AND notes in ('hadir', 'lembur', 'cuti')";
    $query = $this->db->query($sql);
  }

  public function update_workdaysum($post)
  {
    $date = substr($post['date'],-19,4);   
    
    $user_id = htmlspecialchars($post['user_id']);
    $workdaysum = htmlspecialchars($post['workdaysum']);
    $sql = "UPDATE salaries
            SET workdaysum = workdaysum + $workdaysum
            WHERE user_id = $user_id AND MID(date,1,4)='$date'";
    $query = $this->db->query($sql);
  }

  public function update_annual_leave($post)
  {  
    $user_id = htmlspecialchars($post['user_id']);
    $sql = "UPDATE salaries
            SET annual_leave = 0
            WHERE user_id = $user_id";
    $query = $this->db->query($sql);
  }
}