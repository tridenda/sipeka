<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model 
{

  public function get_attendance($id = null) 
  {
    $date = date('Y-m', strtotime("now"));
    $sql = "SELECT attendances.*, users.name AS user_name, salaries.salary AS salary  
            FROM attendances 
            INNER JOIN users ON attendances.user_id=users.user_id
            INNER JOIN salaries ON attendances.salary_id=salaries.salary_id
            WHERE MID(attendances.created,1,7) = '$date' and attendances.user_id = $id
            ORDER BY attendances.created DESC";
    $query = $this->db->query($sql);

    return $query;
  }

  public function get_overtime($id = null) 
  {
    $date = date('Y-m', strtotime("now"));
    $sql = "SELECT attendances.*, users.name AS user_name  
            FROM attendances 
            INNER JOIN users ON attendances.user_id=users.user_id
            WHERE MID(attendances.created,1,7) = '$date' AND notes = 'lembur'
            ORDER BY attendances.created DESC";
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

  public function add($post, $salary_id = null)
  {
    if( isset($post['user']) ) {
      $params['user_id'] = htmlspecialchars($post['user']);
    } else {
      $params['user_id'] = htmlspecialchars($post['user_id']);
    }
    if( !isset($salary_id) ) {
      $params['salary_id'] = htmlspecialchars($post['salary_id']);
    } else {
      $params['salary_id'] = htmlspecialchars($salary_id);
      $params['overtime_hour'] = htmlspecialchars($post['overtime_hour']);
    }
    $params['notes'] = htmlspecialchars($post['notes']);

    $this->db->insert('attendances', $params);
  }

  public function edit($post)
  {
    $user_id = htmlspecialchars($post['user']);
    $notes = htmlspecialchars($post['notes']);
    $overtime_hour = htmlspecialchars($post['overtime_hour']);
    $created = htmlspecialchars($post['created']);
    $sql = "UPDATE attendances
            SET notes = '$notes', overtime_hour = $overtime_hour
            WHERE user_id = $user_id AND MID(created,1,10) = '$created'";
    $query = $this->db->query($sql);

  }

  public function is_attend($id, $created = null) 
  {
    $date = date('Y-m-d', strtotime("now"));
    if( isset($created) ) {
      $date = $created;
    }

    $sql = "SELECT * FROM attendances WHERE MID(created,1,10) = '$date' AND user_id = $id";
    $query = $this->db->query($sql);

    return $query;
  }
  
}