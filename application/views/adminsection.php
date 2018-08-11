<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Management Sections</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	</head>
	<body>
		<h1>Management Sections</h1>
		<table id="data" border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Prefix</th>
					<!--<th> Update </th>
					<th> Delete </th>-->
                </tr>
            </thead>
            <tbody>
				<?php foreach($sections as $item){ 
				?>
					<tr>
						<form name="UpdateSection" id="UpdateSection" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updatesection"; ?>>
							<th><input type="text" name="name" id ="name" value="<?php echo($item['name'])?>"></th>
							<th><input type="text" name="prefix" id ="prefix" value="<?php echo($item['prefix'])?>"></th>
							<!--<th><input  type="submit" name="update" id="update" value="Update"></th>-->
						</form>
						<!--<form name="DeleteAreaDelivery" id="DeleteAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/deletesection"; ?>>
							<input type="hidden" name="zipcode" id ="zipcode" value="<?php //echo($item['zipcode'])?>">
							<th><input  type="submit" name="update" id="update" value="Delete"></th>
						</form>-->
					</tr>
				<?php
				} ?>	
				<tr>
					<form name="CreateSection" id="CreateSection" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createsection"; ?>>
						<th><input type="text" name="name" id ="name" value=""></th>
						<th><input type="text" name="prefix" id ="prefix" value=""></th>
						<th><input  type="submit" name="add" id="add" value="Add"></th>
					</form>
				</tr>
            </tbody>
        </table>
	</body>
</html>