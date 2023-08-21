   <?php //print_r($empdata); exit; ?>

    <section class="content-header">
      <h1>
        View EMPLOYEE DETAIL
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
        <li class="active" ><a href="#" >View Employee</a></li>
      </ol>
    </section><br>
    <!-- Main content -->
    <section class="content">
		
     
    <div class="row">
    <div class="col-xs-12" id="detail">
    
          <div class="box">          
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">		
                <div class="col-md-3">
                <div class="form-group">
                  <label>DEPARTMENT<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default" ><i class="fa fa-building-o"  aria-hidden="true"></i></button>
                    </div>
                    <!-- /btn-group -->
                    <select class="form-control"disabled="disabled"id="emp_dept" name="emp_dept" onchange="getdeptdesignationdd($(this).val(),'emp_desigdata')" required="required">
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
                    <select class="form-control" id="emp_desigdata"disabled="disabled"name="emp_desigdata" onchange="getdeptdesigemployee($(this).val(),'emp_reportmanager')" required="required">
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
                    <select class="form-control" id="emp_reportmanager"disabled="disabled"name="emp_reportmanager" required="required">
                      <option value="">Select Reporting Manager</option>
                      <option value="<?php echo $empdata->PR_REPORTING_MANAGER; ?>" selected="selected"><?php echo $empdata->REPORTING_MANAGER_NAME; ?></option>
                      
                    </select>

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
                    <input type="text" class="form-control"disabled="disabled"value="<?php echo $empdata->PR_NAME; ?>" placeholder="Enter Employee Name" id="emp_name" name="emp_name" required="required"> 
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
                    <input type="email" class="form-control"disabled="disabled"value="<?php echo $empdata->PR_EMAIL; ?>" placeholder="Enter Personal Email" id="emp_pemail" name="emp_pemail" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>COMPANY EMAIL</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-envelope" aria-hidden="true"></i></button>
                    </div>
                    <input type="email" class="form-control" disabled="disabled"value="<?php echo $empdata->PR_COMPANY_EMAIL; ?>" placeholder="Enter Company Email" id="emp_cemail" name="emp_cemail">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>MOBILE 1<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-phone" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control"disabled="disabled"value="<?php echo $empdata->PR_PHONE; ?>" placeholder="Enter Mobile No" id="emp_mobile1" name="emp_mobile1" required="required">  </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>MOBILE 2</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-phone" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Mobile 2 No" id="emp_mobile2" name="emp_mobile2">    </div>
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
                    <select class="form-control" disabled="disabled" id="emp_gender" name="emp_gender" required="required">
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
                    <input type="text" disabled="disabled" class="form-control" value="<?php echo $empdata->PR_EMERGENCY_CONTACT_NO; ?>" placeholder="Enter Emegency Contact No" id="emp_emergencyno" name="emp_emergencyno" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>EMERGENCY CONTACT RELATION<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-users" aria-hidden="true"></i></button>
                    </div>
                    <select class="form-control" disabled="disabled" id="emp_relation" name="emp_relation" onchange="getothertext(this.value);" required="required">
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
                    <input type="text" disabled="disabled"class="form-control" value="<?php echo $empdata->PR_OTHER_RELATION; ?>" placeholder="Enter  Other Relation" id="emp_otherrelativename" name="emp_otherrelativename">    </div>
                </div>
                </div>

                <div class="col-md-3">
                <div class="form-group">
                  <label>EMERGENCY RELATIVE CONTACT NAME<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-universal-access" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" disabled="disabled"class="form-control" value="<?php echo $empdata->PR_EMERGENCY_RELATION_NAME; ?>" placeholder="Enter  Relative Name" id="emp_relativename" name="emp_relativename" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>DATE OF BIRTH<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-calendar" aria-hidden="true"></i></button>
                    </div>
                    <input type="date" disabled="disabled"class="form-control" value="<?php echo $empdata->PR_DOB; ?>" placeholder="" id="emp_dob" name="emp_dob" required="required">    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>BLOOD GROUP</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-medkit" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" disabled="disabled" class="form-control" value="<?php echo $empdata->PR_BLOOD_GROUP; ?>" placeholder="Enter Blood Group" id="emp_bloodgroup" name="emp_bloodgroup">    
                  </div>
                </div>
                </div>
               
               
                  
              
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
        </div>   
      </form>   
      </div>
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
                    <select class="form-control" disabled="disabled"  onchange="getstate($(this).val(),'emp_presentstate')"  id="emp_presentcountry" name="emp_presentcountry">
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
                    <select class="form-control" disabled="disabled"  id="emp_presentstate" name="emp_presentstate" onchange="getcity($(this).val(),'emp_presentcity')">
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
                    <select class="form-control"  disabled="disabled" id="emp_presentcity" name="emp_presentcity">
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
                    <input type="text"  disabled="disabled" class="form-control" value="<?php echo $empdata->PR_PRESENT_PINCODE; ?>" placeholder="Enter Pincode" id="emp_presentpincode" name="emp_presentpincode">   

                   </div>
                </div>
                </div>
                <div class="col-md-12 form-group">
                  <label for="email1">PRESENT ADDRESS</label>
                  <textarea class="form-control"  disabled="disabled" required="required"  rows="3" id="present_address" name="present_address" placeholder="Enter Present Address" spellcheck="false"><?php echo $empdata->PR_PRESENT_ADDRESS; ?></textarea>
                  <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
                </div>               
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">PERMANENT ADDRESS</h3>
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
                    <select class="form-control"  disabled="disabled"  id="emp_permanentcountry" name="emp_permanentcountry" onchange="getstate($(this).val(),'emp_permanentstate')"  >
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
                    <select class="form-control" disabled="disabled"  id="emp_permanentstate" name="emp_permanentstate" onchange="getcity($(this).val(),'emp_permanentcity')">
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
                    <select class="form-control"  disabled="disabled" id="emp_permanentcity" name="emp_permanentcity">
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
                    <input type="text" disabled="disabled"  class="form-control" value="<?php echo $empdata->PR_PERMANENT_PINCODE; ?>" placeholder="Enter Pincode" id="emp_permanentpincode" name="emp_permanentpincode">    </div>
                </div>
                </div>
                
                <div class="col-md-12 form-group">
                  <label for="email1">PERMANENT ADDRESS</label>
                  <textarea class="form-control"  disabled="disabled" required="required"  rows="3" id="permanent_address" name="permanent_address" placeholder="Enter Permanent Address" spellcheck="false"><?php echo $empdata->PR_PERMANENT_ADDRESS; ?></textarea>
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
                            <input type="text" disabled="disabled"  class="form-control" value="<?php echo $empdata->PR_AADHAR_CARD; ?>" placeholder="Enter Aadhar Card No" id="emp_aadharno" name="emp_aadharno">    </div>
                        </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                          <label>AADHAR CARD FILE</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button"  disabled="disabled" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_AADHAR_FILE; ?>" placeholder="Enter Aadhar Card No"  disabled="disabled" id="emp_aadharfile" name="emp_aadharfile">    </div>
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PANCARD NO</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-id-card" aria-hidden="true"></i></button>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $empdata->PR_PANCARD; ?>" placeholder="Enter PanCard No" disabled="disabled"  id="emp_pancardno" name="emp_pancardno">    </div>
                        </div>
                        </div>   
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PANCARD FILE</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_PANCARD_FILE; ?>" placeholder="Enter Aadhar Card No" disabled="disabled"  id="emp_pancardfile" name="emp_pancardfile">    </div>
                        </div>
                        </div>  
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>CV | RESUME </label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_CV_FILE; ?>" placeholder="" id="emp_resumefile"  disabled="disabled" name="emp_resumefile">    </div>
                        </div>
                        </div> 
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>PHOTOGRAPH</label>
                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button"  disabled="disabled" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                          <input type="file" class="form-control" value="<?php echo $empdata->PR_IMAGE; ?>" placeholder="" id="emp_image" name="emp_image" disabled="disabled" >    </div>
                        </div>
                        </div>           
                         
                        
                    </div>
                  </div>
          </div>
          </div>
          <div class="col-md-6">
          <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">BANK DETAIL</h3>
                  </div>
                 
                 
                  <div class="box-body">
              
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>BANK NAME</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button"  disabled="disabled" class="btn btn-default"  ><i class="fa fa-bank" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empdata->PR_BANK_NAME; ?>" placeholder="Enter Bank Name" disabled="disabled"  id="emp_bankname" name="emp_bankname">    </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <label>IFSC CODE</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-code" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empdata->PR_IFSC_CODE; ?>" placeholder="Enter IFSC Code"  disabled="disabled" id="emp_ifsccode" name="emp_ifsccode">    </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <label>ACCOOUNT NO</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empdata->PR_BANK_ACCOUNT_NO; ?>" placeholder="Enter Account No" disabled="disabled"  id="emp_accountno" name="emp_accountno">    </div>
                          </div>
                          </div>  
                            <div class="col-md-6">
                        <div class="form-group">
                          <label>FILE</label>

                           <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button"  disabled="disabled" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                            </div>
                            <input type="file" class="form-control" value="<?php echo $empdata->PR_BANK_FILE; ?>" placeholder="Enter Aadhar Card No" id="emp_bankfile" name="emp_bankfile">    </div>
                            <small style="color:#5bc0de;">Cancelled Check or Bank Passbook</small>
                        </div>
                        </div>   
                            
         
                     
                   
                  </div>
          </div>
          </div>


    <div class="col-md-12" >
     
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
           <!--  <div class="col-sm-1  pull-right">
              <button  type="button" class="form-control btn-sm btn-success add_field_button"><i class="fa fa-plus"></i></button>
            </div> -->
            </div>
                 
                 
                  <div class="box-body">
                  <div class="input_attribute_wrap row col-xs-12">
                      
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>COMPANY NAME</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-building-o" aria-hidden="true"></i></button>
                              </div>
                              <input type="text"  disabled="disabled" class="form-control" value="<?php echo $empcompdata->PR_COMPANY_NAME; ?>" placeholder="Enter Company Name" id="emp_compname" name="emp_compname">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>ADDRESS</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-map" aria-hidden="true"></i></button>
                              </div>
                              <input type="text"  disabled="disabled" class="form-control" value="<?php echo $empcompdata->PR_COMPANY_ADDRESS; ?>" placeholder="Enter Address" id="emp_compaddress" name="emp_compaddress">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>APPOINTMENT TERM</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-list" aria-hidden="true"></i></button>
                              </div>
                               <select  disabled="disabled"  class="form-control" id="emp_appointment" name="emp_appointment">
                                  <option>Select Appointment Term</option>                                  
                                  <option <?php if("Trainee"==$empcompdata->PR_APPOINTMENT_TERM){ echo "selected='selected'"; } ?> value="Trainee">Trainee</option>                                 
                                  <option <?php if("Freelancer"==$empcompdata->PR_APPOINTMENT_TERM){ echo "selected='selected'"; } ?> value="Freelancer">Freelancer</option>
                                  <option <?php if("Contractual"==$empcompdata->PR_APPOINTMENT_TERM){ echo "selected='selected'"; } ?> value="Contractual">Contractual</option>
                                  <option <?php if("Dailybasis"==$empcompdata->PR_APPOINTMENT_TERM){ echo "selected='selected'"; } ?> value="Dailybasis">Dailybasis</option>
                                  <option <?php if("Permanent"==$empcompdata->PR_APPOINTMENT_TERM){ echo "selected='selected'"; } ?> value="Permanent">Permanent</option>                                  
                              </select>  

                            </div>
                          </div>
                        </div> 
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>OFFER LETTER</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                              </div>
                              <input  disabled="disabled" type="file" class="form-control" value=""  id="emp_offerletter" name="emp_offerletter">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>SALARY SLIP</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                              </div>
                              <input  disabled="disabled" type="file" class="form-control" value="" id="emp_salaryslip" name="emp_salaryslip">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>LEAVING LETTER</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                              </div>
                              <input  disabled="disabled" type="file" class="form-control" value=""  id="emp_compleavingletter" name="emp_compleavingletter">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>LAST CTC</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-building-o" aria-hidden="true"></i></button>
                              </div>
                              <input disabled="disabled"  type="text" class="form-control" value="<?php echo $empcompdata->PR_SALARY; ?>" placeholder="Enter Last Company CTC" id="emp_compctc" name="emp_compctc" >    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>START DATE </label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-calendar-o" aria-hidden="true"></i></button>
                              </div>
                              <input  disabled="disabled"  type="date" class="form-control" value="<?php echo $empcompdata->PR_START_DATE; ?>" id="emp_startfrom" name="emp_startfrom">
                            </div>
                          </div>
                        </div>
                       

                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>LAST DATE</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-calendar" aria-hidden="true"></i></button>
                              </div>
                              <input  disabled="disabled" type="date" class="form-control" value="<?php echo $empcompdata->PR_END_DATE; ?>" placeholder="" id="emp_to" name="emp_to">   
                               </div>
                          </div>
                        </div>
                                  
                   
                  </div>
                 
          </div>
          </div>
          
          
        <!-- /.col -->
      </div>
    
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
  