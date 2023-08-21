    <section class="content-header">
      <h1>
        PRODUCT 
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li ><a href="<?php echo base_url('Catlog/product')."?token=".$this->session->userdata['sampark_session']['token']; ?>">PRODUCT LIST </a></li>
        
        <li class="active" ><a href="<?php echo base_url('Catlog/prd_add')."?token=".$this->session->userdata['sampark_session']['token']; ?>" ><button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> ADD PRODUCT</button></a></li>
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
         <div class="col-xs-12">
          <div class="box">            
            <div class="box-body">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Warehouse</label>                 

                  <div class="input-group">
                    
                    <!-- /btn-group -->
                    <select class="form-control" id="warehouse_id" name="warehouse_id" onchange="getwareData(this.value);">
                      <option>Select Warehouse</option>
                      <?php foreach ($warehouseList as $wareHouseRow) { ?>
                        <option value="<?php echo $wareHouseRow->PR_WAREHOUSE_ID; ?>"><?php echo $wareHouseRow->PR_WAREHOUSE_NAME; ?></option>
                      <?php } ?> 
                    </select>
                   
                  </div>
                </div>
                </div>
               <!--  <div class="col-md-1">
                  <div class="form-group">
                  <label>Filter</label>                 

                  <div class="input-group">
                    
                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-filter" aria-hidden="true"></i></button>
                  </div>
                </div>
                   
                </div> -->

            </div>
          </div>
        </div>
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
                </thead>
                <tbody id="dyndata">
                <?php
                $i=1;
                foreach ($productList as $prow) 
                {
                 $getProdStockQty=$this->Product_model->getPrdStockData($prow->PR_PRODUCT_ID);  
                           
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $prow->pcategory; ?></td>
                  <td>PRD-<?php echo $prow->PR_PRODUCT_ID; ?></td>
                  <td><?php echo $prow->PR_PRODUCT_NAME; ?></td>
                 <td><?php echo $getProdStockQty->stock; ?></td>
                 <td><?php echo $prow->PR_NO_OF_PIECE_PER_CARTON; ?></td>
                 <td><?php echo $getProdStockQty->stock*$prow->PR_NO_OF_PIECE_PER_CARTON; ?></td>
                  <td>Rs. <?php echo $prow->PR_MRP; ?></td>
                  <td>Rs. <?php echo $prow->PR_SP_PRICE; ?></td>
                  <td>Rs. <?php echo $prow->PR_PRICE; ?></td>
                  <td><?php if($prow->PR_STATUS=='1'){ echo '<span class="btn btn-success btn-xs">Active</span>'; } else{ echo '<span class="btn btn-danger btn-xs">De-Active</span>';} ?></td>
                  <td>
                    <!-- <a href="#" title="Warehouse Stock Quantity" onclick="getPrdAttrData('<?php echo $prow->PR_PRODUCT_ID; ?>');"  class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                    <a href="<?php echo base_url().'catlog/prd_edit/'.$prow->PR_PRODUCT_ID; ?>"  class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="<?= base_url('catlog/productDelete/'.$prow->PR_PRODUCT_ID)?>" onclick="return confirm('Are you sure want to delete this item!')" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                     
                  </td>
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
<div id="attributetypeQty" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PRODUCT ATTRIBUTE QUANTITY </h4>
      </div>
      <div class="modal-body">
         <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>#</th>
                  <th>ATTRIBUTE </th>
                  <th>ATTRIBUTE TYPE </th>
                  <th>QUANTITY</th>                 
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
          function getwareData(warehouse_id)
          {
           //alert(warehouse_id);
            //document.getElementById('loader').style.display='block';
            var url = "<?php echo base_url().'Catlog/getProductData?warehouse_id='; ?>" +warehouse_id;
            //alert(url);
                      $.ajax({
                          url: url,
                          type: "GET",
                          success: function (data)
                          {
                            //document.getElementById('loader').style.display='none';
                            //alert(data);
                              $('#dyndata').html(data);                          
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
