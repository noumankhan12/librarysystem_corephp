
<?php
include("includes/config.php");
include("includes/menu.php");

				//coonnect with dp
		if (isset($_POST["id"]) && isset($_POST["name"])) {
		$name=sanitizeInput($_POST["name"]);
		$id=sanitizeInput($_POST["id"]);

				$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

				if ($conn->connect_error) {
				trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
				}	
				//query
				$sql='SELECT * FROM books WHERE cat_id = ?';
				$stmt = $conn->prepare($sql);
				if($stmt === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
				}

				$stmt->bind_param('i',$id);
				$stmt->execute();
				$stmt->store_result();

				$booksInCategory=$stmt->num_rows;
				//close with db
				$conn->close();
			}
			else{
				header("Location:index.php?msg=UAAA");
				exit;
			}


?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $SITE_TITLE; ?>:Delete Category</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Delete Category</h2>
		<?php
		if ($booksInCategory>0) {
			echo "<p><strong>Warning you cannot delete.there is books $booksInCategory associated in this categry by users </strong> </p>";
		}
		else{
			echo "<p><strong>This is irreversible action are you sure to delete\"$name\"? </strong> </p>";
			echo "<form action='cat-delete-action.php' method ='post'>";
			echo "<input type='hidden' name='id' value='$id' /> ";
			echo "<input type='submit'  value='yes delete $name' />";
			echo "</form>";
		}
		
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
