    <section class="content-header">
      <h1>
       APPLIED DISTRIBUTOR
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li> 
       <li><a href="<?php echo base_url('organization/disributord')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-circle"></i> DISTRIBUTOR MANAGEMENT</a></li> 
       
        <li class="active" >APPLIED DISTRIBUTOR LIST</li>

        <li class="active" ><a href="#"  data-toggle="modal" data-target="#distributormodal"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>ADD DISTRIBUTOR</button></a></li>
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
                  <th>DISTRIBUTOR CODE</th>
                  <th>FIRM NAME</th>                  
                  <th>GSTIN NO</th>
                  <th>ADDRESS</th>
                  
                  <th>STATUS</th>
                  <th>ACTION</th>                 
                  
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($distributor as $urow) 
                {
                ?>
                 <tr>
                  <td><?php echo $urow->PR_EMPLOYEE_CODE; ?></td>
                  
                  <td><?php echo $urow->PR_NAME; ?></td>
                  <td><?php echo $urow->PR_GST_NO; ?></td>
                  <td><?php echo $urow->PR_PRESENT_ADDRESS; ?></td>
                 

                  <td><?php if($urow->PR_EMPLOYEE_STATUS=='2'){ echo '<span class="btn btn-warning btn-xs">Invitation Sended</span>'; } else if($urow->PR_EMPLOYEE_STATUS=='3'){ echo '<span class="btn btn-info btn-xs">Data Uploaded</span>'; } else if($urow->PR_EMPLOYEE_STATUS=='4'){ echo '<span class="btn btn-primary btn-xs"> Agreement Generated</span>'; }  else if($urow->PR_EMPLOYEE_STATUS=='5'){ echo '<span class="btn btn-primary btn-xs">Send Agreement</span>'; } else if($urow->PR_EMPLOYEE_STATUS=='6'){ echo '<span class="btn btn-success btn-xs">Agrement Accepted</span>'; } else{ echo '<span class="btn btn-danger btn-xs">?</span>';} ?></td>
                  <td>
                    <?php
                    $t=$this->session->userdata['sampark_session']['token'];
                    ?>
                    <?php
                    if($urow->PR_EMPLOYEE_STATUS=='3')
                    {
                      ?>
                      <a class="btn btn-info btn-xs" data-toggle="modal"  data-target="#genAgreementmodal" onclick="aggremp('<?php echo $urow->PR_EMPLOYEE_ID; ?>');" >Generate Agreement</a>
                      <?php

                    }
                    ?>
                    <?php
                    if($urow->PR_EMPLOYEE_STATUS=='4')
                    {
                      ?>
                      <a target="_blank" href="<?php echo base_url().'/outer/aggrement/'.$urow->PR_EMPLOYEE_ID.'/5?token='.$t; ?>" class="btn btn-primary btn-xs">view Agreement</a> 
                    <a href="<?php echo base_url().'organization/sendAgreement/'.$urow->PR_EMPLOYEE_ID; ?>" class="btn btn-success btn-xs">Send Agreement</a>
                     <?php

                    }
                    if($urow->PR_EMPLOYEE_STATUS=='5' || $urow->PR_EMPLOYEE_STATUS=='6')
                    {
                    ?>
                    <a target="_blank" href="<?php echo base_url().'/outer/aggrement/'.$urow->PR_EMPLOYEE_ID.'/5?token='.$t; ?>" class="btn btn-primary btn-xs">view Agreement</a> 
                    <a href="<?php echo base_url().'organization/sendAgreement/'.$urow->PR_EMPLOYEE_ID; ?>" class="btn btn-success btn-xs">Re-Send Agreement</a>

                     <a href="<?php echo base_url().'organization/approveDistributor/'.$urow->PR_EMPLOYEE_ID; ?>" class="btn btn-success btn-xs">Approve</a>
                    <?php
                    }
                    ?>
                    <a href="<?php echo base_url().'organization/addadistributor/'.$urow->PR_EMPLOYEE_ID.'/1?token='.$t; ?>"  class="btn btn-success btn-xs">Edit</a>

                     <!-- <a href="<?php echo base_url().'organization/addadistributor/'.$urow->PR_EMPLOYEE_ID.'/1?token='.$t; ?>"  class="btn btn-success btn-xs">Edit</a> -->

             <!--        <a href="<?= base_url('organization/userDelete/'.$urow->PR_EMPLOYEE_ID)?>" onclick="return confirm('Are you sure want to delete this item!')" class="btn btn-danger btn-xs">Delete</a>
                    <a href="<?= base_url('organization/user_permission/'.$urow->PR_EMPLOYEE_ID).'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="btn btn-warning btn-xs">User Permission</a> -->
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
                  <th>DISTRIBUTOR CODE</th>
                  <th>FIRM NAME</th>                  
                  <th>GSTIN NO</th>
                  <th>ADDRESS</th>
                  
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
