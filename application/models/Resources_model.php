<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources_model extends CI_Model {

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
    
    public function getpublicationData($filter = array()) 
    {
        $this->db->select('*');       
        $this->db->where('publication_id',$filter['publication_id']); 
        $this->db->where('publication_id',$filter['publication_id']);   
        $this->db->order_by("created_at", "desc");
        $this->_publication = 'publication_file';
        $query = $this->db->get($this->_publication);
        return $query->result(); 
    }

    public function getMicrometer($filter = array()) 
    {
        $this->db->select('*');       
        $this->db->where('publication_id',$filter['publication_id']); 
        if($filter['year']=="all")
        {

        }
        else
        {
            $this->db->where('year(fileUploadDate)',$filter['year']);  
        }
         
        $this->db->order_by("created_at", "desc");
        $this->_publication = 'publication_file';
        $query = $this->db->get($this->_publication);
        return $query->result(); 
        
    }

    
    
	 
}
