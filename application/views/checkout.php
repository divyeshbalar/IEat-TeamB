<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
// $_SESSION['orderdtl'] = array();
if (isset($_SESSION['uname'])) {
	$flag = true;
} else {
	//unset($_SESSION['uname']);
	$flag = false;
}
//echo $_SESSION['type'];
if (filter_input(INPUT_GET, 'action') == 'delete') {
	//loop through all products in the shopping cart until it matches with GET id variable
	foreach ($_SESSION['shopping_cart'] as $key => $product) {
		if ($product['id'] == filter_input(INPUT_GET, 'id')) {
			//remove product from the shopping cart when it matches with the GET id
			unset($_SESSION['shopping_cart'][$key]);
			//pre_r($_SESSION);
		}
	}
	//reset session array keys so they match with $product_ids numeric array
	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
	if (empty($_SESSION['shopping_cart'])) {
		redirect(base_url() . "index.php/menucontroller");
	} else {
		redirect(base_url() . "index.php/checkoutController/?action=checkout");
	}
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
	.text-black{
		color:black;!important
	}
	.text-size-md{
		font-size: 24px;
	}
	.whiteback{
		background-color: white !important;
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
			<div class="row" style="background-color:transparent; margin-top:100px;">

                <div style="float:center; position: relative; background-color: white;" align="center" class="col-lg-10 col-md-8 col-sm-10 offset-lg-1 offset-md-2 offset-sm-1">
                	<!-- Default form login -->
					<form method="post" action="<?php echo base_url() . "index.php/ordervalidationcontroller" ?>" class="text-center border border-light p-5">

					    <h3>Checkout</h3>

					    <!-- Email -->
					    <input type="text" id="pname" name="pname" class="form-control mb-4" placeholder="Enter your name">
						<?php if ($_SESSION['type'] == 'delivery') {?>
					    <!-- Address -->

					    <input type="address" required id="address1" name="address1" class="form-control mb-4" placeholder="Address (2121 St. Mathieu ...)">

						<!-- appartment number -->
						<input type="text" id="apptno" required name="apptno" class="form-control mb-4" placeholder="Apt No. (i.e 1407)">
						<!-- zip -->
						<input type="text" id="zipcode" required name="zipcode" class="form-control mb-4" placeholder="Zipcode(i.e H3H 2J3)">

						<!-- city -->
						<input type="city" id="city" name="city" class="form-control mb-4" placeholder="City (i.e Montreal)">
						<?php }?>
						<!-- phone number -->
						<input type="phone" id="phoneno" required name="phoneno" class="form-control mb-4" placeholder="Phone number">




	<div style="color: black;" id="cart" class="gtco-cover gtco-cover-sm whiteback">
					<div class="overlay whiteback"></div>
			            <div class="gtco-container">
			              <div class="display-t">
			                <div class="display-tc">
			                  <div style="clear:both"></div>
			                <br />
			                <div class="table-responsive">
			                <table class="table" style="background-color: #fff; color: #000; border-color: black;">
			                    <tr><th colspan="5"><h3>Order Details</h3></th></tr>
			                <tr>
			                     <th width="40%">Product Name</th>
			                     <th width="5%">Quantity</th>
								 <th width="15%">Special Instruction</th>
			                     <th width="10%">Price</th>
			                     <th width="15%">Total</th>
			                     <th width="5%">Action</th>
			                </tr>
			        <?php

if (!empty($_SESSION['shopping_cart'])) {
	$counting = 0;
	$total = 0;
	foreach ($_SESSION['shopping_cart'] as $key => $product) {
		?>
			                <tr><td>
			                    <?php echo $product['name']; ?>
			                </td>
			                <td>
			                    <?php echo $product['quantity']; ?>
			                </td>
							<td>
								<input type="text" name="spe_inst<?php echo $counting; ?>" id="spe_inst">
							</td>
			                <td>
			                    $ <?php echo $product['price']; ?>
			                </td>
				            <td>
			                    $ <?php echo number_format($product['quantity'] * $product['price'], 2); ?>
			                </td>
			                <td>
			                    <a href="<?php echo base_url() . "index.php/checkoutController/?action=delete&id=" . $product['id']; ?>"><div class="btn-danger">Remove</div></a>
			                </td>
			            </tr>
			        <?php
$total = $total + ($product['quantity'] * $product['price']);
		$_SESSION['subtotal'] = $total;
		$GST = (($total * $_SESSION['GSTval']) / 100);
		$QST = (($total * $_SESSION['QSTval']) / 100);
		$grandtotal = $total + $GST + $QST;
		$_SESSION['grandtotal'] = $grandtotal;
		$counting += 1;
	}
	//echo "Grand Total" . $_SESSION['grandtotal'];
	if (isset($_SESSION['type'])) {
		if ($_SESSION['type'] == "delivery") {
			if ((int) $_SESSION['grandtotal'] < 25) {
				$_SESSION['errormsg'] = "Minimum amount for delivery is $25";
				redirect(base_url() . "index.php/menucontroller");
			}

		}
	}

	if ($_SESSION['type'] == "delivery" && (int) $_SESSION['grandtotal'] < 25) {
		$_SESSION['errormsg'] = "Minimum amount for delivery is $25";
		redirect(base_url() . "index.php/menucontroller");
	}
	?>
			            <tr>
			              <td colspan="5"></td>
			            </tr>
			            <tr>

			            <td align="left">
			                sub-total + GST(<?php echo $_SESSION['GSTval']; ?>%) + QST(<?php echo $_SESSION['QSTval']; ?>%)
			            </td>
			            <td colspan="3" align="left">
			                $ <?php echo number_format($total, 2) . "&nbsp;&nbsp;&nbsp; + &nbsp;&nbsp;&nbsp;$" . number_format($GST, 2) . " &nbsp;&nbsp;&nbsp; +  &nbsp;&nbsp;&nbsp;$ " . number_format($QST, 2); ?>
			            </td>
			            <td></td>
			        </tr>
			        <tr>
						<td colspan="3" align="center">
							<div class='offset-lg-2 col-sm-12 col-md-8 col-lg-8'>
										<label><?php echo ucfirst($_SESSION['type']); ?> date: <?php echo $_SESSION['ddate']; ?></label>
										<label style="margin-left:25px;">Time: <?php echo $_SESSION['dtimedis']; ?></label>
			                 </div>

			                <?php }?></td>
			            <td colspan="1" align="right">Total</td>
			            <td colspan="2" align="left">
			                <h4 style="color: #000;">$ <?php echo number_format($grandtotal, 2); ?></h4>
			            </td>
			        </tr>
			        <tr>
			            <!-- Show checkout button only if the shopping cart is not empty -->
			            <td colspan="5">
					    </td>
			        </tr>

			        </table>
			         </div>
			        </div>
			      </div>
				<div style="color: black !important; margin-top:-10%;">
					<textarea class="text-black" style="font-size: 12px" cols="50" rows="3" value="Delivery/Allergic instruction" id="delInstruction" name="delInstruction" ><?php if ($_SESSION['type'] == 'delivery') {?>Delivery <?php } else {?> Pickup <?php }?> Instruction/Allergic instruction
					</textarea>
				</div>
			    </div>
</div>


					    <!-- Sign in button -->
						<?php session_write_close();?>
					    <input class="btn btn-primary addcart btn-block" type="submit">Submit</button>



					</form>
<!-- Default form login -->
				</div>
            </div>
        </div>
	</header>

	<footer style="margin-top: 20%;" id="gtco-footer" role="contentinfo" style="background-image: url(<?php echo base_url(); ?>assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div style="visibility: hidden;" class="col-md-12 text-center">
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
