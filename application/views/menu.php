<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
$product_ids = array();

if (isset($_SESSION['uname'])) {
	$flag = true;
} else {
	//unset($_SESSION['uname']);
	$flag = false;
	//$_SESSION['uname'] = "GuestUser";
}

if (isset($_SESSION['errormsg'])) {
	echo '<script>alert("' . $_SESSION['errormsg'] . '")</script>';
//	$_SESSION['errormsg'] = null;
	unset($_SESSION['errormsg']);
}
//echo "<h1>".$tax[0]->gst."</h1>";
$_SESSION['GSTval'] = $taxdata[0]->gst;
$_SESSION['QSTval'] = $taxdata[0]->qst;
$_SESSION['dtime'] = null;
$_SESSION['ddate'] = null;

#For constraint on minimum delivery amount
if (isset($_GET['type'])) {
	if ($_GET['type'] == "delivery") {
		if ((int) $_SESSION['grandtotal'] < 25) {
			$_SESSION['errormsg'] = "Minimum amount for delivery is $25";
			redirect(base_url() . "index.php/menucontroller");
		} else {
			$_SESSION['type'] = $_GET['type'];
		}

	} else {
		$_SESSION['type'] = $_GET['type'];
	}
}
#this will be call on click on checkout and will check if the user is logged in or not
if (filter_input(INPUT_GET, 'action') == 'checkout') {
	if (filter_input(INPUT_GET, 'ddate') == "") {
		$_SESSION['errormsg'] = "Please, enter date and time.";
		redirect(base_url() . "index.php/menucontroller/#cart");
	}
	if ($flag == false) {
		$_SESSION['errormsg'] = "Login is requires, in order to place an order.";
		redirect(base_url());
	} else if ($flag == true) #if user is logged in he/she will be transfer to checkout page
	{
#this else if will be checked when user is trying to checkout and logged in;
		#basically it includes the string manipulation for time and date
		if (filter_input(INPUT_GET, 'ddate')) {
			$temp = filter_input(INPUT_GET, 'ddate');
			$ddate = substr($temp, 0, 10);
			$dtime = substr($temp, 11, 18);
			if ($dtime[5] == 'P') {
				$tempo = ((int) ($dtime[0] . $dtime[1]));
				$tempo = (int) ($tempo + 12);
			} else {
				if (($dtime[0] . $dtime[1]) < 9) {
					$tempo = (int) $dtime[0];
				} else {
					$tempo = ((int) ($dtime[0] . $dtime[1]));
				}
			}
			$_SESSION['ddate'] = $ddate;
			$_SESSION['dtime'] = $tempo;
			$_SESSION['dtimedis'] = $dtime;
			redirect(base_url() . "index.php/checkoutcontroller/?action=checkout");
		}

	}
}

//$_SESSION['shopping_cart'] = null;
//check if Add to Cart button has been submitted

if (filter_input(INPUT_POST, 'add_to_cart')) {
	if (isset($_SESSION['shopping_cart'])) {

		//keep track of how mnay products are in the shopping cart
		$count = count($_SESSION['shopping_cart']);
		//create sequantial array for matching array keys to products id's
		$product_ids = array_column($_SESSION['shopping_cart'], 'id');

		if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
			$_SESSION['shopping_cart'][$count] = array
				(
				'id' => filter_input(INPUT_GET, 'id'),
				'name' => filter_input(INPUT_POST, 'dname'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity'),
			);
			//pre_r($_SESSION);
		} else {
			//product already exists, increase quantity
			//match array key to id of the product being added to the cart
			for ($i = 0; $i < count($product_ids); $i++) {
				if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
					//add item quantity to the existing product in the array
					$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
				}
			}
			//pre_r($_SESSION);
		}

	} else {
		//if shopping cart doesn't exist, create first product with array key 0
		//create array using submitted form data, start from key 0 and fill it with values
		$_SESSION['shopping_cart'][0] = array
			(
			'id' => filter_input(INPUT_GET, 'id'),
			'name' => filter_input(INPUT_POST, 'dname'),
			'price' => filter_input(INPUT_POST, 'price'),
			'quantity' => filter_input(INPUT_POST, 'quantity'),
		);
		//pre_r($_SESSION);
	}
}

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
}

?>

<!DOCTYPE html>
<html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Menu | Pizza</title>
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

	input:focus{
        background-color: transparent;!important
    }
    input:active{
        background-color: transparent;!important
    }
	hr.style2 {
	border-top: 3px double #8c8b8b;
	width: 90%;
	float: left;
    }
    .text-black{
        color:black;!important
    }
    .text-size-md{
        font-size: 24px;
    }
    .a1:focus{
        color: black;
    }
	.back-white{
		background-color: rgba(255, 255, 255, 1.0);
	}
	table, td, tr{
		color:black;
	}
	.nav-li{
		display: inline;
		margin-left:5px;
		border:2px solid rgba(255, 255, 255, 0.5);
		padding:4px 20px;
		border-radius: 4px;
	}
	.nav-li:hover{
		display: inline;
		margin-left:5px;
		border:2px solid rgba(255, 255, 255, 0.5);
		padding:4px 20px;
		border-radius: 4px;
		background-color: white;
	}
	.fsize{
	font-size: 20px;
	}
</style>
	</head>
	<body class="" style="background-image: url(<?php echo base_url() ?>assets/images/menuback2.jpg);" data-stellar-background-ratio="0.5">





        <div class="gtco-loader"></div>

        <div id="page">

            <?php include 'navigation.php'?>


			<nav class="nav" style="margin-top: 7%;" role="navigation">
					<div class="gtco-container">

						<div class="row" >
							<div  class="btn-group" class="col-xs-8 text-right menu-1">
								<ul style="list-style-type:none">
			                  <?php foreach ($navdata as $key => $value) {?>


									<li class="nav-li">
										<a href="<?php echo base_url() ?>index.php/nav_control/?section=<?php echo $value->name; ?>" >
										<span class="fsize"><?php echo $value->name; ?></span>
										</a>
									</li>


								<?php }?>
			                  </ul>
							</div>
						</div>

					</div>

				</nav>
        <div>

        <?php
//Menu item card

foreach ($ddata as $key => $value) {?>
			<form method="post" action="<?php echo base_url() . "index.php/menucontroller/?action=add&id=" . $value->did; ?>">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="thumbnail">
                  <img src="<?php echo base_url() . "assets/images/pizzadb/" . $value->image; ?>" class="responsive-image" alt="...">
                  <div class="caption">
                    <h3><?php echo $value->dname; ?></h3>
                    <p><?php echo $value->ddesc; ?></p>
                    <h3 class="text-info"><?php echo "$" . $value->price; ?></h3>
                    <input type="hidden" name="dname" value="<?php echo $value->dname; ?>" />
                    <input type="hidden" name="price" value="<?php echo $value->price; ?>" />
                    <input type="hidden" name="did" value="<?php echo $value->did; ?>">
                    <h4><input type="text" name="quantity" class="form-control" style="width: 16%; float: left;" value="1"><span width="100%"><input type="submit" name="add_to_cart" class="btn btn-primary addcart" style="margin-left: 10px; width: 79%;" role="button" value="Add to Cart"></span></h4>
                  </div>
              </div>
            </div>
            </form>
        <?php }?>


<!-- Here we will calculate cart total and total cart detail including number of items and quantity -->
        <?php
pre_r($_SESSION);
function pre_r($array) {
	if (empty($_SESSION['shopping_cart'])) {
		//if cart is empty then item table should not be visible
		?>
            <div style="color: white; visibility: hidden; display: none;" id="cart" class="gtco-cover gtco-cover-sm" style="background-image: url(<?php echo base_url(); ?>assets/images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">

        <?php } else {?>
            <div style="color: white;" id="cart" class="gtco-cover gtco-cover-sm" style="background-image: url(<?php echo base_url(); ?>assets/images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
        <?php }?>
            <div class="overlay"></div>
            <div class="gtco-container">
              <div class="display-t back-white">
                <div class="display-tc">
                  <div style="clear:both"></div>
                <br />
                <div class="table-responsive">
                <table class="table" style="color: #FFF;">
                    <tr><th colspan="5"><h3>Order Details</h3></th></tr>
                <tr>
                     <th width="40%">Product Name</th>
                     <th width="10%">Quantity</th>
                     <th width="20%">Price</th>
                     <th width="15%">Total</th>
                     <th width="5%">Action</th>
                </tr>
        <?php

	if (!empty($_SESSION['shopping_cart'])) {

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
                    $ <?php echo $product['price']; ?>
                </td>
	            <td>
                    $ <?php echo number_format($product['quantity'] * $product['price'], 2); ?>
                </td>
                <td>
                    <a href="<?php echo base_url() . "index.php/menucontroller/?action=delete&id=" . $product['id']; ?>"><div class="btn-danger">Remove</div></a>
                </td>
            </tr>
        <?php
$total = $total + ($product['quantity'] * $product['price']);
			$_SESSION['subtotal'] = $total;
			$GST = (($total * $_SESSION['GSTval']) / 100);
			$QST = (($total * $_SESSION['QSTval']) / 100);
			$grandtotal = $total + $GST + $QST;
			$_SESSION['grandtotal'] = $grandtotal;
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
            <td colspan="3" align="right">Total</td>
            <td colspan="2" align="left">
                <h4 style="color: #000;">$ <?php echo number_format($grandtotal, 2); ?></h4>
            </td>
        </tr>
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
<?php
if (isset($_SESSION['shopping_cart'])) {
			if (count($_SESSION['shopping_cart']) > 0) {
				?>
                    <form method="get" action="<?php echo base_url() . "index.php/menucontroller" ?>">
                    <center>

                        <label class="text-size-md" for="delivery">Delivery</label>
                        <input type="radio" id="delivery" name="type" value="delivery">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="pickup" name="type" checked="checked" value="pickup">
                        <label class="text-size-md" for="pickup">Pickup</label><br>
                        <div class='offset-lg-4 col-sm-12 col-md-5 col-lg-4'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' id="ddate" name="ddate" class="form-control a1" value="" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        </center>

                        <!-- <input type="submit" name="isOpen" class="btn btn-primary addcart button" value="check availability"> -->
                    <input type="submit" name="action" class="btn btn-primary addcart button" value="checkout" style="width: 100%;">

                    </form>
                <?php }}}?>
		    </td>
        </tr>
        <?php }?>
        </table>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php ?>
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
						<small class="block">Template Courtesy to <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a> Images Courtesy to: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
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
//print_r($_SESSION['shopping_cart']);
?>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });

            // document.getElementById('#datetimepicker1').value = new Date().toDateInputValue();
        </script>
</body>
</html>


<!--        <div class="clearfix visible-lg"></div>-->