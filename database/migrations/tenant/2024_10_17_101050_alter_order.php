<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_complement')->nullable(true)->change();
            $table->string('order_email', 500)->nullable(true)->change();
            $table->text('order_obs')->nullable(true)->change();
            $table->string('product_active', 1)->default('A')->change();
            $table->string('order_change_value', 500)->default('')->nullable(true)->change();
            $table->string('order_address_reference', 500)->default('')->nullable(true)->change();
            $table->string('order_client_register', 20)->default('')->change();      
        });
    }

    public function down()
    {
        // Reverter a alteração
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_complement')->nullable(false)->change();
            $table->string('order_email', 500)->nullable(false)->change();
            $table->text('order_obs')->nullable(false)->change();
            $table->string('product_active', 1)->default()->change();
            $table->string('order_change_value', 500)->default('')->nullable(false)->change();
            $table->string('order_client_register', 20)->change(); 
        });
    }
};