<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->database();
    }

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
    public function getDistributorOrderList($postData = array()){
        $empid=$this->session->userdata['sampark_session']['USER_ID'];
        $this->db->select('do.*,e.PR_NAME')       
        ->join('pr_employee as e', 'do.DISTRIBUTOR_ID =e.PR_EMPLOYEE_ID', 'Left');      
        if($this->session->userdata['sampark_session']['ROLE_ID']=='1' || $this->session->userdata['sampark_session']['ROLE_ID']=='9'  || $this->session->userdata['sampark_session']['ROLE_ID']=='15')
        {

        }
        
        else
        {
            $this->db->where('do.DISTRIBUTOR_ID', $empid);
        }
        if($postData['ORDER_ID'])
        {
             $this->db->where('do.DISTRIBUTOR_ORDER_ID',$postData['ORDER_ID']);
        }

        $this->db->order_by("do.DISTRIBUTOR_ORDER_ID", "desc"); 
        $this->_prd ='pr_distributor_order as do';
        $query = $this->db->get($this->_prd);
         if($postData['COUNT']=='single')
        {
        return $query->row();
        }
        else
        {
            return $query->result();
        }
         
    }

     public function getDistributorOrderData($postData = array()){
        $empid=$this->session->userdata['sampark_session']['USER_ID'];
        $this->db->select('do.*,e.PR_NAME,e.PR_PHONE,e.PR_GST_NO,e.PR_PRESENT_ADDRESS')       
        ->join('pr_employee as e', 'do.DISTRIBUTOR_ID =e.PR_EMPLOYEE_ID', 'Left');      
        
             $this->db->where('do.DISTRIBUTOR_ORDER_ID',$postData['ORDER_ID']);
        
        $this->db->order_by("do.DISTRIBUTOR_ORDER_ID", "desc"); 
        $this->_prd ='pr_distributor_order as do';
        $query = $this->db->get($this->_prd);
       
        return $query->row();

         
    }



     public function getStockList($postData = array()){
        $empid=$this->session->userdata['sampark_session']['USER_ID'];
        $this->db->select('do.*,e.PR_NAME,p.PR_PRODUCT_NAME,pc.PR_PRODUCT_NAME as PR_PRODUCT_CATEGORY_NAME,dot.PRICE,dot.QUANTITY,p.PR_NO_OF_PIECE_PER_CARTON')       
        ->join('pr_employee as e', 'do.DISTRIBUTOR_ID =e.PR_EMPLOYEE_ID', 'Left') 
        ->join('pr_distributor_order_trans as dot', 'dot.ORDER_ID =do.DISTRIBUTOR_ORDER_ID', 'Left')
        ->join('product_category as pc', 'pc.PR_PRD_CAT_ID =dot.PRODUCT_CAT_ID', 'Left')
        ->join('pr_product as p', 'p.PR_PRODUCT_ID =dot.PRODUCT_ID', 'Left');  

        $this->db->where('do.ORDER_STATUS','4');

        $this->db->order_by("do.DISTRIBUTOR_ORDER_ID", "desc"); 
        $this->_prd ='pr_distributor_order as do';
        $query = $this->db->get($this->_prd);
        return $query->result();
         
    }



 public function getFosStockList($postData = array()){
        $empid=$this->session->userdata['sampark_session']['USER_ID'];
        $this->db->select('fs.*,p.PR_PRODUCT_NAME,pc.PR_PRODUCT_NAME as PR_PRODUCT_CATEGORY_NAME,p.PR_PRICE')   
        ->join('product_category as pc', 'pc.PR_PRD_CAT_ID =fs.product_cat_id', 'Left')
        ->join('pr_product as p', 'p.PR_PRODUCT_ID =fs.product_id', 'Left');  
        $this->db->where('fs.fos_id',$postData['empid']);
        $this->_prd ='fos_stock as fs';
        $query = $this->db->get($this->_prd);
        return $query->result();
         
    }
    public function getOrderProduct($order_id){
        $this->db->select('do.*,p.PR_PRODUCT_NAME,pc.PR_PRODUCT_NAME as PR_PRODUCT_CATEGORY_NAME')       
        ->join('product_category as pc', 'pc.PR_PRD_CAT_ID =do.PRODUCT_CAT_ID', 'Left')
         ->join('pr_product as p', 'p.PR_PRODUCT_ID =do.PRODUCT_ID', 'Left');         
        $this->db->where('do.ORDER_ID',$order_id);
        $this->_prd ='pr_distributor_order_trans as do';
        $query = $this->db->get($this->_prd);
        return $query->result();
         
    }


     public function getRetailerOrderProducts($order_id){
        $this->db->select('do.*,p.PR_PRODUCT_NAME,pc.PR_PRODUCT_NAME as PR_PRODUCT_CATEGORY_NAME')       
        ->join('product_category as pc', 'pc.PR_PRD_CAT_ID =do.PRODUCT_CAT_ID', 'Left')
         ->join('pr_product as p', 'p.PR_PRODUCT_ID =do.PRODUCT_ID', 'Left');         
        $this->db->where('do.ORDER_ID',$order_id);
        $this->_prd ='pr_retailer_order_trans as do';
        $query = $this->db->get($this->_prd);
        return $query->result();
         
    }

    public function getOrderPaymentDetail($order_id){
        $this->db->select('*');     
        $this->db->where('ORDER_ID',$order_id);
        $this->_prd ='pr_distributor_order_payment_trans';
        $query = $this->db->get($this->_prd);
        return $query->result();
         
    }



     public function gettotalOrders()
    {
        $user_id=$this->session->userdata['sampark_session']['USER_ID'];
        $tbl=DB_PREFIX.'distributor_order';
        $this->db->select('count(*) as totalorder'); 
        $this->db->where('DISTRIBUTOR_ID',$user_id);
        $this->_ordertbl=$tbl;
        $query = $this->db->get($this->_ordertbl);
        return $query->row();        
    }

      public function getAppliedtotalAlFos()
    {
        $tbl=DB_PREFIX.'employee';
        $sql = "select count(*) as totalemp from ".$tbl." where PR_EMPLOYEE_STATUS!='1' and PR_EMPLOYEE_STATUS='1' and PR_DESIGNATION_ID='12'";     
        $query = $this->db->query($sql);
        return $query->row();
        
    }

    public function updateOrderAmount($postData = array())
    {
        $tbl=DB_PREFIX.'distributor_order';
        $tbl2=DB_PREFIX.'distributor_order_payment_trans';
        $sql = "update ".$tbl." set AMOUNT=AMOUNT+".$postData['AMOUNT']." where DISTRIBUTOR_ORDER_ID=".$postData['ORDER_ID'];     
      // echo $sql; exit;
        $query = $this->db->query($sql);

        $sql2 = "update ".$tbl2." set STATUS='1' where D_ORDER_PAY_TRANS_ID=".$postData['OSTATUS'];     
      // echo $sql; exit;
        $query2 = $this->db->query($sql2);

        return TRUE;
        
    }



    public function getRetailerOrderList($postData = array()){
        $empid=$this->session->userdata['sampark_session']['USER_ID'];
        $this->db->select('do.*,e.PR_NAME')       
        ->join('pr_employee as e', 'do.RETAILER_ID =e.PR_EMPLOYEE_ID', 'Left');      
        if($this->session->userdata['sampark_session']['ROLE_ID']=='1' || $this->session->userdata['sampark_session']['ROLE_ID']=='9'  || $this->session->userdata['sampark_session']['ROLE_ID']=='15' || $this->session->userdata['sampark_session']['ROLE_ID']=='11')
        {

        }
        
        else
        {
            $this->db->where('do.EMPLOYEE_ID', $empid);
        }
        if($postData['ORDER_ID'])
        {
             $this->db->where('do.RETAILER_ORDER_ID',$postData['ORDER_ID']);
        }

        $this->db->order_by("do.RETAILER_ORDER_ID", "desc"); 
        $this->_prd ='pr_retailer_order as do';
        $query = $this->db->get($this->_prd);
        if($postData['COUNT']=='single')
        {
        return $query->row();
        }
        else
        {
            return $query->result();
        }
         
    }


    public function getRetailerOrderData($order_id){
        $empid=$this->session->userdata['sampark_session']['USER_ID'];
        $this->db->select('do.*,e.PR_NAME,e.PR_PHONE,e.PR_PRESENT_ADDRESS,e.PR_GST_NO')       
        ->join('pr_employee as e', 'do.RETAILER_ID =e.PR_EMPLOYEE_ID', 'Left');      
       
        $this->db->where('do.RETAILER_ORDER_ID',$order_id);
        $this->_prd ='pr_retailer_order as do';
        $query = $this->db->get($this->_prd);        
        return $query->row();
       
         
    }


}
 