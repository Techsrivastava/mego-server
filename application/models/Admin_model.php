<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model { 
    function __construct() {
        parent::__construct();
        $this->_tableName ='pr_employee'; 
        $this->load->database();
    }

    public function addRow($tableName, $insertData) 
    {
        $this->db->insert($tableName, $insertData);
        //echo $this->db->last_query(); exit;
        return $this->db->insert_id();
    }
    public function updateRow($tableName, $updateData, $whereData) 
    {
        $rk = $this->db->update($tableName, $updateData, $whereData);
        //echo $this->db->last_query(); //exit;

        if ($this->db->affected_rows() > 0) 
        {

            return 1;
           // echo '1';
        } else {
            return 0;
          //  echo '0';
        }
    }
    public function deleteRow($tableName, $whereData) 
    {
        return $this->db->delete($tableName, $whereData);
    }
    
   
     public function getIndustryList($filter = array()) 
    {
        
        $this->db->select('*');        
          
        //echo $this->db->last_query(); exit(); 
        if($filter['INDUSTRY_ID'])
        {
            $this->db->where('PR_INDUSTRY_ID', $filter['INDUSTRY_ID']);
        } 
        $this->db->order_by("PR_INDUSTRY_ID", "desc");        
        $this->industry ='pr_industry';
        $query = $this->db->get($this->industry); 
        if($filter['rowData']=="single")
        {
            return $query->row();    
        } 
        else
        {
            return $query->result();    
        } 
         

    }

    public function getDepartmentList($filter = array()) 
    {
        
        $this->db->select('d.*,ind.PR_INDUSTRY')
         ->join('pr_industry as ind', 'ind.PR_INDUSTRY_ID = d.INDUSTRY_ID', 'Left');        
        $this->db->order_by("d.PR_DEPARTMENT_ID", "desc");        
        $this->department ='pr_department as d';
        $query = $this->db->get($this->department);   
        //echo $this->db->last_query(); exit();     
        return $query->result();        

    }


    public function getUserComplainList($filter = array()) 
    {
        
        $this->db->select('c.*,u.PR_NAME as USER,g.PR_NAME as GUILTY,ca.CATEGORY,sca.CATEGORY as SUBCATEGORY')
         ->join('pr_users as u', 'u.PR_USER_ID = c.USER_ID', 'Left')
         ->join('pr_users as g', 'g.PR_USER_ID = c.GUILTY_ID', 'Left')
         ->join('pr_category as ca', 'ca.CATEGORY_ID = c.CATEGORY_ID', 'Left')
         ->join('pr_category as sca', 'sca.CATEGORY_ID = c.SUB_CATEGORY_ID', 'Left');        
               
        $this->department ='pr_complaint as c';
        $query = $this->db->get($this->department);   
        //echo $this->db->last_query(); exit();     
        return $query->result();        

    }



    public function getDesignationList($filter = array()) 
    {
        
        $this->db->select('d.*,depart.PR_DEPART_NAME')
         ->join('pr_department as depart', 'depart.PR_DEPARTMENT_ID = d.PR_DEPARTMENT_ID', 'Left');        
        $this->db->order_by("d.PR_DESIGNATION_ID", "desc");        
        $this->designation ='pr_designation as d';
        $query = $this->db->get($this->designation);   
        //echo $this->db->last_query(); exit();     
        return $query->result();        

    }

    public function getSkillsList($filter = array()) 
    {
        
        $this->db->select('skill.*,indus.PR_INDUSTRY')
         ->join('pr_industry as indus', 'indus.PR_INDUSTRY_ID =skill.PR_INDUSTRY', 'Left');        
        $this->db->order_by("skill.PR_SKILL_ID", "desc");        
        $this->skills ='pr_skills as skill';
        $query = $this->db->get($this->skills);   
        //echo $this->db->last_query(); exit();     
        return $query->result();        

    }


     public function getQueryList($filter = array()) 
    {       
        $this->db->select('*');        
        $this->db->where('PAGENAME', $filter['SEARCH_BY']);
        $this->db->order_by("PR_QUERY_ID", "desc");        
        $this->queryList ='pr_contactus';
        $query = $this->db->get($this->queryList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }
     public function getPackageList($filter = array()) 
    {       
        $this->db->select('*');        
        
        $this->db->order_by("PR_PACKAGE_ID", "desc");        
        $this->packageList ='pr_package';
        $query = $this->db->get($this->packageList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }
    public function getUsersList($filter = array()) 
    {       
        $this->db->select('e.*');
       
        $this->db->order_by("e.PR_USER_ID", "desc");        
        $this->queryList ='pr_users as e';
        $query = $this->db->get($this->queryList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }
    public function getUsersListSts($filter = array()) 
    {       
        $this->db->select('e.*');
         $this->db->where('e.PR_STATUS', $filter['STATUS']);   
        
        $this->db->order_by("e.PR_USER_ID", "desc");        
        $this->queryList ='pr_users as e';
        $query = $this->db->get($this->queryList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }
    public function getUsersFriendList($filter = array()) 
    {       
        $this->db->select('e.*')
         ->join('pr_users as e', 'e.PR_USER_ID =ul.PR_LIKED_USER_ID', 'Left');  
         $this->db->where('ul.PR_USER_ID', $filter['USER_ID']);        
        $this->db->order_by("e.PR_USER_ID", "desc");        
        $this->queryList ='users_like_unlike as ul';
        $query = $this->db->get($this->queryList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }

    public function getUsersSexualList($filter = array()) 
    {       
        $this->db->select('e.*');  
         $this->db->where('e.PR_USER_ID', $filter['USER_ID']);        
        //$this->db->order_by("e.PR_USER_ID", "desc");        
        $this->queryList ='pr_user_sexual_orientation e';
        $query = $this->db->get($this->queryList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }
    public function getUsersPassionList($filter = array()) 
    {       
        $this->db->select('e.*');  
         $this->db->where('e.PR_USER_ID', $filter['USER_ID']);        
        //$this->db->order_by("e.PR_USER_ID", "desc");        
        $this->queryList ='pr_user_passion e';
        $query = $this->db->get($this->queryList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }
    public function getUsersImageList($filter = array()) 
    {       
        $this->db->select('e.*');  
         $this->db->where('e.PR_USER_ID', $filter['USER_ID']);        
        //$this->db->order_by("e.PR_USER_ID", "desc");        
        $this->queryList ='pr_user_images e';
        $query = $this->db->get($this->queryList);   
        //echo $this->db->last_query(); exit();     
        return $query->result();       

    }





}
