<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->_tableName = 'admin';
        $this->load->database();
    }
    
    public function getUserMenuData($filter = array()) 
    {
        $role_id=$this->session->userdata['user_session']['ROLE_ID'];
        $user_id=$this->session->userdata['user_session']['USER_ID'];
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
        $this->db->where('me.IS_VIEW',$filter['IS_VIEW']);
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
        $this->db->where('me.IS_VIEW', 'w');
        $this->db->where('me.MENU_STATUS', '1');
        $this->db->order_by("me.SORTORDER", "asc");
        $this->_Menu =DB_PREFIX.'menu_permission';
        $query = $this->db->get($this->_Menu . ' pm');
        return $query->result(); 
        }
    }
     public function getAppMenuData($filter = array()) 
    {
        
        $filter['PARENT_ID'] = '0';
        $this->db->select('me.*');    
        
        $this->db->where('me.IS_VIEW', 'm');
        $this->db->where('me.MENU_STATUS', '1');
        $this->db->where('me.MENU_PARENT_ID','0');
        $this->db->group_by('me.MENU_ID');
        $this->db->order_by("me.SORTORDER", "asc");
        $this->_Menu =DB_PREFIX.'menu';
        $query = $this->db->get($this->_Menu . ' me');
        //echo $this->db->last_query(); exit;
        return $query->result(); 
        
    }
    public function getUserSubMenuData($filter = array()) 
    {
        $role_id=$this->session->userdata['user_session']['ROLE_ID'];
        $user_id=$this->session->userdata['user_session']['USER_ID'];
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
     public function getAppSubMenuData($filter = array()) 
    {
        
        $this->db->select('m.*');
        if (isset($filter['PARENT_ID']) && is_numeric($filter['PARENT_ID'])) {
            $this->db->where('m.MENU_PARENT_ID', $filter['PARENT_ID']);
        }
        $this->db->where('m.MENU_STATUS', '1');
        $this->db->order_by("m.SORTORDER", "asc");
        $this->db->group_by('m.MENU_ID');
        $this->_Menu =DB_PREFIX.'menu';
        $query = $this->db->get($this->_Menu . ' m');
        return $query->result();
       

    }

    public function getUserData($email) {
        $tbl=DB_PREFIX.'role as r';
        $this->db->select('u.*,r.ROLE_NAME')
        ->join($tbl, 'u.ROLE_ID = r.ROLE_ID', 'Left');
        $this->db->where('u.EMAIL', $email);
        $tbl=DB_PREFIX.'users as u';
        $query = $this->db->get($tbl);
        return $query->row();
        
    }

    public function getParentMenu() {
       
        $this->db->select('*');        
        $this->db->where('MENU_PARENT_ID','0');
        $tbl=DB_PREFIX.'menu';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }

     public function getappMenu() {
        $tbl=DB_PREFIX.'menu as m';
        $this->db->select('sm.*,m.MENU_NAME')
        ->join($tbl, 'sm.MENU_ID =m.MENU_ID', 'Left');
        $this->db->where('sm.IS_VIEW','m');

        $tbl=DB_PREFIX.'menu as sm';
        $query = $this->db->get($tbl);
        return $query->result();
        
    }
        
    // public function getColors()
    // {
    //     $colorData = $this->db->order_by('color_name')->get_where('color_master',['status'=>1])->result();

    //     return $colorData;
    // }
    
}
