
<?php include("header.php");?>
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Add New District</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Add New District</li>
      </ol>

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <h1>Add New District</h1>
      <h4>Adding new district account that can be used to post jobs and tenders of the district.</h4>
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
          Form to add district account
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form class="form-horizontal" action="addingdistrict.php" method="POST">


                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="input1" placeholder="Name" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="input2" placeholder="Username" required>
                  </div>
                </div>


                <div class="form-group">
                  <label for="input3" class="col-sm-2 control-label form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="input3" placeholder="Password" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="input2" placeholder="Email" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input4" class="col-sm-2 control-label form-label">Institution</label>
                  <div class="col-sm-10">
                    <select name="district" class="selectpicker form-control" id="input4" required>
                      <option value="">--Select District--</option>
                      <?php
                        $districts = ['Gasabo','Kicukiro','Nyarugenge','Burera','Gakenke','Gicumbi','Musanze','Rulindo','Nyabihu','Gisagara','Huye','Kamonyi','Muhanga','Nyamagabe','Nyanza','Nyaruguru','Ruhango','Karongi','Ngororero','Nyabihu','Nyamasheke','Rubavu','Rusizi','Rutsiro'];
                        foreach ($districts as $key => $value) {
                      ?>
                      <option><?php echo $value;?></option>
                      <?php } ?>
                    </select>                  
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