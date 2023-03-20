<?php
    $connect=mysqli_connect("localhost","root","","OTBS");
    if (isset($_POST["reset"])) {
        $email=mysqli_real_escape_string($connect,$_POST["email"]);
        $new_password=mysqli_real_escape_string($connect,$_POST["password"]);
        $password=md5($new_password);
        if ($email!=="") {
            $verify_email="SELECT * FROM farmers WHERE email='$email'";
            $verified=mysqli_query($connect,$verify_email);
            $name_found=mysqli_fetch_assoc($verified);
            $name=$name_found["fname"];
            $update="UPDATE farmers SET password='$password' WHERE email='$email'";
            $update_execute=mysqli_query($connect,$update);
            if ($update) {
                header("location: farmer_login.php?ms=$name,You can now log in with your new password");
            }
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Login</title>
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
<h1 class="text-center text-dark">Reset password</h1>
<form action="" class=" container" method="post">
    <h5 class="text-center">Password reset</h5>
   <center> 
    <label for="" class="form-group">Email</label>
           <input type="email" name="email" id="email" class="form-control bg-transparent text-light text-center" >
           <label for="" class="form-group">New password</label>
           <input type="password" name="password" id="password" class="form-control bg-transparent text-light text-center" >
           <label for="" class="form-group">Confirm your password</label>
           <input type="password" name="password" id="cpassword" class="form-control bg-transparent text-light text-center" ><br/>
    <button type="submit" class="btn btn-light text-dark" id="reset" name="reset">Reset password</button>
    <p class="text-center">Click<a href="farmer_login.php" class="text-light"> here </a> to log in instead </p>
</center>
<center><?php echo "Date: ".date("d/m/Y");?></center>
</form>    
    </div>
    <script>
        $(document).ready(function(){
            $("#reset").click(function(){
                var email=$("#email").val();
                var password=$("#password").val();
                var cpassword=$("#cpassword").val();
                if (email=="") {
                    alert("You must enter your email");
                }else{
                    if (password=="") {
                    alert("Your must enter your new password");
                }else{
                    if (password=="") {
                        alert("You must confirm your password");
                    }else{
                        if (password!==cpassword) {
                            alert("The passwords you enter did not match");
                        }
                    }
                }
                }
            });
        });
    </script>
</body>
</html>
