
<?php
include("includes/config.php");
include("includes/menu.php");

				//coonnect with dp
		if (isset($_POST["id"]) && isset($_POST["title"])) {
		$id=sanitizeInput($_POST["id"]);
		$title=sanitizeInput($_POST["title"]);		
		}


?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $SITE_TITLE; ?>:Delete Books</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Delete Books</h2>
		<?php
		
			echo "<p><strong>This is irreversible action are you sure to delete book $title </strong> </p>";
			echo "<form action='books-delete-action.php' method ='post'>";
			echo "<input type='hidden' name='id' value='$id' /> ";
			echo "<input type='submit'  value='yes delete book' />";
			echo "</form>";
		
		
		?>
		


	</section>
	<br>
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
