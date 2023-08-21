<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model
{
	function __construct() {
		parent::__construct();
		
	}
	public function index(){
		
	} 
	/* 
		return all category data 
	*/
	public function getCategory($postData = array()){
		$sql = "select * from pr_category";		
		if($query = $this->db->query($sql))
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	/* 
		return max id from category table 
	*/
	public function getMaxId(){
		$id =  $this->db->select_max('category_id')->get('category')->row()->category_id;
		if($id==null){
            $category_code = 'CAT-'.sprintf('%06d',intval(1));
        }
        else{
            $category_code = 'CAT-'.sprintf('%06d',intval($id)+1); 
        }
        return $category_code;
	}
	/* 
		insert new categoty record in Database 
	*/
	public function addModel($data){
		/*$sql = "insert into category (category_code,category_name) values(?,?)";
		if($this->db->query($sql,$data)){*/
		$tbl=DB_PREFIX.'category';
		if($this->db->insert($tbl,$data)){
			return  $this->db->insert_id();
		}
		else{
			return FALSE;
		}
	}
	/* 
		return selected id record use in edit page 
	*/
	public function getRecord($id){
		$sql = "select * from category where category_id = ?";
		if($query = $this->db->query($sql,array($id))){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	/* 
		this function is used to save edited record in database 
	*/
	public function editModel($data,$id){
		//echo $id; exit;
		$tbl=DB_PREFIX.'category';
		$sql = "update ".$tbl." set CATEGORY_UPDATED_AT='".$data["CATEGORY_UPDATED_AT"]."'";
		if(isset($data["CATEGORY_NAME"]))
		{
		$sql.=",CATEGORY_NAME='".$data["CATEGORY_NAME"]."'";	
		}
		if(isset($data["CATEGORY_STATUS"]))
		{
		$sql.=",CATEGORY_STATUS='".$data["CATEGORY_STATUS"]."'";	
		}
		if(isset($data["CATEGORY_DESCRIPTION"]))
		{
		$sql.=",CATEGORY_DESCRIPTION='".$data["CATEGORY_DESCRIPTION"]."'";	
		}
		if(isset($data["CATEGORY_IMAGE"]))
		{
		$sql.=",CATEGORY_IMAGE='".$data["CATEGORY_IMAGE"]."'";	
		}
		if(isset($data["CATEGORY_ICON"]))
		{
		$sql.=",CATEGORY_ICON='".$data["CATEGORY_ICON"]."'";	
		}
		if(isset($data["CATEGORY_SORT_ORDER"]))
		{
		$sql.=",CATEGORY_SORT_ORDER='".$data["CATEGORY_SORT_ORDER"]."'";	
		}
		

		$sql.="where CATEGORY_ID='".$id."'";	
	
		
		if($this->db->query($sql)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	/* 
		this function delete category from database  
	*/
	public function deleteModel($id){	
		$tbl=DB_PREFIX.'category';
		$sql = "delete from ".$tbl." where CATEGORY_ID ='".$id."'";
		if($this->db->query($sql))
		{	
		
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function getData($filter = array()) {
//print_r($filter); exit;
        $this->db->select('*');


        if (isset($filter['CATEGORY_ID'])) {
            $this->db->where('CATEGORY_ID', $filter['CATEGORY_ID']);
        }
        
         if (isset($filter['CATEGORY_NAME']) && !empty($filter['CATEGORY_NAME'])) {
            $this->db->where('CATEGORY_NAME', $filter['CATEGORY_NAME']);
        }
        
    
        
        if (isset($filter['CATEGORY_STATUS']) && is_numeric($filter['CATEGORY_STATUS'])) {
            $this->db->where('CATEGORY_STATUS', $filter['CATEGORY_STATUS']);
        }

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->_category =DB_PREFIX.'category';
        $query = $this->db->get($this->_category);

        if (isset($filter['count']) && $filter['count']) {
            return $query->num_rows();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        //return $query->result();
    }
}
?>