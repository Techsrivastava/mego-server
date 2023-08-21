<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Organization_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->database(); 
    }
    public function addRow($tableName, $insertData) 
    {
        $this->db->insert($tableName, $insertData);
        // echo $this->db->last_query(); exit;
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
    public function getUserList($filter = array()) 
    {

        $this->db->select('*');

        $this->db->where('PR_EMAIL', $filter['EMAIL']);
        
        
        $this->_user =DB_PREFIX.'employee';
        $query = $this->db->get($this->_user);

        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        return $query->row();
    }
    public function getUserData($postData = array())
    {
        $jdb=DB_PREFIX.'role as r';
         $dept=DB_PREFIX.'department as dep';
        $this->db->select('u.*,r.ROLE_NAME,dep.PR_DEPARTMENT_NAME')
        ->join($jdb, 'u.PR_DESIGNATION_ID = r.ROLE_ID', 'Left')
         ->join($dept, 'dep.PR_DEPARTMENT_ID = u.PR_DEPARTMENT_ID', 'Left');


        if (isset($filter['USER_ID'])) {
            $this->db->where('u.PR_EMPLOYEE_ID', $filter['USER_ID']);
        }  


        if (isset($postData['DESIGNATION_ID'])) {
            $this->db->where('u.PR_DESIGNATION_ID', $postData['DESIGNATION_ID']);
        }  


        $this->db->where('u.PR_DESIGNATION_ID !=','11'); 
        $where = '(u.PR_EMPLOYEE_STATUS="0" or u.PR_EMPLOYEE_STATUS = "1")';
        $this->db->where($where);
        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->_user =DB_PREFIX.'employee as u';
        $query = $this->db->get($this->_user);
       // print_r($this->db->last_query());  exit;
        if (isset($postData['count'])) {
           return $query->result();
        }

        if (isset($postData['single']) && $postData['single']) {
            return $query->row();
        }

        //return $query->result();
    }
     public function getAppliedUserData($postData = array())
    {
        $jdb=DB_PREFIX.'role as r';
         $dept=DB_PREFIX.'department as dep';
        $this->db->select('u.*,r.ROLE_NAME,dep.PR_DEPARTMENT_NAME')
        ->join($jdb, 'u.PR_DESIGNATION_ID = r.ROLE_ID', 'Left')
         ->join($dept, 'dep.PR_DEPARTMENT_ID = u.PR_DEPARTMENT_ID', 'Left');


        if (isset($filter['USER_ID'])) {
            $this->db->where('u.PR_EMPLOYEE_ID', $filter['USER_ID']);
        }      

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->db->where('u.PR_DESIGNATION_ID !=','11');
        //$this->db->where('u.PR_EMPLOYEE_STATUS',2);
        $where = '(u.PR_EMPLOYEE_STATUS="2" or u.PR_EMPLOYEE_STATUS = "3" or u.PR_EMPLOYEE_STATUS = "4" or u.PR_EMPLOYEE_STATUS = "5" or u.PR_EMPLOYEE_STATUS = "6")';
        
        $this->db->where($where);
        $this->_user =DB_PREFIX.'employee as u';
        $query = $this->db->get($this->_user);
       // print_r($this->db->last_query());  exit;
        if (isset($postData['count'])) {
           return $query->result();
        }

        if (isset($postData['single']) && $postData['single']) {
            return $query->row();
        }

        //return $query->result();
    }
    public function getDistributorDatas($postData = array())
    {
        $jdb=DB_PREFIX.'role as r';
         $dept=DB_PREFIX.'department as dep';
        $this->db->select('u.*,r.ROLE_NAME,dep.PR_DEPARTMENT_NAME')
        ->join($jdb, 'u.PR_DESIGNATION_ID = r.ROLE_ID', 'Left')
         ->join($dept, 'dep.PR_DEPARTMENT_ID = u.PR_DEPARTMENT_ID', 'Left');


        if (isset($filter['USER_ID'])) {
            $this->db->where('u.PR_EMPLOYEE_ID', $filter['USER_ID']);
        }   

        
       if (isset($postData['PR_REPORTING_MANAGER'])) {
            $this->db->where('u.PR_REPORTING_MANAGER',$postData['PR_REPORTING_MANAGER']);
        }   
        
        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        //$this->db->where('u.PR_EMPLOYEE_STATUS',2);
         $this->db->where('u.PR_DESIGNATION_ID', '11');
        $where = '(u.PR_EMPLOYEE_STATUS="2" or u.PR_EMPLOYEE_STATUS = "3" or u.PR_EMPLOYEE_STATUS = "4" or u.PR_EMPLOYEE_STATUS = "5" or u.PR_EMPLOYEE_STATUS = "6")';
        $this->db->where($where);


        $this->_user =DB_PREFIX.'employee as u';
        $query = $this->db->get($this->_user);
       // print_r($this->db->last_query());  exit;
        if (isset($postData['count'])) {
           return $query->result();
        }

        if (isset($postData['single']) && $postData['single']) {
            return $query->row();
        }

        //return $query->result();
    }
      public function getDistributorData($postData = array())
    {
        $jdb=DB_PREFIX.'role as r';
         $dept=DB_PREFIX.'department as dep';
        $this->db->select('u.*,r.ROLE_NAME,dep.PR_DEPARTMENT_NAME')
        ->join($jdb, 'u.PR_DESIGNATION_ID = r.ROLE_ID', 'Left')
         ->join($dept, 'dep.PR_DEPARTMENT_ID = u.PR_DEPARTMENT_ID', 'Left');


        if (isset($filter['USER_ID'])) {
            $this->db->where('u.PR_EMPLOYEE_ID', $filter['USER_ID']);
        }      

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->db->where('u.PR_EMPLOYEE_STATUS','1');
        $this->db->where('u.PR_DESIGNATION_ID','11');
  


        $this->_user =DB_PREFIX.'employee as u';
        $query = $this->db->get($this->_user);
       // print_r($this->db->last_query());  exit;
        if (isset($postData['count'])) {
           return $query->result();
        }

        if (isset($postData['single']) && $postData['single']) {
            return $query->row();
        }

        //return $query->result();
    }

public function getRetailerrData($postData = array())
    {
        $jdb=DB_PREFIX.'role as r';
         $dept=DB_PREFIX.'department as dep';
        $this->db->select('u.*,r.ROLE_NAME,dep.PR_DEPARTMENT_NAME')
        ->join($jdb, 'u.PR_DESIGNATION_ID = r.ROLE_ID', 'Left')
         ->join($dept, 'dep.PR_DEPARTMENT_ID = u.PR_DEPARTMENT_ID', 'Left');


        if (isset($filter['USER_ID'])) 
        {
            $this->db->where('u.PR_EMPLOYEE_ID', $filter['USER_ID']);
        }      

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->db->where('u.PR_EMPLOYEE_STATUS','1');

        $this->db->where('u.PR_DESIGNATION_ID','13');
  


        $this->_user =DB_PREFIX.'employee as u';
        $query = $this->db->get($this->_user);
       // print_r($this->db->last_query());  exit;
        if (isset($postData['count'])) {
           return $query->result();
        }

        if (isset($postData['single']) && $postData['single']) {
            return $query->row();
        }

        //return $query->result();
    }





    public function getEmployeeData($postData = array())
    {
        $designationtbl=DB_PREFIX.'role as d';
        $comptbl=DB_PREFIX.'company as c';
        $reportemptbl=DB_PREFIX.'employee as re';

        $pstate=DB_PREFIX.'states as ps';
        $prestate=DB_PREFIX.'states as prs';
        $pcities=DB_PREFIX.'cities as city';
        $precities=DB_PREFIX.'cities as citys';

        $this->db->select('e.*,d.ROLE_NAME,re.PR_NAME as REPORTING_MANAGER_NAME,re.PR_EMAIL as REPORTING_MANAGER_EMAIL,ps.name as PR_PRESENT_STATE_NAME,prs.name as PR_PEMANENT_STATE_NAME,city.name as PR_PRESENT_CITY_NAME,citys.name as PR_PERMANNENT_CITY_NAME')
        ->join($designationtbl, 'd.ROLE_ID = e.PR_DESIGNATION_ID', 'Left')
        ->join($reportemptbl, 'e.PR_REPORTING_MANAGER = re.PR_EMPLOYEE_ID', 'Left')
        ->join($pstate, 'e.PR_PRESENT_STATE =ps.id', 'Left')
        ->join($prestate, 'e.PR_PERMANENT_STATE =prs.id', 'Left')
        ->join($pcities, 'e.PR_PRESENT_CITY =city.id', 'Left')
        ->join($precities, 'e.PR_PERMANENT_CITY =citys.id', 'Left')
        ->join($comptbl, 'c.PR_COMPANY_ID = e.PR_COMPANY_ID', 'Left');
        $this->db->where('e.PR_EMPLOYEE_ID',$postData['EMPLOYEE_ID']);
        
        $tbl=DB_PREFIX.'employee as e';
        $query = $this->db->get($tbl);
        //print_r($this->db->last_query());  exit;
        return $query->row();  
    }
    public function getPrevEmployeeData($postData = array())
    {
        
        $this->db->select('*');
        $this->db->where('PR_EMPLOYEE_ID', $postData['EMPLOYEE_ID']);
       
        $this->_user =DB_PREFIX.'empexperiencedetail';
        $query = $this->db->get($this->_user);
        return $query->row();
        
        //return $query->result();
    }
     public function getDirectorData($postData = array())
    {
        
        $this->db->select('*');
        $this->db->where('PR_DISTRIBUTOR_ID', $postData['PR_DISTRIBUTOR_ID']);
       
        $this->_user =DB_PREFIX.'distributor_directors';
        $query = $this->db->get($this->_user);
        //return $query->row();
        
        return $query->result();
    }
    public function gettotalEmployee()
    {
        $tbl=DB_PREFIX.'employee';
        $sql = "select count(*) as totalemp from ".$tbl." where PR_EMPLOYEE_STATUS in ('1','0') and PR_DESIGNATION_ID!='11'";     
        $query = $this->db->query($sql);
        return $query->row();
        
    }
     public function gettotalAEmployee()
    {
        $tbl=DB_PREFIX.'employee';
        $sql = "select count(*) as totalemp from ".$tbl." where PR_EMPLOYEE_STATUS!='1' and PR_EMPLOYEE_STATUS!='0' and PR_DESIGNATION_ID!='11'";     
        $query = $this->db->query($sql);
        return $query->row();
        
    }

    public function gettotalAlFos()
    {
        $tbl=DB_PREFIX.'employee';
        $sql = "select count(*) as totalemp from ".$tbl." where PR_EMPLOYEE_STATUS='1' and PR_EMPLOYEE_STATUS='1' and PR_DESIGNATION_ID='12'";     
        $query = $this->db->query($sql);
        return $query->row();
        
    }

     public function getAppliedtotalAlFos()
    {
        $tbl=DB_PREFIX.'employee';
        $sql = "select count(*) as totalemp from ".$tbl." where PR_EMPLOYEE_STATUS!='1' and PR_EMPLOYEE_STATUS='1' and PR_DESIGNATION_ID='12'";     
        $query = $this->db->query($sql);
        return $query->row();
        
    }
    public function gettotalDistributor()
    {
        $tbl=DB_PREFIX.'employee';
         $sql = "select count(*) as totalemp from ".$tbl." where PR_EMPLOYEE_STATUS='1' and PR_DESIGNATION_ID='11'";       
        $query = $this->db->query($sql);
        return $query->row();
        
    }
    public function gettotalADistributor()
    {
        $tbl=DB_PREFIX.'employee';
         $sql = "select count(*) as totalemp from ".$tbl." where PR_EMPLOYEE_STATUS!='1' and PR_DESIGNATION_ID='11'";       
        $query = $this->db->query($sql);
        return $query->row();
        
    }
    public function getUserDatass($user_id)
    {
        $jdb=DB_PREFIX.'role as r';
        $this->db->select('u.*,r.ROLE_NAME')
        ->join($jdb, 'u.ROLE_ID = r.ROLE_ID', 'Left');


        $this->db->where('u.USER_ID', $user_id);
       
        $this->_user =DB_PREFIX.'users as u';
        $query = $this->db->get($this->_user);
        return $query->row();
        
        //return $query->result();
    }
    public function getCountryData($postData = array())
    {
        $tbl=DB_PREFIX.'countries';
        $sql = "select * from ".$tbl."";     
        if($query = $this->db->query($sql))
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
      public function getWarehouseData($postData = array())
    {
        $tbl=DB_PREFIX.'warehouse';
        $sql = "select * from ".$tbl."";     
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
     public function getDesignationL($postData = array())
    {
        
        $this->db->select('*');
       
        $this->db->where('PR_DEPT_ID',$postData['PR_DEPT_ID']);
       
        $this->_user =DB_PREFIX.'role';
        $query = $this->db->get($this->_user);
        return $query->result();
    }
    public function getDepartmentData($postData = array())
    {
        $sql = "select * from pr_department";     
        if($query = $this->db->query($sql))
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
    public function getData($filter = array()) {
//print_r($filter); exit;
        $this->db->select('*');


        if (isset($filter['ROLE_ID'])) {
            $this->db->where('ROLE_ID', $filter['ROLE_ID']);
        }
        
         if (isset($filter['ROLE_NAME']) && !empty($filter['ROLE_NAME'])) {
            $this->db->where('ROLE_NAME', $filter['ROLE_NAME']);
        }
        
    
        
        if (isset($filter['ROLE_STATUS']) && is_numeric($filter['ROLE_STATUS'])) {
            $this->db->where('ROLE_STATUS', $filter['ROLE_STATUS']);
        }

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->_role =DB_PREFIX.'role';
        $query = $this->db->get($this->_role);

        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        //return $query->result();
    }
    public function getDepartData($filter = array()) {
//print_r($filter); exit;
        $this->db->select('*');


        if (isset($filter['PR_DEPARTMENT_ID'])) {
            $this->db->where('PR_DEPARTMENT_ID', $filter['PR_DEPARTMENT_ID']);
        }
        
        

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->_role =DB_PREFIX.'department';
        $query = $this->db->get($this->_role);

        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        //return $query->result();
    }
     public function warehouseGetData($filter = array()) {
//print_r($filter); exit;
        $this->db->select('*');


        if (isset($filter['PR_WAREHOUSE_ID'])) {
            $this->db->where('PR_WAREHOUSE_ID', $filter['PR_WAREHOUSE_ID']);
        }
        
       
        $this->_role =DB_PREFIX.'warehouse';
        $query = $this->db->get($this->_role);

        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        //return $query->result();
    }
    public function editModel($data,$id){
        //echo $id; exit;
        $tbl=DB_PREFIX.'role';
        $sql = "update ".$tbl." set ROLE_UPDATED_AT='".$data["ROLE_UPDATED_AT"]."'";
        if(isset($data["ROLE_NAME"]))
        {
        $sql.=",ROLE_NAME='".$data["ROLE_NAME"]."'";    
        }
        if(isset($data["ROLE_STATUS"]))
        {
        $sql.=",ROLE_STATUS='".$data["ROLE_STATUS"]."'";    
        }
        if(isset($data["ROLE_DESC"]))
        {
        $sql.=",ROLE_DESC='".$data["ROLE_DESC"]."'";    
        }
        if(isset($data["PR_DEPT_ID"]))
        {
        $sql.=",PR_DEPT_ID='".$data["PR_DEPT_ID"]."'";    
        }
       
        

        $sql.="where ROLE_ID='".$id."'";    
    
        
        if($this->db->query($sql)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
     public function editWarehouse($data,$id){
        //echo $id; exit;
        $tbl=DB_PREFIX.'warehouse';
        $sql = "update ".$tbl." set PR_UPDATED_AT='".$data["PR_UPDATED_AT"]."'";
        if(isset($data["PR_WAREHOUSE_NAME"]))
        {
        $sql.=",PR_WAREHOUSE_NAME='".$data["PR_WAREHOUSE_NAME"]."'";    
        }
        if(isset($data["PR_STATUS"]))
        {
        $sql.=",PR_STATUS='".$data["PR_STATUS"]."'";    
        }
        if(isset($data["PR_ADDRESS"]))
        {
        $sql.=",PR_ADDRESS='".$data["PR_ADDRESS"]."'";    
        }
       
        

        $sql.="where PR_WAREHOUSE_ID='".$id."'";    
    
        
        if($this->db->query($sql)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function deleteModel($id){   
        $tbl=DB_PREFIX.'role';
        $sql = "delete from ".$tbl." where ROLE_ID ='".$id."'";
        if($this->db->query($sql))
        {   
        
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function deleteDept($id){   
        $tbl=DB_PREFIX.'department';
        $sql = "delete from ".$tbl." where PR_DEPARTMENT_ID ='".$id."'";
        if($this->db->query($sql))
        {   
        
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function warehouseDelete($id){   
        $tbl=DB_PREFIX.'warehouse';
        $sql = "delete from ".$tbl." where PR_WAREHOUSE_ID ='".$id."'";
        if($this->db->query($sql))
        {   
        
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    /* 
        insert new categoty record in Database 
    */
    public function addModel($data){
        /*$sql = "insert into category (category_code,category_name) values(?,?)";
        if($this->db->query($sql,$data)){*/
        $tbl=DB_PREFIX.'role';
        if($this->db->insert($tbl,$data)){
            return  $this->db->insert_id();
        }
        else{
            return FALSE;
        }
    }

    
    public function adduser($data){
        /*$sql = "insert into category (category_code,category_name) values(?,?)";
        if($this->db->query($sql,$data)){*/
        $tbl=DB_PREFIX.'users';
        if($this->db->insert($tbl,$data)){
            return  $this->db->insert_id();
        }
        else{
            return FALSE;
        }
    }
    public function deleteUserModel($id){   
        $tbl=DB_PREFIX.'employee';
        $sql = "delete from ".$tbl." where PR_EMPLOYEE_ID ='".$id."'";
        if($this->db->query($sql))
        {   
        
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function chkRoleMenu($filter = array()) 
    {
        
        $this->db->select('*');
        $this->db->where('ROLE_ID', $filter['ROLE_ID']);
        $this->db->where('MENU_ID', $filter['MENU_ID']);
        $this->_menuPermission =DB_PREFIX.'menu_permission';
        $query = $this->db->get($this->_menuPermission);
       // echo $this->db->last_query(); exit;
        return $query->result();
    }

    public function chkUserMenu($filter = array()) 
    {
        $cust_id = $this->session->userdata('currentclient');
        $this->db->select('*');
        $this->db->where('USER_ID', $filter['USER_ID']);
        $this->db->where('MENU_ID', $filter['MENU_ID']);
        $this->_menuPermission =DB_PREFIX.'usermenu_permission';
        $query = $this->db->get($this->_menuPermission);
       // echo $this->db->last_query(); exit;
        return $query->result();
    }
    public function updatepermission($postData) {
        $tbl=DB_PREFIX.'menu_permission';
        // $this->db->where('ROLE_ID', $postData['role_id']);
        // $this->db->delete($tbl);

        $this->db->query("INSERT INTO ".$tbl." SET ROLE_ID = '" . $postData['role_id'] . "', MENU_ID = '" . $postData['menu_id'] . "' ");
        $permission_id = $this->db->insert_id();
        return $permission_id;
    }
    public function updateuserpermission($postData) {
        $tbl=DB_PREFIX.'usermenu_permission';
        // $this->db->where('ROLE_ID', $postData['role_id']);
        // $this->db->delete($tbl);

        $this->db->query("INSERT INTO ".$tbl." SET USER_ID = '" . $postData['user_id'] . "', MENU_ID = '" . $postData['menu_id'] . "' ");
        $permission_id = $this->db->insert_id();
        return $permission_id;
    }
    public function deleteRoleData($role_id)
    {
         $tbl=DB_PREFIX.'menu_permission';
         $this->db->where('ROLE_ID', $role_id);
        $this->db->delete($tbl);
         return TRUE;
    }
    public function deleteUserMenuData($user_id)
    {
         $tbl=DB_PREFIX.'usermenu_permission';
         $this->db->where('USER_ID', $user_id);
        $this->db->delete($tbl);
         return TRUE;
    }
     public function usereditModel($data,$id){
        //echo $id; exit;
        $tbl=DB_PREFIX.'users';
        $sql = "update ".$tbl." set UPDATED_AT='".$data["UPDATED_AT"]."'";
        if(isset($data["NAME"]))
        {
        $sql.=",NAME='".$data["NAME"]."'";    
        }
        if(isset($data["STATUS"]))
        {
        $sql.=",STATUS='".$data["STATUS"]."'";    
        }
        if(isset($data["TITLE"]))
        {
        $sql.=",TITLE='".$data["TITLE"]."'";    
        }
        if(isset($data["ROLE_ID"]))
        {
        $sql.=",ROLE_ID='".$data["ROLE_ID"]."'";    
        }
        if(isset($data["PHONE"]))
        {
        $sql.=",PHONE='".$data["PHONE"]."'";    
        }
        if(isset($data["PRESENT_ADDRESS"]))
        {
        $sql.=",PRESENT_ADDRESS='".$data["PRESENT_ADDRESS"]."'";    
        }
        if(isset($data["PERMANENT_ADDRESS"]))
        {
        $sql.=",PERMANENT_ADDRESS='".$data["PERMANENT_ADDRESS"]."'";    
        }
        if(isset($data["AADHAR_CARD_NO"]))
        {
        $sql.=",AADHAR_CARD_NO='".$data["AADHAR_CARD_NO"]."'";    
        }
        if(isset($data["PANCARD_NO"]))
        {
        $sql.=",PANCARD_NO='".$data["PANCARD_NO"]."'";    
        }
        if(isset($data["ACCOUNT_NO"]))
        {
        $sql.=",ACCOUNT_NO='".$data["ACCOUNT_NO"]."'";    
        }
        if(isset($data["IFSC_CODE"]))
        {
        $sql.=",IFSC_CODE='".$data["IFSC_CODE"]."'";    
        }
        if(isset($data["BANK_NAME"]))
        {
        $sql.=",BANK_NAME='".$data["BANK_NAME"]."'";    
        }
        if(isset($data["STATUS"]))
        {
        $sql.=",STATUS='".$data["STATUS"]."'";    
        }
        if(isset($data["IMAGE"]))
        {
        $sql.=",IMAGE='".$data["IMAGE"]."'";    
        }


       
        

        $sql.="where USER_ID='".$id."'";    
    
        
        if($this->db->query($sql)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    //  public function getWarehouseData($postData = array())
    // {
    //     $sql = "select * from pr_warehouse";     
    //     if($query = $this->db->query($sql))
    //     {
    //         return $query->result();
    //     }
    //     else
    //     {
    //         return FALSE;
    //     }
    // }

}
