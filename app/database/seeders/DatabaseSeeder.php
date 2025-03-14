<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Database\Factories\TenantFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TenantSeeder::class);
    }
}
