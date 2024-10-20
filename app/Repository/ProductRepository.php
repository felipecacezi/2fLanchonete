<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{

    /**
     * Busca um produto por ID e retorna um array
     *
     * @param int $productId
     * @param Product $product
     * @return array
     */
    public static function findById(int $productId)
    {
        return(new Product())
            ->find($productId)
            ->toArray();
    }
    
}