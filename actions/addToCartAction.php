<?php
session_start();
include "../autoload/autoload.php";

use models\CartModel;

$request = json_decode(file_get_contents('php://input'));
$_SESSION["hi"] = (array) $request;

$cartModel = CartModel::getCartInstance();
$cartModel->addToCart((array)$request);
