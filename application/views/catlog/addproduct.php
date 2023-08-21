    <section class="content-header">
      <div class="col-xs-1">
      <!--  <button type="button" class="btn btn-block btn-warning btn-sm">Export</button>        -->
       </div>
       <div class="col-xs-1">      
      <!--  <button type="button" class="btn btn-block btn-info btn-sm">Import</button>   -->  
       </div>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url('Catlog/product')."?token=".$this->session->userdata['sampark_session']['token']; ?>">Product List</a></li>
        <li class="active" ><a href="#" >Add Product</a></li>
      </ol>
    </section><br>
    <!-- Main content -->
    <section class="content">
		
      <form enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/addProduct'; ?>" method="post">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">          
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">ADD PRODUCT</h3>
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
           
                
						
                <div class="col-md-3">
                <div class="form-group">
                  <label>PRODUCT CATEGORY</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="prd_category" name="prd_category">
                      <option>Select Product Category</option>
                      <?php foreach ($catproductList as $cprow){ ?>
                        <option value="<?= $cprow->PR_PRD_CAT_ID ?>">
                          <?= $cprow->PR_PRODUCT_NAME ?>
                        </option>
                      <?php } ?>
                    </select>

                  </div>
                </div>
                </div>
                <!-- text input -->
                <div class="col-md-3">
                <div class="form-group">
                <label>PRODUCT NAME</label>
                <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" value="" placeholder="Enter Product Name" id="product_name" name="product_name">
                </div>
                </div>
                </div>
                <!-- <div class="col-md-3">
                <div class="form-group">
                  <label>Unit</label>
                  <input type="text" value="<?= isset($editProduct->product_unit) ? $editProduct->product_unit : '' ?>" class="form-control" placeholder="Unit (eg. Kg,Pices)" id="product_unit" name="product_unit">
                </div>
                </div> -->
                <div class="col-md-3">
                <div class="form-group">
                <label>MRP</label>
                <div class="input-group">
                <span class="input-group-addon">₹</span>
                <input type="text" class="form-control" value="" placeholder="Enter MRP Price" id="mrp_price" name="mrp_price">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>RETAILER PRICE</label>
                <div class="input-group">
                <span class="input-group-addon">₹</span>
                <input type="text" class="form-control" value="" placeholder="Enter Retailer Price" id="retailer_price" name="retailer_price">
                </div>
                </div>
                </div>
               
                <div class="col-md-3">
                <div class="form-group">
                <label>DISTRIBUTOR PRICE</label>
                <div class="input-group">
                <span class="input-group-addon">₹</span>
                <input type="text" class="form-control" value="" placeholder="Enter Distributor Price" id="distributor_price" name="distributor_price">
                </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                <label>DISCOUNT</label>
                <div class="input-group">
                <span class="input-group-addon">%</span>
                <input type="text" class="form-control" value="" placeholder="Enter Discount" id="discount" name="discount">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>NO OF PIECE PER CARTON</label>
                <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" value=""  placeholder="Enter No Of Piece Per Carton" id="no_of_piece" name="no_of_piece">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>MIN CARTON PER ORDER</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-box" aria-hidden="true"></i></span>
                <input type="text" class="form-control" value="" placeholder="Enter Min Carton Per Order" id="min_carton_order" name="min_carton_order">
                </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                <label>PACKAGE STORAGE</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-container-storage" aria-hidden="true"></i></span>
               
                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="storage" name="storage" aria-hidden="true"  required="required">
                        <?php
                        foreach ($attributeList as $attrrow) 
                        {
                        ?>
                        <option value="<?php echo $attrrow->ATTRIBUTE_ID; ?>"><?php echo $attrrow->ATTRIBUTE_NAME.' ('.$attrrow->ATTRIBUTE_DESC.')';  ?></option>
                        <?php
                        }

                        ?>
                        </select>
                </div>
                </div>
                </div>
                  <div class="col-md-3">
                <div class="form-group">
                <label>PACKAGE  VOLUME TYPE</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center" aria-hidden="true"></i></span>
               
                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="volume_type" name="volume_type" aria-hidden="true"  required="required">
                       
                        <option value="KG">KG</option>
                        <option value="GM">GM</option>
                        <option value="LITRE">LITRE</option>
                        <option value="ML">ML</option>
                       
                        </select>
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>PACKAGE  VOLUME </label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center" aria-hidden="true"></i></span>
                <input type="text" class="form-control" value="" placeholder="Enter Package Volume" id="volume" name="volume">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Height  in cm Only</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-text-height" aria-hidden="true"></i></span>
                <input type="text" class="form-control" value="" placeholder="Enter Height" id="product_height" name="product_height">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Length in cm Only</label>
                <div class="input-group">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" value="" placeholder="Enter Length" id="product_length" name="product_length">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Weight  in gm Only</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-balance-scale" aria-hidden="true"></i></span>
                <input type="text" class="form-control" value="" placeholder="Enter Weight" id="product_weight" name="product_weight">
                </div>
                </div>
                </div>
               
                
                
                <div class="col-md-3">
                <div class="form-group">
									<label for="email1">STATUS</label>
									<select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_status" name="product_status" aria-hidden="true">
										<option value="1">Active</option>
										<option value="0">De-Active</option>
									</select>
								</div>
                </div>
         
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   
          </div>
         
          
         <!--  -->
         <!-- <div class="col-md-8">
          <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Attributes</h3>
                  </div>
                 
                 
                  <div class="box-body">
                    <div class="input_attribute_wrap row col-xs-12">
                      
                      <div class="col-md-4">
                        <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_attributes" name="product_attributes[]" aria-hidden="true" onchange="getatrtypeData(this.value,'0');">
                        <?php
                        foreach ($attributeList as $attrrow) 
                        {
                        ?>
                        <option value="<?php echo $attrrow->ATTRIBUTE_ID; ?>"><?php echo $attrrow->ATTRIBUTE_NAME.' ('.$attrrow->ATTRIBUTE_DESC.')';  ?></option>
                        <?php
                        }

                        ?>
                        </select>

                      </div>
                      <div class="col-md-3">
                        <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_attributes_type0" name="product_attributes_type[]" aria-hidden="true" >
                       
                        </select>

                      </div>
                       <div class="col-md-3">
                        <input type="text" class="form-control"  value="" placeholder="Quantity" id="attribute_value0" name="attribute_value[]">
                       </div>
                       <div class="col-md-2">
                        <button  type="button" class="form-control btn-sm btn-success add_attribute_button"><i class="fa fa-plus"></i>&nbsp;&nbsp;</button>
                       </div>
                      
                      
                      
                    </div>
                  </div>
          </div>
          </div> -->
          <div class="col-md-6">
          <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Product Description</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                      <div class="col-xs-12">
                           <textarea id="editor1" name="editor1" rows="5" cols="70" id="product_desc" name="product_desc"></textarea>
                      </div>                     
                      
                    </div>
                  </div>
          </div>
          </div>

          <div class="col-md-6">
          <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Product Images</h3>
                  </div>
                 
                 
                  <div class="box-body">
                    <div class="input_fields_wrap row col-xs-12">
                      <div class="col-md-9">
                        <input type="file" accept=".jpg, .png, .jpeg" class="form-control" placeholder="" id="product_image" name="product_image[]">
                      </div>
                      
                      <div class="col-md-3">
                         <button  type="button" class="form-control btn-sm btn-success add_field_button"><i class="fa fa-plus"></i></button>
                      </div>
                      
                    </div>
                  </div>
          </div>
          </div>
          
           <button type="submit" class="btn btn-primary pull-right" style="margin-right:10px;">Submit</button>
          
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
      $(wrapper).append('<div class="col-md-4"><select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_attributes'+x+'" name="product_attributes[]" aria-hidden="true" onchange="getatrtypeData(this.value,'+x+');"><?php foreach ($attributeList as $attrrow){ ?><option value="<?php echo $attrrow->ATTRIBUTE_ID; ?>"><?php echo $attrrow->ATTRIBUTE_NAME.' ('.$attrrow->ATTRIBUTE_DESC.')';  ?></option><?php }?></select></div><div class="col-md-3"><select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_attributes_type'+x+'" name="product_attributes_type[]" aria-hidden="true" ></select></div><div class="col-md-3"> <input type="text" class="form-control"  value="" placeholder="Quantity" id="attribute_value'+x+'" name="attribute_value[]"></div>'); 
      
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
