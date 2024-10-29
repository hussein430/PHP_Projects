<?php
// connection folder
require "Alaa/Alaa.php";
// connection variable
global $Alex;

$Products = "SELECT * FROM add_objects LIMIT 6";
$Run_Products = mysqli_query($Alex, $Products);


?>

<!DOCTYPE HTML>
<html lang="ar">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>المتجر الالكتروني</title>
	<link rel="icon" href="images/Fasticon-Shop-Cart-Shop-cart.512.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/styles.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<div id="fh5co-logo"><a href="index.html">المتجر الالكتروني</a></div>
					</div>
					<div class="col-md-9 col-xs-10 text-right menu-1">
						<ul>
							<?php
							if (@$_COOKIE["hussein"] == '1') {
								echo '
									<li>
										<a href="logOut.php">المغادرة</a>
									</li>
									<li>
									<a href="Profile.php">الملف الشخصي </a>
									</li>
								';
							} else {
								echo '
									<li>
										<a href="logIn.php">تسجيل الدخول</a>
									</li>
									<li>
										<a href="signup.php">انشاء الحساب</a>
									</li>
								';
							}
							?>
							<li>
								<a href="ShowProducts.php">لوحة الأدمن</a>
							</li>
							<li>
								<a href="shopping.php">سلة المشتريات</a>
							</li>

							<li>
								<a href="index.php">الرئيسية</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<section>
			<img src="images/shop-2607121_1280.jpg" alt="background img" class="background_image">
		</section>

		<div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-credit-card"></i>
							</span>
							<h3>طرق دفع متنوعة</h3>
							<p>يمكنك الدفع باي طريقة تشاء وفرنالك طرق عديدة</p>
							<p><a href="help.php" class="btn btn-primary btn-outline">... معلومات اكثر</a></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<h3>وفر فلوسك</h3>
							<p>بضائعنا اصلية وتحتوي جميعها على ضمان لضمان حقك</p>
							<p><a href="help.php" class="btn btn-primary btn-outline">...معلومات اكثر</a></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i class="icon-paper-plane"></i>
							</span>
							<h3>توصيل مجاني</h3>
							<p>نستطيع الوصول اليك اينما كنت لايصال طلبك مجانا</p>
							<p><a href="help.php" class="btn btn-primary btn-outline">...معلومات اكثر</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>المنتجات</h2>
					</div>
				</div>
				<div class="row">
					<?php
					while ($Row_Products = mysqli_fetch_array($Run_Products)) {
						echo '
						<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(copy_img/' . @$Row_Products['Object_img'] . ');">
								<div class="inner">
									<p>
										<a href="buy.php?T=' . @$Row_Products['Object_token'] . '" class="icon"><i class="icon-shopping-cart"></i></a>
										<a href="Admin_edit.php?T=' . @$Row_Products['Object_token'] . '" class="icon"><i class="icon-pencil"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="single.html">' . @$Row_Products['Object_name'] . '</a></h3>
								<span class="price">' . @$Row_Products['Object_price'] . '</span>
							</div>
						</div>
					</div>
						';
					}
					?>
				</div>
				<div class="more_products">
					<p><a href="#" class="btn btn-primary btn-outline">جميع المنتجات</a></p>
				</div>
			</div>
		</div>

		<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
			<div class="container">
				<div class="row">
					<div class="display-t">
						<div class="display-tc">
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-eye"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Creativity Fuel</span>

								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-shopping-cart"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Happy Clients</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-shop"></i>
									</span>
									<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">All Products</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-clock"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Hours Spent</span>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-started">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>اخر الاخبار</h2>
						<p>اشترك معنا للحصول على اخر الاخبار والتحديثات</p>
					</div>
				</div>
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2">
						<form class="form-inline">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-default btn-block">Subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<footer id="fh5co-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-4 fh5co-widget">
						<h3>المتجر الالكتروني</h3>
					</div>
					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="#">About</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Meetups</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="#">Shop</a></li>
							<li><a href="#">Privacy</a></li>
							<li><a href="#">Testimonials</a></li>
							<li><a href="#">Handbook</a></li>
							<li><a href="#">Held Desk</a></li>
						</ul>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<ul class="fh5co-footer-links">
							<li><a href="#">Find Designers</a></li>
							<li><a href="#">Find Developers</a></li>
							<li><a href="#">Teams</a></li>
							<li><a href="#">Advertise</a></li>
							<li><a href="#">API</a></li>
						</ul>
					</div>
				</div>

				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">&copy; 2023 All Rights Reserved.</small>
							<small class="block">Designed by
								<a href="https://hussein430.github.io/My_PersonalSide/" target="_blank">Hussein Alaa</a>
						</p>
						<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

</body>

</html>