<?php
// include "../../autoload/autoload.php";

// use controllers\UserController;

// $id = $_GET["id"];
// $userModel = new UserController();
// $user = $userModel->getUsersById($id);
// 
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

        <div class="row offset-2">
            <?php include "./sideNav.php" ?>
            <div class="col-4 mt-2 shadow-sm border p-0 ms-2">

                <h6 class="p-2 fw-bold  ">New User </h6>

                <form action="http://localhost/e-commerce/actions/adminActions/userActions/add.php" method="POST" class=" card p-2">

                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" name="name">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email">
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                    <label class="form-label" for="address">Address</label>
                    <input class="form-control" type="text" name="address">


                    <div class=" d-flex justify-content-end">

                        <a href="./users.php" class=" m-1 btn btn-warning">Back</a>
                        <button type="submit" class=" m-1 btn btn-primary">Add</button>
                    </div>

                </form>


            </div>
        </div>
    </div>


    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>