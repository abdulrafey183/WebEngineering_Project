<!DOCTYPE html>
<html>
<head>
	<title>WebEng Project</title>
</head>
<body>

	<?php
		if(@$_GET["msg"] == true){
			echo "<div>" . $_GET["msg"] . "</div>";
		}
	?>

	<h1>This is the Home Page</h1>

	<ul>
		<li><a href="/webproject">Home</a></li>		
		<li><a href="Views/about.php">About</a></li>
		<li><a href="Views/login.php">Login</a></li>
		<li><a href="Views/register.php">Register</a></li>
	
</body>
</html>