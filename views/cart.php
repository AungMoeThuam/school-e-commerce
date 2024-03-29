<?php
session_start();
include "../autoload/autoload.php";

use models\CartModel;
use models\auth;

$auth = Auth::getAuthInstance();
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
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

<body>
    <?php include "./navbar.php" ?>
    <div style="min-height: 600px;" class="container">

        <div class="row mt-2 offset-1">
            <div class="col-7   ">
                <?php if (count($cart) === 0) { ?>
                    <h6 class="p-2 mt-5">There is no item in the cart yet!</h6>
                <?php } else { ?>

                    <?php foreach ($cart as $item) { ?>
                        <div class=" mt-1 row align-items-center border shadow-sm p-2">
                            <div class="col-3"> <img width="120" height="100" src="<?php echo $item['img']; ?>" class="  border-0" alt=""></div>
                            <div class="col-3">
                                <h6><?php echo $item['name'] ?></h6>
                            </div>
                            <div class="col-3">

                                <h6 class="d-inline"><?php echo $item['price'] ?></h6>
                                MMK
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-between">
                                Qty <input onchange="changeQty(<?php echo $item['id'] ?>)" id="qty" type="number" min="1" style="width:40px" class="mx-1" value="<?php echo $item['qty'] ?>">
                            </div>
                            <div class="col-1">
                                <span id="delCartBtn"><span class="d-none"><?php echo $item["id"] ?></span> <i class="fas fa-trash-alt"></i></span>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>


            </div>
            <div style="height: 250px;" class="col-4 p-2 shadow-sm ms-2 border">
                <h5>Order Summary</h5>
                <table class="table ">
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
                <a href="http://localhost/e-commerce/actions/clearCartAction.php" class="btn btn-danger">Clear cart</a>
                <a href="http://localhost/e-commerce/views/checkout.php" class="btn btn-dark">Check Out</a>

            </div>

        </div>

    </div>

    <?php include "./footer.php"; ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        let delCartBtn = document.querySelectorAll("#delCartBtn");
        delCartBtn.forEach(btn => btn.addEventListener("click", () => {

            confirm("Are you sure to delete the item from cart?") ?
                location.href = `http://localhost/e-commerce/actions/deleteCartAction.php?id=${btn.firstChild.innerText}` : "";
        }));


        async function changeQty(id) {
            let req = await fetch("http://localhost/e-commerce/actions/updateCartAction.php", {
                method: "POST",
                body: JSON.stringify({
                    id,
                    qty: event.target.value
                }),
                headers: {
                    'content-type': "application/json"
                }
            })
        }
    </script>

</body>

</html>