<?php

include("connection.php");

function random_num($length){
	$text="";
	if($length<4){
		$length=4;
	}
	$len=rand(4,$length);

	for($i=0;$i<$len;$i++){
		$text.=rand(0,5);
	}
	return $text;
}

function check_login($con){
	if(isset ($_SESSION['user_id'])){
		$id=$_SESSION['user_id'];
		$sql="select * from users where user_id='$id'limit 1";
		$result=mysqli_query($con,$sql);
		if($result && mysqli_num_rows($result)>0){
			$user_data=mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	header("Location:login.php");
	die;
}

if(isset($_POST['pick'])){
	$order_id=random_num(5);
	$manufacturer=$_POST['manufacturer'];
	$product_name=$_POST['product_name'];
	$amount=$_POST['amount'];
	$schedule=$_POST['schedule'];
	$filled=99999999-$amount;
	$capacity=$filled-$amount;
	$request_type="pick";
	$inventory_type=$_POST['inventory_type'];

	$query="insert into cm_db(order_id,manufacturer,product_name,amount,schedule,capacity,request_type,inventory_type) values(?,?,?,?,?,?,?,?)";
	$statement=$con->prepare($query);
	$statement->bind_param("issisiss",$order_id,$manufacturer,$product_name,$amount,$schedule,$capacity,$request_type,$inventory_type);
	$statement->execute();
	header("Location:order_request.php");
	$_SESSION['response']="Successfully Inserted to database";
	$_SESSION['response_type']="success";
}


if(isset($_POST['store'])){
	$order_id=random_num(5);
	$manufacturer=$_POST['manufacturer'];
	$product_name=$_POST['product_name'];
	$amount=$_POST['amount'];
	$schedule=$_POST['schedule'];
	$capacity=$amount;
	$request_type="store";
	$inventory_type=$_POST['inventory_type'];

	$query="insert into cm_db(order_id,manufacturer,product_name,amount,schedule,capacity,request_type,inventory_type) values(?,?,?,?,?,?,?,?)";
	$statement=$con->prepare($query);
	$statement->bind_param("issisiss",$order_id,$manufacturer,$product_name,$amount,$schedule,$capacity,$request_type,$inventory_type);
	$statement->execute();
	header("Location:order_request.php");
	$_SESSION['response']="Successfully Inserted to database";
	$_SESSION['response_type']="success";
}

if(isset($_POST['add'])){
	$order_id=random_num(5);
	$manufacturer=$_POST['manufacturer'];
	$schedule=$_POST['schedule'];
	$request_type="QuotaAdded";
	$inventory_type=$_POST['inventory_type'];

	$query="insert into cm_db(order_id,manufacturer,schedule,request_type,inventory_type) values(?,?,?,?,?)";
	$statement=$con->prepare($query);
	$statement->bind_param("issss",$order_id,$manufacturer,$schedule,$request_type,$inventory_type);
	$statement->execute();
	header("Location:dashboard.php");
	$_SESSION['response']="Successfully Inserted to database";
	$_SESSION['response_type']="success";
}

if(isset($_POST['remove'])){
	$order_id=random_num(5);
	$manufacturer=$_POST['manufacturer'];
	$schedule=$_POST['schedule'];
	$request_type="QuotaRemoved";
	$inventory_type=$_POST['inventory_type'];

	$query="insert into cm_db(order_id,manufacturer,schedule,request_type,inventory_type) values(?,?,?,?,?)";
	$statement=$con->prepare($query);
	$statement->bind_param("issss",$order_id,$manufacturer,$schedule,$request_type,$inventory_type);
	$statement->execute();
	header("Location:dashboard.php");
	$_SESSION['response']="Successfully removed from database";
	$_SESSION['response_type']="Danger";
}

?>