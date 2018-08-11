<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Management Open Hours</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	</head>
	<body>
		<h1>Management Open Hours</h1>
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
						foreach($sunday as $item){ ?>
							<th><input type="text" name="<?php echo(array_keys($sunday)[$i]); ?>" id ="<?php echo(array_keys($sunday)[$i]); ?>" value="<?php echo($item);?>"></th>
						<?php
							$i++;
						}
						?>
						<input type="hidden" name="day" id="day" value="sunday">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Monday</th>
						<?php
						$i=0;
						foreach($monday as $item){ ?>
							<th><input type="text" name="<?php echo(array_keys($monday)[$i])?>" id ="<?php echo(array_keys($monday)[$i])?>" value="<?php echo $item?>"></th>								
						<?php
							$i++;
						}
						?>
						<input type="hidden" name="day" id="day" value="monday">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Tuesday</th>
						<?php
						$i=0;
						foreach($tuesday as $item){ ?>
							<th><input type="text" name="<?php echo(array_keys($tuesday)[$i])?>" id ="<?php echo(array_keys($tuesday)[$i])?>" value="<?php echo $item?>"></th>
							
						<?php
							$i++;
						}
						?>
						<input type="hidden" name="day" id="day" value="tuesday">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Wednesday</th>
						<?php
						$i=0;
						foreach($wednesday as $item){ ?>
							<th><input type="text" name="<?php echo(array_keys($wednesday)[$i])?>" id ="<?php echo(array_keys($wednesday)[$i])?>" value="<?php echo $item?>"></th>
							
						<?php
							$i++;
						}
						?>
						<input type="hidden" name="day" id="day" value="wednesday">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Thursday</th>
						<?php
						$i=0;
						foreach($thursday as $item){ ?>
							<th><input type="text" name="<?php echo(array_keys($thursday)[$i])?>" id ="<?php echo(array_keys($thursday)[$i])?>" value="<?php echo $item?>"></th>
							
						<?php
							$i++;
						}
						?>
						<input type="hidden" name="day" id="day" value="thursday">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Friday</th>
						<?php
						$i=0;
						foreach($friday as $item){ ?>
							<th><input type="text" name="<?php echo(array_keys($friday)[$i])?>" id ="<?php echo(array_keys($friday)[$i])?>" value="<?php echo $item?>"></th>
							
						<?php
							$i++;
						}
						?>
						<input type="hidden" name="day" id="day" value="friday">
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
				<tr>
					<form name="OpenHour" id="OpenHour" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateopen"; ?>>
						<th>Saturday</th>
						<?php
						$i=0;
						foreach($saturday as $item){ ?>
							<th><input type="text" name="<?php echo(array_keys($saturday)[$i])?>" id ="<?php echo(array_keys($saturday)[$i])?>" value="<?php echo $item?>"></th>
							<input type="hidden" name="day" id="day" value="saturday">
						<?php
							$i++;
						}
						?>
						<tr><td><input  type="submit" name="update" id="update" value="Update"></td></tr>
					</form>
				</tr>
            </tbody>
        </table>
	</body>
</html>