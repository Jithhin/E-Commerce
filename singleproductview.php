    <?php
    ob_start();

require('homeheader.php');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
$product_id=$_GET['id']; 
$user_id=$_SESSION['user']['id'];   

$sql="select * from productstable where id=$product_id";
    $result=$conn->query($sql);
    $edit=$result->fetch_assoc();
  
$insertquery="INSERT INTO carttable(product_id,user_id,status) VALUES('$product_id','$user_id','0')";
$conn->query($insertquery);
  
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 align-top">
    <style>
        .align-top{
            margin-top: 100px;
        }
    </style>
    <?php
          if($_SESSION != null) {
          ?>
      <div class="row">
        
        <div class="col-md-6">
            <img src="./images/<?php echo $edit['image']?>" width="100%" height="auto" style="max-width: 300px;">
        </div>
        <div class="col-md-6" style="background-color:#DAFFFB; height: 200px;">
            <p><b>Product Name:</b><?php echo $edit['productname']?></p>
            <p><b>Description:</b><?php echo $edit['description']?></p>
            <p><b>Price: </b>$<?php echo $edit['price']?></p>
            <a href="cart.php" class="btn btn-warning" name="btn">Add to cart</a>
        </div>
    </div>
      <?php
          } else {
          
          header("Location:login.php");
          
          }
          ?>
    
</main>

       
<?php require('homefooter.php');
?>