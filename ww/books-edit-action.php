<?php
include("includes/config.php");


		if ((isset($_POST["title"])) && (isset($_POST["category"])) && (isset($_POST["author"])) &&
			(isset($_POST["status"]))) {

			$bid=sanitizeInput($_POST["bid"]);
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
			$sql='UPDATE books SET title=?,author=?,describtion=?,cat_id=?,status=? WHERE id=?';
			$stmt = $conn->prepare($sql);
			if($stmt === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
			}

			$stmt->bind_param('sssisi',$title,$author,$desc,$category,$status,$bid);
			$stmt->execute();
			$stmt->close();

			//close with db
			$conn->close();
			header("Location:books.php?msg=SUB");
			exit;
	}


