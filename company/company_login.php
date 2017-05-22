<?php

include('../config/db.php');
session_start();
	{

	$username = mysql_real_escape_string($_POST['username']);

	$pass = md5(mysql_real_escape_string($_POST['password']));
	
	$fetch = mysql_query("SELECT id FROM users WHERE username='$username' AND password='$pass' AND type=3");

	$count = mysql_num_rows($fetch);

	if ($count !="")
		{
		//session_register("sessionregno");
		$_SESSION['login']="YES";
		$_SESSION['login_username'] = $username;
		$_SESSION['login_type'] = 3;


		if (isset($_POST['tenderid']) && isset($_POST['district'])) {
			$tenderid=$_POST['tenderid'];
			$district=$_POST['district'];

			header('Location:applytender.php?id='.$tenderid.'&district='.$district);
		}else{
			header("Location:index.php");
		}

		}
		else{
		header('Location:login.php?login=FAIL');
		}

}
?>