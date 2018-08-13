<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

if (isset($_SESSION['adminuname'])) {
	$flag = true;
} else {
	//unset($_SESSION['uname']);
	$flag = false;
	redirect(base_url() . "index.php/admincontrol");
}

if (isset($_SESSION['errormsg'])) {
	echo '<script>alert("' . $_SESSION['errormsg'] . '")</script>';
//	$_SESSION['errormsg'] = null;
	unset($_SESSION['errormsg']);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Management Delivery Areas</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">


<?php
include 'header1.php';
?>
<style type="text/css">
h2{
	color: white;
}
body{
	color:black !important;
}
input:focus{
	background-color: transparent !important;
}
.backwhite{
	background-color: white;
}
table{
	padding: 15px;
	z-index: 10;
}
th, tr{
	text-align:center;
}
h5{
	color: white;
}
</style>
	</head>
	<body style="background-color: rgba(0, 0, 0, 0.8);">

	<div class="gtco-loader"></div>

	<div id="page">


<?php include 'adminnavigation.php';?>

		<div class="overlay"></div>
		<div class="">
			<div class="row">
				<div style="margin-top: 10%; scroll-behavior: horizontal;">


						<h2 style="margin-left:20px;">Orders Management</h2>
						<h5 style="margin-left:20px;">(Accept or Reject the orders)</h5>

						<div class="backwhite" style="padding: 15px;">
							<table id="data" border="1">
            <thead>
                <tr>
                    <th>Number</th>
					<th>Cust id</th>
                    <th>Type order</th>
					<th>client name</th>
					<th>Address</th>
					<th>Appartament number</th>
					<th>Zipcode</th>
					<!-- <th>City</th> -->
					<th>Phone number</th>
					<!-- <th>Delivery Instruction</th> -->
					<th>Sub total</th>
					<!-- <th>GST</th>
					<th>QST</th> -->
					<th>Total</th>
					<th>Date</th>
					<th>Time</th>
					<th>Status</th>
                </tr>
            </thead>
            <tbody>
				<!-- <tr>
					<form name="CreateOrder" id="CreateOrder" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createorder"; ?>>
						<th></th>
						<th><input type="text" name="custid" id ="custid" value=""></th>
						<th>
							<select name="type" id="type">
									<option value="0" >Delivery</option>
									<option value="1" >Pickup</option>
							</select>
						</th>
						<th><input type="text" name="cname" id ="cname" value=""></th>
						<th><input type="text" name="del_address" id ="del_address" value=""></th>
						<th><input type="text" name="apptno" id ="apptno" value=""></th>
						<th><input type="text" name="zipcode" id ="zipcode" value=""></th>
						<th><input type="text" name="city" id ="city" value=""></th> -->
						<!-- <th><input type="text" name="phoneno" id ="phoneno" value=""></th>
						<th><input type="text" name="delInstruction" id ="delInstruction" value=""></th>
						<th><input type="text" name="subtotal" id ="subtotal" value=""></th> -->
						<!-- <th><input type="text" name="gst" id ="gst" value=""></th>
						<th><input type="text" name="qst" id ="qst" value=""></th> -->
					<!-- 	<th><input type="text" name="total" id ="total" value=""></th>
						<th><input type="text" name="date" id ="date" value=""></th>
						<th><input type="text" name="time" id ="time" value=""></th>
						<th>
							<select name="status" id="status">
									<option value="W" >Wait</option>
									<option value="A" >Accepted</option>
									<option value="R" >Rejected</option>
									<option value="D" >Done</option>
									<option value="C" >Canceled</option>
								</select>
						</th>
						<th><input  type="submit" name="add" id="add" value="Add"></th>
					</form>
				</tr>  -->
				<?php foreach ($orders as $item) {
	?>
					<tr>
						<form name="UpdateOrder" id="UpdateOrder" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateorder"; ?>>
							<th><?php echo ($item['oid']); ?></th>
							<th><?php echo ($item['custid']); ?></th>
							<th><?php echo ($item['type']); ?></th>
							<th><?php echo ($item['cname']); ?></th>
							<th><?php echo ($item['del_address']) ?></th>
							<th><?php echo ($item['apptno']); ?></th>
							<th><?php echo ($item['zipcode']); ?></th>
							<!-- <th><?php echo ($item['city']); ?></th> -->
							<th><?php echo ($item['phoneno']); ?></th>
							<!-- <th><?php //echo ($item['delInstruction']) ?></th> -->
							<th><?php echo "$" . ($item['subtotal']); ?></th>
							<!-- <th><?php //echo ($item['gst']) ?></th> -->
							<!-- <th><?php //echo ($item['qst']) ?></th> -->
							<th><?php echo "$" . $item['total']; ?></th>
							<th><?php echo ($item['date']) ?></th>
							<th><?php echo ($item['time']) ?></th>
							<th>
								<select name="status" id="status">
									<option value="W" <?php if ($item['status'] == 'W') {echo (' selected ');}?>>Wait</option>
									<option value="A" <?php if ($item['status'] == 'A') {echo (' selected ');}?>>Accepted</option>
									<option value="R" <?php if ($item['status'] == 'R') {echo (' selected ');}?>>Rejected</option>
									<option value="D" <?php if ($item['status'] == 'D') {echo (' selected ');}?>>Done</option>
									<option value="C" <?php if ($item['status'] == 'C') {echo (' selected ');}?>>Canceled</option>
								</select>
							</th>
							<input type="hidden" name="oid" id="oid" value="<?php echo ($item['oid']); ?>">
							<th><input  type="submit" name="update" id="update" value="Update"></th>
						</form>
						<form name="DetailOrder" id="DetailOrder" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/detailorder"; ?>>
							<input type="hidden" name="oid" id="oid" value="<?php echo ($item['oid']); ?>">
							<th><input  type="submit" name="update" id="update" value="Detail"></th>
						</form>
						<form name="DeleteAreaDelivery" id="DeleteAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/deleteorder"; ?>>
							<input type="hidden" name="oid" id ="oid" value="<?php echo ($item['oid']) ?>">
							<th><input  type="submit" name="update" id="update" value="Delete"></th>
						</form>
					</tr>
				<?php
}?>
            </tbody>
        </table>
						</div>

					</div>
				</div>
			</div>







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
