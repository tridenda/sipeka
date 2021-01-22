<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sal_cart_model extends CI_Model 
{
  public function add_cart($post)
  {
    $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM sal_cart");
    if($query->num_rows() > 0) {
      $row = $query->row();
      $cart_no = ((int)$row->cart_no) + 1;
    } else {
      $cart_no = "1";
    }

    $params = array(
      'cart_id' => $cart_no,
      'sale_id' => $post['sale_id'],
      'product_id' => $post['product_id'],
      'price' => $post['price'],
      'quantity' => $post['quantity'],
      'total' => ($post['price'] * $post['quantity'])
    );
    $this->db->insert('sal_cart', $params);
  }
}