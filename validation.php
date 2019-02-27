<?php
	
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'bookshare_db');
	
	$username=$_POST['username'];
	$pass=$_POST['password'];
	
	$s= "select * from users where username ='$username' && password='$pass'";
	$result=mysqli_query($con,$s);
	$num=mysqli_num_rows($result);

	
	if($num==1) // username & password correct
	{
		//fetching email from database with username as search parameter
		$_SESSION['username']=$username;
		$mailquery= "select * from users where username ='$username'";
		$emails=mysqli_query($con,$mailquery);
		$row = mysqli_fetch_array($emails);
		$_SESSION['email']=$row['email'];
		header('Location:bookshare.php');
	}
	
	else //entered username or password incorrect
	{
		$q= "select * from users where username ='$username'";
		$result_1=mysqli_query($con,$q);
		$num_1=mysqli_num_rows($result_1);
		
		if($num_1==1)
		{
			header("Location:main_page.php?p=5");
			exit();
		}
		else 
		{
			header("Location:main_page.php?p=6");
			exit();
		}
	}
?>
