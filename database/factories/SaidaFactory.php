<?php

namespace Database\Factories;

use App\Models\Saida;
use Illuminate\Database\Eloquent\Factories\Factory;


class SaidaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Saida::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @todo Criar funcionalidade para buscar os quantitativos de produtos no banco de dados antes de fazer a inserção de registro. Os dados retornados nessa funcionaldiade devem ser, id_produto, qtde e margem_lucro apenas para produtos disponíveis
     */
    public function definition()
    {
        return [
            'id_produto' => rand(1, 50),
            'id_venda' => rand(1, 150),
            'qtde' => rand(1, 5),
            'preco_momento' => rand(0, 1000) / 10,
            'margem_lucro_momento' => rand(1, 100) / 100,
            'desconto' => rand(1, 100) < 10 ? (rand(0, 30) / 100) : 0,
        ];
    }
}
