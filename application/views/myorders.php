<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if (isset($_SESSION['uname'])) {
	$flag = true;
} else {
	//unset($_SESSION['uname']);
	$flag = false;
}
if (isset($_SESSION['errormsg'])) {
	echo '<script>alert("' . $_SESSION['errormsg'] . '")</script>';
//	$_SESSION['errormsg'] = null;
	unset($_SESSION['errormsg']);
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
input:focus{
	background-color: transparent !important;
}
.whiteback{
	background-color: white;
}
div, span{
	/*border: 1px solid black;*/
	padding: 5px;
/*border-radius: 5px;*/
	}
span, label{
	color: black;
	}
.fright{
	float: right;
}
.orderdtldiv{
	border: 2px solid grey;
	border-radius: 4px;
}
.otitle{
	font-size: 13px;
}
.ototal{
font-size:15px;
}
.otitleback{
padding:8px;
background-color: #EFF2F3;
}
.odetail{
	color: #FBB448;
}
</style>
	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">


<?php include 'navigation.php';?>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(<?php echo base_url() ?>assets/images/bg6.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">


					<div class="row">
						<div class="col-md-10 col-lg-10 offset-lg-1 offset-md-1 col-sm-12 mt-text animate-box whiteback" style="padding: 3px; border-radius: 4px;"  data-animate-effect="fadeInUp">
							<!-- <span class="intro-text-small cursive-font" style="color:white">Food for all</span> -->
							<h3 style="margin-left:3%; margin-top: 2%;">My Orders</h3>

<?php
$i = 0;
foreach ($orders as $key => $value) {
	$orderid = $value->oid;
	//echo "<br><label>" . $orderid . "</label><br>";
	?>

								<div style="margin-top:10px;" class="col-md-10 col-lg-10 offset-lg-1  orderdtldiv offset-md-1 col-sm-12 ">
								<div class="otitleback col-12">
									<span class="otitle">ORDER PLACED FOR: <?php echo $value->date . " " . $value->time; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
									<span class="fright ototal">TOTAL: <?php echo number_format($value->total, 2); ?></span>
								</div>
									<div><span class="ototal"><b>ORDER # <?php echo $value->oid; ?></b></span></div>
								<div>
									<span>Status: <b><?php
if ($value->status == 'W') {
		echo '<text style="color:#0abbef;">Waiting</text>';
	} elseif ($value->status == 'A') {
		echo '<text style="color:green;">Accepted</text>';
	} elseif ($value->status == 'R') {
		echo '<text style="color:red;">Rejected</text>';
	} elseif ($value->status == 'D') {
		echo '<text style="color:black;">Done</text>';
	} elseif ($value->status == 'C') {
		echo '<text style="color:red;">Canceled</text>';
	} else {
		echo "Contact us";
	}?></b></span>
									<span class="fright"><a href="<?php echo base_url() . "index.php/cancelordercontroller/?action=" . $value->oid . "&date=" . $value->date; ?>"> Cancel Order </a></span>
								</div>
								<div>
									<span class="ototal odetail">Order Detail</span>
									<?php
$j = 1;
	foreach ($desc[$i] as $key => $valuein) {

		//echo "<br><label>" . $orderid . "====>" . $valuein->oid . "</label><br>";
		if ($orderid == $valuein->oid) {
			?>
										<div>
										<span><?php echo $j . " " . $valuein->dname; ?></span>&nbsp;&nbsp;<span class="fright">Price: <?php echo $valuein->price; ?></span><span class="fright">Qty: <?php echo $valuein->quantity; ?></span>
										</div>
									<?php }
		$j++;}
	$i++;?>
								</div>
								</div>
							<?php }?>
							</div>

					</div>
				</div>
			</div>
		</div>
	</header>


	<footer id="gtco-footer" role="contentinfo" style="background-image: url(<?php echo base_url(); ?>assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
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
