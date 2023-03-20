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
<h1 class="text-center text-dark">Official Login Form</h1>
<form action="" class=" container">
    <h5 class="text-center">Enter your details to here to log in</h5>
   <center> <table>
        <tr>
            <td> <label for="" class="form-group">Username</label>
            <input type="text" name="username" id="username" class="form-control bg-transparent text-light"></td>
        </tr>
        <tr>
            <td> <label for="" class="form-group">Password</label>
           <input type="password" name="password" id="password" class="form-control bg-transparent text-light" ></td>
        </tr>
        <tr>
            <td> <p class="text-center">Forgot password? click <a href="reset_password.php" class="text-light"> here </a> to reset your passord</p></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-light text-dark" id="login">Login</button>
</center>
<center><?php echo "Date: ".date("d/m/Y");?></center>
</form>    
    </div>
    <script>
        $(document).ready(function(){
            $("#login").click(function(){
                var username=$("#username").val();
                var password=$("#password").val();
                if (username=="") {
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
