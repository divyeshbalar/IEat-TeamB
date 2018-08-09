<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Dishes</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	</head>
	<body>
		<form action="<?php echo site_url() . "/admincontroller"; ?>" method="post">
			<label for="activities">Type</label>
			<select name="type" id="type">
				<option value="pizza">pizza</option>
				<option value="poutine">poutine</option>
				<option value="calzon">calzon</option>
				<option value="eggplant">eggplant</option>
			</select>
			<label for="activities">Dish name</label>
			<input type="text" id="dishname" name="dishname" class="form-control">
			<br>
			<label for="activities">Cost</label>
			<input type="text" name="cost" id="cost" class="form-control">
			<br>
			<label for="activities">Description</label>
			<input type="text" name="description" id="description" class="form-control">
			<br>
			<input type="submit" class="btn btn-primary btn-block" value="Add">
		</form>
		<form action="<?php echo site_url() ."/admincontroller";?>" method="post">
			<input type="hidden" name="counts" id="counts" value = "counts">
			<input type="submit" class="btn btn-primary btn-block" value="count">
		</form>
		<div>
			<form action="<?php echo site_url() . "/loginadmin"; ?>" method="post">
				<input type="hidden" id ="function" name="function" value = "logout">
				<input type="submit" class="btn btn-primary btn-block" value="LoginOut">
			</form>
		</div>
	</body>
</html>