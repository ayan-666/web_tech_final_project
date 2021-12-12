<?php
session_start();
include("functions.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
	$user_name=$_POST['user_name'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	if(!empty($user_name)&&!empty($password)&&!is_numeric($user_name)&&!is_numeric($email)&&!empty($email)){
	$user_id=random_num(5);
	$sql="insert into users(user_id,user_name,email,password) values('$user_id','$user_name','$email','$password')";
	mysqli_query($con,$query);
	header("Location:login.php");
	die;
}else{
	echo "Enter valid e-mail or password";
}
}


?>

<DOCTYPE html>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<title></title>
	</head>
	<body>
		<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 mt-4 p-4">
			<h3 class="text-center text-info">Signup Form</h3><br>
			<form action="functions.php"method="post"enctype="multipart/form-data">
				<div class="form-group">
					<input type="text"name="user_name"class="form-control"placeholder="Username">
				</div>
				<div class="form-group">
					<input type="text"name="email"class="form-control"placeholder="Email">
				</div>
				<div class="form-group">
					<input type="password"name="password"class="form-control"placeholder="Password"><br>
					<div class="input-group-addon">
        				<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      				</div>
				</div>
				<a href="login.php" class="btn btn-success btn-block" role="button">Signup</a><br>
				<a href="login.php" class="btn btn-primary btn-block" role="button">login</a>
			</form>
		</div>
	</div>
</div>
</body>
</html>