<?php
	//Starting Session
    session_start();
    
    //Redirecting in case user is already logged in 
    if(isset($_SESSION['current_student_email']) and isset($_SESSION['current_student_username'])){
        header("location: studentProfile.php?invalidAccess=true");
    }
    elseif(isset($_SESSION['current_teacher_email']) and isset($_SESSION['current_teacher_username'])){
        header("location: teacherProfile.php?invalidAccess=true");
    }
    //Redirecting in case admin is already logged in 
    elseif(isset($_SESSION['admin_email']) and isset($_SESSION['admin_username'])){
        //pass
    }
    else{
    	header("location: adminLogin.php?notloggedin=true");
    }

    //Adding the required Models
    require_once "../Models/UserModel.php";

    //Fetching the Student table form the database
    $teacher_table = getTeacherTable();	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Table</title>
	<style>
		table, td, th{
			border: 1px solid black;
			border-collapse: collapse;
			padding: 10px;
		}
	</style>
</head>
<body>

	<!-- Anchor tag for adding a student -->
	<a href="addTeacher.php">Add a Teacher</a><br><br>

	<!-- Table tag for displaying the student table -->
	<table>
		<tr>
			<th>Email ID</th>
			<th>Username</th>
			<th>Acion</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($teacher_table)){ ?>
		<tr>
			<td><?php echo $row["email"] ?></td>
			<td><?php echo $row["username"] ?></td>
			<td><a href="#">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

</body>
</html>