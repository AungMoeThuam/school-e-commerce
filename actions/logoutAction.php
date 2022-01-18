<?php

session_start();
include "/xampp/htdocs/e-commerce/autoload/autoload.php";

use models\auth\Auth;

unset($_SESSION["auth"]);
header('location:http://localhost/e-commerce/views/login.php');
