<?php
include("includes/config.php");
include("includes/menu.php");

	
			if ((isset($_SESSION["loggedin"])) && ($_SESSION["loggedin"])){

				$maxFileSize = 5 * 1024 * 1024; // 5 MB
				if ((($_FILES["userfile"]["type"] == "image/jpeg") ||
				($_FILES["userfile"]["type"] == "image/pjpeg"))
				&& ($_FILES["userfile"]["size"] < $maxFileSize))
				{
					if ($_FILES["userfile"]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["userfile"]["error"] . "<br />";
					}
					else{		
						move_uploaded_file($_FILES["userfile"]["tmp_name"],"users/".$_SESSION["uid"].".jpg" );
						header("Location:profile-picture.php?msg=UPS");
					}

				}

			}



			else{
				header("Location:index.php?msg=UAAA");
				}
