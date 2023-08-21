<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

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
    
    public function getBanners($filter = array()) 
    {
        $this->db->select('*');       
        $this->db->where('CATEGORY','home');   
        $this->_banner = 'banner';
        $query = $this->db->get($this->_banner);
        return $query->result(); 
    }

    public function gethomepageData($filter = array()) 
    {
        $this->db->select('*');       
        $this->db->where('header',$filter['HEADER']);   
        $this->_banner = 'indexcontent';
        $query = $this->db->get($this->_banner);
        return $query->row(); 
    }
    
	 
}
