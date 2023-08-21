      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact us Query </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Contact us Query</li>
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
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>MESSAGE</th>
                    <th>DATE</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i="1";
                  foreach ($enquiry as $enquiryRow) {
                   
                  ?> 
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $enquiryRow->PR_NAME; ?></td>
                    <td><?php echo $enquiryRow->PR_EMAIL; ?></td>
                    <td><?php echo $enquiryRow->PR_PHONE; ?></td>
                    <td><?php echo $enquiryRow->PR_DESCRIPTION; ?></td>
                    <td><?php echo $enquiryRow->PR_ENTRY_DATE; ?></td>
                   
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