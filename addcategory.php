
<?php
require('header.php');
require('sidebar.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['btn'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];
    $filename = $_FILES['image']['name'];
    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/' . $filename);

    $query = "INSERT INTO category (category, description, image) VALUES ('$category', '$description', '$filename')";
    $conn->query($query);
   
}
?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Category</h1>
        
      </div>

      <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-6">
           Category:<input type="text" class="form-control" name="category">
           </div>
           <div class="col-6">
           Description:<textarea  id="" cols="30" rows="5" class="form-control" name="description"></textarea>
           </div>

           <div class="row">
            <div class="col-6">
           choose the file to upload:<input type="file" class="form-control" name="image">
           </div>
           </div>
           <div class="pt-20000">
           <input type="submit" class="btn btn-success" value="Submit" name="btn">
           </div>


    </form>


      </div>
    </main>
  </div>
</div>
<?php



?>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>













