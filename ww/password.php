
<?php
include("includes/config.php");
include("includes/menu.php");

	
			if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"])){

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Change Password</h2>
		<h3 class="section-header">

				<?php
				if (isset($_GET["msg"])) {
					$msg=sanitizeInput($_GET["msg"]);
				
				if ($msg=="SUPW") {
					echo "<p><strong>SUCCESS:</strong> Password updated succesfully </p>";
				}
				
				if ($msg=="PWDNM") {
					echo "<p><strong class='error'>ERROR:</strong> Password did not match </p>";
				}
			}
				?>


				

			<form class="my-form" action="password-action.php" method="post">
			<div>
				<label for="lid01"><b> New Password</b></label>&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="password" id="lid01" name="pw1" required />
			</div>
			<div>
				<label for="lid02"><b> Confirm Pasword</b></label>
				<input type="password" id="lid02" name="pw2" required />
			</div>
			

			<div>
				
				<input type="submit" value="Change Password">
			</div>
			</form>
			</h3>
		
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