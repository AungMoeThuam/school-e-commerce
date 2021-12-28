<?php
include ".././models/autoload.php";

use controllers\ProductController;

$productController = new ProductController();
$product = $productController->getProductById($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "./navbar.php" ?>
    <div class="container justify-content-center">
        <div class=" mt-4 border border-2 row ">
            <div class="col-6 border-end d-flex py-3 justify-content-center align-items-center">

                <img class=" img-fluid" src="../assets/<?php echo $product["photo"] ?>" alt="">
            </div>
            <div class="col-4 py-3 px-4">
                <div class="mb-2">
                    <h3><?php echo $product["name"] ?></h3>
                    <span><i class="fas fa-star"></i> 4</span>
                </div>
                <div>
                    <p><?php echo $product["description"] ?></p>
                </div>
                <div class="row p-1 align-items-center justify-content-start">
                    <p class="col-4 ">Quantity</p>
                    <button class="col-2 btn btn-warning">
                        <i class="fas fa-plus"></i>
                    </button>
                    <h5 class="col-1 align-items-center mx-2 ">0</h5>
                    <button class="col-2 btn btn-warning">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row gap-1">
                    <button class="col btn btn-warning">Buy Now</button>
                    <button class="col btn btn-warning">Add To Cart</button>
                </div>
            </div>
        </div>

    </div>

</body>

</html>