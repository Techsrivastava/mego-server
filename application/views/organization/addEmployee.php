   <?php //print_r($empdata); exit; ?>
    
    <section class="content-header">
      <h1>
        ADD EMPLOYEE DETAIL
        <!--<small>Add Category</small>--->
      </h1>
      <div class="col-xs-1">
      <!--  <button type="button" class="btn btn-block btn-warning btn-sm">Export</button>        -->
       </div>
       <div class="col-xs-1">      
      <!--  <button type="button" class="btn btn-block btn-info btn-sm">Import</button>   -->  
       </div>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url('Organization/users')."?token=".$this->session->userdata['sampark_session']['token']; ?>">Employee List</a></li>
        <li class="active" ><a href="#" >Add Employee</a></li>
      </ol>
    </section><br>
    <!-- Main content -->
    <section class="content">
		
     
    <div class="row">
    <div class="col-xs-12" id="detail">
    <?php
    if($this->uri->segment(3))
    {
    ?>
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/updateempdetail'; ?>" method="post">
    <?php
    }
    else
    {
    ?>
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addempdetail'; ?>" method="post">
    <?php
    }
    ?>
    <input type="hidden" class="form-control" value="1"  id="emp_frmLevel" name="emp_frmLevel"> 
          <div class="box">          
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">		
              <div class="col-md-3">
                <div class="form-group">
                  <label>WAREHOUSE<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-building-o"  aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_warehouse" name="emp_warehouse" required="required">
                      <option>Select Warehouse</option>
                      <?php
                      foreach ($warehouse as $warerow) 
                      {                        
                      ?>
                      <option <?php if($warerow->PR_WAREHOUSE_ID==$empdata->PR_WAREHOUSE_ID){ echo "selected='selected'"; } ?> value="<?php echo $warerow->PR_WAREHOUSE_ID; ?>"><?php echo $warerow->PR_WAREHOUSE_NAME; ?></option>
                      <?php                      
                      }
                      ?>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>DEPARTMENT<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-building-o"  aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_dept" name="emp_dept" onchange="getdeptdesignationdd($(this).val(),'emp_desigdata')" required="required">
                      <option>Select Department</option>
                      <?php
                      foreach ($department as $deptrow) 
                      {                        
                      ?>
                      <option <?php if($deptrow->PR_DEPARTMENT_ID==$empdata->PR_DEPARTMENT_ID){ echo "selected='selected'"; } ?> value="<?php echo $deptrow->PR_DEPARTMENT_ID; ?>"><?php echo $deptrow->PR_DEPARTMENT_NAME; ?></option>
                      <?php                      
                      }
                      ?>
                      
                    </select>

                  </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>DESIGNATION<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-id-card" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_desigdata" name="emp_desigdata" onchange="getdeptdesigemployee($(this).val(),'emp_reportmanager')" required="required">
                      <option>Select Designation</option>
                      <option value="<?php echo $empdata->PR_DESIGNATION_ID; ?>" selected="selected"><?php echo $empdata->ROLE_NAME; ?></option>
                    </select>

                  </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>REPORTING MANAGER<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-user" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_reportmanager" name="emp_reportmanager">
                      <option value="">Select Reporting Manager</option>
                      <option value="<?php echo $empdata->PR_REPORTING_MANAGER; ?>" selected="selected"><?php echo $empdata->REPORTING_MANAGER_NAME; ?></option>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>ANNUAL CTC<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-inr" aria-hidden="true"></i></button>
                    </div>
                    <input type="number" class="form-control" value="<?php echo $empdata->PR_CTC; ?>" placeholder="Enter Annual CTC" id="emp_ctc" name="emp_ctc" required="required"> 
                    

                       </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>EMPLOYEE NAME<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-user" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_NAME; ?>" placeholder="Enter Employee Name" id="emp_name" name="emp_name" required="required"> 
                    <input type="hidden" class="form-control" value="<?php echo $empdata->PR_EMPLOYEE_ID; ?>" placeholder="Enter Employee Name" id="emp_employeeid" name="emp_employeeid" > 

                       </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>PERSONAL EMAIL<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-envelope" aria-hidden="true"></i></button>
                    </div>
                    <input type="email" class="form-control" value="<?php echo $empdata->PR_EMAIL; ?>" placeholder="Enter Personal Email" id="emp_pemail" name="emp_pemail" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>COMPANY EMAIL</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-envelope" aria-hidden="true"></i></button>
                    </div>
                    <input type="email" class="form-control" value="<?php echo $empdata->PR_COMPANY_EMAIL; ?>" placeholder="Enter Company Email" id="emp_cemail" name="emp_cemail">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>MOBILE 1<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-phone" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE; ?>" placeholder="Enter Mobile No" id="emp_mobile1" name="emp_mobile1" required="required">  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>MOBILE 2</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-phone" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Mobile 2 No" id="emp_mobile2" name="emp_mobile2">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>GENDER<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-genderless" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_gender" name="emp_gender" required="required">
                      <option>Select Gender</option>
                      <option <?php if("Male"==$empdata->PR_GENDER){ echo "selected='selected'"; } ?> value="Male">Male</option>
                      <option <?php if("Female"==$empdata->PR_GENDER){ echo "selected='selected'"; } ?> value="Female">Female</option>
                      <option <?php if("Other"==$empdata->PR_GENDER){ echo "selected='selected'"; } ?> value="Other">Other</option>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>EMERGENCY CONTACT NO<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-volume-control-phone" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_EMERGENCY_CONTACT_NO; ?>" placeholder="Enter Emegency Contact No" id="emp_emergencyno" name="emp_emergencyno" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>EMERGENCY CONTACT RELATION<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-users" aria-hidden="true"></i></button>
                    </div>
                    <select class="form-control" id="emp_relation" name="emp_relation" onchange="getothertext(this.value);" required="required">
                      <option value="">Select Relation</option>
                      <option  <?php if("Father"==$empdata->PR_EMERGENCY_RELATION){ echo "selected='selected'"; } ?>  value="Father">Father</option>
                      <option  <?php if("Mother"==$empdata->PR_EMERGENCY_RELATION){ echo "selected='selected'"; } ?>  value="Mother">Mother</option>
                      <option  <?php if("Brother"==$empdata->PR_EMERGENCY_RELATION){ echo "selected='selected'"; } ?>  value="Brother">Brother</option>
                      <option  <?php if("Sister"==$empdata->PR_EMERGENCY_RELATION){ echo "selected='selected'"; } ?> value="Sister">Sister</option>
                      <option  <?php if("Uncle"==$empdata->PR_EMERGENCY_RELATION){ echo "selected='selected'"; } ?> value="Uncle">Uncle</option>
                      <option  <?php if("Wife"==$empdata->PR_EMERGENCY_RELATION){ echo "selected='selected'"; } ?> value="Wife">Wife</option>
                      <option  <?php if("Other"==$empdata->PR_EMERGENCY_RELATION){ echo "selected='selected'"; } ?> value="Other">Other</option>                      
                    </select>
                     </div>
                </div>
                </div>
                <div class="col-md-3" id="otherdic" <?php if($empdata->PR_EMERGENCY_RELATION=="Other"){ }else{ echo 'style="display: none;"'; } ?>>
                <div class="form-group">
                  <label>OTHER RELATION</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-universal-access" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_OTHER_RELATION; ?>" placeholder="Enter  Other Relation" id="emp_otherrelativename" name="emp_otherrelativename">    </div>
                </div>
                </div>

                <div class="col-md-3">
                <div class="form-group">
                  <label>EMERGENCY RELATIVE CONTACT NAME<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-universal-access" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_EMERGENCY_RELATION_NAME; ?>" placeholder="Enter  Relative Name" id="emp_relativename" name="emp_relativename" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>DATE OF BIRTH<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    <input type="date" class="form-control" value="<?php echo $empdata->PR_DOB; ?>" placeholder="" id="emp_dob" name="emp_dob" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>BLOOD GROUP</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-medkit" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_BLOOD_GROUP; ?>" placeholder="Enter Blood Group" id="emp_bloodgroup" name="emp_bloodgroup">    
                  </div>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                <br>
                  <button type="submit" class="btn btn-info pull-right" >Next</button>
                </div>
                </div>  
               
                  
              
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
        </div>   
      </form>   
      </div>
          <!-- /.box -->
    
          
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
      $(wrapper).append('<div class="col-sm-3"><div class="form-group"><label>COMPANY NAME</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-building-o" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="" placeholder="Enter Company Name" id="emp_compname" name="emp_compname[]"></div></div></div><div class="col-sm-3"><div class="form-group"><label>ADDRESS</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-map" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="" placeholder="Enter Address" id="emp_compaddress" name="emp_compaddress[]"></div></div></div><div class="col-sm-2"><div class="form-group"><label>OFFER LETTER</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button></div><input type="file" class="form-control" value=""  id="emp_offerletter" name="emp_offerletter[]"></div> </div></div><div class="col-sm-2"><div class="form-group"><label>SALARY SLIP</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button></div><input type="file" class="form-control" value="" id="emp_salaryslip" name="emp_salaryslip[]"></div></div></div><div class="col-sm-2"><div class="form-group"><label>LEAVING LETTER</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button></div><input type="file" class="form-control" value=""  id="emp_compleavingletter" name="emp_compleavingletter[]"></div></div></div><div class="col-sm-3"><div class="form-group"><label>LAST CTC</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-building-o" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="" placeholder="Enter Last Company CTC" id="emp_compctc" name="emp_compctc[]"></div></div></div><div class="col-sm-3"><div class="form-group"><label>START DATE </label><div class="input-group"> <div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-calendar-o" aria-hidden="true"></i></button> </div><input type="date" class="form-control" value="" id="emp_startfrom" name="emp_startfrom[]"> </div> </div></div><div class="col-sm-3"><div class="form-group"><label>LAST DATE</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-calendar" aria-hidden="true"></i></button> </div><input type="date" class="form-control" value="" placeholder="" id="emp_to" name="emp_to[]"> </div> </div> </div><div class="col-sm-3"><div class="form-group"> <label>APPOINTMENT TERM</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-list" aria-hidden="true"></i></button></div><select class="form-control" id="emp_dept" name="emp_dept"><option>Select Appointment Term</option><option value="Trainee">Trainee</option><option value="Freelancer">Freelancer</option><option value="Contractual">Contractual</option><option value="Dailybasis">Dailybasis</option><option value="Permanent">Permanent</option></select></div></div></div>  '); 
      
         }
  });
  
  $(wrapper).on("click",".minus_attribute_button", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('span').remove(); x--;
  })
});
</script>
  