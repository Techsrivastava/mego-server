      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><a href="<?php echo base_url('admin/users'); ?>"><i class="fas fa-users"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text" style="color:green;">Active Users :- <?php echo count($activeusers); ?></span>
                <span class="info-box-text" style="color:red;">In Active Users :- <?php echo count($inactiveusers); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1">  <a href="<?php echo base_url('admin/package'); ?>"><i class="fas fa-list"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">Package</span>
                <span class="info-box-number"><?php echo count($package); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Package Purchase</span>
                <span class="info-box-text">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class=" fas fa-money-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Revenue</span>
                <span class="info-box-text">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!--   <div class="col-lg-6 ">
               <div id="piechart_3d" ></div>
          </div> -->

           <div class="col-lg-6">
               <!-- <div id="donutchart" ></div>-->
                   <div id="chart_div"></div> 
          </div>
          <!-- /.col -->
        </div>
  </div>
</section>
</div>


    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Users'],
          
          ['Active Users', '<?php echo count($activeusers); ?>'],
          ['In Active Users', '<?php echo count($inactiveusers); ?>']
        
        ]);

        var options = {
          title: 'Total Users',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <!-- <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Platinum',     4],
          ['Gold',     6],
          ['Plus',     6]
          
        ]);

        var options = {
          title: 'Users Package Data',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script> -->

        <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        var uac=parseInt("<?php echo count($activeusers); ?>");
        var uiac=parseInt("<?php echo count($inactiveusers); ?>");
        var tuc=parseInt("<?php echo count($users); ?>");
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Active Users');
        data.addColumn('number', 'In Active Users');
        data.addRows([
          ['Active Users', uac],
          ['In Active Users', uiac]
          
        ]);

        // Set chart options
        var options = {'title':'Total Users '+tuc};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


    <script>
     $('document').ready(function(){
        setTimeout(function(){
           window.location.reload(1);
        }, 50000);
     });
</script>