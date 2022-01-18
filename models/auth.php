<?php

namespace models;
// session_start();
include_once "/xampp/htdocs/e-commerce/models/database.php";

use models\Database;



class Auth
{
    private $database;
    public function __construct()
    {

        $this->database  = Database::getDatabaseInstance();
    }

    public static function getAuthInstance()
    {
        return new Auth();
    }

    public function checkLogin($gmail, $password)
    {
        $stmt = $this->database->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute([$gmail, $password]);
        $user = $stmt->fetch();
        return $user;
    }

    public function checkAuth()
    {

        if (isset($_SESSION["auth"]) && $_SESSION["auth"]['login_status'] === true)
            return;
        else
            header('location:http://localhost/e-commerce/views/login.php');
    }

    public function checkAlreadyLoginOrNot()
    {

        if (isset($_SESSION["auth"]) && $_SESSION["auth"]['login_status'] === true)
            header('location:http://localhost/e-commerce/views/profile.php');
    }
}

// $auth = new Auth();

// if ($auth->checkLogin("aung@gmail.com", "aung@2020")) {
//     echo "login success!";
// }
