
<?php
require('header.php');
require('sidebar.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
$user_id=$_GET['id']; 

$sql="select * from addsubcategory where id=$user_id";
    $result=$conn->query($sql);
    $edit=$result->fetch_assoc();


if(isset($_POST['update']))
{

$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$update = "UPDATE addsubcategory SET category='$category',subcategory='$subcategory' WHERE id='$user_id'";
$conn->query($update);


}

?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Edit sub category Details</h1>
        
      </div>

      <form method="POST" enctype="multipart/form-data">
            <div class="col-6">
            Category:<input type="text" class="form-control" name="category" value="<?php echo $edit['category']?>">
           </div>
           <div class="col-6">
           sub category:<textarea name="subcategory" id="" cols="30" rows="5" class="form-control"><?php echo $edit['subcategory']?></textarea>
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



?>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>













