<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ecommercewebsite";
$conn=new mysqli($servername,$username,$password,$dbname);
$user_id=$_GET['id'];  
$delete="delete from category where id='$user_id'";
$deletequery=$conn->query($delete);
header("Location:category.php");


?>