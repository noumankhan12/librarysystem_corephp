
<?php
include("includes/config.php");
include("includes/menu.php");



?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $SITE_TITLE;?>:Manage Categories</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Manage Categories</h2>


		<?php
				if (isset($_GET["msg"])) {
					$msg=sanitizeInput($_GET["msg"]);
				
					if ($msg=="SAC") {
						echo "<p> <strong> NEW CATEGORY SUCCESSFULLY ADDED</strong> </p>";
					}
					if ($msg=="SUC") {
						echo "<p> <strong>  SUCCESSFULLY UPDATED </strong> </p>";
					}
					if ($msg=="SDC") {
						echo "<p> <strong>  SUCCESSFULLY DELETED </strong> </p>";
					}
				}
				?>

		<div class="cat-add">
			<h3>ADD New Categories</h3>
			<form class="my-form" action="cat-add.php" method="post">
			<div>

				<input type="text" id="lid01" name="name" required placeholder="Category Name">
				<input type="submit" value="ADD">
			</div>
			
			</form>


		</div>

		<div class="cat-view">

			<h3>Current Categories</h3>

			<?php

			$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

				if ($conn->connect_error) {
				trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
				}	

				//query
				$sql='SELECT * FROM Categories';
				$stmt = $conn->prepare($sql);
				if($stmt === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
				}

				$stmt->execute();
				$stmt->store_result();
				if($stmt->num_rows > 0){

					echo "<table border=1>";
					echo "<tr>";
						echo "<th><b>ID</b></th>";
						echo "<th>NAME</th>";
						echo "<th>&nbsp;</th>";
					echo "</tr>";

				$stmt->bind_result($id,$name);
				while ($stmt->fetch()) {
					
					echo "<tr>";
						echo "<td>$id</td>";

						echo "<td><form action='cat-edit.php' method='post' class='my-form'><div><input type='hidden' value='$id' name='id'/><input type='text' value='$name' name='name'/><input type='submit' value='edit'/></div></form></td>";

						echo "<td><form action='cat-delete.php' method='post' class='my-form'><div><input type='hidden' value='$id' name='id'/><input type='hidden' value='$name' name='name'/><input type='submit' value='delete'/></div></form></td>";
					echo "</tr>";	

				}
					echo "</table>";
				$stmt->free_result();
				$stmt->close();
				}

				else{
					echo "no categories found";
				}

				//close with db
				$conn->close();

			?>
		</div>
		


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
