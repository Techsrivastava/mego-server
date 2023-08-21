    <section class="content-header">
      <h1>
        ADD EMPLOYEE ADDRESS | DOCUMENTS | BANK DETAIL
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
        <li ><a href="<?php echo base_url('organization/product')."?token=".$this->session->userdata['sampark_session']['token']; ?>">Employee List</a></li>
        <li class="active" ><a href="#" >Add Employee</a></li>
      </ol>
    </section><br>
    <!-- Main content -->
    <section class="content">
		
     
      <div class="row">
    
    
      <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addemployeeaddress'; ?>" method="post">
      <input type="hidden" class="form-control" value="<?php echo $empdata->PR_EMPLOYEE_ID; ?>"  id="emp_employeeid" name="emp_employeeid" > 
      <input type="hidden" class="form-control" value="3"  id="emp_frmLevel" name="emp_frmLevel"> 
          <div class="col-md-6" >
          <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">PRESENT ADDRESS</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                      <div class="col-md-6">
                <div class="form-group">
                  <label>COUNTRY</label>
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
                  <label>STATE</label>
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
                  <label>CITY</label>
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
                  <label>PINCODE</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-stop-circle-o" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PRESENT_PINCODE; ?>" placeholder="Enter Pincode" id="emp_presentpincode" name="emp_presentpincode">   

                   </div>
                </div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="email1">PRESENT ADDRESS</label>
                  <textarea class="form-control" required="required"  rows="3" id="present_address" name="present_address" placeholder="Enter Present Address" spellcheck="false"><?php echo $empdata->PR_PRESENT_ADDRESS; ?></textarea>
                  <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
                </div>               
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="box box-info">
                  <div class="box-header with-border">
                    <div class="col-md-6 col-lg-6 col-xs-6  col-sm-6 text-left">
                      <h3 class="box-title">PERMANENT ADDRESS</h3>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xs-6  col-sm-6 text-right">
                      <h3 class="box-title"><input type="checkbox" id="addrcheckbox" name="addrcheckbox" class="minimal-red" onclick="getaddress()">&nbsp; Same as Present Address</h3>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                      <div class="col-md-6">
                <div class="form-group">
                  <label>COUNTRY</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-flag-o" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control"  id="emp_permanentcountry" name="emp_permanentcountry" onchange="getstate($(this).val(),'emp_permanentstate')"  >
                      <option>Select Country</option>
                      <?php 
                      foreach ($country as $crow) {
                      ?>
                      <option <?php if($empdata->PR_PERMANENT_COUNTRY==$crow->id){ echo "selected='selected'"; } ?> value="<?php echo $crow->id; ?>" ><?php echo $crow->name; ?></option>
                      <?php
                      }
                      ?>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>STATE</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-certificate" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_permanentstate" name="emp_permanentstate" onchange="getcity($(this).val(),'emp_permanentcity')">
                      <option>Select State</option>
                       <option value="<?php echo $empdata->PR_PERMANENT_STATE; ?>" selected="selected"><?php echo $empdata->PR_PEMANENT_STATE_NAME; ?></option>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>CITY</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-circle" aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control" id="emp_permanentcity" name="emp_permanentcity">
                      <option>Select City</option>
                       <option value="<?php echo $empdata->PR_PERMANENT_CITY; ?>" selected="selected"><?php echo $empdata->PR_PERMANNENT_CITY_NAME; ?></option>
                      
                    </select>

                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>PINCODE</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-stop-circle-o" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_PERMANENT_PINCODE; ?>" placeholder="Enter Pincode" id="emp_permanentpincode" name="emp_permanentpincode">    </div>
                </div>
                </div>
                
                <div class="col-md-12 form-group">
                  <label for="email1">PERMANENT ADDRESS</label>
                  <textarea class="form-control" required="required"  rows="3" id="permanent_address" name="permanent_address" placeholder="Enter Permanent Address" spellcheck="false"><?php echo $empdata->PR_PERMANENT_ADDRESS; ?></textarea>
                  <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
                </div>        
                         
                        
                    </div>
                  </div>
          </div>
          </div>
         
     

          
           <div class="col-md-6">
          <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">PERSONAL DOCUMENT</h3>
                  </div>
                  <div class="box-body">
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>AADHAR CARD NO</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-address-card" aria-hidden="true"></i></button>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $empdata->PR_AADHAR_CARD; ?>" placeholder="Enter Aadhar Card No" id="emp_aadharno" name="emp_aadharno">    </div>
                        </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                          <label>AADHAR CARD FILE</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_AADHAR_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_aadharfile" name="emp_aadharfile">    </div>
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PANCARD NO</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-id-card" aria-hidden="true"></i></button>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $empdata->PR_PANCARD; ?>" placeholder="Enter PanCard No" id="emp_pancardno" name="emp_pancardno">    </div>
                        </div>
                        </div>   
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PANCARD FILE</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_PANCARD_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_pancardfile" name="emp_pancardfile">    </div>
                        </div>
                        </div>  
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>CV | RESUME </label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_CV_FILE; ?>" placeholder="" id="emp_resumefile" name="emp_resumefile">    </div>
                        </div>
                        </div> 
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PHOTOGRAPH</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                          <input type="file" class="form-control" value="<?php echo $empdata->PR_IMAGE; ?>" placeholder="" id="emp_image" name="emp_image">    </div>
                        </div>
                        </div>           
                         
                        
                    </div>
                  </div>
          </div>
          </div>
          <div class="col-xs-6">
          <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">BANK DETAIL</h3>
                  </div>
                 
                 
                  <div class="box-body">
                 <div class="row ">
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
                          <label>FILE</label>

                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_BANK_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_bankfile" name="emp_bankfile">    </div>
                            <small style="color:#5bc0de;">Cancelled Check or Bank Passbook</small>
                        </div>
                        </div>   
                        <div class="col-md-6 pull-right" >
                        <div class="form-group">
                          <br>
                          <button type="submit" class="btn btn-info pull-right" >Next</button>
                          
                             <a href="<?php echo base_url().'organization/addEmployee/'.$this->uri->segment(3).'/1?token='.$this->session->userdata['sampark_session']['token']; ?>"><button type="button" class="btn btn-warning pull-left" style="margin-right:24px">Previous</button></a>
                             
                        </div>
                        </div>        
         
                    </div>   
                   
                  </div>
          </div>
          </div>
        </form>
      </div>
       
    </section>
    <script type="text/javascript">
function getaddress()
{
  if (addrcheckbox.checked == 1){
      //alert("checked") ;
      //$('#permanentaddr').attr('disabled', true);
     
      var country = document.getElementById("emp_presentcountry").value;

      var state = document.getElementById("emp_presentstate").value;
      var statetext = $("#emp_presentstate :selected").text();

      var city = document.getElementById("emp_presentcity").value;
      var citytext = $("#emp_presentcity :selected").text();
      
      var pincode = document.getElementById("emp_presentpincode").value;
      var address = document.getElementById("present_address").value;
      $('#emp_permanentcountry').val(country);
      //$('#emp_permanentstate').val(state);

      document.getElementById("emp_permanentstate").innerHTML = '<option value="'+state+'">'+statetext+'</option>';
      document.getElementById("emp_permanentcity").innerHTML = '<option value="'+city+'">'+citytext+'</option>';
     // $('#emp_permanentcity').val(city);
      $('#emp_permanentpincode').val(pincode);
      $('#permanent_address').val(address);
      
    } 
    else 
    {
      //alert("You didn't check it! Let me check it for you.");
      var country = document.getElementById("emp_presentcountry").value;
      var state = document.getElementById("emp_presentstate").value;
      var statetext = $("#emp_presentstate :selected").text();
      var city = document.getElementById("emp_presentcity").value;
      var citytext = $("#emp_presentcity :selected").text();
      
      var pincode = document.getElementById('').value;
      var address = document.getElementById('').value;
      $('#emp_permanentcountry').val('');      
      document.getElementById("emp_permanentstate").innerHTML = '';
      document.getElementById("emp_permanentcity").innerHTML = '';    
      $('#emp_permanentpincode').val('');
      $('#permanent_address').val('');

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
  