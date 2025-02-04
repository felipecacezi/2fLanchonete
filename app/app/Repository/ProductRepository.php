<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    
    public static function getTopProductsOrders(
        int $quantity = 0, 
        string $order,
        Carbon $dateInit = null,
        Carbon $dateEnd = null
    ) {
        $products = Product::join('order_products', 'products.id', '=', 'order_products.product_id')
            ->join('orders', 'orders.id', '=', 'order_products.order_id')
            ->select('products.product_name', DB::raw('SUM(order_products.order_product_quantity) as quantity'))
            ->whereBetween('orders.created_at', [$dateInit->format('Y-m-d H:i:s'), $dateEnd->format('Y-m-d H:i:s')])
            ->where('orders.order_status', 'E')
            ->groupBy('products.id', 'products.product_name') 
            ->orderBy('quantity', $order);

        if ($quantity > 0) {
            $products->limit($quantity);
        }

        return $products->get();
    }
}