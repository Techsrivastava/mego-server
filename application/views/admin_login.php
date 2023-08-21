<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <link rel="icon" type="image/png" sizes="70x70" href="assets/dist/img/ms-icon-70x70.png">
        <title><?php echo (@$title == '') ? 'School Admin | Dashboard' :$title; ?></title>
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <title>Admin Login</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- jQuery 3 -->
        <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        <style>
            .error{color: #ff0000;font-size: 11px;display: none;}
        </style>
    </head>
    <body >
        <div class="container" style="margin-top: 100px;">
            <div id="loginbox" class="mainbox col-lg-5 col-lg-offset-4 col-sm-8 col-sm-offset-1">
              <div class="login-logo" style="text-align: center;">
                    <img src="<?php echo base_url().'assets/images/logo.png'; ?>"   style="width:200px; height:80px;" class="img" alt="MFIN INDIA">
                </div>
                <div class="panel panel-info" >
                    
                    <div class="panel-heading" style="background: #372d21;color: #fff;">
                        <div class="panel-title " style="text-align:center;">Sign in to your account</div>
                    </div>
                    <p  style="color:#00cc99;margin-left:15px;">
                        <?php    if(!empty($this->session->userdata('msg'))){  echo  $this->session->userdata('msg');} ?>
                        <?php    if(!empty($this->session->userdata('msg'))){?>
                        <script>swal("Success","<?php echo  $this->session->userdata('msg');?> ", "success" );</script><?php } ?>                  
                        
                         <?php $this->session->unset_userdata('msg'); ?>
                        
                    </p>
                    <div class="panel-body" style="background-color: #372d21;" >
                        <form id="loginform"  autocomplete="off" role="form" method="post" action="<?php echo base_url().'Admin/admin_login_auth' ?>">
                            <div class="form-group col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon" data-toggle="tooltip" title="Email"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" autocomplete="off"  type="email" class="form-control" name="email" value="" placeholder="Email">
                                </div>
                                
                            </div>
                            <div class="form-group col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon" data-toggle="tooltip" title="Password"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" autocomplete="off"  class="form-control" name="password" placeholder="Password">
                                </div>
                               
                            </div>
                            <div class="form-group col-lg-12">
                                <div class="form-group">
                                   <button type="submit" class="btn btn-block btn-info btn-sm pull-right" data-toggle="tooltip">Login</button>
                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>