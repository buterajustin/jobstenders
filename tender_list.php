<?php include('config/db.php');?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jobs & Tenders - Tender List </title>

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
                      <input class="form-control" placeholder="job title or keywords" >
                    </div>
                  </div>
                  <div class="col-sm-5 col-xs-6 ">
                    <div class="form-group">
                      <label class="color-white">Where</label>
                      <!--<input class="form-control" placeholder="District">-->
                      <select name="district" class="form-control">
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

        <div class="bg-color2">
          <div class="container">
            <div class="row">
              <div class="col-md-9">

                <!-- box listing -->
                <div class="block-section-sm box-list-area">

                  <!-- desc top -->
                  <div class="row hidden-xs">
                    <div class="col-sm-6  ">
                      <p>
                        <strong class="color-black">
                          <?php 
                            $today=date('m/d/Y h:m:s');
                            $today = new DateTime($today);
                            $today = $today->getTimestamp();
                            //echo $today;
                            //$today=strtotime($today);

                            //die();

                            if(isset($_GET['title'])){
                              $title=$_GET['title'];
                            }

                            if(isset($_GET['district'])){
                              $district=$_GET['district'];
                            }

                            //echo "Title: ".$title." District: ".$district;
                            //die();


                            if (!isset($title) AND !isset($district)) {
                              echo "All Available Tenders";
                              $query=mysql_query("SELECT * FROM tenders WHERE deadline > $today");
                              $counting=mysql_query("SELECT count(id) as jbs FROM tenders WHERE deadline > $today");
                              $jnum=mysql_fetch_array($counting);
                              $jb=$jnum['jbs'];
                            }elseif (isset($title) AND $district!="") {
                              echo $title." Tenders Available in ".$district;
                              $query=mysql_query("SELECT * FROM tenders WHERE title LIKE '%$title%' AND district = '$district' AND deadline > $today");
                              $counting=mysql_query("SELECT count(id) as jbs FROM tenders WHERE title LIKE '%$title%' AND district = '$district' AND deadline > $today");
                              $jnum=mysql_fetch_array($counting);
                              $jb=$jnum['jbs'];
                            }elseif (isset($title) AND $district=="") {
                              echo $title." Tenders Available";
                              $query=mysql_query("SELECT * FROM tenders WHERE title LIKE '%$title%' AND deadline > $today");
                              $counting=mysql_query("SELECT count(id) as jbs FROM jobs WHERE title LIKE '%$title%' AND deadline > $today");
                              $jnum=mysql_fetch_array($counting);
                              $jb=$jnum['jbs'];
                            }elseif (!isset($title) AND $district!="") {
                              echo "All Tenders Available in ".$district;
                              $query=mysql_query("SELECT * FROM tenders WHERE district = '$district' AND deadline > $today");
                              $counting=mysql_query("SELECT count(id) as jbs FROM jobs WHERE district = '$district' AND deadline > $today");
                              $jnum=mysql_fetch_array($counting);
                              $jb=$jnum['jbs'];
                            }
                          ?>
                        </strong>
                      </p>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-right">
                        <?php echo $jb;?> Tenders
                      </p>
                    </div>
                  </div><!-- end desc top -->

                  <!-- item list -->
                   
                  <div class="box-list">
                    <?php while ($row=mysql_fetch_array($query)) { $id=$row['id'];$district=$row['district'];?>
                    <div class="item">
                      <div class="row">
                        <div class="col-md-1 hidden-sm hidden-xs"><div class="img-item"><img src="./assets/theme/images/company-logo/1.jpg" alt=""></div></div>
                        <div class="col-md-11">
                          <h3 class="no-margin-top"><a href="tender_details.php?id=<?php echo $row['id'];?>" class=""><?php echo $row['title'];?> <i class="fa fa-link color-white-mute font-1x"></i></a></h3>
                          <h5><span class="color-black">Deadline: <?php echo date('m/d/Y',$row['deadline']);?></span> - Posted by <span class="color-white-mute"><?php $district=$row['district']; echo $district;?></span></h5>
                          <p class="text-truncate "><?php echo $row['description'];?></p>
                          <div>
                            <span class="color-white-mute">16 hours ago</span> - 
                             
                            <!--<a href="#modal-email" data-toggle="modal"  class="btn btn-theme btn-xs btn-default">Email</a> - -->
                            <a href="tender_details.php?id=<?php echo $row['id'];?>" class="btn btn-theme btn-xs btn-default">more ...</a>
                          </div>
                        </div>
                      </div>
                    </div><!-- end item list -->

                    <?php } ?>

                  </div>

                  <!-- pagination -->
                  <nav >
                    <ul class="pagination pagination-theme  no-margin">
                      <li>
                        <a href="#" aria-label="Previous">
                          <span aria-hidden="true">&larr;</span>
                        </a>
                      </li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><span>...</span></li>
                      <li><a href="#">50</a></li>
                      <li>
                        <a href="#" aria-label="Next">
                          <span aria-hidden="true">&rarr;</span>
                        </a>
                      </li>
                    </ul>
                  </nav><!-- pagination -->

                </div><!-- end box listing -->


              </div>
              <div class="col-md-3">
                <div class="block-section-sm side-right">
                  <div class="row">
                    <div class="col-xs-6">
                      <p><strong>Right Side </strong></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

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