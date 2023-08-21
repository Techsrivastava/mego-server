   
<?php
$role_id=$this->session->userdata['sampark_session']['ROLE_ID'];
?>
    <section class="content-header">
      <h1>
       RETAILER ORDER LIST 
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li ><a href="<?php echo base_url('order/retailerOrder_list')."?token=".$this->session->userdata['sampark_session']['token']; ?>">RETAILER ORDER LIST </a></li>
        
        <li class="active" ><a href="<?php echo base_url('order/addRetailerOrderForm')."?token=".$this->session->userdata['sampark_session']['token']; ?>" ><button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> ADD RETAILER ORDER</button></a></li>
      </ol>
    </section>
    <!-- Main content -->
    <?php    
    if(!empty($this->session->userdata('msg'))){    $this->session->userdata('msg');} ?>
    <?php    
    if(!empty($this->session->userdata('msg')))
    {
      if($this->session->userdata('msgtype')=='success')
      {
    ?>
        <script>swal("Success","<?php echo  $this->session->userdata('msg');?> ", "success" );</script>
    <?php 
      }
      else
      { 
    ?>
        <script>swal("Oops !","<?php echo  $this->session->userdata('msg');?> ", "error" );</script>
    <?php
      }
      }
    ?>
    <?php 
        $this->session->unset_userdata('msg');
        $this->session->unset_userdata('msgtype');
    ?>
    <section class="content">
      <div class="row">
      
        <div class="col-xs-12 tblresp">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>

                <tr style="font-size:12px !important;">
                  <th>#</th>
                  <th>ORDER ID</th>
                  <th>AMOUNT</th>
                  <th>ORDER DATE</th>
                  <th>RETAILER</th>
                  <!-- <th>PAID AMOUNT</th>
                  <th>REST AMOUNT</th> -->
                  <th>ORDER STATUS</th>

                  <th>ACTION</th>
                 
                </tr>
                </thead>
                <tbody id="dyndata">
                <?php
                $i=1;
                foreach ($orderList as $prow) 
                {
                         
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>ORD-<?php echo $prow->RETAILER_ORDER_ID; ?></td>
                  <td>Rs. <?php echo $prow->TOTAL; ?></td>
                  <td>
                    
                  <?php
                    $rkdated=date("d F Y h:i:s A",strtotime($prow->ORDER_DATE));  
                    echo $rkdated; 
                  ?>


                  </td>
                   <td><?php echo $prow->PR_NAME; ?></td>
                 <!-- <td>Rs. <?php if($prow->AMOUNT==""){ echo "0.00"; }else { echo $prow->AMOUNT; } ?></td>
                 <td>Rs. <?php echo $prow->TOTAL-$prow->AMOUNT; ?></td> -->
                  <td>
                    <?php 
                    if($prow->ORDER_STATUS=='1')
                    { 
                      echo '<span class="btn btn-warning btn-xs">Order Generated</span>'; 
                    }
                    else if($prow->ORDER_STATUS=='2') 
                    {
                      echo '<span class="btn btn-warning btn-xs">Please Upload Payment Proof</span>'; 
                    }
                    else if($prow->ORDER_STATUS=='3') 
                    {
                      echo '<span class="btn btn-primary btn-xs">In Process</span>'; 
                    }
                     else if($prow->ORDER_STATUS=='4') 
                    {
                      echo '<span class="btn btn-sucess btn-xs">Deliver</span>'; 
                    }
                    else
                    { 
                      echo '<span class="btn btn-danger btn-xs">In Process</span>';
                    } ?>
                    



                  </td>
                  <td>
                       <a href="#" title="Ordered Product Detail" data-toggle="modal" data-target="#orderPrdQty"  onclick="getOrderPrdData('<?php echo $prow->RETAILER_ORDER_ID; ?>');"  class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>

                       <a target="_blank" href="<?php echo base_url('order/retailerOrderInvoice/'); ?><?php echo $prow->RETAILER_ORDER_ID; ?>" title="Invoice"  class="btn btn-primary btn-xs"><i class="fa fa-file-o" aria-hidden="true"></i></a>

                       <?php
                       if($prow->ORDER_STATUS=='2') 
                       {
                        ?>
                        <a href="#" title="Upload Payment Proof" data-toggle="modal" data-target="#paymentDOneFOrm"  onclick="getOrderPaymentData('<?php echo $prow->DISTRIBUTOR_ORDER_ID; ?>');"  class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i></a>
                        <?php
                       }
                       if($prow->ORDER_STATUS=='3') 
                       {
                        ?>
                        <a href="#" title="View Payment Proof" data-toggle="modal" data-target="#paymentDOneModal"  onclick="getOrderPaymentDoneData('<?php echo $prow->DISTRIBUTOR_ORDER_ID; ?>');"  class="btn btn-primary btn-xs"><i class="fa fa-credit-card" aria-hidden="true"></i></a>
                       <?php

                        if($role_id=='15')
                        {
                          ?>
                             <a href="<?php echo base_url().'order/financeupdatests/'.$prow->DISTRIBUTOR_ORDER_ID; ?>" title="Process For Delivery"   class="btn btn-primary btn-xs"><i class="fa fa-check-circle" aria-hidden="true"></i></a>

                              <a href="#" title="Upload Payment Proof" data-toggle="modal" data-target="#paymentDOneFOrm"  onclick="getOrderPaymentData('<?php echo $prow->DISTRIBUTOR_ORDER_ID; ?>');"  class="btn btn-primary btn-xs"><i class="fa fa-upload" aria-hidden="true"></i></a>


                             <a href="#" title="Check Payment Detail"  data-toggle="modal" data-target="#orderPayDtl"  onclick="getOrderPaymentDetail('<?php echo $prow->DISTRIBUTOR_ORDER_ID; ?>');" class="btn btn-primary btn-xs"><i class="fa fa-money" aria-hidden="true"></i></a>
                        <?php
                        }
                        
                       
                       }
                       if($role_id='9' && $prow->ORDER_STATUS=='1' )
                        {
                          ?>
                         <!--  <a href="<?php echo base_url().'order/approveOrder/'.$prow->DISTRIBUTOR_ORDER_ID; ?>" title="Approve Ordered"   class="btn btn-warning btn-xs"><i class="fa fa-check-circle" aria-hidden="true"></i></a> -->
                          <?php

                        }


                       ?>


                </tr>

                <?php
                $i++; }
                ?>
                
                </tbody>
                <!-- <tfoot>
                <tr>
                   <th>#</th>
                  <th>CATEGORY</th>
                  <th>PRODUCT ID</th>
                  <th>NAME</th>
                  <th>CARTON STOCK QTY</th>
                  <th>PER CARTON QTY</th>
                  <th>UNITS STOCK QTY</th>
                  <th>MRP</th>
                  <th>RETAILER PRICE</th>  
                  <th>DISTRIBUTOR PRICE</th>                  
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<!--   </div> -->
<!-- Modal -->
<div id="orderPrdQty" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ORDERD PRODUCT DETAIL </h4>
      </div>
      <div class="modal-body">
         <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>#</th>
                  <th>PRODUCT</th>
                  <th>PRODUCT TYPE </th>
                  <th>QUANTITY</th>                   
                  <th>PRICE</th>  
                  <th>SUB PRICE</th>  

                </tr>
                </thead>
                <tbody id="dyndata2">
                </tbody>

          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<div id="orderPayDtl" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ORDERD PAYMENT DETAIL </h4>
      </div>
      <div class="modal-body">
         <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>#</th>
                  <th>TRANSACTION ID</th>
                                                   
                  <th>BANK NAME</th>  
                  <th>DATE</th>  
                  <th>AMOUNT</th>
                  <th>ACTION</th>   

                </tr>
                </thead>
                <tbody id="dyndatapayment">
                </tbody>

          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div id="paymentDOneFOrm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ORDER PAYMENT DETAIL FORM</h4>
      </div>
        <form enctype="multipart/form-data" action="<?php echo base_url() . 'order/addOrderPaymentDetail' ?>" method="post">
      <div class="modal-body">
        <div class="col-md-6 form-group">
            <label for="email1">ORDER ID</label>
            <input type="text" class="form-control" required="required"  readonly="readonly" placeholder="Menu Name" id="paymenorderid" aria-describedby="emailHelp" name="paymenorderid" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">RTGS | NEFT | IMPS NUMBER</label>
            <input type="text" class="form-control" required="required"  id="rtgs" aria-describedby="emailHelp" name="rtgs" placeholder="Enter RTGS | NEFT | IMPS NUMBER">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 

          <div class="col-md-6 form-group">
            <label for="email1">BANK NAME</label>
            <input type="text" class="form-control" required="required"  placeholder="Bank Name" id="bank_name" aria-describedby="emailHelp" name="bank_name" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

           <div class="col-md-6 form-group">
            <label for="email1">DATE OF PAYMENT</label>
            <input type="date" class="form-control" required="required"   id="dateofpayment" aria-describedby="emailHelp" name="dateofpayment" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
          <div class="col-md-6 form-group">
            <label for="email1">AMOUNT</label>
            <input type="text" class="form-control" required="required"   id="amount" aria-describedby="emailHelp" name="amount" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>
<div id="paymentDOneModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ORDER PAYMENT DETAIL</h4>
      </div>
        <form enctype="multipart/form-data" action="<?php echo base_url() . 'order/addOrderPaymentDetail' ?>" method="post">
      <div class="modal-body">
        <div class="col-md-6 form-group">
            <label for="email1">ORDER ID</label>
            <input type="text" class="form-control" required="required"  readonly="readonly" placeholder="Menu Name" id="dpaymenorderid" aria-describedby="emailHelp" name="paymenorderid" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">RTGS</label>
            <input type="text" class="form-control" required="required" readonly="readonly" id="drtgs" aria-describedby="emailHelp" name="rtgs" placeholder="Enter RTGS No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 

          <div class="col-md-6 form-group">
            <label for="email1">BANK NAME</label>
            <input type="text" class="form-control" required="required" readonly="readonly"  placeholder="Bank Name" id="dbank_name" aria-describedby="emailHelp" name="bank_name" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

           <div class="col-md-6 form-group">
            <label for="email1">DATE OF PAYMENT</label>
            <input type="date" class="form-control" required="required" readonly="readonly"  id="ddateofpayment" aria-describedby="emailHelp" name="dateofpayment" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
          <div class="col-md-6 form-group">
            <label for="email1">AMOUNT</label>
            <input type="text" class="form-control" required="required" readonly="readonly"  id="damount" aria-describedby="emailHelp" name="amount" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>
<script type="text/javascript">
          function getOrderPrdData(order_id)
          {
           //alert(warehouse_id);
            //document.getElementById('loader').style.display='block';
            var url = "<?php echo base_url().'order/getRetailerOrderedPrdData?order_id='; ?>" +order_id;
            //alert(url);
                      $.ajax({
                          url: url,
                          type: "GET",
                          success: function (data)
                          {
                            //document.getElementById('loader').style.display='none';
                            //alert(data);
                              $('#dyndata2').html(data);                          
                          }
                      });

          }

             function getOrderPaymentDetail(order_id)
          {
           //alert(warehouse_id);
            //document.getElementById('loader').style.display='block';
            var url = "<?php echo base_url().'order/getOrderedPaymentData?order_id='; ?>" +order_id;
            //alert(url);
                      $.ajax({
                          url: url,
                          type: "GET",
                          success: function (data)
                          {
                            //document.getElementById('loader').style.display='none';
                            //alert(data);
                              $('#dyndatapayment').html(data);                          
                          }
                      });

          }

          function getOrderPaymentData(order_id)
          {
            document.getElementById("paymenorderid").value =order_id;
           
          }


          function getOrderPaymentDoneData(order_id)
          {
            document.getElementById("dpaymenorderid").value =order_id;
            var url = "<?php echo base_url().'order/getOrderedPaymentDoneData?order_id='; ?>" +order_id;
            $.ajax({
                          url: url,
                          type: "GET",
                          success: function (data)
                          {
                           // alert(data);
                            var obj = JSON.parse(data);
                            document.getElementById("drtgs").value =obj.RTGS;     
                            document.getElementById("dbank_name").value =obj.BANK_NAME;     
                            document.getElementById("ddateofpayment").value =obj.DATE_OF_PAYMENT;     
                            document.getElementById("damount").value =obj.AMOUNT;                         
                          }
                      });
           
          }

          function getPrdAttrData(product_id)
          {
             $('#attributetypeQty').modal('show');
           //alert(product_id);
            //document.getElementById('loader').style.display='block';
            var url = "<?php echo base_url().'Catlog/getProductAttrData?product_id='; ?>" +product_id;
           // alert(url);
                      $.ajax({
                          url: url,
                          type: "GET",
                          success: function (data)
                          {
                            //document.getElementById('loader').style.display='none';
                            //alert(data);
                              $('#dyndata2').html(data);                          
                          }
                      });

          }
        </script>
