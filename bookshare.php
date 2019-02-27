<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:main_page.php');
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.item 
		{
			margin: 18px;
			border: 1px solid #ccc;
			float: left;
			width: 400px;
			height: 370px;
		}
		.item:hover 
		{
			border: 1px solid #777;
		}
		.item img 
		{
			width: 400px;
			height: 260px;
		}
		.desc 
		{
			padding: 5px;
			text-align: center;
			font-size:16px;
			margin:4px 1px;
			font-family: 'Lato', sans-serif;
		}
		.gallery 
		{
			padding: 15px;
		}
		
		.moreinfo
		{
			border: 1px solid #ccc;
			position: absolute;
			width:29.5%;
			z-index: 1;
			background-color: #b6ceb0;
		}
	</style>
	<title>BookShare</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bookshare_style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>


<body>

	<div class="header">
		<button class="button_1" onclick="document.getElementById('modal-wrapper').style.display='block'">+</button>
		<a href="logout.php"><button class="button_2"><img src="logout-24.png"/></button></a>
		<h1>Welcome to BookShare</h1>
		<p class="subtitle">"Books should go where they will be most appreciated, and not sit unread, gathering dust on a forgotten shelf, don't you agree?"</p>
	</div>
	
	
	<div class="gallery">
		<?php
		
			$conn = mysqli_connect("localhost", "root", "", "bookshare_db");

			if (!$conn) 
			{

				die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "SELECT * FROM books";
			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)) 
			{
				$title = $row["title"];
				$author = $row["author"];
				$description = $row["description"];
				$picture = $row["picture"];
				$email= $row["email"];
				$id= $row["id"];
				$username= $row["username"];
				if($picture=="")
				{
					$picture = "no_image.jpg";
				}
		?>

			<div class="item">
				<img src="<?php echo $picture; ?>" alt="" title="<?php echo $title; ?>" width="600" height="400" />
				<p class="desc"><?php echo $author . " - " . $title; ?></p>
				<button class="book-button" onclick="toggle_visibility('<?php echo $id; ?>')";>More info</button>
				
				<div style="display: none;"id="<?php echo $id; ?>" class="moreinfo">
					<p class="desc"><b>DESCRIPTION:</b><br> <?php echo $description; ?></p>
					<p class="desc"><b>EMAIL:</b> <br><?php echo $email; ?></p>
				</div>
			</div>
	
		<?php
			}
			mysqli_close($conn);
		?>
	</div>

<!-- ADD NEW BOOK FORM -->
	<div id="modal-wrapper" class="modal">
		<form class="modal-content animate" method="post" action="insert.php">
		<h1 style="text-align:center; font-family: Arial;">SHARE YOUR BOOK</h1>
		
			<div class="container">
			  <input type="text" placeholder="Title" name="title" autocomplete="off" required></br>
			  <input type="text" placeholder="Author" name="author" autocomplete="off" required><br>
			  <textarea style="font-family:Arial" name="description" placeholder="Description.." rows="5" cols="65" required></textarea>
			  <input type="text" name="picture" id="picture" placeholder="URL of image.. " autocomplete="off" />
			  <button class="form-button" type="submit">Share this book!</button>
			</div>
		
		</form>
	</div>


<script>
	// If user clicks anywhere outside of the modal, Modal will close
	var modalInsert = document.getElementById('modal-wrapper');
	window.onclick = function(event) 
	{
	   if (event.target == modalInsert) 
		{
			modalInsert.style.display = "none";
		}
	}
	
	
</script>

<script> 
	function toggle_visibility(id) 
{
    var e = document.getElementById(id);
    if (e.style.display == 'block' || e.style.display=='')
    {
        e.style.display = 'none';
    }
    else 
    {
        e.style.display = 'block';
    }
}
</script>

</body>
</html>