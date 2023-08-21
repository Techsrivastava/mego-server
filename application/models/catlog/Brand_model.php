<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brand_model extends CI_Model
{
	function __construct() {
		parent::__construct();
		
	}
	public function index(){
		
	} 
	/* 
		return all category data 
	*/
	public function getBrand($postData = array()){
		$sql = "select * from pr_brand";		
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
			$tbl=DB_PREFIX.'brand';
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
		$tbl=DB_PREFIX.'brand';
		$sql = "update ".$tbl." set brand_date_modified='".$data["brand_date_modified"]."'";
		if(isset($data["brand_name"]))
		{
		$sql.=",brand_name='".$data["brand_name"]."'";	
		}
		if(isset($data["brand_status"]))
		{
		$sql.=",brand_status='".$data["brand_status"]."'";	
		}
		if(isset($data["brand_desc"]))
		{
		$sql.=",brand_desc='".$data["brand_desc"]."'";	
		}
		if(isset($data["brand_logo"]))
		{
		$sql.=",brand_logo='".$data["brand_logo"]."'";	
		}
		
		

		$sql.="where brand_id='".$id."'";	
	
		
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
		$tbl=DB_PREFIX.'brand';
		$sql = "delete from ".$tbl." where brand_id ='".$id."'";
		if($this->db->query($sql))
		{	
		
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function getData($filter = array()) {
		$jdb=DB_PREFIX.'brand';
        $this->db->select('*');
       
        if (isset($filter['brand_id'])) {
            $this->db->where('brand_id', $filter['brand_id']);
        }      

        if (isset($filter['offset']) && isset($filter['limit'])) {
            $this->db->limit($filter['limit'], $filter['offset']);
        }
        $this->_brand =DB_PREFIX.'brand';
        $query = $this->db->get($this->_brand);

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