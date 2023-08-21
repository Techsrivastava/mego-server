</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
   <strong>Copyright &copy; 2020 <a href="#">SAMPARK</a>.</strong> All Rights Reserved
   
    
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/moment/moment.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/fullcalendar/dist/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="http://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="http://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/common.js"></script>

<script type="text/javascript">
  
  function getstate(country_id,emp_presentstatess) {
  // alert(country_id+'_'+emp_presentstate);
    if(country_id == ''){
      $('#emp_presentstate').html('<option value="">Select State</option>');
      return false
    }
    $('#'+emp_presentstatess).html('<option value="">Loding...</option>');
    var url='<?php echo base_url('outer/getCountryStateData'); ?>'+'/'+country_id;
    //alert(url);
    $.ajax({
      url:url,
      type:'get',
      data: {},
      success:function(res){
        //alert(res);
        $('#'+emp_presentstatess).html('');
        $('#'+emp_presentstatess).append(res);
      }
    })
  }
  function getcity(state_id,emp_presentcity) {
   // alert(dept_id+'_'+emp_desig);
    if(state_id == ''){
      $('#emp_presentcity').html('<option value="">Select City</option>');
      return false
    }
    $('#'+emp_presentcity).html('<option value="">Loding...</option>');
    $.ajax({
      url:'<?= base_url("outer/getStateCityData")?>'+'/'+state_id,
      type:'get',
      data: {},
      success:function(res){
        $('#'+emp_presentcity).html('');
        $('#'+emp_presentcity).append(res);
      }
    })
  }
   
</script>
 

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'dom': 'Bfrtip',
      'buttons': [
            'excel'
        ]
    })
  })

</script><script>
  $(function () {
    $('#example3').DataTable()
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</script><script>
  $(function () {
    $('#example5').DataTable()
    $('#example6').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</script><script>
  $(function () {
    $('#example7').DataTable()
    $('#example8').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>

  function getdeptdesignationdd(dept_id,emp_desigdata) {
   // alert(dept_id+'_'+emp_desig);
    if(dept_id == ''){
      $('#emp_desigdata').html('<option value="">Select Designation</option>');
      return false
    }
    $('#'+emp_desigdata).html('<option value="">Loding...</option>');
    $.ajax({
      url:'<?= base_url("organization/getDeptDesig")?>'+'/'+dept_id,
      type:'get',
      data: {},
      success:function(res){
        $('#'+emp_desigdata).html('');
        $('#'+emp_desigdata).append(res);
      }
    })
  }
   function getdeptdesigemployee(desig_id,emp_reportmanager) {
    //alert(desig_id+'_'+emp_reportmanager);
    if(desig_id == ''){
      $('#emp_reportmanager').html('<option value="">Select Reporting Manager</option>');
      return false
    }
    $('#'+emp_reportmanager).html('<option value="">Loding...</option>');
    $.ajax({
      url:'<?= base_url("organization/getDeptDesigManager")?>'+'/'+desig_id,
      type:'get',
      data: {},
      success:function(res){
        $('#'+emp_reportmanager).html('');
        $('#'+emp_reportmanager).append(res);
      }
    })
  }
  function getCatProduct(pcat_id,product_packs) {
   // alert(pcat_id+'_'+product_packs);
    if(pcat_id == ''){
      $('#product_packs').html('<option value="">Select Available Product Pack</option>');
      return false
    }
    $('#'+product_packs).html('<option value="">Loding...</option>');
    $.ajax({
      url:'<?= base_url("catlog/getProductByCategory")?>'+'/'+pcat_id,
      type:'get',
      data: {},
      success:function(res){
        $('#'+product_packs).html('');
        $('#'+product_packs).append(res);
      }
    })
  }
    function getPrdQtyCount(qty,pushdata) {
      var pid=document.getElementById("product_packs").value;
     // alert(pid);
      //alert(qty);
      
      $.ajax({
      url:'<?= base_url("catlog/getPrdCountData")?>'+'/'+pid+'/'+qty,
      type:'get',
      data: {},
      success:function(res){
        //alert(res);
        document.getElementById(pushdata).value =res;
      }
    })
  
  }

  function getsubCategory(cat_id,sub_category_id) {
    if(cat_id == ''){
      $('#sub_category_id').html('<option value="">Select</option>');
      return false
    }
    $('#'+sub_category_id).html('<option value="">Loding...</option>');
    $.ajax({
      url:'<?= base_url("catlog/getsubCategory")?>'+'/'+cat_id,
      type:'get',
      data: {},
      success:function(res){
        $('#'+sub_category_id).html('');
        $('#'+sub_category_id).append(res);
      }
    })
  }

  function getsubsubCategory(sub_category_id,sub_sub_category_id) {
    if(sub_category_id == ''){
      $('#sub_sub_category_id').html('<option value="">Select</option>');
      return false
    }
    $('#'+sub_category_id).html('<option value="">Loding...</option>');
    $.ajax({
      url:'<?= base_url("catlog/getsubsubCategory")?>'+'/'+sub_category_id,
      type:'get',
      data: {},
      success:function(res){
        $('#'+sub_sub_category_id).html('');
        $('#'+sub_sub_category_id).append(res);
      }
    })
  }
</script>

<script>

function getsubcategory(category_id)
{
    var url = "<?php echo base_url() . 'Admin_damindashboard/getSubCategory?category_id='; ?>"+category_id;
    $.ajax({
        url: url,
        type: "GET",
        success: function (data)
        {
          alert(data);
          $('#subcategoryidmodal').html(data);
        }
        });
}
</script>
<script>
  function editFunction(url) {
    //alert(url);
    $.ajax({
      url:url,
      type:'get',
      data:{},
      success:function (res) {
        //alert(res);
        $('#editdiv').html(res);
      }
    });
  }
</script>
<script>
  function depteditFunction(url) {
    //alert(url);
    $.ajax({
      url:url,
      type:'get',
      data:{},
      success:function (res) {
        //alert(res);
        $('#depteditdiv').html(res);
      }
    });
  }
</script>

</body>
</html>
<?php
$this->load->model('Model_admin');
$this->load->model('catlog/Brand_model');
$this->load->model('catlog/category_model');
$this->load->model('catlog/subcategory_model');
$this->load->model('catlog/subsubcategory_model');
$categoryModalList=$this->category_model->getCategory();
$designationList=$this->Organization_model->getDesignationData();
?>

 <!-- The Category Modal -->
<div class="modal" id="appMenuModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addAppMenu' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD APPLICATION MENU</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
          <div class="col-md-6 form-group">
            <label for="email1">PARENT MENU</label>
            <select class="form-control" style="width: 100%;"  data-select2-id="1" tabindex="1" id="menu_parent" name="menu_parent" aria-hidden="true">
              <option value="">Select</option>
              <?php
              foreach ($appmenu as $arow) 
              {
              
              ?>
              <option value="<?php echo $arow->MENU_ID; ?>"><?php echo $arow->MENU_NAME; ?></option>
              <?php
              }
              ?>
             
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
           <div class="col-md-6 form-group">
            <label for="email1">NAME</label>
            <input type="text" class="form-control" required="required"  placeholder="Menu Name" id="menu_name" aria-describedby="emailHelp" name="menu_name" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">MENU CODE</label>
            <input type="text" class="form-control" required="required"  id="menu_code" aria-describedby="emailHelp" name="menu_code" placeholder="Enter Menu Code">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 

          <div class="col-md-6 form-group">
            <label for="email1">SORT ORDER</label>
            <input type="text" class="form-control" required="required"  id="sort_order" aria-describedby="emailHelp" name="sort_order" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>         
        

          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" style="width: 100%;" required="required"  data-select2-id="1" tabindex="1" id="menu_status" name="menu_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>  
          <div class="col-md-6 form-group">
            <label for="email1">WEB URL</label>
            <input type="text" class="form-control"  id="web_url" aria-describedby="emailHelp" name="web_url" placeholder="Enter Web Url">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
                  
        </div>         
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>






  <!-- The Category Modal -->
<div class="modal" id="brandmodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/addbrand' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD BRAND</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
          <div class="col-md-6 form-group">
            <label for="email1">BRAND NAME</label>
            <input type="text" class="form-control" required="required" id="brand_name" aria-describedby="emailHelp" name="brand_name" placeholder="Enter Brand Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
           <div class="col-md-6 form-group">
            <label for="email1">LOGO</label>
            <input type="file" class="form-control" required="required"  id="brand_image" aria-describedby="emailHelp" name="brand_image" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  


          <div class="col-md-6 form-group">
            <label for="email1">SORT ORDER</label>
            <input type="text" class="form-control" required="required"  id="brand_sort_order" aria-describedby="emailHelp" name="brand_sort_order" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>         
        

          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" style="width: 100%;" required="required"  data-select2-id="1" tabindex="1" id="brand_status" name="brand_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>  

          <div class="col-md-12 form-group">
            <label for="email1">BRAND DESCRIPTION</label>
            <textarea class="form-control" rows="3" required="required"  id="brand_desc" name="brand_desc" placeholder="Enter  Description" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>           
        </div>         
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>



  <!-- The Category Modal -->
<div class="modal" id="attributemodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/brand/addattribute' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD ATTRIBUTE</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
          <div class="form-group">
            <label for="email1">ATTRIBUTE NAME</label>
            <input type="text" class="form-control" required="required"  id="attribute_name" aria-describedby="emailHelp" name="attribute_name" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
           
          <div class="form-group">
            <label for="email1">Description</label>
            <input type="text" class="form-control" required="required"  id="attribute_desc" aria-describedby="emailHelp" name="attribute_desc" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>          
        </div>        
      
      </div>

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
  
  <!-- The Category Modal -->
<div class="modal" id="designationmodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addDesignation' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD DESIGNATION</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
           <div class="col-md-12 form-group">
            <label for="email1">DEPARTMENT</label>
            <select class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="desig_depart" name="desig_depart" aria-hidden="true">
              <option value="">Select Department</option>
              <?php
              $departmentData = $this->Organization_model->getDepartmentData();
              foreach ($departmentData as $drow) {
               
              ?>
              <option value="<?php echo $drow->PR_DEPARTMENT_ID; ?>"><?php echo $drow->PR_DEPARTMENT_NAME; ?></option>
              <?php
              }
              ?>
            </select>
          </div>  
          <div class="col-md-6  form-group">
            <label for="email1">DESIGNATION NAME</label>
            <input type="text" class="form-control" required="required"  id="desig_name" aria-describedby="emailHelp" name="desig_name" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="desig_status" name="desig_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>     
           
          <div class="col-md-12  form-group">
            <label for="email1">DESCRIPTION</label>
            <input type="text" required="required"  class="form-control" id="desig_desc" aria-describedby="emailHelp" name="desig_desc" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>          
        </div>   

            
      
      </div>

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
<div class="modal" id="departmentmodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addDepartment' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD DEPARTMENT</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
           
          <div class="col-md-6  form-group">
            <label for="email1">DEPARTMENT NAME</label>
            <input type="text" class="form-control" required="required"  id="dept_name" aria-describedby="emailHelp" name="dept_name" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="desig_status" name="desig_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>     
           
          <div class="col-md-12  form-group">
            <label for="email1">DESCRIPTION</label>
            <input type="text" required="required"  class="form-control" id="dept_desc" aria-describedby="emailHelp" name="dept_desc" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>          
        </div>   

            
      
      </div>

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
  

<!-- The Category Modal -->
<div class="modal" id="categorymodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/addCategory' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD CATEGORY</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        
          <div class="col-md-12 form-group">
            <label for="email1">CATEGORY NAME</label>
            <input type="text" required="required"  class="form-control" id="cat_category" aria-describedby="emailHelp" name="cat_category" placeholder="Enter Category Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 

          <div class="col-md-6 form-group">
            <label for="email1">IMAGE</label>
            <input type="file" required="required"  class="form-control" id="cat_image" aria-describedby="emailHelp" name="cat_image" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">ICON</label>
            <input type="file" required="required"  class="form-control" id="cat_icon" aria-describedby="emailHelp" name="cat_icon" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  


          <div class="col-md-6 form-group">
            <label for="email1">SORT ORDER</label>
            <input type="text" required="required"  class="form-control" id="cat_sort_order" aria-describedby="emailHelp" name="cat_sort_order" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>         
        

          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select required="required"  class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="cat_status" name="cat_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>  

          <div class="col-md-12 form-group">
            <label for="email1">CATEGORY DESCRIPTION</label>
            <textarea required="required"  class="form-control" rows="3" id="cat_desc" name="cat_desc" placeholder="Enter Category Description" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>         
        
      </div>

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

<!-- The Sub Category Modal -->
<div class="modal" id="subcategorymodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form  enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/addSubCategory' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD SUB CATEGORY</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
    
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">CATEGORY</label>
            <select required="required"  class="form-control" style="width: 100%;" id="category" name="category" aria-hidden="true">
                  <option >Select Category</option>
                  <?php
                  foreach($categoryModalList as $row)
                  {
                  ?>
                  <option value="<?php echo $row->CATEGORY_ID; ?>"><?php echo $row->CATEGORY_NAME; ?></option>
                  <?php
                  }
                  ?>
                
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>   
              
     
          <div class="col-md-6 form-group">
            <label for="email1">SUB CATEGORY NAME</label>
            <input type="text" required="required"  class="form-control" id="sub_subcategory" aria-describedby="emailHelp" name="sub_category" placeholder="Enter Sub Category Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">IMAGE</label>
            <input type="file" required="required"  class="form-control" id="sub_image" aria-describedby="emailHelp" name="sub_image" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">ICON</label>
            <input type="file" required="required"  class="form-control" id="sub_icon" aria-describedby="emailHelp" name="sub_icon" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  


          <div class="col-md-6 form-group">
            <label for="email1">SORT ORDER</label>
            <input type="text" required="required"  class="form-control" id="sub_sort_order" aria-describedby="emailHelp" name="sub_sort_order" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>         
        

          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="sub_status" name="sub_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>  

          <div class="col-md-12 form-group">
            <label for="email1">CATEGORY DESCRIPTION</label>
            <textarea class="form-control" required="required"  rows="3" id="sub_desc" name="sub_desc" placeholder="Enter Category Description" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>           
        </div>        
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>


<!-- The Sub Category Modal -->
<div class="modal" id="subsubcategorymodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form  enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/addSubSubCategory' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD SUB SUB CATEGORY</h4>        
      </div>

        
        <div class="modal-body">
    
            <div class="col-md-6  form-group" >
            <label for="email1">CATEGORY</label>
              <select name="sscategory" class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" onchange="getsubCategory($(this).val(),'sub_category_id')"  id="category_id"  aria-hidden="true" >
                  <option >Select Category</option>
                  <?php
                  foreach($categoryModalList as $row)
                  {
                  ?>
                  <option value="<?php echo $row->CATEGORY_ID; ?>"><?php echo $row->CATEGORY_NAME; ?></option>
                  <?php
                  }
                  ?>
                
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
          <div class="col-md-6  form-group" >
            <label for="email1">SUB CATEGORY</label>
           <select  name="sssubcategory" class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="sub_category_id" aria-hidden="true">
                  <option >Select Sub Category</option>
         
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          
              
     
          <div class="col-md-6  form-group">
            <label for="email1">SUB SUB CATEGORY NAME</label>
            <input type="text" required="required"  class="form-control" id="sub_sub_subsubcategory" aria-describedby="emailHelp" name="subsubcategory" placeholder="Enter Sub Sub Category Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  


          <div class="col-md-6 form-group">
            <label for="email1">IMAGE</label>
            <input type="file" required="required"  class="form-control" id="sub_sub_image" aria-describedby="emailHelp" name="sub_sub_image" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">ICON</label>
            <input type="file" required="required"  class="form-control" id="sub_sub_icon" aria-describedby="emailHelp" name="sub_sub_icon" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  


          <div class="col-md-6 form-group">
            <label for="email1">SORT ORDER</label>
            <input type="text" required="required"  class="form-control" id="sub_sub_sort_order" aria-describedby="emailHelp" name="sub_sub_sort_order" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>         
        

          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="sub_sub_status" name="sub_sub_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1"> DESCRIPTION</label>
            <textarea class="form-control" required="required"  rows="3" id="sub_sub_desc" name="sub_sub_desc" placeholder="Enter Category Description" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>           

         
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- The Sub Category Modal End -->


<!-- The Sub Category Modal -->
<div class="modal" id="vendormodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form  enctype="multipart/form-data" action="<?php echo base_url() . 'vendor/vlist/addVendor' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">Vendor Registration</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
    
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">Name</label>
            <input type="text" class="form-control" id="vendor_name" aria-describedby="emailHelp" name="vendor_name" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div>   
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">Email</label>
            <input type="text" class="form-control" id="vendor_email" aria-describedby="emailHelp" name="vendor_email" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div>
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">Phone</label>
            <input type="text" class="form-control" id="vendor_phone" aria-describedby="emailHelp" name="vendor_phone" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div>

              
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">Company / Buisness Name </label>
            <input type="text" class="form-control" id="vendor_store_name" aria-describedby="emailHelp" name="vendor_store_name" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div> 
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">Gstin</label>
            <input type="text" class="form-control" id="vendor_gstin" aria-describedby="emailHelp" name="vendor_gstin" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div> 
            <div class="col-md-6 form-group">
            <label for="email1">Select product category</label>
            
            <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="vendor_category" name="vendor_category" aria-hidden="true">
                  <option >Select Category</option>
                  <?php
                  foreach($categoryModalList as $row)
                  {
                  ?>
                  <option value="<?php echo $row->category_id; ?>"><?php echo $row->category_name; ?></option>
                  <?php
                  }
                  ?>
                
            </select>
          </div>  
          <div class="col-md-12 form-group" data-select2-id="13">
            <label for="email1">Address</label>
            <input type="text" class="form-control" id="vendor_address" aria-describedby="emailHelp" name="vendor_address" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div>    
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">Pincode</label>
            <input type="text" class="form-control" id="vendor_pincode" aria-describedby="emailHelp" name="vendor_pincode" placeholder="">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div> 
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">Country</label>
            <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="vendor_country" name="vendor_country" aria-hidden="true">
              <option >Select Country</option>
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div>   
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">State</label>
            <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="vendor_state" name="vendor_state" aria-hidden="true">
              <option >Select State</option>
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div> 
            <div class="col-md-6 form-group" data-select2-id="13">
            <label for="email1">City</label>
            <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="vendor_city" name="vendor_city" aria-hidden="true">
              <option >Select City</option>
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
            </div> 
            
            
        </div>        
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- USER Modal -->
<div class="modal fade" id="usermodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form  enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addUser' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD USER</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
    
            <div class="col-md-3 form-group" data-select2-id="13">
            <label for="email1">DESIGNATION</label>
            <select class="form-control" required="required"  style="width: 100%;" id="designation" name="designation" aria-hidden="true">
                  <option value="">Select Designation</option>
                  <?php
                  foreach($designationList as $row)
                  {
                  ?>
                  <option value="<?php echo $row->ROLE_ID; ?>"><?php echo $row->ROLE_NAME; ?></option>
                  <?php
                  }
                  ?>
                
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>   
          
          <div class="col-md-3 form-group">
            <label for="email1">TITLE</label>
            <select class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="title" name="title" aria-hidden="true">
             <option value="">Select Title</option>
              <option value="Mr.">Mr.</option>
              <option value="Ms.">Ms.</option>              
              <option value="Mrs.">Mrs.</option>
              <option value="Miss.">Miss.</option>
            </select>
          </div>   
     
          <div class="col-md-3 form-group">
            <label for="email1">NAME</label>
            <input type="text" required="required"  class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="Enter Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
           <div class="col-md-3 form-group">
            <label for="email1">EMAIL</label>
            <input type="text" required="required"  class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter Email">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">PHONE</label>
            <input type="text"  required="required"  class="form-control" id="phone" aria-describedby="emailHelp" name="phone" placeholder="Enter Phone">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">AADHAR CARD</label>
            <input type="text" class="form-control" id="aadhar" aria-describedby="emailHelp" name="aadhar" placeholder="Enter Aadhar Card">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">PAN CARD</label>
            <input type="text" required="required"  class="form-control" id="pancard" aria-describedby="emailHelp" name="pancard" placeholder="Enter Pancard">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-3 form-group">
            <label for="email1">BANK NAME</label>
            <input type="text" required="required"  class="form-control" id="bankname" aria-describedby="emailHelp" name="bankname" placeholder="Enter Bank Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">IFSC CODE</label>
            <input type="text" required="required"  class="form-control" id="ifsc" aria-describedby="emailHelp" name="ifsc" placeholder="Enter IFSC Code">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-3 form-group">
            <label for="email1">BANK ACCOUNT NO</label>
            <input type="text" required="required"  class="form-control" id="accountno" aria-describedby="emailHelp" name="accountno" placeholder="Enter Account Number">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <!-- <div class="col-md-3 form-group">
            <label for="email1">PAN CARD</label>
            <input type="text" required="required"  class="form-control" id="pancard" aria-describedby="emailHelp" name="pancard" placeholder="Enter Pancard">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small>
          </div>  -->

          <div class="col-md-3 form-group">
            <label for="email1">IMAGE</label>
            <input type="file" required="required"  class="form-control" id="user_image" aria-describedby="emailHelp" name="user_image" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
          <div class="col-md-3 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="u_status" name="u_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>   

          <div class="col-md-6 form-group">
            <label for="email1">PRESENT ADDRESS</label>
            <textarea class="form-control" required="required"  rows="3" id="present_address" name="present_address" placeholder="Enter Present Address" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-6 form-group">
            <label for="email1">PERMANENT ADDRESS</label>
            <textarea class="form-control" required="required"  rows="3" id="permanent_address" name="permanent_address" placeholder="Enter Permanent Address" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
                  
        </div>        
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" style="margin-top:25px;">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top:25px;">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>


<!-- USERModal -->


<!-- The Sub Category Modal -->
<div class="modal" id="productmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form  enctype="multipart/form-data" action="<?php echo base_url() . 'catlog/addproduct' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD PRODUCT</h4>        
      </div>

        
        <div class="modal-body">
             <div class="col-md-3 form-group" >
            <label for="email1">BRAND</label>
              <select name="brand" class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="brand"  aria-hidden="true" >
                  <option >Select Brand</option>
                  <?php
                  foreach($brandList as $row)
                  {
                  ?>
                  <option value="<?php echo $row->BRAND_ID; ?>"><?php echo $row->BRAND_NAME; ?></option>
                  <?php
                  }
                  ?>
                
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
    
            <div class="col-md-3  form-group" >
            <label for="email1">CATEGORY</label>
              <select name="sscategory" class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" onchange="getsubCategory($(this).val(),'sub_category_id')"  id="category_id"  aria-hidden="true" >
                  <option >Select Category</option>
                  <?php
                  foreach($categoryModalList as $row)
                  {
                  ?>
                  <option value="<?php echo $row->CATEGORY_ID; ?>"><?php echo $row->CATEGORY_NAME; ?></option>
                  <?php
                  }
                  ?>
                
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  
          <div class="col-md-3  form-group" >
            <label for="email1">SUB CATEGORY</label>
           <select  name="subcategory" class="form-control" required="required"  onchange="getsubsubCategory($(this).val(),'sub_sub_category_id')"   style="width: 100%;" data-select2-id="1" tabindex="1" id="sub_category_id" aria-hidden="true">
                  <option >Select Sub  Category</option>
         
            </select>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          
              
     
          <div class="col-md-3  form-group">
            <label for="email1">SUB SUB CATEGORY </label>
          <select  name="subsubcategory" class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="sub_sub_category_id" aria-hidden="true">
                  <option >Select Sub Sub Category</option>
         
            </select>
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">PRODUCT NAME</label>
            <input type="text" required="required"  class="form-control" id="prdname" aria-describedby="emailHelp" name="prdname" placeholder="Enter Product Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">QUANTITY</label>
            <input type="text" required="required"  class="form-control" id="qty" aria-describedby="emailHelp" name="qty" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">PRICE</label>
            <input type="text" required="required"  class="form-control" id="price" aria-describedby="emailHelp" name="price" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1">SELL PRICE</label>
            <input type="text" required="required"  class="form-control" id="sprice" aria-describedby="emailHelp" name="sprice" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  


          <div class="col-md-6 form-group">
            <label for="email1">IMAGE</label>
            <input type="file" required="required"  class="form-control" id="sub_sub_image" aria-describedby="emailHelp" name="sub_sub_image" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

          <div class="col-md-3 form-group">
            <label for="email1">ICON</label>
            <input type="file" required="required"  class="form-control" id="sub_sub_icon" aria-describedby="emailHelp" name="sub_sub_icon" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  


          <div class="col-md-6 form-group">
            <label for="email1">SORT ORDER</label>
            <input type="text" required="required"  class="form-control" id="sub_sub_sort_order" aria-describedby="emailHelp" name="sub_sub_sort_order" placeholder="Enter Shorting Order No">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>         
        

          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="sub_sub_status" name="sub_sub_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>  

          <div class="col-md-6 form-group">
            <label for="email1"> DESCRIPTION</label>
            <textarea class="form-control" required="required"  rows="3" id="sub_sub_desc" name="sub_sub_desc" placeholder="Enter Category Description" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>           

         
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- The Sub Category Modal End -->


  <!-- The Category Modal -->
<div class="modal" id="warehousemodal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="<?php echo base_url() . 'organization/addWarehouse' ?>" method="post">
      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#2874f0; ">
        <h4 class="modal-title" style="color:#ffffff;">ADD WAREHOUSE</h4>        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="modal-body">
          <div class="col-md-6 form-group">
            <label for="email1">WAREHOUSE NAME</label>
            <input type="text" class="form-control" required="required" id="warehouse_name" aria-describedby="emailHelp" name="warehouse_name" placeholder="Enter Warehouse Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>  

       
        

          <div class="col-md-6 form-group">
            <label for="email1">STATUS</label>
            <select class="form-control" style="width: 100%;" required="required"  data-select2-id="1" tabindex="1" id="warehouse_status" name="warehouse_status" aria-hidden="true">
              <option value="1">Active</option>
              <option value="0">De-Active</option>
            </select>
          </div>  

          <div class="col-md-12 form-group">
            <label for="email1">ADDRESS</label>
            <textarea class="form-control" rows="3" required="required"  id="warehouse_addr" name="warehouse_addr" placeholder="Enter  Warehouse Address" spellcheck="false"></textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>           
        </div>         
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
