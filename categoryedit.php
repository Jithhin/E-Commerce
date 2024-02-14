
<?php
require('header.php');
require('sidebar.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
$user_id=$_GET['id']; 

$sql="select * from category where id=$user_id";
    $result=$conn->query($sql);
    $edit=$result->fetch_assoc();


if(isset($_POST['update']))
{

$category=$_POST['category'];
$description=$_POST['description'];
$filename=$_FILES['images']['name'];
if (!empty($filename)) {
        move_uploaded_file($_FILES["images"]["tmp_name"], 'images/' . $filename);
        $update = "UPDATE category SET category='$category', description='$description',image='$filename' WHERE id='$user_id'";
    } else {
      $update = "UPDATE category SET category='$category', description='$description' WHERE id='$user_id'";
    }

$conn->query($update);


}

?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Edit Details</h1>
        
      </div>

      <form method="POST" enctype="multipart/form-data">
            <div class="col-6">
            Cateory:<input type="text" class="form-control" name="category" value="<?php echo $edit['category']?>">
           </div>
           <div class="col-6">
           Description:<textarea name="description" id="" cols="30" rows="5" class="form-control"><?php echo $edit['description']?></textarea>
           </div>

           <div class="row">
            <div class="col-6">
            choose the file to upload:<input type="file" class="form-control" name="images"> 

           <img src="./images/<?php echo $edit['image']?>" width="30%" height="auto">
           </div>
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













