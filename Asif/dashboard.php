<?php
session_start();
include("connection.php");
include("functions.php");
//$user_data=check_login($con);
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
	<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h2 class="text-center mt-4">Hello , User !</h2><br>
			<hr>
			<?php if(isset($_SESSION['response'])){ ?> <div class="alert alert-<?=$_SESSION['response_type'];?> alert-dismissible text-center fade show">?>
  <button type="button" class="close" data-dismiss="alert">&times;</button><?=$_SESSION['response'];?>
  </div>
  <?php } unset($_SESSION['response']); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 offset-md-1 p-4">
			<form action="functions.php"method="post"enctype="multipart/form-data">
				<div class="form-group">
					<input class="form-control mr-sm-2" type="text" placeholder="Search by ID"><br>
    				<button class="form-control mr-sm-2 btn btn-info" type="submit">Search</button><br><br>
					<a href="order_request.php" class="btn btn-primary btn-block" role="button">Order Request</a><br>
					<a href="appointment.php" class="btn btn-primary btn-block" role="button">Request Quota</a><br>
					<a href="queued_request.php" class="btn btn-primary btn-block" role="button">Queued Request</a><br>
					<a href="profile.php" class="btn btn-primary btn-block" role="button">Profile</a><br>
      			</div>
			</form>
		</div>
		<div class="col-md-8 offset-md-0">
			<?php $query="select * from cm_db";
			$statement=$con->prepare($query);
			$statement->execute();
			$result=$statement->get_result();?>
			<h3 class="text-center text-info">Recent Activity</h3><br>
			<table class="table table-hover">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Manufacturer</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Rrequest Type</th>
        <th>Inventory Type</th>
        <th>Schedule</th>
      </tr>
    </thead>
    <tbody>
    	<?php while($row=$result->fetch_assoc()){?>
      <tr>
        <td><?=$row['order_id'];?></td>
        <td><?=$row['manufacturer'];?></td>
        <td><?=$row['product_name'];?></td>
        <td><?=$row['amount'];?></td>
        <td><?=$row['request_type'];?></td>
        <td><?=$row['inventory_type'];?></td>
        <td><?=$row['schedule'];?></td>
      </tr>
  <?php }?>
    </tbody>
  </table>
		</div>
	</div>
</div>

</body>
</html>