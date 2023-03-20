<?php
    require 'db_connect.php';
    if (isset($_POST["login"])) {
        $email=mysqli_real_escape_string($connect,$_POST["email"]);
        $password=mysqli_real_escape_string($connect,$_POST["password"]);
        $verify_email="SELECT * FROM farmers WHERE email='$email'";
        $verified=mysqli_query($connect,$verify_email);
        if (mysqli_num_rows($verified)>0) {
            $name_found_array=mysqli_fetch_assoc($verified);
            $name=$name_found_array["fname"];
            $message="<div class='alert alert-success text-center'>$name,now enter your password</div>'";
            $password=md5($password);
            $login="SELECT * FROM farmers WHERE email='$email' AND password='$password'";
            $authenticate_password=mysqli_query($connect,$login);
            if (mysqli_num_rows($authenticate_password)>0) {
                header("location: pasted.php");
            }else {
                $message="<div class='alert alert-success text-center'>$name,sorry we cannot log you in. Your password is incorrect</div>'";
            }
        }else {
            $message="<div class='alert alert-danger text-center'>User with the email not found</div>'";
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
   body {
        background-image: url("tea.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body class="container">
    <div class="container" id="main-content">
    <div class="card container mt-5 bg-transparent text-center"><h1>Online Tea Buying System</h1>
<h3 id="animated"><marquee><i> Determined to give excellent service<i></marquee></h3></div>
<h1 class="text-center text-dark">Farmers Login Form</h1>
<form action="" class=" container" method="post">
    <h5 class="text-center">Enter your details to here to log in</h5>
    <?php
            if (isset($message)) {
                echo $message;
            }
    ?>
    <?php
        if (isset($_GET['ms'])) {
            $notify=$_GET['ms'];
            $message="<div class='alert alert-success text-center'>$notify</div>'";
            echo $message;
        }


?>
   <center> <table>
        <tr>
            <td> <label for="" class="form-group">Email</label>
            <input type="text" name="email" id="email" class="form-control bg-transparent text-light"></td>
        </tr>
        <tr>
            <td> <label for="" class="form-group">Password</label>
           <input type="password" name="password" id="password" class="form-control bg-transparent text-light" ></td>
        </tr>
        <tr>
            <td> <p class="text-center">Forgot password? click <a href="reset_password.php" class="text-light"> here </a> to reset your passord</p></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-light text-dark" id="login" name="login">Login</button>
</center>
<center><?php echo "Date: ".date("d/m/Y");?></center>
</form>    
    </div>
    <script>
        $(document).ready(function(){
            $("#login").click(function(){
                var email=$("#email").val();
                var password=$("#password").val();
                if (email=="") {
                   // alert("Your must enter your email to be logged in");
                }else{
                    if (password=="") {
                       // alert("You must provide your password");
                    }
                }
            });
        });
    </script>
</body>
</html>
