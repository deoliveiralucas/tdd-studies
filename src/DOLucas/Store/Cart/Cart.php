<?php

namespace DOLucas\Store\Cart;

use DOLucas\Store\Product\Product;
use ArrayObject;

class Cart
{
    
    private $products;

    public function __construct()
    {
        $this->products = new ArrayObject();
    }

    public function add(Product $product)
    {
        $this->products->append($product);
        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function mostExpensive()
    {
        if (count($this->getProducts()) === 0) {
            return 0;
        }

        $mostExpensive = $this->getProducts()[0]->getTotalValue();
        foreach ($this->getProducts() as $product) {
            if ($mostExpensive < $product->getTotalValue()) {
                $mostExpensive = $product->getTotalValue();
            }
        }

        return $mostExpensive;
    }
}
