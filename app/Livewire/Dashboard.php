<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Order\Orders;
use App\Services\Dashboard\Charts;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $orders = [];
    private $btnStatus = [
        'P' => [
            'btnAccept' => ['visibility' => true],
            'btnDecline' => ['visibility' => true],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => false],
            'btnDetails' => ['visibility' => true]
        ],
        'A' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => true],
            'btnDispatch' => ['visibility' => true],
            'btnDetails' => ['visibility' => true]
        ],
        'D' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => false],
            'btnDetails' => ['visibility' => false]
        ],
        'C' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => false],
            'btnDetails' => ['visibility' => false]
        ]
    ];

    public $faturamentoHoje = 0;
    public $faturamentoMes = 0;
    public $topVendas = [];
    public $cancelados = ['itens' => 0, 'valor' => 0];
    public $orderDetails = [];
    

    public function mount()
    {
        $orders = (new Orders())->getDashboardOrders(
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        );

        foreach ($orders as &$order) {
            $order['btnStatus'] = $this->btnStatus[$order->order_status->original()];
        }

        $this->orders = $orders;     
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function acceptOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'A');
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Aceito!',
                'text' => "O pedido #{$id} foi aceito com sucesso!",
                'icon' => 'success',
                'confirmButtonText' => 'OK'
            ]
        );
        $this->mount();
    }

    public function declineOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'R');
        $this->dispatch('orderDeclined', $id);
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Rejeitado!',
                'text' => "O pedido #{$id} foi rejeitado com sucesso!",
                'icon' => 'success',
                'confirmButtonText' => 'OK'
            ]
        );
        $this->mount();
    }

    public function cancelOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'C');
        $this->dispatch('orderDeclined', $id);
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Cancelado!',
                'text' => "O pedido #{$id} foi cancelado com sucesso!",
                'icon' => 'success',
                'confirmButtonText' => 'OK'
            ]
        );
        $this->mount();
    }

    public function getDetailsOrder(int $orderId)
    {
        $orders = new Orders();
        $this->orderDetails = $orders->getOrderDetails($orderId);        
        $this->mount();
    }
}
