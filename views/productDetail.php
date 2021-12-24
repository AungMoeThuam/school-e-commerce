<?php
include ".././models/autoload.php";

use controllers\ProductController;

$productController = new ProductController();
$product = $productController->getProductById($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <h4><?php echo $product["name"] ?></h4>
    <h4><?php echo $product["description"] ?></h4>
    <h4><?php echo $product["price"] ?></h4>
    <h4><?php echo $product["qty"] ?></h4>

</body>

</html>