<?php require('header.php');?>
<?php require('sidebar.php');?>

<?php 
  ob_start();
      
      $servername="localhost";
      $username="root";
      $password="";
      $dbname="ecommercewebsite";
      $conn=new mysqli($servername,$username,$password,$dbname);
      $user_id=$_GET['id']; 
    
    

    $sql="select * from ecommerce where id=$user_id";
    $result=$conn->query($sql);
    $edit=$result->fetch_assoc();
    ?>
   

<link rel="stylesheet" href="./css/bootstrap.css">
<div class="container">
    <h1>Edit Details</h1>
    <form method="POST" enctype="multipart/form-data">
            <div class="col-2">

           Cateory:<input type="text" class="form-control" name="category" value="<?php echo $edit['category']?>">
           </div>
      
           <div class="col-2">
           Description:<textarea name="description" id="" cols="30" rows="5" class="form-control"><?php echo $edit['description']?></textarea>
           </div>
          
           <div class="row">
            <div class="col-6">
           choose the file to upload:<input type="file" class="form-control" name="images"> 

           <img src="./images/<?php echo $edit['image']?>" width="30%" height="auto">  
           </div>   
           </div>

           <div>
           <input type="submit" name="update" class="btn btn-success" value="UPDATE">
           </div>

           <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.js"></script>

    <?php

if(isset($_POST['update']))
{

$category=$_POST['category'];
$description=$_POST['description'];
$filename=$_FILES['images']['name'];
if (!empty($filename)) {
        move_uploaded_file($_FILES["images"]["tmp_name"], 'images/' . $filename);
        $update = "UPDATE ecommerce SET category='$category', description='$description',image='$filename' WHERE id='$user_id'";
    } else {
      $update = "UPDATE ecommerce SET category='$category', description='$description' WHERE id='$user_id'";
    }

$conn->query($update);


}



?>



    




