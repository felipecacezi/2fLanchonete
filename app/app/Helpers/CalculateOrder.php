<?php

namespace App\Helpers;

use App\Repository\ProductRepository;
use App\Helpers\Currency;

class CalculateOrder
{
    private $total = 0;
    private $quantity = 0;
    private $products = [];
    private $returnProducts = [];
    private $orderTotal = 0;
    private $taxesTotal = 0;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProducts()
    {
        return $this->returnProducts;
    }

    public function getOrderTotal()
    {
        return $this->orderTotal;
    }

    public function getTaxesTotal()
    {
        return $this->taxesTotal;
    }

    public function calculate()
    {
        $productRepository = new ProductRepository();

        foreach ($this->products as &$product) {
            $arProduct = $productRepository->findById($product['productId']);

            $product['price'] = $this->formatProductValue($product);

            $product['total'] = $this->calculateProductTotal(
                $arProduct['product_price'],
                $product['quantity']
            ); 

            $this->returnProducts[] = [
                'product_id' => $product['productId'],
                'order_product_quantity' => $product['quantity'],
                'order_product_value' => $product['price'],
                'order_product_active' => 'A',
            ];
        }

        $this->calculateOrderTotal();
    }

    private function calculateProductTotal(int $price, int $quantity)
    {
        return $price * $quantity;
    }

    private function formatProductValue($product)
    {
        $currency = new Currency();
        return $currency->convertRealToCents($product['price']); 
    }

    private function calculateOrderTotal()
    {
        foreach ($this->products as $product) {
            $this->orderTotal += $product['total'];
        }
    }
}