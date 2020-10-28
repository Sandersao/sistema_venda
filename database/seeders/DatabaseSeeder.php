<?php

namespace Database\Seeders;

// use Database\Factories\ClienteFactory;
use Illuminate\Database\Seeder;
use App\Models;
use App\Models\Cliente;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Cliente::factory(50)->create();
    }
}
