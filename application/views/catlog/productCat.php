    <section class="content-header">
      <h1>
        PRODUCT CATEGORY LIST
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li ><a href="<?php echo base_url('Catlog/product')."?token=".$this->session->userdata['sampark_session']['token']; ?>">PRODUCT CATEGORY LIST </a></li>
        
        <li class="active" ><a href="<?php echo base_url('Catlog/prd_cat_add')."?token=".$this->session->userdata['sampark_session']['token']; ?>" ><button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> ADD PRODUCT CATEGORY</button></a></li>
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
            <!-- <div class="box-header">
              <h3 class="box-title"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr style="font-size:12px !important;">
                 
                  <th>PRODUCT CATEGORY ID</th>
                  <th>BRAND</th>
                  <th>CATEGORY</th>
                  <th>SUB CATEGORY</th>
                  <th>SUB SUB CATEGORY</th>                  
                  <th>PRODUCT NAME</th>                                  
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody id="dyndata">
                <?php
                $i=1;
                foreach ($catproductList as $prow) 
                {                        
                ?>
                <tr>
                  
                  <td>PRD-<?php echo $prow->PR_PRD_CAT_ID; ?></td>
                  <td><?php echo $prow->brand_name; ?></td>
                  <td><?php echo $prow->CATEGORY_NAME; ?></td>
                  <td><?php echo $prow->SUB_CATEGORY_NAME; ?></td>
                  <td><?php echo $prow->SUB_SUB_CATEGORY_NAME; ?></td>
                  <td><?php echo $prow->PR_PRODUCT_NAME; ?></td>
                 
                  <td><?php if($prow->PR_STATUS=='1'){ echo '<span class="btn btn-success btn-xs">Active</span>'; } else{ echo '<span class="btn btn-danger btn-xs">De-Active</span>';} ?></td>
                  <td>
                    <a href="<?php echo base_url().'catlog/prd_cat_edit/'.$prow->PR_PRD_CAT_ID; ?>"  class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="<?= base_url('catlog/prd_cat_delete/'.$prow->PR_PRD_CAT_ID)?>" onclick="return confirm('Are you sure want to delete this item!')" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                     
                  </td>
                </tr>

                <?php
                $i++; }
                ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>PRODUCT CATEGORY ID</th>
                  <th>BRAND</th>
                  <th>CATEGORY</th>
                  <th>SUB CATEGORY</th>
                  <th>SUB SUB CATEGORY</th>                  
                  <th>PRODUCT NAME</th>                                  
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
                </tfoot>
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
           // alert(warehouse_id);
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
