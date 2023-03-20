<?php
    require 'db_connect.php';
    if (isset($_POST["register"])) {
        $fname=mysqli_real_escape_string($connect,$_POST["fname"]);
        $phone=mysqli_real_escape_string($connect,$_POST["phone"]);
        $email=mysqli_real_escape_string($connect,$_POST["email"]);
        $idno=mysqli_real_escape_string($connect,$_POST["idno"]);
        $bank_name=mysqli_real_escape_string($connect,$_POST["bank_name"]);
        $accno=mysqli_real_escape_string($connect,$_POST["accno"]);
        $accname=mysqli_real_escape_string($connect,$_POST["accname"]);
        $search_user=mysqli_query($connect,"SELECT * FROM `farmers` where email='$email'");
        if (mysqli_num_rows($search_user)>0) {
            $message="<div class='alert alert-danger text-center'> A farmer with the details entered has already been registered into the system. Register another farmer</div>";
        }else {
            if (!empty($idno)) {
                $password=md5($idno);
                $insert="INSERT INTO farmers(fname, email, idno, bank_name, accno, accname,password) VALUES ('$fname','$email','$idno',
                    '$bank_name','$accno','$accname','$password')";
                $add_farmer=mysqli_query($connect,$insert);
                if ($add_farmer) {
                    $message="<div class='alert alert-success text-center'> Registration of " .$fname." has been done successfully</div>";
                }
            }else {
                $message="<div class='alert alert-danger text-center'>An error has occured when registering the farmer. Try agail later...</div>";
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
    <title>Farmer registration module</title>
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
<h1 class="text-center text-dark">Farmer registration form</h1>
<form action="" class=" container" method="post">
    <h5 class="text-center">Enter farmer's data to complete registration</h5>
    <?php
        if (isset($message)) {
            echo $message;
        }
    ?>
   <center> 
    <div class="form-group">
        <label for="" class="form-group">Full Name</label>
        <input type="text" name="fname" id="fname" class="form-control bg-transparent text-light text-center">
    </div>
            <label for="" class="form-group">Phone number</label>
           <input type="text" name="phone" id="phone" class="form-control bg-transparent text-light  text-center" >
            <label for="" class="form-group">Email address</label>
           <input type="email" name="email" id="email" class="form-control bg-transparent text-light  text-center" >
           <label for="" class="form-group">ID Number</label>
           <input type="number" name="idno" id="idno" class="form-control bg-transparent text-light  text-center" >
           <label for="" class="form-group">Bank name</label>
           <input type="text" name="bank_name" id="bank_name" class="form-control bg-transparent text-light  text-center" >
           <label for="" class="form-group">Account Number</label>
           <input type="text" name="accno" id="accno" class="form-control bg-transparent text-light  text-center" >
            <label for="" class="form-group">Account Name</label>
           <input type="text" name="accname" id="accname" class="form-control bg-transparent text-light  text-center" ><br>
        <button type="submit" class="btn btn-light text-dark" id="register" name="register">Save farmer details</button>
</center>
<center><?php echo "Date: ".date("d/m/Y");?></center>
</div>
</div>
</form>    
    </div>
    <script>
        $(document).ready(function(){
            $("#register").click(function(){
                var fname=$("#fname").val();
                var phone=$("#phone").val();
                var email=$("#email").val();
                var idno=$("#idno").val();
                var bank_name=$("#bank_name").val();
                var accno=$("#accno").val();
                var accname=$("#accname").val();
                if (fnsmr=="") {
                    alert("Your must enter your username");
                }else{
                    if (password=="") {
                        alert("You must provide your password");
                    }
                }
            });
        });
    </script>
  
</body>
</html>
