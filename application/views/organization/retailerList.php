    <section class="content-header">
      <h1>
        RETAILER
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li ><a href="<?php echo base_url('organization/retailer')."?token=".$this->session->userdata['sampark_session']['token']; ?>">RETAILER MANAGEMENT</a></li>
        <li class="active" >RETAILER LIST</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>RETAILER CODE</th>
                  <th>IMAGE</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>PHONE</th>                 
                  <th>STATUS</th>
                  <th>ACTION</th>                 
                  
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($retailerList as $urow) 
                {
                ?>
                 <tr>
                  <td><?php echo $urow->PR_EMPLOYEE_CODE; ?></td>
                  <td>
                  <?php
                  if($urow->PR_IMAGE)
                  {
                  ?>
                  <img src="<?php echo base_url().'assets/upload_image/user/'.$urow->PR_IMAGE; ?>" style="height:30px; width:30px;" >
                  <?php
                  }
                  else
                  {
                  ?>
                  <img src="<?php echo base_url().'assets/images/default.png'; ?>" style="height:30px; width:30px;" >
                  <?php
                  }
                  ?> 
                  </td>
                  <td><?php echo $urow->PR_NAME; ?></td>
                  <td><?php echo $urow->PR_EMAIL; ?></td>
                  <td><?php echo $urow->PR_PHONE; ?></td>
                  
                  <td><?php if($urow->PR_EMPLOYEE_STATUS=='1'){ echo '<span class="btn btn-success btn-xs">Active</span>'; } else{ echo '<span class="btn btn-danger btn-xs">De-Active</span>';} ?></td>
                  <td>
                   
                  </td>
                  <td>
                    
                  </td>                
                  
                </tr>
                <?php
                }
                ?>
                
                </tbody>
                <tfoot>
                <tr>
                   <th>RETAILER CODE</th>
                  <th>IMAGE</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>PHONE</th>                 
                  <th>STATUS</th>
                  <th>ACTION</th>    
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<!--   </div> -->

<!-- DESIGNATION Modal -->
  <div class="modal" id="editmodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form  method="POST" role="form" enctype="multipart/form-data" action="<?php echo base_url() . 'organization/userUpdate' ?>">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#2874f0; ">
            <h4 class="modal-title" style="color:#ffffff;">EDIT USER</h4>
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
