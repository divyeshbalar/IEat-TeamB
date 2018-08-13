
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
color:white;
}
</style>
	</head>
	<body style="background-color: rgba(0, 0, 0, 0.8);">

	<div class="gtco-loader"></div>

	<div id="page">


<?php include 'adminnavigation.php';?>

		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div style="margin-top: 10%;">


						<h2>Areas of Delivery</h2><h5>(Please, Enter first 3 letters of areacode)</h5>
						<div class="backwhite" style="padding: 15px;">
										<table id="data" border="1">
            <thead>
                <tr>
                    <th>Area</th>
                    <th>Price</th>
					<th> Update </th>
					<th> Delete </th>
                </tr>
            </thead>
            <tbody>
				<?php foreach ($areas as $item) {
	?>
					<tr>
						<form name="UpdateAreaDelivery" id="UpdateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updatearea"; ?>>
							<td><input type="text" name="zipcode" id ="zipcode" value="<?php echo ($item['zipcode']) ?>"></td>
							<td><input type="text" name="price" id ="price" value="<?php echo ($item['price']) ?>"></td>
							<td><input  type="submit" name="update" id="update" value="Update"></td>
						</form>
						<form name="DeleteAreaDelivery" id="DeleteAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/deletearea"; ?>>
							<input type="hidden" name="zipcode" id ="zipcode" value="<?php echo ($item['zipcode']) ?>">
							<td><input  type="submit" name="update" id="update" value="Delete"></td>
						</form>
					</tr>
				<?php
}?>
				<tr>
					<form name="CreateAreaDelivery" id="CreateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createarea"; ?>>
						<td><input type="text" placeholder="Add new ZIP" name="zipcode" id ="zipcode" value=""></td>
						<td><input type="text" name="price" placeholder="Add delivery amount" id ="price" value=""></td>
						<td><input  type="submit" name="add" id="add" value="Add"></td>
					</form>
				</tr>
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




