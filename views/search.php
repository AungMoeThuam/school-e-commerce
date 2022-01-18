<?php

include "../autoload/autoload.php";

use models\ProductModel;

session_start();

// var_dump($_SESSION);
$productModel = new ProductModel();
$data = [];
if (isset($_POST["search"]))
    $data =  $productModel->searchByName($_POST["search"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Paradise</title>
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
    <div class=" container mt-2 ">

        <div class=" row gap-4  justify-content-lg-center ">
            <div style="height:max-content;" class=" col-lg-2 border border-1  p-0">
                <h5 class=" border border-1 ps-2  pt-2 pb-2 ">Filter</h5>
                <div class=" border-bottom p-2">
                    <a class="btn btn-dark d-block mb-2" href="<?php echo $_SERVER["PHP_SELF"] ?>">Reset</a>
                    <h5 class="">Categories</h5>
                    <div class="d-flex flex-column  ">
                        <div class=" mb-1">
                            <input id="filter" chec value="1" class=" form-check-input m-1" type="checkbox" name="" id="category">Monitor
                        </div>
                        <div class=" mb-1">
                            <input id="filter" value="2" class=" form-check-input m-1" type="checkbox" name="" id="category">Laptop
                        </div>
                        <div class=" mb-1">
                            <input id="filter" value="3" class=" form-check-input m-1" type="checkbox" name="" id="category">Fashion
                        </div>
                        <div class=" mb-1">
                            <input id="filter" value="4" class=" form-check-input m-1" type="checkbox" name="" id="category">Cosmetics
                        </div>
                        <div class=" mb-1">
                            <input id="filter" value="5" class=" form-check-input m-1" type="checkbox" name="" id="category">Kitchen
                        </div>
                        <div class=" mb-1">
                            <input id="filter" value="6" class=" form-check-input m-1" type="checkbox" name="" id="category">Stationery
                        </div>
                        <div class=" mb-1">
                            <input id="filter" value="7" class=" form-check-input m-1" type="checkbox" name="" id="category">Furniture
                        </div>
                        <div>
                            <input id="filter" value="8" class=" form-check-input m-1" type="checkbox" name="" id="category">Health
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


                    <?php if (count($data) === 0) {  ?>
                        <h6>There is no matching item!</h6>
                    <?php } else { ?>

                        <?php foreach ($data as $product) { ?>
                            <a href="http://localhost/e-commerce/views/productDetail.php?id=<?php echo $product["id"] ?>" id="product" style="width: 230px;height:340px" class=" card text-dark nav-link  shadow-sm">

                                <div id="#productImg" class=" border-1 border-bottom p-3 d-flex align-items-center justify-content-center" style="height: 55%;"><img src="../assets/products_img/<?php echo $product["photo"] ?>" class=" img-fluid" alt=""></div>
                                <div style="height: 45%;" class="px-3">
                                    <h5 style="height: 35%;" class="mb-1 fw-bold"><?php echo $product["name"]  ?></h5>

                                    <h6 class=" fw-bold ">Ks <?php echo $product["price"] ?></h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span><i class="fas fa-star"></i> 4</span>

                                        <!-- <a id="addtocart" class="btn btn-warning">View Detail</a> -->
                                        <!-- <button id="#addtocart" class="btn btn-warning fs-4 px-4"><i class="fas fa-cart-plus"></i></button> -->
                                    </div>

                                </div>
                            </a>
                        <?php } ?>

                    <?php } ?>



                </div>
            </div>

        </div>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>


    <script>
        let filter = document.querySelectorAll("#filter");
        console.log(filter);

        // localStorage.setItem("filterCheckedList", "[]");
        let checkedList = JSON.parse(localStorage.getItem("filterCheckedList"));


        for (i = 0; i < checkedList.length; i++) {
            if (checkedList[i].checked === true) {
                filter[i].checked = true;
            }
        }

        filter.forEach(e => e.addEventListener("change", () => {

            addToCheckedList({
                id: e.value,
                checked: e.checked
            });

            location.href = "http://localhost/e-commerce/views/shop.php?category_id=1";

        }));

        function addToCheckedList(element) {
            let newArray = [...checkedList];

            let elementExist = newArray.findIndex(obj => obj.id === element.id);

            if (elementExist === -1) {
                newArray = [...newArray, element];
            } else {
                newArray[elementExist] = element;
            }
            localStorage.setItem("filterCheckedList", JSON.stringify(newArray));
        }
    </script>


</body>

</html>