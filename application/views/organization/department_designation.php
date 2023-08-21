    <section class="content-header">
      <h1>
        DEPARTMENT WISE DESIGNATION LIST
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="" >Department Wise Designation List</li>
        <li class="active" ><a href="#"  data-toggle="modal" data-target="#departmentmodal"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> ADD DEPARTMENT</button></a></li>
        <li class="active" ><a href="#"  data-toggle="modal" data-target="#designationmodal"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> ADD DESIGNATION</button></a></li>
      </ol>
    </section>

    
   
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1111" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>#</th>
                  <th>DEPARTMENT </th>
                  <th>DESIGNATION</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $r=1;
                foreach ($department as $drow) {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $r; ?></td>
                                        <td  class="role-text" style="background: #ececec; font-weight: bold;"> &nbsp;&nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $drow->PR_DEPARTMENT_NAME; ?></td>
                                        <td></td>
                                        <td>
                                        <a href="#0" data-toggle="modal" data-target="#depteditmodal" onclick="depteditFunction('<?php echo base_url('organization/departmentEdit/'.$drow->PR_DEPARTMENT_ID) ?>')" class="btn btn-success btn-xs">Edit</a>
                                            <a href="<?= base_url('organization/departmentDelete/'.$drow->PR_DEPARTMENT_ID)?>" onclick="return confirm('Are you sure want to delete this item!')" class="btn btn-danger btn-xs">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $k = 1;
                                    //$this->load->model('Model_admin');
                                    $designation= $this->Organization_model->getDesignationL(array('PR_DEPT_ID' => $drow->PR_DEPARTMENT_ID));

                                    foreach ($designation as $desigrow) 
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $r . '.' . $k; ?></td>
                                            <td></td>
                                            <td><?php echo $desigrow->ROLE_NAME; ?></td>
                                            <td >
                                            <a href="#0" data-toggle="modal" data-target="#editmodal" onclick="editFunction('<?php echo base_url('organization/designationEdit/'.$desigrow->ROLE_ID) ?>')" class="btn btn-success btn-xs">Edit</a>
                                            <a href="<?= base_url('organization/designationDelete/'.$desigrow->ROLE_ID)?>" onclick="return confirm('Are you sure want to delete this item!')" class="btn btn-danger btn-xs">Delete</a>
                                            <a href="<?= base_url('organization/designation_permission/'.$desigrow->ROLE_ID).'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="btn btn-warning btn-xs">Web Designation Permission</a>
                                            <a href="<?= base_url('organization/appDesignation_permission/'.$desigrow->ROLE_ID).'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="btn btn-info btn-xs">App Designation Permission</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $k++;
                                    }
                                    $r++;
                                }
                                ?>

                </tbody>

                <tfoot>
                <tr>
                  <th>#</th>
                  <th>DEPARTMENT </th>
                  <th>DESIGNATION</th>
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
</form>
    <!-- /.content -->
<!--   </div> -->
 <!-- DESIGNATION Modal -->
  <div class="modal" id="editmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  method="POST" role="form" enctype="multipart/form-data" action="<?php echo base_url() . 'organization/designationUpdate' ?>">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#2874f0; ">
            <h4 class="modal-title" style="color:#ffffff;">EDIT DESIGNATION</h4>
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

<!-- DESIGNATION Modal -->
  <div class="modal" id="depteditmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  method="POST" role="form" enctype="multipart/form-data" action="<?php echo base_url() . 'organization/departmentUpdate' ?>">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#2874f0; ">
            <h4 class="modal-title" style="color:#ffffff;">EDIT DEPARTMENT</h4>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="depteditdiv"></div>

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


<script>
    function viewAllChk()
    {
        //alert("heloo");
        //var checkBox = document.getElementById("viewAll");
        if ($('#viewAll').is(':checked')) {
            $(".view").prop('checked', true);
        } else {
            $(".view").prop('checked', false);
        }
    }
    function addAllChk()
    {
        //alert("heloo");
        //var checkBox = document.getElementById("viewAll");
        if ($('#addAll').is(':checked')) {
            $(".add").prop('checked', true);
        } else {
            $(".add").prop('checked', false);
        }
    }
    function editAllChk()
    {
        //alert("heloo");
        //var checkBox = document.getElementById("viewAll");
        if ($('#editAll').is(':checked')) {
            $(".edit").prop('checked', true);
        } else {
            $(".edit").prop('checked', false);
        }
    }
    function deleteAllChk()
    {
        //alert("heloo");
        //var checkBox = document.getElementById("viewAll");
        if ($('#deleteAll').is(':checked')) {
            $(".delete").prop('checked', true);
        } else {
            $(".delete").prop('checked', false);
        }
    }
</script>

