<?php
namespace App\Services\Dashboard;

use Carbon\Carbon;
use App\Helpers\Weeks;
use App\Repository\OrderRepository;

class Charts
{
    private $atualWeek;

    public function __construct()
    {
        
    }

    public function getDashBoardCharts()
    {
        $wekklyOrders = $this->getWekklyOrders();
        return $wekklyOrders;
    }

    private function getWekklyOrders(): array
    {
        $arWekklyOrders = [];
        $arWeeks = (new Weeks())->getWeeks();

        foreach ($arWeeks as $key => $week) {
            $arWekklyOrders[$key]['week'] =  Carbon::createFromFormat('Y-m-d', $week['firstDay'])->format('d/m/Y');
            $arWekklyOrders[$key]['orders'] = OrderRepository::findActiveOrdersByDateRange(
                $week['firstDay'],
                $week['lastDay']
            )->count();
        }

        return $arWekklyOrders;
    }

    private function getMonthlyOrders()
    {

    }

    
}