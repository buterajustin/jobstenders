<?php include("header.php");?>
<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Tender Applications</h1>
      <ol class="breadcrumb">
        <li><a href="index.php">Dashboard</a></li>
        <li class="active">Tender Applications</li>
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
          List of All Tender Applications
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Tender Title</th>
                        <th>Document</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Company</th>
                        <th>Tender Title</th>
                        <th>Document</th>
                        <th>Email</th>
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

                    $query=mysql_query("SELECT ta.*, (SELECT t.title FROM tenders t WHERE t.id=ta.tender) as title FROM tenderapps ta WHERE ta.district='$di_inst'");
                    while ($row=mysql_fetch_array($query)) {
                    
                    ?>
                    <tr>
                        <td><?php $id=$row['id']; $applicant_name=$row['comp_name']; echo $row['comp_name'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td><a href="../assets/uploads/documents/<?php echo $row['comp_doc'];?>">Download Doc</a></td>
                        <td><?php $email=$row['comp_email']; echo $row['comp_email'];?></td>
                        <td><?php 
                            if($row['status']==0) {
                                echo "<a href='#judge-modal' data-toggle='modal' class='btn btn-xs btn-theme btn-default'>Pending</a>";
                            }elseif($row['status']==1){
                                echo "Accepted <span class='icon color7'><i class='fa fa-check'></i></span>" ;
                            }elseif($row['status']==2){
                                echo "Rejected <span class='icon color10'><i class='fa fa-close'></i></span>";
                            }
                            ?>
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


<!-- Modal applying -->
        <div class="modal fade" id="judge-modal">
          <div class="modal-dialog ">
            <div class="modal-content">
              <form action="tjudge.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" >Judge an Applicant</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Mention</label>
                    <select class="form-control" name="mention" required>
                        <option value="">Select Mention</option>
                        <option value="1">Accepted <span class='icon color7'><i class='fa fa-check'></i></span></option>
                        <option value="2">Rejected <span class='icon color10'><i class='fa fa-close'></i></span></option>
                    </select>
                  </div>
                  
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="hidden" name="email" value="<?php echo $email; ?>">
                  <input type="hidden" name="appliname" value="<?php echo $applicant_name; ?>">
                  <input type="hidden" name="district" value="<?php echo $di_inst; ?>">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-theme" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success btn-theme">Judge Applicant</button>
                </div>
              </form>
            </div>
          </div>
        </div><!-- end modal  apply --> 



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

<!-- ================================================
Sweet Alert
================================================ -->
<script src="../assets/js/sweet-alert/sweet-alert.min.js"></script>

<!-- ================================================
Kode Alert
================================================ -->
<script src="../assets/js/kode-alert/main.js"></script>



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