<?php
session_start();

include "/xampp/htdocs/e-commerce/autoload/autoload.php";

use models\auth;
use models\OrderModel;
use models\UserModel;

$auth = Auth::getAuthInstance();

$auth->checkAuthForUser();
$user_id = $_SESSION["auth"]["user"]["id"];
$userModel = new UserModel();
$orderModel = new OrderModel();
$orderList = $orderModel->getOrderListbyUserId($user_id);
$user = $userModel->getUsersById($user_id);

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
    <?php include "./navbar.php" ?>

    <div class="container justify-content-center mb-2">

        <div class="row mt-2">

            <div class="col-sm-12 col-md-4 offset-lg-2 col-lg-3 border shadow-sm">
                <div class=" text-light border-bottom d-flex justify-content-center align-items-center ">

                    <span id="profile_icon" class="text-dark" style="font-size:180px;"><i class="far fa-user-circle"></i></span>
                </div>
                <div class="mt-2 d-flex flex-column justify-content-start">
                    <h5 class=" px-2 py-2 rounded-2">Profile</h5>
                    <h5 class=" px-2 py-2 rounded-2">Orders</h5>
                    <h6 id="logoutBtn" class=" px-2 py-2 rounded-2"> Logout</h6>
                </div>
            </div>
            <div id="content" class="col-sm-12  col-md-8 col-lg-5">
                <div style="display:block" id="profile">
                    <form class=" card p-2" action="http://localhost/e-commerce/actions/updateUserAction.php" method="POST">
                        <label class="form-label" for="id">Id</label>
                        <input class="form-control" type="text" name="id" value="<?php echo $user["id"] ?>" disabled>
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $user["name"] ?>" id="">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $user["email"] ?>" id="">
                        <label class="form-label" for="phone">Phone</label>
                        <input class="form-control" type="number" name="phone" value="<?php echo $user["phone"] ?>" id="phone">
                        <label class="form-label" for="dddress">Address</label>
                        <input class="form-control" type="text" name="address" value="<?php echo $user["address"] ?>" id="phone">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" value="<?php echo $user["password"] ?>" id="phone">
                        <button type="submit" class="mt-1 btn btn-dark">Update</button>
                    </form>
                </div>
                <div style="display:none" id="order">
                    <h5>Order List</h5>
                    <table class=" table table-bordered">
                        <thead class=" fw-bold">
                            <tr>
                                <td>Id</td>
                                <td>Customer Name</td>
                                <td>Date</td>
                                <td>Total Qty</td>
                                <td>Total Price</td>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderList as $order) { ?>
                                <tr>
                                    <td> <?php echo $order["order_id"]  ?></td>
                                    <td> <?php echo $order["user_name"]  ?></td>
                                    <td> <?php echo $order["date"]  ?></td>
                                    <td> <?php echo $order["total_qty"]  ?></td>
                                    <td> <?php echo $order["total_price"]  ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <?php include "./footer.php"; ?>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        let inputs = document.querySelectorAll("input");
        let h5s = document.querySelectorAll("h5");
        let logoutBtn = document.querySelector("#logoutBtn");
        let profile = document.getElementById("profile");
        let order = document.getElementById("order");

        h5s.forEach(h5 => {
            h5.addEventListener("click", () => {
                switch (h5.innerText) {
                    case "Profile":
                        profile.style.display = "block";
                        order.style.display = "none";
                        break;
                    case "Orders":
                        profile.style.display = "none";
                        order.style.display = "block";
                        break;
                }
            })
        })
        logoutBtn.addEventListener("click", () => {
            confirm("Do you confirm to logout?") ? location.href = "http://localhost/e-commerce/actions/logoutAction.php" : "";
        })
    </script>

</body>
</body>

</html>