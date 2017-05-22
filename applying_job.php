<?php

include("config/db.php");

$name=mysql_real_escape_string($_POST['name']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$district=mysql_escape_string($_POST['district']);
$title=mysql_escape_string($_POST['title']);
$job=mysql_escape_string($_POST['job']);
$subject="Succesfully Applied for Job";


$time=date('Y-m-d h:m:s');
$time=strtotime($time);

$target_dir = "assets/uploads/cv/";
$target_file = $target_dir . basename($_FILES["cv"]["name"]);
//echo $target_file;
//die();
$cv = $_FILES["cv"]["name"];
$uploadOk = 1;
$msg="";
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
	$msg="This CV already Exists";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["cv"]["size"] > 5000000) {
	$msg="CV is not allowed to pass 5mb";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "pdf" && $FileType != "doc" && $FileType != "docx" && $FileType != "txt" ) {
	$msg="CV Can't be other file than PDF,DOC,DOCX or TXT";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	//echo "<script language='javascript'> window.alert('Failed to Upload your CV because ".$msg."');window.location='job_list.php?status=FAIL';</script>";
	die($msg);
	echo "<script> alert('Failed to Upload your CV because ".$msg."');window.location.href='http://localhost/theo/'; </script>";
	header('Location:job_list.php?status=FAIL');
// if everything is ok, try to upload file
} else {
   if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
	   	$sql="INSERT INTO jobapps (job, district, applicant_name, applicant_cv, applicant_email, applicant_phone, applied_at) VALUES('$job','$district','$name','$cv','$email','$phone',$time)";
	    	//die($sql);
	    $query=mysql_query($sql) or die(mysql_error());

	   	if($query){
		echo "<script language='javascript/text'> window.alert('Succesfully Applied');window.location='index.php';</script>";
		include('apply_job_notif.php');
		header('Location:index.php');	
		}else{
		die(mysql_error());
		echo "<script language='javascript/text'> window.alert('Failed to Apply because".mysql_error()."');window.location='job_list.php?status=FAIL';</script>";
		header('Location:job_list.php?status=FAIL');
	}

    } else {
	    die($msg);
	    echo "<script language='javascript/text'> window.alert('Failed to Apply because CV is not uploaded (".$msg.")');window.location='job_list.php?status=FAIL';</script>";
	    header('Location:job_list.php?status=FAIL');
    }
}



?>