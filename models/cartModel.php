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
    public function getAllItems()
    {
        $itemList = [];
        foreach ($_SESSION["cart"] as $item) {
            $temp_item["product_id"] = $item["id"];
            $temp_item["qty"] = $item["qty"];
            array_push($itemList, $temp_item);
        }
        return $itemList;
    }

    public function addToCart($product)
    {
        if (count($_SESSION["cart"]) === 0) {

            array_push($_SESSION["cart"], $product);
        } elseif (in_array($product["id"], array_column($_SESSION["cart"], "id"))) {

            $index =  array_search($product["id"], array_column($_SESSION["cart"], "id"));;
            $_SESSION["cart"][$index]["qty"] += $product["qty"];
        } else {

            array_push($_SESSION["cart"], $product);
        }
    }

    public function updateCart($item)
    {
        $index =  array_search($item["id"], array_column($_SESSION["cart"], "id"));
        $_SESSION["cart"][$index]["qty"] = $item["qty"];
    }

    public function deleteFromCart($id)
    {
        $index =  array_search($id, array_column($_SESSION["cart"], "id"));;
        array_splice($_SESSION["cart"], $index, 1);
    }

    public function getTotalCost()
    {
        $total = 0;
        foreach ($_SESSION["cart"] as $item) {
            $total += $item['qty'] * $item['price'];
        }
        return $total;
    }
    public function getTotalQty()
    {
        $total = 0;
        foreach ($_SESSION["cart"] as $item) {
            $total += $item['qty'];
        }
        return $total;
    }
}
