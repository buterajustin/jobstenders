<?php include("header.php");?>
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Districts</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Districts</li>
      </ol>


  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          List of All District's Accounts
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>District</th>
                        <th>Action</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>District</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
             
                <tbody>
                    <?php 

                    $query=mysql_query("SELECT * FROM users WHERE type='2'");
                    while ($row=mysql_fetch_array($query)) {
                    
                    ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['institution'];?></td>
                        <td>

                            <!--<button id="showtop" class="btn btn-default">Show Bottom</button>
                            <div id="alerttop" class="kode-alert kode-alert-icon kode-alert-click alert6 kode-alert-top">
                                <i class="fa fa-user"></i>
                                Are you sure you want to delete <?php echo $row['institution'];?> district <a href="dis_delete.php?id=<?php echo $row['id'];?>">Yes</a> or <a href="#">No</a>
                            </div>-->

                            <a href="dis_delete.php?id=<?php echo $row['id'];?>">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            <!--<script>
                                document.querySelector('#button5').onclick = function(){
                                  swal({
                                    title: "Are you sure?", 
                                    text: "Are you sure you want to delete <?php echo $row['institution'];?>", 
                                    type: "warning", 
                                    showCancelButton: true, 
                                    confirmButtonColor: "#DD6B55", 
                                    confirmButtonText: "Yes, delete it!", 
                                    closeOnConfirm: false 
                                  },
                                  function(){
                                      swal("Deleted!", "District has been deleted.", "success"); 
                                  });
                                };
                            </script>-->
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

      </div>
    </div>
    <!-- End Panel -->
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
Sweet Alert
================================================ -->
<script src="../assets/js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="../assets/js/kode-alert/main.js"></script>

<!-- ================================================
Data Tables
================================================ -->
<script src="../assets/js/datatables/datatables.min.js"></script>





<script>
$(document).ready(function() {
    $('#example0').DataTable();
} );
</script>


<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
} );
</script>


</body>
</html>