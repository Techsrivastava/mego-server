<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('catlog/Brand_model');
        $this->load->model('catlog/category_model');
        $this->load->model('catlog/subcategory_model');
        $this->load->model('catlog/subsubcategory_model');
        $this->load->database();
    }

    public function getUserData($postData = array())
    {
        $sql = "select * from pr_users";     
        if($query = $this->db->query($sql))
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
    public function getDesignationData($postData = array())
    {
        $sql = "select * from pr_role";     
        if($query = $this->db->query($sql))
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
    public function getWareHouseData($postData = array())
    {
        $sql = "select * from pr_warehouse";     
        if($query = $this->db->query($sql))
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

	 
}
