<?php

namespace models;

use models\Database;


class UserModel
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
        $sql = "SELECT users.id,users.name,users.email,users.phone,users.password,users.address,roles.name As role FROM users JOIN roles ON roles.id = users.role_id  WHERE users.id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function updateUser($array)
    {
        $sql = "UPDATE users SET name=?,email=?,phone=?,password=?,address=? WHERE id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute($array);
    }
    public function addUser($array)
    {
        $sql = "INSERT INTO users (name,email,phone,password,address) VALUES (?,?,?,?,?)";
        $statement = $this->database->prepare($sql);
        $statement->execute($array);
    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
    }
}
