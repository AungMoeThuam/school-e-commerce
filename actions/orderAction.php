<?php
session_start();
include "../autoload/autoload.php";

use models\CartModel;

$cartModel = CartModel::getCartInstance();
