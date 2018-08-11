<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
	</head>
	<body>
		<h1>Management Delivery Areas</h1>
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
				<?php foreach($areas as $item){ 
				?>
					<tr>
						<form name="UpdateAreaDelivery" id="UpdateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updatearea"; ?>>
							<th><input type="text" name="zipcode" id ="zipcode" value="<?php echo($item['zipcode'])?>"></th>
							<th><input type="text" name="price" id ="price" value="<?php echo($item['price'])?>"></th>
							<th><input  type="submit" name="update" id="update" value="Update"></th>
						</form>
						<form name="DeleteAreaDelivery" id="DeleteAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/deletearea"; ?>>
							<input type="hidden" name="zipcode" id ="zipcode" value="<?php echo($item['zipcode'])?>">
							<th><input  type="submit" name="update" id="update" value="Delete"></th>
						</form>
					</tr>
				<?php
				} ?>	
				<tr>
					<form name="CreateAreaDelivery" id="CreateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createarea"; ?>>
						<th><input type="text" name="zipcode" id ="zipcode" value=""></th>
						<th><input type="text" name="price" id ="price" value=""></th>
						<th><input  type="submit" name="add" id="add" value="Add"></th>
					</form>
				</tr>
            </tbody>
        </table>
	</body>
</html>