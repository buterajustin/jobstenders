<?php

include("../config/db.php");

$id=mysql_real_escape_string($_GET['id']);


$sql="DELETE FROM companies WHERE id='$id'";
//die($sql);


$query=mysql_query($sql) or die(mysql_error());

if($query){
	header('Location:districts.php');	
}else{
	header('Location:districts.php');
}

?>