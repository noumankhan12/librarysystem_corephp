<?php
include("includes/config.php");


if ((isset($_POST["fn"])) && (isset($_POST["bio"]))) {
$fn=sanitizeInput($_POST["fn"]);
$bio=sanitizeInput($_POST["bio"]);



	
//connect with database
$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

if ($conn->connect_error) {
trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
}

//querry
$sql='UPDATE users SET bio=? , fullname=? WHERE id=?';
$stmt = $conn->prepare($sql);
if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
}

$stmt->bind_param('ssi',$bio,$fn,$_SESSION["uid"]);
$stmt->execute();
$stmt->close();

//close with db
$conn->close();
header("Location:profile.php?msg=SUP");
exit;
}

