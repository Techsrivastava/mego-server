<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->_tableName = 'admin';
        $this->load->database();
    }

     public function addRow($tableName, $insertData) {
        $this->db->insert($tableName, $insertData);
        //print_r($this->db->last_query());     exit;
        return $this->db->insert_id();
    }

    public function updateRow($tableName, $updateData, $whereData) {
        return $this->db->update($tableName, $updateData, $whereData);
    }
    
    public function getUserMenuData($filter = array()) 
    {
        $role_id=$filter['ROLE_ID'];
        $user_id=$filter['USER_ID'];
        $this->db->select('*');
        $this->db->where('USER_ID', $user_id);
        $this->_empmenu =DB_PREFIX.'usermenu_permission';
        $query = $this->db->get($this->_empmenu);
        $dtaa=$query->result();
        //print_r($dtaa); exit;
        if($dtaa)
        {
        $filter['PARENT_ID'] = '0';
        $this->db->select('me.*')
        ->join('pr_menu me', 'me.MENU_ID = pm.MENU_ID', 'Left');
        if (isset($role_id) && $role_id!='0') {
            $this->db->where('pm.USER_ID', $user_id);
        }
        if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
            $this->db->where('me.MENU_PARENT_ID', $filter['PARENT_ID']);
        }
        $this->db->where('me.IS_VIEW', 'm');
        $this->db->where('me.MENU_STATUS', '1');
        $this->db->order_by("me.SORTORDER", "asc");
        $this->_Menu =DB_PREFIX.'usermenu_permission';
        $query = $this->db->get($this->_Menu . ' pm');
        return $query->result(); 
        }
        else
        {

        $filter['PARENT_ID'] = '0';
        $this->db->select('me.*')
        ->join('pr_menu me', 'me.MENU_ID = pm.MENU_ID', 'Left');
        if (isset($role_id) && $role_id!='0') {
            $this->db->where('pm.ROLE_ID', $role_id);
        }
        if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
            $this->db->where('me.MENU_PARENT_ID', $filter['PARENT_ID']);
        }
        $this->db->where('me.IS_VIEW', 'm');
        $this->db->where('me.MENU_STATUS', '1');
        $this->db->order_by("me.SORTORDER", "asc");
        $this->_Menu =DB_PREFIX.'menu_permission';
        $query = $this->db->get($this->_Menu . ' pm');
        return $query->result(); 
        }
    }
    public function getUserSubMenuData($filter = array()) 
    {
        $role_id=$filter['ROLE_ID'];
        $user_id=$filter['USER_ID'];
        $this->db->select('*');
        $this->db->where('USER_ID', $user_id);
        $this->_empmenu =DB_PREFIX.'usermenu_permission';
        $query = $this->db->get($this->_empmenu);
        $dtaa=$query->result();
        //print_r($dtaa); exit;
        if($dtaa)
        {
        $this->db->select('m.*')
        ->join('pr_menu m', 'm.MENU_ID = pm.MENU_ID', 'Left');
        if (isset($role_id) && $role_id!='0') {
            $this->db->where('pm.USER_ID', $user_id);
        }
        if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
            $this->db->where('m.MENU_PARENT_ID', $filter['PARENT_ID']);
        }
        $this->db->where('m.MENU_STATUS', '1');
        $this->db->order_by("m.SORTORDER", "asc");
        $this->db->group_by('pm.MENU_ID');
        $this->_Menu =DB_PREFIX.'usermenu_permission';
        $query = $this->db->get($this->_Menu . ' pm');
        return $query->result();
        }
        else
        {

        $this->db->select('m.*')
        ->join('pr_menu m', 'm.MENU_ID = pm.MENU_ID', 'Left');
        if (isset($role_id) && $role_id!='0') {
            $this->db->where('pm.ROLE_ID', $role_id);
        }
        if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
            $this->db->where('m.MENU_PARENT_ID', $filter['PARENT_ID']);
        }
        $this->db->where('m.MENU_STATUS', '1');
        $this->db->order_by("m.SORTORDER", "asc");
        $this->db->group_by('pm.MENU_ID');
        $this->_Menu =DB_PREFIX.'menu_permission';
        $query = $this->db->get($this->_Menu . ' pm');
        return $query->result();
        }

    }
    public function checkUserExist($filter = array()) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('u.*');
        $this->db->where('u.PR_PHONE', $filter['PR_PHONE']);
        if(isset($filter['PR_OTP']))
        {
           $this->db->where('u.PR_OTP', $filter['PR_OTP']); 
        }
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }

     public function checkUserBlock($filter = array()) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('u.*');
        $this->db->where('u.PR_PHONE', $filter['PR_PHONE']);
        if(isset($filter['PR_OTP']))
        {
           $this->db->where('u.PR_OTP', $filter['PR_OTP']); 
        }
        $this->db->where('u.PR_STATUS','1'); 
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        //print_r($this->db->last_query());     exit;
        return $query->result();
        
    }


    public function getUserCallData($callId) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('*');
        $this->db->where('PR_CALL_ID',$callId);
     
        $tbl='create_call';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }
    
    public function getUserCallDataList($callId) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('cc.*,u.PR_NAME as USER_NAME,c.PR_NAME as CALLER_NAME')
        ->join('pr_users u', 'u.PR_USER_ID = cc.PR_USER_ID', 'Left')
        ->join('pr_users c', 'c.PR_USER_ID = cc.PR_CALLER_ID', 'Left');
        
        $where = '(cc.PR_USER_ID='.$callId.' or PR_CALLER_ID ='.$callId.')';
        $this->db->where($where);
        //$this->db->where('cc.PR_USER_ID',$callId);
      $this->db->order_by("cc.CALL_START_TIME","desc");
        $tbl='create_call as cc';
        $query = $this->db->get($tbl);
        
        //print_r($this->db->last_query());     exit;
        
        return $query->result();
        
    }
    
     public function getUserCallDataSts($callId,$sts) {
        //$tbl=DB_PREFIX.'users as u';
        $tdate=date('Y-m-d');
        $this->db->select('cc.*,u.PR_NAME as USER_NAME,c.PR_NAME as CALLER_NAME')
        ->join('pr_users u', 'u.PR_USER_ID = cc.PR_USER_ID', 'Left')
        ->join('pr_users c', 'c.PR_USER_ID = cc.PR_CALLER_ID', 'Left');
        
        $where = '(cc.PR_USER_ID='.$callId.' or PR_CALLER_ID ='.$callId.')';
        $this->db->where($where);
        $this->db->where('DATE(cc.PR_ENTRY_DATE)',$tdate);
        if($sts=="start")
        {
              $this->db->where('cc.PR_CALLING_STATUS',"start");
        }
        if($sts=="engage")
        {
              $this->db->where('cc.PR_CALLING_STATUS',"engage");
        }
        // $where2 = '(cc.PR_CALLING_STATUS="finish" or cc.PR_CALLING_STATUS ="engage")';
        // $this->db->where($where2);
 
        $this->db->order_by("cc.CALL_START_TIME","desc");
        $tbl='create_call as cc';
        $query = $this->db->get($tbl);
        
     //print_r($this->db->last_query());     exit;
        
        return $query->result();
        
    }


    public function checkUserMailExist($filter = array()) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('u.*');
        $this->db->where('u.PR_EMAIL', $filter['EMAIL']);
        //$this->db->where('u.PR_STATUS', '1';
        
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        //print_r($this->db->last_query());     exit;
        return $query->result();
        
    }
    public function checkUserMailExistCh($filter = array()) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('u.*');
        $this->db->where('u.PR_EMAIL', $filter['EMAIL']);
        $this->db->where('u.PR_STATUS', '1');
        
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        //print_r($this->db->last_query());     exit;
        return $query->result();
        
    }


    public function getUserData($filter = array()) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('*');
        $this->db->where('PR_USER_ID', $filter['EMPLOYEE_ID']);        
        $tbl='pr_users';
        $query = $this->db->get($tbl);
        $data=$query->row();

        $showGender=$data->SHOW_GENDER;
        if($showGender)
        {
            $gender=$showGender;
        }
        else
        {
        $gender=$data->PR_GENDER; 
        if($gender=="MAN")
        {
            $gender="WOMEN";
        }
        else
        {
            $gender="MAN";
        }
    }

        $this->db->select('*');
        $this->db->where('PR_GENDER', $gender);  
        $this->db->where('PR_USER_ID !=', $filter['EMPLOYEE_ID']);        
        $tbl2='pr_users';
        $query2 = $this->db->get($tbl2);
       //print_r($this->db->last_query());     exit;
        return $query2->result();
    }


    public function getUserDataRow($filter = array()) {
       
        $this->db->select('*');
        if($filter['EMPLOYEE_ID'])
        {
             $this->db->where('PR_USER_ID', $filter['EMPLOYEE_ID']);   
        }
        if($filter['PHONE'])
        {
             $this->db->where('PR_PHONE', $filter['PHONE']);   
        }
         
        $tbl2='pr_users';
        $query2 = $this->db->get($tbl2);
        return $query2->result();
        
    }

    public function getUserDataRow223($filter = array()) {
       
        $this->db->select('*');
        $this->db->where('PR_PHONE', $filter['PHONE']);   
        $tbl2='pr_users';
        $query2 = $this->db->get($tbl2);
     // print_r($this->db->last_query());     exit;
        return $query2->row();
        
    }

    public function getSingleUserDataRow($filter = array()) 
    {
       
        $this->db->select('*');
        $this->db->where('PR_USER_ID', $filter['PR_USER_ID']);   
        $tbl2='pr_users';
        $query2 = $this->db->get($tbl2);
        return $query2->row();
        
    }

    public function getUserPassion($filter = array()) {
       
        $this->db->select('*');
      $this->db->where('PR_USER_ID', $filter['EMPLOYEE_ID']);       
        $tbl2='pr_user_passion';
        $query2 = $this->db->get($tbl2);
         //print_r($this->db->last_query());     exit;
        return $query2->result();
    }

public function getPassion($filter = array()) {
       
        $this->db->select('*');
    
        $tbl2='pr_passion';
        $query2 = $this->db->get($tbl2);
         //print_r($this->db->last_query());     exit;
        return $query2->result();
    }

    public function getUserSettingData($filter = array()) {
       
        $this->db->select('PR_USER_S_ID,PR_SETTING,PR_VALUE');
        $this->db->where('PR_USER_ID', $filter['PR_USER_ID']);       
        $tbl2='pr_setting';
        $query2 = $this->db->get($tbl2);
        // print_r($this->db->last_query());     exit;
        return $query2->result();
    }


    public function getUserSettingDataByuser($filter = array()) {
       
        $this->db->select('*');
        $this->db->where('PR_USER_ID', $filter['PR_USER_ID']);       
        $tbl2='pr_user_setting';
        $query2 = $this->db->get($tbl2);
        // print_r($this->db->last_query());     exit;
        return $query2->result();
    }

    public function getPackageDtl($filter = array()) {
       
        $this->db->select('*');
        if($filter['PACKAGE_ID'])
        {
            $this->db->where('PR_PACKAGE_ID',$filter['PACKAGE_ID']); 
        }
        $this->db->where('PR_STATUS','1');       
        $tbl2='pr_package';
        $query2 = $this->db->get($tbl2);
        return $query2->result();
    }

    public function getOfferAdvDtl($filter = array()) {
       
        $this->db->select('*');     
        $this->db->where('PR_STATUS','1');       
        $tbl2='pr_offer_adv';
        $query2 = $this->db->get($tbl2);
        return $query2->result();
    }
     public function getPackagePriceDtl($filter = array()) {
       
        $this->db->select('p.PR_PACKAGE_NAME,PR_PACKAGE_DESC,pp.*')
           ->join('pr_package p', 'pp.PACKAGE_ID = p.PR_PACKAGE_ID', 'Left');
       $this->db->where('pp.PACKAGE_ID',$filter['PACKAGE_ID']);       
        $tbl2='pr_package_price as pp';
        $query2 = $this->db->get($tbl2);
        return $query2->result();
    }
    
    
    public function getPackageData($filter = array()) {
       
        $this->db->select('*');
        $this->db->where('PR_PACKAGE_ID',$filter['PACKAGE_ID']);       
        $tbl2='pr_package';
        $query2 = $this->db->get($tbl2);
        return $query2->result();
    }

    public function getPackageTrData($filter = array()) {
       
        $this->db->select('up.*,p.PR_PACKAGE_NAME,p.PR_PACKAGE_DESC,p.PR_DURATION,up.PRICE as PR_PRICE')
         ->join('pr_package as p', 'up.PACKAGE_ID = p.PR_PACKAGE_ID', 'Left');
        $this->db->where('up.PACKAGE_TRANS_ID',$filter['PACKAGE_ID']);       
        $tbl2='pr_package_price as up';
        $query2 = $this->db->get($tbl2);
        return $query2->result();
    }

    public function getUserSexualOrientation($filter = array()) {
       
        $this->db->select('*');
        $this->db->where('PR_USER_ID', $filter['EMPLOYEE_ID']);       
        $tbl2='pr_user_sexual_orientation';
        $query2 = $this->db->get($tbl2);
        return $query2->result();   
    }

    public function getUserPackage($filter = array()) {   
        $tbl='pr_package as p';
        $this->db->select('p.*')
        ->join($tbl, 'up.PACKAGE_ID = p.PR_PACKAGE_ID', 'Left');
        $this->db->where('up.USER_ID', $filter['EMPLOYEE_ID']);
        
        $tbl='pr_user_package as up';
        $query = $this->db->get($tbl);
      // print_r($this->db->last_query());     exit;
        return $query->result();        
    }

    public function getLikedUserData($filter = array()) {
        $tbl='pr_users as u';
        $this->db->select('u.*')
        ->join($tbl, 'u.PR_USER_ID = ulu.PR_LIKED_USER_ID', 'Left');
        $this->db->where('ulu.PR_USER_ID', $filter['EMPLOYEE_ID']);
       $this->db->where('u.PR_USER_ID !=', $filter['EMPLOYEE_ID']);
         $this->db->where('ulu.PR_LIKE_UNLIKE','1');
         $this->db->group_by('u.PR_USER_ID');
        $tbl='users_like_unlike as ulu';
        $query = $this->db->get($tbl);
        //print_r($this->db->last_query());     exit;
        return $query->result();        
    }
    public function getuLikedUserData($filter = array()) {
        $tbl='pr_users as u';
        $this->db->select('u.*')
        ->join($tbl, 'u.PR_USER_ID = ulu.PR_LIKED_USER_ID', 'Left');
       // $this->db->where('ulu.PR_USER_ID', $filter['EMPLOYEE_ID']);

         $this->db->where('ulu.PR_USER_ID', $filter['USER_ID']);
        $this->db->where('ulu.PR_LIKED_USER_ID', $filter['EMPLOYEE_ID']);


         $this->db->where('ulu.PR_LIKE_UNLIKE','2');
          $this->db->group_by('u.PR_USER_ID');
        $tbl='users_like_unlike as ulu';
        $query = $this->db->get($tbl);
       // print_r($this->db->last_query());     exit;
        return $query->result();        
    }
    public function getLikedUserData2($filter = array()) {
        $tbl='pr_users as u';
        $this->db->select('u.*')
        ->join($tbl, 'u.PR_USER_ID = ulu.PR_USER_ID', 'Left');
        $this->db->where('ulu.PR_LIKED_USER_ID', $filter['EMPLOYEE_ID']);
        $this->db->where('u.PR_USER_ID', $filter['EMPLOYEE_ID']);
         $this->db->where('ulu.PR_LIKE_UNLIKE','1');
          $this->db->group_by('u.PR_USER_ID');
        $tbl='users_like_unlike as ulu';
        $query = $this->db->get($tbl);
       // print_r($this->db->last_query());     exit;
        return $query->result();        
    }
     public function getLikedUserData_chk($filter = array()) {
        $tbl='pr_users as u';
        $this->db->select('u.*')
        ->join($tbl, 'u.PR_USER_ID = ulu.PR_USER_ID', 'Left');
        $this->db->where('ulu.PR_USER_ID', $filter['PR_USER_ID']);
        $this->db->where('ulu.PR_LIKED_USER_ID', $filter['PR_LIKED_USER_ID']);
         $this->db->where('ulu.PR_LIKE_UNLIKE','1');
          $this->db->group_by('u.PR_USER_ID');
        $tbl='users_like_unlike as ulu';
        $query = $this->db->get($tbl);
       // print_r($this->db->last_query());     exit;
        return $query->result();        
    }
    public function getLikedUserData3($filter = array()) {
        $tbl='pr_users as u';
        $this->db->select('u.*')
        ->join($tbl, 'u.PR_USER_ID = ulu.PR_USER_ID', 'Left');
        $this->db->where('ulu.PR_USER_ID', $filter['USER_ID']);
        $this->db->where('ulu.PR_LIKED_USER_ID', $filter['EMPLOYEE_ID']);
         $this->db->where('ulu.PR_LIKE_UNLIKE','1');
          $this->db->group_by('u.PR_USER_ID');
        $tbl='users_like_unlike as ulu';
        $query = $this->db->get($tbl);
       //print_r($this->db->last_query());     exit;
        return $query->result();        
    }
    public function getUnLikedUserData($filter = array()) {
        $tbl='users_like_unlike as ulu';
        $this->db->select('u.*')
        ->join($tbl, 'u.PR_USER_ID = ulu.PR_LIKED_USER_ID', 'Left');
        $this->db->where('ulu.PR_USER_ID', $filter['EMPLOYEE_ID']);
         $this->db->where('ulu.PR_LIKE_UNLIKE','0');
          $this->db->group_by('u.PR_USER_ID');
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        return $query->result();        
    }


    public function getGalleryData($filter = array()) {
        
        $this->db->select('*');        
        $this->db->where('PR_USER_ID', $filter['EMPLOYEE_ID']);       
        $tbl='pr_user_images';
        $query = $this->db->get($tbl);
       // echo $this->db->last_query(); exit;
        return $query->result();        
    }

     public function getcategoryList($filter = array()) {
        
        $this->db->select('*');        
          $this->db->where('PARENT_ID','0');      
        $tbl='pr_category';
        $query = $this->db->get($tbl);
       // echo $this->db->last_query(); exit;
        return $query->result();        
    }
    public function getSubcategoryList($category_id) {
        
        $this->db->select('*');   
         $this->db->where('PARENT_ID', $category_id);       
        $tbl='pr_category';
        $query = $this->db->get($tbl);
       // echo $this->db->last_query(); exit;
        return $query->result();        
    }

    public function getUserComplaintList($user_id) {
        
        $this->db->select('c.*,u.PR_NAME as GUILTY_NAME')
        ->join('pr_users as u', 'u.PR_USER_ID = c.GUILTY_ID', 'Left');   
         $this->db->where('c.USER_ID', $user_id);       
        $tbl='pr_complaint as c';
        $query = $this->db->get($tbl);
       // echo $this->db->last_query(); exit;
        return $query->result();        
    }


    public function checkUserOtp($filter = array()) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('u.*');
        $this->db->where('u.PR_PHONE', $filter['PR_PHONE']);
        
        // $this->db->where('u.PR_OTP', $filter['PR_OTP']); 
        // $this->db->where('u.PR_TOKEN', $filter['PR_TOKEN']); 
        
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
       // echo $this->db->last_query(); exit;
        return $query->result();
        
    }
    public function checkUserOtp2($filter = array()) {
        //$tbl=DB_PREFIX.'users as u';
        $this->db->select('u.*');
        $this->db->where('u.PR_TOKEN', $filter['TOKEN']);
        
        // $this->db->where('u.PR_OTP', $filter['PR_OTP']); 
        // $this->db->where('u.PR_TOKEN', $filter['PR_TOKEN']); 
        
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
//echo $this->db->last_query(); exit;
        return $query->result();
        
    }

    public function getUserDataChk($phone) {
        $tbl=DB_PREFIX.'role as r';
        $this->db->select('u.*,r.ROLE_NAME')
        ->join($tbl, 'u.ROLE_ID = r.ROLE_ID', 'Left');
        $this->db->where('u.PHONE', $phone);
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        return $query->result();        
    }
    public function getEmpDataChk($empcode) {
        $designationtbl=DB_PREFIX.'designation as d';
        $comptbl=DB_PREFIX.'company as c';
        $this->db->select('e.*,d.PR_DESIG_NAME,c.PR_COMPANY_ID as PR_COMPANY_CODE,c.PR_COMPANY_NAME')
        ->join($designationtbl, 'd.PR_DESIGNATION_ID = e.PR_DESIGNATION_ID', 'Left')
        ->join($comptbl, 'c.PR_COMPANY_ID = e.PR_COMPANY_ID', 'Left');
        $this->db->where('e.PR_EMPLOYEE_CODE', $empcode);
        $tbl=DB_PREFIX.'employee as e';
        $query = $this->db->get($tbl);
        return $query->result();        
    }
    public function getEmpDetail($filter = array()) {
        $designationtbl=DB_PREFIX.'designation as d';
        $comptbl=DB_PREFIX.'company as c';
        $this->db->select('e.*,d.PR_DESIG_NAME,')
        ->join($designationtbl, 'd.PR_DESIGNATION_ID = e.PR_DESIGNATION_ID', 'Left')
        ->join($comptbl, 'c.PR_COMPANY_ID = e.PR_COMPANY_ID', 'Left');
        $this->db->where('e.PR_EMPLOYEE_CODE',$filter['EMPLOYEE_CODE']);
        $this->db->where('e.PR_PASSWORD',$filter['PASSWORD']);
        $tbl=DB_PREFIX.'employee as e';
        $query = $this->db->get($tbl);
        return $query->row();        
    }
    public function getUserDataa($user_id) {
        $tbl=DB_PREFIX.'role as r';
        $this->db->select('u.*,r.ROLE_NAME')
        ->join($tbl, 'u.ROLE_ID = r.ROLE_ID', 'Left');
        $this->db->where('u.USER_ID', $user_id);
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        return $query->row();
        
    }

    public function getUserDetail($filter = array()) {
        $tbl=DB_PREFIX.'role as r';
        $this->db->select('u.*,r.ROLE_NAME')
        ->join($tbl, 'u.ROLE_ID = r.ROLE_ID', 'Left');
        $this->db->where('u.PHONE',$filter['PHONE']);
        $this->db->where('u.PASSWORD',$filter['PASSWORD']);
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
       // echo $this->db->last_query(); exit;

        return $query->row();
        
    }
     

    public function deleteRow($tableName, $whereData) {
        return $this->db->delete($tableName, $whereData);
    }

    // public function getReatailerList($filter = array()) {
    //     $tbl=DB_PREFIX.'role as r';
    //     $tbl2=DB_PREFIX.'users as uu';
    //     $this->db->select('u.*,r.ROLE_NAME,uu.NAME as ADDED_BY_NAME')
    //     ->join($tbl, 'u.ROLE_ID = r.ROLE_ID', 'Left')
    //     ->join($tbl2, 'u.ADDED_BY =uu.USER_ID', 'Left');
    //     if($filter['USER_ID'])
    //     {
    //         $this->db->where('u.ADDED_BY',$filter['USER_ID']);
    //     }
    //     if($filter['ROLE_ID'])
    //     {
    //         $this->db->where('u.ROLE_ID',$filter['ROLE_ID']);
    //     }
        
    //     if (isset($filter['SEARCH_KRY']) && !empty($filter['SEARCH_KRY'])) 
    //     {
    //         $this->db->like('u.NAME', $filter['SEARCH_KRY']);
    //         $this->db->or_like('u.EMAIL', $filter['SEARCH_KRY']);
    //         $this->db->or_like('u.PHONE', $filter['SEARCH_KRY']);            
    //     }
       
    //     $tbl=DB_PREFIX.'users as u';
    //     $query = $this->db->get($tbl);
    //    // echo $this->db->last_query(); exit;

    //     return $query->result();
        
    // }

    public function getReatailerList($filter = array()) {
        $designationtbl=DB_PREFIX.'designation as d';
        $comptbl=DB_PREFIX.'company as c';
        $this->db->select('e.*,d.PR_DESIG_NAME,c.PR_COMPANY_ID as PR_COMPANY_CODE,c.PR_COMPANY_NAME')
        ->join($designationtbl, 'd.PR_DESIGNATION_ID = e.PR_DESIGNATION_ID', 'Left')
        ->join($comptbl, 'c.PR_COMPANY_ID = e.PR_COMPANY_ID', 'Left');
        $this->db->where('e.ADDED_BY', $filter['EMPLOYEE_ID']);
        $tbl=DB_PREFIX.'employee as e';
        $query = $this->db->get($tbl);
        return $query->result();        
    }
  public function savePaymentRespdata($postData = array()) 
    {       
        //print_r($postData); exit;
        $entry_date = date('Y-m-d');
        // if($postData['txStatus']=="SUCCESS")
        // {

        //  $this->db->query("UPDATE appointments SET PR_STATUS ='Payment Done',PR_PAYMENT='1' where PR_ID='".$postData['order_id']."'");
        // }
        // else
        // {
        //   $this->db->query("UPDATE appointments SET PR_STATUS ='Payment Failed',PR_PAYMENT='0' where PR_ID='".$postData['order_id']."'");
        // }
        $this->db->query("INSERT INTO payment_details 
                                  SET user_id = '" . $postData['user_id'] . "',
                                      booking_id = '".$postData['order_id'] . "',
                                      orderId ='".$postData['orderId'] . "',
                                      orderAmount ='".$postData['orderAmount'] . "',
                                      referenceId ='".$postData['referenceId'] . "',
                                      txStatus ='".$postData['txStatus'] . "',
                                      paymentMode ='".$postData['paymentMode'] . "',                                      
                                      txMsg ='".$postData['txMsg'] . "',
                                      txTime ='".$postData['txTime'] . "',
                                      signature ='".$postData['signature'] . "',                                     
                                      entry_date = '" .  $entry_date . "'
                        ");
        //cho $this->db->last_query(); exit;
        return $this->db->insert_id();
        //echo $this->db->last_query(); exit;
    }

     public function getChatDta($postData = array()) {
       
        $this->db->select('*');
        $this->db->where('PR_SENDER_ID', $postData['EMPLOYEE_ID']);
        $this->db->where('PR_RECIEVER_ID', $postData['RECIEVER_ID']);
        $this->_employee = 'pr_chat';
        $query = $this->db->get($this->_employee);
        //  echo $this->db->last_query(); exit;
        return $query->result();
    }

    // public function getChatUserList($postData = array()) {
    //     $cust_id = $this->session->userdata('currentclient');
    //     $this->db->select('*');
    //     $this->_employee = 'pr_chat';
    //     $query = $this->db->get($this->_employee);
    //     //  echo $this->db->last_query(); exit;
    //     return $query->result();
    // }

       public function insertChatRow($postData = array()) {
       // $mm = json_decode($postData['MESSAGE_DTA']);
      //  foreach ($mm as $row) {


            $this->db->query("INSERT INTO pr_chat SET PR_SENDER_ID = '" . $postData['PR_SENDER_ID'] . "', PR_RECIEVER_ID = '" . $postData['PR_RECIEVER_ID'] . "', PR_MESSAGE = '" . $postData['MESSAGE_DTA'] . "', PR_ENTRY_DATE = '" . $postData['ENTRY_DATE'] . "', PR_MESS_DATETIME = '" . $postData['PR_MESS_DATETIME'] . "'");
            // return $this->db->insert_id();
       // }
        return 'TRUE';
    }

        
  
    
}
