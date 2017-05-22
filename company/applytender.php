
<?php include("header.php");

if (isset($_GET['id'])) {
  $id=$_GET['id'];
}
if (isset($_GET['district'])) {
  $district=$_GET['district'];
}

$compq=mysql_query("SELECT * FROM companies WHERE name='$com_name'");
$comp=mysql_fetch_array($compq);

$query=mysql_query("SELECT * FROM tenders WHERE id=$id");

$tender=mysql_fetch_array($query);
?>
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Apply to <?php echo $tender['title'];?></h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Apply to <?php echo $tender['title'];?></li>
      </ol>

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <h1>Apply to <?php echo $tender['title'];?></h1>
      <h4>Applying to tender.</h4>
    </div>

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  
  <!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Form to apply Tender
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form class="form-horizontal" action="addingtender.php" method="POST" enctype="multipart/form-data">


                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label form-label">Tender Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="input1" value="<?php echo $tender['title'];?>" readonly>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="district" value="<?php echo $district;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label form-label">Company</label>
                  <div class="col-sm-10">
                    <input type="text" name="company" class="form-control" id="input1" value="<?php echo $comp['name'];?>" readonly>
                    <input type="hidden" name="tin" value="<?php echo $comp['tin'];?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="input1" value="<?php echo $comp['email'];?>" readonly>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="input1" value="<?php echo $comp['phone'];?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                    <label for="input5" class="col-sm-2 control-label form-label" >Bidding Document</label>
                    <div class="col-sm-10">
                          <input type="file" name="document" class="form-control" id="input5" required>
                    </div>
                </div>
                  


                

                

                <div class="form-group">
                  <div class="col-sm-12 text-center">
                    <input type="submit" class="btn btn-primary">
                  </div>
                </div>

              </form> 

            </div>

      </div>
    </div>

  </div>
  <!-- End Row -->

  <!-- Start Row -->
  <div class="row">
  </div>
  <!-- End Row -->

  

</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<?php
include("footer.php");
?>


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- END SIDEPANEL -->
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
Moment.js
================================================ -->
<script type="text/javascript" src="../assets/js/moment/moment.min.js"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="../assets/js/date-range-picker/daterangepicker.js"></script>


<!-- Basic Date Range Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-picker').daterangepicker(null, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<!-- Basic Single Date Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-picker').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<!-- Date Range and Time Picker -->
<script type="text/javascript">
$(document).ready(function() {
  $('#date-range-and-time-picker').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    format: 'MM/DD/YYYY h:mm A'
  }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

</body>
</html>