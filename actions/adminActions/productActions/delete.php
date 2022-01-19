<?php
include "../../../autoload/autoload.php";

use models\ProductModel;

$id = $_GET["id"];
$productModel = new ProductModel();
$existProduct = $productModel->getProductsById($id);
$exist_img = $existProduct["photo"];

unlink("/xampp/htdocs/e-commerce/assets/products_img/$exist_img");

$productModel->deleteProduct($id);

header("location:http://localhost/e-commerce/views/admin/products.php");
