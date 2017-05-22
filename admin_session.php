<?php

include('../config/db.php');

session_start();
$username = $_SESSION['login_username'];
$session = mysql_query("SELECT * FROM users WHERE username='$username'");
$row = mysql_fetch_array($session);
$ad_session = $row['username'];
$ad_name = $row['name'];
$ad_type = $row['type'];


if (!isset($ad_session))
{
header("Location:login.php");
}
?>