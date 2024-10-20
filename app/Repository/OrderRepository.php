<?php

namespace App\Repository;

use App\Models\Order;
use App\Models\Product;

class OrderRepository
{

    /**
     * Busca um produto por ID e retorna um array
     *
     * @param int $productId
     * @param Product $product
     * @return array
     */
    public static function findByHash(string $hash)
    {
        return(new Order())::with('orderProducts.products')
            ->where('order_hash', $hash)
            ->get();
    }
    
}