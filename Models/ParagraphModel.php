<?php
	
	require_once "DBconfig.php";

	function addParagraph($tutorial_id, $heading, $content){

		global $database_connection;

		$sql_query         = "INSERT INTO `paragraph`(`tutorial_id`, `heading`, `content`) " .
							 "VALUES ('$tutorial_id', '$heading', '$content')";
		$sql_query_execute = mysqli_query($database_connection, $sql_query);
		/*if (!$sql_query_execute) {
		    printf("Error: %s\n", mysqli_error($database_connection));
		    exit();
		}*/
		//$sql_query_result  = mysqli_fetch_assoc($sql_query_execute);

		
		//return $sql_query_execute;
	}

	function getParagaphsByTutorialID($tutorial_id){

		global $database_connection;

		$sql_query         = "SELECT * FROM paragraph WHERE tutorial_id='$tutorial_id'";
		$sql_query_execute = mysqli_query($database_connection, $sql_query);

		return $sql_query_execute;	
	}

?>