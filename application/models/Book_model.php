<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function search($fields, $sort_by = 'Id', $sort_order = 'asc') {
        
        // Results query
        $query = $this->db->select($fields)
        ->from('books');
        
        $query = $this->db->order_by($sort_by, $sort_order);
        
        $ret['rows'] = $query->get()->result();
        
        // count query
        $ret['num_rows'] = count($ret['rows']);
        
        return $ret;
    }
    
    public function insert($data) {
        if ($this->db->insert("books", $data)) {
            return true;
        }
    }
    
    public function delete($id)
    {
        $this->db->where('Id',$id);
        $result = $this->db->delete('books');
    }
    
    public function update($data, $key)
    {
        $this->db->set($data);
        $this->db->where("Id", $key);
        $this->db->update("books", $data);
    }
}
    