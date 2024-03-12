<?php
include("includes/config.php");


		if ((isset($_POST["name"]))) {
		$name=sanitizeInput($_POST["name"]);

	
			//connect with database
			$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

			if ($conn->connect_error) {
			trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
			 }

			//querry
			$sql='INSERT INTO categories (name) VALUES(?)';
			$stmt = $conn->prepare($sql);
			if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
			}

			$stmt->bind_param('s',$name);
			$stmt->execute();
			$stmt->close();

			//close with db
			$conn->close();
			header("Location:cat.php?msg=SAC");
			exit;
	}


