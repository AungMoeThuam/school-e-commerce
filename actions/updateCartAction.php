<?php
session_start();
include "../autoload/autoload.php";

use models\CartModel;

$request = file_get_contents("php://input");
$data = (array)json_decode($request);

$cartModel = CartModel::getCartInstance();
$cartModel->updateCart($data);
