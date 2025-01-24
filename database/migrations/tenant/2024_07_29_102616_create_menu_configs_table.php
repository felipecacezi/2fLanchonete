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
        Schema::create('menu_configs', function (Blueprint $table) {
            $table->id();
            $table->string('menuconf_title', 500);
            $table->text('menuconf_description');
            $table->string('menuconf_open', 5)->nullable(true);
            $table->string('menuconf_lunch', 5)->nullable(true);
            $table->string('menuconf_reopen', 5)->nullable(true);
            $table->string('menuconf_close', 5)->nullable(true);
            $table->string('menuconf_wait_time', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_configs');
    }
};
