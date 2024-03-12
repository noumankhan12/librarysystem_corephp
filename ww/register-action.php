<?php
include("includes/config.php");


		if ((isset($_POST["em"])) && (isset($_POST["pw1"])) && (isset($_POST["pw2"])) && (isset($_POST["fn"])) ) {
			$em=sanitizeInput($_POST["em"]);
			$pw1=sanitizeInput($_POST["pw1"]);
			$pw2=sanitizeInput($_POST["pw2"]);
			$fn=sanitizeInput($_POST["fn"]);
			$bio=sanitizeInput($_POST["bio"]);

			if ($pw1==$pw2) {

			   $hpwd=password_hash($pw1, PASSWORD_DEFAULT);	
					
					
				//connect with database
				$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

				if ($conn->connect_error) {
				trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
				}

				//querry
				$sql="INSERT INTO users (email,password,bio,fullname,type,status) VALUES(?,?,?,?,'U','A')";
				$stmt = $conn->prepare($sql);
				if($stmt === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
				}

				$stmt->bind_param('ssss',$em,$hpwd,$fn,$bio);
				$stmt->execute();
				$stmt->close();

				//close with db
				$conn->close();
				header("Location:index.php?msg=SR");
				exit;
			}
			else{
				header("Location:register.php?msg=PWDNM");
	 			exit;
			}	
}


