<section class="content-header">
      <div class="col-xs-1">
       <button style="visibility:hidden" type="button" class="btn btn-block btn-warning btn-sm">Export</button>       
       </div>
       <div class="col-xs-1">      
       <button style="visibility:hidden" type="button" class="btn btn-block btn-info btn-sm">Import</button>    
       </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url(); ?>/product">Product List</a></li>
        <li class="active" ><a href="#" >Add Product</a></li>
      </ol>
	</section>
	<style>
li.select2-selection__choice {
    color: #2b2b2b !important;
}


img.pr_image {
    width: 100px;
    margin: 10px 0;
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

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">          
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">VIEW PRODUCT</h3>
            </div>
            <!-- /.box-header -->

      <!-- Modal Header -->
            <div class="box-body">
             
                <!-- text input -->
                <div class="col-md-3">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" disabled class="form-control" id="product_name" value="<?= isset($editProduct->product_name) ? $editProduct->product_name : '' ?>" name="product_name" placeholder="Enter Product Name">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Category</label>                 

                  <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success disabled"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" disabled id="product_category" onchange="getsubCategory($(this).val(),'product_subcategory')" name="product_category">
                      <option>No Category Selected</option>
                      <?php
                      foreach ($categoryModalList as $prdcat) {
                     
                      ?>
                      <option <?php if(isset($editProduct->product_category) && $prdcat->category_id == $editProduct->product_category) echo 'selected'; ?> value="<?php echo $prdcat->category_id; ?>"><?php echo $prdcat->category_name; ?></option>
                      <?php
                      }
                      ?> 
                    </select>
                   
                  </div>
                </div>
                </div>
                <!-- textarea -->
                <div class="col-md-3">
                <div class="form-group">
                  <label>Sub Category</label>
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success disabled"  data-toggle="modal" data-target="#subcategorymodal"><i class="fa fa-plus" aria-hidden="true"></i>
</button>
                    </div>
                    <!-- /btn-group -->
                    <select disabled class="form-control" id="product_subcategory"  onchange="getsubsubCategory($(this).val(),'product_subsubcategory')"  name="product_subcategory">
					  <option>No Sub Category Selected</option>
					  <?php foreach ($this->db->get_where('subcategory',['category_id'=>$editProduct->product_category])->result() as $prdsubcat) { ?>
                      	<option <?php if(isset($editProduct->product_subcategory) && $prdsubcat->sub_category_id == $editProduct->product_subcategory) echo 'selected'; ?> value="<?php echo $prdsubcat->sub_category_id; ?>"><?php echo $prdsubcat->sub_category_name; ?></option>
						<?php } ?>
                    </select>
                   
                  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Sub Sub Category</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn disabled btn-success"  data-toggle="modal" data-target="#subsubcategorymodal"><i class="fa fa-plus" aria-hidden="true"></i>
</button>
                    </div>
                    <!-- /btn-group -->
                    <select disabled class="form-control" id="product_subsubcategory" name="product_subsubcategory">
					  <option>No Sub Sub Category Selected</option>
					  	<?php foreach ($this->db->get_where('sub_sub_category',['category_id'=>$editProduct->product_category])->result() as $prds_subcat) { ?>
                      		<option <?php if(isset($editProduct->product_subsubcategory) && $prds_subcat->sub_scategory_id == $editProduct->product_subsubcategory) echo 'selected'; ?> value="<?php echo $prds_subcat->sub_scategory_id; ?>"><?php echo $prds_subcat->sub_scategory_name; ?></option>
						<?php } ?>
                    </select>
                   
                  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Brand</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success disabled"  data-toggle="modal" data-target="#brandmodal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="product_brand" name="product_brand">
                      <option>Select Brand</option>
											<?php foreach ($brandsList as $b_item){ ?>
												<option <?php if(isset($editProduct->product_brand_id) && $editProduct->product_brand_id == $b_item->brand_id) echo 'selected' ?> value="<?= $b_item->brand_id ?>">
													<?= $b_item->brand_name ?>
												</option>
											<?php } ?>
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Unit</label>
                  <input disabled type="text" value="<?= isset($editProduct->product_unit) ? $editProduct->product_unit : '' ?>" class="form-control" placeholder="Unit (eg. Kg,Pices)" id="product_unit" name="product_unit">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Minimum Quantity</label>
                  <input type="text" disabled class="form-control"  value="<?= isset($editProduct->product_minimumqty) ? $editProduct->product_minimumqty : '' ?>"  placeholder="Enter Min Quantity" id="product_min_qty" name="product_min_qty">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" disabled class="form-control" value="<?= isset($editProduct->product_quantity) ? $editProduct->product_quantity : '' ?>"  placeholder="Enter Quantity" id="product_qty" name="product_qty">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
								<label>Color</label>
								
                <select disabled class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Color" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" id="product_color" name="product_color[]">
									<?php foreach ($getColors as $color){ ?>
										<option <?php if(in_array($color->id, $product_color)) echo 'selected' ?> value="<?= $color->id ?>"><?= $color->color_name ?></option>
									<?php } ?>
                </select>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Price</label>
                <div class="input-group">
                <span class="input-group-addon">₹</span>
                <input type="text" disabled class="form-control" value="<?= isset($editProduct->product_price) ? $editProduct->product_price : '' ?>" placeholder="Enter Price" id="product_price" name="product_price">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Selling Price</label>
                <div class="input-group">
                <span class="input-group-addon">₹</span>
                <input type="text" disabled class="form-control" value="<?= isset($editProduct->product_sellprice) ? $editProduct->product_sellprice : '' ?>"  placeholder="Enter Selling Price" id="product_sprice" name="product_sprice">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <label>Discount</label>
                <div class="input-group">
                <span class="input-group-addon">%</span>
                <input type="text" disabled class="form-control" value="<?= isset($editProduct->product_discount) ? $editProduct->product_discount : '' ?>" placeholder="Enter Discount" id="product_discount" name="product_discount">
                </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Length</label>
                  <input type="text" disabled class="form-control"  value="<?= isset($editProduct->product_length) ? $editProduct->product_length : '' ?>" placeholder="Enter Length" id="product_length" name="product_length">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Width</label>
                  <input type="text" disabled class="form-control"  value="<?= isset($editProduct->product_width) ? $editProduct->product_width : '' ?>" placeholder="Enter Width" id="product_width" name="product_width">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Height</label>
                  <input type="text" disabled class="form-control"  value="<?= isset($editProduct->product_height) ? $editProduct->product_height : '' ?>" placeholder="Enter Height" id="product_height" name="product_height">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Weight</label>
                  <input type="text" disabled class="form-control"  value="<?= isset($editProduct->product_weight) ? $editProduct->product_weight : '' ?>" placeholder="Enter Weight" id="product_weight" name="product_weight">
                </div>
                </div>
         
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   
          </div>
          <div class="col-md-12">
          <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Product Description</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                      <div class="col-xs-12">
                           <textarea rows="10" disabled cols="80" class="form-control" id="product_desc" name="product_desc"><?= isset($editProduct->product_description)?strip_tags($editProduct->product_description):'' ?></textarea>
                      </div>                     
                      
                    </div>
                  </div>
          </div>
          </div>
          
          <div class="col-md-6">
          <div class="box box-primary">
                  <div class="box-header with-border">
                    <!-- <h3 class="box-title">Attributes</h3> -->
                    <small>Choose the attributes of this product and then input values of each attribute</small>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-xs-12">
                      <div class="col-md-3">
                        <input type="text" class="form-control" value="Attribute" disabled="disabled">
                      </div>
                      <div class="col-md-9">
                           <select disabled class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select Attribute" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" onchange="addattribute(this.value);">
                                  <option value="Size">Size</option>
                                  <option value="Fabric">Fabric</option>
                                  <option value="Capacity">Capacity</option>
                                  <option value="Sizes">Sizes</option>
                                  <option value="Load Capacity">Load Capacity</option>
                                
                            </select>
                      </div>
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
                  <?php if(isset($editProduct->product_id) && !empty($editProduct->product_id)){ ?>
                  <div class="box-body">
										<?php $imageData = $this->db->get_where('product_image',['product_id'=>$editProduct->product_id])->result(); 
										// print_r($imageData); die;
											if(count($imageData) > 0){
										?>
                    <div class="row">
                        <div class="col-xs-12">
													<?php foreach($imageData as $img){ ?>
														<div id="rmvimg_<?=$img->product_image_id?>" style="position: relative;display: inline-block;">
                              <a href="<?= base_url('/uploads/product/'.$img->product_image); ?>" target="_blank">
								  <img src="<?= base_url('/uploads/product/'.$img->product_image); ?>" class="pr_image">
							  </a>
                              <!-- <span class="remove" onclick="removeImage(<?=$img->product_image_id?>)">X</span> -->
                            </div>
													<?php } ?>
                        </div>
										</div>
										
										<?php }else{
											echo 'No images';
										} ?>
                  </div>
                          <?php } ?>
                  <!-- <div class="box-body">
                    <div class="input_fields_wrap row col-xs-12">
                      <div class="col-md-9">
                        <input type="file" class="form-control" placeholder="" id="product_image" name="product_image[]">
                      </div>
                      
                      <div class="col-md-3">
                         <button  type="button" class="form-control btn-sm btn-warning add_field_button"><i class="fa fa-plus"></i></button>
                      </div>
                      
                    </div>
                  </div> -->
          </div>
          </div>

           <a href="<?= base_url('/catlog/product'); ?>">
		   		<button type="button" class="btn btn-success pull-right">Back</button>
		   </a>
          
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
<!--   </div> -->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
