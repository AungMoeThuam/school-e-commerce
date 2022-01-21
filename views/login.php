<?php
session_start();
include "/xampp/htdocs/e-commerce/autoload/autoload.php";

use models\Auth;
use models\Database;

$auth = Auth::getAuthInstance();
$auth->checkAlreadyLoginOrNot();
$database = Database::getDatabaseInstance();

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
    <style>
        #container {
            min-height: 600px;
        }
    </style>
</head>

<body>
    <?php include "./navbar.php" ?>

    <div id="container" class=" d-flex justify-content-center align-items-center">
        <form style="width: 300px;" class="card shadow-sm border" action="../actions/loginAction.php" method="POST">
            <h4 class="text-center bg-dark p-2  text-light">Login</h4>
            <span class="text-center" style="font-size: 6rem;">
                <i class="fas fa-user-circle"></i>
            </span>
            <div class="p-2">
                <label class=" form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="">
                <label class=" form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="">
                <input class="form-control bg-dark text-light mt-1" type="submit" value="Login">
                <a class=" text-center nav-link text-dark  fs-6 pt-2" href="./register.php">
                    <p>Not Registered?</p>
                </a>
            </div>
        </form>
    </div>
    <?php include "./footer.php"; ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>