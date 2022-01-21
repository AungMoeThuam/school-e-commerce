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

<body class=" bg-light">
    <?php include "./navbar.php" ?>
    <div style="min-height: 500px;" class="container justify-content-center mb-2 p-2">
        <div class="row row-cols-2 p-5">
            <div class="col p-4">
                <h1>Let Us Introduce Our Company and Services</h1>
                <p style="text-align: justify;">


                    “City light” company limited is one of the largest
                    electronic products retailing marts in Yangon, Myanmar.
                    It sells a variety of electronic products especially for
                    air conditioners, refrigerators, washing machines,
                    electronic pots and so on. “City Light” company limited recognizes
                    the potential benefits of applying the emerging E-commerce strategies
                    and solutions for better customer services and business growth. As a web developer,
                    The company is always finding the strategies and the impact of E-commerce on organizations,
                    research technologies and resources related with setting up a successful E-commerce site
                    and finally, design and implement an E-commerce strategy that meets business goals and requirements of the organization.
                </p>
            </div>
            <div class="col">
                <img class=" img-fluid" src="http://localhost/e-commerce/assets/showcases/about1.jpg" alt="">
            </div>
            <div class="col">
                <img class=" img-fluid" src="http://localhost/e-commerce/assets/showcases/about2.jpg" alt="">
            </div>
            <div class="col p-5">
                <h4>The company is also always helping people all over the world. To give the best services as a pleasure to the poeple are
                    our main first priority
                </h4>
            </div>
        </div>

    </div>
    <?php include "./footer.php"; ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>