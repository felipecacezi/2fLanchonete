<?php
namespace App\Services\Order;

use Carbon\Carbon;
use App\Helpers\Weeks;
use App\Repository\OrderRepository;
use Illuminate\Support\Facades\Date;

class Orders
{    
    /**
     * Retorna os pedidos feitos entre duas datas informadas.
     *
     * @param Carbon $dateInit Data inicial do range de datas.
     * @param Carbon $dateEnd Data final do range de datas.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getDashboardOrders(
        Carbon $dateInit, 
        Carbon $dateEnd
    ) {
        $orders = OrderRepository::findActiveOrdersByDateRange($dateInit, $dateEnd);
        return $orders;
    }
}