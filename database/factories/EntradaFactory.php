<?php

namespace Database\Factories;

use App\Models\Entrada;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntradaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entrada::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_produto' => rand(1, 50),
            'qtde' => rand(10, 500),
            'preco' => rand(0, 500) / 10,
            'margem_lucro' => rand(1, 100) / 100,
        ];
    }
}
