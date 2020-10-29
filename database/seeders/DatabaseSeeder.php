<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Colaborador;
use App\Models\Entrada;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\Saida;

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
        Colaborador::factory(20)->create();
        Entrada::factory(500)->create();
        Produto::factory(50)->create();
        Venda::factory(150)->create();
        Saida::factory(50)->create();
    }
}
