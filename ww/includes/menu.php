<header class="main-header">
<nav class="nav main-nav">
		<ul>
			<li> <a href="index.php"> HOME</a></li>
			<li> <a href="browse.php"> Browse</a></li>

			<!--<li><a href="Store.php"> STORE</a></li>-->
			
			<?php
			if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"])) {

				if(($_SESSION["utype"]=="A")){
					echo "<li><a href='cat.php'>Categories</a></li>";
					}
				
				if(($_SESSION["utype"]=="U")){	
				echo "<li><a href='books.php'>Add books</a></li>";
				}
				echo "<li><a href='loggoff.php'>Loggoff</a></li>";
				echo "<li><a href='profile.php'>Profile</a></li>";
				echo "<li><a href='password.php'>Change Password</a></li>";
				
				
			}
			else{
				echo "<li><a href='register.php'>Register</a></li>";
				echo "<li><a href='fyp.php'>ABOUT</a></li>";
			}

			?>

		</ul>
	</nav>