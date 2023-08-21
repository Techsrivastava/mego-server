    <section class="content-header">
      <h1>
        Application Menu
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      
        <li class="active" >Application Menu</li>
      </ol>
    </section>

    <!-- Main content -->
  
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-info btn-sm pull-right"  data-toggle="modal" data-target="#appMenuModal"><i class="fa fa-plus"></i> ADD APP MENU</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1111" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>#</th>
                   <th>Menu Code </th>
                  <th>Menu </th>
                  <th>Sub Menu</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $r=1;
                foreach ($appmenu as $row) {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $r; ?></td>
                                        <td><?php echo $row->MENU_CODE; ?></td>
                                        <td  class="role-text" style="background: #ececec; font-weight: bold;"> &nbsp;&nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $row->MENU_NAME; ?></td>
                                        <td></td>
                                        <td>
                                        
                                        </td>

                                      
                                        </td>
                                    </tr>
                                    <?php
                                    $k = 1;
                                    //$this->load->model('Model_admin');
                                    $submenu1 = $this->Model_admin->getAppSubMenuData(array('PARENT_ID' => $row->MENU_ID,'IS_VIEW' => 'm'));

                                    foreach ($submenu1 as $subrow1) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r . '.' . $k; ?></td>
                                            <td><?php echo $subrow1->MENU_CODE; ?></td>
                                            <td></td>
                                            <td><?php echo $subrow1->MENU_NAME; ?></td>
                                            <td style="align: center;">                                          

                                            
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
                  <th>Menu </th>
                  <th>Sub Menu</th>
                  <th>Action</th>
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
 <div class="modal" id="editmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  method="POST" role="form" enctype="multipart/form-data" action="<?php echo base_url() . 'organization/appMenuUpdate' ?>">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#2874f0; ">
            <h4 class="modal-title" style="color:#ffffff;">EDIT APPLICATION MENU</h4>
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
  <!-- Brand Modal End -->

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

