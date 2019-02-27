<?php
	
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'registration_db');
	
	$name=$_POST['name'];
	$last_name=$_POST['last_name'];
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$pass2=$_POST['password2'];

	$email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{

		header("Location:main_page.php?p=4");
		exit();
	}
	
	$s= "select * from users where username ='$username'";
	$usernameN=mysqli_query($con,$s);
	$numOfUsers=mysqli_num_rows($usernameN);
	
	$q= "select * from users where email ='$email'";
	$emailN=mysqli_query($con,$q);
	$numOfEmail=mysqli_num_rows($emailN);
	
	if($numOfUsers==1)
	{
		header("Location:main_page.php?p=1");
		exit();
	}
	else if($numOfEmail==1)
	{
		header("Location:main_page.php?p=3");
		exit();
	}
	else if(($pass!=$pass2))
	{
		header("Location:main_page.php?p=2");
		exit();
	}
	else
	{
		//Registration succesiful
		$reg=" insert into users (username, password, email) values ('$username','$pass','$email')" ;
		mysqli_query($con, $reg);
		header("Location:bookshare.php");
		exit();
	}
	
	//checking email
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>