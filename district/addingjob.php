<?php

include("../config/db.php");

$title=mysql_real_escape_string($_POST['title']);
$district=mysql_real_escape_string($_POST['district']);
$description=mysql_real_escape_string($_POST['description']);
$deadline=mysql_real_escape_string($_POST['deadline']);
$deadline=date('m/d/Y h:m:s', strtotime($deadline));
//echo $deadline;
$deadline = new DateTime($deadline);
$deadline = $deadline->getTimestamp();
//echo $deadline;
//die();

$sql="INSERT INTO jobs (district, title, description, deadline) VALUES('$district','$title','$description','$deadline')";
//die($sql);


$query=mysql_query($sql) or die(mysql_error());

if($query){
	header('Location:jobs.php');	
}else{
	header('Location:addnewjob.php');
}

?>