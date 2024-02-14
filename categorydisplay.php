<?php
require('homeheader.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercewebsite";

$conn = new mysqli($servername, $username, $password, $dbname);

$user_id = $conn->real_escape_string($_GET['id']);



    
    $productSql = "SELECT * FROM productstable WHERE category = $user_id"; 
    $productResult = $conn->query($productSql);

    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 align-top">
        <style>
            .align-top {
                margin-top: 100px;
            }
        </style>    
        <div class="row">
            <!-- <div class="col-md-6">
                <img src="./images/<?php echo $category['image']?>" width="100%" height="auto" style="max-width: 300px;">
            </div> -->
        
        </div>

        <div class="row mt-4">
            <?php while ($product = $productResult->fetch_assoc()) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="./images/<?php echo $product['image']?>" class="card-img-top" alt="<?php echo $product['productname']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['productname']?></h5>
                            <p class="card-text"><?php echo $product['description']?></p>
                            <p class="card-text"><?php echo $product['price']?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php


require('homefooter.php');

?>
