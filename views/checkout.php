<?php
session_start();

include ".././autoload/autoload.php";

use models\CartModel;
use models\auth;

$auth = Auth::getAuthInstance();

$auth->checkAuthForUser();
$cart = $_SESSION["cart"];
$cartModel = CartModel::getCartInstance();
$totalCostOfItem = $cartModel->getTotalCost();

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

<body class=" bg-light">
    <?php include "./navbar.php" ?>
    <div class="container justify-content-center mb-2">
        <form action="http://localhost/e-commerce/actions/orderAction.php" method="POST" class="row offset-2">
            <div class="col-6 mt-2 ">
                <h5> Payment Method</h5>
                <div class="row bg-white rounded-3 p-0 shadow-sm  border border-1">
                    <div class="p-3  fw-bold ">
                        <input class="form-switch" type="radio" name="payment" id="payment0"> Paypal
                    </div>
                    <div class="p-3  border-bottom border-top  ">
                        <div class=" fw-bold mb-2">
                            <input class=" form-switch" type="radio" name="payment" id="payment1"> Credit Or Debit Cart
                        </div>
                        <label class=" form-label" for="cardNumber">Cart Number</label>
                        <input type="text" name="cardNumber" placeholder="0000 0000 0000 0000" id="" class="form-control">
                        <div class="row">
                            <div class="col">
                                <label class=" form-label" for="cardNumber">Expiry Date</label>
                                <input type="date" name="cardNumber" placeholder="..." id="" class="form-control">
                            </div>
                            <div class="col">
                                <label class=" form-label" for="cardNumber">CVC/CVV</label>
                                <input type="text" name="cardNumber" placeholder="..." id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class=" border-bottom p-3">
                        <div class=" fw-bold">
                            <input class=" form-switch" type="radio" name="payment" id="payment2"> Mobile Banking
                        </div>
                        <label class=" form-label" for="phone">Phone</label>
                        <input class=" form-control" type="text" name="phone" placeholder="..." id="">
                    </div>
                    <div class=" fw-bold p-3">
                        <input class=" form-switch" type="radio" name="payment" id="payment3"> Cash On Delivery
                    </div>
                </div>
            </div>
            <div class="col-4 mt-2">
                <h5> Oder Summary</h5>
                <table class="table bg-white rounded-3 shadow-sm ">
                    <tr>
                        <td>Product Cost</td>
                        <td><?php echo $totalCostOfItem; ?> Ks</td>
                    </tr>
                    <tr>
                        <td>Shopping Fee</td>
                        <td>1000 Ks</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?php echo $totalCostOfItem + 1000; ?> Ks</td>
                    </tr>
                </table>


                <h5>Shipping Address</h5>
                <input type="text" name="address" id="" class="form-control">
                <input type="submit" value="Confirm Order" class=" form-control mt-2 bg-dark text-light">
            </div>
        </form>

    </div>
    <?php include "./footer.php"; ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>