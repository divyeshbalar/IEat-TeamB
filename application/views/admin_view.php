<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
if (isset($_SESSION['admin'])) {
	$flagadmin = true;
} else {
	
	//unset($_SESSION['uname']);
	$flagadmin = false;
}

?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>login Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	</head>
	<body>
		<?php
		if ($flagadmin == false){?>
			<form action="<?php echo site_url() . "/loginadmin"; ?>" method="post">
				<label for="activities">Username</label>
				<input type="text" id="uname" name="uname" class="form-control">
				<br>
				<label for="activities">Password</label>
				<input type="password" name="pass" id="pass" class="form-control">
				<br>
				<input type="submit" class="btn btn-primary btn-block" value="Login">
				<input type="hidden" id ="function" name="function" value = "login">
			</form>
		<?php }?>
	</body>
</html>