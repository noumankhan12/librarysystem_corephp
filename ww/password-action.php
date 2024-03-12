<?php
include("includes/config.php");


if ((isset($_POST["pw1"])) && (isset($_POST["pw2"]))) {
$pw1=sanitizeInput($_POST["pw1"]);
$pw2=sanitizeInput($_POST["pw2"]);

if ($pw1==$pw2) {

	$hpwd=password_hash($pw1, PASSWORD_DEFAULT);
//connect with database
$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

if ($conn->connect_error) {
trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
}

//querry
$sql='UPDATE users SET password=? WHERE id=?';
$stmt = $conn->prepare($sql);
if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
}
$stmt->bind_param('si',$hpwd,$_SESSION["uid"]);
$stmt->execute();
$stmt->close();

//close with db
$conn->close();
header("Location:password.php?msg=SUPW");
exit;
}

else{
	header("Location:password.php?msg=PWDNM");
	 exit;
	}	
}