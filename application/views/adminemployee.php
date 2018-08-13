<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['adminuname'])) {
	$flag = true;
	$authorization = $_SESSION['authorization'];
} else {
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


						<h2>Manage Users</h2>
						<div class="backwhite" style="padding: 15px;">
							<table id="data" border="1">
					            <thead>
					                <tr>
					                    <th>User Name</th>
					                    <th>Password</th>
										<th>Name</th>
										<th>Authorization Level</th>
										<th>Update</th>
										<th>Delete</th>
					                </tr>
					            </thead>
					            <tbody>

									<?php
foreach ($employees as $key => $item) {
	?>
										<tr>
											<form name="UpdateEmployee" id="UpdateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateemployee"; ?>>
												<th><?php echo ($item->custid); ?></th>
												<th><input type="password" name="password" id ="password" value="<?php echo $item->passwd; ?>"></th>
												<th><input type="text" name="name" id ="name" value="<?php echo $item->custname; ?>"></th>
												<th>
													<select name="authorization" id="type">
															<option value="A" <?php if ($item->level == 'A') {echo (' selected ');}?>>Admin</option>
															<option value="S" <?php if ($item->level == 'S') {echo (' selected ');}?>>Sub-admin</option>
															<option value="E" <?php if ($item->level == 'E') {echo (' selected ');}?>>Employee</option>
													</select>
												</th>
												<input type="hidden" name="userid" id ="userid" value="<?php echo $item->custid; ?>">
												<th><input  type="submit" name="update" id="update" value="Update" <?php if ($authorization != 'A') {echo ('disabled');}?>></th>
											</form>
											<form name="DeleteAreaDelivery" id="DeleteAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/deleteemployee"; ?>>
												<input type="hidden" name="userid" id ="userid" value="<?php echo ($item->custid) ?>">
												<th><input  type="submit" name="update" id="update" value="Delete" <?php if ($authorization != 'A') {echo ('disabled');}?>></th>
											</form>
										</tr>
									<?php
}?>
									<tr>
										<form name="CreateAreaDelivery" id="CreateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createemployee"; ?>>
											<th><input type="text" placeholder="Add new user" name="userid" id ="userid" value=""></th>
											<th><input type="password" placeholder="Enter password" name="password" id ="password" value=""></th>
											<th><input type="text" name="name" id ="name" placeholder="Enter Name" value=""></th>
											<th> <select name="authorization" id="type">
															<option value="A">Admin</option>
															<option value="S">Sub-admin</option>
															<option value="E">Employee</option>
													</select>
												</th>
											<th><input  type="submit" name="add" id="add" value="Add" <?php if ($authorization != 'A') {echo ('disabled');}?>"></th>
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
