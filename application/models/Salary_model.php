<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_model extends CI_Model 
{

  public function get($id = null) 
  {
    $this->db->select('salaries.*, users.name as user_name');
    $this->db->from('salaries');
    $this->db->join('users', 'salaries.user_id = users.user_id');
    if( $id != null ) {
      $this->db->where('salary_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }

  public function get_salary($id = null) 
  {
    $this->db->select('salaries.salary_id');
    $this->db->from('salaries');
    $this->db->where('user_id', $id);
    $query = $this->db->get();
    
    return $query;
  }

  public function add($post)
  {
    $params['user_id'] = htmlspecialchars($post['user']);
    $params['salary'] = htmlspecialchars($post['salary']);
    $params['overtime_rupiah'] = htmlspecialchars($post['overtime_rupiah']);
    $params['worktime_hour'] = htmlspecialchars($post['worktime_hour']);
    $this->db->insert('salaries', $params);
  }

  public function edit($post)
  {
    $params['user_id'] = htmlspecialchars($post['user']);
    $params['salary'] = htmlspecialchars($post['salary']);
    $params['overtime_rupiah'] = htmlspecialchars($post['overtime_rupiah']);
    $params['worktime_hour'] = htmlspecialchars($post['worktime_hour']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('salary_id', $post["salary_id"]);
    $this->db->update('salaries', $params); 
  }

  public function delete($id)
  {
    $this->db->where('salary_id', $id);
		$this->db->delete('salaries');
  }
}