<?php
session_start();
include "../models/autoload.php";

use models\database\Database;

$database = Database::getDatabaseInstance();


$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$statement = $database->prepare($sql);
$statement->execute([$email, $password]);
$result = $statement->fetch();

if ($result) {

    echo "login success";
    $_SESSION["user"] = $result;

    if ($result["role_id"] == 1)
        header("location:customer.php");
    else if ($result["role_id"] == 2)
        header("location:admin.php");
} else
    header("location:div.php");

echo "<pre>";
var_dump($result);
