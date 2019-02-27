
<?php
	if(isset($_GET['p'])) 
	{
	$p = $_GET["p"];

	if($p=="1")
		echo "<p class=\"info\">Username already taken.</p><br></br>";
	if($p=="2")
		echo "<p class=\"info\">Passwords do not match.</p><br></br>";
	if($p=="3")
		echo "<p class=\"info\">Email address already in use.</p><br></br>";;
	if($p=="4")
		echo "<p class=\"info\">Invalid email address</p><br></br>";
	if($p=="5")
		echo "<p class=\"info\">Wrong password!</p><br></br>";
	if($p=="6")
		echo "<p class=\"info\">Username does not exist!</p><br></br>";
	}
?>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>BookShare</title>
	<link href="main_page_style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">   
  <div class="row">
    <div class="col-sm-6">
      <h1><span>Welcome to BookShare!</span></h1></br>
	  
			<div class="w3-content" style="max-width:500px">
				<div class="mySlides">
					<p class="slider">“So many books, so little time.” <br>― Frank Zappa</p>
				</div>

				<div class="mySlides">
					<p class="slider">“Fairy tales are more than true: not because they tell us that dragons exist, but because they tell us that dragons can be beaten.” </p>
				</div>

				<div class="mySlides">
					<p class="slider">“One must always be careful of books," said Tessa, "and what is inside them, for words have the power to change us.” <br>― Cassandra Clare</p>
				</div>
			  
				<div class="mySlides">
					<p class="slider">“Books are the mirrors of the soul.” <br>― Virginia Woolf, Between the Acts</p>
				</div>
			</div>
	  
    </div>
    <div class="col-sm-6">
		<div class="signin">
			<form style="color: white;" class="register-form" method="post" action="registration.php"> 
				<h2 style="color: #fff;">Register</h2>
				<input type="text" name="name" placeholder="First name" autocomplete="off"><br><br>
				<input type="text" name="last_name" placeholder="Last name" autocomplete="off"><br><br>
				<input type="text" name="username" placeholder="Username" autocomplete="off" required><br><br>
				<input type="password" name="password" placeholder="Password" autocomplete="off" required><br><br>    
				<input type="password" name="password2" placeholder="Confirm Password" autocomplete="off" required><br><br>   
				<input id='email' name="email" type="text" placeholder="Email address" autocomplete="off" required><br><br>  
				<button style="color: black;"type='submit'>Register</button><br><br>       
				<p class="log">Already have account?<a href="#">&nbsp;&nbsp;Log In</a></p>
			</form>
			<form style="color: white;" class="login-form" method="post" action="validation.php">
				<h2 style="color:#fff;">Log In</h2>
				<input type="text" name="username" placeholder="Username" autocomplete="off" required><br /><br />
				<input type="password" name="password" placeholder="Password" autocomplete="off" required><br /><br />
				<button style="color: black;" type='submit'>Log In</button><br><br>  
				<p class="sign">Don't have account?<a href="#">&nbsp;&nbsp;Sign Up</a></p>
			</form>
			
			
		</div>
			
		<script>
			$('.sign a').click(function()
			{
			$('.register-form').show(800);
			$('.login-form').hide(500);
			});
			
			$('.log a').click(function()
			{
			$('.register-form').hide(500);
			$('.login-form').show(800);
			});
		</script>
    </div>
	
  </div>
</div>


<script>
	var slideIndex = 0;
	carousel();

	function carousel() 
	{
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  for (i = 0; i < x.length; i++) {
		x[i].style.display = "none"; 
	  }
	  slideIndex++;
	  if (slideIndex > x.length) {slideIndex = 1} 
	  x[slideIndex-1].style.display = "block"; 
	  setTimeout(carousel, 6000); 
	}
</script


</body>
</html>
