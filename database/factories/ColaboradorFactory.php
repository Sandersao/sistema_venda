<?php

namespace Database\Factories;

use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColaboradorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Colaborador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(
                (rand(1, 100) > 20 ? 'male' : 'female')
            ),
            'cpf' => rand(11111111111, 99999999999),
        ];
    }
}
