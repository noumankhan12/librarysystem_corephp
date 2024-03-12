<?php
include("includes/config.php");

if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"])){
session_destroy();
header("Location:index.php");
exit;

}
	else{
		header("Location:index.php?msg=UAAA");
	}

	?>
