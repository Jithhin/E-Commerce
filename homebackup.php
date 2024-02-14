<?php
session_start();
require('homeheader.php');

if (!isset($_SESSION['user']) || $_SESSION['user'] !== true) {
    header("Location: login.php");
    exit;
}

// Establishing database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching product data
$selectquery = "SELECT * FROM productstable";
$selectqueryvariable = $conn->query($selectquery);

// Fetching category data
$selectcategory = "SELECT * FROM category";
$selectcategoryvariable = $conn->query($selectcategory);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<!-- Rest of your HTML code -->

<?php while ($row = $selectqueryvariable->fetch_assoc()) { ?>
    <!-- Product display code -->
<?php } ?>

<div class="container">
    <h3>All Categories</h3>
</div>

<?php while ($row = $selectcategoryvariable->fetch_assoc()) { ?>
    <div class="container">
        <div class="row">
            <!-- Category display code -->
        </div>
    </div>
<?php } ?>

<!-- Rest of your HTML code -->

<?php require('homefooter.php'); ?>
