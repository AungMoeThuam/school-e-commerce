<?php
session_start();
include ".././autoload/autoload.php";


use models\ProductModel;

$productModel = new ProductModel();
$product = $productModel->getProductsById($_GET["id"]);


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
    <div style="min-height: 500px;" class="container justify-content-center">
        <div class=" mt-4 border border-2 row ">
            <h5 id="productId" class="d-none"><?php echo $_GET["id"]; ?></h5>
            <div class="col-6 border-end d-flex py-3 justify-content-center align-items-center">

                <img id="productImg" class=" img-fluid" src="../assets/products_img/<?php echo $product["photo"] ?>" alt="">
            </div>
            <div class="col-4 py-3 px-4">
                <div class="mb-2">
                    <h3 id="productName"><?php echo $product["name"] ?></h3>
                    <span><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i style="color: gainsboro;" class="fas fa-star "></i></span>
                </div>
                <div>
                    <p class=" "><?php echo $product["description"] ?></p>
                </div>
                <div>
                    <h6 id="price" class=" d-inline"><?php echo $product["price"] ?></h6> KS
                </div>
                <div class="row p-1 align-items-center justify-content-start">
                    <p class="col-4 ">Quantity</p>
                    <button id="increBtn" class="col-2 btn btn-warning">
                        <i class="fas fa-plus"></i>
                    </button>
                    <h5 id="productQty" class="col-1 align-items-center mx-2 ">1</h5>
                    <button id="decreBtn" class="col-2 btn btn-warning">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <div class="row gap-1">
                    <button id="buyNow" class="col btn btn-warning">Buy Now</button>
                    <button id="addToCart" class="col btn btn-warning">Add To Cart</button>
                </div>
            </div>
        </div>

    </div>
    <?php include "./footer.php"; ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        let buyNow = document.querySelector("#buyNow");
        let addToCart = document.querySelector("#addToCart");
        let id = document.querySelector("#productId");
        let name = document.querySelector("#productName");
        let img = document.querySelector("#productImg");
        let qty = document.querySelector("#productQty");
        let price = document.querySelector("#price");
        let increBtn = document.querySelector("#increBtn");
        let decreBtn = document.querySelector("#decreBtn");

        buyNow.addEventListener("click", async () => {

            let req = await fetch("http://localhost/e-commerce/actions/addToCartAction.php", {
                method: "POST",
                body: JSON.stringify({
                    id: id.innerText,
                    name: name.innerText,
                    img: img.src,
                    qty: qty.innerText,
                    price: price.innerText
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            location.href = "http://localhost/e-commerce/views/checkout.php";

        });
        addToCart.addEventListener("click", async () => {

            let req = await fetch("http://localhost/e-commerce/actions/addToCartAction.php", {
                method: "POST",
                body: JSON.stringify({
                    id: id.innerText,
                    name: name.innerText,
                    img: img.src,
                    qty: qty.innerText,
                    price: price.innerText
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            location.href = "http://localhost/e-commerce/views/shop.php";

        });
        increBtn.addEventListener("click", () => {
            ++qty.innerText;
        })
        decreBtn.addEventListener("click", () => {
            if (qty.innerText > 1) {
                --qty.innerText;
            }
        })
    </script>
</body>

</html>