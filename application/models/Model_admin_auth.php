<?php




defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin_auth extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->_tableName = 'pr_employee';
        $this->load->database();
    }
	  public function addRow($tableName, $insertData) {
        $this->db->insert($tableName, $insertData);
        return $this->db->insert_id();
    }

    public function updateRow($tableName, $updateData, $whereData) {
        return $this->db->update($tableName, $updateData, $whereData);
    }

    public function deleteRow($tableName, $whereData) {
        return $this->db->delete($tableName, $whereData);
    }

    public function getUserList($filter = array()) {

        $this->db->select('*');


        if (isset($filter['id']) && is_numeric($filter['id'])) {
            $this->db->where('PR_EMPLOYEE_ID', $filter['id']);
        }
        
         if (isset($filter['email']) && !empty($filter['email'])) {
            $this->db->where('PR_EMAIL', $filter['email']);
        }
        
        if (isset($filter['password']) && !empty($filter['password'])) {
            $this->db->where('PR_PASSWORD', $filter['password']);
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
        $tbl=DB_PREFIX.'role as r';
        $this->db->select('u.*,r.ROLE_NAME,u.PR_DESIGNATION_ID as ROLE_ID')
        ->join($tbl, 'u.PR_DESIGNATION_ID = r.ROLE_ID', 'Left');
        $this->db->where('u.PR_EMAIL', $email);
        $tbl=DB_PREFIX.'employee as u';
        $query = $this->db->get($tbl);
        return $query->row();
        
    }
	
	  public function  updateAdminPassword($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('admin',$data);
		return true;
	}
	
	public function fetchSubAdmin()
	{
		$this->db->select('*');
		$this->db->where('power_type','admin');
		$query=$this->db->get('admin');
		return $query;
	}
	public function fetchSelectedSubAdmin($id)
	{
		$this->db->select('*');
		$this->db->where('power_type','admin');
		$this->db->where('id',$id);
		$query=$this->db->get('admin');
		return $query;
	}

	public function update_admin_permission($id,$postData)
	{
		$this->db->where('id',$id);
		$this->db->update('admin',$postData);
		return true;
	}
	
	public function delete_subadmin($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('admin');
		return true;
	}
	

}
