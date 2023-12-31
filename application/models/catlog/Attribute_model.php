<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attribute_model extends CI_Model
{
	function __construct() {
		parent::__construct();
		
	}
	public function index(){
		
	} 
	/* 
		return all category data 
	*/
	public function getAttribute($postData = array()){
		$sql = "select * from pr_attributes";		
		if($query = $this->db->query($sql))
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function getAttributeType($attr_id){
		$sql = "select * from pr_attributes_type where ATTRIBUTE_ID='".$attr_id."'";		
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
		if($this->db->insert('attributes',$data)){
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
		$sql = "update category set category_name = ? where category_id = ?";
		if($this->db->query($sql,array($data,$id))){
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
		/*$sql = "delete from category where category_id = ?";
		if($this->db->query($sql,array($id))){*/
		$this->db->where('category_id',$id);
		if($this->db->update('category',array('delete_status'=>1))){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function addRow($tableName, $insertData) 
    {
        $this->db->insert($tableName, $insertData);
        return $this->db->insert_id();
    }
}
?>