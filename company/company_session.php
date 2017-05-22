<?php

include('../config/db.php');

session_start();
$username = $_SESSION['login_username'];
$session = mysql_query("SELECT * FROM users WHERE username='$username'");
$row = mysql_fetch_array($session);
$com_session = $row['username'];
$rep_name = $row['name'];
$com_name = $row['institution'];
$com_type = $row['type'];


if (!isset($com_session))
{
header("Location:login.php");
}
?>