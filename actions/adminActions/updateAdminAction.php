<?php
session_start();
include "../../autoload/autoload.php";
include "../autoload/autoload.php";

use controllers\UserController;

$userModel = new UserController();

$id = $_SESSION["auth"]["user"]["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$address = $_POST["address"];

$userModel->updateUser([$name, $email, $phone, $password, $address, $id]);

header("location:http://localhost/e-commerce/views/admin/profile.php");
