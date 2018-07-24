<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if (isset($_SESSION['uname'])) {
	$flag = true;
} else {
	//unset($_SESSION['uname']);
	$flag = false;
}

?>
<!DOCTYPE html>
<html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Menu | PizzaPita</title>
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

<?php
include 'header1.php';
?>

<style type="text/css">
	hr.style2 {
	border-top: 3px double #8c8b8b;
	width: 90%;
	float: left;
}


</style>
	</head>
	<body class="" style="background-image: url(<?php echo base_url() ?>assets/images/menuback.png);" data-stellar-background-ratio="0.5">





<div class="gtco-loader"></div>

<div id="page">

	<?php include 'navigation.php'?>

<div style="margin-top:95px;">
<!--
	<h3>Pizza</h3>
	<hr class="style2"> -->
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Hamburger</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <h4><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></h4>
      </div>
      </div>
  	</div>

  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Polenta</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="clearfix visible-xs"></div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Meatball Sub</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="clearfix visible-md"></div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Eggplant</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Hamburger</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <h4><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></h4>
      </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Polenta</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="clearfix visible-xs"></div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Meatball Sub</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="clearfix visible-md"></div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Eggplant</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Polenta</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="clearfix visible-xs"></div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Meatball Sub</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="clearfix visible-md"></div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Eggplant</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>
 <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="thumbnail">
      <img src="<?php echo base_url() ?>assets/images/food/burger.png" width=150px height=150px alt="...">
      <div class="caption">
        <h3>Parmesan</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p><a href="#" class="btn btn-primary addcart" role="button">Add to Cart</a></p>
      </div>
    </div>
  </div>
</div>

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
?>
</body>
</html>