<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function addRow($tableName, $insertData) 
    {
        $this->db->insert($tableName, $insertData);
        return $this->db->insert_id();
    }
    public function updateRow($tableName, $updateData, $whereData) 
    {
        $rk = $this->db->update($tableName, $updateData, $whereData);
       // echo $this->db->last_query(); exit;

        if ($this->db->affected_rows() > 0) 
        {

            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function deleteRow($tableName, $whereData) 
    {
        return $this->db->delete($tableName, $whereData);
    }
    public function getUserList($filter = array()) {

        $this->db->select('id,name,email');


        if (isset($filter['id']) && is_numeric($filter['id'])) {
            $this->db->where('id', $filter['id']);
        }
        
         if (isset($filter['email']) && !empty($filter['email'])) {
            $this->db->where('email', $filter['email']);
        }
        
        if (isset($filter['password']) && !empty($filter['password'])) {
            $this->db->where('password', $filter['password']);
        }
        
        if (isset($filter['status']) && is_numeric($filter['status'])) {
            $this->db->where('status', $filter['status']);
        }

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->_users = 'users';
        $query = $this->db->get($this->_users);

        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        return $query->result();
    }

    
    
    
    
    
	 
}
