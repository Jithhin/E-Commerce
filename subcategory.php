

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
        <h1 class="h2">Sub Category</h1>
        
      </div>
      <?php
    $addsub="select addsubcategory.*,category.id as cid,category.category as catname from addsubcategory JOIN category ON category.id=addsubcategory.category";
    $addsubcat=$conn->query($addsub);
      ?>

      
      <a href="addsubcategory.php" class="btn btn-primary">Add Sub Category</a>
    
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr> 
                    <th scope="col">Parent Category</th>
                    <th scope="col">Sub category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php while($row=$addsubcat->fetch_assoc()){
 
 ?>

  <tr>
  <td scope="row"><?php echo $row['catname']?></td>
    <td scope="row"><?php echo $row['subcategory']?></td>
    <td><a href="subcategoryedit.php?id=<?php echo $row['id']?>" class="btn btn-success" value="Edit" >Edit</a></td>
     <td><a href="subcategorydelete.php?id=<?php echo $row['id']?>" class="btn btn-danger" value="Delete" >Delete</a></td>

  </tr>
  <?php }?>

            </tbody>
        </table>

      </div>
    </main>
  </div>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>



