<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ecommercewebsite";
$conn=new mysqli($servername,$username,$password,$dbname);
$product_id=$_GET['id'];  
$delete="delete from carttable where product_id='$product_id'";
$deletequery=$conn->query($delete);
header("Refresh:0");

?>