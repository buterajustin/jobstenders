<?php

include('../config/db.php');

$tin = mysql_real_escape_string($_POST['tin']);

$compname = mysql_real_escape_string($_POST['compname']);

$address = mysql_real_escape_string($_POST['address']);

$email = mysql_real_escape_string($_POST['email']);

$phone = mysql_real_escape_string($_POST['phone']);

$name = mysql_real_escape_string($_POST['name']);

$username = mysql_real_escape_string($_POST['username']);

$pass = md5(mysql_real_escape_string($_POST['password']));

$time=date('Y-m-d h:m:s');
$registered_at=strtotime($time);
	
$query1 = mysql_query("INSERT INTO companies(tin, name, address, email, phone, registered_at, status) VALUES('$tin', '$compname', '$address', '$email', '$phone', '$registered_at', 'Active')");
$query2 = mysql_query("INSERT INTO users(name, username, password, type, institution) VALUES('$name', '$username', '$pass', 3, '$compname')");


if ($query1 & $query2){
	header("Location:index.php");		
}else{
	header('Location:register.php?register=FAIL');
}

?>