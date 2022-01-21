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
    <div style="min-height: 500px" class=" d-flex justify-content-center">


        <div class="col-4 mt-2 shadow-sm border p-0 ms-2">

            <h3 class="p-2 bg-dark fw-bold text-center text-light ">Contact Us </h3>

            <form action="http://localhost/e-commerce/actions/adminActions/userActions/add.php" method="POST" class=" card p-2">

                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" type="text" name="phone">
                <label class="form-label" for="address">Address</label>
                <textarea class="form-control" rows="5" name="address"></textarea>
                <input type="submit" value="Send Message" class="form-control mt-2 bg-dark text-light">

            </form>


        </div>

    </div>
    <?php include "./footer.php" ?>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>