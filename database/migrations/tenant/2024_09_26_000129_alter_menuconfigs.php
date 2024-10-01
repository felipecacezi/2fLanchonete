<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_configs', function (Blueprint $table) {
            $table->string('menuconf_contactphone')->default('');
            $table->string('menuconf_whatsappnumber')->default('');
            $table->string('menuconf_zipcode')->default('');
            $table->string('menuconf_street')->default('');
            $table->string('menuconf_district')->default('');
            $table->string('menuconf_city')->default('');
            $table->string('menuconf_state')->default('');
            $table->string('menuconf_number')->default('');
        });
    }

    public function down(): void
    {
        Schema::table('menu_configs', function (Blueprint $table) {
            $table->dropColumn('menuconf_contactphone');
            $table->dropColumn('menuconf_whatsappnumber');
            $table->dropColumn('menuconf_zipcode');
            $table->dropColumn('menuconf_street');
            $table->dropColumn('menuconf_district');
            $table->dropColumn('menuconf_city');
            $table->dropColumn('menuconf_state');
            $table->dropColumn('menuconf_number');
        });
    }
};
