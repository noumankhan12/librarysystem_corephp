
<?php
include("includes/config.php");
include("includes/menu.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $SITE_TITLE;?>:Registration</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Registration</h2>


		<div class="section-header">

				<?php
				if (isset($_GET["msg"])) {
					$msg=sanitizeInput($_GET["msg"]);

			
				if ($msg=="PWDNM") {
					# code...
					echo "<p> <strong class='error'>ERROR:</strong> Passwords did not matched </p>";
				}
			}
				?>

				<div class="lg"></div>

				<form class="my-form" action="register-action.php" method="post">
			<div>
				<label for="lid01"><b>Email</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="email" id="lid01" name="em" required>
			</div>
			<div>
				<label for="lid02"><b>Pasword</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="password" id="lid02" name="pw1" required>
			</div>
			<div>
				<label for="lid03"><b>Confirm</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="password" id="lid03" name="pw2" required>
			</div>
			<div>
				<label for="lid04"><b>Name</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" id="lid04" name="fn" required />
			</div>
			<br>
			<div>
				<label for="lid05"><b>Bio</b></label><br><br>
				<textarea class="txtarea" name="bio" id="05" placeholder="your brief profile"></textarea><br><br>
			</div>
			
			<div class="submit">
			<div>
				
				<input type="submit" value="Register">
			</div>
			</div>
			</form>
			</div>
s
		

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