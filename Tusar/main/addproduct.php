<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../signin.html");
    exit();

    }

    if($_POST['name'] != null && $_POST['amount'] != null ){
        $sql = "INSERT INTO product (proname,amount) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "')";
        if($conn->query($sql)){
            echo "<script>alert('Success added')</script>";
            header("Refresh:0 , url = ../productlist.php");
            exit();

        }
        else{
            echo "<script>alert('Add failed')</script>";
            header("Refresh:0 , url = ../productlist.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url = ../productlist.php");
        exit();

    }
    mysqli_close($conn);
?>