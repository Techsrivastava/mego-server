<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter_model extends CI_Model { 
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
///echo $this->db->last_query(); exit;

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
  
    public function getUserLogin($filter = array()) {

        $this->db->select('e.*,c.PR_COMPANY_CODE')
        ->join('pr_company c', 'c.PR_COMPANY_ID = e.PR_COMPANY_ID', 'Left');            

        if (isset($filter['PR_EMPLOYEE_CODE']) && !empty($filter['PR_EMPLOYEE_CODE'])) {
            $this->db->where('e.PR_EMPLOYEE_CODE', $filter['PR_EMPLOYEE_CODE']);
        }
        if (isset($filter['PR_PASSWORD']) && !empty($filter['PR_PASSWORD'])) {
            $this->db->where('e.PR_PASSWORD', $filter['PR_PASSWORD']);
        }
        $this->db->group_by('e.PR_EMPLOYEE_ID');
        $this->_user= 'pr_employee';
       
        $query = $this->db->get($this->_user. ' e');
        return $query->row();
        
    }

    public function getUserMenuData1($filter = array()) 
    {

        $filter['PARENT_ID'] = '0';
        $role_id = $this->session->userdata('PR_DESIGNATION_ID');
        $emp_id = $this->session->userdata('PR_EMPLOYEE_ID');

        $this->db->select('*');
        $this->db->where('PR_EMPLOYEE_ID', $emp_id);
        $this->_empmenu = 'pr_empmenu_permission';
        $query = $this->db->get($this->_empmenu);
        $dtaa=$query->result();
        //print_r($dtaa); exit;
        if($dtaa)
        {
             $this->db->select('me.*')
                ->join('pr_menu me', 'me.PR_MENU_ID = pm.PR_MENU_ID', 'Left');
           
            if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
                $this->db->where('me.PR_MENU_PARENT_ID', $filter['PARENT_ID']);
            }
            $this->db->where('me.PR_IS_VIEW', 'w');
            $this->db->where('me.PR_MENU_STATUS', '1');
            $this->db->where('pm.PR_EMPLOYEE_ID', $emp_id);
            $this->db->order_by("me.PR_SORTORDER", "asc");
            $this->db->group_by('pm.PR_MENU_ID');
            $this->_Menu = 'pr_empmenu_permission';
            $query = $this->db->get($this->_Menu . ' pm');
            return $query->result();
            echo $this->db->last_query();
            exit;

        }
        else
        {
             $this->db->select('me.*')
                ->join('pr_menu me', 'me.PR_MENU_ID = pm.PR_MENU_ID', 'Left');
            if (isset($role_id) && is_numeric($role_id)) {
                $this->db->where('pm.PR_DESIGNATION_ID', $role_id);
            }
            if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
                $this->db->where('me.PR_MENU_PARENT_ID', $filter['PARENT_ID']);
            }
            $this->db->where('me.PR_IS_VIEW', 'w');
            $this->db->where('me.PR_MENU_STATUS', '1');
            $this->db->order_by("me.PR_SORTORDER", "asc");
            $this->db->group_by('pm.PR_MENU_ID');
            $this->_Menu = 'pr_menu_permission';
            $query = $this->db->get($this->_Menu . ' pm');
            return $query->result();
            echo $this->db->last_query();
            exit;
        }



       
    }






    public function getUserSubMenuData($filter = array()) 
    {
        $role_id=$this->session->userdata['user_session']['ROLE_ID'];
        $user_id=$this->session->userdata['user_session']['USER_ID'];
        

        $this->db->select('m.*')
        ->join('pr_menu m', 'm.PR_MENU_ID = pm.PR_MENU_ID', 'Left');
        if (isset($role_id) && $role_id!='0') {
            $this->db->where('pm.PR_DESIGNATION_ID', $role_id);
        }
        if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
            $this->db->where('m.PR_MENU_PARENT_ID', $filter['PARENT_ID']);
        }
        $this->db->where('m.PR_MENU_STATUS', '1');
        $this->db->order_by("m.PR_SORTORDER", "asc");
        $this->db->group_by('pm.PR_MENU_ID');
        $this->_Menu ='pr_menu_permission';
        $query = $this->db->get($this->_Menu . ' pm');
        // print_r($this->db->last_query());  
        // exit;
        return $query->result();
        

    }



    public function getmenuId($menu) 
    {
        
        $this->db->select('PR_MENU_ID');
        if (isset($menu)) {
            $this->db->where('PR_MENU_NAME', $menu);
        }
      
        $this->db->where('PR_MENU_STATUS', '1');
        
        $this->_Menu ='pr_menu';
        $query = $this->db->get($this->_Menu);
        // print_r($this->db->last_query());  
        // exit;
        return $query->row();
        

    }


     public function jobSkId($filter = array()) 
    {
        
        $this->db->select('*');
        $this->db->where('PR_SKILL_ID',$filter['PR_SKILL_ID']);
       
        $this->db->where('PR_JOB_ID',$filter['PR_JOB_ID']);
        
        $this->_Menu ='pr_job_skills';
        $query = $this->db->get($this->_Menu);
       // echo $this->db->last_query();  
       //   exit;
        return $query->row();
        

    }

    
    public function getStateList($filter = array()) 
    {
        
        $this->db->select('*');
        //$this->db->where('PR_STATUS', '1');
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->_states ='pr_states';
        $query = $this->db->get($this->_states);        
        return $query->result();        

    }

     public function getBlogs($filter = array()) 
    {
        
        $this->db->select('*');
        //$this->db->where('PR_STATUS', '1');
         $this->db->limit($filter['LIMIT'],0);
        $this->db->order_by("id", "desc");        
        $this->blogs ='blogs';
        $query = $this->db->get($this->blogs);   
        //echo $this->db->last_query(); exit();     
        return $query->result();        

    }

    public function getJobApplySts($jobPostId) 
    {
        $userId=$this->session->userdata['user_session']['USER_ID'];
        $this->db->select('*');
        $this->db->where('PR_JOB_ID',$jobPostId);
        $this->db->where('PR_USER_ID',$userId);
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->_job_apply ='pr_job_apply';
        $query = $this->db->get($this->_job_apply);        
        return $query->result();        

    }


    public function getdepartmentList($filter = array()) 
    {
        
        $this->db->select('*');
        //$this->db->where('PR_STATUS', '1');
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->_dept ='pr_department';
        if($filter['LIMIT'])
        {
              $this->db->limit($filter['LIMIT'],0); 
        }
        $query = $this->db->get($this->_dept);        
        return $query->result();        

    }


 public function getdepartmentDesig($filter = array()) 
    {
        
        $this->db->select('*');
        //$this->db->where('PR_DEPARTMENT_ID',$deptId);
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->_deptDesig ='pr_designation';
        $query = $this->db->get($this->_deptDesig);        
        return $query->result();        

    }
 


    public function getjobsList($filter = array()) 
    {
        $userId=$this->session->userdata['user_session']['USER_ID'];
        $this->db->select('jp.*,s.name as LOCATION,d.PR_INDUSTRY as DESIGNATION')
        ->join('pr_states s', 's.id = jp.PR_STATE', 'Left')
        ->join('pr_industry d', 'd.PR_INDUSTRY_ID = jp.PR_SELECT_INDUSTRY', 'Left');
        $this->db->where('jp.PR_STATUS', '1');
        $this->db->where('jp.PR_EMPLOYEE_ID', $userId);
        $this->db->order_by("jp.PR_ENTRY_DATE", "desc");        
        $this->_states ='pr_job_post as jp';
        $query = $this->db->get($this->_states);        
        return $query->result();        

    }
     public function getEmployerjobsList($filter = array()) 
    {
        $userId=$this->session->userdata['user_session']['USER_ID'];
        $this->db->select('jp.*,s.name as LOCATION,d.PR_INDUSTRY as DESIGNATION')
        ->join('pr_states s', 's.id = jp.PR_STATE', 'Left')
        ->join('pr_industry d', 'd.PR_INDUSTRY_ID = jp.PR_SELECT_INDUSTRY', 'Left');
       // $this->db->where('jp.PR_STATUS', '1');
        $this->db->where('jp.PR_EMPLOYEE_ID', $userId);
        $this->db->order_by("jp.PR_ENTRY_DATE", "desc");        
        $this->_states ='pr_job_post as jp';
        $query = $this->db->get($this->_states);        
        return $query->result();        

    }


public function jobDataById($filter = array()) 
    {
        $userId=$this->session->userdata['user_session']['USER_ID'];
        $this->db->select('jp.*,s.name as LOCATION,d.PR_INDUSTRY as DESIGNATION')
        ->join('pr_states s', 's.id = jp.PR_STATE', 'Left')
        ->join('pr_industry d', 'd.PR_INDUSTRY_ID = jp.PR_SELECT_INDUSTRY', 'Left');
       // $this->db->where('jp.PR_STATUS', '1');
        $this->db->where('jp.PR_JOBPOST_ID', $filter['PR_JOB_ID']);
        //$this->db->order_by("jp.PR_ENTRY_DATE", "desc");        
        $this->_jobs='pr_job_post as jp';
        $query = $this->db->get($this->_jobs);        
        return $query->row();        

    }


   

    public function getAppliedjobsList($filter = array()) 
    {
        $userId=$this->session->userdata['user_session']['USER_ID'];
        $this->db->select('jp.*,s.name as LOCATION,d.PR_INDUSTRY as DESIGNATION')
        ->join('pr_job_post jp', 'ja.PR_JOB_ID = jp.PR_JOBPOST_ID', 'Left')
        ->join('pr_states s', 's.id = jp.PR_STATE', 'Left')
        ->join('pr_industry d', 'd.PR_INDUSTRY_ID = jp.PR_SELECT_INDUSTRY', 'Left');
        $this->db->where('ja.PR_USER_ID',$userId);
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->_states ='pr_job_apply as ja';
        $query = $this->db->get($this->_states);        
        return $query->result();        

    }

     public function getUtilization($filter = array()) 
    {
        $userId=$this->session->userdata['user_session']['USER_ID'];
        $this->db->select('*');
        $this->db->where('PR_USER_ID',$filter['USER_ID']);
        $this->db->where('PR_USE_TYPE',$filter['USE_TYPE']);
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->_states ='user_utilization';
        $query = $this->db->get($this->_states);        
        return $query->result();        

    }


    public function jobAppledCandidates($filter = array()) 
    {
        
        $this->db->select('jp.*,s.name as LOCATION,d.PR_DESIG_NAME as DESIGNATION,e.*')
        ->join('pr_job_post jp', 'jp.PR_JOBPOST_ID = ju.PR_JOB_ID', 'Left')
        ->join('pr_states s', 's.id = jp.PR_JOB_LOCATION', 'Left')
        ->join('pr_employee e', 'e.PR_EMPLOYEE_ID = ju.PR_USER_ID', 'Left')
        ->join('pr_designation d', 'd.PR_DESIGNATION_ID = jp.PR_DESIGNATION', 'Left');
        $this->db->where('ju.PR_JOB_ID',$filter['PR_JOB_ID']);
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->_states ='pr_job_apply as ju';
        $query = $this->db->get($this->_states);        
        return $query->result();        

    }

     public function getUserList($filter = array()) {

        $this->db->select('*');


        if (isset($filter['id']) && is_numeric($filter['id'])) {
            $this->db->where('PR_EMPLOYEE_ID', $filter['id']);
        }
        
         if (isset($filter['email']) && !empty($filter['email'])) {
            $this->db->where('PR_EMAIL', $filter['email']);
        }
        
        if (isset($filter['PASSWORD']) && !empty($filter['password'])) {
            $this->db->where('PR_PASSWORD', $filter['password']);
        }

        if (isset($filter['ROLE']) && !empty($filter['ROLE'])) {
            $this->db->where('PR_ROLE_ID', $filter['ROLE']);
        }
        
        if (isset($filter['STATUS']) && is_numeric($filter['status'])) {
            $this->db->where('PR_EMPLOYEE_STATUS', $filter['status']);
        }

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }

        $query = $this->db->get($this->_tableName);

        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        return $query->row();
    }
      public function getUserList222($filter = array()) {

        $this->db->select('*');


        if (isset($filter['id']) && is_numeric($filter['id'])) {
            $this->db->where('PR_EMPLOYEE_ID', $filter['id']);
        }
        
         if (isset($filter['email']) && !empty($filter['email'])) {
            $this->db->where('PR_EMAIL', $filter['email']);
        }
        
        if (isset($filter['PASSWORD']) && !empty($filter['password'])) {
            $this->db->where('PR_PASSWORD', $filter['password']);
        }
 $this->db->where('PR_ROLE_ID', $filter['ROLE']);
       
        
        if (isset($filter['STATUS']) && is_numeric($filter['status'])) {
            $this->db->where('PR_EMPLOYEE_STATUS', $filter['status']);
        }

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }

        $query = $this->db->get($this->_tableName);
//echo $this->db->last_query(); exit();
        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        return $query->row();
    }
    public function logincheck($filter = array()) 
    {

        $condition = "PR_EMAIL ='" . $filter['email'] . "' AND PR_PASSWORD ='" .$filter['password']. "'";

        $this->db->select('*');

        $this->db->from('pr_employee');

        $this->db->where($condition);

        $this->db->limit(1);
 
        $query = $this->db->get();

        if ($query->num_rows() == 1) {

        return true;

        } else {

        return false;

        }       
    }
       public function getUserData($email) {
        $tbl='pr_designation as r';
        $this->db->select('u.*,r.PR_DESIG_NAME as ROLE_NAME,u.PR_DESIGNATION_ID as ROLE_ID')
        ->join($tbl, 'u.PR_DESIGNATION_ID = r.PR_DESIGNATION_ID', 'Left');
        $this->db->where('u.PR_EMAIL', $email);
        $tbl='pr_employee as u';
        $query = $this->db->get($tbl);
        return $query->row();
        
    }

     public function getUserData234($email) {
        $tbl='pr_designation as r';
        $this->db->select('u.*,r.PR_DESIG_NAME as ROLE_NAME,u.PR_DESIGNATION_ID as ROLE_ID')
        ->join($tbl, 'u.PR_DESIGNATION_ID = r.PR_DESIGNATION_ID', 'Left');
        $this->db->where('u.PR_EMAIL', $email);
        $tbl='pr_employee as u';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }

    public function getPackageData($packageId) {
       
        $this->db->select('*');
        $this->db->where('PACKAGE_ID', $packageId);
        $tbl='pr_package';
        $query = $this->db->get($tbl);
        return $query->row();
        
    }
    public function getpackageList() {
       
        $this->db->select('*');
        //$this->db->where('PACKAGE_ID', $packageId);
        $tbl='pr_package';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }



    public function getAppliedData($jobId) {
       
        $this->db->select('*');
        $this->db->where('PR_JOB_ID', $jobId);
        $tbl='pr_job_apply';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }


        public function getUserEmployementDetail($userid) {
        $tbl2='pr_designation as r';
        $this->db->select('u.*,r.PR_DESIG_NAME as ROLE_NAME,u.PR_DESIGNATION as ROLE_ID,dept.PR_DEPART_NAME,i.PR_INDUSTRY as INDUSTRY,s.name as statename,c.name as cityname')
        ->join($tbl2, 'u.PR_DESIGNATION = r.PR_DESIGNATION_ID', 'Left')
        ->join('pr_department as dept', 'u.PR_DEPARTMENT = dept.PR_DEPARTMENT_ID', 'Left')
        ->join('pr_industry as i', 'u.PR_INDUSTRY = i.PR_INDUSTRY_ID', 'Left')
        ->join('pr_states as s', 'u.PR_STATE = s.id', 'Left')
        ->join('pr_cities as c', 'u.PR_CITY = c.id', 'Left');
        $this->db->where('u.PR_EMPLOYEE_ID', $userid);
        $tbl='pr_empexperiencedetail as u';
        $query = $this->db->get($tbl);
     //  echo $this->db->last_query(); exit();
        return $query->result();
        
    }

        public function getUserEducationDetail($userid) {
        $tbl='pr_designation as r';
        $this->db->select('*');
        $this->db->where('PR_EMPLOYEE_ID', $userid);
        $tbl='pr_empeducationdetail';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }

    public function getUserProjectDetail($userid) {
      
        $this->db->select('ep.*,u.PR_COMPANY_NAME')
         ->join('pr_empexperiencedetail as u', 'u.PR_EMP_EXP_ID = ep.EMPLOYEMENT_ID', 'Left');
        $this->db->where('ep.PR_EMPLOYEE_ID', $userid);
        $tbl='pr_employee_projects as ep';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }

    public function getUserData2($userid) {
        $tbl='pr_designation as r';
        $this->db->select('u.*,r.PR_DESIG_NAME as ROLE_NAME,u.PR_DESIGNATION_ID as ROLE_ID,dept.PR_DEPART_NAME,city.name as cityname')
        ->join('pr_department as dept', 'dept.PR_DEPARTMENT_ID = u.PR_DEPARTMENT_ID', 'Left')
        ->join('pr_cities as city', 'city.id = u.PR_PRESENT_CITY', 'Left')
         ->join($tbl, 'u.PR_DESIGNATION_ID = r.PR_DESIGNATION_ID', 'Left');
        $this->db->where('u.PR_EMPLOYEE_ID', $userid);
        $tbl='pr_employee as u';
        $query = $this->db->get($tbl);
//echo $this->db->last_query(); exit();
        return $query->row();
        
    } 


    public function getUserDataList($filter = array()) {

        
        $tbl='pr_designation as r';
        $tbl2='pr_empexperiencedetail as ed';
        $this->db->select('u.*,ed.*,r.PR_DESIG_NAME as ROLE_NAME,u.PR_DESIGNATION_ID as ROLE_ID,s.name as statename,edu.*')
        ->join($tbl, 'u.PR_DESIGNATION_ID = r.PR_DESIGNATION_ID', 'Left')
        ->join('pr_empeducationdetail as edu', 'edu.PR_EMPLOYEE_ID = u.PR_EMPLOYEE_ID', 'Left')
        ->join('pr_states as s', 's.id = u.PR_PRESENT_STATE', 'Left')
        ->join($tbl2, 'u.PR_EMPLOYEE_ID = ed.PR_EMPLOYEE_ID', 'Left');
        if($filter['DEPARTMENT'])
        {
            $this->db->where('u.PR_DEPARTMENT_ID',$filter['DEPARTMENT']);
        }
        if($filter['DESIGNATION'])
        {
            $this->db->where('u.PR_DESIGNATION_ID',$filter['DESIGNATION']);
        }
        if($filter['STATE'])
        {
            $this->db->where('u.PR_PRESENT_STATE',$filter['STATE']);
        }
        if($filter['CITY'])
        {
            $this->db->where('u.PR_PRESENT_CITY',$filter['CITY']);
        }
        if($filter['INDUSTRY'])
        {
            $this->db->where('u.PR_INDUSTRY',$filter['INDUSTRY']);
        }
        if($filter['MOBILE_NO_VERIFIED'])
        {
            $this->db->where('u.MOBILE_NO_VERIFIED',$filter['MOBILE_NO_VERIFIED']);
        }
        if($filter['EMAIL_VERIFIED'])
        {
            $this->db->where('u.EMAIL_VERIFIED',$filter['EMAIL_VERIFIED']);
        }
        if($filter['PR_RESUME'])
        {
            $this->db->where('u.PR_RESUME',$filter['PR_RESUME']);
        }
         if (isset($filter['SEARCH_ITEM']) && $filter['SEARCH_ITEM']!="") 
        {
            $filterarray =array('r.PR_DESIG_NAME' =>$filter['SEARCH_ITEM']);
            $this->db->or_like($filterarray);
           
        }
        //$this->db->where('u.PR_EMPLOYEE_CODE','1');
        $tbl='pr_employee as u';
        $query = $this->db->get($tbl);
      // echo $this->db->last_query(); exit();
        return $query->result();
        
    }


    public function getUserFolderDataList($userId) {
        $tbl='pr_designation as r';
        $tbl2='pr_empexperiencedetail as ed';
        $tbl3='pr_employee as u';
        $this->db->select('u.*,ed.*,r.PR_DESIG_NAME as ROLE_NAME,u.PR_DESIGNATION_ID as ROLE_ID')
        ->join($tbl3, 'u.PR_EMPLOYEE_ID = rfd.PR_CANDIDATTE_ID', 'Left')
        ->join($tbl, 'u.PR_DESIGNATION_ID = r.PR_DESIGNATION_ID', 'Left')
        ->join($tbl2, 'u.PR_EMPLOYEE_ID = ed.PR_EMPLOYEE_ID', 'Left');
        $this->db->where('rfd.PR_FOLDER_ID',$userId);
        $tbl='pr_recruiter_folder_data as rfd';
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();
        return $query->result();
        
    }


     public function getLocationList() {
        $tbl2='pr_states as s';
    
        $this->db->select('s.*')
        
        ->join($tbl2, 's.id = jp.PR_STATE', 'Left');
         $this->db->group_by('jp.PR_STATE'); 
        $tbl='pr_job_post as jp';
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();

        return $query->result();
        
    }

    public function getsLocationList() {
        
        $this->db->select('*');        
        $tbl='pr_states';
        $this->db->where('country_id', '1');
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();

        return $query->result();
        
    }


    public function getIndustry() {
        
        $this->db->select('*');        
        $tbl='pr_industry';
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();

        return $query->result();
        
    }

    public function getIndustryList() {
        $tbl2='pr_industry as s';
    
        $this->db->select('s.*')        
        ->join($tbl2, 's.PR_INDUSTRY_ID = jp.PR_SELECT_INDUSTRY', 'Left');

        if (isset($filter['SEARCH_ITEM']) && $filter['SEARCH_ITEM']!="") 
        {
            $filterarray =array('PR_JOB_TITLE' =>$filter['SEARCH_ITEM'],'PR_JOB_DESC' =>$filter['SEARCH_ITEM']);
            $this->db->or_like($filterarray);
           
        }
        $this->db->group_by('jp.PR_SELECT_INDUSTRY'); 
        $tbl='pr_job_post as jp';
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();

        return $query->result();
        
    }

    public function getIndustryList_homePage($filter = array()) 
    {        
        $this->db->select('*');
        if($filter['TYP'])
        {
            $this->db->where('PR_TYPE',$filter['TYP']); 
        }
        if (isset($filter['SEARCH_ITEM']) && $filter['SEARCH_ITEM']!="") {

            $filterarray =array('PR_INDUSTRY' =>$filter['SEARCH_ITEM']);
            $this->db->or_like($filterarray);
           
        }

       
        //$this->db->order_by("PR_BRAND_ID", "desc"); 
        if($filter['LIMIT'])
        {
             $this->db->limit($filter['LIMIT'],0);  
        }
       
        $this->_states ='pr_industry';
        $query = $this->db->get($this->_states);        
        return $query->result();   
    }


    public function getfolderList($userId) 
    {        
        $this->db->select('*');
        $this->db->where('PR_RECRUITER_ID',$userId);
        $tbl='pr_recruiter_folder';
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();
        return $query->result();        
    }

    public function getsavedSearchList($userId) 
    {        
        $this->db->select('*');
        $this->db->where('SEARCH_TYPE','saved');
        $this->db->where('MODIFIED_BY',$userId);
        $tbl='seach_data';
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();
        return $query->result();        
    }
     public function getrecentSearchList($userId) 
    {   
       // $userId=$this->session->userdata['user_session']['USER_ID'];
        $this->db->select('*');
        $this->db->where('SEARCH_TYPE','recent');
         $this->db->where('MODIFIED_BY',$userId);
        $tbl='seach_data';
        $query = $this->db->get($tbl);
    //echo $this->db->last_query(); exit();
        return $query->result();        
    }


public function getLocationListss() 
    {        
        $this->db->select('*');
       // $this->db->where('PR_RECRUITER_ID',$userId);
        $tbl='pr_states';
        $query = $this->db->get($tbl);
        //echo $this->db->last_query(); exit();
        return $query->result();        
    }

    
  

    public function getQualificationList($filter = array()) 
    {        
        $this->db->select('*');
        $this->db->group_by('TYPE'); 
        $this->_qualification ='pr_courses';
        $query = $this->db->get($this->_qualification);        
        return $query->result();   
    }


    public function getSkillsList($filter = array()) 
    {        
        $this->db->select('*');
        //$this->db->where('PR_TYPE', '1');
        //$this->db->order_by("PR_BRAND_ID", "desc"); 
        if($filter['LIMIT'])
        {
            $this->db->limit($filter['LIMIT'],0);
        }       
        
        $this->_skill ='pr_skills';
        $query = $this->db->get($this->_skill);   

       // echo $this->db->last_query();


        return $query->result();   
    }


    //  public function getSkillsList() {
    //     $tbl2='pr_skills as s';
    
    //     $this->db->select('s.*')
        
    //     ->join($tbl2, 's.PR_SKILL_ID = jp.PR_KEY_SKILLS', 'Left');
    //      $this->db->group_by('jp.PR_KEY_SKILLS'); 
    //     $tbl='pr_job_post as jp';
    //     $query = $this->db->get($tbl);
    //     //echo $this->db->last_query(); exit();

    //     return $query->result();
        
    // }

    // public function getDesignationList() {
    //     $tbl2='pr_designation as s';
    
    //     $this->db->select('s.*')
        
    //     ->join($tbl2, 's.PR_DESIGNATION_ID = jp.PR_DESIGNATION', 'Left');
    //      $this->db->group_by('jp.PR_DESIGNATION'); 
    //     $tbl='pr_job_post as jp';
    //     $query = $this->db->get($tbl);
    //     //echo $this->db->last_query(); exit();

    //     return $query->result();
        
    // }

    public function getDesignationList($filter = array()) 
    {        
        $this->db->select('*');
        //$this->db->where('PR_TYPE', '1');
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->db->limit($filter['LIMIT'],0);
        $this->_designation ='pr_designation';
        $query = $this->db->get($this->_designation);        
        return $query->result();   
    }
    public function getEmployerList($filter = array()) 
    {        
        $this->db->select('*');
        //$this->db->where('PR_TYPE', '1');
        //$this->db->order_by("PR_BRAND_ID", "desc");        
        $this->db->limit($filter['LIMIT'],0);
        $this->_company ='pr_company';
        $query = $this->db->get($this->_company);        
        return $query->result();   
    }


public function getUserSkillsDataList($userId) 
    {        
        $this->db->select('s.*,jp.PR_EXP,jp.PR_USER_SKILL_ID')
         ->join('pr_skills as s', 's.PR_SKILL_ID = jp.PR_SKILL_ID', 'Left');
        $this->db->where('PR_USER_ID',$userId);
  
        $this->_company ='pr_user_job_skills as jp';
        $query = $this->db->get($this->_company);        
        return $query->result();   
    }


    public function getUserSkill($skillId) 
    {     
        $userId=$this->session->userdata['user_session']['USER_ID'];

        $this->db->select('*');
        $this->db->where('PR_USER_ID',$userId);
        $this->db->where('PR_SKILL_ID',$skillId);
  
        $this->_company ='pr_user_job_skills';
        $query = $this->db->get($this->_company);        
        return $query->row();   
    }


    public function gettotalJobs($filter = array())
    {
       
        $sql = "select count(*) as totalJobs from pr_job_post where  PR_STATUS='1' ";
        if($filter['industry_id'])
        {
        $sql.= " and PR_SELECT_INDUSTRY='".$filter['industry_id']."'";   
        } 
        if($filter['department_id'])
        {
        $sql.= " and PR_DEPARTMENT='".$filter['department_id']."'";   
        } 
        if($filter['designation_id'])
        {
        $sql.= " and PR_DESIGNATION='".$filter['designation_id']."'";   
        } 
        if($filter['comp_id'])
        {
        $sql.= " and PR_COMPANY_ID='".$filter['comp_id']."'";   
        } 
        if($filter['state_id'])
        {
        $sql.= " and PR_STATE='".$filter['state_id']."'";   
        } 
        if($filter['city_id'])
        {
        $sql.= " and PR_CITY='".$filter['city_id']."'";   
        } 
        if($filter['skills'])
        {
         $sql.= " and PR_STATUS like '%".$filter['STATUS']."%'";     
        }

       


        // if (isset($filter['SEARCH_ITEM']) && $filter['SEARCH_ITEM']!="") {

        //     $filterarray =array('PR_DESIGNATION' =>$filter['SEARCH_ITEM'], 'PR_DEPARTMENT' =>$filter['SEARCH_ITEM'], 'PR_SELECT_INDUSTRY' =>$filter['SEARCH_ITEM'],'PR_COMPANNY_ID'=>$filter['SEARCH_ITEM'],'PR_STATE'=>$filter['SEARCH_ITEM'],'PR_CITY'=>$filter['SEARCH_ITEM']);
        //     $this->db->or_like($filterarray);
           
        // }



        //  if (isset($filter['LOCATION']) && $filter['LOCATION']!="") {
        //     $this->db->where('jp.PR_STATE', $filter['LOCATION']);
        // }
        
        // if (isset($filter['EXPERIENCE']) && $filter['EXPERIENCE']!="") {
        //     $this->db->where('jp.PR_MIN_EXP <=', $filter['EXPERIENCE']);
        //     $this->db->where('jp.PR_MAX_EXP >=', $filter['EXPERIENCE']);
        // }
        
//         if (isset($filter['SEARCH_ITEM']) && $filter['SEARCH_ITEM']!="") {
// //echo "Hello";
//             $filterarray =array('r.PR_DESIG_NAME' =>$filter['SEARCH_ITEM'], 'dept.PR_DEPART_NAME' =>$filter['SEARCH_ITEM'], 'i.PR_INDUSTRY' =>$filter['SEARCH_ITEM'],'e.PR_COMPANY_NAME'=>$filter['SEARCH_ITEM'],'sk.PR_SKILL'=>$filter['SEARCH_ITEM'],'sk.PR_JOB_LOCATION'=>$filter['SEARCH_ITEM']);
//             $this->db->or_like($filterarray);
           
//         }
        
        $query = $this->db->query($sql);
       //echo $this->db->last_query();
        return $query->row();
        
    }
//      public function gettotalJobs($filter = array())
//     {
       

//      $this->db->select('count("jp.*") as totalJobs')
//         ->join('pr_designation as r', 'jp.PR_DESIGNATION = r.PR_DESIGNATION_ID', 'Left')
//         ->join('pr_department as dept', 'jp.PR_DEPARTMENT = dept.PR_DEPARTMENT_ID', 'Left')
//         ->join('pr_states as s', 's.id =jp.PR_STATE', 'Left')
//         ->join('pr_cities as c', 'c.id = jp.PR_CITY', 'Left')
//         ->join('pr_industry as i', 'jp.PR_SELECT_INDUSTRY = i.PR_INDUSTRY_ID', 'Left')
//         ->join('pr_company as e', 'e.PR_COMPANY_ID = jp.PR_COMPANY_ID', 'Left')
//         ->join('pr_job_skills as js', 'js.PR_JOB_ID = jp.PR_JOBPOST_ID', 'Left')
//         ->join('pr_skills as sk', 'sk.PR_SKILL_ID = js.PR_SKILL_ID', 'Left');

//         if (isset($filter['LOCATION']) && $filter['LOCATION']!="") {
//             $this->db->where('jp.PR_STATE', $filter['LOCATION']);
//         }
        
//         if (isset($filter['EXPERIENCE']) && $filter['EXPERIENCE']!="") {
//             $this->db->where('jp.PR_MIN_EXP <=', $filter['EXPERIENCE']);
//             $this->db->where('jp.PR_MAX_EXP >=', $filter['EXPERIENCE']);
//         }
        
//         if (isset($filter['SEARCH_ITEM']) && $filter['SEARCH_ITEM']!="") {
// //echo "Hello";
//             $filterarray =array('r.PR_DESIG_NAME' =>$filter['SEARCH_ITEM'], 'dept.PR_DEPART_NAME' =>$filter['SEARCH_ITEM'], 'i.PR_INDUSTRY' =>$filter['SEARCH_ITEM'],'e.PR_COMPANY_NAME'=>$filter['SEARCH_ITEM'],'sk.PR_SKILL'=>$filter['SEARCH_ITEM']);
//             $this->db->or_like($filterarray);
           
//         }

//         if (isset($filter['JOB_ID']) && $filter['JOB_ID']!="") {

//             $this->db->where('jp.PR_JOBPOST_ID', $filter['JOB_ID']);
           
//         }

//         if (isset($filter['DESIGNATION']) && $filter['DESIGNATION']!="") {

//             $this->db->like('r.PR_DESIG_NAME', $filter['DESIGNATION']);
           
//         }
        
//         $this->db->group_by('jp.PR_JOBPOST_ID'); 
//         $this->_tbl ='pr_job_post as jp';
//         $query = $this->db->get($this->_tbl);
//         //echo $this->db->last_query(); exit;
       

//             return $query->row();
       

//     }


    public function getFilterJobList($filter = array()) {
//print_r($filter);
        $this->db->select('jp.*,r.PR_DESIG_NAME,dept.PR_DEPART_NAME,s.name as STATE,c.name as CITY,i.PR_INDUSTRY,e.*')
        ->join('pr_designation as r', 'jp.PR_DESIGNATION = r.PR_DESIGNATION_ID', 'Left')
        ->join('pr_department as dept', 'jp.PR_DEPARTMENT = dept.PR_DEPARTMENT_ID', 'Left')
        ->join('pr_states as s', 's.id =jp.PR_STATE', 'Left')
        ->join('pr_cities as c', 'c.id = jp.PR_CITY', 'Left')
        ->join('pr_industry as i', 'jp.PR_SELECT_INDUSTRY = i.PR_INDUSTRY_ID', 'Left')
        ->join('pr_company as e', 'e.PR_COMPANY_ID = jp.PR_COMPANY_ID', 'Left')
        ->join('pr_job_skills as js', 'js.PR_JOB_ID = jp.PR_JOBPOST_ID', 'Left')
        ->join('pr_skills as sk', 'sk.PR_SKILL_ID = js.PR_SKILL_ID', 'Left');


        if(isset($filter['INDUSTRY']) && !empty($filter['INDUSTRY'])){
            
             //$industryArr = implode(',', $filter['INDUSTRY']);
           // print_r($industryArr);
            $this->db->where_in('jp.PR_SELECT_INDUSTRY',$filter['INDUSTRY']);
        }

        if(isset($filter['STATE']) && !empty($filter['STATE'])){
            
             //$industryArr = implode(',', $filter['INDUSTRY']);
           // print_r($industryArr);
            $this->db->where_in('jp.PR_STATE',$filter['STATE']);
        }
        

        if (isset($filter['LOCATION']) && $filter['LOCATION']!="") {
            $this->db->where('jp.PR_STATE', $filter['LOCATION']);
        }
        

         if (isset($filter['WFH']) && $filter['WFH']!="") {
            $this->db->where('jp.PR_WFH', $filter['WFH']);
        }
        
        if (isset($filter['EXPERIENCE']) && $filter['EXPERIENCE']!="") {
            $this->db->where('jp.PR_MIN_EXP <=', $filter['EXPERIENCE']);
            $this->db->where('jp.PR_MAX_EXP >=', $filter['EXPERIENCE']);
        }
        
        if (isset($filter['SEARCH_ITEM']) && $filter['SEARCH_ITEM']!="") {
            //echo "Hello";
            $filterarray =array('r.PR_DESIG_NAME' =>$filter['SEARCH_ITEM'], 'dept.PR_DEPART_NAME' =>$filter['SEARCH_ITEM'], 'i.PR_INDUSTRY' =>$filter['SEARCH_ITEM'],'e.PR_COMPANY_NAME'=>$filter['SEARCH_ITEM'],'sk.PR_SKILL'=>$filter['SEARCH_ITEM'],'jp.PR_JOB_TITLE'=>$filter['SEARCH_ITEM']);
            $this->db->or_like($filterarray);
           
        }

        if (isset($filter['JOB_ID']) && $filter['JOB_ID']!="") {

            $this->db->where('jp.PR_JOBPOST_ID', $filter['JOB_ID']);
           
        }

        if (isset($filter['DESIGNATION']) && $filter['DESIGNATION']!="") {

            $this->db->like('r.PR_DESIG_NAME', $filter['DESIGNATION']);
           
        }
       
        $this->db->where('jp.PR_STATUS','1');
        $this->db->order_by("jp.PR_JOBPOST_ID", "desc");
        $this->db->group_by('jp.PR_JOBPOST_ID'); 
        $this->_tbl ='pr_job_post as jp';
        $query = $this->db->get($this->_tbl);
    // echo $this->db->last_query(); exit;
        if ($filter['LIMIT']=='1')
        {

            return $query->row();
           
        }
        else{
            return $query->result();
        }
        
    }

    public function getSkillByJob($jobid) 
    {        
        $this->db->select('sk.*')
        ->join('pr_skills as sk', 'sk.PR_SKILL_ID = js.PR_SKILL_ID', 'Left');
        $this->db->where('js.PR_JOB_ID',$jobid);
       
        $this->_company ='pr_job_skills as js';
        $query = $this->db->get($this->_company);        
        return $query->result();   
    }


   

    
function getSearchRows($params = array()){
     $this->dbTbl = 'pr_skills';
        $this->db->select("*");
        $this->db->from($this->dbTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        //search by terms
        if(!empty($params['searchTerm'])){
            $this->db->like('PR_SKILL', $params['searchTerm']);
        }
        
        $this->db->group_by('PR_SKILL');
        $this->db->order_by('PR_SKILL', 'asc');
        
        if(array_key_exists("PR_SKILL_ID",$params)){
            $this->db->where('PR_SKILL_ID',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
    }






}
