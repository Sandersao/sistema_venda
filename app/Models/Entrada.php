<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @todo Esta model não precisará de observers pois a model de produtos pesquisará diretamente da tabela dela para refalcar os dados de quantidade e preço
 */
class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produto',
        'qtde',
        'preco',
        'margem_lucro',
    ];
}
