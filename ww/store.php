

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>The Generics</title>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
	<header class="main-header">
	<nav class="main-nav nav">
		<ul>
			<li> <a href="index.php"> HOME</a></li>
			<li><a href="Store.php"> STORE</a></li>
			<li><a href="fyp.php">ABOUT</a></li>
			<?php
			if ((isset($_SESSION["loggedin"]))&&($_SESSION["loggedin"])) {
				echo "<li><a href='logoff.php'>Logoff</a></li>";
				}
				?>
		</ul>
	</nav>
	<hr>
	<h1 class="band-name band-name-large">The Generics</h1>

	</header>
	<section class="container content-section">
		<section>
			<h2 class="section-header">MUSIC</h2>
			<div class="shop-items">
			<div class="shop-item">
				<span class="shop-item-title">Album1</span>
				<img class="shop-item-image" src="logo1.PNG">
				<div class="shop-item-details">
					<span class="shop-item-price">13.8$</span>
					<button class="btn btn-primary shop-item-button">ADD TO CHART</button>
				</div>
				</div>

				<div class="shop-item">
				<span class="shop-item-title">Album2</span>
				<img class="shop-item-image"src="logo2.JPG">
				<div>
					<span class="shop-item-price">13.8$</span>
					<button class="btn btn-primary shop-item-button">ADD TO CHART</button>
					</div>
				</div>


				<div class="shop-item">
				<span class="shop-item-title">Album3</strong></span>
				<img class="shop-item-image"src="logo3.JPG">
				<div>
					<span class="shop-item-price">13.8$</span>
					<button class="btn btn-primary shop-item-button">ADD TO CHART</button>
					</div>
				</div>

				<div class="shop-item">
				<<span class="shop-item-title">Album4</span>
				<img class="shop-item-image"src="logo4.PNG">
				<div class="shop-item-details">
					<span class="shop-item-price">13.8$</span>
					<button class="btn btn-primary shop-item-button">ADD TO CHART</button>
					</div>
				</div>


			</div>
			
			</div>

		</section>


			<section class="container content-section">
				<h3 class="section-header">MERCH</h3>
				<div class="shop-items">
				<div class="shop-item">
				<span class="shop-item-title"> T-SHIRT</span>
				<img class="shop-item-image" src="logo5.JPG">
				<div class="shop-item-details">
					<span class="shop-item-price">13.8$</span>
					<button class="btn btn-primary shop-item-button" >ADD TO CHART</button>
				</div>
				</div>


							


							<div class="shop-item">
				<span class="shop-item-title">COFFEE CUP</span>
				<img class="shop-item-image" src="logo6.JPG">
				<div class="shop-item-details">
					<span class="shop-item-price" >13.8$</span>
					<button class="btn btn-primary shop-item-button" >ADD TO CHART</button>
				</div>
			</div>
		</div>
		

				</section>


			<section class="container section-header">
				<h4 class="section-header">CART</h4>
				<div class="cart-row">
					<SPAN class="cart-item cart-header cart-column" >  ITEM</SPAN>
					
					<SPAN class="cart-price cart-header cart-column" >PRICE</SPAN>
					
					<SPAN class="cart-quantity cart-header cart-column" >QUANTITY</SPAN>
					
				</div>
				<div class="cart-row">
					<div class="cart-item cart-column">
					<SPAN class="cart-item-title" >T-SHIRT</SPAN>
					</div>
					
					<SPAN class="cart-price cart-column">18.7$</SPAN>
					<div class="cart-quantity cart-column">
					<input class="cart-quantity-input " type="number" value="1" >
					<button class="btn btn-danger cart-quantity-button" >REMOVE</button>
					</div>

				</div>
				<div class="cart-row">
					<div class="cart-item cart-column">
					<SPAN class="cart-item-title" >COFFEE</SPAN>
					</div>
					<SPAN class="cart-price cart-column">18.7$</SPAN>
					<div class="cart-quantity cart-column">
					<input class="cart-quantity-input " type="number" value="2" >
					<button class="btn btn-danger cart-quantity-button" >REMOVE</button>
				</div>
				</div>
				<hr>
				<div class="cart-total">
					<SPAN class="cart-total-title" >TOTAL</bold>
					<SPAN class="cart-total-price" >78.9$</SPAN>
				</div>
				
					<button class="btn btn-primary btn-purchase" >PURCHASE</button>
				

			</section>
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