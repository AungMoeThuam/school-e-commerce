<?php
session_start();
include "../autoload/autoload.php";

use models\CartModel;
use models\OrderModel;

$orderModel = new OrderModel();
$cartModel = CartModel::getCartInstance();
$cart = $cartModel->getAllItems();
$user = [
    "id" => $_SESSION["auth"]["user"]["id"],
    "total_qty" => $cartModel->getTotalQty(),
    "total_price" => $cartModel->getTotalCost(),
];


$orderModel->addOrder($user, $cart);
header("location:http://localhost/e-commerce/views/shop.php");
