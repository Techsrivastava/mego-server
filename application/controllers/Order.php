<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller 
{

   public function __construct() 
   {
        parent::__construct();
		$this->load->helper('url'); 
		$this->load->database(); 
		$this->load->library('session');        
		$this->load->model('Model_admin_auth');
		$this->load->model('Model_admin');
        $this->load->model('catlog/Brand_model');
        $this->load->model('catlog/category_model');
        $this->load->model('catlog/subcategory_model');
        $this->load->model('catlog/subsubcategory_model');
		$this->load->model('organization/Organization_model');
        $this->load->model('Order_model');
          $this->load->model('catlog/Attribute_model');
        $this->load->model('catlog/Product_model');
		// if (empty($this->session->userdata('sampark_session'))) {
		//   redirect(site_url('admin'));
		// }
		$this->_admin = $this->session->userdata('sampark_session');
       
    }
    public function order() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
         {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['orderscount'] = $this->Order_model->gettotalOrders();

        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/order');
        $this->load->view('template/admin_footer');
    }
    public function order_list() 
    {
        error_reporting(0);
        // if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        // {
        //         redirect(site_url('admin/admin_login_auth'));
        // } 
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['orderList'] = $this->Order_model->getDistributorOrderList();  
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/orderList');
        $this->load->view('template/admin_footer');
    }


    public function retailerOrder_list() 
    {
        error_reporting(0);
        // if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        // {
        //         redirect(site_url('admin/admin_login_auth'));
        // } 
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['orderList'] = $this->Order_model->getRetailerOrderList();  
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/retailerorderList');
        $this->load->view('template/admin_footer');
    }



    public function retailerOrderInvoice() 
    {
        error_reporting(0);
        // if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        // {
        //         redirect(site_url('admin/admin_login_auth'));
        // } 
        $order_id=$this->uri->segment(3);
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['orderData'] = $this->Order_model->getRetailerOrderData($order_id);  
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/invoice');
        $this->load->view('template/admin_footer');
    }

     public function distributorOrderInvoice() 
    {
        error_reporting(0);
        // if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        // {
        //         redirect(site_url('admin/admin_login_auth'));
        // } 
        $order_id=$this->uri->segment(3);
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['orderData'] = $this->Order_model->getDistributorOrderData($order_id);  
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/distributorinvoice');
        $this->load->view('template/admin_footer');
    }


    public function stock_list() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['stockList'] = $this->Order_model->getStockList();  
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/stockList');
        $this->load->view('template/admin_footer');
    }

     public function fos_stock_list() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $emp_id=$_REQUEST['empid'];
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['stockList'] = $this->Order_model->getFosStockList(array('empid'=>$emp_id));  
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/fosstockList');
        $this->load->view('template/admin_footer');
    }
     public function order_form() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['catproductList'] = $this->Product_model->getcatProductList();    
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/orderForm');
        $this->load->view('template/admin_footer');
    }


    public function retailer_order_form() 
    {
        error_reporting(0);
        
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
        $user_id=$this->session->userdata['sampark_session']['USER_ID'];    
        $data['retailerList'] = $this->Organization_model->getRetailerrData(array('count'=>'all','PR_REPORTING_MANAGER'=>$user_id));  
        $data['catproductList'] = $this->Product_model->getcatProductList();    
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/retailerOrderForm');
        $this->load->view('template/admin_footer');
    }





    public function retailer() 
    {
        error_reporting(0);
        // if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        // {
        //         redirect(site_url('admin/admin_login_auth'));
        // }
        $data['title'] = 'EmpRetailerloyee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['retailerList'] = $this->Product_model->getRetailerList();    
        $this->load->view('template/admin_header',$data); 
        $this->load->view('order/retailer');
        $this->load->view('template/admin_footer');
    }


    public function addOrderForm()
    {
            
            $cur_date=date('Y-m-d h:i:s');
            $user_id=$this->session->userdata['sampark_session']['USER_ID'];
            $prd_category=$this->input->post('prd_category');
            $product_packs=$this->input->post('product_packs');
            $product_qty= $this->input->post('product_qty'); 
            $no_of_piecesCOunt= $this->input->post('no_of_piecesCOunt'); 
            $pprice= $this->input->post('pprice');  
            $subprice= $this->input->post('subprice');    
            
            $dcount=COUNT($this->input->post('prd_category')); 

            $edata=array('DISTRIBUTOR_ID'=>$user_id,'TOTAL'=>'','ORDER_DATE'=>$cur_date,'ORDER_STATUS'=>'1','CREATE_DATE'=>$cur_date);
            $order_id=$this->Order_model->addRow('pr_distributor_order',$edata);

            $spp="";

            for ($i=0; $i < $dcount; $i++) 
            {
                $spp=$spp+$subprice[$i];
                $data=array('ORDER_ID'=>$order_id,'PRODUCT_CAT_ID'=>$prd_category[$i],'PRODUCT_ID'=>$product_packs[$i],'PRICE'=>$pprice[$i],'QUANTITY'=>$product_qty[$i],'STATUS'=>'1','CRAETED_AT'=>$cur_date);

                $this->Order_model->addRow('pr_distributor_order_trans',$data);
               
             
            }

            $spp=$spp*18/100+$spp;
            $this->Order_model->updateRow('pr_distributor_order',array('TOTAL'=>$spp),array('DISTRIBUTOR_ORDER_ID'=>$order_id));

            $_SESSION['msg'] = "Ordered Added Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("order/order_list?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        
            
        
    }
    public function getOrderedPaymentDoneData()
    {
      $order_id=$_REQUEST['order_id'];//exit;
       $orderPrdData = $this->Order_model->getDistributorOrderList(array('ORDER_ID'=>$order_id,'COUNT'=>'single'));
       echo  json_encode($orderPrdData);
      }

      public function financeupdatests()
    {
      $order_id=$this->uri->segment(3);
      $tbl=DB_PREFIX.'distributor_order';
      $this->Order_model->updateRow($tbl,array('ORDER_STATUS'=>'4'),array('DISTRIBUTOR_ORDER_ID'=>$order_id));
              $_SESSION['msg'] = "Order Approved Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("order/order_list?token=".$this->session->userdata['sampark_session']['token'],'refresh');
      }

      public function approveOrder()
    {
      $order_id=$this->uri->segment(3);
      $tbl=DB_PREFIX.'distributor_order';
      $this->Order_model->updateRow($tbl,array('ORDER_STATUS'=>'2'),array('DISTRIBUTOR_ORDER_ID'=>$order_id));
              $_SESSION['msg'] = "Order Approved Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("order/order_list?token=".$this->session->userdata['sampark_session']['token'],'refresh');
      }


      public function updateOrderAmount()
    {
      $order_id=$this->uri->segment(3);
      $amnt=$this->uri->segment(4);
      $doid=$this->uri->segment(5);
      $tbl=DB_PREFIX.'distributor_order';
      //$this->Order_model->updateRow($tbl,array('ORDER_STATUS'=>'4'),array('DISTRIBUTOR_ORDER_ID'=>$order_id));

      $data=array('ORDER_ID'=>$order_id,'AMOUNT'=>$amnt,'OSTATUS'=>$doid);

      $this->Order_model->updateOrderAmount($data);

              $_SESSION['msg'] = "Payment Approved Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("order/order_list?token=".$this->session->userdata['sampark_session']['token'],'refresh');
      }


      public function getOrderedPrdData()
    {
        $order_id=$_REQUEST['order_id'];//exit;
        $orderPrdData = $this->Order_model->getOrderProduct($order_id);
        $output='';
        $i=1;
        $subtotl="";
        foreach ($orderPrdData as $prow) 
        {  
            $subtotl=$subtotl+$prow->PRICE*$prow->QUANTITY;
           
                $output.='<tr>';
                $output.=' <td>'.$i.'</td>';
                $output.=' <td>'.$prow->PR_PRODUCT_CATEGORY_NAME.'</td>';
                $output.=' <td>PRD-'.$prow->PR_PRODUCT_NAME.'</td>';
                $output.=' <td>'.$prow->QUANTITY.'</td>';               
                 $output.=' <td>Rs. '.$prow->PRICE.'</td>';
                $output.=' <td>Rs. '.$prow->PRICE*$prow->QUANTITY.'</td>';                
                $output.=' </tr>';
        $i++; }

        $gst=$subtotl*18/100;

        $totalamnt=$subtotl+$gst;

        $output.='<tr>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td style="color:#001848;">SUB TOTAL</td>';
        $output.=' <td>Rs. '.round($subtotl,2).'</td>';
        $output.=' </tr>';
        $output.='<tr>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td style="color:#001848;">GST (18 %)</td>';
        $output.=' <td>Rs. '.round($gst,2).'</td>';
        $output.=' </tr>';
        $output.='<tr>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td style="color:#001848;">TOTAL AMOUNT</td>';
        $output.=' <td>Rs. '.round($totalamnt,2).'</td>';
        $output.=' </tr>';

       
    echo $output;
    }  



 public function getOrderedPaymentData()
    {
        $order_id=$_REQUEST['order_id'];//exit;
        $orderPaymentData = $this->Order_model->getOrderPaymentDetail($order_id);
        $output='';
        $i=1;
        $subtotl="";
        foreach ($orderPaymentData as $prow) 
        {  
            $subtotl=$subtotl+$prow->AMOUNT;
           
                $output.='<tr>';
                $output.=' <td>'.$i.'</td>';
                $output.=' <td>'.$prow->RTGS.'</td>';
               
                $output.=' <td>'.$prow->BANK_NAME.'</td>';               
                $output.=' <td>'.$prow->DATE_OF_PAYMENT.'</td>'; 
                $output.=' <td>Rs. '.$prow->AMOUNT.'</td>';   
                if($prow->STATUS=='0') 
                {
                $output.=' <td><a href="updateOrderAmount/'.$prow->ORDER_ID.'/'.$prow->AMOUNT.'/'.$prow->D_ORDER_PAY_TRANS_ID.'"><button class="btn"><i class="fa fa-check-circle"></i> Approve</button></a></td>';  
                }
                else{
                    $output.='<td></td>';
                }                     
                $output.=' </tr>';
        $i++; }

        $output.='<tr>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
       
        $output.=' <td style="color:#001848;">TOTAL</td>';
        $output.=' <td>Rs. '.round($subtotl,2).'</td>';
        $output.=' </tr>';
        

       
    echo $output;
    }  





    public function addOrderPaymentDetail()
    {
        $cur_date=date('Y-m-d h:i:s');
        $order_id=$this->input->post('paymenorderid');
        $data = array(
            "ORDER_ID"=>$order_id,
            "RTGS"=>$this->input->post('rtgs'),                    
            "BANK_NAME"=>$this->input->post('bank_name'),
            "DATE_OF_PAYMENT"=>$this->input->post('dateofpayment'),
            "AMOUNT"=>$this->input->post('amount'),        
            "STATUS"=>"0",           
            "ENTRY_AT"=>$cur_date 
        );
        $edata=array(
            
            "ORDER_STATUS"=>'3'
        );



        $tbl=DB_PREFIX.'distributor_order_payment_trans';
        $tbl2=DB_PREFIX.'distributor_order';
        $this->Order_model->updateRow($tbl2,$edata,array('DISTRIBUTOR_ORDER_ID'=>$order_id));
        if($id =$this->Order_model->addRow($tbl,$data)){
            $_SESSION['msg'] = "Payment Added Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("order/order_list?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } 
        else
        {
            $_SESSION['msg'] = "Order Payment Not Added , Please try again";
            $_SESSION['msgtype'] ="error";          
            redirect("order/order_list?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }

    public function fosStock_allocate() 
    {
            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            //$data['pcategoryList'] = $this->Product_model->getProductList();
            $cattbl=DB_PREFIX.'category';
            $btbl=DB_PREFIX.'brand';
            $data['categoryModalList'] = $this->db->get_where($cattbl,array('STATUS',1))->result();
            $data['brandsList'] = $this->db->get_where($btbl,array('STATUS',1))->result();
           // $data['getColors'] = $this->Model_admin->getColors(); 
             
            $data['attributeList'] = $this->Attribute_model->getAttribute();      
            $data['productList'] = $this->Product_model->getcatProductList();  
            $this->load->view('template/admin_header',$data);
            $this->load->view('order/fosstockAllocate');
            $this->load->view('template/admin_footer');
    }

     public function addFosProduct()
    {
            
            
            $user_id=$this->session->userdata['sampark_session']['USER_ID'];
            $fos_id=$this->input->post('fos_id');
            $product_id=$this->input->post('product_id');
            $product_packs= $this->input->post('product_packs'); 
            $product_qty= $this->input->post('product_qty'); 
            $no_of_piecesCOunt= $this->input->post('no_of_piecesCOunt');    
            
            $dcount=COUNT($this->input->post('product_id')); 

            for ($i=0; $i < $dcount; $i++) 
            {
                $data=array('fos_id'=>$fos_id,'product_cat_id'=>$product_id[$i],'product_id'=>$product_packs[$i],'quantity'=>$product_qty[$i],'no_of_pieces'=>$no_of_piecesCOunt[$i],'status'=>'1','user_id'=>$user_id);

                $this->Product_model->addRow('fos_stock',$data);
               
             
            }
            $_SESSION['msg'] = "Fos Product Allocated Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("organization/fosList?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        
            
        
    }


     public function addRetailerOrderForm()
    {
            
            $cur_date=date('Y-m-d h:i:s');
            $user_id=$this->session->userdata['sampark_session']['USER_ID'];
            $retailerid=$this->input->post('retailerid');
            $prd_category=$this->input->post('prd_category');
            $product_packs=$this->input->post('product_packs');
            $product_qty= $this->input->post('product_qty'); 
         //  $no_of_piecesCOunt= $this->input->post('no_of_piecesCOunt'); 
            $pprice= $this->input->post('pprice');  
            $subprice= $this->input->post('subprice');    
            
            $dcount=COUNT($this->input->post('prd_category')); 

            $edata=array('EMPLOYEE_ID'=>$user_id,'RETAILER_ID'=>$retailerid,'TOTAL'=>'','ORDER_DATE'=>$cur_date,'ORDER_STATUS'=>'1','CREATE_DATE'=>$cur_date);
            $order_id=$this->Order_model->addRow('pr_retailer_order',$edata);

            $spp="";

            for ($i=0; $i < $dcount; $i++) 
            {
                $spp=$spp+$subprice[$i];
                $data=array('ORDER_ID'=>$order_id,'PRODUCT_CAT_ID'=>$prd_category[$i],'PRODUCT_ID'=>$product_packs[$i],'PRICE'=>$pprice[$i],'QUANTITY'=>$product_qty[$i],'STATUS'=>'1','CRAETED_AT'=>$cur_date);

                $this->Order_model->addRow('pr_retailer_order_trans',$data);
               
             
            }

            $spp=$spp*18/100+$spp;
            $this->Order_model->updateRow('pr_retailer_order',array('TOTAL'=>$spp),array('RETAILER_ORDER_ID'=>$order_id));

            $_SESSION['msg'] = "Ordered Added Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("order/retailerOrder_list?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        
            
        
    }

    public function getRetailerOrderedPrdData()
    {
        $order_id=$_REQUEST['order_id'];//exit;
        $orderPrdData = $this->Order_model->getRetailerOrderProducts($order_id);
        $output='';
        $i=1;
        $subtotl="";
        foreach ($orderPrdData as $prow) 
        {  
            $subtotl=$subtotl+$prow->PRICE*$prow->QUANTITY;
           
                $output.='<tr>';
                $output.=' <td>'.$i.'</td>';
                $output.=' <td>'.$prow->PR_PRODUCT_CATEGORY_NAME.'</td>';
                $output.=' <td>PRD-'.$prow->PR_PRODUCT_NAME.'</td>';
                $output.=' <td>'.$prow->QUANTITY.'</td>';               
                 $output.=' <td>Rs. '.$prow->PRICE.'</td>';
                $output.=' <td>Rs. '.$prow->PRICE*$prow->QUANTITY.'</td>';                
                $output.=' </tr>';
        $i++; }

        $gst=$subtotl*18/100;

        $totalamnt=$subtotl+$gst;

        $output.='<tr>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td style="color:#001848;">SUB TOTAL</td>';
        $output.=' <td>Rs. '.round($subtotl,2).'</td>';
        $output.=' </tr>';
        $output.='<tr>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td style="color:#001848;">GST (18 %)</td>';
        $output.=' <td>Rs. '.round($gst,2).'</td>';
        $output.=' </tr>';
        $output.='<tr>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td></td>';
        $output.=' <td style="color:#001848;">TOTAL AMOUNT</td>';
        $output.=' <td>Rs. '.round($totalamnt,2).'</td>';
        $output.=' </tr>';

       
    echo $output;
    }  

    
    

	
}
	
	  