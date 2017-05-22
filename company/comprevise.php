<?php 
include('../config/db.php');

	$fetch = mysql_query("SELECT id,type FROM users ") or die(mysql_error());
	$row = mysql_fetch_array($fetch);
	$a = $row['type'];

	echo "type=$a";
?>