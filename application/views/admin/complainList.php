      
<div id="confirmModal" class="modal fade" role="dialog" style="height:150px !important; margin-top: 200px;
   ">
    <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content" style="background: #EFF2F7 url(<?php echo base_url(); ?>frontend_assets/images/popup-top.png)no-repeat;">
     <!--  <div class="modal-header">        
        <h5 class="modal-title text-uppercase" id="exampleModalLiveLabel">Required</h5>       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        </div> -->
  
      <div class="modal-body text-center py-1">
      <div class="row">
        <div class="col-md-12 mt-2">
          
          <p id="">
Are you sure you want to delete this ?</p>
<input type="hidden" name="packageDeleteId" id="packageDeleteId" value="">
        </div>
        <div class="col-md-12 mt-2">
           <button class="btn btn-danger btn-sm pull-right" data-dismiss="modal" aria-label="Close" style="margin-left:10px;">No</button>
        <button class="btn btn-primary btn-sm pull-right" onclick="deletePackage()" >Yes</button>
       
      </div>
      </div>  
      </div>
      
    </div>

    </div>
  </div>
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Complain List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active" >Complain List</li>

              <!-- <li class="breadcrumb-item active"><a href="#" onclick="addpackage()">Add Package</a></li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" id="packageList">
    <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S NO.</th>
                    <th>USER</th>
                    <th>GUILTY</th>
                    <th>CATEGORY</th>  
                    <th>SUBCATEGORY</th>                  
                    <th>REMARKS</th>
                    <th>DATE</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i="1";
                  foreach ($complain as $complainRow) {
                   
                  ?> 
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $complainRow->USER; ?></td>
                    <td><?php echo $complainRow->GUILTY; ?></td>
                    <td><?php echo $complainRow->CATEGORY; ?> </td>   
                    <td><?php echo $complainRow->SUBCATEGORY; ?> </td>    
                    <td><?php echo $complainRow->REMARKS; ?> </td>    
                    <td><?php echo $complainRow->CREATED_AT; ?> </td>                  
                  
                 
                   
                  </tr>
                  <?php
                   $i++;
                  }
                  ?> 
                </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


        <div class="col-12" id="packageFrm" style="display: none;">
          <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <form id="quickForm" method="post" enctype="multipart/form-data" autocomplete="off" action="<?php echo base_url(); ?>admin/submitPackage">
                <div class="card-body">
                  <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                    <label for="package">Package Name</label>
                    <input type="text" name="package" class="form-control" id="package" placeholder="Enter Package Name" required="required">

                    <input type="hidden" name="packageID" class="form-control" id="packageID" placeholder="Enter Package Name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="packageDesc">Package Description</label>
                    <input type="text" name="packageDesc" class="form-control" id="packageDesc" placeholder="Enter Package Description">
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="jobpost">Duration</label>
                    <input type="text" name="validity" class="form-control" id="validity" placeholder="Enter Duration" required="required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price" required="required">
                  </div>
</div>

   <div class="col-sm-6">
                  <div class="form-group">
                    <label for="price">Status</label>
                    <select class="form-control" name="status" id="status" required="required">
                      <option value="">Select Status</option>
                      <option value="1">Active</option>
                      <option value="0">In-Active</option>
                    </select>
                  </div>
</div>
</div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                   <button type="button" class="btn btn-danger pull-right" onclick="hidepackage()">Close</button>
                </div>
              </form>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

</div>

<script type="text/javascript">
  function addpackage()
  {
    $("#packageList").hide();
    $("#packageFrm").show();
  }
  function hidepackage()
  {
    $("#packageList").show();
    $("#packageFrm").hide();
  }
</script>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      package: {
        required: true,
        //email: true,
      },
      status: {
        required: true,
       // minlength: 5
      },
      // terms: {
      //   required: true
      // },
    },
    messages: {
      package: {
        required: "Please enter Package Name",
        //email: "Please enter a vaild email address"
      },
      status: {
        required: "Please select status",
        //minlength: "Your password must be at least 5 characters long"
      },
      //terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


<script type="text/javascript">
        function updatePackageSts(sts,packageId)
        {
          var r;

          if(sts=="1")
          {
            r="Active";
          }
          else
          {
            r="In-Active";
          }
          $.ajax({
            url:"<?php echo base_url('admin/updatePackagests'); ?>",
            type:'post',
            data: {packageId:packageId,sts:sts},
            success: function(res)
            { 
              window.location.reload();

            }
          });

        }

         function setPackageId(packageId)
        {
          document.getElementById('packageDeleteId').value=packageId;

        }
        function deletePackage()
        {
          var packageId=document.getElementById('packageDeleteId').value;
          $.ajax({
            url:"<?php echo base_url('admin/deletePackage'); ?>",
            type:'post',
            data: {packageId:packageId},
            success: function(res)
            { 
              $('#confirmModal').modal('hide');
              // $('#successModal').modal('show');
              // document.getElementById('successModalMess').innerHTML ="Job Deleted Successfully";
              window.location.reload();

            }
          });
        }


        function editPackageData(packageid,package,packageDesc,validity,price,status)
        {
          $("#packageList").hide();
    $("#packageFrm").show();
    document.getElementById("packageID").value =packageid;
    document.getElementById("package").value =package;
    document.getElementById("packageDesc").value =packageDesc;
        document.getElementById("validity").value =validity;
   
    document.getElementById("price").value =price;
    document.getElementById("status").value =status;
        }
        </script>