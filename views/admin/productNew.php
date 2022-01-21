<?php
session_start();

use models\Database;

include "../../autoload/autoload.php";

use models\auth;

$auth = Auth::getAuthInstance();

$auth->checkAuthForAdmin();
$database = Database::getDatabaseInstance();
$categorys = $database->query("SELECT * FROM categories");

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

                <h6 class="p-2 fw-bold  ">New Product </h6>
                <form action="http://localhost/e-commerce/actions/adminActions/productActions/add.php" method="POST" enctype="multipart/form-data" class=" card p-2">

                    <input class=" form-control" accept="image/*" type="file" name="img" id="selectImg">
                    <img class=" border rounded-2 m-1" width="100" id="img" alt="preview Image">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" name="name">
                    <label class="form-label" for="description">Description</label>
                    <input class="form-control" type="text" name="description">
                    <label class="form-label" for="phone">Price</label>
                    <input class="form-control" type="text" name="price">
                    <label class="form-label" for="qty">Qty</label>
                    <input class="form-control" type="number" name="qty">
                    <label class="form-label" for="address">Brand</label>
                    <input class="form-control" type="text" name="brand">
                    <label class="form-label" for="category_id">Category Id</label>
                    <select name="category_id" class=" form-select">
                        <?php foreach ($categorys as $category) { ?>
                            <option value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option>
                        <?php } ?>
                    </select>
                    <div class=" d-flex justify-content-end">
                        <a href="./products.php" class=" m-1 btn btn-warning">Back</a>
                        <button type="submit" class=" m-1 btn btn-primary">Add</button>
                    </div>

                </form>


            </div>
        </div>
    </div>


    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        let selectImg = document.querySelector("#selectImg");
        let img = document.querySelector("#img");
        selectImg.addEventListener("change", (event) => {
            img.src = URL.createObjectURL(event.target.files[0]);
        })
    </script>

</body>

</html>