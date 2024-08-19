<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}

$email = $_SESSION['email'];
$emailParts = explode('@', $email);
$username = ucfirst($emailParts[0]);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $username; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <div class="container my-3">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome - <?php echo $username; ?></h4>
        <p>Hey how are you doing? Welcome to iSecure, You are now logged in as <?php echo $username; ?></p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php"> using this link.</a></p>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
