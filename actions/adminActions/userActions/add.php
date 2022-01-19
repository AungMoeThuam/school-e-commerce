<?php
include "../../../autoload/autoload.php";

use controllers\UserController;

$userModel = new UserController();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$address = $_POST["address"];

$userModel->addUser([$name, $email, $phone, $password, $address]);

header("location:http://localhost/e-commerce/views/admin/users.php");
