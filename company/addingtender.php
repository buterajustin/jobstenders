<?php

include("../config/db.php");

$title=mysql_real_escape_string($_POST['title']);
$id=mysql_real_escape_string($_POST['id']);
$company=mysql_real_escape_string($_POST['company']);
$tin=mysql_real_escape_string($_POST['tin']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$district=mysql_escape_string($_POST['district']);
$subject="Succesfully Applied for Tender";


$time=date('Y-m-d h:m:s');
$time=strtotime($time);

$target_dir = "../assets/uploads/documents/";
$target_file = $target_dir . basename($_FILES["document"]["name"]);
//echo $target_file;
//die();
$document = $_FILES["document"]["name"];
$uploadOk = 1;
$msg="";
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
	$msg="This document already Exists";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["document"]["size"] > 10000000) {
	$msg="Document is not allowed to pass 10mb";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "pdf" && $FileType != "doc" && $FileType != "docx" && $FileType != "txt" ) {
	$msg="Document Can't be other file than PDF,DOC,DOCX or TXT";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	//echo "<script language='javascript'> window.alert('Failed to Upload your CV because ".$msg."');window.location='job_list.php?status=FAIL';</script>";
	die($msg);
	echo "<script> alert('Failed to Upload your Document because ".$msg."');window.location.href='index.php'; </script>";
	header('Location:index.php?status=FAIL');
// if everything is ok, try to upload file
} else {
   if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
	   	$sql="INSERT INTO tenderapps (tender, district, comp_name, comp_email, comp_phone, comp_doc, applied_at) VALUES($id,'$district','$company','$email','$phone','$document',$time)";
	    	//die($sql);
	    $query=mysql_query($sql) or die(mysql_error());

	   	if($query){
		echo "<script language='javascript/text'> window.alert('Succesfully Applied');window.location='index.php';</script>";
		include('apply_tender_notif.php');
		header('Location:index.php');	
		}else{
		echo "<script language='javascript/text'> window.alert('Failed to Apply because".mysql_error()."');window.location='index.php?status=FAIL';</script>";
		die(mysql_error());
		header('Location:index.php?status=FAIL');
	}

    } else {
	    echo "<script language='javascript/text'> window.alert('Failed to Apply because Document is not uploaded (".$msg.")');window.location='index.php?status=FAIL';</script>";
	    die($msg);
	    header('Location:index.php?status=FAIL');
    }
}



?>