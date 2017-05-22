<?php include("header.php");?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active">This is a quick overview of some data</li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Dashboard</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">

  <!-- Start Top Stats -->
  <div class="col-md-12">
  <ul class="topstats clearfix">
    <li class="arrow"></li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-building"></i> Companies</span>
      <h3 class="color-up">
        <?php 
        $counting=mysql_query("SELECT count(id) as comps FROM companies WHERE status='Active';");
        $count=mysql_fetch_array($counting);
        echo $count['comps'];
        ?>
      </h3>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-list"></i> Tenders</span>
      <h3 class="color-up">
        <?php 
        $counting=mysql_query("SELECT count(id) as tends FROM tenders;");
        $count=mysql_fetch_array($counting);
        echo $count['tends'];
        ?>
      </h3>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-tasks"></i> Jobs</span>
      <h3 class="color-up">
        <?php 
        $counting=mysql_query("SELECT count(id) as jobs FROM jobs;");
        $count=mysql_fetch_array($counting);
        echo $count['jobs'];
        ?>
      </h3>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-list"></i> Availabe Tenders</span>
      <h3 class="color-up">
        <?php 
        $today=date('Y-m-d');
        $counting=mysql_query("SELECT count(id) as tends FROM tenders WHERE deadline>=$today;");
        $count=mysql_fetch_array($counting);
        echo $count['tends'];
        ?>
      </h3>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-tasks"></i> Available Jobs</span>
      <h3 class="color-up">
        <?php 
        $today=date('Y-m-d');
        $counting=mysql_query("SELECT count(id) as jobs FROM jobs WHERE deadline>=$today;");
        $count=mysql_fetch_array($counting);
        echo $count['jobs'];
        ?>
      </h3>
    </li>
  </ul>
  </div>
  <!-- End Top Stats -->


  <!-- Start First Row -->
  <div class="row">

    <!-- Start Chart Daily -->
    <div class="col-md-12 col-lg-12">
      <div class=" panel-widget widget chart-with-stats clearfix" style="height:450px;">

        <div class="col-sm-12" style="height:450px;">
          <h4 class="title">TODAY Statics<small>Last update: 1 Hours ago</small></h4>
          <div class="top-label"><h2>11.291</h2><h4>Today Total</h4></div>
          <div class="bigchart" id="todaysales"></div>
        </div>
        <div class="right" style="height:450px;">
          <h4 class="title">PAGE VIEW</h4>
          <!-- start stats -->
          <ul class="widget-inline-list clearfix">
            <li class="col-12"><span>
              <?php 
              $counting=mysql_query("SELECT count(id) as dist FROM users WHERE type='2';");
              $count=mysql_fetch_array($counting);
              echo $count['dist'];
              ?>
            </span>District<i class="chart sparkline-green"></i></li>
            <li class="col-12"><span>
              <?php 
              $counting=mysql_query("SELECT count(id) as comps FROM companies WHERE status='Active';");
              $count=mysql_fetch_array($counting);
              echo $count['comps'];
              ?>
            </span>Company<i class="chart sparkline-blue"></i></li>
            <li class="col-12"><span>
              <?php 
              $counting=mysql_query("SELECT count(id) as user FROM users;");
              $count=mysql_fetch_array($counting);
              echo $count['user'];
              ?>
            </span>User<i class="chart sparkline-red"></i></li>
          </ul>
          <!-- end stats -->
        </div>


      </div>
    </div>
    <!-- End Chart Daily -->

  </div>  
  <!-- End First Row -->

  <!-- Start Fourth Row -->
  <div class="row">

    <!-- Start Orders -->
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-widget">
        <div class="panel-title">
          LAST Tenders & Jobs
          <ul class="panel-tools">
            <li><a class="icon search-tool"><i class="fa fa-search"></i></a></li>
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-search">
          <form>
            <input type="text" class="form-control" placeholder="Search...">
            <i class="fa fa-search icon"></i>
          </form>
        </div>


        <div class="panel-body table-responsive">

          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <td class="text-center"><i class="fa fa-check"></i></td>
                <td>District</td>
                <td>Title</td>
                <td>Closing Date</td>
              </tr>
            </thead>
            <tbody>
              <?php 
                  $query=mysql_query("SELECT * FROM tenders ORDER BY id DESC LIMIT 5");
                    while ($row=mysql_fetch_array($query)) {
              ?>
              <tr>
                <td class="text-center"><div class="checkbox margin-t-0"><input id="checkbox1" type="checkbox"><label for="checkbox1"></label></div></td>
                <td><?php echo $row['district'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['deadline'];?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>

        <div class="panel-body table-responsive">

          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <td class="text-center"><i class="fa fa-check"></i></td>
                <td>District</td>
                <td>Title</td>
                <td>Closing Date</td>
              </tr>
            </thead>
            <tbody>
              <?php 
                  $query=mysql_query("SELECT * FROM jobs ORDER BY id DESC LIMIT 5");
                    while ($row=mysql_fetch_array($query)) {
              ?>
              <tr>
                <td class="text-center"><div class="checkbox margin-t-0"><input id="checkbox1" type="checkbox"><label for="checkbox1"></label></div></td>
                <td><?php echo $row['district'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['deadline'];?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
    <!-- End Orders -->


  </div>
  <!-- End Fourth Row -->

</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<?php
include("footer.php");
?>


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="../assets/js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="../assets/js/plugins.js"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="../assets/js/bootstrap-select/bootstrap-select.js"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="../assets/js/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="../assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="../assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="../assets/js/summernote/summernote.min.js"></script>

<!-- ================================================
Flot Chart
================================================ -->
<!-- main file -->
<script type="text/javascript" src="../assets/js/flot-chart/flot-chart.js"></script>
<!-- time.js -->
<script type="text/javascript" src="../assets/js/flot-chart/flot-chart-time.js"></script>
<!-- stack.js -->
<script type="text/javascript" src="../assets/js/flot-chart/flot-chart-stack.js"></script>
<!-- pie.js -->
<script type="text/javascript" src="../assets/js/flot-chart/flot-chart-pie.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="../assets/js/flot-chart/flot-chart-plugin.js"></script>

<!-- ================================================
Chartist
================================================ -->
<!-- main file -->
<script type="text/javascript" src="../assets/js/chartist/chartist.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="../assets/js/chartist/chartist-plugin.js"></script>

<!-- ================================================
Easy Pie Chart
================================================ -->
<!-- main file -->
<script type="text/javascript" src="../assets/js/easypiechart/easypiechart.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="../assets/js/easypiechart/easypiechart-plugin.js"></script>

<!-- ================================================
Sparkline
================================================ -->
<!-- main file -->
<script type="text/javascript" src="../assets/js/sparkline/sparkline.js"></script>
<!-- demo codes -->
<script type="text/javascript" src="../assets/js/sparkline/sparkline-plugin.js"></script>

<!-- ================================================
Rickshaw
================================================ -->
<!-- d3 -->
<script src="../assets/js/rickshaw/d3.v3.js"></script>
<!-- main file -->
<script src="../assets/js/rickshaw/rickshaw.js"></script>
<!-- demo codes -->
<script src="../assets/js/rickshaw/rickshaw-plugin.js"></script>

<!-- ================================================
Data Tables
================================================ -->
<script src="../assets/js/datatables/datatables.min.js"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="../assets/js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="../assets/js/kode-alert/main.js"></script>

<!-- ================================================
Gmaps
================================================ -->
<!-- google maps api -->
<script src="../assets/http://maps.google.com/maps/api/js?sensor=true"></script>
<!-- main file -->
<script src="../assets/js/gmaps/gmaps.js"></script>
<!-- demo codes -->
<script src="../assets/js/gmaps/gmaps-plugin.js"></script>

<!-- ================================================
jQuery UI
================================================ -->
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="../assets/js/moment/moment.min.js"></script>

<!-- ================================================
Full Calendar
================================================ -->
<script type="text/javascript" src="../assets/js/full-calendar/fullcalendar.js"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="../assets/js/date-range-picker/daterangepicker.js"></script>

<!-- ================================================
Below codes are only for index widgets
================================================ -->
<!-- Today Sales -->
<script>

// set up our data series with 50 random data points

var seriesData = [ [], [], [] ];
var random = new Rickshaw.Fixtures.RandomData(20);

for (var i = 0; i < 110; i++) {
  random.addData(seriesData);
}

// instantiate our graph!

var graph = new Rickshaw.Graph( {
  element: document.getElementById("todaysales"),
  renderer: 'bar',
  series: [
    {
      color: "#33577B",
      data: seriesData[0],
      name: 'Districts'
    }, {
      color: "#77BBFF",
      data: seriesData[1],
      name: 'Companies'
    }, {
      color: "#C1E0FF",
      data: seriesData[2],
      name: 'Users'
    }
  ]
} );

graph.render();

var hoverDetail = new Rickshaw.Graph.HoverDetail( {
  graph: graph,
  formatter: function(series, x, y) {
    var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
    var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
    var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
    return content;
  }
} );

</script>

<!-- Today Activity -->
<script>
// set up our data series with 50 random data points

var seriesData = [ [], [], [] ];
var random = new Rickshaw.Fixtures.RandomData(20);

for (var i = 0; i < 50; i++) {
  random.addData(seriesData);
}

// instantiate our graph!

var graph = new Rickshaw.Graph( {
  element: document.getElementById("todayactivity"),
  renderer: 'area',
  series: [
    {
      color: "#9A80B9",
      data: seriesData[0],
      name: 'London'
    }, {
      color: "#CDC0DC",
      data: seriesData[1],
      name: 'Tokyo'
    }
  ]
} );

graph.render();

var hoverDetail = new Rickshaw.Graph.HoverDetail( {
  graph: graph,
  formatter: function(series, x, y) {
    var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
    var swatch = '<span class="detail_swatch" style="background-color: ' + series.color + '"></span>';
    var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
    return content;
  }
} );
</script>



</body>
</html>