<?php

namespace models;

use models\Database;

class OrderModel
{
    private $database;
    public function __construct()
    {
        $this->database = Database::getDatabaseInstance();
    }

    public function addOrder($user, $array)
    {
        $sql = "INSERT INTO orders (customer_id,total_qty,total_price) VALUES (?,?,?)";
        $sql2 = "INSERT INTO order_details (order_id,product_id,qty) VALUES (?,?,?)";
        $statementForOrderLine = $this->database->prepare($sql2);
        $statementForOrder = $this->database->prepare($sql);
        $statementForOrder->execute([$user["id"], $user["total_qty"], $user["total_price"]]);
        $orderID = $this->database->query("select id from orders ORDER BY id DESC LIMIT 1")->fetch()[0];
        echo $orderID;
        foreach ($array as $item) {
            $statementForOrderLine->execute([$orderID, $item["product_id"], $item["qty"]]);
        }

        $_SESSION["cart"] = [];
    }

    public function getAllOrderList()
    {
        $sql = "SELECT orders.id AS order_id, users.name AS user_name, orders.date,orders.total_qty,orders.total_price
        FROM orders JOIN users ON orders.customer_id=users.id";
        $statement = $this->database->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function getOrderById($id)
    {
        $sql = "SELECT orders.id AS order_id, users.name AS user_name, orders.date,orders.total_qty,orders.total_price
        FROM orders JOIN users ON orders.customer_id=users.id WHERE orders.id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }
    public function getProductListByOrderId($id)
    {
        $sql = "SELECT products.name AS product_name, order_details.qty AS total_qty, orders.total_price AS total_price
        FROM products JOIN order_details ON order_details.product_id =products.id JOIN
         orders ON order_details.order_id = orders.id WHERE orders.id = ?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getOrderListbyUserId($id)
    {
        $sql = "SELECT orders.id AS order_id, users.name AS user_name, orders.date,orders.total_qty,orders.total_price
        FROM orders JOIN users ON orders.customer_id=users.id WHERE orders.customer_id=?";
        $statement = $this->database->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }
}
