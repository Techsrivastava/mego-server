    <section class="content-header">
       <div class="container">
        <div class="row"><!-- row -->
         <div class="col-md-12  col-lg-12 col-xs-12  col-sm-12 ">
      <h4>
      EMPLOYEE PREVIOUS EMPLOYEEMENT DETAIL
        <!--<small>Add Category</small>--->
      </h4>
    </div></div></div>
    
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
    
    
    <div class="col-md-12" >
      <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addemployeeprevdetail'; ?>" method="post">
      <input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>"  id="emp_employeeid" name="emp_employeeid" > 
      <input type="hidden" class="form-control" value="3"  id="emp_frmLevel" name="emp_frmLevel"> 
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
           <!--  <div class="col-sm-1  pull-right">
              <button  type="button" class="form-control btn-sm btn-success add_field_button"><i class="fa fa-plus"></i></button>
            </div> -->
            </div>
                 
                 
                  <div class="box-body">
                  
                      
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>COMPANY NAME</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-building-o" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empcompdata->PR_COMPANY_NAME; ?>" placeholder="Enter Company Name" id="emp_compname" name="emp_compname">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>ADDRESS</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-map" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empcompdata->PR_COMPANY_ADDRESS; ?>" placeholder="Enter Address" id="emp_compaddress" name="emp_compaddress">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>APPOINTMENT TERM</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-list" aria-hidden="true"></i></button>
                              </div>
                               <select class="form-control" id="emp_appointment" name="emp_appointment">
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
                              <input type="file" class="form-control" value=""  id="emp_offerletter" name="emp_offerletter">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>SALARY SLIP</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                              </div>
                              <input type="file" class="form-control" value="" id="emp_salaryslip" name="emp_salaryslip">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>LEAVING LETTER</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-file" aria-hidden="true"></i></button>
                              </div>
                              <input type="file" class="form-control" value=""  id="emp_compleavingletter" name="emp_compleavingletter">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>LAST CTC</label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-building-o" aria-hidden="true"></i></button>
                              </div>
                              <input type="text" class="form-control" value="<?php echo $empcompdata->PR_SALARY; ?>" placeholder="Enter Last Company CTC" id="emp_compctc" name="emp_compctc">    </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>START DATE </label>
                             <div class="input-group">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-default"  ><i class="fa fa-calendar-o" aria-hidden="true"></i></button>
                              </div>
                              <input type="date" class="form-control" value="<?php echo $empcompdata->PR_START_DATE; ?>" id="emp_startfrom" name="emp_startfrom">
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
                              <input type="date" class="form-control" value="<?php echo $empcompdata->PR_END_DATE; ?>" placeholder="" id="emp_to" name="emp_to">   
                               </div>
                          </div>
                        </div>
                                  
                   
                  
                  <br>
                   <button type="submit" class="btn btn-info pull-right" style="margin-right:12px">Submit</button>
                    <a href="<?php echo base_url().'organization/addEmpAddress/'.$this->uri->segment(3).'/2?token='.$this->session->userdata['sampark_session']['token']; ?>"><button type="button" class="btn btn-warning pull-right" style="margin-right:24px" >Previous</button></a>
                         
                  </div>
          </div>
          </div>
          
          
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </form>
    </section>
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
  