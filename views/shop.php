<?php
include ".././models/autoload.php";

use controllers\productController;

$productController = new ProductController();

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
    <style>
        @media only screen and (max-width: 600px) {



            #product {
                width: 180px !important;
            }
        }
    </style>
</head>


<body>
    <?php include "./navbar.php" ?>
    <div class=" container ">

        <div class=" row gap-4  justify-content-lg-center ">
            <div class=" col-lg-2 border border-1  p-0">
                <h5 class=" border border-1 ps-2  pt-2 pb-2 ">Filter</h5>
                <div class=" border-bottom p-2">
                    <h5 class="">Categories</h5>
                    <div class="d-flex flex-column  ">
                        <div class=" mb-1">
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Electronic
                        </div>
                        <div class=" mb-1">
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Sport
                        </div>
                        <div class=" mb-1">
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Fashion
                        </div>
                        <div class=" mb-1">
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Cosmetics
                        </div>
                        <div class=" mb-1">
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Kitchen
                        </div>
                        <div class=" mb-1">
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Stationery
                        </div>
                        <div class=" mb-1">
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Furniture
                        </div>
                        <div>
                            <input class=" form-check-input m-1" type="checkbox" name="" id="">Health
                        </div>
                    </div>
                </div>

                <div class="p-2 border-bottom">
                    <h5>Price Range</h5>
                    <div class="d-flex align-items-center ">
                        <input type="number" placeholder="min" class=" form-control p-1 me-1" name="" id="">-
                        <input type="number" placeholder="max" class=" form-control p-1 ms-1" name="" id="">
                    </div>
                    <input class=" form-control p-1 mt-1 bg-dark text-white" type="button" value="Set Price">

                </div>
            </div>
            <div class="col-lg-9     pt-2  ">
                <h5>Products</h5>
                <div class="d-flex gap-2 flex-wrap justify-content-lg-start  ">
                    <?php foreach ($productController->showProducts() as $product) { ?>
                        <div id="product" style="width: 230px;height:350px" class=" card">
                            <div style="height: 50%;"><img src="../assets/monitor.webp" class=" img-fluid p-1" alt=""></div>
                            <h4><?php echo $product["name"] ?></h4>
                            <h4><?php echo $product["description"] ?></h4>
                            <h4><?php echo $product["price"] ?></h4>
                            <h4><?php echo $product["qty"] ?></h4>
                        </div>
                    <?php } ?>
                    <?php foreach ($productController->showProducts() as $product) { ?>
                        <div id="product" style="width: 230px;height:350px" class=" card">
                            <div style="height: 50%;"><img src="../assets/mouse.webp" class=" img-fluid p-1" alt=""></div>
                            <h4><?php echo $product["name"] ?></h4>
                            <h4><?php echo $product["description"] ?></h4>
                            <h4><?php echo $product["price"] ?></h4>
                            <h4><?php echo $product["qty"] ?></h4>
                        </div>
                    <?php } ?>


                </div>
            </div>

        </div>
    </div>


</body>

</html>