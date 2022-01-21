<?php
session_start();

include "../../autoload/autoload.php";

use models\OrderModel;
use models\auth;

$auth = Auth::getAuthInstance();

$auth->checkAuthForAdmin();
$id = $_GET["id"];
$orderModel = new OrderModel();
$order = $orderModel->getOrderById($id);
$productsInOrder = $orderModel->getProductListByOrderId($id);
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
    <div style="min-height:500px" class="container">

        <div class="row">
            <?php include "./sideNav.php" ?>
            <div class="col mt-2 shadow-sm border p-0 ms-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-1">Order Summary</h4>
                    <a href="http://localhost/e-commerce/views/admin/orders.php" class="btn btn-dark m-1">Back</a>
                </div>
                <table class=" table table-bordered">
                    <thead class=" fw-bold">
                        <tr>
                            <td>Id</td>
                            <td>Customer Name</td>
                            <td>Date</td>
                            <td>Total Qty</td>
                            <td>Total Price</td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> <?php echo $order["order_id"]  ?></td>
                            <td> <?php echo $order["user_name"]  ?></td>
                            <td> <?php echo $order["date"]  ?></td>
                            <td> <?php echo $order["total_qty"]  ?></td>
                            <td> <?php echo $order["total_price"]  ?></td>

                        </tr>

                    </tbody>
                </table>
                <h4 class="m-1">Product List</h4>
                <table class=" table table-bordered">
                    <thead class=" fw-bold">
                        <tr>

                            <td>Product Name</td>
                            <td>Total Qty</td>
                            <!-- <td>Total Price</td> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productsInOrder as $product) { ?>
                            <tr>
                                <td> <?php echo $product["product_name"]  ?></td>
                                <td> <?php echo $product["total_qty"]  ?></td>
                                <!-- <td> <?php echo $product["total_price"]  ?></td> -->

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "../footer.php"; ?>


    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>