    <section class="content-header">
      <h1>
        INVOICE
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li><a href="<?php echo base_url('order/distributor')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i>DISTRIBUTOR MANAGEMENT</a></li>
        
        
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
     <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12  text-center">
          <h2 class="page-header">
            <strong><i class="fa fa-globe"></i> Tax Invoice</strong>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->


      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
           <div class="col-xs-6">
            <p>Billed party details :-</p>
             <table class="table">
              <tr>
                <td style="border: unset;width: 22%"><strong>Invoice No :-<strong></td>
                <td style="border-top: unset;border-bottom: 1px solid #d4d4d4;">SAMPARK|20-21|INV-<?php echo $orderData->DISTRIBUTOR_ORDER_ID; ?></td>
              </tr>
              <tr>
                <td  style="border: unset;width: 22%"><strong>Date :-<strong></td>
                <td  style="border-top: unset;border-bottom: 1px solid #d4d4d4;"><?php
                                $rkdated=date("d F Y",strtotime($orderData->ORDER_DATE));  
                                            echo $rkdated; 
                                ?>
</td>
              </tr>
               <tr>
                <td  style="border: unset;width: 22%"><strong>Firm Name :-<strong></td>
                <td style="border-top: unset;border-bottom: 1px solid #d4d4d4;"><?php echo $orderData->PR_NAME; ?></td>
              </tr>
               <tr>
                <td  style="border: unset;width: 22%"><strong>GSTIN :-<strong></td>
                <td style="border-top: unset;border-bottom: 1px solid #d4d4d4;"><?php echo $orderData->PR_GST_NO; ?></td>
              </tr>
               <tr>
                <td  style="border: unset;width: 22%"><strong>ADDRESS :-<strong></td>
                <td style="border-top: unset;border-bottom: 1px solid #d4d4d4;"><?php echo $orderData->PR_PRESENT_ADDRESS; ?><br><?php echo $orderData->PR_PHONE; ?></td>
              </tr>
              
            </table>
           </div>
            <div class="col-xs-6">
              <p>Billing party details :-</p>
             <table class="table">
             <tr>
                <td  style="border: unset;width: 22%"><strong>Firm Name :-<strong></td>
                <td style="border-top: unset;border-bottom: 1px solid #d4d4d4;">SAMPARK</td>
              </tr>
               <tr>
                <td  style="border: unset;width: 22%"><strong>GSTIN :-<strong></td>
                <td style="border-top: unset;border-bottom: 1px solid #d4d4d4;">DEMO123456789</td>
              </tr>
               <tr>
                <td  style="border: unset;width: 22%"><strong>ADDRESS :-<strong></td>
                <td style="border-top: unset;border-bottom: 1px solid #d4d4d4;">A 803, Amrapali Green Vaibhav Khand,Indirapuram    
Ghaziabad (UP) - 201010   
</td>
              </tr>
            </table>
           </div>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>S. No</th>
              <th>Product Description</th>
              <th>Pack Size</th>
              <th>Rate</th>
              <th>Qty</th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $this->load->model('Order_model');
              $orderPrdData = $this->Order_model->getOrderProduct($orderData->DISTRIBUTOR_ORDER_ID);
               $i=1;
        $subtotl="";
        $qty="";
              foreach($orderPrdData as $prow)
              {
                 $subtotl=$subtotl+$prow->PRICE*$prow->QUANTITY;
                 $qty=$qty+$prow->QUANTITY;
              ?>
            <tr>
              <td><?php echo  $i; ?></td>
              <td><?php echo $prow->PR_PRODUCT_CATEGORY_NAME; ?></td>
              <td><?php echo $prow->PR_PRODUCT_NAME; ?></td>
              <td><?php echo $prow->PRICE; ?></td>
              <td><?php echo $prow->QUANTITY; ?></td>
              <td><?php echo $prow->PRICE*$prow->QUANTITY; ?></td>
            </tr>
            <?php
          }


           $gst1=$subtotl*9/100;
           $gst2=$subtotl*9/100;

         $totalamnt=$subtotl+$gst1+$gst2;
          ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total weight:</th>
                <td>0.00</td>
                <td><strong>in Kg</strong></td>
              </tr>
              <tr>
                <th>No of cartons</th>
                <td><?php echo $qty; ?></td>
                <td><strong>in unit count<strong></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-2">
        </div>
        <div class="col-xs-4">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%; text-align: center;">Pre GST Total:</th>
                <td style="text-align: center;"><?php echo $subtotl; ?></td>
              </tr>
              <tr>
                <th style="text-align: center;">CGST ( 9 % )</th>
                <td style="text-align: center;"><?php echo $gst1; ?></td>
              </tr>
              <tr>
                <th style="text-align: center;">IGST ( 9 % )</th>
                <td style="text-align: center;"><?php echo $gst2; ?></td>
              </tr>
              <tr>
                <th style="text-align: center;">Total GST:</th>
                <td style="text-align: center;"><?php echo $gst2+$gst2; ?></td>
              </tr>
              <tr>
                <th style="text-align: center;">Invoice Total:</th>
                <td style="text-align: center;"><?php echo $totalamnt; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12"><!-- coolumn -->
          <p>Terms & conditions as per distributor agreement</p>
          <p>The invoice is digitally signed and does not require physical signature</p>
        </div><!-- column -->
      </div><br>

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
         <!--  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button> -->
          <button type="button" class="btn btn-primary pull-right" onclick="window.print()" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  