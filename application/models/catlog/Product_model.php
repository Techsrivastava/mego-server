<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model
{
	function __construct() {
		parent::__construct();
		
	}
	public function index(){
		
	} 
	/* 
		return all category data 
	*/
	public function addRow($tableName, $insertData) 
    {
        $this->db->insert($tableName, $insertData);
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
	
	public function getProductList($postData = array()){
		$this->db->select('p.*,pc.PR_PRODUCT_NAME as pcategory,attr.ATTRIBUTE_NAME,attr.ATTRIBUTE_DESC')	  
		->join('pr_attributes as attr', 'attr.ATTRIBUTE_ID =p.PR_PRODUCT_PACK_TYPE', 'Left')
		->join('product_category as pc', 'pc.PR_PRD_CAT_ID =p.PR_PRD_CAT_ID', 'Left');	
		if(!empty($postData['PRODUCT_ID']))
		{
			$this->db->where('p.PR_PRODUCT_ID',$postData['PRODUCT_ID']);	
		}
		if(!empty($postData['PR_PRD_CAT_ID']))
			{
			 $this->db->where('p.PR_PRD_CAT_ID',$postData['PR_PRD_CAT_ID']);	
			}
		$this->db->order_by("p.PR_PRODUCT_ID", "desc");	
		$this->_prd ='pr_product as p';
        $query = $this->db->get($this->_prd);
        if(!empty($postData['single']))
	    {
	       return $query->row();
	    }
	    else
	    {
	       return $query->result();
	    } 
	}
	public function getcatProductList($postData = array())
	{
		//print_r($postData); exit;
		$this->db->select('pc.*,c.CATEGORY_NAME,s.SUB_CATEGORY_NAME,sc.SUB_SUB_CATEGORY_NAME,b.brand_name')
		 	->join('pr_brand as b', 'b.brand_id =pc.PR_BRAND_ID', 'Left')
		    ->join('pr_category as c', 'c.CATEGORY_ID =pc.PR_CATEGORY_ID', 'Left')

		    ->join('pr_sub_category as s', 's.SUB_CATEGORY_ID =pc.PR_SUB_CATEGORY_ID', 'Left')
		    ->join('pr_sub_sub_category as sc', 'sc.SUB_SUB_CATEGORY_ID =pc.PR_SUB_SUB_CATEGORY_ID', 'Left');		
			if(!empty($postData['PR_PRD_CAT_ID']))
			{
			 $this->db->where('pc.PR_PRD_CAT_ID',$postData['PR_PRD_CAT_ID']);	
			}
			$this->db->order_by("PR_PRD_CAT_ID", "desc");
			$this->_prd ='product_category as pc';
	        $query = $this->db->get($this->_prd);

	        if(!empty($postData['single']))
	        {
	        	//print_r($this->db->last_query());    exit;
	        	return $query->row();
	        }
	        else
	        {
	        	//print_r($this->db->last_query());    exit;
	        return $query->result();
	        }
        
	}
	public function getPrdStockData($prd_id){
		$sql = "select sum(quantity) as stock from warehouse_stock where product_id='".$prd_id."'";		
		$query = $this->db->query($sql);
		//print_r($this->db->last_query());    exit;
		return $query->row();		
	}
	public function getPrdWStockData($postData = array()){
		$sql = "select sum(quantity) as stock from warehouse_stock where product_id='".$postData['product_id']."' and warehouse_id='".$postData['warehouse_id']."'";		
		$query = $this->db->query($sql);
		//print_r($this->db->last_query());    exit;
		return $query->row();		
	}

	public function getPrdWAStockData($postData = array()){
		$sql = "select sum(quantity) as stock from product_attribute where product_id='".$postData['product_id']."' and product_attr_id='".$postData['product_attr_id']."' and product_attr_type_id='".$postData['product_attr_type_id']."'";		
		$query = $this->db->query($sql);
		//print_r($this->db->last_query());    exit;
		return $query->row();		
	}

	public function getWareHouseProduct($warehouse_id) {
		
        $this->db->select('pa.product_id,p.PR_PRODUCT_NAME,p.PR_MRP,p.PR_SP_PRICE,p.PR_PRICE,p.PR_NO_OF_PIECE_PER_CARTON,p.PR_STATUS,pc.PR_PRODUCT_NAME as pcategory')
        ->join('pr_product as p', 'pa.product_id =p.PR_PRODUCT_ID', 'Left')
        ->join('product_category as pc', 'pc.PR_PRD_CAT_ID =pa.product_cat_id', 'Left');	

        $this->db->where('pa.warehouse_id',$warehouse_id);
          $this->db->group_by('pa.product_id'); 
        $this->_prd ='warehouse_stock as pa';
        $query = $this->db->get($this->_prd);
//print_r($this->db->last_query());    exit;
        return $query->result();
       
    }

    public function getAttrProduct($product_id) {
		
        $this->db->select('pa.product_id,p.product_name,p.product_price,p.product_sellprice,p.product_status,a.ATTRIBUTE_DESC,at.ATTRIBUTE_TYPE_NAME,pa.quantity,pa.product_attr_id,pa.product_attr_type_id')
        ->join('pr_attributes as a', 'a.ATTRIBUTE_ID =pa.product_attr_id', 'Left')
        ->join('pr_attributes_type as at', 'at.ATTRIBUTE_TYPE_ID =pa.product_attr_type_id', 'Left')
        ->join('pr_product as p', 'pa.product_id =p.product_id', 'Left');

        $this->db->where('pa.product_id',$product_id);
        $this->db->group_by('pa.product_attr_type_id'); 
        $this->_prd ='product_attribute as pa';
        $query = $this->db->get($this->_prd);
//print_r($this->db->last_query());    exit;
        return $query->result();
       
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
		$tbl=DB_PREFIX.'product';
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
		$tbl=DB_PREFIX.'product';
		$sql = "delete from ".$tbl." where PR_PRODUCT_ID ='".$id."'";
		if($this->db->query($sql))
		{	
		
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function deleteCatPrd($id){	
		$tbl='product_category';
		$sql = "delete from ".$tbl." where PR_PRD_CAT_ID ='".$id."'";
		if($this->db->query($sql))
		{	
		
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}
?>