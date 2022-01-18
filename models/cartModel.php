<?php

namespace models;



class CartModel
{


    public function __construct()
    {
        if (isset($_SESSION["cart"]) === false) {
            $_SESSION["cart"] = [];
        };
    }

    public static function getCartInstance()
    {
        return new CartModel();
    }

    public function addToCart($product)
    {

        // array_push($_SESSION["cart"], $product);
        if (count($_SESSION["cart"]) === 0) {
            array_push($_SESSION["cart"], $product);
        } elseif (in_array($product["id"], array_column($_SESSION["cart"], "id"))) {
            $index =  array_search($product["id"], array_column($_SESSION["cart"], "id"));;
            $_SESSION["a"] = array_search($product["id"], array_column($_SESSION["cart"], "id"));
            $_SESSION["cart"][$index]["qty"] += $product["qty"];
        } else {
            array_push($_SESSION["cart"], $product);
        }
    }

    public function getTotalCost()
    {
        $total = 0;
        foreach ($_SESSION["cart"] as $item) {
            $total += $item['qty'] * $item['price'];
        }
        return $total;
    }
}
