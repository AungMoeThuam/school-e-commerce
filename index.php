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
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        #img-1 {
            background-image: url("./assets/b2.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-clip: content-box;
            height: 100vh;
            width: 100%;
        }

        #img-2 {
            background-image: url("./assets/aa.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            width: 100%;

        }

        #img-3 {
            background-image: url("./assets/c.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            width: 100%;
        }

        #category_icon_box {
            width: 60% !important;
        }

        @media only screen and (max-width: 900px) {

            #img-1,
            #img-2,
            #img-3 {
                height: 60vh !important;
            }

            #category_icon_box {
                width: 100% !important;
            }

        }

        #img-1-text {
            color: white;
            font-size: 60px !important;
        }

        #img-2-text {
            color: white;
            font-size: 60px !important;
        }
    </style>
</head>

<body>
    <?php include "./views/navbar.php" ?>


    <div style="width: 100%;" class=" d-flex flex-column  align-items-center">
        <div id="img-2" class=" d-flex flex-column justify-content-center align-items-center ps-5">
            <h1 id="img-1-text " class=" text-center text-white fs-1 fw-bolder "> Technology Products</h1>
            <button style="width: 200px; height:60px" class="btn text-white fs-5 fw-bold border border-4 bg-transparent">
                Top to see more
            </button>
        </div>

        <h1 class=" pt-2 pb-2">Categories </h1>
        <div id="category_icon_box" class=" d-flex justify-content-center flex-wrap gap-1 mt-2 mb-2 ">

            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/electronic-device.png" alt="">
                <h5>Electronic</h5>
            </div>
            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/sports2.png" alt="">
                <h5>Sports</h5>
            </div>
            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/fashion.png" alt="">
                <h5>Fashion</h5>
            </div>
            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/cosmetics.png" alt="">
                <h5>Cosmetics</h5>
            </div>
            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/kitchen.png" alt="">
                <h5>Electronic</h5>
            </div>
            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/electronic-device.png" alt="">
                <h5>Electronic</h5>
            </div>
            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/electronic-device.png" alt="">
                <h5>Electronic</h5>
            </div>
            <div class="card text-center">
                <img width="180" class=" img-fluid " src="./assets/category_icons/electronic-device.png" alt="">
                <h5>Electronic</h5>
            </div>

        </div>
        <div id="img-3" class="d-flex justify-content-start align-items-center ps-5">
            <h1 id="img-2-text" class=" fs-1 fw-bolder "> Sporting Goods</h1>
        </div>
        <div id="img-1">
            <h1 id="img--text" class=" fs-1 fw-bolder "> Camping</h1>
        </div>


    </div>
    <?php include "./views/footer.php" ?>



    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>