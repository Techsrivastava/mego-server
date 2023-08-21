    <section class="content-header">
      <h1>
       RETAILER ORDER FORM
        <!--<small>Add Category</small>--->
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li> 

        <li><a href="<?php echo base_url('organization/retailer')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-circle"></i> RETAILER MANAGEMENT</a></li> 
       
        <li class="active" >RETAILER ORDER FORM</li>

      </ol>
    </section>

    <style type="text/css">
      tr.noBorder td {
        border: 0;
      }
    </style>
    <!-- Main content -->
    <section class="content">
       <form enctype="multipart/form-data" action="<?php echo base_url() . 'order/addRetailerOrderForm'; ?>" method="post">
      
      <div class="row">
        <div class="col-xs-12">




          <div class="box">
            <div class="box-header">
              <select class="form-control select2" id="retailerid" name="retailerid" onchange="getCatProduct($(this).val(),'product_packs')" >
                      <option>Select Retailer</option>
                      <?php foreach ($retailerList as $retailerprow){ ?>
                        <option value="<?= $retailerprow->PR_EMPLOYEE_ID ?>">
                          <?= $retailerprow->PR_NAME ?> (<?= $retailerprow->PR_PHONE ?>)  (<?= $retailerprow->PR_EMAIL?>)
                        </option>
                      <?php } ?>
                    </select>
                    
                   
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1333" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th ></th>
                  <th style="width:22%">PRODUCT</th>
                  <th style="width:26%">AVAILABLE PRODUCUT PACK</th>
                  <th style="width:12%">QUANTITY</th>                 
                  <th style="width:12%">PRICE</th>
                  <th >TOTAL PRICE<button type="button" class="btn btn-info pull-right add_attribute_button  btn-sm" >ADD MORE</button> </th>                 
                </tr>
                </thead>
                <tbody class="input_attribute_wrap">
              
                <tr>
                   <td></td>
                   <td> <select class="form-control select2" id="prd_category" name="prd_category[]" onchange="getCatProduct($(this).val(),'product_packs')" >
                      <option>Select Product</option>
                      <?php foreach ($catproductList as $cprow){ ?>
                        <option value="<?= $cprow->PR_PRD_CAT_ID ?>">
                          <?= $cprow->PR_PRODUCT_NAME ?>
                        </option>
                      <?php } ?>
                    </select>
                    </td>
                   <td><select class="form-control select2" id="product_packs" name="product_packs[]">
                      <option>Select Product Packs</option>
                    
                    </select>
                  </td>
                   <td>
                     <input type="text" class="form-control" value=""  id="product_qty" name="product_qty[]" onkeyup="getRePrductQtyCount(this.value,'no_of_piecesCOunt','pprice','subprice','');" placeholder="Enter Qty" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" >    

                   </td>
                   <td>

                     <input type="text" class="form-control" value="" placeholder=" Price" id="pprice" name="pprice[]" readonly="readonly">    

                   </td>
                   <td><input type="text" class="form-control" value="" placeholder="" id="subprice" name="subprice[]" readonly="readonly">    </td>
                </tr>

                              
                </tbody>
                <!-- <tfoot>
                <tr class="noBorder">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="text-align: right;">SUB TOTAL</th>
                  <th></th>
                </tr>
                 <tr class="noBorder">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="text-align: right;">GST</th>
                  <th></th>
                </tr>
                <tr class="noBorder">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th style="text-align: right;">TOTAL</th>
                  <th></th>
                </tr>
                </tfoot> -->
              </table>

           <button type="submit" class="btn btn-primary pull-right" style="margin-right:70px;">Submit</button>
          
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
 <!-- DESIGNATION Modal -->
  <div class="modal" id="editmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  method="POST" role="form" enctype="multipart/form-data" action="<?php echo base_url() . 'organization/designationUpdate' ?>">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#2874f0; ">
            <h4 class="modal-title" style="color:#ffffff;">EDIT DESIGNATION</h4>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="editdiv"></div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- DESIGNATION Modal End -->
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
      var ppricee="'pprice"+x+"'";
      var subp="'subprice"+x+"'";
      $(wrapper).append('<tr><td></td><td> <select class="form-control" id="prd_category'+x+'" name="prd_category[]" onchange="getCatProduct($(this).val(),'+t+');" ><option>Select </option><?php foreach ($catproductList as $cprow){ ?>
                        <option value="<?= $cprow->PR_PRD_CAT_ID ?>"><?= $cprow->PR_PRODUCT_NAME ?></option><?php } ?>
                    </select></td><td><select class="form-control" id="product_packs'+x+'" name="product_packs[]"><option>Select </option></select></td> <td> <input type="text" class="form-control" value=""  id="product_qty'+x+'" name="product_qty[]" onkeyup="getRePrductQtyCount(this.value,'+cou+','+ppricee+','+subp+','+x+');" placeholder="Enter Qty" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" >   </td>   </td><td><input type="text" class="form-control" value="" placeholder=" Price" id="pprice'+x+'" name="pprice[]" readonly="readonly">   </td><td><input type="text" class="form-control" value="" placeholder="" id="subprice'+x+'" name="subprice[]" readonly="readonly"></td></tr>'); 


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
