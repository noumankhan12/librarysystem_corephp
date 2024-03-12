
<?php
include("includes/config.php");
include("includes/menu.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $SITE_TITLE;?>:ADD NEW BOOK</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	

	
	
	<h1 class="band-name">The Generics</h1>

	</header>
	<section class="section-container">
		<h2 class="section-header">ADD NEW BOOK</h2>


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

				<form class="my-form" action="books-add-action.php" method="post">
			<div>
				<label for="lid01"><b>Title</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" id="lid01" name="title" required>
			</div>
			<div>
				<label for="lid02">Category</label>
				<select name="category" id="lid02">
<?php
    $conn = new mysqli($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);

				if ($conn->connect_error) {
				trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
				}	

				//query
				$sql='SELECT * FROM Categories ORDER BY name';
				$stmt = $conn->prepare($sql);
				if($stmt === false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
				}

				$stmt->execute();
				$stmt->store_result();
				if($stmt->num_rows > 0){

					

				$stmt->bind_result($id,$name);
				while ($stmt->fetch()) {
					
					echo "<option value='$id'>$name</option>";	

				}
					
				$stmt->free_result();
				$stmt->close();
				}

				else{
					echo "<option value='0'>Uncategorized</option>";
				}

				//close with db
				$conn->close();


?>					
					
				</select>
			</div>
			<div>
				<label for="lid02"><b>Author</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" id="lid02" name="author" required>
			</div>
			
			<div>
				<label><b>Status</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="lid04" name="status" value="A" checked/><label for="lid04">Available</label>
				<input type="radio" id="lid05" name="status" value="R" /><label for="lid04">Reading</label>
			</div>

			<div>
				<label for="lid06"><b>Description</b></label><br><br>
				<textarea class="txtarea" name="desc" id="lid06" placeholder="enter brief description"></textarea><br><br>
			</div>
						
			<div class="submit">
			<div>
				
				<input type="submit" value="Register">
			</div>
			</div>
			</form>
			</div>		

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