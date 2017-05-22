<?php include('config/db.php');?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jobs & Tenders - Home </title>

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
                <li class="link-btn"><a href="login.php"><span class="btn btn-theme btn-pill btn-xs btn-line">Login</span></a></li>
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

        <div class="hero-header">
          <div class="inner-hero-header">
            <div class="container">
              <div class="text-center logo"> <a href="index.php"><img src="assets/theme/images/logo.png" alt=""></a></div>
              <div class="relative">
                <i class="fa fa-globe ic-fade-globe"></i>
                <!-- form search -->
                <form class="form-search-home" method="GET" action="job_list.php">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>What</label>
                        <input name="title" class="form-control  input-lg" placeholder="Job title or Keywords">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Where</label>
                        <!--<input class="form-control input-lg" placeholder="District">-->
                        <select name="district" class="form-control input-lg">
                          <option value="">Select District</option>
                          <?php
                            $query=mysql_query("SELECT institution FROM users WHERE type=2");
                            while($row=mysql_fetch_array($query)){
                          ?>
                          <option><?php echo $row['institution'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-t-primary btn-lg btn-theme btn-pill btn-block">Find Jobs</button>
                  </div>
                </form> <!-- end form search -->
              </div>
            </div>
          </div>






        </div>
      </header><!-- end main-header -->


      <!-- body-content -->
      <div class="body-content clearfix" >

        <!-- box simple static -->
        <div class="block-section bg-color1">
          <div class="container">
            <div class="row text-center">
              <div class="col-md-3">
                <h3 class="font-2x ">
                  <?php
                    $query=mysql_query("SELECT count(id) as User FROM users WHERE type!=1");
                    $row=mysql_fetch_array($query);
                    echo $row['User'];
                  ?>
                </h3>
                <h4 class="color-text">Registered Districts</h4>
              </div>
              <div class="col-md-3">
                <h3 class="font-2x ">
                  <?php
                    $query=mysql_query("SELECT count(id) as Job FROM jobs");
                    $row=mysql_fetch_array($query);
                    echo $row['Job'];
                  ?>
                </h3>
                <h4 class="color-text">Jobs Posted</h4>
              </div>
              <div class="col-md-3">
                <h3 class="font-2x ">
                  <?php
                    $query=mysql_query("SELECT count(id) as Tender FROM tenders");
                    $row=mysql_fetch_array($query);
                    echo $row['Tender'];
                  ?>
                </h3>
                <h4 class="color-text">Tenders Posted</h4>
              </div>
              <div class="col-md-3">
                <h3 class="font-2x ">
                  <?php
                    $query=mysql_query("SELECT count(id) as Comp FROM companies");
                    $row=mysql_fetch_array($query);
                    echo $row['Comp'];
                  ?>
                </h3>
                <h4 class="color-text">Registered Companies</h4>
              </div>
            </div>
          </div>
        </div><!-- end box simple static -->

      </div><!--end body-content -->


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