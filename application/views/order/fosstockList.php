    <section class="content-header">
      <h1>
       FOS STOCK LIST 
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li><a href="<?php echo base_url('organization/fos')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i>FOS MANAGEMENT</a></li>
        <li class="active" ><a href="<?php echo base_url('order/stock_list')."?token=".$this->session->userdata['sampark_session']['token']; ?>">FOS STOCK LIST </a></li>
        
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
                  <th>PRODUCT TYPE</th>
                  <th>PRODUCT NAME</th>
                  <th>AMOUNT</th>
                  <th>QUANTITY</th>
                  
                  <th>STATUS</th>
                  <th>ACTION</th>
                 
                </tr>
                </thead>
                <tbody i>
                <?php
                $i=1;
                foreach ($stockList as $prow) 
                {
                         
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $prow->PR_PRODUCT_CATEGORY_NAME; ?></td>
                  <td><?php echo $prow->PR_PRODUCT_NAME; ?></td>
                  <td>Rs. <?php echo $prow->PR_PRICE; ?></td>
                  <td><?php echo $prow->quantity; ?></td>
        
                  
                 
                  <td>
                    <!-- <?php if($prow->ORDER_STATUS=='1'){ echo '<span class="btn btn-warning btn-xs">Order Generated</span>'; } else{ echo '<span class="btn btn-danger btn-xs">De-Active</span>';} ?> -->
                    
                  </td>
                  <td>
                 <!--       <a href="#" title="Ordered Product Detail" data-toggle="modal" data-target="#orderPrdQty"  onclick="getOrderPrdData('<?php echo $prow->DISTRIBUTOR_ORDER_ID; ?>');"  class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
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
                  <th>QUANTITY<sup style="color:red;"><br>( * In Carton )</sup></th>                   
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
<script type="text/javascript">
          function getOrderPrdData(order_id)
          {
           //alert(warehouse_id);
            //document.getElementById('loader').style.display='block';
            var url = "<?php echo base_url().'order/getOrderedPrdData?order_id='; ?>" +order_id;
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
