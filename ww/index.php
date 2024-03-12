<?php
include("includes/config.php");
include("includes/menu.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>The Generics |Home </title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	
	
	<hr>
	<h1 class="band-name">The Generics</h1>
	<div class="container"> 
		<!--
	<button    class="btn btn-header"  type="button" > Get Our Latest Album</button></div>-->
	<br>
	<br>
	<button class="btn btn-header btn-play" type="button">&#9658;</button>
	</header>
	<section class="content-section container">
		<h2 class="section-header"></h2>
		<h3 class="section-header">Welcome to Generics</h3>

		<?php
			if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"]))
			{
				?>
				
			
			

			<div class="loggedin-user">

				<div>

					<?php

					if (file_exists("users/".$_SESSION["uid"].".jpg")) 
					{
						echo "<div style=\"background-image:url('users/".$_SESSION["uid"].".jpg')\" class='loggedin-user-pic'></div>";
					}
					else{
						echo "<div style=\"background-image:url('graphics/0.jpg')\" class='loggedin-user-pic'></div>";
					}


					?>
					
				</div>

				<div>
		<?php

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
				echo "<strong>$fullname</strong><br />";
				echo $bio;

				?>

				</div>
			</div>

			<?php
		}

			else{


			?>



		<section class="normal-section">
			<div class="section-header">

				<?php
				if (isset($_GET["msg"])) {
					$msg=sanitizeInput($_GET["msg"]);

				if ($msg=="UAAA") {
					# code...
					echo "<p><strong class='error'ERROR:</strong> Uunathorized attemtp to access !Login to access </p>";
				}	

				
				if ($msg=="PWNM") {
					# code...
					echo "<p><strong class='error'>ERROR:</strong> Incorrect password </p>";
				}
				if ($msg=="EMNM") {
					# code...
					echo "<p> <strong class='error'>ERROR:</strong> Incorrect email </p>";
				}
				if ($msg=="SR") {
					# code...
					echo "<p> <strong class='error'></strong> Succesfully registered </p>";
				}
			}
				?>

				<div class="lg"></div>

				<form class="my-form" action="login-action.php" method="post">
			<div>
				<label for="lid01"><b>Email</b></label>&nbsp&nbsp&nbsp&nbsp
				<input type="email" id="lid01" name="em" required>
			</div>
			<div>
				<label for="lid02"><b>Pasword</b></label>
				<input type="password" id="lid02" name="pw" required>
			</div>
			
			<div class="submit">
			<div>
				
				<input type="submit" value="login">
			</div>
			</div>
			</form>
			</div>


		<?php

			}
		?>
			







		</section>


		<!--
		<div>
			<div class="tour-row">
				<span class="tour-item tour-date">JULY 16</span>
				<span class="tour-item tour-city">DETROIT,MI</span>
				<span class="tour-item tour-arena">DTE ENERGY MUSIC THEATRE</span>
				<button class="btn tour-item tour-btn btn-primary">BUY TICKETS</button>
				
			</div>
			<div class="tour-row">
				<span class="tour-item tour-date">JULY 22</span>
				<span class="tour-item tour-city">DETROIT,MI</span>
				<span class="tour-item tour-arena">DTE ENERGY MUSIC THEATRE</span>
				<button class="btn tour-item tour-btn btn-primary ">BUY TICKETS</button>
				
			</div>
			<div class="tour-row">
				<span class="tour-item tour-date">JULY 16</span>
				<span class="tour-item tour-city">DETROIT,MI</span>
				<span class="tour-item tour-arena">DTE ENERGY MUSIC THEATRE</span>
				<button class="btn tour-item tour-btn btn-primary">BUY TICKETS</button>
				
				
			</div>
			<div class="tour-row">
				<span class="tour-item tour-date">JULY 16</span>
				<span class="tour-item tour-city">DETROIT,MI</span>
				<span class="tour-item tour-arena">DTE ENERGY MUSIC THEATRE</span>
				<button class="btn tour-item tour-btn btn-primary">BUY TICKETS</button>
				
			</div>
			<div class="tour-row">
				<span class="tour-item tour-date">JULY 16</span>
				<span class="tour-item tour-city">DETROIT,MI</span>
				<span class="tour-item tour-arena">DTE ENERGY MUSIC THEATRE</span>
				<button class="btn tour-item tour-btn btn-primary">BUY TICKETS</button>
				
			</div>
			<div class="child-row">
				<span class="tour-item tour-date">JULY 16</span>
				<span class="tour-item tour-city">DETROIT,MI</span>
				<span class="tour-item tour-arena">DTE ENERGY MUSIC THEATRE</span>
				<button class="btn tour-item tour-btn btn-primary">BUY TICKETS</button>
				
			</div>
		</div>
	-->
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