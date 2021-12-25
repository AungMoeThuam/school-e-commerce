<?php

use models\database\Database;

include ".././models/database/database.php";

$database = Database::getDatabaseInstance();

$sql = "SELECT * FROM products";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="container">
    <div class="row ">

        <?php foreach ($database->query($sql) as $row) { ?>

            <div class="col card ">
                <img src="./assets/<?php echo $row["photo"] ?>" alt="">
                <h1><?php echo $row["name"] ?></h1>
                <h1><?php echo $row["description"] ?></h1>
                <h1><?php echo $row["price"] ?></h1>
                <h1><?php echo $row["qty"] ?></h1>

            </div>

        <?php  } ?>




    </div>
</body>

</html>