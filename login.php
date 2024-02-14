<?php
ob_start();
require('homeheader.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $selectquery = "SELECT * from signuptable where username='$username' AND password='$password'";
  
    $result = $conn->query($selectquery);
    $row = $result->fetch_assoc();
    $_SESSION['user'] = $row;
  
    if ($_SESSION['user'] != null && $_SESSION['user']['usertype'] == 1) {
        header("Location: home.php");
        exit;
    } else {
        header("Location: ecommercedashboard.php");
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginpage</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#4CB9E7">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <center>Login Panel</center>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter your password">
                            </div>
                            <button type="submit" name="btn" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('homefooter.php')?>
</body>

</html>
