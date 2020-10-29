<?php

namespace Database\Factories;

use App\Models\Venda;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_cliente' => rand(1, 50),
            'id_colaborador' => rand(1, 20),
        ];
    }
}
