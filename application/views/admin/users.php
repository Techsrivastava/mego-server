      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Users List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>GENDER</th>
                    <th>DOB</th>
                    <th>ABOUT</th>
                    <th>JOB TITLE</th>
                    <th>COMPANY</th>
                    <th>SCHOOL</th>
                    <th>PASSION</th>
                    <th>SEXUAL ORIENTATION</th>
                    <th>GALLERY</th>
                    <th>PROFILE SHOW STATUS</th>
                  
                    <th>REGISTRE DATE</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  error_reporting(0);
                  $i="1";
                   $this->load->model('Recruiter_model');   
                  foreach ($users as $userRow) {
                   $passsion=$this->Admin_model->getUsersPassionList(array('USER_ID'=>$userRow->PR_USER_ID));    
                   $sexualo=  $this->Admin_model->getUsersSexualList(array('USER_ID'=>$userRow->PR_USER_ID));    
                   $images=$this->Admin_model->getUsersImageList(array('USER_ID'=>$userRow->PR_USER_ID));    
                  ?> 
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><img src="<?php echo base_url().'files/'.$images[0]->PR_IMAGE; ?>" style="width:30px; height:30px;"></td>
                    <td><?php echo $userRow->PR_NAME; ?></td>
                    <td><?php echo $userRow->PR_EMAIL; ?></td>
                    <td><?php echo $userRow->PR_PHONE; ?></td>
                    <td><?php echo $userRow->PR_GENDER; ?></td>
                    <td><?php echo $userRow->PR_DOB; ?></td>
                    <td><?php echo $userRow->ABOUT; ?></td>
                    <td><?php echo $userRow->JOB_TITLE; ?></td>
                    <td><?php echo $userRow->COMPANY; ?></td>
                    <td><?php echo $userRow->SCHOOL; ?></td>
                    <td>
                      <?php
                      foreach ($passsion as $pRow) {
                      
                      ?>
                      <?php echo $pRow->PR_PASSION; ?>,
                      <?php 
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      foreach ($sexualo as $sRow) {
                      
                      ?>
                      <?php echo $sRow->PR_SEXUAL_ORIENTATION; ?>,
                      <?php 
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      foreach ($images as $iRow) {
                      
                      ?>
                      <img src="<?php echo base_url().'files/'.$iRow->PR_IMAGE; ?>" style="width:200px; height:200px;"><br>
                      <?php 
                      }
                      ?>
                    </td>
                    <td>
                      <select class="form-control">
                        <option <?php if($userRow->PROFILE_SHOW=="1"){ echo "selected"; } ?> style="color:green;" value="1">Yes</option>
                        <option <?php if($userRow->PROFILE_SHOW=="0"){ echo "selected"; } ?> style="color:red;" value="0">No</option>
                      </select>
                    </td>
                    <td><?php echo $userRow->PR_CREATED_AT; ?></td>
                    <td >
                      <select class="form-control" onchange="updateEmployeeSts(this.value,'<?php echo $userRow->PR_USER_ID; ?>');">
                        <option <?php if($userRow->PR_STATUS=="1"){ echo "selected"; } ?> style="color:green;" value="1">Active</option>
                        <option <?php if($userRow->PR_STATUS=="0"){ echo "selected"; } ?> style="color:red;" value="0">In-Active</option>
                      </select>
<br>
                        <a href="#">
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmModal" onclick="setUserId('<?php echo $userRow->PR_USER_ID; ?>');">
                      <i class="fas fa-trash" aria-hidden="true"></i>
</button>
                    </a>

                   <a href="<?php echo base_url().'admin/getLikedList/'.$userRow->PR_USER_ID; ?>">
<button type="button" class="btn btn-info btn-sm" title="Liked List">
                      <i class="fas fa-thumbs-up" aria-hidden="true"></i>
</button>
                    </a>

                    </td>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

</div>

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
<input type="hidden" name="userId" id="userId" value="">
        </div>
        <div class="col-md-12 mt-2">
           <button class="btn btn-danger btn-sm pull-right" data-dismiss="modal" aria-label="Close" style="margin-left:10px;">No</button>
        <button class="btn btn-primary btn-sm pull-right" onclick="deleteUser()" >Yes</button>
       
      </div>
      </div>  
      </div>
      
    </div>

    </div>
  </div>

<script type="text/javascript">
        function updateEmployeeSts(sts,employerId)
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
            url:"<?php echo base_url('admin/updateEmployersts'); ?>",
            type:'post',
            data: {employerId:employerId,sts:sts},
            success: function(res)
            { 
              window.location.reload();

            }
          });

        }


         function setUserId(userId)
        {
          document.getElementById('userId').value=userId;

        }
        function deleteUser()
        {
          var userId=document.getElementById('userId').value;
          $.ajax({
            url:"<?php echo base_url('admin/deleteUser'); ?>",
            type:'post',
            data: {userId:userId},
            success: function(res)
            { 
              $('#confirmModal').modal('hide');
              // $('#successModal').modal('show');
              // document.getElementById('successModalMess').innerHTML ="Job Deleted Successfully";
              window.location.reload();

            }
          });
        }
        </script>