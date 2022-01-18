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

    public function insertProduct($product)
    {
        try {
            $sql = "INSERT INTO products (name,description,photo,price,qty,category_id) VALUES (:name,:description,:photo,:price,:qty,:category_id)";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':name', $product["name"]);
            $statement->bindParam(':description', $product["description"]);
            $statement->bindParam(':photo', $product["photo"]);
            $statement->bindParam(':price', $product["price"]);
            $statement->bindParam(':qty', $product["qty"]);
            $statement->bindParam(':category_id', $product["category_id"]);
            $statement->execute();
            echo "Inserted to database successfully!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
}
