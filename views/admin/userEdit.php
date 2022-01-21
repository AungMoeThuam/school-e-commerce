<?php
session_start();

include "../../autoload/autoload.php";

use controllers\UserController;
use models\auth;

$auth = Auth::getAuthInstance();

$auth->checkAuthForAdmin();
$id = $_GET["id"];
$userModel = new UserController();
$user = $userModel->getUsersById($id);
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
    <div class="container mb-2">

        <div class="row offset-2">
            <?php include "./sideNav.php" ?>
            <div class="col-4 mt-2 shadow-sm border p-0 ms-2">
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-1">Product List</h4>
                    <button class="btn btn-dark m-1">Add New Product</button>
                </div> -->


                <form action="http://localhost/e-commerce/actions/adminActions/userActions/update.php" method="POST" class=" card p-2">
                    <input type="hidden" name="id" value="<?php echo $user["id"]  ?>">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $user["name"]  ?>">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $user["email"]  ?>">
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $user["phone"]  ?>">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $user["password"]  ?>">
                    <label class="form-label" for="address">Address</label>
                    <input class="form-control" type="text" name="address" value="<?php echo $user["address"]  ?>">


                    <div class=" d-flex justify-content-end">

                        <a href="./users.php" class=" m-1 btn btn-warning">Back</a>
                        <button type="submit" class=" m-1 btn btn-primary">Update</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

    <?php include "../footer.php"; ?>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>