<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
include 'partials/_dbconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];

$existSql = "SELECT * FROM `users` WHERE username = '$username'";
$result = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($result);
if($numExistRows > 0){
  $showError = "Username Already Exists";
} else{
if(($password == $cpassword)){
  $hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO `users` (`username`, `password`, `dt`, `email`) VALUES ('$username', '$hash', current_timestamp(), '$email')";
$result = mysqli_query($conn, $sql);
if ($result) {
  $showAlert = true;
}
}
else{
  $showError = "Passwords did not match!";
}
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>You successfully created your account! </p>
  <hr>

</div> ';
}

if($showError){
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
<storng>Error!</storng> '. $showError.'
<button type="button" class="btn-close" data-dismiss="alert" aria-lebel="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> ';
}
?>
    <div class="container ">
        <h1 class="text-center" >Signup to our Website</h1>
        <form action="/loginsystem/signup.php" method="post">
  <div class="form-group col-md-6">
    <label for="username">Username</label>
    <input type="text" maxlength="15" class="form-control mb-2" id="username" name="username" aria-describedby="emailHelp"> 
  </div>
  <div class="form-group col-md-6">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" maxlength="25" class="form-control" id="exampleInputEmail1" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" maxlength="20" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group col-md-6">
    <label for="cpassword">Confirm Password</label>
    <input type="password" maxlength="20" class="form-control" id="cpassword" name="cpassword"  placeholder="Confirm Password">
    <small id="emailHelp" class="form-text text-muted">Make sure to type same password</small>
  </div>
  <button type="submit" class="btn btn-primary col-md-6">Submit</button>
</form>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

