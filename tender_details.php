<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jobs & Tenders - Tender Details </title>

    <!--favicon-->
    <link rel="apple-touch-icon" href="assets/theme/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/theme/images/favicon.ico" type="image/x-icon">

    <!-- bootstrap -->
    <link href="assets/plugins/bootstrap-3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- lightbox -->
    <link href="assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">


    <!-- Themes styles-->
    <link href="assets/theme/css/theme.css" rel="stylesheet">  
    <!-- Your custom css -->
    <link href="assets/theme/css/theme-custom.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>  
  <body>
    <!-- wrapper page -->
    <div class="wrapper">
      <!-- main-header -->
      <header class="main-header">


        <!-- main navbar -->
        <nav class="navbar navbar-default main-navbar hidden-sm hidden-xs">
          <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

              <ul class="nav navbar-nav">
                <li class=""><a href="job_list.php"><strong>Find a Job</strong></a></li>
                <li class=""><a href="tender_list.php"><strong>Tenders</strong></a></li>
              </ul>      
              <ul class="nav navbar-nav navbar-right">
                <li class="link-btn"><a href="company/"><span class="btn btn-theme btn-pill btn-xs btn-line">Login</span></a></li>
                <li class="link-btn"><a href="company/register.php"><span class="btn btn-theme  btn-pill btn-xs btn-line">Register</span></a></li>
              </ul>
            </div>
          </div>
        </nav><!-- end main navbar -->

        <!-- mobile navbar -->
        <div class="container">
          <nav class="mobile-nav hidden-md hidden-lg">
            <a href="#" class="btn-nav-toogle first">
              <span class="bars"></span>
              Menu
            </a>
            <div class="mobile-nav-block">
              <h4>Navigation</h4>
              <a href="#" class="btn-nav-toogle">
                <span class="barsclose"></span>
                Close
              </a>      

              <ul class="nav navbar-nav">
                <li class=""><a href="job_list.php"><strong>Find a Job</strong></a></li>
                
                <li><a href="company/"><strong>Login</strong></a></li>
                <li><a href="company/register.php"><strong>Register</strong></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >Pages <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="terms_privacy.html">Terms &amp; Privacy</a></li>
                  </ul>
                </li>
              </ul>    
            </div>
          </nav>
        </div><!-- mobile navbar -->


        <!-- form search area-->
        <div class="container">
          <div class="row">

            <div class="col-md-4">
              <!-- logo -->
              <div class="logo text-center-sm"> <a href="index.php"><img src="assets/theme/images/logo.png" alt=""></a></div>
            </div>

            <div class="col-md-8">
              <!-- form search -->
              <form class="form-search-list">
                <div class="row">
                  <div class="col-sm-5 col-xs-6 ">
                    <div class="form-group">
                      <label class="color-white">What</label>
                      <input class="form-control" placeholder="job title, keywords or company name" >
                    </div>
                  </div>
                  <div class="col-sm-5 col-xs-6 ">
                    <div class="form-group">
                      <label class="color-white">Where</label>
                      <input class="form-control" placeholder="city, province, or region">
                    </div>
                  </div>
                  <div class="col-sm-2 col-xs-12 ">
                    <div class="form-group">
                      <label class="hidden-xs">&nbsp;</label>
                      <button class="btn btn-block btn-theme  btn-success">Search</button>
                    </div>
                  </div>
                </div>
              </form>  <!-- form search -->
            </div>


          </div>


          




        </div><!-- end form search area-->

      </header><!-- end main-header -->


      <!-- body-content -->
      <div class="body-content clearfix" >
<?php
  include("config/db.php");
  $id=$_GET['id'];
  $query=mysql_query("SELECT * FROM tenders WHERE id=$id");
  $row=mysql_fetch_array($query);
?>
        <!-- link top -->
        <div class="bg-color2 block-section-xs line-bottom">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 hidden-xs">
                <div>Tender details :</div>
              </div>
              <div class="col-sm-6">
                <div class="text-right"><a href="tender_list.php">&laquo; Go back to tender listings</a></div>
              </div>
            </div>
          </div>
        </div><!-- end link top -->

        <div class="bg-color2">
          <div class="container">
            <div class="row">
              <div class="col-md-9">

                <!-- box item details -->
                <div class="block-section box-item-details">
                  <div class="row">
                    <div class="col-md-8">
                      <h1>District: <?php echo $row['district']; ?></h1>
                    </div>
                    <div class="col-md-4">
                      <p class="text-right"><a href="#">Go to their website &raquo;</a></p>
                    </div>
                  </div>

                  <h2 class="title">Title: <?php echo $row['title'];?></h2>
                  <div class="job-meta">
                    <ul class="list-inline">
                      <li>Deadline: <i class="fa fa-clock-o"></i> <?php echo date('m/d/Y',$row['deadline']);?></li>
                    </ul>
                  </div>
                  <h4>Description:</h4>
                  <p><?php echo $row['description'];?></p>
                  
                  
                </div><!-- end box item details -->

              </div>
              <div class="col-md-3">

                <!-- box affix right -->
                <div class="block-section " id="affix-box">
                  <div class="text-right">
                    <p><a href="#modal-apply"  data-toggle="modal" class="btn btn-theme btn-t-primary btn-block-xs">Apply this Tender</a></p>
                    <p>Share This Tender <span class="space-inline-10"></span> :</p>
                    <p class="share-btns">
                      <a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i></a>
                      <a href="#" class="btn btn-info"><i class="fa fa-twitter"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fa fa-google-plus"></i></a>
                      <a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
                    </p>
                  </div>
                </div><!-- box affix right -->

              </div>
            </div>
          </div>
        </div>

        




        <?php
        //include "company/company_session.php";
        
        
        if(isset($_SESSION['login']) && $_SESSION['login_type']==3){
        ?>
        <!-- Modal applying -->
        <div class="modal fade" id="modal-apply">
          <div class="modal-dialog ">
            <div class="modal-content">
              <form action="applytender.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" >Tender Application</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter your Name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"  placeholder="Enter your Email">
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone"  placeholder="Enter your Phone Number">
                  </div>
                  <input type="hidden" name="job" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="district" value="<?php echo $row['district']; ?>">
                  <div class="form-group">
                    <label>Your Resume</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                        <span class="btn btn-default btn-theme btn-file">
                          File  <input type="file" name="cv" >
                        </span>
                      </span>
                      <input type="text" class="form-control form-flat" value="" readonly>
                    </div>
                    <small>Upload your CV/resume. Max. file size: 5 MB.</small>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-theme" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success btn-theme">Send Application</button>
                </div>
              </form>
            </div>
          </div>
        </div><!-- end modal  apply --> 
        <?php }else{
          ?>


          <!-- Modal applying -->
        <div class="modal fade" id="modal-apply">
          <div class="modal-dialog ">
            <div class="modal-content">
              <form action="company/company_login.php" method="POST">
                <div class="modal-header ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" >Please login first on the Company Account</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username"  placeholder="Enter your username" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Enter your password" required>
                  </div>
                  
                  <input type="hidden" name="tenderid" value="<?php echo $row['id']; ?>">
                  <input type="hidden" name="district" value="<?php echo $row['district']; ?>">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-theme" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger btn-theme">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div><!-- end modal  apply --> 



          <?php
        } 
        ?>


      <!-- main-footer -->
      <footer class="main-footer">


        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-inline link-footer text-center-xs">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-sm-6 ">
              <p class="text-center-xs hidden-lg hidden-md hidden-sm">Stay Connect</p>
              <div class="socials text-right text-center-xs">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </footer><!-- end main-footer -->

    </div><!-- end wrapper page -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/plugins/jquery.js"></script>
    <script src="assets/plugins/jquery.easing-1.3.pack.js"></script>
    <!-- jQuery Bootstrap -->
    <script src="assets/plugins/bootstrap-3.3.2/js/bootstrap.min.js"></script>
    <!-- Lightbox -->
    <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Theme JS -->
    <script src="assets/theme/js/theme.js"></script>

    <!-- maps -->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> 
    <script src="assets/plugins/gmap3.min.js"></script>
    <!-- maps single marker -->
    <script src="assets/theme/js/map-detail.js"></script>

  </body>
</html>