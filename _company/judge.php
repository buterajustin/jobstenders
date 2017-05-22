<?php

include("../config/db.php");

$id=mysql_real_escape_string($_POST['id']);
$email=mysql_real_escape_string($_POST['email']);
$mention=mysql_real_escape_string($_POST['mention']);
$name=mysql_real_escape_string($_POST['appliname']);
$district=mysql_real_escape_string($_POST['district']);
$subject="Feedback on job application #".$id;


$query=mysql_query("UPDATE jobapps SET status=$mention WHERE id=$id");

if ($query) {
	include('JJudge_Notif.php');
	header('Location:jobapps.php');
}else{
	header('Location:jobapps.php?status=FAIL');
}

?>