<?php
session_start();

use models\ProductModel;

include "../../autoload/autoload.php";

use models\auth;

$auth = Auth::getAuthInstance();

$auth->checkAuthForAdmin();
$productModel = new ProductModel();
$products = $productModel->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600@700&display=swap" rel="stylesheet">
</head>

<body>



    <?php include "./adminPanel.php" ?>
    <div style="min-height: 600px;" class="container">

        <div class="row">
            <?php include "./sideNav.php" ?>
            <div class="col mt-2 shadow-sm border p-0 ms-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-1">Product List</h4>
                    <a href="http://localhost/e-commerce/views/admin/productNew.php" class="btn btn-dark m-1">Add New Product</a>
                </div>
                <table class=" table table-bordered">
                    <thead class=" fw-bold">
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Brand</td>
                            <td>Category</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td> <?php echo $product["id"]  ?></td>
                                <td> <?php echo $product["name"]  ?></td>

                                <td> <?php echo $product["description"]  ?></td>

                                <td> <?php echo $product["price"]  ?></td>
                                <td> <?php echo $product["qty"]  ?></td>

                                <td> <?php echo $product["brand"]  ?></td>


                                <td> <?php echo $product["category_id"]  ?></td>

                                <td class="text-center"><a href="http://localhost/e-commerce/views/admin/productEdit.php?id=<?php echo $product["id"]  ?>" class="btn btn-warning m-1"><i class="far fa-edit"></i></a>
                                    <button id="delBtn" class="btn btn-danger"><span class="d-none"><?php echo $product["id"] ?></span><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include "../footer.php"; ?>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        let delBtn = document.querySelectorAll("#delBtn");
        delBtn.forEach(btn => {
            btn.addEventListener("click", () => {
                confirm("Are you sure to delete this product?") ? location.href = `http://localhost/e-commerce/actions/adminActions/productActions/delete.php?id=${btn.firstChild.innerText}` : "";
            })
        })
    </script>
</body>

</html>