<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sal_cart_model extends CI_Model 
{
  public function add_cart($post)
  {
    $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM sal_cart");
    if($query->num_rows() > 0) {
      $row = $query->row();
      $cart_no = ((int) $row->cart_no) + 1;
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

  public function get_cart($params = null, $sale_id = null)
  {
    $this->db->select('sal_cart.*, pro_products.barcode AS product_barcode, pro_products.name AS product_name, pro_products.price AS product_price');
    $this->db->from('sal_cart');
    $this->db->join('pro_products', 'pro_products.product_id = sal_cart.product_id');
    if( $params != null ) {
      $this->db->where($params);
    }
    $this->db->where('sale_id', $sale_id);
    $query = $this->db->get();

    return $query;
  }
  
  public function update_cart_quantity($post = null, $sale_id = null)
  {
    $sql = "UPDATE sal_cart SET price = '$post[price]',
            quantity = quantity + '$post[quantity]',
            total = '$post[price]' * quantity
            WHERE sale_id = $sale_id && product_id = '$post[product_id]'";
    $this->db->query($sql);
  }

  public function delete_cart($cart_id)
  {
    $this->db->where('cart_id', $cart_id);
		$this->db->delete('sal_cart');
  }

  public function delete_all_cart($post)
  {
    $this->db->where('sale_id', $post['sale_id']);
		$this->db->delete('sal_cart');
  }

  public function update_cart($post)
  { 
    $params = array(
      'price' => $post['price'],
      'quantity' => $post['quantity'],
      'discount' => $post['discount'],
      'total' => $post['total']
    );
    $this->db->where('cart_id',  $post['cart_id']);
    $this->db->update('sal_cart', $params);
  }
}