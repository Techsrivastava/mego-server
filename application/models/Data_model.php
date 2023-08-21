<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->_tableName = 'admin';
        $this->load->database();
    }
    
     public function getJobsList($filter = array()) 
    {
        
        $this->db->select('j.*,d.PR_DESIG_NAME,c.PR_COMPANY_NAME,ci.name as PR_CITY')
        ->join('pr_designation as d', 'd.PR_DESIGNATION_ID =j.PR_DESIGNATION', 'Left')
        ->join('pr_company as c', 'c.PR_COMPANY_ID =j.PR_CLIENT_ID', 'Left')
        ->join('pr_cities as ci', 'ci.id =j.PR_CITY_ID', 'Left');
        
        $this->db->where('j.PR_STATUS', '1');
        $this->db->order_by("j.PR_JOB_ID", "desc");
        // $this->db->group_by('m.MENU_ID');
        $this->_Jobs =DB_PREFIX.'job';
        $query = $this->db->get($this->_Jobs . ' j');
        return $query->result();
       

    }

     public function getUsersList($filter = array()) 
    {
        
        $this->db->select('u.*');
        
        $this->db->where('u.PR_STATUS', '1');
        $this->db->order_by("u.PR_USER_ID", "desc");
        // $this->db->group_by('m.MENU_ID');
        $this->_Users =DB_PREFIX.'users';
        $query = $this->db->get($this->_Users . ' u');
        return $query->result();
       

    }
    public function getCompanyList($filter = array()) 
    {
        
        $this->db->select('c.*');
        
       // $this->db->where('c.PR_STATUS', '1');
        $this->db->order_by("c.PR_COMPANY_ID", "desc");
        // $this->db->group_by('m.MENU_ID');
        $this->_Company =DB_PREFIX.'company';
        $query = $this->db->get($this->_Company . ' c');
        return $query->result();
       

    }

}
