<?php
session_start();

include "../../autoload/autoload.php";

use models\auth;
use models\UserModel;

$auth = Auth::getAuthInstance();

$auth->checkAuthForAdmin();
$userModel = new UserModel();
$users = $userModel->getAllUsers();
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
    <div style="min-height: 600px;" class="container">

        <div class="row">
            <?php include "./sideNav.php" ?>
            <div class="col mt-2 shadow-sm border p-0 ms-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-1">User List</h4>
                    <a href="http://localhost/e-commerce/views/admin/userNew.php" class="btn btn-dark m-1">Add New User</a>
                </div>
                <table class=" table table-bordered">
                    <thead class=" fw-bold">
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Password</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td> <?php echo $user["id"]  ?></td>
                                <td> <?php echo $user["name"]  ?></td>

                                <td> <?php echo $user["email"]  ?></td>
                                <td> <?php echo $user["password"]  ?></td>

                                <td> <?php echo $user["phone"]  ?></td>

                                <td> <?php echo $user["address"]  ?></td>

                                <td><a href="./userEdit.php?id=<?php echo $user["id"] ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                    <button id="delBtn" class="btn btn-danger"><span class="d-none"><?php echo $user["id"] ?></span><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include "../footer.php"; ?>


    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        let delBtn = document.querySelectorAll("#delBtn");
        delBtn.forEach(btn => {
            btn.addEventListener("click", () => {
                confirm("Are you sure to delete this user?") ? location.href = `http://localhost/e-commerce/actions/adminActions/userActions/delete.php?id=${btn.firstChild.innerText}` : "";

            })
        })
    </script>

</body>

</html>