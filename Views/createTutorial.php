<?php
	//Checking if Teacher is logged in or not
	session_start();

	if(isset($_SESSION['current_teacher_email']) && isset($_SESSION['current_teacher_username'])){

		$email    = $_SESSION["current_teacher_email"];
		$username = $_SESSION["current_teacher_username"];
			
	}
	else{
		header("location: login.php?notloggedin=true");
	}

	//Adding the required Models
	require_once "../Models/TutorialCategoryModel.php";

	$queryResult = getAllCategoriesQueryResult();

	//Closing the connection
	global $database_connnectiton;
	$database_connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>WebEng Project</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<!-- Output div for an empty submissoin -->
	<?php
		if(@$_GET["empty"] == true){
	?>
		<div style="color: red">OOPS! Looks like you left a field empty</div>
	<?php
		}
	?>

	<h1>Create Tutorial</h1>

	<label for="tutorialCategory">Select Category: </label>
	<select name="tutorialCategory" form="createTutorialForm">
		<?php
			while($row = $queryResult->fetch_assoc()) {				
				echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
			}
		?>
	</select>
	<br><br>

	<form id="createTutorialForm" action="../Controllers/CreateTutorialController.php" method="POST">

		<label>Title: </label>
		<input type='text' name='title' placeholder='Enter Title' required><br><br>

		<label>Paragraph 1 Heading: </label>
		<input type='text' name='heading_1' placeholder='Enter Heading' required><br><br>

		<label>Content: </label>
		<textarea id='textarea_1' name='content_1' 
				  placeholder='Enter Paragraph Content' required></textarea><br><br>

		<input type="button" id="addButton" onclick="addParagraph()" value="Add Another Paragraph"><br><br>

		<input id="numOfParagraphs" type="hidden" name="numOfParagraphs" value=1>

		<button name="create">Create</button>

	</form>

	<script>

		let clicked = 1;

		function addParagraph(){

			clicked     += 1;
			textarea_id = "textarea_" + clicked
			str         = "<br><br><label>Paragraph " + clicked + " Heading: </label>" +
						   "<input type='text' name='heading_" + clicked + "' placeholder='Enter Heading'" +
						   "required><br><br>" +
						   "<label>Content: </label>" +
						   "<textarea id=" + textarea_id + " name='content_" + clicked + "' placeholder='Enter Paragraph Content'" + 
						   "required></textarea>";	

			$("#numOfParagraphs").attr("value", clicked);
			$("#textarea_"+(clicked-1)).after(str);

		}

	</script>



</body>
</html>