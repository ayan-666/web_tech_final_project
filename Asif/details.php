<?php

session_start();
include("functions.php");

if (isset($_GET['details'])) {
	$order_id=$_GET['details'];
	$query="select * from cm_db where order_id=?";
	$statement=$con->prepare($query);
	$statement->bind_param("i",$order_id);
	$statement->execute();
	$result=$statement->get_result();
	$row=$result->fetch_assoc();

	$dt_oid=$row['order_id'];
	$dt_manufacturer=$row['manufacturer'];
	$dt_product_name=$row['product_name'];
	$dt_amount=$row['amount'];
	$dt_schedule=$row['schedule'];
	$dt_request_type=$row['request_type'];
	$dt_inventory_type=$row['inventory_type'];
}


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
  <a class="navbar-brand" href="#">Navigation </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"> >Order Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> >Check Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> >Queued Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> >Request Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> >Profile</a>
      </li>
    </ul>
  </div>  
</nav>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 offset-md-1 mt-4 p-4">
			<h1 class="bg-basic text-center text-dark">#<?=$dt_oid;?></h1><br>
			<hr><br>
			<h4 class="text-dark">Manufacturer : <?=$dt_manufacturer;?></h4>
			<h4 class="text-dark">Product Name : <?=$dt_product_name;?></h4>
			<h4 class="text-dark">Amount : <?=$dt_amount;?></h4>
			<h4 class="text-dark">Scheduled on : <?=$dt_schedule;?></h4>
			<h4 class="text-dark">Request Type : <?=$dt_request_type;?></h4>
			<h4 class="text-dark">Inventory Type : <?=$dt_inventory_type;?></h4><br><br>

			<a href="dashboard.php" class="btn btn-info btn-block" role="button">Go Back</a>
		</div>
	</div>
</div>
</body>
</html>