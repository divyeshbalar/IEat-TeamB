
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


						<h2>Sections</h2>
						<div class="backwhite" style="padding: 15px;">

									<table id="data" border="1">
            <thead>
                <tr>
                    <th>Tax</th>
                    <th>Rate</th>
					<th>Update</th>
                </tr>
            </thead>
            <tbody>
				<tr>
					<form name="Tax" id="Tax" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updatetax"; ?>>
						<td>GST</td>
							<td><input type="text" name="gst" id ="gst" value="<?php echo ($gst); ?>"></td>
							<input type="hidden" name="type" id="type" value="gst">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="Tax" id="Tax" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updatetax"; ?>>
						<td>QST</td>
							<td><input type="text" name="qst" id ="qst" value="<?php echo ($qst); ?>"></td>
							<input type="hidden" name="type" id="type" value="qst">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
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