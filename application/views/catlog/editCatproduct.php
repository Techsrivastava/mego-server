    
<?php //print_r($prdCatData);  ?>
    <section class="content-header">
      <div class="col-xs-1">
      <!--  <button type="button" class="btn btn-block btn-warning btn-sm">Export</button>        -->
       </div>
       <div class="col-xs-1">      
      <!--  <button type="button" class="btn btn-block btn-info btn-sm">Import</button>   -->  
       </div>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url('Catlog/productcat')."?token=".$this->session->userdata['sampark_session']['token']; ?>">Product Category List</a></li>
        <li class="active" ><a href="#" >Edit Product Category</a></li>
      </ol>
    </section><br>
    <!-- Main content -->
    <section class="content">
		
      <form enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/updateCatProduct'; ?>" method="post">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">          
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit PRODUCT CATEGORY</h3>
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
           
                
							
									<div class="col-md-4">
                <div class="form-group">
                  <label>Category</label>                 

                  <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success"  required="required" data-toggle="modal" data-target="#categorymodal">
												<i class="fa fa-plus" aria-hidden="true"></i>
										</button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="product_category" onchange="getsubCategory($(this).val(),'product_subcategory')" name="product_category">
                      <option>Select Category</option>
                      <?php foreach ($categoryModalList as $prdcat) { ?>
                      	<option <?php if($prdcat->CATEGORY_ID==$prdCatData->PR_CATEGORY_ID){ echo 'selected="selected"'; } ?> value="<?php echo $prdcat->CATEGORY_ID; ?>"><?php echo $prdcat->CATEGORY_NAME; ?></option>
                      <?php } ?> 
                    </select>
                   
                  </div>
                </div>
                </div>
								
                <div class="col-md-4">
                <div class="form-group">
                  <label>Sub Category</label>
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#subcategorymodal"><i class="fa fa-plus" aria-hidden="true"></i>
</button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="product_subcategory"  onchange="getsubsubCategory($(this).val(),'product_subsubcategory')"  name="product_subcategory">
											<option>Select Sub Category</option>
                      <option selected="selected" value="<?php echo $prdCatData->PR_SUB_CATEGORY_ID; ?>"><?php echo $prdCatData->SUB_CATEGORY_NAME; ?></option>
											
                    </select>
                   
                  </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>Sub Sub Category</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#subsubcategorymodal"><i class="fa fa-plus" aria-hidden="true"></i>
</button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="product_subsubcategory" name="product_subsubcategory">
											<option>Select Sub Sub Category</option>
											<option selected="selected"  value="<?php echo $prdCatData->PR_SUB_SUB_CATEGORY_ID; ?>"><?php echo $prdCatData->SUB_SUB_CATEGORY_NAME; ?></option>
                    </select>
                    
                  </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>Brand</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#brandmodal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="product_brand" name="product_brand">
                      <option>Select Brand</option>
											<?php foreach ($brandsList as $b_item){ ?>
												<option <?php if($b_item->brand_id==$prdCatData->PR_BRAND_ID){ echo 'selected="selected"'; } ?> value="<?= $b_item->brand_id ?>">
													<?= $b_item->brand_name ?>
												</option>
											<?php } ?>
                    </select>

                  </div>
                </div>
                </div>
                <!-- text input -->
                <div class="col-md-4">
                <div class="form-group">
                  <label>Product Category Name</label>
                  <input type="text" class="form-control" id="product_name" value="<?php echo $prdCatData->PR_PRODUCT_NAME; ?>" name="product_name" required="required" placeholder="Enter Product Category Name">

                  <input type="hidden" class="form-control" id="prd_cat_id" value="<?php echo $prdCatData->PR_PRD_CAT_ID; ?>" name="prd_cat_id" required="required" >
                </div>
                </div>



                <div class="col-md-4">
                <div class="form-group">
                  <label for="email1">STATUS</label>
                  <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="product_status" name="product_status" aria-hidden="true">
                    <option  value="1">Active</option>
                    <option value="0">De-Active</option>
                  </select>
                </div>
                </div>

                <div class="col-md-12">
                <div class="form-group">
                   <button type="submit" class="btn btn-primary pull-right" style="margin-top:25px;">Submit</button>
                </div>
              </div>
               
         
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   
          </div>
         
          
         
          
          
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
