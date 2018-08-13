
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


						<h2>Weekly Schedule</h2><h5>(Please, Enter time in 24hr format) </h5>
						<div class="backwhite" style="padding: 15px;">

<table id="data" border="1">
            <thead>
                <tr>
                    <th>day</th>
                    <th>Starts form</th>
                    <th>Ends at</th>
					<th>Update</th>
                </tr>
            </thead>
            <tbody>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Sunday</th>
						<?php
$i = 0;
foreach ($sunday as $item) {
	?>
							<th><input type="text" name="<?php echo (array_keys($sunday)[$i]); ?>" id ="<?php echo (array_keys($sunday)[$i]); ?>" value="<?php echo ($item); ?>"></th>
						<?php
$i++;
}
?>
						<input type="hidden" name="day" id="day" value="sunday">
						<td><input  type="submit" name="update" id="update" value="Update"></td>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Monday</th>
						<?php
$i = 0;
foreach ($monday as $item) {
	?>
							<th><input type="text" name="<?php echo (array_keys($monday)[$i]) ?>" id ="<?php echo (array_keys($monday)[$i]) ?>" value="<?php echo $item ?>"></th>
						<?php
$i++;
}
?>
						<input type="hidden" name="day" id="day" value="monday">
						<td><input  type="submit" name="update" id="update" value="Update"></td>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Tuesday</th>
						<?php
$i = 0;
foreach ($tuesday as $item) {
	?>
							<th><input type="text" name="<?php echo (array_keys($tuesday)[$i]) ?>" id ="<?php echo (array_keys($tuesday)[$i]) ?>" value="<?php echo $item ?>"></th>

						<?php
$i++;
}
?>
						<input type="hidden" name="day" id="day" value="tuesday">
						<td><input  type="submit" name="update" id="update" value="Update"></td>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Wednesday</th>
						<?php
$i = 0;
foreach ($wednesday as $item) {
	?>
							<th><input type="text" name="<?php echo (array_keys($wednesday)[$i]) ?>" id ="<?php echo (array_keys($wednesday)[$i]) ?>" value="<?php echo $item ?>"></th>

						<?php
$i++;
}
?>
						<input type="hidden" name="day" id="day" value="wednesday">
						<td><input  type="submit" name="update" id="update" value="Update"></td>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Thursday</th>
						<?php
$i = 0;
foreach ($thursday as $item) {
	?>
							<th><input type="text" name="<?php echo (array_keys($thursday)[$i]) ?>" id ="<?php echo (array_keys($thursday)[$i]) ?>" value="<?php echo $item ?>"></th>

						<?php
$i++;
}
?>
						<input type="hidden" name="day" id="day" value="thursday">
						<td><input  type="submit" name="update" id="update" value="Update"></td>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Friday</th>
						<?php
$i = 0;
foreach ($friday as $item) {
	?>
							<th><input type="text" name="<?php echo (array_keys($friday)[$i]) ?>" id ="<?php echo (array_keys($friday)[$i]) ?>" value="<?php echo $item ?>"></th>

						<?php
$i++;
}
?>
						<input type="hidden" name="day" id="day" value="friday">
						<td><input  type="submit" name="update" id="update" value="Update"></td>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Saturday</th>
						<?php
$i = 0;
foreach ($saturday as $item) {
	?>
							<th><input type="text" name="<?php echo (array_keys($saturday)[$i]) ?>" id ="<?php echo (array_keys($saturday)[$i]) ?>" value="<?php echo $item ?>"></th>
							<input type="hidden" name="day" id="day" value="saturday">
						<?php
$i++;
}
?>
						<td><input  type="submit" name="update" id="update" value="Update"></td>
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
