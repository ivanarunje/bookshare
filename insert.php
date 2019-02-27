<?php
	session_start();
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'bookshare_db');
	
	$title=$_POST['title'];
	$author=$_POST['author'];
	$desc=$_POST['description'];
	$picture=$_POST['picture'];
	$username=$_SESSION['username'];
	$email=$_SESSION['email'];
	
	
	$reg="insert into books (title, author, description, picture, username, email) values ('$title', '$author', '$desc', '$picture', '$username','$email')" ;
	mysqli_query($con, $reg);
	header("Location:bookshare.php");
	exit();
?>