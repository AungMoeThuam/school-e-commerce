<?php
include "/xampp/htdocs/e-commerce/autoload/autoload.php";

session_start();

use models\Auth;



$auth = Auth::getAuthInstance();

$auth->checkAlreadyLoginOrNot();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Light</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "./navbar.php" ?>
    <div style="min-height: 500px" class="d-flex justify-content-center align-items-center p-2">

        <form style="width: 300px;" action="http://localhost/e-commerce/actions/registerAction.php" class="card p-2" method="POST">
            <h4 class="text-center">Register Form</h4>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
            <label for="name" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" required>
            <label for="name" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
            <label for="name" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" required>
            <label for="name" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
            <label for="name" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" required>
            <input type="submit" value="Sign Up" class="form-control mt-2 bg-dark text-light">
        </form>
    </div>

    <?php include "./footer.php"; ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>