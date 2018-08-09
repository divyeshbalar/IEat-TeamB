<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if (isset($_SESSION['uname'])) {
	$flag = true;
} else {
	//unset($_SESSION['uname']);
	$flag = false;
}

?><!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pizza</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<?php
include 'header1.php';
?>
<style type="text/css">
	label{
		color:black;
	}
	input{
		border: 2px solid #FBB448 !important;
		color:black !important;
	}
	input:focus{
		color:black;
	}
	.top_7{
	margin-top: 7%;
	}
	.form-control{
		color:white;
	}
	.whitebackblackcol{
		background-color: rgba(255, 255, 255, 0.8);
		color: black;
		padding:15px;
	}
</style>
	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">


<?php include 'navigation.php';?>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(<?php echo base_url() ?>assets/images/bg2.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">


					<div class="row top_7">

						<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-3 animate-box" data-animate-effect="fadeInRight" style="opacity: 0.5 !important;">
							<label style="font-size: 50px; color: white; margin-left: 20%;" class="cursive-font">Register</label>
							<div class="form-wrap">
								<div class="tab">
											<form action="<?php echo site_url() . "/regcontroller"; ?>" method="post" class="whitebackblackcol">
												<div class="row form-group">
													<div class="col-md-12  col-sm-12 col-lg-10 offset-lg-1 ">
														<label for="activities">Username</label>
														<input required type="text" id="uname" name="uname" class="form-control" >

														<br>
														<label for="activities">E-mail</label>
														<input required type="email"  name="email" id="email" class="form-control">

														<br>
														<label for="activities">First name:</label>
														<input required type="name"  name="fname" id="fname" class="form-control">

														<br>
														<label for="activities">Last name:</label>
														<input type="name"  name="lname" id="lname" class="form-control">
														<br>
														<label required for="activities">Password</label>
														<input type="password"  name="pass" id="pass" class="form-control">

														<br>
														<label for="activities">Re-type Password</label>
														<input required type="password"  name="rpass" id="rpass" class="form-control">





														<div class="d-flex justify-content-around">
													    </div>
										</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input name="action" type="submit" class="btn btn-primary btn-block" value="Register">
													</div>
												</div>
											</form>
										</div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


<!-- 	<div class="gtco-section" id="favorites">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font primary-color">Popular Dishes</h2>
					<p>The most popular and widely loved cuisines including Montreal's world famous dish poutine.</p>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo base_url(); ?>assets/images/s3.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo base_url(); ?>assets/images/s3.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>poutine</h2>
							<p>Fresh Fried French Fries with yumm cheese curd and brown gravy on top.</p>
							<p><span class="price cursive-font">$7.65</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo base_url(); ?>assets/images/s2.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo base_url(); ?>assets/images/s2.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Cheese and Garlic Toast</h2>
							<p>Fresh bread moon with cheese, butter, garlic, parsley with Parmesan on top..</p>
							<p><span class="price cursive-font">$6.99</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo base_url(); ?>assets/images/s6.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo base_url(); ?>assets/images/s6.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Delicious Pizza</h2>
							<p>cooked in convention backing oven in a traditional way and Loved by thousands</p>
							<p><span class="price cursive-font">$12.99</span></p>

						</div>
					</a>
				</div>


				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo base_url(); ?>assets/images/s7.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo base_url(); ?>assets/images/s7.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Calzon</h2>
							<p> Italian oven-baked folded pizza made from salted dough, stuffed with sause vegetables and mozzarella</p>
							<p><span class="price cursive-font">$12.99</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo base_url(); ?>assets/images/s8.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo base_url(); ?>assets/images/s8.1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Lasagna</h2>
							<p>One of the oldest wide, flat pasta cooked in traditional way.</p>
							<p><span class="price cursive-font">$13.99</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo base_url(); ?>assets/images/s10.1.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo base_url(); ?>assets/images/s10.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Eggplant Parmesan</h2>
							<p>Sausy and cheesy fried egg-deeped eggplants with italiano sause and chese.</p>
							<p><span class="price cursive-font">$13.99</span></p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>
 -->


	<div class="gtco-cover gtco-cover-sm" style="background-image: url(<?php echo base_url(); ?>assets/images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>&ldquo; Their high quality of service makes me back over and over again!&rdquo;</h1>
					<p>&mdash; Baapu Gathiyawala, CEO of Gandakaka na fafda.</p>
				</div>
			</div>
		</div>
	</div>




	<!-- <div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font">Subscribe</h2>
					<p>Be the first to know about the new templates.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->

	<footer id="gtco-footer" role="contentinfo" style="background-image: url(<?php echo base_url(); ?>assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">




				<div class="col-md-12 text-center">
					<div class="gtco-widget">
						<h3 id="getInTouch">Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 514 731 7482</a></li>
							<li><a href="#"><i class="icon-mail2"></i> </a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
					<div class="gtco-widget">
						<h3>Get Social</h3>
						<ul class="gtco-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-12 text-center copyright">
					<p><small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
						<small class="block">Designed by <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
				</div>

			</div>



		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

<?php
include 'footer1.php';
session_write_close();
?>
	</body>
</html>
