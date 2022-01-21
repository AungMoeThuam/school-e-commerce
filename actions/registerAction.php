<?php
session_start();
include "../autoload/autoload.php";

use controllers\UserController;
use models\Database;

$userModel = new UserController();
$database = Database::getDatabaseInstance();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$address = $_POST["address"];

$userModel->addUser([$name, $email, $phone, $password, $address]);
$_SESSION["auth"]["user"]["id"] = $database->query("select id from users ORDER BY id DESC LIMIT 1")->fetch()[0];
$_SESSION["auth"]["user"]["name"] = $name;
$_SESSION["auth"]["user"]["role"] = "1";
$_SESSION["auth"]['login_status'] = true;
header("location:http://localhost/e-commerce/");
