<?php
session_start();

include_once "../autoload/autoload.php";

use models\Auth;
use models\ProductModel;

$auth = Auth::getAuthInstance();;

$productModel = new ProductModel();
$products = [];
if (!isset($_GET["category_id"])) {
    $products = $productModel->getAllProducts();
} else {
    $products = $productModel->getProductsByCategory($_GET["category_id"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Light</title>
    <link rel="icon" href="../assets/titleLogo.svg">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto Mono', sans-serif;
        }

        #product:hover {

            box-shadow: 0px 0px 9px 6px rgba(177, 177, 177, 0.52) !important;
        }

        @media only screen and (max-width: 600px) {



            #product {
                width: 180px !important;
            }
        }
    </style>
</head>


<body>
    <?php include "./navbar.php" ?>
    <div class=" container mt-2 mb-2 ">

        <div class=" row gap-4  justify-content-lg-center mb-2 ">
            <div style="height:max-content;" class=" col-lg-2  border border-1  p-0">
                <h5 class=" border border-1 ps-2  pt-2 pb-2 ">Filter</h5>
                <div class=" border-bottom p-2">
                    <a class="btn btn-dark d-block mb-2" href="<?php echo $_SERVER["PHP_SELF"] ?>">Reset</a>
                    <h5 class="">Categories</h5>
                    <div class="d-flex flex-column  ">
                        <a href="./shop.php?category_id=1" class=" mb-1 nav-link text-dark p-0">
                            AirConditioner
                        </a>
                        <a href="./shop.php?category_id=2" class=" mb-1 nav-link text-dark p-0">

                            Laptop
                        </a>
                        <a href="./shop.php?category_id=3" class=" mb-1 nav-link text-dark p-0">

                            Keyboard
                        </a>
                        <a href="./shop.php?category_id=4" class=" mb-1 nav-link text-dark p-0">

                            Mouse
                        </a>
                        <a href="./shop.php?category_id=5" class=" mb-1 nav-link text-dark p-0">

                            HeadSet
                        </a>
                        <a href="./shop.php?category_id=6" class=" mb-1 nav-link text-dark p-0">

                            Mobile
                        </a>
                        <a href="./shop.php?category_id=7" class=" mb-1 nav-link text-dark p-0">

                            Monitor
                        </a>
                        <a href="./shop.php?category_id=8" class=" mb-1 nav-link text-dark p-0">

                            Refrigerator
                        </a>
                        <a href="./shop.php?category_id=9" class=" mb-1 nav-link text-dark p-0">

                            WashingMachine
                        </a>
                        <a href="./shop.php?category_id=10" class=" mb-1 nav-link text-dark p-0">

                            E-Pots
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-lg-9     pt-2  ">
                <h5>Products</h5>
                <div class="d-flex gap-2 flex-wrap justify-content-lg-start  ">



                    <?php foreach ($products as $product) { ?>
                        <a href="http://localhost/e-commerce/views/productDetail.php?id=<?php echo $product["id"] ?>" id="product" style="width: 230px;height:340px" class=" card text-dark nav-link  shadow-sm">

                            <div id="#productImg" class=" p-3 d-flex align-items-center justify-content-center" style="height: 60%;"><img src="../assets/products_img/<?php echo $product["photo"] ?>" class=" img-fluid" alt=""></div>
                            <div style="height: 40%;" class="px-3">
                                <h6 style="height: 35%;text-align:justify" class="mb-1 overflow-hidden fw-bold"><?php echo $product["name"]  ?>...</h6>

                                <h6 class=" fw-bold "><?php echo $product["price"] ?> MMK</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span><i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i style="color: gainsboro;" class="fas fa-star "></i></span>
                                </div>

                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
    <?php include "./footer.php"; ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>