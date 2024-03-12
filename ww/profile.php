
<?php
include("includes/config.php");
include("includes/menu.php");

	
			if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"])){

				//coonnect with dp
				$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

				if ($conn->connect_error) {
				trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
				}	

				//query

				//querry
				$sql='SELECT bio, fullname FROM users WHERE id = ?';
				$stmt = $conn->prepare($sql);
				if($stmt === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
				}

				$stmt->bind_param('i',$_SESSION["uid"]);
				$stmt->execute();
				$stmt->store_result();



				if($stmt->num_rows==1){
				$stmt->bind_result($bio,$fullname);
				while ($stmt->fetch()) 
				$stmt->free_result();
				$stmt->close();
				}



				//close with db
				$conn->close();




?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Profile</h2>

				<?php
				if (isset($_GET["msg"])) {
					$msg=sanitizeInput($_GET["msg"]);
				
				if ($msg=="SUP") {
					echo "<p> <strong> SUCCESSFULLY UPDATED PROFILE</strong> </p>";
				}

				}
				?>

				<div class="loggedin-user">
				<div>
					<a href="profile-picture.php">
					<?php

					if (file_exists("users/".$_SESSION["uid"].".jpg")) 
					{
						echo "<div style=\"background-image:url('users/".$_SESSION["uid"].".jpg')\" class='loggedin-user-pic'></div>";
					}
					else{
						echo "<div style=\"background-image:url('graphics/0.jpg')\" class='loggedin-user-pic'></div>";
					}	
					?>
					</a>
				</div>
				</div>






		
				<form class="my-form" action="profile-action.php" method="post">
			<div>
				<label for="lid01"><b>Name</b></label>&nbsp
				<input type="text" id="lid01" name="fn" value="<?php echo $fullname;  ?>" required />
			</div>
			<br>
			<div>
				<label for="lid02"><b>Bio</b></label><br><br>
				<textarea class="txtarea" name="bio" placeholder="your brief profile"><?php echo $bio;  ?></textarea><br><br>
			</div>
			

			<div>
		
				<input type="submit" value="Update Profile">
				<input type="reset" value="Reset">
			</div>
			</form>



	</section>
<footer class="about-footer">
	<h3 class="band-name">The Generics</h3>
	
	<ul><nav class="footer-nav">
		<li>
<a href="https://whatsapp.com">
			<img src="whtsapplogo.JPG"></a></li>
		
		<a href="https://youtube.com">
		<li><img src="youtubelogo.JPG"></a></li>
	
		<a href="https://facebook.com">
		<li><img src="facebooklogo.PNG"></a></li>

	</ul>
	</nav>
</footer>
</body>
</html>

<?php
	}
	else{
		header("Location:index.php?msg=UAAA");
	}

	?>