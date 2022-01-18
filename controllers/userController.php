<?php

namespace controllers;

use models\Database;


class UserController
{

    private $database;
    public function __construct()
    {
        $this->database = Database::getDatabaseInstance();
    }


    public function getAllUsers()
    {

        $sql = "SELECT * FROM users ";
        $statement = $this->database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }


    public function getUsersById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }
}


// echo "<pre>";
// $user = new UserController();
// var_dump($user->getUsersById(3));
