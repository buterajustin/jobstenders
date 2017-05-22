<?php
include("admin_session.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Tenders & Jobs MS - Dashboard</title>

  <!-- ========== Css Files ========== -->
  <link href="../assets/css/root.css" rel="stylesheet">


  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="../assets/img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="index.php" class="logo">Tenders & Jobs</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    
    <!-- Start Top Right -->
    <ul class="top-right">

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="../assets/img/ur.png" alt="img"><b><?php echo $ad_name;?></b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <li><a href="logout.php"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">Main</li>
  <li><a href="index.php"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard</a></li>
  <li><a href="companies.php"><span class="icon color6"><i class="fa fa-building-o"></i></span>Companies</a></li>
  <li><a href="jobs.php"><span class="icon color8"><i class="fa fa-tasks"></i></span>Jobs</a></li>
  <li><a href="tenders.php"><span class="icon color11"><i class="fa fa-list"></i></span>Tenders</a></li>
</ul>

<ul class="sidebar-panel nav">
  <li class="sidetitle">Districts Accounts</li>
  <li><a href="addnewdistrict.php"><span class="icon color15"><i class="fa fa-columns"></i></span>Add New Account</a></li>
  <li><a href="districts.php"><span class="icon color7"><i class="fa fa-users"></i></span>View All Accounts</a></li>
</ul>

<ul class="sidebar-panel nav">
  <li class="sidetitle">Actions</li>
  <li><a href="logout.php"><span class="icon color8"><i class="fa fa-sign-out"></i></span>Logout</a></li>
</ul>


</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 