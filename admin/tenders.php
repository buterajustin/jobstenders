<?php include("header.php");?>
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Tenders</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Tenders</li>
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
          List of All Tenders
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Small Description</th>
                        <th>District</th>
                        <th>Deadline</th>
                        <th>Status</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Small Description</th>
                        <th>District</th>
                        <th>Deadline</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
             
                <tbody>
                    <?php 

                    function limit_text($text, $limit) {
                      if (str_word_count($text, 0) > $limit) {
                          $words = str_word_count($text, 2);
                          $pos = array_keys($words);
                          $text = substr($text, 0, $pos[$limit]) . '...';
                      }
                      return $text;
                    }

                    $today=date('m/d/Y h:m:s');
                    $today = new DateTime($today);
                    $today = $today->getTimestamp();

                    $query=mysql_query("SELECT * FROM tenders");
                    while ($row=mysql_fetch_array($query)) {
                    
                    ?>
                    <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo limit_text($row['description'],10);?></td>
                        <td><?php echo $row['district'];?></td>
                        <td><?php echo date('Y-m-d',$row['deadline']);?></td>
                        <td><?php if($today<$row['deadline']){echo "Active";}else{echo "Ended";}?></td>
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