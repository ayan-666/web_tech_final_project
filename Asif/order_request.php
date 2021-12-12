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
			<h2 class="text-center mt-4">Order Request __________________________________________________________________________</h2><br>
			<hr>
			<?php if(isset($_SESSION['response'])){ ?> <div class="alert alert-<?=$_SESSION['response_type'];?> alert-dismissible text-center fade show">?>
  <button type="button" class="close" data-dismiss="alert">&times;</button><?=$_SESSION['response'];?>
  </div>
  <?php } unset($_SESSION['response']); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 offset-md-1">
			<h3 class="text-center text-info">Request Form</h3><br>
			<form action="functions.php"method="post"enctype="multipart/form-data">
				<div class="form-group">
					<input type="text"name="manufacturer"class="form-control"placeholder="Manufacturer">
				</div>
				<div class="form-group">
					<input type="text"name="product_name"class="form-control"placeholder="Product Name">
				</div>
				<div class="form-group">
					<input type="integer"name="amount"class="form-control"placeholder="Quantity">
				</div>
				<div class="container">
    				<div class="form-group">
    					<label for="select1">Inventory Type</label>
      					<select class="form-control" id="select1" name="inventory_type">
        				<option>Export</option>
        				<option>Import</option>
        				<option>Local</option>
       					<option>Export & Local</option>
   						</select>
   					</div>
      			</div>
      			<head>
 				   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
				</head>
    				<div class="container">
        				<div class="row justify-content-center">
            				<div class="col-md-2 offset-md-1">
                			</div>                    
            			</div>
                	<div class="form-group">                            
                		<label for="">Choose your preferred time</label>
                    	<input type="date" name="schedule" class="form-control" />
                    </div>
               		</div>
    			<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script><br>
      			<div class="form-group">
      				<input type="submit"name="pick"class="btn btn-primary btn-block"value="Pick Order"><br><br>
      				<input type="submit"name="store"class="btn btn-success btn-block"value="Store">
      			</div>
			</form>
		</div>
		<div class="col-md-8 offset-md-0">
			<?php $query="select * from cm_db";
			$statement=$con->prepare($query);
			$statement->execute();
			$result=$statement->get_result();?>
			<h3 class="text-center text-info">Your Orders</h3><br>
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
        <td>
        	<a href="details.php?details=<?=$row['order_id'];?>"class="badge badge-primary p-2">Details</a>
        </td>
      </tr>
  <?php }?>
    </tbody>
  </table>
		</div>
	</div>
</div>

</body>
</html>