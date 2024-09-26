<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_configs', function (Blueprint $table) {
            $table->string('menuconf_contactphone');
            $table->string('menuconf_whatsappnumber');
            $table->string('menuconf_zipcode');
            $table->string('menuconf_street');
            $table->string('menuconf_district');
            $table->string('menuconf_city');
            $table->string('menuconf_state');
            $table->string('menuconf_number');
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
