<?php
include "../../../autoload/autoload.php";


use models\UserModel;

$userModel = new UserModel();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$address = $_POST["address"];

$userModel->addUser([$name, $email, $phone, $password, $address]);

header("location:http://localhost/e-commerce/views/admin/users.php");
