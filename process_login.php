<?php

include('config/db.php');
session_start();
	{

	$username = mysql_real_escape_string($_POST['username']);

	$pass = md5(mysql_real_escape_string($_POST['password']));
	
	$fetch = mysql_query("SELECT id,type FROM users WHERE username='$username' AND password='$pass'") or die(mysql_error());
	

	$count = mysql_num_rows($fetch);
	$row = mysql_fetch_array($fetch);
	$a = $row['type'];

	if ($count !="" && $a==1)
		{
		//session_register("sessionregno");
		$_SESSION['login']="YES";
		$_SESSION['login_username'] = $username;

		header("Location:admin/index.php");
		}
		elseif($count !="" && $a==2)
		{
		$_SESSION['login']="YES";
		$_SESSION['login_username'] = $username;

		header("Location:district/index.php");
		}
		elseif($count !="" && $a==3)
		{
		$_SESSION['login']="YES";
		$_SESSION['login_username'] = $username;
		$_SESSION['login_type'] = 3;


		if (isset($_POST['tenderid']) && isset($_POST['district'])) 
		{
			$tenderid=$_POST['tenderid'];
			$district=$_POST['district'];

			header('Location:applytender.php?id='.$tenderid.'&district='.$district);
		}
		else{
			header("Location:company/index.php");
		}

		}
		elseif($count !="" && $a==4)
		{
		$_SESSION['login']="YES";
		$_SESSION['login_username'] = $username;
		$_SESSION['login_type'] = 4;


		if (isset($_POST['tenderid']) && isset($_POST['district'])) 
		{
			$tenderid=$_POST['tenderid'];
			$district=$_POST['district'];

			header('Location:applytender.php?id='.$tenderid.'&district='.$district);
		}
		else{
			header("Location:_company/index.php");
		}

		}
		
		else{
		header('Location:login.php?login=FAIL');
		}

}
?>