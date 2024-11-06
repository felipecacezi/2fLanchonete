<?php

namespace App\Models;

use App\Enums\PaymentMethodEnum;
use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;   

    protected $fillable = [
        'order_status',
        'order_type',
        'order_value_total',
        'order_value_subtotal',
        'order_value_taxes',
        'order_payment_method',
        'order_zipcode',
        'order_street',
        'order_number',
        'order_district',
        'order_complement',
        'order_city',
        'order_state',
        'order_phone',
        'order_email',
        'order_whatsapp',
        'order_hash',
        'order_client_name',
        'order_change_value',
        'order_address_reference',
        'order_client_register',
        'order_obs',
        'product_active',
    ];

    protected function casts(): array
    {
        return [
            'order_payment_method' => PaymentMethodEnum::class,
            'order_status' => OrderStatusEnum::class
        ];
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
    
}


