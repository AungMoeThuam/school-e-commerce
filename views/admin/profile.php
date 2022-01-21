<?php
session_start();
include "/xampp/htdocs/e-commerce/autoload/autoload.php";

use models\auth;
use models\UserModel;

$auth = Auth::getAuthInstance();

$auth->checkAuthForAdmin();
$userModel = new UserModel();
$user = $userModel->getUsersById($_SESSION["auth"]["user"]["id"]);
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
    <style>
        #phone input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            appearance: none;
            margin: 0;
        }

        h6 {
            cursor: pointer;

        }

        h5 {
            cursor: pointer;
        }

        h6:hover {
            background-color: black;
            color: white;

        }

        #profile_icon {
            width: 180px;
        }

        @media only screen and (max-width: 900px) {

            #profile_icon {
                width: 100px;
            }


        }
    </style>
</head>

<body>
    <?php include "./adminPanel.php" ?>

    <div style="min-height: 600px;" class="container">

        <div class="row offset-2">
            <?php include "./sideNav.php" ?>
            <div class="col-5 mt-2 shadow-sm border p-0 ms-2">

                <div style="display:block" id="profile">
                    <form class=" card p-2" action="http://localhost/e-commerce/actions/adminActions/updateAdminAction.php" method="POST">
                        <label class="form-label" for="Id">Id</label>
                        <input class="form-control" type="text" name="id" value="<?php echo $user["id"] ?>" id="">
                        <label class="form-label" for="Name">Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $user["name"] ?>" id="">
                        <label class="form-label" for="Email">Email</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $user["email"] ?>" id="">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="text" name="password" value="<?php echo $user["password"] ?>" id="">
                        <label class="form-label" for="Phone">Phone</label>
                        <input class="form-control" type="number" name="phone" value="<?php echo $user["phone"] ?>" id="phone">
                        <label class="form-label" for="Address">Address</label>
                        <input class="form-control" type="text" name="address" value="<?php echo $user["address"] ?>" id="phone">
                        <label class="form-label" for="Id">Role</label>
                        <input class="form-control" type="text" name="role" value="<?php echo $user["role"] ?>" disabled>
                        <button type="submit" class="mt-1 btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "../footer.php"; ?>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</body>

</html>