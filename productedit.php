
<?php
require('header.php');
require('sidebar.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
$user_id=$_GET['id']; 

$sql="select * from productstable where id=$user_id";
    $result=$conn->query($sql);
    $edit=$result->fetch_assoc();

  
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Edit Details</h1>
        
      </div>

      <form action="" method="POST" enctype="multipart/form-data">
        <div>
            Product name:<input type="text" name="productname" class="form-control" value="<?php echo $edit['productname']?>">
        </div>


     <div>
     Category:<input type="text" class="form-control" name="category" value="<?php echo $edit['category']?>">
     
 

     </div>
     <div>
       Sub category: <input type="text" class="form-control" name="subcategory" value="<?php echo $edit['subcategory']?>">
     </div>
     <div>
     <div>
    Product Description: <input type="text" name="description" class="form-control" value="<?php echo $edit['description']?>">
</div>

        </div>
        <div class="col-6">
           choose the file to upload:<input type="file" class="form-control" name="image" >
           <img src="./images/<?php echo $edit['image']?>" width="30%" height="auto">
           </div>
           <div>
            Price:<input type="number" name="price" class="form-control" value="<?php echo $edit['price']?>">
        </div>
        <div>
            Quantity:<input type="number" name="quantity" class="form-control" value="<?php echo $edit['quantity']?>">
        </div>
        <div class="pt-20000">
          <input type="submit" name="update" class="btn btn-success" value="UPDATE">
           </div>


    </form>
      </div>
    </main>
  </div>
</div>
<?php

if(isset($_POST['update']))
{
    $productname= $_POST['productname'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $description = $_POST['description'];
    $price= $_POST['price'];
    $quantity = $_POST['quantity'];
    $filename=$_FILES['images']['name'];
if (!empty($filename)){
        move_uploaded_file($_FILES["image"]["tmp_name"], 'images/' . $filename);
        $update = "UPDATE productstable SET productname='$productname',category='$category',subcategory='$subcategory', description='$description',image='$filename',price='$price',quantity='$quantity' WHERE id='$user_id'";
    } else {
      $update = "UPDATE productstable SET productname='$productname',category='$category',subcategory='$subcategory', description='$description',price='$price',quantity='$quantity' WHERE id='$user_id'";
    }
   
    $conn->query($update);


}


?>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>













