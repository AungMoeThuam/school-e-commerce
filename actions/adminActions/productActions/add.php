<?php
include "../../../autoload/autoload.php";

use models\ProductModel;

$userModel = new ProductModel();

$name = $_POST["name"];
$description = $_POST["description"];
$img_name = $_FILES["img"]["name"];
$img_file = $_FILES["img"]["tmp_name"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$category_id = $_POST["category_id"];
$brand = $_POST["brand"];

// echo "<pre>";
// var_dump($_POST);
$userModel->addProduct([$name, $description, $price, $qty, $img_name, $brand, $category_id]);

move_uploaded_file($img_file, "/xampp/htdocs/e-commerce/assets/products_img/" . $img_name);
header("location:http://localhost/e-commerce/views/admin/products.php");
