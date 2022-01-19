<?php
include "../../../autoload/autoload.php";

use models\ProductModel;

$productModel = new ProductModel();

$id = $_POST["id"];
$name = $_POST["name"];
$img_file = $_FILES["img"]["tmp_name"];
$img_name = $_FILES["img"]["name"];
$description = $_POST["description"];
$brand = $_POST["brand"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$category_id = $_POST["category_id"];
$oldProduct = $productModel->getProductsById($id);
$old_img = $oldProduct["photo"];


// var_dump($_POST);
// var_dump($_FILES);
// echo "<pre>";
var_dump($old_img);
if ($img_name == "") {
    $productModel->updateProduct([$name, $description, $price, $qty, $brand, $category_id, $id]);
} else {
    $productModel->updateProduct([$name, $description, $price, $qty, $img_name, $brand, $category_id, $id], true);
    move_uploaded_file($img_file, "/xampp/htdocs/e-commerce/assets/products_img/" . $img_name);
    unlink("/xampp/htdocs/e-commerce/assets/products_img/$old_img");
}

header("location:http://localhost/e-commerce/views/admin/products.php");
