<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model 
{

  public function get($id = null) 
  {
    $date = date('Y-m', strtotime("now"));
    $sql = "SELECT attendances.*, users.name AS user_name, salaries.salary AS salary  
            FROM attendances 
            INNER JOIN users ON attendances.user_id=users.user_id
            INNER JOIN salaries ON attendances.salary_id=salaries.salary_id
            WHERE MID(attendances.created,1,7) = '$date' and attendances.user_id = $id";
    $query = $this->db->query($sql);

    return $query;
  }

  public function month_salaries($id = null) 
  {
    $date = date('Y', strtotime("now"));
    $sql = "SELECT attendance_id, SUM(salary) AS salary, created, status FROM attendances 
            WHERE MID(created,1,4) = '$date' AND attendances.user_id = $id AND notes = 'hadir'
            GROUP BY MONTH(created)
            ORDER BY MONTH(created) DESC
            ";
    $query = $this->db->query($sql);

    return $query;
  }

  public function add($post)
  {
    $params['user_id'] = htmlspecialchars($post['user_id']);
    $params['salary_id'] = htmlspecialchars($post['salary_id']);
    $params['notes'] = htmlspecialchars($post['notes']);
    $this->db->insert('attendances', $params);
  }

  public function is_attend($id) 
  {
    $date = date('Y-m-d', strtotime("now"));

    $sql = "SELECT * FROM attendances WHERE MID(created,1,10) = '$date' AND user_id = $id";
    $query = $this->db->query($sql);

    return $query;
  }
  
}