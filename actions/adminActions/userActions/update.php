<?php
include "../../../autoload/autoload.php";


use models\UserModel;

$userModel = new UserModel();

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$address = $_POST["address"];

$userModel->updateUser([$name, $email, $phone, $password, $address, $id]);

header("location:http://localhost/e-commerce/views/admin/users.php");
