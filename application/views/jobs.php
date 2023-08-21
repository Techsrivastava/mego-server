
    <section class="content-header">
      <h1>
        Jobs
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Jobs</li>
        <li><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myMod8al">Add Job Post</button></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-bottom: unset;">
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
                  <th>SNO.</th>
                  <th>COMPANY</th>
                  <th>JOB TITLE</th>
                  <th>JOB DESCRIPTION</th>
                  <th>DESIGNATION</th>  
                  <th>POSITION</th>  
                  <th>CITY</th>               
                  <th>STATUS</th>
                  <th>ACTION</th>                 
                  
                </tr>
                </thead>
                <tbody>
                <?php
                $i='1';
                foreach($jobsList as $jobRow)
                {
                ?>
                  <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $jobRow->PR_COMPANY_NAME; ?></td>
                  <td><?php echo $jobRow->PR_TITLE; ?></td>
                  <td><?php echo $jobRow->PR_DESCRIPTION; ?></td>
                  <td><?php echo $jobRow->PR_DESIG_NAME; ?></td>
                  <td><?php echo $jobRow->PR_NO_OF_POSITION; ?></td>
                  <td><?php echo $jobRow->PR_CITY; ?></td>
                  <td></td>
                  <td></td>
                  </tr>
                <?php
                $i++;
                }
                ?>
                 
                </tbody>
                <tfoot>
                <tr>
                   <th>SNO.</th>
                  <th>COMPANY</th>
                  <th>JOB TITLE</th>
                  <th>JOB DESCRIPTION</th>
                  <th>STATE</th>  
                  <th>CITY</th>               
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
    </section>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>