<?php
namespace App\Services\Products;

use App\Repository\ProductRepository;
use Carbon\Carbon;

class Products
{
    public function getTopProductOrders(
        int $quantity = 0, 
        string $order = 'DESC',
        Carbon $dateInit = null,
        Carbon $dateEnd = null
    ) {
        return ProductRepository::getTopProductsOrders(
            $quantity, 
            $order,
            $dateInit,
            $dateEnd
        );
    }
}