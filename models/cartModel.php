<?php

namespace models;


class Cart
{


    public function __construct()
    {
        if (isset($_SESSION["cart"]) === false) {
            $_SESSION["cart"] = [];
        };
    }

    public function getCartInstance()
    {
        return new Cart();
    }

    public function addToCart($product)
    {
        $_SESSION["cart"];
    }
}

function push($product)
{
    $_SESSION["cart"];
}
