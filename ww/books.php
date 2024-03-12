
<?php
include("includes/config.php");
include("includes/menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $SITE_TITLE;?>:Manage my books</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Manage books</h2>
	<?php
				if (isset($_GET["msg"])) {
					$msg=sanitizeInput($_GET["msg"]);
				
					if ($msg=="BSAC") {
						echo "<p> <strong> BOOKS SUCCESSFULLY ADDED</strong> </p>";
					}
					
				}
				?>	


		<p><a href="books-add.php" class="link-button">Add books</a></p>

		<h3>My Books</h3>
		<?php
				if (isset($_GET["msg"])) {
					$msg=sanitizeInput($_GET["msg"]);

			
				if ($msg=="SUB") {
					# code...
					echo "<p> <strong class='error'>SUCCESS:</strong> updated record </p>";
				}
				if ($msg=="SDB") {
					# code...
					echo "<p> <strong class='error'>SUCCESS:</strong> book record deleted</p>";
				}
			}
				?>


	<?php

			$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

				if ($conn->connect_error) {
				trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
				}	

				//query
				$sql='SELECT * FROM books WHERE owner_id=?';
				$stmt = $conn->prepare($sql);
				if($stmt === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
				}
				$stmt->bind_param('i',$_SESSION["uid"]);
				$stmt->execute();
				$stmt->store_result();
				if($stmt->num_rows > 0){

					echo "<table border=1>";
					echo "<tr>";
						echo "<th><b>ID</b></th>";
						echo "<th>TITLE</th>";
						
						echo "<th>AUTHOR</th>";
						echo "<th colspan='2'>ACTIONS</th>";
					echo "</tr>";

				$stmt->bind_result($id,$title,$author,$desc,$owner,$category,$status);
				while ($stmt->fetch()) {
					
					echo "<tr>";
						echo "<td>$id</td>";
						echo "<td>$title</td>";
						
						echo "<td>$author</td>";

						echo "<td><form action='books-edit.php' method='post' class='my-form'><div><input type='hidden' value='$id' name='id'/><input type='submit' value='edit'/></div></form></td>";

						echo "<td><form action='books-delete.php' method='post' class='my-form'><div><input type='hidden' value='$id' name='id'/><input type='hidden' value='$title' name='title'/><input type='submit' value='delete'/></div></form></td>";
					echo "</tr>";	

				}
					echo "</table>";
				$stmt->free_result();
				$stmt->close();
				}

				else{
					echo "no books found";
				}

				//close with db
				$conn->close();

	?>
		

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
