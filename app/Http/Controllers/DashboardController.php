<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\Order\Orders;
use App\Services\Dashboard\Charts;

class DashboardController extends Controller
{
    public function index()
    {       
        $arDailyOrders = (new Orders())->getDashboardOrders(
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        );

        return view('dashboard', compact('arDailyOrders'));
    }

    public function getCharts()
    {
        return response(
            [
                'msg' => 'Produto editado com sucesso.',
                'data' => [
                    'charts' => (new Charts())->getDashBoardCharts()
                ],
                'status' => 201
            ],
            201,                
        );
    }
}
