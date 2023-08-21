    <section class="content-header">
      <h1>
        RETAILER MANAGEMENT
        <!--<small>Add Category</small>--->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard').'?token='.$this->session->userdata['sampark_session']['token']; ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
 
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

                          <p> Retailer</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#registerReg" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>Retailer<sup style="font-size: 20px"></sup></h3>

                          <p>Data</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo base_url('organization/retailerList').'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                          <h3>Create</h3>

                          <p>Order</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url('order/retailer_order_form').'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="small-box-footer">Click here<i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                
                    <div class="col-lg-3 col-xs-6">
                      
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3>Ordered</h3>

                          <p>List</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo base_url('order/retailerOrder_list').'?token='.$this->session->userdata['sampark_session']['token']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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



<div id="registerReg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register Retailer</h4>
      </div>
        <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addRetailer' ?>" method="post">
      <div class="modal-body">
        <div class="col-md-6 form-group">
            <label for="email1">NAME</label>
            <input type="text" class="form-control" required="required"   placeholder="Enter Name" id="name" aria-describedby="emailHelp" name="name" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-6 form-group">
            <label for="email1">EMAIL</label>
            <input type="email" class="form-control" required="required"  placeholder="Enter Email" id="email" aria-describedby="emailHelp" name="email" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">PHONE</label>
            <input type="number" class="form-control" required="required"  id="phone" aria-describedby="emailHelp" name="phone" placeholder="Enter Phone No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>
          <div class="col-md-6 form-group">
            <label for="email1">GST NO</label>
            <input type="text" class="form-control" required="required"  placeholder="Enter Gst No" id="gst_no" aria-describedby="emailHelp" name="gst_no" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>            

          <div class="col-md-12 form-group">
            <label for="email1">ADDRESS</label>
            <input type="text" class="form-control" required="required"   id="address" aria-describedby="emailHelp" name="address" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>
 