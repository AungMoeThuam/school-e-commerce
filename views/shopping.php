<?php
include ".././models/autoload.php";

use controllers\productController;

$productController = new ProductController();

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
    <h1>Shopping</h1>



    <?php foreach ($productController->showProducts() as $product) { ?>

        <h4><?php echo $product["name"] ?></h4>
        <h4><?php echo $product["description"] ?></h4>
        <h4><?php echo $product["price"] ?></h4>
        <h4><?php echo $product["qty"] ?></h4>
    <?php } ?>
</body>

</html>