<?php

include("../config/db.php");

$name=mysql_real_escape_string($_POST['name']);
$username=mysql_real_escape_string($_POST['username']);
$ppassword=mysql_real_escape_string($_POST['password']);
$email=mysql_real_escape_string($_POST['email']);
$password=md5($ppassword);
$district=mysql_real_escape_string($_POST['district']);
$subject="Creation of ".$district. " district account";

$sql="INSERT INTO users (name, username, password, email,type, institution) VALUES('$name','$username','$password','$email',2,'$district')";
//die($sql);


$query=mysql_query($sql) or die(mysql_error());

if($query){
	include('AddNewDis_Notif.php');
	header('Location:districts.php');	
}else{
	header('Location:addnewdistrict.php');
}

?>