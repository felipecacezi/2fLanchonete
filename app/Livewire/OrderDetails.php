<?php

namespace App\Livewire;

use App\Models\Order;
use App\Services\Order\Orders;
use Livewire\Component;
use Livewire\Attributes\On; 

class OrderDetails extends Component
{
    public $orderDetails;

    public function render()
    {
        return view('livewire.order-details');
    }

    #[On('getDetailsOrder')] 
    public function handleGetDetailsOrder(int $orderId)
    {
        $this->orderDetails = (new Orders())->getOrderDetails($orderId);
    }
}
