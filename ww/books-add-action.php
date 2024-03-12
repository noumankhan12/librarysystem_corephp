<?php
include("includes/config.php");


		if ((isset($_POST["title"])) && (isset($_POST["category"])) && (isset($_POST["author"])) &&
			(isset($_POST["status"]))) {

			$title=sanitizeInput($_POST["title"]);
			$category=sanitizeInput($_POST["category"]);
			$author=sanitizeInput($_POST["author"]);
			$status=sanitizeInput($_POST["status"]);
			$desc=sanitizeInput($_POST["desc"]);

	
			//connect with database
			$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

			if ($conn->connect_error) {
			trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
			 }

			//querry
			$sql='INSERT INTO books (title,author,describtion,owner_id,cat_id,status) VALUES(?,?,?,?,?,?)';
			$stmt = $conn->prepare($sql);
			if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
			}

			$stmt->bind_param('sssiis',$title,$author,$desc,$_SESSION["uid"],$category,$status);
			$stmt->execute();
			$stmt->close();

			//close with db
			$conn->close();
			header("Location:books.php?msg=BSAC");
			exit;
	}


