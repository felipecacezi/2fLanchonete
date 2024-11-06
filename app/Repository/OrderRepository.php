<?php

namespace App\Repository;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class OrderRepository
{
    const ORDER_PENDING = 'P';
    const ORDER_APPROVED = 'A';
    const ORDER_REJECTED = 'R';
    const ORDER_CANCELLED = 'C';
    const ORDER_INPROGRESS = 'I';
    const ORDER_FINISHED = 'F';
    const ORDER_DELIVERING = 'D';
    const ORDER_DELIVERED = 'E'; 
    
    /**
     * Busca um pedido pelo hash
     * 
     * @param string $hash
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function findByHash(string $hash)
    {
        return (new Order())::with('orderProducts.products')
            ->where('order_hash', $hash)
            ->get();
    }

    /**
     * Busca pedidos com status pendente
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function findByOrderStatus()
    {
        return (new Order())
            ->where('order_status', 'P')
            ->get();
    }

    /**
     * Busca pedidos ativos em um determinado range de datas
     * 
     * @param string $dateInit
     * @param string $dateEnd
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function findActiveOrdersByDateRange(
        string $dateInit, 
        string $dateEnd,
        string $sort = '',
        string $status = ''
    ) {
        $orders = (new Order())
            ->whereBetween('created_at', [$dateInit, $dateEnd]);

        switch ($sort) {
            case 'asc':
                $orders->orderBy('created_at', 'asc');
                break;
            case 'desc':
                $orders->orderBy('created_at', 'desc');
                break;
            default:
                break;
        }

        switch ($status) {
            case self::ORDER_PENDING:
                $orders->where('order_status', self::ORDER_PENDING);
                break;
            case self::ORDER_APPROVED:
                $orders->where('order_status', self::ORDER_APPROVED);
                break;
            case self::ORDER_REJECTED:
                $orders->where('order_status', self::ORDER_REJECTED);
                break;
            case self::ORDER_CANCELLED:
                $orders->where('order_status', self::ORDER_CANCELLED);
                break;
            case self::ORDER_INPROGRESS:
                $orders->where('order_status', self::ORDER_INPROGRESS);
                break;
            case self::ORDER_FINISHED:
                $orders->where('order_status', self::ORDER_FINISHED);
                break;
            case self::ORDER_DELIVERING:
                $orders->where('order_status', self::ORDER_DELIVERING);
                break;
            case self::ORDER_DELIVERED:
                $orders->where('order_status', self::ORDER_DELIVERED);
                break;
            default:
                break;
        }
            
        return $orders->get();
    }
}