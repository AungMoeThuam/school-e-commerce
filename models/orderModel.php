<?php

namespace models;

class OrderModel
{
    public function __construct()
    {
    }

    public function addOrder($customerId, $array)
    {
        $orderSql = "INSERT INTO orders (customer_id)";
    }
}
