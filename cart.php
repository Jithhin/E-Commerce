<?php require('homeheader.php')?>
<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
?>

<div class="container">
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <!-- selecting the products from the products table and from the carttable so that here the join is used -->
                            <div class="row">
                                <?php
                                $addsub = "SELECT productstable.*, carttable.product_id AS pid FROM carttable JOIN productstable ON carttable.product_id=productstable.id where status='0'";
                                $addsubcat = $conn->query($addsub);
                                
                                // Check if cart is empty
                                if ($addsubcat->num_rows === 0) {
                                    echo '<img src="./images/panther.jpg" alt="Cat Image" width="200px" height="800px">';
                                } else {
                                    while ($row = $addsubcat->fetch_assoc()) {
                                     
                                ?>
                                        <div class="container">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="./images/<?php echo $row['image'] ?>" width="100px" height="100px">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5><?php echo $row['productname'] ?></h5>
                                                                <p class="small mb-0"><?php echo $row['description'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0">2</h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0"><?php echo $row['price'] ?></h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <a href="itemdelete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" value="Delete">Delete</a>
                                                            </div>
                                                            <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                
                                ?>

                            </div>

                            <div class="container">
    <section class="h-100 h-custom" style="background-color: #eee;">
        
        <div class="col-lg-5">
            <div class="container">
                <form method="post">
                <p>Total amount will be: </p>
                
                    <button type="submit" class="btn btn-warning" name="btn">Pay Now</button>
                    
                </form>
                <?php
                if (isset($_POST['btn'])) {
                    if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['id'];
                        $ordersselect = "SELECT * FROM carttable WHERE user_id = $user_id";
                        $resultorder = $conn->query($ordersselect);

                        while ($edit = $resultorder->fetch_assoc()) {
                            $product_id = $edit['product_id'];
                            $insertqueryorder = "INSERT INTO orders(product_id, user_id) VALUES ('$product_id','$user_id')";
                            $conn->query($insertqueryorder);
                            

                        }
                        

                        
                        echo "Orders placed successfully!";
                    } else {
                        echo "Please log in to place an order.";
                    }
                    $updateStatusQuery = "UPDATE carttable SET status = 1 WHERE user_id = $user_id ";

                    $conn->query($updateStatusQuery);
                   
                }
                var_dump($row);
                ?>
                
                <p></p>



                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php require('homefooter.php')?>
