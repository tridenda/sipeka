<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model 
{
    // Begin: Datatables
    var $column_order = array(null, 'stocks.date', 'material_name', 'stocks.quantity', 'stocks.notes', 'supplier_name', 'material_barcode'); //set column field database for datatable orderable
    var $column_search = array('stocks.date', 'materials.name', 'stocks.quantity', 'stocks.notes', 'suppliers.name', 'materials.barcode'); //set column field database for datatable searchable
    var $order = array('stock_id' => 'asc'); // default order 

    private function _get_datatables_query($type) {
        $this->db->select('stocks.*, suppliers.name as supplier_name, materials.name as material_name, materials.barcode as material_barcode, users.name as user_name');
        $this->db->from('stocks');
        $this->db->join('materials', 'stocks.material_id = materials.material_id', 'left');
        $this->db->join('suppliers', 'stocks.supplier_id = suppliers.supplier_id', 'left');
        $this->db->join('users', 'stocks.user_id = users.user_id', 'left');
        $this->db->where('type', $type);
        $i = 0;
        foreach ($this->column_search as $stock) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($stock, $_POST['search']['value']);
                } else {
                    $this->db->or_like($stock, $_POST['search']['value']);
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

    function get_datatables($type) {
        $this->_get_datatables_query($type);
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($type) {
        $this->_get_datatables_query($type);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all($type) {
        $this->db->from('stocks');
        return $this->db->count_all_results();
    }
    // End: Datatables

    public function add_stock_in($post) {
        $params['material_id'] = htmlspecialchars($post['material_id']);
        $params['type'] = 'in';
        $params['notes'] = $post['notes'] == '' ? null : htmlspecialchars($post['notes']);
        $params['supplier_id'] = $post['supplier'] == '' ? null : htmlspecialchars($post['supplier']);
        $params['quantity'] = htmlspecialchars($post['quantity']);
        $params['date'] = htmlspecialchars($post['date']);
        $params['user_id'] = $this->session->userdata('userid');
        $this->db->insert('stocks', $params);
    }

    public function delete($id)
    {
        $this->db->where('stock_id', $id);
            $this->db->delete('stocks');
    }

}