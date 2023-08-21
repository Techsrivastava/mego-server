    <section class="content-header">
      <h1>
        Employee Wise Permission
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url('organization/users')."?token=".$this->session->userdata['sampark_session']['token']; ?>">Employees List</a></li>
        <li class="active" > Employee Wise Permission</li>
      </ol>
    </section>

    <!-- Main content -->
    <form   enctype="multipart/form-data" action="<?php echo base_url() . 'organization/userupdatePermission' ?>" method="post">
    <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->uri->segment(3); ?>">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <button type="submit" class="btn btn-sm btn-primary pull-right">Submit</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1111" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>#</th>
                  <th>Menu </th>
                  <th>Sub Menu</th>
                  <th><input type="checkbox" id="viewAll"  name="viewAll[]" onclick="viewAllChk();" value="">&nbsp;&nbsp;&nbsp;&nbsp;View</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $r = 1;
                $desig=$this->uri->segment(3);
                foreach ($menu as $row) {
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $r; ?></td>
                                        <td  class="role-text" style="background: #ececec; font-weight: bold;"> &nbsp;&nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $row->MENU_NAME; ?></td>
                                        <td></td>
                                        <td>
                                        <input type="hidden" id="menu_id" name="menu_id[]" value="<?php echo $row->MENU_ID; ?>">
                                        
                                        <?php
                                        $chkMenu1 = $this->Organization_model->chkUserMenu(array('USER_ID' =>$desig,'MENU_ID' =>$row->MENU_ID));
                                            // print_r($chkMenu); exit;
                                        if($chkMenu1)
                                        {
                                        ?>                                           
                                            <input type="checkbox" id="view" checked class="view" name="view[]" value="<?php echo $row->MENU_ID; ?>">
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <input type="checkbox" id="view"  class="view" name="view[]" value="<?php echo $row->MENU_ID; ?>">

                                        <?php
                                        }
                                        ?>
                                        </td>

                                      
                                        </td>
                                    </tr>
                                    <?php
                                    $k = 1;
                                    //$this->load->model('Model_admin');
                                    $submenu1 = $this->Model_admin->getUserSubMenuData(array('PARENT_ID' => $row->MENU_ID,'IS_VIEW' => 'm'));

                                    foreach ($submenu1 as $subrow1) {
                                        ?>
                                        <tr>
                                            <td><?php echo $r . '.' . $k; ?></td>
                                            <td></td>
                                            <td><?php echo $subrow1->MENU_NAME; ?></td>
                                            <td style="align: center;">                                          

                                            <input type="hidden" name="menu_id[]" id="menu_id" value="<?php echo $subrow1->MENU_ID; ?>">
                                           
                                             <?php
                                            //  print_r($this->session->userdata());
                                            
                                            $chkMenu = $this->Organization_model->chkUserMenu(array('USER_ID' =>$desig,'MENU_ID' =>$subrow1->MENU_ID));
                                            // print_r($chkMenu); exit;
                                            if($chkMenu)
                                            {
                                            ?>
                                            <input type="checkbox" id="view" class="view" name="view[]" checked value="<?php echo $subrow1->MENU_ID; ?>">
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <input type="checkbox" id="view" class="view" name="view[]"  value="<?php echo $subrow1->MENU_ID; ?>">
                                            <?php
                                            }
                                            ?>
                                            
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
                  <th></th>
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

