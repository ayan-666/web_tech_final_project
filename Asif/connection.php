<?php

$host="localhost";
$user="root";
$password="";
$dbname="cm_db";

if(!$con=mysqli_connect($host,$user,$password,$dbname)){
	die("failed to connect");
}

?>