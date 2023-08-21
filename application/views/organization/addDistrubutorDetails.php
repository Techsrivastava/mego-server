    <?php
    $emp_id=$this->uri->segment(3);
    ?>
      <section class="content-header">
      <h1>
        DISTRIBUTOR
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li> 

        <li><a href="<?php echo base_url('organization/disributord')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-circle"></i> DISTRIBUTOR MANAGEMENT</a></li> 
       
        <li class="active" >DISTRIBUTOR PERSONAL | OWNERS DETAILSL</li>

      </ol>
    </section>
    <section class="content">
      <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/updateDistributordetailByAdmin'; ?>" method="post">
 
    <div class="row">

    <div class="col-xs-12" id="detail">
    
    
  
    <input type="hidden" class="form-control" value="1"  id="emp_frmLevel" name="emp_frmLevel"> 
          <div class="box">          
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">PERSONAL | OWNERS DETAILS - Kindly Fill All Buisness Owner Details</h3>
              <button type="button" class="btn btn-primary pull-right add_field_button" >ADD MORE</button> 
            </div>
            <div class="box-body">                  
                 <div class="col-md-3">
                <div class="form-group">
                  <label>TITLE<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                       <select class="form-control" id="emp_title" name="emp_title[]" >
                      <option>Select Title</option>
                      <option <?php if("Mr."==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Mr.">Mr.</option>
                      <option <?php if("Miss"==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Miss">Miss.</option>
                      <option <?php if("Mrs"==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Mrs">Mrs.</option>
                      <option <?php if("Dr."==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Dr.">Dr.</option>
                     
                    </select>

                      </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>NAME<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-building" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_NAME; ?>" placeholder="Enter Name" id="emp_name" name="emp_name[]" > 
                    <input type="hidden" class="form-control" value="<?php echo $empdata->PR_EMPLOYEE_ID; ?>" placeholder="Enter Name" id="emp_employeeid" name="emp_employeeid" > 

                       </div>
                </div>
                </div>
                
               
                <div class="col-md-3">
                <div class="form-group">
                  <label>MOBILE NO</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE; ?>" placeholder="Enter Mobile No" id="emp_mobile2" name="emp_mobile[]">    </div>
                </div>
                </div>
              
                 <div class="col-md-3">
                <div class="form-group">
                  <label>EMAIL ID 1</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_EMAIL; ?>" placeholder="Enter Email 1" id="emp_email" name="emp_email[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>EMAIL ID 2</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_EMAIL2; ?>" placeholder="Enter Email 2" id="emp_email2" name="emp_email2[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>EMERGENCY CONTACT NO</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_ECONTACT_NO; ?>" placeholder="Enter Emergency Contact No" id="emp_emergencymobile" name="emp_emergencymobile[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>EMERGENCY CONTACT PERSON NAME</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_ECONTACT_NAME; ?>" placeholder="Enter Contact Person Name" id="emp_emergencypersonname" name="emp_emergencypersonname[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>DOB</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="date" class="form-control" value="<?php echo $empdata->PR_DOB; ?>" placeholder="Enter " id="emp_dob" name="emp_dob[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>MARRIAGE DATE</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="date" class="form-control" value="<?php echo $empdata->PR_MARRIAGE_DATE; ?>" placeholder="Enter " id="emp_marriagedate" name="emp_marriagedate[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>AADHAR CARD NO</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_AADHAR; ?>" placeholder="Enter AAdhar Card No Name" id="emp_aadharno" name="emp_aadharno[]">    </div>
                </div>
                </div>
                  <div class="col-md-3">
                        <div class="form-group">
                          <label>AADHAR FILE</label>

                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_AADHAR_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_aadharfile" name="emp_aadharfile[]">    </div>
                         
                        </div>
                        </div> 
                          <div class="col-md-3">
                        <div class="form-group">
                          <label>PHOTOGRAPH</label>

                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_IMAGE; ?>" placeholder="Enter Aadhar Card No" id="emp_image" name="emp_image[]">    </div>
                         
                        </div>
                        </div> 

                          <div class="col-md-3">
                        <div class="form-group">
                          <label>DESIGNATION</label>

                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                 <select class="form-control" id="emp_desig" name="emp_desig[]" >
                      <option>Select Designation</option>
                      <option value="Partner">Partner</option>
                      <option value="Director">Director</option>
                      <option value="Properiter">Properiter</option>
                     
                    </select>
</div>
                         
                        </div>
                        </div> 

               
                  
              
            </div>
            <div class="input_attribute_wrap"></div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
        </div>   
       
      </div>
          <!-- /.box -->
     
                <div class="col-md-12">
                <div class="form-group">
             
                   <a href="<?php echo base_url('outer/addDistributPDetail'); ?>"><button type="submit" class="btn btn-info pull-right" >Submit</button></a>

                  <a href="<?php echo base_url().'outer/addDistributorBExp/'.$this->uri->segment(3).'/1'; ?>"><button type="button" class="btn btn-warning pull-right" style="margin-right:24px">Previous</button></a>
                </div>
                </div>  
               
          
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </form>
    </section>
   
    <script type="text/javascript">
function getothertext(tval)
{
  if(tval=="Other")
  {
  document.getElementById("otherdic").style.display = "block";
  }
  else
  {
   document.getElementById("otherdic").style.display = "none"; 
  }
}

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
  var wrapper       = $(".input_attribute_wrap"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID
  
  var x =0; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div class="box"><div class="box box-info"><h3 class="box-title"></h3></div><div class="box-body"><div class="col-md-3"><div class="form-group"><label>TITLE<sup style="color: red;">*</sup></label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button> </div><select class="form-control" id="emp_title" name="emp_title[]" ><option>Select Title</option><option <?php if("Mr."==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Mr.">Mr.</option><option <?php if("Miss"==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Miss">Miss.</option>option <?php if("Mrs"==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Mrs">Mrs.</option> <option <?php if("Dr."==$empdata->PR_TITLE){ echo "selected='selected'"; } ?> value="Dr.">Dr.</option></select> </div></div></div><div class="col-md-3"><div class="form-group"><label>NAME<sup style="color: red;">*</sup></label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-building" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="<?php echo $empdata->PR_NAME; ?>" placeholder="Enter Name" id="emp_name" name="emp_name[]" required="required"><input type="hidden" class="form-control" value="<?php echo $empdata->PR_EMPLOYEE_ID; ?>" placeholder="Enter Name" id="emp_employeeid" name="emp_employeeid" > </div> </div></div><div class="col-md-3"><div class="form-group"><label>MOBILE NO</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Mobile No" id="emp_mobile2" name="emp_mobile[]">    </div> </div></div><div class="col-md-3"><div class="form-group"><label>EMAIL ID 1</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button> </div><input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Email 1" id="emp_email" name="emp_email[]">    </div> </div></div><div class="col-md-3"><div class="form-group"><label>EMAIL ID 2</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button> </div><input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Email 2" id="emp_email2" name="emp_email2[]">    </div></div></div><div class="col-md-3"><div class="form-group"><label>EMERGENCY CONTACT NO</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Emergency Contact No" id="emp_emergencymobile" name="emp_emergencymobile[]">    </div> </div> </div><div class="col-md-3"><div class="form-group"> <label>EMERGENCY CONTACT PERSON NAME</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Contact Person Name" id="emp_emergencypersonname" name="emp_emergencypersonname[]">    </div></div></div><div class="col-md-3"><div class="form-group"> <label>DOB</label> <div class="input-group"><div class="input-group-btn"> <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div> <input type="date" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter " id="emp_dob" name="emp_dob[]">    </div></div></div><div class="col-md-3"><div class="form-group"><label>MARRIAGE DATE</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><input type="date" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter " id="emp_marriagedate" name="emp_marriagedate[]"></div></div></div><div class="col-md-3"><div class="form-group"><label>AADHAR CARD NO</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="<?php echo $empdata->PR_AADHAR; ?>" placeholder="Enter AAdhar Card No Name" id="emp_aadharno" name="emp_aadharno[]"></div></div></div><div class="col-md-3"> <div class="form-group"><label>AADHAR FILE</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button> </div><input type="file" class="form-control" value="<?php echo $empdata->PR_AADHAR_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_aadharfile" name="emp_aadharfile[]">    </div> </div> </div> <div class="col-md-3"><div class="form-group"><label>PHOTOGRAPH</label><div class="input-group"><div class="input-group-btn"> <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button> </div> <input type="file" class="form-control" value="<?php echo $empdata->PR_IMAGE; ?>" placeholder="Enter Aadhar Card No" id="emp_image" name="emp_image[]">    </div></div><div class="col-md-3"><div class="form-group"><label>DESIGNATION</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button></div> <select class="form-control" id="emp_desig" name="emp_desig[]" ><option>Select Designation</option> <option value="Partner">Partner</option> <option value="Director">Director</option><option value="Properiter">Properiter</option> </select></div></div></div> </div></div></div>'); 
      
         }
  });
  
  $(wrapper).on("click",".minus_attribute_button", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('span').remove(); x--;
  })
});
</script>
  