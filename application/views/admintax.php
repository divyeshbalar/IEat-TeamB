<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Taxes Management</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	</head>
	<body>
		<h1>Tax Management</h1>
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
						<th>GST</th>
							<th><input type="text" name="gst" id ="gst" value="<?php echo($gst);?>"></th>
							<input type="hidden" name="type" id="type" value="gst">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="Tax" id="Tax" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updatetax"; ?>>
						<th>QST</th>
							<th><input type="text" name="qst" id ="qst" value="<?php echo($qst);?>"></th>
							<input type="hidden" name="type" id="type" value="qst">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
            </tbody>
        </table>
	</body>
</html>