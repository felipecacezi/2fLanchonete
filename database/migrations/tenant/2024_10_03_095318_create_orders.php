<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_status', 1)->default('P'); //P-Pending, A-Approved, R-Rejected, C-Canceled, I-InProgress, F-Finished, D-Delivering, E-Delivered 
            $table->string('order_type', 1)->default('D'); //D-Delivery, P-Pickup
            $table->integer('order_value_total');
            $table->integer('order_value_subtotal');
            $table->integer('order_value_taxes');
            $table->string('order_payment_method', 1); //C-Card, P-Pix, M-Money
            $table->string('order_zipcode', 10);
            $table->string('order_street', 500);
            $table->string('order_number', 10);
            $table->string('order_district', 500);
            $table->string('order_complement', 500);
            $table->string('order_city', 500);
            $table->string('order_state', 500);
            $table->string('order_phone', 20);
            $table->string('order_email', 500);
            $table->string('order_whatsapp', 20);
            $table->string('order_change_value', 500);
            $table->string('order_address_reference', 500);
            $table->string('order_client_register', 20);            
            $table->string('order_client_name', 500);
            $table->text('order_obs');
            $table->string('product_active', 1)->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
