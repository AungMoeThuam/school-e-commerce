<?php
session_start();

$_SESSION["cart"] = [];
header("location:http://localhost/e-commerce/views/cart.php");
