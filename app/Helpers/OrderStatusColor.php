<?php

namespace App\Helpers;

class OrderStatusColor
{
    private string $orderStatus;
    private array $arStatusColor = [];

    public function __construct(
        string $orderStatus
    ){
        $this->orderStatus = $orderStatus;
        $this->arStatusColor = [
            'cancelled' => false,
            'rejected' => false,
            'step1' => [
                'iconColor' => 'bg-gray-500',
                'lineColor' => 'bg-gray-200',
            ],
            'step2' => [
                'iconColor' => 'bg-gray-500',
                'lineColor' => 'bg-gray-200',
            ],
            'step3' => [
                'iconColor' => 'bg-gray-500',
                'lineColor' => 'bg-gray-200',
            ],
            'step4' => [
                'iconColor' => 'bg-gray-500',
                'lineColor' => 'bg-gray-200',
            ],
            'step5' => [
                'iconColor' => 'bg-gray-500',
                'lineColor' => 'bg-gray-200',
            ]
        ];
    }

    public function getOrderStatus()
    {
        $this->validateOrderStatus();
        return $this->arStatusColor;
    }

    private function validateOrderStatus()
    {
        //P-Pending, A-Approved, R-Rejected, C-Canceled, I-InProgress, F-Finished, D-Delivering, E-Delivered 
        switch ($this->orderStatus) {
            case 'A':
              $this->arStatusColor['step1']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step1']['lineColor'] = 'bg-green-500';
            break;
            case 'R':
              $arStatusColor['rejected'] = true;
            break;
            case 'C':
              $arStatusColor['cancelled'] = true;
            break;
            case 'I':
              $this->arStatusColor['step1']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step1']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['lineColor'] = 'bg-green-500';
            break;
            case 'F':
              $this->arStatusColor['step1']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step1']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step3']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step3']['lineColor'] = 'bg-green-500';
            break;
            case 'D':
              $this->arStatusColor['step1']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step1']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step3']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step3']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step4']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step4']['lineColor'] = 'bg-green-500';
            break;
            case 'E':
              $this->arStatusColor['step1']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step1']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step2']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step3']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step3']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step4']['iconColor'] = 'bg-green-500';
              $this->arStatusColor['step4']['lineColor'] = 'bg-green-500';
              $this->arStatusColor['step5']['iconColor'] = 'bg-green-500';
            break;
          }
    }
}