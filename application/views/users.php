
    <section class="content-header">
      <h1>
        Users
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">users</li>

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
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>PHONE</th>               
                  <th>STATUS</th>
                  <th>ACTION</th>                 
                  
                </tr>
                </thead>
                <tbody>
                <?php
                $i='1';
                foreach($usersList as $userRow)
                {
                ?>
                  <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $userRow->PR_NAME; ?></td>
                  <td><?php echo $userRow->PR_EMAIL; ?></td>
                  <td><?php echo $userRow->PR_PHONE; ?></td>
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
    </section>
