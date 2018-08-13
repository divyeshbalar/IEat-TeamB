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


						<h2>Menu Management</h2>
						<div class="backwhite" style="padding: 15px;">
								<table id="data" border="1">
						            <thead>
						                <tr>
						                    <th>Dish Name</th>
											<th>Section</th>
						                    <th colspan="1">Description</th>
											<th>Price</th>
											<th colspan="1">Image</th>
											<th> Update </th>
											<th> Delete </th>
						                </tr>
						            </thead>
						            <tbody>
										<tr>
											<form name="CreateAreaDelivery" id="CreateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createdish"; ?>>
												<th><input type="text" placeholder="Enter new dish name" name="name" id ="name" value=""></th>
												<th>
													<select name="type" id="type">
														<?php foreach ($sections as $section) {?>
															<option name="<?php echo ($section['name']); ?>" value="<?php echo ($section['name']); ?>"><?php echo ($section['name']); ?></option>
														<?php
}?>
													</select>
													</th>
												<th colspan="1"><textarea placeholder="Enter description of dish" type="text" cols="30" name="description" id ="description" value=""></textarea></th>
												<th><input type="text" placeholder="Enter price" name="price" id ="price" value=""></th>
												<th colspan="1"><input type="file" name="image"></th>
												<th><input  type="submit" name="add" id="add" value="Add"></th>
											</form>
										</tr>
										<?php
foreach ($dishes as $item) {
	?>

											<tr>
												<form name="UpdateDish" id="UpdateDish" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateDish"; ?>>

													<td>
														<input type="text" name="name" id ="name" value="<?php echo ($item['p_name']) ?>">
													</td>
													<td>
														<?php echo $item['p_type']; ?><input type="hidden" name="dtype" id="dtype" value="<?php echo $item['p_type']; ?>">
													</td>

													<td colspan="1">
														<textarea cols="30" type="text" name="description" id ="description"><?php echo ($item['p_desc']) ?></textarea>
													</td>
													<td>
														<input type="text" name="price" id ="price" value="<?php echo ($item['p_cost']) ?>">
													</td>
													<th colspan="1">
														<img src="<?php echo base_url(); ?>assets/images/pizzadb/<?php echo ($item['image']); ?>" height="50" width="50">
														<input type="file" name="image">
													</td>
													<td>
														<input  type="submit" name="update" id="update" value="Update"></td>
												</form>
												<form name="DeleteDish" id="DeleteDish" method="POST" enctype="multipart/form-data" action="<?php echo site_url() . '/admincontroller/deleteDish'; ?>" >
													<input type="hidden" name="name" id ="name" value="<?php echo ($item['p_name']) ?>">
													<input type="hidden" name="type" id ="type" value="<?php echo ($item['p_type']) ?>">
													<td><input  type="submit" name="delete" id="delete" value="Delete"></td>
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
