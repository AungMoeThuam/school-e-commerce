<?php

namespace models;

use models\Database;

use PDOException;

class ProductModel
{
    private $database;

    public function __construct()
    {
        $this->database = Database::getDatabaseInstance();
    }

    public function addProduct($array)
    {
        $sql = "INSERT INTO products (name,description,price,qty,photo,brand,category_id) VALUES (?,?,?,?,?,?,?)";
        $statement = $this->database->prepare($sql);
        $statement->execute($array);
    }

    //get all the products from the products table 
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $statement = $this->database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    //get products according to their categroy type
    public function getProductsByCategory($categoryId)
    {
        $sql = "SELECT * FROM products WHERE category_id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$categoryId]);
        return $statement->fetchAll();
    }

    //get a specific product by id
    public function getProductsById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    //searching product by name
    public function searchByName($name)
    {
        $sql = "SELECT * FROM products WHERE name LIKE '%$name%'";
        $statement = $this->database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function updateProduct($array, $photo = false)
    {
        $sql = $photo === false ? "UPDATE products SET name=?,description=?,price=?,qty=?,brand=?,category_id=? WHERE id = ?" : "UPDATE products SET name=?,description=?,price=?,qty=?,photo=?,brand=?,category_id=? WHERE id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute($array);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id =?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
    }
}
