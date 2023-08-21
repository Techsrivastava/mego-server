    <section class="content-header">
      <div class="col-xs-1">
      <!--  <button type="button" class="btn btn-block btn-warning btn-sm">Export</button>        -->
       </div>
       <div class="col-xs-1">      
      <!--  <button type="button" class="btn btn-block btn-info btn-sm">Import</button>   -->  
       </div>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        
        <li class="active" ><a href="#" >WAREHOUSE STOCK ALLOCATION</a></li>
      </ol>
    </section><br>
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
		
      <form enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/addProductWarehouse'; ?>" method="post">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">          
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">WAREHOUSE STOCK ALLOCATION</h3>
            </div>
            <!-- /.box-header -->
<style>
img.pr_image {
    width: 100px;
    margin: 10px 0;
		height: 70px;
}
span.remove {
    position: absolute;
    right: 0;
    color: #fff;
    top: 4px;
    font-size: 10px;
    background: red;
    padding: 0px 4px;
}
</style>
      <!-- Modal Header -->
            <div class="box-body">
             <div class="col-md-5">
                <div class="form-group">
                  <label>Warehouse</label>                 

                  <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#warehousemodal">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="warehouse_id" name="warehouse_id" required="required">
                      <option value="">Select Warehouse</option>
                      <?php foreach ($warehouseList as $wareHouseRow) { ?>
                        <option value="<?php echo $wareHouseRow->PR_WAREHOUSE_ID; ?>"><?php echo $wareHouseRow->PR_WAREHOUSE_NAME; ?></option>
                      <?php } ?> 
                    </select>
                   
                  </div>
                </div>
                </div> 
                <div class="col-md-3">
                <div class="form-group">
                  <label></label>                 

                  <div class="input-group">
                   
                    <button type="submit" class="btn btn-primary  pull-right" title="Sample for Excel" style="margin-top:6px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Sample For Upload Data</button>
                   
                  </div>
                </div>
                </div> 
                <div class="col-md-4">
                <div class="form-group">
                  <label>File (<label style="color: red;">* In Excel Only </label>)</label>                 

                  <div class="input-group">
                   
                    <input type="file" class="form-control" id="uploadFile" value="" name="uploadFile"  readonly="readonly">
                   <div class="input-group-btn">
                     <button type="submit" class="btn btn-primary pull-right" style="margin-right:60px;" title="Select Excel File"><i class="fa fa-upload" aria-hidden="true"></i></button>
                    </button>
                    </div>
                  </div>
                </div>
                </div> 
             
							          
         <!--  -->
         <div class="col-md-12">
          <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="col-sm-2 pull-right">
                     <button  type="button" class="form-control btn-sm btn-success add_attribute_button pull-right" style="margin-right:35px;">ADD MORE PRODUCT</button>
                   </div>
                  </div>       
                  <div class="box-body">
                    <div class="input_attribute_wrap row col-xs-12">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Product</label> 
                          <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default">
                                <i class="fa fa fa-tag" aria-hidden="true"></i>
                            </button>
                            </div>
                            <!-- /btn-group -->
                            <select class="form-control" id="product_id" onchange="getCatProduct($(this).val(),'product_packs')" name="product_id[]" required="required">
                              <option>Select Product</option>
                              <?php foreach ($productList as $prd) { ?>
                                <option value="<?php echo $prd->PR_PRD_CAT_ID; ?>"><?php echo $prd->PR_PRODUCT_NAME; ?></option>
                              <?php } ?> 
                            </select>
                           
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label>Available Product Pack</label> 
                          <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default">
                                <i class="fa fa fa-tag" aria-hidden="true"></i>
                            </button>
                            </div>
                            <!-- /btn-group -->
                            <select class="form-control" id="product_packs"  name="product_packs[]">
                              <option>Select Available Product Pack</option>
                             
                            </select>
                           
                          </div>
                        </div>
                      </div>
                     
                       <div class="col-sm-2">
                        <div class="form-group">
                          <label>Quantity in Carton</label> 
                          <div class="input-group">
                            
                            <!-- /btn-group -->
                            <input type="text" class="form-control" id="product_qty" value="" name="product_qty[]" onkeyup="getPrdQtyCount(this.value,'no_of_piecesCOunt');" placeholder="Enter Quantity" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" >
                           
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <div class="form-group">
                          <label>No of Pieces in Carton</label> 
                          <div class="input-group">
                           
                            <!-- /btn-group -->
                            <input type="text" class="form-control" id="no_of_piecesCOunt" value="" name="no_of_piecesCOunt[]"  readonly="readonly">
                           <div class="input-group-btn">
                             
                            </div>
                          </div>
                        </div>
                      </div>       
                      
                    </div>




                  </div>
          </div>
          </div>

          

           <button type="submit" class="btn btn-primary pull-right" style="margin-right:70px;">Submit</button>
          
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </form>
    </section>
    <!-- /.content -->
<!--   </div> -->
<script type="text/javascript">


function removeImage(id) {
	var msg = confirm('are you sure want to remove this image!');
	if(msg == false){
		return false;
	}

  $.ajax({
    url:"<?= base_url('catlog/product/remove_image/'); ?>"+id,
    type:'post',
    data: {},
    success: function(res){
      if(res == 'success'){
        $('#rmvimg_'+id).remove();
      }
    }
  })
}
function addattribute(attribute)
{
  var r = 1; 
  r++; 
  var wraping = $("#dynattribute"); //Fields wrapper
	// alert(attribute);
	
  $(wraping).append('<div><span class="col-md-3"><input type="text" class="form-control"  name="attribute[]"  value="'+attribute+'"></span><span class="col-md-9"><input type="text" name="attributevalue[]"  class="form-control"  value=""></span></div>');

  $(wraping).on("click",".remove_field", function(e){ 
    e.preventDefault(); $(this).parent('div').remove(); r--;
  }) 
}

$(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID
  
  var x = 1; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div><span class="col-xs-9"><input type="file" class="form-control" id="product_image" name="product_image[]"></span></div>'); //add input box
      
         }
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
});



$(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $(".input_attribute_wrap"); //Fields wrapper
  var add_button      = $(".add_attribute_button"); //Add button ID
  
  var x =0; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      var t="'product_packs"+x+"'";
      var cou="'no_of_piecesCOunt"+x+"'";
      $(wrapper).append('<div class="col-md-3"><select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_id'+x+'" name="product_id[]" aria-hidden="true" onchange="getCatProduct($(this).val(),'+t+');"> <option>Select  Product </option><?php foreach ($productList as $prd){ ?><option value="<?php echo $prd->PR_PRD_CAT_ID; ?>"><?php echo $prd->PR_PRODUCT_NAME;  ?></option><?php }?></select></div><div class="col-md-5"><select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_packs'+x+'" name="product_packs[]" aria-hidden="true" > <option>Select Available Product Pack</option></select></div><div class="col-md-2"> <input type="text" class="form-control"  value="" placeholder="Quantity" id="product_qty'+x+'" name="product_qty[]" onkeyup="getPrdQtyCount(this.value,'+cou+');" ></div><div class="col-md-2"> <input type="text" class="form-control"  value="" placeholder="" readonly id="no_of_piecesCOunt'+x+'" name="no_of_piecesCOunt[]">'); 


        // $(wrapper).append('<div class="input_attribute_wrap row col-xs-12"><div class="col-sm-3"><div class="form-group"><label>Product</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa fa-tag" aria-hidden="true"></i></button></div><select class="form-control" id="product_id" onchange="getCatProduct($(this).val(),'product_packs')" name="product_id" required="required"><option>Select Product</option><?php foreach ($productList as $prd) { ?><option value="<?php echo $prd->PR_PRD_CAT_ID; ?>"><?php echo $prd->PR_PRODUCT_NAME; ?></option><?php } ?></select></div></div></div><div class="col-sm-5"><div class="form-group"><label>Available Product Pack</label><div class="input-group"<div class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa fa-tag" aria-hidden="true"></i> </button></div> <select class="form-control" id="product_packs"  name="product_packs"><option>Select Available Product Pack</option></select></div></div></div><div class="col-sm-2"><div class="form-group"><label>Quantity in Carton</label><div class="input-group"><input type="text" class="form-control" id="product_qty" value="" name="product_qty" onkeyup="getPrdQtyCount(this.value);" placeholder="Enter Quantity"></div></div> </div><div class="col-sm-2"><div class="form-group"><label>No of Pieces in Carton</label><div class="input-group"><input type="text" class="form-control" id="no_of_piecesCOunt" value="" name="no_of_piecesCOunt"  readonly="readonly"><div class="input-group-btn"><button  type="button" class="form-control btn-sm btn-success add_attribute_button"><i class="fa fa-plus"></i>&nbsp;&nbsp;</button></div></div></div></div></div>'); 
      
         }
  });
  
  $(wrapper).on("click",".minus_attribute_button", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('span').remove(); x--;
  })
});
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script type="text/javascript">
  function insertRowData(attribute_id)
  {
    alert(attribute_id);
  }
</script>
<script type="text/javascript">
  function getatrtypeData(attr_id,pid)
  {
      var attrtypeval='#product_attributes_type'+pid;
       var url = "<?php echo base_url() . 'catlog/getattrType?attr_id='; ?>" +attr_id;
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function (data)
                        {
                            $(attrtypeval).html(data);
                        }
                    });
  }

  
</script>
