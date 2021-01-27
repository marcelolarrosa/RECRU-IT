<?php 

	// Connect to the SQL database that will be used by the app
		
		$server = 'localhost';
		$user = 'root';
		$password = '';
		$db = 'recruit_database';

		$database_connection = mysqli_connect($server, $user, $password, $db);

		mysqli_query($database_connection, "SET NAMES 'utf8'");
	

		session_start();

?> 