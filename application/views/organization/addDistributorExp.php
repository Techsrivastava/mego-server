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
       
        <li class="active" >DISTRIBUTOR BUISNESS EXPERIENCE</li>

      </ol>
    </section>
    <section class="content">
		<form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/updatedistributorexpdtlByadmin'; ?>" method="post">
 
    <div class="row">

    <div class="col-xs-12" id="detail">
    
    
    
    <input type="hidden" class="form-control" value="1"  id="emp_frmLevel" name="emp_frmLevel"> 

          <div class="box ">  

            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> BUISNESS EXPERIENCE</h3>
              <button type="button" class="btn btn-primary pull-right add_field_button" >ADD MORE</button> 
            </div>
            <div class="box-body ">	               
                 
                <div class="col-md-3">
                <div class="form-group">
                  <label>COMPANY NAME<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-building" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_COMPANY_NAME; ?>" placeholder="Enter Company Name" id="emp_name" name="emp_name[]" > 
                    <input type="hidden" class="form-control" value="<?php echo $empdata->PR_EMPLOYEE_ID; ?>" placeholder="Enter Company Name" id="emp_employeeid" name="emp_employeeid" > 

                       </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>WORKING STATUS<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                       <select class="form-control" id="emp_workingsts" name="emp_workingsts[]"  onchange="getdatediv(this.value,'');">
                      <option>Select Working Status</option>
                      <option <?php if("Current"==$empdata->PR_WORK_STS){ echo "selected='selected'"; } ?> value="Current">Current</option>
                      <option <?php if("Closed"==$empdata->PR_WORK_STS){ echo "selected='selected'"; } ?> value="Closed">Closed</option>
                     
                    </select>

                      </div>
                </div>
                </div>
                <div class="col-md-3" id="startdate" style="display:none;">
                <div class="form-group">
                  <label>START DATE</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="date" class="form-control" value="<?php echo $empdata->PR_START_DATE; ?>" placeholder="Enter " id="emp_startDate" name="emp_startDate[]">    </div>
                </div>
                </div>

                <div class="col-md-3" id="enddate" style="display:none;">
                <div class="form-group">
                  <label>END DATE</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="date" class="form-control" value="<?php echo $empdata->PR_END_DATE; ?>" placeholder="Enter " id="emp_endDate" name="emp_endDate[]">    </div>
                </div>
                </div>
                
                <div class="col-md-3">
                <div class="form-group">
                  <label>BUISNESS TYPE<sup style="color: red;">*</sup></label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <select class="form-control" id="emp_buisness_type" name="emp_buisness_type[]" >
                      <option>Select Buisness Type</option>
                      <option <?php if("Distributor"==$empdata->PR_BUISNESS_TYPE){ echo "selected='selected'"; } ?> value="Distributor">Distributor</option>
                      <option <?php if("C & F"==$empdata->PR_BUISNESS_TYPE){ echo "selected='selected'"; } ?> value="C & F">C & F</option>
                      <option <?php if("Super Stockist"==$empdata->PR_BUISNESS_TYPE){ echo "selected='selected'"; } ?> value="Super Stockist">Super Stockist</option>
                      <option <?php if("Other"==$empdata->PR_BUISNESS_TYPE){ echo "selected='selected'"; } ?> value="Other">Other</option>
                      
                    </select>
                    </div>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>LAST FINANCIAL YEAR ANNUAL TURNOVER</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_LAST_ANNUAL; ?>" placeholder="Enter" id="emp_turnover" name="emp_turnover[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>NO OF RETAILER</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_NO_OF_RETAILER; ?>" placeholder="Enter No Of Retailer" id="emp_noofretailer" name="emp_noofretailer[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>NO OF SALESMAN</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_NO_OF_SALESMAN; ?>" placeholder="Enter No Of Sales Man" id="noofsalesman" name="noofsalesman[]">    </div>
                </div>
                </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label>COUNT OF OTHER STAFF</label>
                   <div class="input-group">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $empdata->PR_OTHER_STAFF_COUNT; ?>" placeholder="Enter Count of Other Staff" id="noofotherstaff" name="noofotherstaff[]">    </div>
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
             

                   <a href="<?php echo base_url('outer/addDistributPDetail'); ?>"><button type="submit" class="btn btn-info pull-right" >Next</button></a>

                  <a href="<?php echo base_url().'outer/addDistributor/'.$this->uri->segment(3).'/1'; ?>"><button type="button" class="btn btn-warning pull-right" style="margin-right:24px">Previous</button></a>
                </div>
                </div>  
          
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </form>
    </section>
   
    <script type="text/javascript">
function getdatediv(worksts,id)
{
  //alert(worksts);
  var startdate='#startdate'+id;
  var enddate='#enddate'+id;

  if(worksts=="Current")
  {
     $(startdate).show();
     $(enddate).hide();

  }
  else if(worksts=="Closed")
  {
     $(startdate).show();
     $(enddate).show();

  }
  else{
    $(startdate).hide();
     $(enddate).hide();
  }

}

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
      $(wrapper).append('<div class="box"><div class="box box-info"><h3 class="box-title"></h3></div><div class="box-body"><div class="col-md-3"><div class="form-group"><label>COMPANY NAME<sup style="color: red;">*</sup></label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-building" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="<?php echo $empdata->PR_NAME; ?>" placeholder="Enter Employee Name" id="emp_name" name="emp_name[]" ><input type="hidden" class="form-control" value="<?php echo $empdata->PR_EMPLOYEE_ID; ?>" placeholder="Enter Company Name" id="emp_employeeid" name="emp_employeeid" > </div></div></div><div class="col-md-3"><div class="form-group"><label>WORKING STATUS<sup style="color: red;">*</sup></label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><select class="form-control" id="emp_workingsts" name="emp_workingsts[]"  onchange="getdatediv(this.value,'+x+');"> <option>Select Working Status</option><option <?php if("Current"==$empdata->PR_WORK_STS){ echo "selected='selected'"; } ?> value="Current">Current</option> <option <?php if("Closed"==$empdata->PR_WORK_STS){ echo "selected='selected'"; } ?> value="Closed">Closed</option></select> </div></div></div><div class="col-md-3" id="startdate'+x+'" style="display:none;"><div class="form-group"><label>START DATE</label><div class="input-group"> <div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><input type="date" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter " id="emp_startDate" name="emp_startDate[]">    </div> </div></div><div class="col-md-3" id="enddate'+x+'" style="display:none;"><div class="form-group"> <label>END DATE</label><div class="input-group"> <div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button> </div><input type="date" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter " id="emp_endDate" name="emp_endDate[]">    </div> </div></div><div class="col-md-3"> <div class="form-group"><label>BUISNESS TYPE<sup style="color: red;">*</sup></label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><select class="form-control" id="emp_buisness_type" name="emp_buisness_type[]" required="required"><option>Select Buisness Type</option><option <?php if("Distributor"==$empdata->PR_BUISNESS_TYPE){ echo "selected=selected"; } ?> value="Distributor">Distributor</option><option <?php if("C & F"==$empdata->PR_BUISNESS_TYPE){ echo "selected=selected"; } ?> value="C & F">C & F</option> <option <?php if("Super Stockist"==$empdata->PR_BUISNESS_TYPE){ echo "selected=selected"; } ?> value="Super Stockist">Super Stockist</option> <option <?php if("Other"==$empdata->PR_BUISNESS_TYPE){ echo "selected=selected"; } ?> value="Other">Other</option></select></div></div> </div> <div class="col-md-3"><div class="form-group"><label>LAST FINANCIAL YEAR ANNUAL TURNOVER</label><div class="input-group"><div class="input-group-btn"> <button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button> </div><input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter" id="emp_turnover" name="emp_turnover[]"></div></div></div>  <div class="col-md-3"> <div class="form-group"> <label>NO OF RETAILER</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button> </div> <input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter No Of Retailer" id="emp_noofretailer" name="emp_noofretailer[]">    </div></div></div><div class="col-md-3"><div class="form-group"><label>NO OF SALESMAN</label> <div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div> <input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter No Of Sales Man" id="noofsalesman" name="noofsalesman[]">    </div></div></div><div class="col-md-3"><div class="form-group"><label>COUNT OF OTHER STAFF</label><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-default"  ><i class="fa fa-adjust" aria-hidden="true"></i></button></div><input type="text" class="form-control" value="<?php echo $empdata->PR_PHONE2; ?>" placeholder="Enter Count of Other Staff" id="noofotherstaff" name="noofotherstaff[]">    </div></div></div></div></div></div>');
         }
  });
  
  $(wrapper).on("click",".minus_attribute_button", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('span').remove(); x--;
  })
});
</script>
  