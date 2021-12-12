<?php

    include 'auth/connection.php';
    $conn = connect();
    $m='';
    if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $uName= $_POST['uname'];
        $email= $_POST['email']?$_POST['email']:'';
        $pass= $_POST['pass'];
        $rPass= $_POST['r_pass'];
        if($pass===$rPass){
            $sq= "INSERT INTO users_info(name, u_name, email, password) VALUES('$name', '$uName', '$email', '$pass')";
            if($conn->query($sq)===true){
                header('Location: login.php');
            }
            else{
                $m='Connection not established!';
            }
        }
        else {
            $m= "Passwords don't match!";
        }
    }
?>

<html>
    <head>
        <title>Registration Form </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/index.css">
        <link type="text/css" rel="stylesheet" href="css/register.css">
        
    </head>
    <body>
        <form method="POST" action="register.php">
            <div class="container reg">
                
                <span><?php if($m!='') echo $m; ?></span>
                <h1 style="text-align: center"> Registration form</h1>
                <hr>
                <div style="text-align: center">
                    <label>Your Name<span>*</span></label>
                    <input name="name" id="name" type="text" placeholder="Enter Your Name"
                    onchange="checkName(this.value); checkName(this.value);" required>
                    <small id="checktext1"></small>
                    <small id="checkname"></small>
                </div><br>
                <div style="text-align: center">
                    <label>Your Userame<span>*</span></label>
                    <input name="uname" id="uname" type="text" placeholder="Enter Your Userame" onchange="checkUsername(this.value); checkUser(this.value);" required>
                    <small id="checktext"></small>
                    <small id="checkuser"></small>
                </div><br>
                <div style="text-align: center">
                    <label>Your Email</label>
                    <input name="email" id="email" type="text" placeholder="Enter Your Email" onchange="checkEmail(this.value); checkEmail(this.value);">
                    <small id="checktext2"></small>
                    <small id="checkemail"></small>
                </div><br>
                <div style="text-align: center">
                    <label>Password<span>*</span></label>
                    <input name="pass" id="pass" type="password" placeholder="Enter Your Password"  required>
                   
                </div><br>
                <div style="text-align: center">
                    <label>Repeat Password<span>*</span></label>
                    <input name="r_pass" id="rpass" type="password" placeholder="Confirm your password"  required>
                    
                </div><br>
                <div style="text-align: center">
                    <p><span>***</span>By creating an account you agree to our Terms & Conditions.</p>
                </div>
                <div style="text-align: center; padding: 20px;">
                    <input type="submit" class="btn btn-success" value="Submit" name="submit">
                </div>

                <div style="text-align: center">
                    <p>Already have an account? <a href="login.php">Sign in</a></p>
                </div>
            </div>
        </form>
    </body>
    <script type="text/javascript" src="js/script.js"></script>
</html>
<script>
    window.onload= function(){
          document.getElementsByClassName('reg')[0].style.color='#ffce00';
    };

</script>


