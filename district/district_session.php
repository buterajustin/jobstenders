<?php

include('../config/db.php');

session_start();
$username = $_SESSION['login_username'];
$session = mysql_query("SELECT * FROM users WHERE username='$username'");
$row = mysql_fetch_array($session);
$di_session = $row['username'];
$di_name = $row['name'];
$di_inst = $row['institution'];
$di_type = $row['type'];


if (!isset($di_session))
{
header("Location:login.php");
}
?>