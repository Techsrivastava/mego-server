<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SubSubCategory_model extends CI_Model
{
	function __construct() {
		parent::__construct();
		
	}
	public function index(){
		
	} 
	/* 
		return all category data 
	*/
	public function getSubSubCategory($postData = array()){
		$sql = "select * from pr_sub_sub_category";		
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
		$tbl=DB_PREFIX.'sub_sub_category';
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
		$tbl=DB_PREFIX.'sub_sub_category';
		$sql = "update ".$tbl." set SUB_SUB_CATEGORY_UPDATED_AT='".$data["SUB_SUB_CATEGORY_UPDATED_AT"]."'";
		if(isset($data["SUB_SUB_CATEGORY_NAME"]))
		{
		$sql.=",SUB_SUB_CATEGORY_NAME='".$data["SUB_SUB_CATEGORY_NAME"]."'";	
		}
		if(isset($data["SUB_SUB_CATEGORY_STATUS"]))
		{
		$sql.=",SUB_SUB_CATEGORY_STATUS='".$data["SUB_SUB_CATEGORY_STATUS"]."'";	
		}
		if(isset($data["SUB_SUB_CATEGORY_DESC"]))
		{
		$sql.=",SUB_SUB_CATEGORY_DESC='".$data["SUB_SUB_CATEGORY_DESC"]."'";	
		}
		if(isset($data["SUB_SUB_CATEGORY_IMAGE"]))
		{
		$sql.=",SUB_SUB_CATEGORY_IMAGE='".$data["SUB_SUB_CATEGORY_IMAGE"]."'";	
		}
		if(isset($data["SUB_SUB_CATEGORY_ICON"]))
		{
		$sql.=",SUB_SUB_CATEGORY_ICON='".$data["SUB_SUB_CATEGORY_ICON"]."'";	
		}
		if(isset($data["SUB_SUB_CATEGORY_SORT_ORDER"]))
		{
		$sql.=",SUB_SUB_CATEGORY_SORT_ORDER='".$data["SUB_SUB_CATEGORY_SORT_ORDER"]."'";	
		}
		if(isset($data["CATEGORY_ID"]))
		{
		$sql.=",CATEGORY_ID='".$data["CATEGORY_ID"]."'";	
		}
		if(isset($data["SUB_CATEGORY_ID"]))
		{
		$sql.=",SUB_CATEGORY_ID='".$data["SUB_CATEGORY_ID"]."'";	
		}
		

		$sql.="where SUB_SUB_CATEGORY_ID='".$id."'";	
	
		
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
		$tbl=DB_PREFIX.'sub_sub_category';
		$sql = "delete from ".$tbl." where SUB_SUB_CATEGORY_ID ='".$id."'";
		if($this->db->query($sql))
		{	
		
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function getData($filter = array()) {
		$jdb=DB_PREFIX.'category as c';
		$jdb2=DB_PREFIX.'sub_category as scc';
        $this->db->select('sc.*,c.CATEGORY_NAME')
        ->join($jdb, 'c.CATEGORY_ID = sc.CATEGORY_ID', 'Left');


        if (isset($filter['SUB_SUB_CATEGORY_ID'])) {
            $this->db->where('sc.SUB_SUB_CATEGORY_ID', $filter['SUB_SUB_CATEGORY_ID']);
        }      

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->_subcategory =DB_PREFIX.'sub_sub_category as sc';
        $query = $this->db->get($this->_subcategory);

        if (isset($filter['count']) && $filter['count']) {
           return $query->result();
        }

        if (isset($filter['single']) && $filter['single']) {
            return $query->row();
        }

        //return $query->result();
    }
}
?>