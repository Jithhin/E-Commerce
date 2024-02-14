

<?php require('header.php');?>
<?php require('sidebar.php');?>
<?php
  ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";
$conn = new mysqli($servername, $username, $password, $dbname);

?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Products</h1>
     </div>
     <?php
    
    
    $selectquery="select * from category";
    $selectqueryvariable=$conn->query($selectquery);
    
      ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <div>
            Product name:<input type="text" name="productname" class="form-control">
        </div>


     <div>
     Category:<select name="category" class="form-control">
     <option value="select">-select one option-</option>
     <?php while($row=$selectqueryvariable->fetch_assoc()){
 
 ?>
        <option value="<?php echo $row['id']?>"><?php echo $row['category']?></option>
        
     <?php }?>
     </select>

     </div>
     <div>
       Sub category: <input type="text" class="form-control" name="subcategory">
     </div>
     <div>
            Product Description:<input type="text" name="productdescription" class="form-control">
        </div>
        <div class="col-6">
           choose the file to upload:<input type="file" class="form-control" name="image">
           </div>
           <div>
            Price:<input type="number" name="price" class="form-control">
        </div>
        <div>
            Quantity:<input type="number" name="quantity" class="form-control">
        </div>
       

     <div class="pt-20000">
           <input type="submit" class="btn btn-success" value="Add" name="btn">
           </div>
    </main>
  </div>
 
 

  <?php

if (isset($_POST['btn'])) {
    $productname=$_POST['productname'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $description = $_POST['productdescription'];
    $filename = $_FILES['image']['name'];
    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'. $filename);
    $price= $_POST['price'];
    $quantity = $_POST['quantity'];


   
    $insertquery="INSERT INTO productstable(productname,category,subcategory,description,image,price,quantity) VALUES('$productname','$category','$subcategory','$description','$filename','$price','$quantity')";
  
    $conn->query($insertquery);

   
}
// header("Location:registrationstudent.php");
?>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>




