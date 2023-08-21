
    <section class="content-header">
      <h1>
        Companies
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Companies</li>

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
                  <th>ADDRESS</th>
                  <th>EMAIL</th>
                  <th>PHONE</th>               
                  <th>STATUS</th>
                  <th>ACTION</th>                 
                  
                </tr>
                </thead>
                <tbody>
                <?php
                $i='1';
                foreach($companyList as $companyRow)
                {
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $companyRow->PR_COMPANY_NAME; ?></td>

                  <td><?php echo $companyRow->PR_ADDRESS; ?></td>
                  <td><?php echo $companyRow->PR_EMAIL; ?></td>
                  <td><?php echo $companyRow->PR_PHONE; ?></td>
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
