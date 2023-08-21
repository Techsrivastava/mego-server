    <?php
    $emp_id=$this->uri->segment(3);
    ?>
    <section class="content-header">
      <h1>
       &nbsp;&nbsp;&nbsp;ADD DISTRIBUTOR
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li> 

        <li><a href="<?php echo base_url('organization/disributord')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-circle"></i> DISTRIBUTOR MANAGEMENT</a></li> 
       
        <li class="active" >DISTRIBUTOR FIRM DETAIL</li>

      </ol>
    </section>
    <section class="content">
		 
     
    <div class="row">

    <div class="col-xs-12" id="detail">
    
     <?php
    if($this->uri->segment(3))
    {
    ?>
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/updatedistributordtlByAdmin'; ?>" method="post">
 
    <?php
    }
    else
    {
    ?>
     <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/adddistributordtlByAdmin'; ?>" method="post">
 
    <?php
    }
    ?>
   
    <input type="hidden" class="form-control" value="1"  id="emp_frmLevel" name="emp_frmLevel"> 
     <div class="col-md-12">
          <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">ASSIGN</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                        
                
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
                <br><br>
                        
                    </div>
                  </div>
          </div>
          </div>

              <div class="col-md-6">
          <div class="box box-warning">
                  <div class="box-header with-border">
                    <h3 class="box-title">FIRM DETAIL</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                        
                <div class="col-md-6">
                <div class="form-group">
                  <label>FIRM NAME<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-user" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_NAME; ?>" placeholder="Enter Firm Name" id="emp_name" name="emp_name" required="required"> 
                    <input type="hidden" class="form-control" value="<?php echo $emp_id; ?>" placeholder="Enter Firm Name" id="emp_employeeid" name="emp_employeeid" > 

                       </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>EMAIL<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-envelope" aria-hidden="true"></i></button>
                    </div>
                    <input type="email" class="form-control" value="<?php echo $empdata->PR_EMAIL; ?>" placeholder="Enter  Email" id="emp_email" name="emp_email" required="required">    </div>
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <label>MOBILE 1<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-phone" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE; ?>" placeholder="Enter Mobile No" id="emp_mobile1" name="emp_mobile1" required="required">  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>MOBILE 2</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-phone" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Mobile 2 No" id="emp_mobile2" name="emp_mobile2">    </div>
                </div>
                </div>
              
              
                   <div class="col-md-6">
                <div class="form-group">
                  <label>LAND LINE NO</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_LAND_LINE_NO; ?>" placeholder="Enter Land Line No" id="emp_landline" name="emp_landline">    </div>
                </div>
                </div>
                 <div class="col-md-6">
                <div class="form-group">
                  <label>FAX NO</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_FAX_NO; ?>" placeholder="Enter FAX NO" id="emp_faxno" name="emp_faxno">    </div>
                </div>
                </div>
                 
               
                <div class="col-md-6">
                <div class="form-group">
                  <label>FIRM TYPE<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-users" aria-hidden="true"></i></button>
                    </div>
                    <select class="form-control" id="emp_firmtype" name="emp_firmtype" onchange="getothertext(this.value);" required="required">
                      <option value="">Select Firm Type</option>
                      <option  <?php if("PVT LTD."==$empdata->PR_FIRM_TYPE){ echo "selected='selected'"; } ?>  value="PVT LTD.">PVT LTD.</option>
                      <option  <?php if("Proprietorship"==$empdata->PR_FIRM_TYPE){ echo "selected='selected'"; } ?>  value="Proprietorship">Proprietorship</option>
                      <option  <?php if("LLP"==$empdata->PR_FIRM_TYPE){ echo "selected='selected'"; } ?>  value="LLP">LLP</option>
                      <option  <?php if("Partnership"==$empdata->PR_FIRM_TYPE){ echo "selected='selected'"; } ?> value="Partnership">Partnership</option>
                      <option  <?php if("Limited"==$empdata->PR_FIRM_TYPE){ echo "selected='selected'"; } ?> value="Limited">Limited</option>
                      
                     <option  <?php if("Other"==$empdata->PR_FIRM_TYPE){ echo "selected='selected'"; } ?> value="Other">Other</option>                      
                    </select>
                     </div>
                </div>
                </div>
                <div class="col-md-6" id="otherdic" <?php if($empdata->PR_FIRM_TYPE=="Other"){ }else{ echo 'style="display: none;"'; } ?>>
                <div class="form-group">
                  <label>OTHER FIRM NAME</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-universal-access" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_OTHER_FIRM_TYPE; ?>" placeholder="Enter  Other Firm Name" id="emp_otherfirmname" name="emp_otherfirmname">    </div>
                </div>
                </div>
                <br><br>
                        
                    </div>
                  </div>
          </div>
          </div>


          <div class="col-md-6">
          <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">FIRM REGISTERED ADDRESS</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                      <div class="col-md-6">
                <div class="form-group">
                  <label>COUNTRY<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-flag-o" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" onchange="getstate($(this).val(),'emp_presentstate')"  id="emp_presentcountry" name="emp_presentcountry">
                      <option>Select Country</option>
                      <?php 
                      foreach ($country as $crow) {
                      ?>
                      <option <?php if($empdata->PR_PRESENT_COUNTRY==$crow->id){ echo "selected='selected'"; } ?> value="<?php echo $crow->id; ?>" ><?php echo $crow->name; ?></option>
                      <?php
                      }
                      ?>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>STATE<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-certificate" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_presentstate" name="emp_presentstate" onchange="getcity($(this).val(),'emp_presentcity')">
                      <option>Select State</option>
                      <option value="<?php echo $empdata->PR_PRESENT_STATE; ?>" selected="selected"><?php echo $empdata->PR_PRESENT_STATE_NAME; ?></option>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>CITY<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-circle" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_presentcity" name="emp_presentcity">
                      <option>Select City</option>
                      <option value="<?php echo $empdata->PR_PRESENT_CITY; ?>" selected="selected"><?php echo $empdata->PR_PRESENT_CITY_NAME; ?></option>          
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>PINCODE<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-stop-circle-o" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PRESENT_PINCODE; ?>" placeholder="Enter Pincode" id="emp_presentpincode" name="emp_presentpincode">   

                   </div>
                </div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="email1">FULL ADDRESS<sup style="color: red;">*</sup></label>
                  <textarea class="form-control" required="required"  rows="5" id="present_address" name="present_address" placeholder="Enter  Address" spellcheck="false"><?php echo $empdata->PR_PRESENT_ADDRESS; ?></textarea>
                  <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
                </div>               
              </div>
            </div>
          </div>
          </div>


                 <div class="col-md-6">
          <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">FIRM DOCUMENT</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>GSTIN NO<sup style="color: red;">*</sup></label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-address-card" aria-hidden="true"></i></button>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $empdata->PR_GST_NO; ?>" placeholder="Enter GSTIN  No" id="emp_gstno" name="emp_gstno">    </div>
                        </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                          <label>GSTIN FILE<sup style="color: red;">*</sup></label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_AADHAR_FILE; ?>" placeholder="Enter GSTIN No" id="emp_gstinfile" name="emp_gstinfile">
                             <?php
                            if($empdata->PR_GST_FILE)
                            {
                            ?>
                            <div class="input-group-btn">
                              <a target="_blank" href="<?php echo base_url()."assets/upload_image/user/".$empdata->PR_GST_FILE; ?>"><button type="button" class="btn btn-primary"  ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            </div>  
                            <?php
                            }
                            ?> 

                          </div>
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PANCARD NO</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-id-card" aria-hidden="true"></i></button>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $empdata->PR_PANCARD; ?>" placeholder="Enter PanCard No" id="emp_pancardno" name="emp_pancardno"  maxlength="10" min="0" max="99">    </div>
                        </div>
                        </div>   
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PANCARD FILE</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_PANCARD_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_pancardfile" name="emp_pancardfile">    
                             <?php
                            if($empdata->PR_PANCARD_FILE)
                            {
                            ?>   
                            <div class="input-group-btn">
                              <a target="_blank" href="<?php echo base_url()."assets/upload_image/user/".$empdata->PR_PANCARD_FILE; ?>"><button type="button" class="btn btn-primary"  ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            </div> 
                            <?php
                            }
                            ?> 
                          </div>
                        </div>
                        </div>  
                       
                        
                    </div>
                  </div>
          </div>
          </div>


           <div class="col-md-6">
          <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">FIRM BANK DETAIL</h3>
                  </div>
                 
                 
                  <div class="box-body">
              
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>BANK NAME</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-bank" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empdata->PR_BANK_NAME; ?>" placeholder="Enter Bank Name" id="emp_bankname" name="emp_bankname">    </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <label>IFSC CODE</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-code" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empdata->PR_IFSC_CODE; ?>" placeholder="Enter IFSC Code" id="emp_ifsccode" name="emp_ifsccode">    </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <label>ACCOOUNT NO</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empdata->PR_BANK_ACCOUNT_NO; ?>" placeholder="Enter Account No" id="emp_accountno" name="emp_accountno">    </div>
                          </div>
                          </div>  
                            <div class="col-md-6">
                        <div class="form-group">
                          <label>CANCELLED CHECK</label>

                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_BANK_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_bankfile" name="emp_bankfile">    
                             <?php
                            if($empdata->PR_PANCARD_FILE)
                            {
                            ?>  
                            <div class="input-group-btn">
                               <a target="_blank" href="<?php echo base_url()."assets/upload_image/user/".$empdata->PR_BANK_FILE; ?>"><button type="button" class="btn btn-primary"  ><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            </div>   
                            <?php
                            }
                            ?>
                          </div>
                         
                        </div>
                        </div>   
                             
         
                     
                   
                  </div>
          </div>
          </div>
                <div class="col-md-12">
                <div class="form-group">
                <br>
                 <a href="<?php echo base_url('outer/addDistributorBExp'); ?>"><button type="submit" class="btn btn-info pull-right" >Next</button></a> 
                </div>
                </div>  
               
                  
              
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
        </div>   
      </form>   
    
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
  