<?php

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
    <div class="container">

        <div class="row">
            <div class="col-2 p-0 mt-2 shadow-sm">
                <div class="border p-2">
                    <h4>
                        Manage
                    </h4>
                    <div>
                        <h6>Customers</h6>
                        <h6>Products</h6>

                    </div>
                </div>
                <div class="border p-2">

                    <div>
                        <h6>Orders</h6>
                        <h6>Profile</h6>

                    </div>
                    <button class="btn btn-dark">Logout</button>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>


    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>