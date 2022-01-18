<?php
session_start();

include "/xampp/htdocs/e-commerce/autoload/autoload.php";


use controllers\UserController;
use models\auth;

$auth = Auth::getAuthInstance();

$auth->checkAuth();
$user_id = $_SESSION["auth"]["user"]["id"];
$userController = new UserController();
$user = $userController->getUsersById($user_id);
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
    <!-- <?php var_dump($_SESSION["auth"]) ?> -->

    <div class="container justify-content-center">

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
                    <form class=" card p-2" action="" method="POST">
                        <label class="form-label" for="Id">Id</label>
                        <input class="form-control" type="text" name="id" value="<?php echo $user["id"] ?>" disabled id="">
                        <label class="form-label" for="Name">Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $user["name"] ?>" id="">
                        <label class="form-label" for="Email">Email</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $user["email"] ?>" id="">
                        <label class="form-label" for="Phone">Phone</label>
                        <input class="form-control" type="number" name="phone" value="<?php echo $user["phone"] ?>" id="phone">
                        <label class="form-label" for="Address">Address</label>
                        <input class="form-control" type="text" name="address" value="<?php echo $user["address"] ?>" id="phone">
                        <button type="submit" class="mt-1 btn btn-dark">Update</button>
                    </form>
                </div>
                <div style="display:none" id="order">
                    Orders
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
        // let content = document.getElementById("content");
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