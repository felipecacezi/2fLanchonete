<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\Order\Orders;
use Carbon\Carbon;

class OrderList extends Component
{
    public $orders = [];
    private $btnStatus = [
        'P' => [
            'btnAccept' => ['visibility' => true],
            'btnDecline' => ['visibility' => true],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => false],
            'btnDetails' => ['visibility' => true],
            'btnPrint' => ['visibility' => false],
            'btnFinish' => ['visibility' => false],
            'btnDelivery' => ['visibility' => false],
            'btnDelivered' => ['visibility' => false]
            
        ],
        'A' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => true],
            'btnDispatch' => ['visibility' => true],
            'btnDetails' => ['visibility' => true],
            'btnPrint' => ['visibility' => true],
            'btnFinish' => ['visibility' => false],
            'btnDelivery' => ['visibility' => false],
            'btnDelivered' => ['visibility' => false]
        ],
        'D' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => false],
            'btnDetails' => ['visibility' => false],
            'btnPrint' => ['visibility' => false],
            'btnFinish' => ['visibility' => false],
            'btnDelivery' => ['visibility' => false],
            'btnDelivered' => ['visibility' => false]
        ],
        'C' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => false],
            'btnDetails' => ['visibility' => false],
            'btnPrint' => ['visibility' => false],
            'btnFinish' => ['visibility' => false],
            'btnDelivery' => ['visibility' => false],
            'btnDelivered' => ['visibility' => false]
        ],
        'I' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => true],
            'btnDetails' => ['visibility' => true],
            'btnPrint' => ['visibility' => true],
            'btnFinish' => ['visibility' => true],
            'btnDelivery' => ['visibility' => false],
            'btnDelivered' => ['visibility' => false]
        ],
        'F' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => true],
            'btnDetails' => ['visibility' => true],
            'btnPrint' => ['visibility' => true],
            'btnFinish' => ['visibility' => false],
            'btnDelivery' => ['visibility' => true],
            'btnDelivered' => ['visibility' => false]
        ],
        'D' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => true],
            'btnDetails' => ['visibility' => true],
            'btnPrint' => ['visibility' => true],
            'btnFinish' => ['visibility' => false],
            'btnDelivery' => ['visibility' => false],
            'btnDelivered' => ['visibility' => true]
        ],
        'E' => [
            'btnAccept' => ['visibility' => false],
            'btnDecline' => ['visibility' => false],
            'btnCancel' => ['visibility' => false],
            'btnDispatch' => ['visibility' => false],
            'btnDetails' => ['visibility' => true],
            'btnPrint' => ['visibility' => false],
            'btnFinish' => ['visibility' => false],
            'btnDelivery' => ['visibility' => false],
            'btnDelivered' => ['visibility' => false]
        ]
    ];

    public $faturamentoHoje = 0;
    public $faturamentoMes = 0;
    public $topVendas = [];
    public $cancelados = ['itens' => 0, 'valor' => 0];
    public $orderDetails = [];
    
    public function render()
    {
        $orders = (new Orders())->getDashboardOrders(
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        );

        foreach ($orders as &$order) {
            $order['btnStatus'] = $this->btnStatus[$order->order_status->original()];
        }

        $this->orders = $orders;

        return view('livewire.order-list');
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
                'orderId' => $id,
                'icon' => 'success',
                'confirmButtonText' => 'OK',
                'trigger' => 'refreshStatus'
            ]
        );
    }

    public function declineOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'R');
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Rejeitado!',
                'text' => "O pedido #{$id} foi rejeitado com sucesso!",
                'orderId' => $id,
                'icon' => 'success',
                'confirmButtonText' => 'OK',
                'trigger' => 'refreshStatus'
            ]
        );
    }

    public function cancelOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'C');
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Cancelado!',
                'text' => "O pedido #{$id} foi cancelado com sucesso!",
                'orderId' => $id,
                'icon' => 'success',
                'confirmButtonText' => 'OK',
                'trigger' => 'refreshStatus'
            ]
        );
    }

    public function finishOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'F');
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Finalizado!',
                'text' => "O pedido #{$id} foi finalizado com sucesso!",
                'orderId' => $id,
                'icon' => 'success',
                'confirmButtonText' => 'OK',
                'trigger' => 'refreshStatus'
            ]
        );
    }

    public function deliveryOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'D');
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Liberado!',
                'text' => "O pedido #{$id} foi liberado para o motoboy com sucesso!",
                'orderId' => $id,
                'icon' => 'success',
                'confirmButtonText' => 'OK',
                'trigger' => 'refreshStatus'
            ]
        );
    }

    public function deliveredOrder($id)
    {
        $orders = new Orders();
        $orders->changeOrderStatus($id, 'E');
        $this->dispatch(
            'alert',
            [
                'title' => 'Pedido Entregue!',
                'text' => "O pedido #{$id} entregue com sucesso!",
                'orderId' => $id,
                'icon' => 'success',
                'confirmButtonText' => 'OK',
                'trigger' => 'refreshStatus'
            ]
        );
    }

    public function orderDetailsTrigger(int $orderId)
    {
        $this->dispatch('getDetailsOrder', orderId: $orderId);
    }

    public function printOrder($orderId)
    {
        (new Orders())->changeOrderStatus($orderId, 'I');
        $this->dispatch(
            'print', 
            [
                'data' => (new Orders())->getOrderDetails($orderId)
            ]
        );
    }
}
