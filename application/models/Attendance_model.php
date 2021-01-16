<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model 
{

  // Get all data from attendances, users, and salaries tables
  public function get($id = null) 
  {
    $this->db->select('attendances.*, users.name AS user_name, salaries.salary AS salary');
    $this->db->from('attendances');
    $this->db->join('users', 'users.user_id = attendances.user_id');
    $this->db->join('salaries', 'salaries.salary_id = attendances.salary_id');
    if( $id != null ) {
      $this->db->where('attendance_id', $id);
    }
    $query = $this->db->get();
    
    return $query;
  }
  
  // Begin: Attendance
  public function get_attendance($id = null) 
  {
    $date = date('Y-m', strtotime("now"));
    $sql = "SELECT attendances.*, users.name AS user_name, salaries.salary AS salary  
            FROM attendances 
            INNER JOIN users ON attendances.user_id=users.user_id
            INNER JOIN salaries ON attendances.salary_id=salaries.salary_id
            WHERE MID(attendances.date,1,7) = '$date' and attendances.user_id = $id
            ORDER BY attendances.date DESC";
    $query = $this->db->query($sql);

    return $query;
  }

  public function add_attendance($post)
  {
    $params['user_id'] = htmlspecialchars($post['user_id']);
    $params['salary_id'] = htmlspecialchars($post['salary_id']);
    $params['notes'] = htmlspecialchars($post['notes']);
    $this->db->insert('attendances', $params);
  }
  // End: Attendance

  // Begin: Overtime
  public function get_overtime($id = null) 
  {
    $date = date('Y', strtotime("now"));
    $sql = "SELECT attendances.*, users.name AS user_name  
            FROM attendances 
            INNER JOIN users ON attendances.user_id=users.user_id
            WHERE MID(attendances.date,1,4) = '$date' AND notes = 'lembur'
            ORDER BY attendances.date DESC";
    $query = $this->db->query($sql);

    return $query;
  }

  public function month_salaries($id = null) 
  {
    $date = date('Y', strtotime("now"));
    $sql = "SELECT attendance_id, SUM(salary) AS salary, date, status FROM attendances 
            WHERE MID(date,1,4) = '$date' AND attendances.user_id = $id AND notes = 'hadir'
            GROUP BY MONTH(date)
            ORDER BY MONTH(date) DESC
            ";
    $query = $this->db->query($sql);

    return $query;
  }

  public function edit_overtime($post)
  {
    $user_id = htmlspecialchars($post['user']);
    $notes = htmlspecialchars($post['notes']);
    $overtime_hour = htmlspecialchars($post['overtime_hour']);
    $date = htmlspecialchars($post['date']);

    $updated = date('Y-m-d H:m:s');
    $sql = "UPDATE attendances
            SET notes = '$notes', overtime_hour = $overtime_hour, updated = '$updated'
            WHERE user_id = $user_id AND MID(date,1,10) = '$date'";
    $query = $this->db->query($sql);
    
    return($this->db->affected_rows());
  }

  public function delete_overtime($post)
  {
    $attendance_id = htmlspecialchars($post['attendance_id']);
    $notes = 'hadir';
    $overtime_hour = 0;
    $updated = date('Y-m-d H:m:s');
    $sql = "UPDATE attendances
            SET notes = '$notes', overtime_hour = $overtime_hour, updated = '$updated'
            WHERE attendance_id = $attendance_id";
    $query = $this->db->query($sql);
  }
  // End: Overtime

  // Begin: Annual leave
  public function get_annual_leave($id = null) 
  {
    $date = date('Y', strtotime("now"));
    $sql = "SELECT attendances.*, users.name AS user_name  
            FROM attendances 
            INNER JOIN users ON attendances.user_id=users.user_id
            WHERE MID(attendances.date,1,4) = '$date' AND notes = 'cuti'
            ORDER BY attendances.date DESC";
    $query = $this->db->query($sql);

    return $query;
  }

  public function add_annual_leave($post, $salary_id)
  {
    
    $params['user_id'] = htmlspecialchars($post['user']);
    $params['salary_id'] = $salary_id;
    $params['notes'] = htmlspecialchars($post['notes']);
    $this->db->insert('attendances', $params);
  }

  public function edit_annual_leave($post)
  {
    $user_id = htmlspecialchars($post['user']);
    $date = htmlspecialchars($post['date']);

    $updated = date('Y-m-d H:m:s');
    $sql = "UPDATE attendances
            SET notes = 'cuti', overtime_hour = 0, updated = '$updated'
            WHERE user_id = $user_id AND MID(date,1,10) = '$date'";
    $query = $this->db->query($sql);
  }

  public function delete_annual_leave($post)
  {
    $attendance_id = htmlspecialchars($post['attendance_id']);
    $updated = date('Y-m-d H:m:s');
    $sql = "DELETE FROM attendances WHERE attendance_id = $attendance_id";
    $query = $this->db->query($sql);
  }
  // End: Annual leave

  public function is_attend($id, $new_date = null) 
  {
    $date = date('Y-m-d', strtotime("now"));
    if( isset($new_date) ) {
      $date = $new_date;
    }

    $sql = "SELECT * FROM attendances WHERE MID(date,1,10) = '$date' AND user_id = $id";
    $query = $this->db->query($sql);

    return $query;
  }
  
  
}