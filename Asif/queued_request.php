<?php

session_start();
//include("connection.php");
include("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Request</title>
</head>
<body>
	<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="dashboard.php">Navigation </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="order_request.php"> >Order Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="queued_request.php"> >Queued Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="appointment.php"> >Request Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php"> >Profile</a>
      </li>
    </ul>
  </div>  
</nav>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h2 class="text-center mt-4">Components will be updated soon...</h2><br>
			<hr>
		</div>
	</div>
</div>
</body>
</html>