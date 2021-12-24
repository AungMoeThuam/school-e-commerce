<?php

// include "../../models/database/database.php";

namespace controllers;

use models\product\ProductModel;

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function showProducts()
    {
        return $this->productModel->getAllProducts();
    }

    public function getProductById($id)
    {
        return $this->productModel->getProductsById($id);
    }
}
