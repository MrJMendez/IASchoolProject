<?php 


include('signUp/prosetup.php');
if(isset($_SESSION['userEmail'])){
$user = $_SESSION['userEmail'];
$cartQuery = mysqli_query($conn,"SELECT * FROM carts WHERE customer_id = '$user'");
$cartCount = mysqli_num_rows($cartQuery);
$_SESSION['cartArray'] = mysqli_fetch_all($cartQuery);
	$sql2 = "select * from carts where customer_id = '$user'";
	$result=  mysqli_query($conn, $sql2);
	$results = mysqli_fetch_all($result);
foreach($results as $val){

	$total += $val[6]*$val[7];
	}
}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">

<style> 
.order_button button,
.order_button button:focus,
.order_button button:active{

	background-color: transparent;
	border:none;
	box-shadow: none;
	cursor: pointer;

} 

</style>


</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo"><a href="index.php">HiQual</a></div>
						<nav class="main_nav">
								<ul>
									<li>
										<a href="index.php">Home</a>
									</li>
									<li class="hassubs">
										<a href="#">Categories</a>
										<ul>
											<li><a href="cellphones.php">Cellphones</a></li>
											<li><a href="gamings.php">Gaming Consoles</a></li>
											<li><a href="computers.php">Computer</a></li>
											<li><a href="tablets.php">Tablet Pc</a></li>
										</ul>
									</li>
									<li><a href="accessories.php">Accessories</a></li>
									<li class="hassubs">
										<a href="contact.php">Contact</a>
										<ul>
											<li><a href="aboutus.php">About Us</a></li>
											<li><a href="terms.php">Terms and Conditions</a></li>
											<li><a href="privacy.php">Privacy Policy</a></li>
										</ul>
									</li>


										<li><a href="signUp/signUp.php">
										<?php if(isset($_SESSION['current_user'])): 
													echo $_SESSION['current_user'];
											?>
									<li><a href = "signUp/prologout.php" </a> Log out</li>

									 <?php else: echo "Account"; ?>
									 <?php endif ?>
									
									</a> </li>
								</ul>
							</nav>
							<div class="header_extra ml-auto">
								<div class="shopping_cart">
									<a href="cart.php">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
											<g>
												<path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
											</g>
										</svg>
										<div>Cart <span>(<?php echo $cartCount;?>)</span></div>
									</a>
								</div>
								<div class="search">
									<div class="search_icon">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 475.084 475.084" style="enable-background:new 0 0 475.084 475.084;"
										 xml:space="preserve">
										<g>
											<path d="M464.524,412.846l-97.929-97.925c23.6-34.068,35.406-72.047,35.406-113.917c0-27.218-5.284-53.249-15.852-78.087
												c-10.561-24.842-24.838-46.254-42.825-64.241c-17.987-17.987-39.396-32.264-64.233-42.826
												C254.246,5.285,228.217,0.003,200.999,0.003c-27.216,0-53.247,5.282-78.085,15.847C98.072,26.412,76.66,40.689,58.673,58.676
												c-17.989,17.987-32.264,39.403-42.827,64.241C5.282,147.758,0,173.786,0,201.004c0,27.216,5.282,53.238,15.846,78.083
												c10.562,24.838,24.838,46.247,42.827,64.234c17.987,17.993,39.403,32.264,64.241,42.832c24.841,10.563,50.869,15.844,78.085,15.844
												c41.879,0,79.852-11.807,113.922-35.405l97.929,97.641c6.852,7.231,15.406,10.849,25.693,10.849
												c9.897,0,18.467-3.617,25.694-10.849c7.23-7.23,10.848-15.796,10.848-25.693C475.088,428.458,471.567,419.889,464.524,412.846z
												 M291.363,291.358c-25.029,25.033-55.148,37.549-90.364,37.549c-35.21,0-65.329-12.519-90.36-37.549
												c-25.031-25.029-37.546-55.144-37.546-90.36c0-35.21,12.518-65.334,37.546-90.36c25.026-25.032,55.15-37.546,90.36-37.546
												c35.212,0,65.331,12.519,90.364,37.546c25.033,25.026,37.548,55.15,37.548,90.36C328.911,236.214,316.392,266.329,291.363,291.358z
												"/>
										</g>
									</svg>
									</div>
								</div>
								<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Search Panel -->
		<div class="search_panel trans_300">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
							<form action="#">
								<input type="text" class="search_input" placeholder="Search" required="required">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Social -->
		<div class="header_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</header>

	<!-- Menu -->

	
	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="cart.php">Shopping Cart</a></li>
										<li>Checkout</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->
	
	<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Enter your address info</div>
						<div class="checkout_form_container">


							<form action="checkout.php" method="POST" id="checkout_form" class="checkout_form" name="myform">
								<div class="row">
									

									<div class="col-xl-6">
									<!-- Email -->
									<label for="checkout_email">Email Address*</label>
									<input type="text" id="checkout_email" class="checkout_input" name="email" required="required">
									</div>
									<div class="col-xl-6">
										<!-- Name -->
										<label for="checkout_name">District*</label>
										<input type="text" id="checkout_name" class="checkout_input" name ="district" required="required">
									</div>
									<div class="col-xl-6">
										<!-- Name -->
										<label for="checkout_name">Street*</label>
										<input type="text" id="checkout_name" class="checkout_input" name ="Street" required="required">
									</div>
									<div class="col-xl-6">
									<!-- City / Town -->
									<label for="checkout_city">City/Town*</label>
									<input type ="text"  id="checkout_city" class="checkout_input" name="city" require="required">
										
								</div>


								<div>
									<!-- City / Town -->
									<label for="checkout_city">State/Parish*</label>
									<input type ="text"  id="checkout_city" class="checkout_input" name="state" require="required">
										
								</div>

								</div>
							
								<div>
									<!-- Country -->
									<label for="checkout_country">Country*</label>
									<input type = "text"  id="checkout_country" class="checkout_input" name="country" require="required">
										
									
								</div>
							
								
								<div>
									<!-- Zipcode -->
									<label for="checkout_zipcode">Zipcode*</label>
									<input type="text" id="checkout_zipcode" class="checkout_input" name="zip" required="required">
								</div>
								
								
								
								


								<div class="checkout_extra">
									<div>
										<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
										<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Terms and conditions</span>
									</div>
									<div>
										<input type="checkbox" id="checkbox_account" name="regular_checkbox" class="regular_checkbox">
										<label for="checkbox_account"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Create an account</span>
									</div>
									<div>
										<input type="checkbox" id="checkbox_newsletter" name="regular_checkbox" class="regular_checkbox">
										<label for="checkbox_newsletter"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Subscribe to our newsletter</span>
									</div>
								</div>
								<div><input onclick="disable()" type="checkbox" name="sameAddress"> <strong>Check if you want to use your original addrress</strong></div>

								<div class="button order_button"><button name="placeOrder" type="submit" value="Place Order"><a>Place Order</a></button></div>

							</form>
							<script type="text/javascript">
								function disable(){
									var par = document.getElementById("checkout_form").getElementsByTagName("input");
									var x;
									for (x in par){
										par[x].disabled = true;
										par[10].disabled = false;
									}

								}
								
							</script>


						</div>
					</div>
				</div>



				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order details</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Product</div>
								<div class="order_list_value ml-auto">Total</div>
							</div>

			

							<ul class="order_list">

<?php   
			foreach($results as $r){

			



								echo "<li class='d-flex flex-row align-items-center justify-content-start'>
									<div class='order_list_title'> $r[4] </div>
									<div class='order_list_value ml-auto'> $r[6]</div>
								</li>";
}?>


								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Subtotal</div>
									<div class="order_list_value ml-auto">$<?php echo $total?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Shipping</div>
									<div class="order_list_value ml-auto">Free</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto">$<?php echo $total?></div>
								</li>
							</ul>
						</div>

						<!-- Payment Options -->
					

						<!-- Order Text -->
						<div class="order_text">These are the products that you ordered!</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	
	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="index.php">HiQual</a></div>
						<div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						<div class="footer_social ml-lg-auto">
							<ul>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								  
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>