<?php
session_start();
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
    <div class="container">

        <div class="row mt-2 offset-1">
            <div class="col-7">
                <div class=" row align-items-center border shadow-sm p-2">
                    <div class="col-3"> <img src="../assets/apple.webp" class=" img-fluid" alt=""></div>
                    <div class="col-3">
                        <h6>Macbook 14.5 inches !</h6>
                    </div>
                    <div class="col-3">
                        <h5>1200000000 KS</h5>
                    </div>
                    <div class="col-2 d-flex align-items-center">
                        <button class="btn btn-warning">+</button>
                        <h5 id="qty" class="mx-1">200</h5>
                        <button class="btn btn-danger">-</button>

                    </div>
                </div>
            </div>
            <div class="col-4 p-2 shadow-sm ms-2 border">
                <h5>Order Summary</h5>
                <table class="table ">
                    <tr>
                        <td>Product Cost</td>
                        <td>23000000 Ks</td>
                    </tr>
                    <tr>
                        <td>Shopping Fee</td>
                        <td>1000 Ks</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>23001000 Ks</td>
                    </tr>
                </table>
                <a href="#" class="btn btn-dark">Check Out</a>
            </div>

        </div>

        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>