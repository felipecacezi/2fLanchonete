<?php

namespace App\Livewire;

use App\Services\Order\Orders;
use Livewire\Component;
use App\Helpers\Currency;
use App\Services\Products\Products;
use Carbon\Carbon;

class EstablishmentStatus extends Component
{
    public $cancelledOrdersQuantity = 0;
    public $cancelledOrdersValue = '0,00';
    public $topOrders = [];
    public $billingsToday = '0,00';
    public $billingsMontly = '0,00';
    protected $listeners = [
        'refreshStatus' => '$refresh'
    ];

    public function render()
    {
        $this->getStatus();
        return view(
            'livewire.establishment-status',
            [
                'cancelledOrdersQuantity' => $this->cancelledOrdersQuantity,
                'cancelledOrdersValue' => $this->cancelledOrdersValue,
                'topOrders' => $this->topOrders,
                'billingsToday' => $this->billingsToday,
                'billingsMontly' => $this->billingsMontly
            ]
        );
    }

    public function getStatus()
    {
        $cancelledOrders = (new Orders())->getCancelledOrders();
        $this->cancelledOrdersValue = Currency::convertCentsToReal($cancelledOrders['valueSum']);
        $this->cancelledOrdersQuantity = $cancelledOrders['count'];
        $this->topOrders = (new Products())->getTopProductOrders(
            3, 
            'DESC',
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        );
        $this->billingsToday = Currency::convertCentsToReal((new Orders())->getBillingsToday());
        $this->billingsMontly = Currency::convertCentsToReal((new Orders())->getBillingsMonth());
    }
}
