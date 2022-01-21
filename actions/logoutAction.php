<?php

session_start();
include "/xampp/htdocs/e-commerce/autoload/autoload.php";

use models\auth\Auth;

unset($_SESSION["auth"]);
$_SESSION["cart"] = [];
header('location:http://localhost/e-commerce/views/login.php');
