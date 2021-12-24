<?php
// session_start();
include_once "/xampp/htdocs/e-commerce/models/database/database.php";

use models\database\Database;

class Auth
{
    private $database;
    public function __construct()
    {

        $this->database  = Database::getDatabaseInstance();
    }

    public function checkLogin($gmail, $password)
    {
        $stmt = $this->database->prepare("SELECT * FROM users WHERE gmail = ? AND password = ?");
        $stmt->execute([$gmail, $password]);
        $user = $stmt->fetchObject();
        return $user;
    }

    public function checkAuth()
    {

        if ($_SESSION["login"])
            return;
        else
            header('location:http://localhost/e-commerce/login.php');
    }
}

// $auth = new Auth();

// if ($auth->checkLogin("aung@gmail.com", "aung@2020")) {
//     echo "login success!";
// }
