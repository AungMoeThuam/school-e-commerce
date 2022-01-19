<?php
session_start();
include "/xampp/htdocs/e-commerce/autoload/autoload.php";

use models\CartModel;

$id = $_GET["id"];
echo $id;
$cartModel = CartModel::getCartInstance();
$cartModel->deleteFromCart($id);
header("location:http://localhost/e-commerce/views/cart.php");
