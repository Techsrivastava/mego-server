    <section class="content-header">
      <h1>
        MENU
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li ><a href="<?php echo base_url('catlog/')."?token=".$this->session->userdata['sampark_session']['token']; ?>">CATEGORY LIST</a></li>
        <li class="active" ><a href="#"  data-toggle="modal" data-target="#categorymodal"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> ADD CATEGORY</button></a></li>
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
                  <th></th>
                  <th>CATEGORY ID</th>
                  <th>NAME</th>
                  <th>IMAGE</th>
                  <th>ICON</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                foreach ($categoryList as $row) 
                {
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td>CAT-<?php echo $row->CATEGORY_ID; ?></td>
                  <td><?php echo $row->CATEGORY_NAME; ?></td>
                  <td><img src="<?php echo base_url().'assets/upload_image/category/'.$row->CATEGORY_IMAGE; ?>" style="height:30px; width:30px;" ></td>
                  <td><img src="<?php echo base_url().'assets/upload_image/category/'.$row->CATEGORY_ICON; ?>" style="height:30px; width:30px;" ></td>
                  <td><?php if($row->CATEGORY_STATUS=='1'){ echo '<span class="btn btn-success btn-xs">Active</span>'; } else{ echo '<span class="btn btn-danger btn-xs">De-Active</span>';} ?></td>
                  <td>
                    <a href="#0" data-toggle="modal" data-target="#editmodal" onclick="editFunction('<?php echo base_url('Catlog/categoryEdit/'.$row->CATEGORY_ID) ?>')" class="btn btn-success btn-xs">Edit</a>
                    <a href="<?= base_url('catlog/categoryDelete/'.$row->CATEGORY_ID)?>" onclick="return confirm('Are you sure want to delete this item!')" class="btn btn-danger btn-xs">Delete</a>
                  </td>
                </tr>
                <?php
                $i++;
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th>CATEGORY ID</th>
                  <th>NAME</th>
                  <th>IMAGE</th>
                  <th>ICON</th>
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
  <!-- The Category Modal -->
  <div class="modal" id="editmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form  method="POST" role="form" enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/categoryUpdate' ?>">
          <!-- Modal Header -->
          <div class="modal-header" style="background-color:#2874f0; ">
            <h4 class="modal-title" style="color:#ffffff;">EDIT CATEGORY</h4>
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
  <!-- The Category Modal End -->
