<?php
include("includes/config.php");

if ((isset($_POST["em"])) && (isset($_POST["pw"]))) {
	# code...

$em=sanitizeInput($_POST["em"]);
$pw=sanitizeInput($_POST["pw"]);

//connect with database
$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);
if ($conn->connect_error) {
trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
}

//querry
$sql='SELECT * FROM users WHERE email = ?';
$stmt = $conn->prepare($sql);
if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
}

$stmt->bind_param('s',$em);
$stmt->execute();
$stmt->store_result();

echo "Found " . $stmt->num_rows . " records.<br />";

if($stmt->num_rows==1){
$stmt->bind_result($id,$email,$hpwd,$bio,$fullname,$type,$status);


while ($stmt->fetch()) {
	$matched=password_verify($pw,$hpwd);    //checking encrypted password

	if($matched) {
	$_SESSION["loggedin"]=true;
    }


    else{
    	header("Location:index.php?msg=PWNM");
		exit;
		 }

	$_SESSION["uid"]=$id;
	$_SESSION["utype"]=$type;
	$_SESSION["ustatus"]=$status;
}
$stmt->free_result();
$stmt->close();
}

else{
	header("Location:index.php?msg=EMNM");
	exit;
}

//close with db
$conn->close();

}

else{
	header("Location:index.php");
	exit;
}
header("Location:index.php");
	exit;





/*

$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);
if ($conn->connect_error) {
trigger_error('Database connection failed: ' .$conn->connect_error, E_USER_ERROR);
}

//query
$sql='SELECT * FROM users WHERE email = ?';
$stmt = $conn->prepare($sql);
if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
}
$stmt->bind_param('s',$em);
$stmt->execute();
$stmt->store_result();
echo "Found " . $stmt->num_rows . " records.<br />";

if($stmt->num_rows==1){

$stmt->bind_result($id,$email,$password,$bio,$fullname,$type,$status);
while ($stmt->fetch()) {

			if($pw==$password)
			{
		$_SESSION["logged in"]=true;
		
	}
	else{
		header("Location:index.php");
		
	exit;

	}
		$_SESSION["uid"]=$id;
		$_SESSION["utype"]=$type;
		$_SESSION["ustatus"]=$status;
}
$stmt->free_result();
$stmt->close();
}
else 
{
	header("Location:index.php");
}


//closedb
$conn->close();

}

else
{
	header("Location:index.php");
	exit;
}
header("Location:fyp.php");
	exit;
-->

*\