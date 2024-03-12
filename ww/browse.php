
<?php
include("includes/config.php");
include("includes/menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $SITE_TITLE;?>:Browse my books</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">Browse books</h2>
	
	<?php

			$conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

				if ($conn->connect_error) {
				trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
				}	

				//query
				$sql='SELECT * FROM books';
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
						echo "<th>TITLE</th>";	
						echo "<th>AUTHOR</th>";
						echo "<th>DESCRIPTION</th>";
						echo "<th>CATEGORY</th>";
						echo "<th>STATUS</th>";
					if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
						echo "<th>OWNER</th>";
					     }

					echo "</tr>";

				$stmt->bind_result($id,$title,$author,$desc,$owner,$category,$status);
				while ($stmt->fetch()) {
					
					echo "<tr>";
						echo "<td>$id</td>";
						echo "<td>$title</td>";	
						echo "<td>$author</td>";
						echo "<td>$desc</td>";
						echo "<td>";
								//querry db for category name
								$sql2="SELECT *FROM categories WHERE id =".$category;
								$stmt2 = $conn->prepare($sql2);
				 				 if($stmt2 === false) {
								trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
									}
								$stmt2->execute();
								$stmt2->store_result();
								$stmt2->bind_result($cid,$cname);
								while ($stmt2->fetch()){
									echo "$cname";
								} 
								$stmt2->free_result();
								$stmt2->close();

        						"</td>";

						echo "<td>";
						if ($status=="A") {echo "Available";}
						if ($status=="R") {echo "Reading";}
						echo "</td>";
						if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]){
						echo "<td>";

								//querry db for owner contact
								$sql3="SELECT id,email FROM users WHERE id =".$owner;
								$stmt3 = $conn->prepare($sql3);
				 				 if($stmt3 === false) {
								trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
									}
								$stmt3->execute();
								$stmt3->store_result();
								$stmt3->bind_result($oid,$email);
								while ($stmt3->fetch()){
									echo "$email";
								} 
								$stmt3->free_result();
								$stmt3->close();
							"</td>";
								}

					echo "</tr>";	

				}
					echo "</table>";
				$stmt->free_result();
				$stmt->close();
				}

				else{
					echo "no records found";
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
