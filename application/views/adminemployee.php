<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['authorization'])){
	$authorization = $_SESSION['authorization'];
}else{
	$authorization = 'E';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Employee Management</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
		<meta name="author" content="GetTemplates.co" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	</head>
	<body>
		<h1>Employee Management</h1>
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
				<?php foreach($employees as $item){ 
				?>
					<tr>
						<form name="UpdateEmployee" id="UpdateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/updateemployee"; ?>>
							<th><?php echo($item['username']);?></th>
							<th><input type="password" name="password" id ="password" value="<?php echo($item['passwd'])?>"></th>
							<th><input type="text" name="name" id ="name" value="<?php echo($item['name'])?>"></th>
							<th> 
								<select name="authorization" id="type">
										<option value="A" <?php if($item['authorization']=='A'){echo(' selected ');}?>>Admin</option>
										<option value="S" <?php if($item['authorization']=='S'){echo(' selected ');}?>>Sub-admin</option>
										<option value="E" <?php if($item['authorization']=='E'){echo(' selected ');}?>>Employee</option>
								</select>
							</th>
							<input type="hidden" name="userid" id ="userid" value="<?php echo($item['username'])?>">
							<th><input  type="submit" name="update" id="update" value="Update" <?php if($authorization !='A'){ echo('disabled');}?>></th>
						</form>
						<form name="DeleteAreaDelivery" id="DeleteAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/deleteemployee"; ?>>
							<input type="hidden" name="userid" id ="userid" value="<?php echo($item['username'])?>">
							<th><input  type="submit" name="update" id="update" value="Delete" <?php if($authorization !='A'){ echo('disabled');}?>></th>
						</form>
					</tr>
				<?php
				} ?>	
				<tr>
					<form name="CreateAreaDelivery" id="CreateAreaDelivery" method="POST" enctype="multipart/form-data" action=<?php echo site_url() . "/admincontroller/createemployee"; ?>>
						<th><input type="text" name="userid" id ="userid" value=""></th>
						<th><input type="password" name="password" id ="password" value=""></th>
						<th><input type="text" name="name" id ="name" value=""></th>
						<th> <select name="authorization" id="type">
										<option value="A">Admin</option>
										<option value="S">Sub-admin</option>
										<option value="E">Employee</option>
								</select>
							</th>
						<th><input  type="submit" name="add" id="add" value="Add" <?php if($authorization !='A'){ echo('disabled');}?>"></th>
					</form>
				</tr>
            </tbody>
        </table>
	</body>
</html>