<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Management Orders</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	</head>
	<body>
		<h1>Management Orders</h1>
		<table id="data" border="1">
            <thead>
                <tr>
                    <th>Order Number</th>
					<th>Product id</th>
                    <th>Product name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Special Instruction</th>
                </tr>
            </thead>
            <tbody>
				<tr>
				<?php foreach($specification as $item){ 
				?>
					<tr>
						<th><?php echo($item['oid']);?></th>
						<th><?php echo($item['did']);?></th>
						<th><?php echo($item['dname'])?></th>
						<th><?php echo($item['quantity'])?></th>
						<th><?php echo($item['price'])?></th>
						<th><?php echo($item['spe_inst'])?></th>
					</tr>
				<?php
				} ?>
				<form name="Orders" id="Orders" method="POST" enctype="multipart/form-data" action=<?php echo site_url()."/admincontroller/readorders"; ?>>
							<th><input  type="submit" name="update" id="update" value="Orders"></th>
				</form>
            </tbody>
        </table>
	</body>
</html>