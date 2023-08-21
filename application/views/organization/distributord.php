    <section class="content-header">
      <h1>
        DISTRIBUTOR MANAGEMENT
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard').'?token='.$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
 <li><a href="<?php echo base_url('organization/disributord')."?token=".$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-circle"></i> DISTRIBUTOR MANAGEMENT</a></li> 
       
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">           
            <div class="box-body">
             <!-- Main content -->
              <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                  <div class="col-lg-12 col-xs-12" style="height:50px;">
                  </div>
                  <div class="col-lg-3 col-xs-6">
                  </div>
                  <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>Register</h3>

                          <p> Distributor</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url('organization/addaDistributor').'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3><?php echo $empcount->totalemp; ?><sup style="font-size: 20px"></sup></h3>

                          <p>Distributor Data</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo base_url('organization/distributor').'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                    </div>
                    <!-- ./col --><div class="clearfix"></div>
                    <div class="col-lg-3 col-xs-6">
                    </div>
                    <div class="col-lg-3 col-xs-6">
                 
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>Send</h3>

                          <p>Invitation</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#distributormodal" class="small-box-footer">Click here<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                
                    <div class="col-lg-3 col-xs-6">
                      
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?php echo $aempcount->totalemp; ?></h3>

                          <p>Applied Distributor List</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo base_url('organization/applieddistributors').'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                </div>
              </section>






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

 