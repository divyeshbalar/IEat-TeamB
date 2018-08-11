<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if (isset($_SESSION['adminuname'])) {
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
	<title>Admin | IEat</title>
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
</style>
	</head>
	<body style="background-color: rgba(0, 0, 0, 0.8);">

	<div class="gtco-loader"></div>

	<div id="page">


<?php include 'adminnavigation.php';?>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">


					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small" style="color:white">Food for all</span>
							<h1 class="cursive-font">All in good taste!</h1>
						</div>
						<?php if ($flag == false) {?>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">

									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3 class="">Admin Panel</h3>
											<form action="<?php echo site_url() . "/adminlogincontroller"; ?>" method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="activities">Username</label>
														<input type="text" id="uname" name="uname" class="form-control" style="focus:color:black;focus:background-color:transparent;">
															<br>
														<label for="activities">Password</label>
														<input type="password" style="focus:background-color:transparent;focus:color:black;" name="pass" id="pass" class="form-control">
														<br>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary btn-block" value="Login">
													</div>
												</div>
											</form>
										</div>


									</div>
								</div>
							</div>
						</div>
					<?php } else { $flag = true;}?>
					</div>
				</div>
			</div>
		</div>
	</header>






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
