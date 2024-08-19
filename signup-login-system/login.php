<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
include 'partials/_dbconnect.php';
$password = $_POST["password"];
$email = $_POST["email"];



// $sql = "Select * from users where email='$email' AND password='$password'";
  $sql = "Select * from users where email='$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
  while($row=mysqli_fetch_assoc($result)){
    if (password_verify($password, $row['password'])){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      header("location: welcome.php");
    } else{
      $showError = "Invalid email or password!";
    }
    
  }

}

else{
  $showError = "Invalid email or password!";
}

}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($login){
    echo ' <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>You are logged in</p>
  <hr>

</div> ';
}

if($showError){
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
<storng>Error!</storng> '. $showError.'
<button type="button" class="close" data-dismiss="alert" aria-lebel="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> ';
}
?>
    <div class="container ">
        <h1 class="text-center" >Login to our Website</h1>
        <form action="/loginsystem/login.php" method="post">
  <div class="form-group col-md-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name = "email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">Make sure to enter your registered email</small>
  </div>
  <div class="form-group col-md-3 mb-2">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
   
  </div>

  <button type="submit" class="btn btn-primary ">Login</button>
  

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

