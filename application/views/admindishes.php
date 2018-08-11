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
                    <th>Name</th>
					<th>Type</th>
                    <th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th> Update </th>
					<th> Delete </th>
                </tr>
            </thead>
            <tbody>
				<tr>
					<form name="CreateAreaDelivery" id="CreateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createdish"; ?>>
						<th><input type="text" name="name" id ="name" value=""></th>
						<th>
							<select name="type" id="type">
								<?php foreach($sections as $section){ ?>
									<option name="<?php echo($section['name']);?>"><?php echo($section['name']);?></option>
								<?php
								}?>
							</select>
							</th>
						<th><input type="text" name="description" id ="description" value=""></th>
						<th><input type="text" name="price" id ="price" value=""></th>
						<th><input type="file" name="image"></th>
						<th><input  type="submit" name="add" id="add" value="Add"></th>
					</form>
				</tr>
				<?php foreach($dishes as $item){ 
				?>
					<tr>
						<form name="UpdateDish" id="UpdateDish" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updatedish"; ?>>
							<th><input type="text" name="name" id ="name" value="<?php echo($item['p_name'])?>"></th>
							<th><?php echo($item['p_type']);?></th>
							<input type="hidden" name="type" id="type" value="<?php echo($item['p_type']);?>">
							<th><input type="text" name="description" id ="description" value="<?php echo($item['p_desc'])?>"></th>
							<th><input type="text" name="price" id ="price" value="<?php echo($item['p_cost'])?>"></th>
							<th><img src="<?php echo base_url(); ?>assets/images/<?php echo($item['image']); ?>" height="50" width="50">
							<input type="file" name="image">
							</th>
							<th><input  type="submit" name="update" id="update" value="Update"></th>
						</form>
						<form name="DeleteAreaDelivery" id="DeleteAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/deletedish"; ?>>
							<input type="hidden" name="name" id ="name" value="<?php echo($item['p_name'])?>">
							<th><input  type="submit" name="update" id="update" value="Delete"></th>
						</form>
					</tr>
				<?php
				} ?>	
            </tbody>
        </table>
	</body>
</html>