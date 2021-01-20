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
    require_once "../Models/AdminModel.php";

    //Fetching the Student table form the database
    $admin_table = getAdminTable();

    //Closing database connection
    mysqli_close($database_connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Table</title>
	<meta charset = "UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">

	<!-- CSS Link for Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
	<style>

		table, td, th{
			border: 1px solid black;
			border-collapse: collapse;
			padding: 10px;
		}

		 body{
            font-family: 'Poppins', sans-serif;
            background: white;   
        }

        .multi-text{
            background-image: linear-gradient(to left, #43cae9 0%, #38f9d7 100%);
            -webkit-background-clip: text;
            -moz-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: bold;
            font-size: 50px;
        }

        #add{
            font-size: 20px; 
            text-align: center;
            line-height:1em;
            padding: 10px;
            color: #ffffff;
            background: #43cae9;
            border: 2px solid #43cae9;
            border-radius: 10px;
            font-weight: bold;
        }

        #add a{
            text-decoration: none;
            text-transform: uppercase;
            color: #ffffff;
        }

        #add:hover{
            text-decoration: none;
            background: #66FCF1;
        }

        .container th {
            font-weight: 600;
            font-size: 20px;
            text-align: left;
            color: black;
            background-color: darkgray;
        }

        .container td {
            font-size: 20px;
            color: black;
            -webkit-box-shadow: 0 2px 2px -2px #0e1819;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
        }

        .container td:last-child{
            font-size: 20px;
            color: black;
            -webkit-box-shadow: 0 2px 2px -2px #0e1819;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
        }

        .container {
            text-align: left;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
            border-radius: 15px;
        }

        .container td, .container th {
            padding-bottom: 2%;
            padding-top: 2%;
            padding-left: 2%;  
        }

        .container td:last-child{
            padding-bottom: 2%;
            padding-top: 2%;
        }

        /* Background-color of the odd rows */
        .container tr:nth-child(odd) {
            background-color: lightgray;
        }

        /* Background-color of the even rows */
        .container tr:nth-child(even) {
            background-color: darkgray;
        }

        .container tr:hover {
            background-color: #C7C6C1;
            -webkit-box-shadow: 0 6px 6px -6px #0E1119;
            -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
            transform: translate3d(6px, -6px, 0);
            transition-delay: 0s;
            transition-duration: 0.4s;
        }
         .flashMsgGreen{
	        color: #fff;
	        background-color: #76e060;
	        opacity: 0.7;
	        border-radius: 5px;
	        margin: 0px 50px 0px 50px;
	        text-align: center;
	        font-size: 15px;
	        padding: 5px 0 5px 0;
    	}
        
	</style>
</head>
<body>

	<?php if(@$_GET["success"]){ ?>
		<div class="flashMsgGreen">Admin Deleted Successfully!</div>
	<?php } ?>

	<h1><span class="multi-text">Manage Admin Database</span></h1>
	<!-- Anchor tag for adding a student -->
	<h2><span id="add" class="fa fa-plus-circle">&nbsp;<a href="addAdmin.php">Add an Admin</a></span></h2><br><br>

	<!-- Table tag for displaying the student table -->
	<table class="container">
		<thead>
		<tr>
			<th>Email ID</th>
			<th>Userame</th>
		</tr>
		</thead>
		<tbody>
		<?php while($row = mysqli_fetch_assoc($admin_table)){ ?>
		<tr>
			<td><?php echo $row["email"] ?></td>
			<td><?php echo $row["username"] ?></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>

</body>
</html>